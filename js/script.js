jQuery(document).ready(function(){
    // Get form by id
    var form = jQuery('#ajax-contact');

    // Messages
    var formMessages = jQuery('#form-messages');

    // Form eVENT Handler
    jQuery(form).submit(function(event){
        // Stop browser from submitting the form directly
        event.preventDefault();

        // Serialize Form data
        var formData = jQuery(form).serialize();

        //Submit with Ajax
        jQuery.ajax({
            type: 'POST',
            url: jQuery(form).attr('action'),
            data: formData
        }).done(function(response){
            // Make sure message is success
            jQuery(formMessages).removeClass('error');
            jQuery(formMessages).addClass('success');

            // Set the message
            jQuery(formMessages).text(response);

            jQuery('#ajax-contact').fadeOut( "slow", function() {
                });

            /* Clear the form field
            jQuery('#name').val("");
            jQuery('#email').val("");
            jQuery('#message').val("");
            */

            // If fails
        }).fail(function(data){
            // Make sure message is error
            jQuery(formMessages).removeClass('success');
            jQuery(formMessages).addClass('error');

            // Set message text
            if(data.responseText !== ''){
                jQuery(formMessages).text(data.responseText);
            } else {
                jQuery(formMessages).text('An error occurred');
            }
        });
    });
});