// Load a list of posters
function loadPosters(action, data, container) {
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

