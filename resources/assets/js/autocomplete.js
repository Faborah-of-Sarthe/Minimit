$(document).ready(function() {

    //setup before functions
    var typingTimer;                //timer identifier
    var doneTypingInterval = 500;  //time in ms (0.5 seconds)

    //on keyup, start the countdown
    $(document).on('keyup', '.autocomplete-field', function(e){
        // Empty the hidden field on typing
        $('.autofill-hidden').val(null);
        // Ignore arrow keys
        if(e.keyCode == 37 || e.keyCode == 38 || e.keyCode == 39 || e.keyCode == 40)
            return;
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
            var autocompleteList = $('.autocomplete-results');
            autocompleteList.html(data);
            autocompleteList.removeClass('hidden');
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            $(input).removeClass('throbbing');
        });
    }

    //fill hidden oeuvre-id whenever a choice is selected
    function autofillTarget(selectedItem) {
        var oeuvreId = $(selectedItem).attr('data-id');
        var hiddenField = $('.autofill-hidden');
        hiddenField.val(oeuvreId);
        if ($('.autocomplete-field').hasClass('autofill')) {
            $('.autocomplete-field').val($('.autofill-value',selectedItem).text());
        }
    }

    //closing autocomplete list
    function closeAutocompleteList() {
        var autocompleteList = $('.autocomplete-results');
        autocompleteList.addClass('hidden');
    }

    // Bind click on body if on an autocomplete page
    if($('.autocomplete-results').length){
        $(document).on('click', function(e){
            // Close the results pane and autofill the targeted fields
            if ($('.autocomplete-results').is(':visible')) {
                if ($(e.target).hasClass('.result') || $(e.target).parents('.result').length) {
                    var result = ($(e.target).hasClass('.result'))? $(e.target) : $(e.target).parents('.result');
                    autofillTarget(result);
                }
                closeAutocompleteList();
            }
        });
    }

    //enter event
    //$(document).on('keyup')

    //arrow down event

});
