<?php

if(!class_exists('Custom_Query'))
{
    class Custom_Query
    {
        function search( $query )
        {
            
            if( !is_post_type_archive( 'keeper' ) )
                return;

            $search_nonce = get_query_var( 'tpc_search_id' );
            
            if( empty( $search_nonce ) )
                return;

            if( !wp_verify_nonce( $search_nonce, 'search_for_keepers' ) )  
                return;  
        
            $meta_query = array();

            $service = get_query_var( 'tpc_service', null );
        
            if( !empty( $service ) ){
                $meta_query[] = array( 'key'=>$service, 'compare'=>'EXISTS' );
            }

            $dog = get_query_var( 'tpc_dog', null );

            if( !empty( $dog ) ){
                $meta_query[] = array( 'key'=>'kp_dog', 'compare'=>'EXISTS' );
            }

            $cat = get_query_var( 'tpc_cat', null );
        
            if( !empty( $cat ) ){
                $meta_query[] = array( 'key'=>'kp_cat', 'compare'=>'EXISTS' );
            }

            $region = get_query_var( 'tpc_region', null );
            if( !empty( $region ) ){
                $meta_query[] = array( 'key'=>'kp_colony', 'value'=>$region, 'compare'=>'=', 'type'=>'CHAR'  );
            }
        
        
            if( count( $meta_query ) > 1 ){
              $meta_query['relation'] = 'AND';
            }
        
            if( count( $meta_query ) > 0 ){
              $query->set('meta_query', $meta_query);
            }
        }
    }
}