<?php
/*
*   Parent class for dashboards
*    
*/
if(!class_exists('Vk_Dashboard'))
{
    class Vk_Dashboard
    {
        protected function vk_enqueue_scripts( $prefix=null, $scripts=null )
        {
            $this->vk_check_enqueue_data_structure( $prefix, $scripts );

            foreach ($scripts as $script) {
                wp_enqueue_script( $prefix . $script );
            }
        }

        protected function vk_enqueue_styles( $prefix=null, $scripts=null )
        {
            $this->vk_check_enqueue_data_structure( $prefix, $scripts );

            foreach ($scripts as $script) {
                wp_enqueue_style( $prefix . $script );
            }
        }

        protected function vk_check_permission($permission=null)
        {
            if( empty( $permission ) )
                throw new Exception(
                    'vk_security: Not enough arguments to process the request' , 
                    1
                );

            if( !is_string( $permission ) )
                throw new Exception(
                    'vk_security: There are arguments with the wrong format (type).' , 
                    1
                );
    
            if( !current_user_can($permission) )
                throw new Exception(
                    'vk_security: The user does not have enough permissions.' , 
                    1
                );
        }

        protected function vk_load_view( $file=null, $params=null )
        {
            $view = new Vk_Html( $file, $params );
            return $view->vk_load();
        }

        private function vk_check_enqueue_data_structure( $prefix, $scripts )
        {
            if( empty($prefix) || empty($scripts) )
                throw new Exception(
                    'vk_enqueue: Not enough arguments to process the request' , 
                    1
                );

            if( !is_string($prefix) || !is_array($scripts) )
                throw new Exception(
                    'vk_security: There are arguments with wrong format (type).' , 
                    1
                );
        }
    }

}