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
           updatePosterList($(this).data('id'));
        });


        $(document).on('click', '.posters-selected .delete', function (){
            updatePosterList($(this).parents('.poster').data('id'));
        });

        // The node to be monitored
        var target = $('.posters-result')[0];

        // Observe the posters after an ajax call to add the "selected" class to the already selected ones
        var observer = new MutationObserver(function( mutations ) {
            mutations.forEach(function( mutation ) {
                var newNodes = mutation.addedNodes;
                if( newNodes !== null ) { // If there are new nodes added
                    var $nodes = $( newNodes ); // jQuery set
                    updateSelectedClass($nodes);
                }
            });
        });

        var config = {
            attributes: true,
            childList: true,
            characterData: true
        };
        observer.observe(target, config);


    }

    // Add the selected poster to the selection list
    function updatePosterList(id) {
        toggleSelectedPoster(id);
        toggleListPoster(id);
    }

    // Toggle the 'selected' class on the selector's posters
    function toggleSelectedPoster(id) {
        var poster = $('.poster[data-id='+id+']', posterSelector);
        if(poster.length) {
            poster.toggleClass('selected');
        }
    }



    // Add or remove a poster in the selected container
    function toggleListPoster(id) {
        var poster = $('.poster[data-id='+id+']', posterSelector);
        var posterSelected = $('.poster[data-id='+id+']', selectedContainer);
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

    // Add or remove the selected class for the provided nodes
    function updateSelectedClass(nodes) {
        nodes.each(function() {
            if ($(this).hasClass('poster')){
                var id = $( this ).data('id');
                if( $('.poster[data-id='+id+']', selectedContainer).length && !$(this).hasClass('selected') ) {
                    $(this).addClass('selected');
                } else {
                    $(this).removeClass('selected');
                }
            }
        });
    }

});
