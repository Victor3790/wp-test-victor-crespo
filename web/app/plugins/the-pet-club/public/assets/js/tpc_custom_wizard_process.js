/*
*   custom plugin to manage form wizard plugin functions
*/
(function ( $ ) {

    $.fn.tpc_wizard_success = function(result) {

        if( result.code == 1 ) {

            let current_step;

            alert(result.message);
            $(this).smartWizard('next');
            $(this).smartWizard('loader', 'hide');
            current_step = $(this).smartWizard('getStepIndex');
            $(this).smartWizard('stepState', [current_step - 1], 'disable');

        } else {
            alert(result.message);
            $(this).smartWizard('loader', 'hide');
        }
    };

    $.fn.tpc_wizard_error = function() {

        let error_message = 'Error, por favor contacte a servicio al cliente.';
        
        alert(error_message);
        $(this).smartWizard('loader', 'hide');

    };

}( jQuery ));