$(document).ready(function() {
    if($('.posters-selected').length) {

        var posterSelector = $('.poster-selector');
        var form = hiddenField.parent('form');
        var container =  $('.posters-result',posterSelector);
        // Toggle the selector
        $('.add-posters').click(function () {
            posterSelector.toggleClass('hidden');
        });

        // Filter the posters by oeuvre
        $(document).on('change', hiddenField, function () {
            var data = {oeuvre: hiddenField.val() };
            loadPosters(form.attr('action'), data, container);
        });

        $(document).on('click', '.pagination a', function (e){
            e.preventDefault();
            loadPosters($(this).attr('href'), '', container);
        });

    }
});