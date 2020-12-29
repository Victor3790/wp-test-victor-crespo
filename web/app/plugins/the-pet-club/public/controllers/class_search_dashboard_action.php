<?php
/*
*   This class manages ajax requests
*
*/

require_once TPC_PLUGIN_PATH . 'public/includes/class_vk_dashboard_action.php';

if(!class_exists('Tpc_Search_Dashboard_Action'))
{
    class Tpc_Search_Dashboard_Action extends Vk_Dashboard_Action
    {
        //private $user_can = 'seller';

        public function __construct()
        {
            //add_action('wp_ajax_tpc_register_keeper_address', [$this, 'tpc_register_keeper_address']);
            /*add_action('wp_ajax_tpc_register_keeper_contact', [$this, 'tpc_register_keeper_contact']);
            add_action('wp_ajax_tpc_register_keeper_house_info', [$this, 'tpc_register_keeper_house_info']);
            add_action('wp_ajax_tpc_register_keeper_services', [$this, 'tpc_register_keeper_services']);*/

            parent::__construct();
        }

    }
}
