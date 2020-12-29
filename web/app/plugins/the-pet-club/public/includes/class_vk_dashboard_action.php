<?php
/*
*   Parent class for dashboard action
*    
*/
if(!class_exists('Vk_Dashboard_Action'))
{
    class Vk_Dashboard_Action
    {
        private $messages = array();

        public function __construct()
        {
            $this->messages['error'] = 'Error, por favor contacte a servicio al cliente';
            $this->messages['success'] = 'La operación tuvo éxito';
        }

        public function vk_check_ajax( $action=null, $nonce_input=null, $permission=null )
        {
            if( empty($action) || empty($nonce_input) || empty($permission))
                throw new Exception(
                    'vk_security: Not enough arguments to process the request' , 
                    1
                );

            if( !is_string($action) || !is_string($nonce_input) || !is_string($permission))
                throw new Exception(
                    'vk_security: There are arguments with the wrong format (type).' , 
                    1
                );

            $nonce = check_ajax_referer( $action, $nonce_input, false );

            if( !$nonce )
                throw new Exception(
                    'vk_security: Incorrect nonce.' , 
                    1
                );

            if( !current_user_can($permission) )
                throw new Exception(
                    'vk_security: The user does not have enough permissions.' , 
                    1
                );

            return;
        }

        protected function vk_load_component( $file=null, $params=null )
        {
            $view = new Vk_Html( $file, $params );
            return $view->vk_load();
        }

        protected function vk_send_result( $result_param = null, $messages_param=null )
        {
            $local_messages = array();

            $local_messages['success'] = ( isset( $messages_param['success'] ) ) 
                                            ? $messages_param['success'] 
                                            : $this->messages['success'] ;

            $local_messages['error'] = ( isset( $messages_param['error'] ) ) 
                                            ? $messages_param['error'] 
                                            : $this->messages['error'] ;


            if( empty($result_param) ){
                $result['code'] = 0;
                $result['message'] = $local_messages['error'];
                wp_send_json($result);
            }

            $result['code'] = 1;
            $result['message'] = $local_messages['success'];
            wp_send_json($result);
        }
    }

}