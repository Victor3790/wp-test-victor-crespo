jQuery(document).ready(function ($) {

    $('#tpc_keeper_services').validate({
        rules: {
            tpc_description: {
                required: true,
                rangelength: [10,250]
            }
        },
        messages: {
            tpc_description: {
                required: 'Por favor ingresa información tuya y de tus servicios.',
                rangelength: jQuery
                            .validator
                            .format("La descripción debe tener entre {0} y {1} caracteres. &nbsp;")
            }
        },
        submitHandler: function (form) {
            tpc_submit(event, form)
        }
    });

    function tpc_submit( event, form )
    {
        event.preventDefault();
        $(form).vk_ajax_send({
            url: tpc_object.ajax_url,
            start: function() {
                $('#tpc_reg_forms').smartWizard('loader', 'show');
            },
            onSuccess: function(result){
                $('#tpc_reg_forms').tpc_wizard_success(result);
                location.reload();
            },
            onError: function (){
                $('#tpc_reg_forms').tpc_wizard_error();
            }
        });
    }

});
