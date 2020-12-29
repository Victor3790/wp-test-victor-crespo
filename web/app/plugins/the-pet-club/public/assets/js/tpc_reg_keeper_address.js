jQuery(document).ready(function ($) {

    /*let input = document.getElementById('region_1');
    let options = {
        types: ['(regions)'],
        componentRestrictions: {country: 'mx'}
    };

    const autocomplete = new google.maps.places.Autocomplete(input, options);*/

    $('#tpc_keeper_address_form').validate({
        rules: {
            tpc_street: {
                required: true,
                rangelength: [10,70]
            },
            tpc_zip_code: {
                required: true,
                rangelength: [4,6],
                digits: true
            },
            tpc_colony: {
                required: true,
                rangelength: [8,150]
            },
        },
        messages: {
            tpc_street: {
                required: 'Por favor ingresa tu calle.',
                rangelength: jQuery
                            .validator
                            .format("La calle debe tener entre {0} y {1} caracteres. &nbsp;")
            },
            tpc_zip_code: {
                required: 'Por favor ingresa tu código postal.',
                rangelength: jQuery
                            .validator
                            .format("El código postal debe tener entre {0} y {1} caracteres. &nbsp;"),
                digits: 'El código postal no puede tener letras.'
            },
            tpc_colony: {
                required: 'Por favor ingresa tu colonia.',
                rangelength: jQuery
                            .validator
                            .format("La colonia debe tener entre {0} y {1} caracteres. &nbsp;")
            },
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
