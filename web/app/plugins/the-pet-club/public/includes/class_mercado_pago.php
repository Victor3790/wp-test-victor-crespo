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
            register_rest_route( 'tpc', '/subscription', array(
                'methods' => WP_REST_SERVER::CREATABLE,
                'callback' => function() {return new WP_REST_Response( [ 'status'=>200 ] );},
                'args' => array()
                /*'callback' => array( $this, 'get_response' )*/
              ) 
            );
        }

        function get_response( $json )
        {
	        $fichero = 'payments.txt';
            $actual = file_get_contents($fichero);
            $actual .= $json;
            file_put_contents($fichero, $actual);

            trigger_error( 'Hey!!!!!!!!   ..................' );

            return new WP_REST_Response( [ 'status'=>200 ] );
        }
    }
}
