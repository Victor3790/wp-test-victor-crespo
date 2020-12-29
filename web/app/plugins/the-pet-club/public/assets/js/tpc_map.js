jQuery(document).ready(function ($) {
        
        let input = document.getElementById('region');
        let options = {
            types: ['(regions)'],
            componentRestrictions: {country: 'mx'}
        };

        const autocomplete = new google.maps.places.Autocomplete(input, options);

});
