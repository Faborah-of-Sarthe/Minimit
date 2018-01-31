$(document).ready(function() {
    if($('.poster-update').length) {
        var inputUpload = $('.input-file');
        var submitBtn = $('.upload-btn');

        submitBtn.click(function () {
            console.log(inputUpload.val());
            var file = inputUpload.val();

            if (file) {
                var fileData = {
                    'image': inputUpload.val()
                };
                $.ajax({
                    method: 'POST',
                    url: inputUpload.data('href'),
                    data: fileData,
                    dataType: 'json'
                }).done(function (data) {
                    console.log(data);
                }).fail(function (data) {
                    console.log(data);
                    console.log('fail');
                });
            }
        });

    }
});
