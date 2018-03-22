$(document).ready(function() {
    if($('.items-list').length) {
        $(document).on('submit', '.delete-item', function(e){
            e.preventDefault();
            $.ajax({
                method: 'DELETE',
                url: $(this).prop('action')
            }).done(function(data){
                $('.item[data-id="'+ data +'"]').remove();
            }).fail(function (data) {
                console.log(data);
            });
        });

    }
});
