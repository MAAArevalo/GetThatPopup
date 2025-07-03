
var inputstring = "";

jQuery(document).ready(function(){

    //Media Uploader

    jQuery('.aagtp-upload-button').on('click', function(e) {
        e.preventDefault();

        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media({
            title: 'Select Popup Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });

        mediaUploader.on('select', function() {
            const attachment = mediaUploader.state().get('selection').first().toJSON();
            jQuery('#aagtp_image_url').val(attachment.url);
        });

        mediaUploader.open();
    });

});