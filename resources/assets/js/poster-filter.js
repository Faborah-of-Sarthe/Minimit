$(document).ready(function() {
    if($('.posters-filter').length) {
        var container = $('.posters-container');
        var form = hiddenField.parent('form');

        // Load all the posters on page loading
        loadPosters(form.attr('action'));

        // Filter the posters by oeuvre
        $(document).on('change', hiddenField, function () {
            var data = {oeuvre: hiddenField.val() };
            loadPosters(form.attr('action'), data);
        });

        // Handle ajax pagination
        $(document).on('click', '.pagination a', function (e){
            e.preventDefault();
            loadPosters($(this).attr('href'));
        });

        function loadPosters(action, data) {
            $.ajax({
                url: action,
                type: 'get',
                data: (data) ? data : ''
            })
            .done(function(data) {
                container.html(data);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {

            });
        }
    }
});