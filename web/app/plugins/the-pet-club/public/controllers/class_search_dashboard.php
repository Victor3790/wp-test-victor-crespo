<?php
/*
*   Class to load the vendor dashboard
*
*/

require_once TPC_PLUGIN_PATH . 'public/includes/class_vk_dashboard.php';

if(!class_exists('Tpc_Search_Dashboard'))
{
    class Tpc_Search_Dashboard extends Vk_Dashboard
    {
        private $plugin_name;
        //private $current_user_id;
        private $search_dashboard_action;
        //private $user_can = 'vendor';

        public function __construct($plugin_name_param)
        {
            $this->plugin_name = $plugin_name_param;
            //$this->current_user_id = get_current_user_id();
            //$this->admin_dashboard_action = new Tpc_Search_Dashboard_Action();
        }

        public function tpc_load_search_dashboard()
        {
            //$this->vk_check_permission($this->user_can);

            $scripts = [
                /*'_google_maps',
                '_tpc_map',*/
                '_tpc_search_controls'
            ];

            $styles = [
                '_bootstrap_styles',
                '_fontawesome',
                '_fontawesome_solid',
                '_form_styles',
                '_search'
            ];

            $this->vk_enqueue_styles( $this->plugin_name, $styles );
            $this->vk_enqueue_scripts( $this->plugin_name, $scripts );

            //$user_obj = get_userdata( $this->current_user_id );
            //$user_name = $user_obj->first_name . ' ' . $user_obj->last_name;

            $dashboard_template = TPC_PLUGIN_PATH . 'public/views/search_dashboard.php';
            $dashboard_view     = $this->vk_load_view( $dashboard_template/*, ['user_name'=>$user_name]*/ );

            return $dashboard_view;
        }
    }
}
