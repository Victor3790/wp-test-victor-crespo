<?php
/*
*   Class to handle user meta info
*    
*/
if(!class_exists('Vk_Post_Meta'))
{
    class Vk_Post_Meta
    {
        public static function register_meta( $post_id=null, $values=null )
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

            $keys = array_keys( $values );

            foreach ( $keys as $key ) {

                if( !is_string( $key ) )
                    throw new Exception(
                        'vk_meta: The parameter does not have the right type.' , 
                        1
                    );

                $current_meta_value = get_post_meta( $post_id, $key, true );
                $new_value = $values[$key];

                if( $current_meta_value == $new_value )
                    continue;

                $update = update_post_meta( $post_id, $key, $new_value );

                if( !$update )
                    return false;
            }

            return true;
        }
    }

}