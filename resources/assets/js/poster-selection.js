$(document).ready(function() {
    if($('.posters-selected').length) {
        selectedContainer = $('.posters-selected');
        var posterSelector = $('.poster-selector');
        var form = hiddenField.parent('form');
        var container =  $('.posters-result',posterSelector);

        // Toggle the selector
        $('.add-posters, .poster-selector > .close').click(function () {
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

        $(document).on('click', '.posters-result .poster', function (){
           toggleSelectedPoster($(this));
        });

    }

    // Add the selected poster to the selection list
    function toggleSelectedPoster(poster) {
        var id = poster.data('id');
        var posterSelected = $('.poster[data-id='+id+']', selectedContainer);
        poster.toggleClass('selected');
        console.log(posterSelected);
        if(posterSelected.length) {
            posterSelected.remove();
        } else {
            $.ajax({
                url: poster.data('url'),
                type: 'post'
            })
            .done(function(data) {
                selectedContainer.append(data);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {

            });
        }
    }

});
