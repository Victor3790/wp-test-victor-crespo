<?php
/*
*   Class to handle user meta info
*    
*/
if(!class_exists('Vk_User_Meta'))
{
    class Vk_User_Meta
    {
        public static function register_current_user_meta( $values=null )
        {
            if(empty($values))
                throw new Exception(
                    'vk_meta: Not enough parameters.' , 
                    1
                );

            if( !is_array($values))
                throw new Exception(
                    'vk_meta: The parameter does not have the right type.' , 
                    1
                );

            $user_id = get_current_user_id();
            $keys = array_keys( $values );

            foreach ( $keys as $key ) {

                if( !is_string( $key ) )
                    throw new Exception(
                        'vk_meta: The parameter does not have the right type.' , 
                        1
                    );

                $current_meta_value = get_user_meta( $user_id, $key, true );
                $new_value = $values[$key];

                if( $current_meta_value == $new_value )
                    continue;

                $update = update_user_meta( $user_id, $key, $new_value );

                if( !$update )
                    return false;
            }

            return true;
        }
    }

}