jQuery(document).ready( function($) {
$("body").on('submit','#custom_form', function(e){
         e.preventDefault();
        $('.ajax_result').html('Submitting Data....');
        //var formElement = document.getElementById("Custom_form");
        var formData = new FormData(this);
        formData.append('action', 'submitData');
    
        $.ajax({
            url: ajax.ajaxurl,
            type: 'POST',
            data: formData,
            success: function (data) {
                $('.ajax_result').html(data);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
});