<?php
/*
*   Class to handle responses from mercado pago
*
*/

if(!class_exists('Tpc_Mercado_Pago'))
{
    class Tpc_Mercado_Pago
    {
        function register_route()
        {
            register_rest_route( 'tpc/v1', '/subscription', array(
                'methods' => 'POST',
                'callback' => array( $this, 'get_response' )
              ) 
            );
        }

        function get_response()
        {
            $dumb = 1+1;
        }
    }
}
