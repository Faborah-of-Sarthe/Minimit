$(document).ready(function() {
    if($('.posters-filter').length) {
        var container = $('.posters-container');
        var form = hiddenField.parent('form');

        // Load all the posters on page loading
        loadPosters(form.attr('action'), '', container);

        // Filter the posters by oeuvre
        $(document).on('change', hiddenField, function () {
            var data = {oeuvre: hiddenField.val() };
            loadPosters(form.attr('action'), data, container);
        });

        // Handle ajax pagination
        $(document).on('click', '.pagination a', function (e){
            e.preventDefault();
            loadPosters($(this).attr('href'), '', container);
        });

    }
});
