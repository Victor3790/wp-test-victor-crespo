jQuery(document).ready(function ($) {

    $('#tpc_keeper_contact_form').validate({
        rules: {
            tpc_home_phone: {
                required: true,
                rangelength: [10,10],
                digits: true
            },
            tpc_cellphone: {
                required: true,
                rangelength: [10,10],
                digits: true
            }
        },
        messages: {
            tpc_home_phone: {
                required: 'Por favor ingresa tu número de casa.',
                rangelength: jQuery
                            .validator
                            .format("El número debe tener {0} digitos. &nbsp;"),
                digits: 'El número telefónico no puede tener letras.'
            },
            tpc_cellphone: {
                required: 'Por favor ingresa tu número celular.',
                rangelength: jQuery
                            .validator
                            .format("El número debe tener {0} digitos. &nbsp;"),
                digits: 'El número telefónico no puede tener letras.'
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
            },
            onError: function (){
                $('#tpc_reg_forms').tpc_wizard_error();
            }
        });
    }

});
