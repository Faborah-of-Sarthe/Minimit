$(document).ready(function() {

    //setup before functions
    var typingTimer;                //timer identifier
    var doneTypingInterval = 500;  //time in ms (0.5 seconds)

    //on keyup, start the countdown
    $('.autocomplete-field').on('keyup', function(){
        clearTimeout(typingTimer);
        if ($(this).val()) {
            var input = $(this);
            $(input).addClass('throbbing');
            typingTimer = setTimeout(function() {
                doneTyping(input);
            }, doneTypingInterval);
        }
    });

    //user is "finished typing," do something
    function doneTyping(input) {
        $.ajax({
            url: $(input).attr('data-url'),
            type: 'POST',
            data: {oeuvre: $(input).val() }
        })
        .done(function(data) {
            $('.autocomplete-results').html(data);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            $(input).removeClass('throbbing');
        });
    }
});
