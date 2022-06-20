jQuery(function($) {
    $('body').on('submit', '#Custom_form', function() {
        $('.ajax_result').html('Submitting Data....');
        e.preventDefault();    
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