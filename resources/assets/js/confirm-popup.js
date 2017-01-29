$(document).ready(function() {

    /**
     * Display a pop-up whenever manual confirmation is needed
     */
     $(document).on('click', '.needs-confirm', function(event){
        event.preventDefault();
        var popupContent = $(this).attr('data-text');
        confirmFormId = '.id-' + $(this).attr('data-id');
        console.log(confirmFormId);
        $('.delete-dialog .popup-message').html(popupContent);
        $('.delete-dialog').show();
     });

    $('.delete-dialog .confirm-btn').on('click', function(){
        if ($(confirmFormId).length != 0) {
            $(confirmFormId).submit();
            $('.delete-dialog').hide();
        }
    });

   $('.delete-dialog .cancel-btn').on('click', function(){
        $('.delete-dialog').hide();
   });

});
