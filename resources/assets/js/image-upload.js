$(document).ready(function() {
    if($('.poster-update').length) {
        var inputUpload = $('.input-file');
        var submitBtn = $('.upload-btn');
        errorsContainer = $('.images .errors');


        submitBtn.click(function () {
            var file = inputUpload.val();
            errorsContainer.html('');
            if (file) {
                var fileData =  new FormData($('.form-poster').get(0));
                console.log(fileData);
                $.ajax({
                    method: 'POST',
                    url: inputUpload.data('href'),
                    dataType: 'json',
                    data: fileData,
                    processData: false,
                    contentType: false
                }).done(function (data) {
                    console.log(data);
                }).fail(function (data) {
                    console.log(data);
                    populateErrors(data.responseJSON);
                });
            }
        });

        function populateErrors(data) {
            var errors = '<ul>';
            $.each(data,function (index, element) {
                $.each(element, function (i,e) {
                    errors += "<li>" + e + "</li>";
                });
            });
            console.log("error" + data);
            errors += "</ul>";
            errorsContainer.html(errors);
        }
    }
});
