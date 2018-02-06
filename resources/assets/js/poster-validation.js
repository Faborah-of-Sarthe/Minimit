$(document).ready(function() {
    if($('.poster-update').length) {
        var errorsContainer =  $('.form-errors');
        $('.submit-poster').on('click', function(){
            var errors = false;
            errorsContainer.html('');
            if(!$('.autofill-hidden').val()) {
                errorsContainer.append('<div>' + formErrors.emptyOeuvre + '</div>');
                errors = true;
            }
            if(!$('.image-ids').val()) {
                errorsContainer.append('<div>' + formErrors.emptyPosters + '</div>');
                errors = true;
            }
            if(!errors){
                $('.poster-main-form').submit();
            }
        });
    }
});