<?php

if(!class_exists('Custom_Query_Vars'))
{
    class Custom_Query_Vars
    {
        function set_vars( $vars )
        {

            $vars[] = 'tpc_search_id';
            $vars[] = 'tpc_service';
            $vars[] = 'tpc_dog';
            $vars[] = 'tpc_cat';
            $vars[] = 'tpc_region';
          
            return $vars;
        }
    }
}