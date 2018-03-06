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


function setCookie(name, value) {
    $.post( '/cookie/set' , {'name':name, 'value':value})
    .done(function(data){
    });
}