$(document).ready(function() {
    if($('.poster-list').length) {
        $(document).on('submit', '.delete-poster', function(e){
            e.preventDefault();
            $.ajax({
                method: 'DELETE',
                url: $(this).prop('action')
            }).done(function(data){
                $('.poster[data-id="'+ data +'"]').remove();
            }).fail(function (data) {
                console.log(data);
            });
        });

    }
});
