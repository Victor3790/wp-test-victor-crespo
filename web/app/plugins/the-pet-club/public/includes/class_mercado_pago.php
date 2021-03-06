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
                'methods' => WP_REST_SERVER::CREATABLE,
                'args' => array(),
                'callback' => array( $this, 'get_response' )
              ) 
            );
        }

        public function get_response( $json )
        {
            http_response_code(200);

	        $fichero = '/app/web/wp/payments.txt';
            $actual = file_get_contents($fichero);
            $actual .= print_r( $json, true );
            file_put_contents($fichero, $actual);

            //return new WP_REST_Response( [ 'status'=>200 ] );
        }
    }
}
