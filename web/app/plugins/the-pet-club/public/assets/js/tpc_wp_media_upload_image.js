jQuery(document).ready(function ($) {

    attachment_uploader = wp.media({
        title: 'Selecciona o sube imagenes de tu casa.',
        frame: 'select',
        multiple: 'true',
        library: {
            type: 'image/jpeg'
        },
        button: {
            text: 'Subir'
        }
    });

    $('#tpc_open_attachment_uploader').click(function(){

        attachment_uploader.open();

    });

    attachment_uploader.on( 'select', function(){ 

        attachments = attachment_uploader.state().get('selection').toJSON();

        var attachment_ids = [];

        attachments.forEach(element => {
            attachment_ids.push( element.id );
        });

        $('#tpc_attachments').val(JSON.stringify(attachment_ids));  

    });

    thumbnail_uploader = wp.media({
        title: 'Selecciona una imagen',
        frame: 'select',
        multiple: 'false',
        library: {
            type: 'image/jpeg'
        },
        button: {
            text: 'Seleccionar'
        }
    });

    $('#tpc_open_thumbnail_uploader').click(function(){

        thumbnail_uploader.open();

    });

    thumbnail_uploader.on( 'select', function(){ 

        attachment = thumbnail_uploader.state().get('selection').first().toJSON();
        $('#tpc_thumbnail').val(attachment.id);

    });
});