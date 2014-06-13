/**
* Created with REST Integration Page.
* User: WestonClarke
* Date: 2014-06-13
* Time: 12:24 PM
* To change this template use Tools | Templates.
*/
function setupAjaxForm(form_id, form_validations){
    var form = '#' + form_id;
    var form_message = form + '-message';
 
    // en/disable submit button
    var disableSubmit = function(val){
        $(form + ' input[type=submit]').attr('disabled', val);
    };
 
    // setup loading message
    $(form).ajaxSend(function(){
        $(form_message).removeClass().addClass('loading').html('Loading...').fadeIn();
    });
 
    // setup jQuery Plugin 'ajaxForm'
    var options = {
        dataType:  'json',
        beforeSubmit: function(){
            // run form validations if they exist
            if(typeof form_validations == "function" && !form_validations()) {
                // this will prevent the form from being subitted
                return false;
            }
            disableSubmit(true);
        },
        success: function(json){
            /**
               * The response from AJAX request will look something like this:
               * {"type" : "success", "message" : "Thank-You for submitting the form!"}
               * Once the jQuery Form Plugin receives the response, it evaluates the string into a JavaScript object, allowing you to access 
               * object members as demonstrated below.
               */
            $(form_message).hide();
            $(form_message).removeClass().addClass(json.type).html(json.message).fadeIn('slow');
            disableSubmit(false);
            if(json.type == 'success')
                $(form).clearForm();
        }
    };
    $(form).ajaxForm(options);
}

$(document).ready(function() {
    new setupAjaxForm('ajaxform');
});

$(document).ready(function() {
    new setupAjaxForm('contact-us', function(){
        // field validations go here, make sure to return true (validates) / false (fails).
    });
});