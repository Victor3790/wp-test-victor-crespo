<?php
/*
*   Class to load and manage form data
*   
*   Required parameters: 
*
*       input_name (string): The "name" attribute in an HTML input (The identifier in the $_POST global)
*       type (string):       The data type, it could be one of the following values:
*                               1.- string:     Evaluates using is_string()
*                               2.- numeric:    Evaluates using is_numeric()
*       min (int):           The minimun length the value must have
*                            Note: if no "max" parameter is specified, the length of the value must equal "min"
*   Optional parameters:
*   
*       max (int):              The maximum length the value must have
*                               Note: if no "max" parameter is specified, the length of the value must equal "min"
*       sanitize (boolean):     Whether to sanitize the input value, true by default.
*       specific (string):      The specific type, it could be one of the following values:
*                               1.- mail:     Gets using sanitize_email()          
*/

require_once TPC_PLUGIN_PATH . 'public/includes/class_vk_input.php';

if(!class_exists('Vk_Form_Data'))
{
    class Vk_Form_Data extends Vk_Input
    {
        private $data;
        public  $output;

        public function __construct( $data_param=null )
        {
            $this->data = $data_param;
            $this->validate_data_structure();
        }

        /*
        *   Gets data from the input fields
        *   Note: The 'sanitize' option is true by default
        */
        public function get_data()
        {
            foreach ($this->data as $datum) {

                $sanitize = (isset( $datum['sanitize'] )) ? $datum['sanitize'] : true;

                if( !is_bool( $sanitize ) )
                    throw new Exception(
                        'vk_validate: sanitize should be a boolean' , 
                        1
                    );

                if( isset(  $datum['specific'] )){
                    switch ($datum['specific']) {
                        case 'mail':
                            $input = $this->mail_post( $datum['input_name'], $sanitize );  
                        break;
                        
                        default:
                            throw new Exception(
                                'vk_validate: ' . $datum['specific'] . ' is not a correct specific type' , 
                                1
                            );
                        break;
                    }
                }else{
                    $input = $this->post( $datum['input_name'], $sanitize );
                }

                if( is_null($input) )
                    continue;

                if( strlen($input) == 0 )
                    throw new Exception(
                        'vk_validate: ' . $datum['input_name'] . ' invalid data' , 
                        1
                    );

                switch ( $datum['type'] ) {
                    case 'string':
                        if( !is_string( $input ) )
                            throw new Exception(
                                'vk_validate: ' . $datum['input_name'] . ' is not a string' , 
                                1
                            );

                        $max = ( isset($datum['max']) ) ? $datum['max'] : null;
                        $min = $datum['min'];
                        if( !$this->validate_length( $input, $min, $max ) )
                            throw new Exception(
                                'vk_validate: ' . $datum['input_name'] . ' Length error' , 
                                1
                            );
                    break;

                    case 'numeric':
                        if( !is_numeric( $input ) )
                            throw new Exception(
                                'vk_validate: ' . $datum['input_name'] . ' is not numeric' , 
                                1
                            );

                        $max = ( isset($datum['max']) ) ? $datum['max'] : null;
                        $min = $datum['min'];
                        if( !$this->validate_length( $input, $min, $max ) )
                            throw new Exception(
                                'vk_validate: ' . $datum['input_name'] . ' Length error' , 
                                1
                            );
                    break;
                    
                    default:
                        throw new Exception(
                            'vk_validate: ' . $datum['type'] . ' is not a correct data type' , 
                            1
                        );
                    break;
                }

                $this->output[ $datum['input_name'] ] = $input;

            }

            return $this->output;
        }

        private function validate_data_structure()
        {
            if( empty($this->data) )
                throw new Exception('vk_validate: No data to process', 1);
                

            if( !is_array($this->data) )
                throw new Exception('vk_validate: Wrong data format', 1);

            foreach ($this->data as $datum) {

                if( empty($datum) )
                    throw new Exception('vk_validate: There is an empty data item', 1);

                if( !is_array($datum) )
                    throw new Exception('vk_validate: There is a data item with the wrong format', 1); 

                if( 
                    empty( $datum['input_name'] ) || 
                    empty( $datum['type'] )  || 
                    empty( $datum['min'] )
                )
                    throw new Exception(
                        'vk_validate: Not enough info to process the data item or invalid param value', 
                        1
                    ); 
            }
        }

        private function validate_length( $input, $min, $max )
        {
            if( empty($max) ){
                if( iconv_strlen( $input ) == $min )
                    return true;
                else
                    return false;
            }else{
                if( iconv_strlen( $input ) >= $min && iconv_strlen( $input ) <= $max )
                    return true;
                else
                    return false;
            }
        }

    }

}