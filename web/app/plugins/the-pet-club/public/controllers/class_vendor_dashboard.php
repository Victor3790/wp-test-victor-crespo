<?php
/*
*   Class to load the vendor dashboard
*
*/

require_once TPC_PLUGIN_PATH . 'public/includes/class_vk_dashboard.php';

// SDK de Mercado Pago
require TPC_PLUGIN_PATH .  'vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-5405902477656417-122921-dba0b225aeb1405f5d82a2c5fe872098-172563922');

if(!class_exists('Tpc_Vendor_Dashboard'))
{
    class Tpc_Vendor_Dashboard extends Vk_Dashboard
    {
        private $plugin_name;
        private $current_user_id;
        private $vendor_dashboard_action;
        private $user_can = 'seller';

        public function __construct($plugin_name_param)
        {
            $this->plugin_name = $plugin_name_param;
            $this->current_user_id = get_current_user_id();
            $this->admin_dashboard_action = new Tpc_Vendor_Dashboard_Action();
        }

        public function tpc_load_vendor_dashboard()
        {
            try {

                $this->vk_check_permission($this->user_can);

            } catch (Exception $e) {

                exit();

            }

            // Crea un objeto de preferencia
            $preference = new MercadoPago\Preference();

            // Crea un ítem en la preferencia
            $item = new MercadoPago\Item();
            $item->title = 'Mi producto';
            $item->quantity = 1;
            $item->unit_price = 75.56;
            $preference->notification_url = home_url('tpc/v1/subscription');
            $preference->items = array($item);
            $preference->save();

            $scripts = [
                '_jquery_ajax',
                '_popper',
                '_bootstrap',
                '_smart_wizard',
                '_validate',
                '_tpc_reg_form_wizard',
                '_tpc_custom_wizard_process',
                '_tpc_reg_keeper_address',
                '_tpc_reg_keeper_contact',
                '_tpc_reg_keeper_home',
                '_tpc_reg_keeper_services',
                '_tpc_wp_media_upload_image'
            ];

            $styles = [
                '_bootstrap_styles',
                '_wizard_styles',
                '_form_styles'
            ];

            $this->vk_enqueue_styles( $this->plugin_name, $styles );
            $this->vk_enqueue_scripts( $this->plugin_name, $scripts );

            $user_obj = get_userdata( $this->current_user_id );
            $user_name = $user_obj->first_name . ' ' . $user_obj->last_name;

            $dashboard_template = TPC_PLUGIN_PATH . 'public/views/vendor_dashboard.php';
            $dashboard_view     = $this->vk_load_view(  $dashboard_template, 
                                                        [
                                                            'user_name'=>$user_name,
                                                            'preference'=>$preference
                                                        ] 
                                                    );

            return $dashboard_view;
        }
    }
}
