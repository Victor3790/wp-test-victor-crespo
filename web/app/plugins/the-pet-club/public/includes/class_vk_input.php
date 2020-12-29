<?php
/*
*   Class to load inputs
*
*/
if(!class_exists('Vk_Input'))
{

    abstract class Vk_Input
    {

        protected function get($key = '', $default = null, $escape = false)
        {
            $value = (isset($_GET[$key])) ? $_GET[$key] : false;
            $value = (!empty($value)) ? $value : $default;

            return (!$escape) ? $value : sanitize_text_field($value);
        }

        protected function post($key = '', $escape = false)
        {
            $default = null;

            $value = (isset($_POST[$key])) ? $_POST[$key] : false;
            $value = (!empty($value)) ? $value : $default;

            if( is_null($value) )
                return $value;

            return (!$escape) ? $value : sanitize_text_field($value);
        }

        protected function mail_post($key = '', $escape = false)
        {
            $default = null;

            $value = (isset($_POST[$key])) ? $_POST[$key] : false;
            $value = (!empty($value)) ? $value : $default;

            if( is_null($value) )
                return $value;

            return (!$escape) ? $value : sanitize_email($value);
        }

        protected function request($key = '', $default = null, $escape = false)
        {
            $value = (isset($_REQUEST[$key])) ? $_REQUEST[$key] : false;
            $value = (!empty($value)) ? $value : $default;

            return (!$escape) ? $value : sanitize_text_field($value);
        }

    }

}