$(document).ready(function() {
    if($('.posters-filter').length) {
        var container = $('.posters-container');
        var form = hiddenField.parent('form');
        $(document).on('change', hiddenField, function () {
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: {oeuvre: hiddenField.val() }
            })
            .done(function(data) {
                container.html(data);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                
            });
        });
  
    }
});