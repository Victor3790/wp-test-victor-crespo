<?php
/*
*   This function loads any HTML code
*   to show on the front-end. 
*
*   @file       the full path to the view to load.
*   @params     Associative array of parameters to use in the view.
*
*/
if(!class_exists('Vk_Html'))
{
    class Vk_Html
    {
        private $file;
        private $params;

        public function __construct( $file=null, $params=null )
        {
            $this->file = $file;
            $this->params = $params;

            $this->vk_validate_html_input();
        }

        public function vk_load()
        {

            if(!empty($this->params))
                extract( $this->params );

            ob_start();

            require( $this->file );

            $buffer = ob_get_clean();

            return $buffer;
 
        }

        private function vk_validate_html_input()
        {
            if( empty( $this->file ) )
                throw new Exception(
                    'vk_html: A path was expected.' , 
                    1
                );

            if( ! is_string( $this->file ) )
                throw new Exception(
                    'vk_html: The path must be a string.' , 
                    1
                );

            if( ! is_file( $this->file ) )
                throw new Exception(
                    'vk_html: File not found.' , 
                    1
                );

            if( ! is_null( $this->params ) ) {
                if( ! is_array( $this->params ) )
                    throw new Exception(
                        'vk_html: The parameters must be passed as an array.' , 
                        1
                    );
            }
        }
    }
}