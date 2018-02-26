$(document).ready(function() {
    if($('.poster-update').length) {
        var inputUpload = $('.input-file');
        var formUpload = $('.form-poster');
        var imageContainer = $('.images-list .container');
        errorsContainer = $('.images .errors');
        imageids = $('.image-ids');

        // First population of the hidden field
        updateList();


        formUpload.submit(function (e) {
            e.preventDefault();
            var file = inputUpload.val();
            errorsContainer.html('');
            if (file) {
                var fileData =  new FormData($('.form-poster').get(0));
                $.ajax({
                    method: $(this).prop('method'),
                    url: $(this).prop('action'),
                    dataType: 'json',
                    data: fileData,
                    processData: false,
                    contentType: false
                }).done(function (data) {
                    imageContainer.append(data);
                    inputUpload.val('');
                    updateList();
                }).fail(function (data) {
                    populateErrors(data.responseJSON);
                });
            }
        });

        $(document).on('submit', '.delete-image', function(e){
            e.preventDefault();
            $.ajax({
                method: 'DELETE',
                url: $(this).prop('action')
            }).done(function(data){
                $('.image[data-id="'+ data +'"]').remove();
                updateList();
            }).fail(function (data) {
                console.log(data);
            });
        });

        function updateList() {
            var order = [];
            $('.images-list .container .image').each(function(index, element) {
                order.push($(element).data('id'));
            });
            if (order.length >= 5) {
                inputUpload.prop('disabled', true);
            } else {
                inputUpload.prop('disabled', false);
            }
            imageids.val(order);

            if($('.image', imageContainer).length > 0){
                $('.no-images ').hide();
            } else {
                $('.no-images ').show();
            }
        }

        /**
         * Sort the images
         * @type {Element}
         */
        var sortableList = document.querySelector('.images-list .container');
        var sortable = Sortable.create(sortableList, {
            animation: 200,
            handle: '.image',
            onUpdate: function () {
                updateList();
            }
        });

        /**
         * Populate the errors container
         * @param data
         */
        function populateErrors(data) {
            var errors = '<ul>';
            $.each(data,function (index, element) {
                $.each(element, function (i,e) {
                    errors += "<li>" + e + "</li>";
                });
            });
            errors += "</ul>";
            errorsContainer.html(errors);
        }
    }
});
