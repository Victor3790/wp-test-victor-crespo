/*
*   This is a small jquery plugin for sending ajax requests.
*   IMPORTANT!  It does not catch the submit event, so make sure
*               you call it from the proper event (submit) adding 
*               the preventDefault function. Call this plugin on the 
*               submit event with the syntax:
*
*                $('#form_id').submit(function(e){
*                   e.preventDefault();
*                   $(this).vk_ajax_send({
*                       url: rh_object.ajax_url,
*                       ...
*                   });
*                });
*   Options:
*       url (required):         The url of the function to be called on the server.
*       start (optional):       A function to be appended to the beforeSend jquery ajax option
*       finish (optional):      A function to be appended to the complete jquery ajax option
*       onSuccess (optional):   A function to be appended to the success jquery ajax option
*       onError (optional):     A function to be appended to the error jquery ajax option
*/
(function ( $ ) {

    $.fn.vk_ajax_send = function( options ) {

        let data;
        let form_data = new FormData;
        let file_inputs = jQuery('input:file', this);
        let settings;

        settings = $.extend({
            url:        false,
            start:      function(){ },
            finish:     function(){ },
            onSuccess:  function(){ },
            onError:    function(){ }
        }, options );

        if( ! settings.url )
            throw 'vk_plugin error: No URL specified';

        data = this.serializeArray();

        if( data.length == 0 )
            throw 'vk_plugin error: No data to be sent';

        data.forEach(element => {
            form_data.append(element['name'], element['value']);
        });

        if(file_inputs){
            for (let i = 0; i < file_inputs.length; i++) {
                form_data.append( file_inputs[i]['name'], file_inputs[i].files[0] );
            }
        }

        jQuery.ajax({
            url:            settings.url,
            type:           'POST',
            data:           form_data,
            contentType:    false,
            cache:          false,
            processData:    false,
            beforeSend:     settings.start,
            complete:       settings.finish,
            success:        settings.onSuccess,
            error:          settings.onError
        });

    };

}( jQuery ));