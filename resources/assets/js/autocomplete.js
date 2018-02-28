$(document).ready(function() {

    //setup before functions
    var typingTimer;                //timer identifier
    var doneTypingInterval = 500;  //time in ms (0.5 seconds)
    autocompleteField = $('.autocomplete-field'); // Autocompleted field
    autocompleteResults = $('.autocomplete-results'); // Results container
    hiddenField = $('.autofill-hidden'); // Hidden field containing the value
    currentChoice = 0;

    // Prevent moving the caret on up / down arrow navigation
    $(document).on('keydown', '.autocomplete-field', function (e) {
        if(e.keyCode === 38 || e.keyCode === 40 || e.keyCode === 13  || e.keyCode === 9)
           e.preventDefault();
    });

    // On keyup, start the countdown
    $(document).on('keyup', '.autocomplete-field', function(e){
        // Empty the hidden field on typing
       hiddenField.val(null);

        if (e.keyCode !== 40 && e.keyCode !== 38 && e.keyCode !== 13 && e.keyCode !== 9) {
            clearTimeout(typingTimer);
            if ($(this).val() && $(this).val().length >= 2) {
                var input = $(this);
                $(input).addClass('throbbing');
                typingTimer = setTimeout(function() {
                    doneTyping(input);
                }, doneTypingInterval);
            }
        }
        var results = $('.result', autocompleteResults).length;
        if (results > 0) {
            if (e.keyCode === 40) {
                if(currentChoice < (results -1)) {
                    currentChoice++;
                    updateCurrentResult();
                }
            }
            if (e.keyCode === 38) {
                if(currentChoice > 0) {
                    currentChoice--;
                    updateCurrentResult();
                }
            }
            if(e.keyCode === 13 || e.keyCode === 9) {
                autofillTarget($('.active.result', autocompleteResults));
                closeAutocompleteList();
            }
        }
    });



    // User is "finished typing," do something
    function doneTyping(input) {
        $.ajax({
            url: $(input).attr('data-url'),
            type: 'POST',
            data: {oeuvre: $(input).val() }
        })
        .done(function(data) {
            autocompleteResults.html(data);
            autocompleteResults.removeClass('hidden');
            updateCurrentResult();
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            $(input).removeClass('throbbing');
        });
    }

    // Fill hidden oeuvre-id whenever a choice is selected
    function autofillTarget(selectedItem) {
        var oeuvreId = $(selectedItem).attr('data-id');
        hiddenField.val(oeuvreId).change();
        if (autocompleteField.hasClass('autofill')) {
            autocompleteField.val($('.autofill-value',selectedItem).text());
        }
    }

    // Closing autocomplete list
    function closeAutocompleteList() {
        currentChoice = 0;
        autocompleteResults.addClass('hidden');
        autocompleteResults.html('');
        updateCurrentResult()
    }

    // Bind click on body if on an autocomplete page
    if(autocompleteResults.length){
        $(document).on('click', function(e){
            // Close the results pane and autofill the targeted fields
            if (autocompleteResults.is(':visible')) {
                if ($(e.target).hasClass('.result') || $(e.target).parents('.result').length) {
                    var result = ($(e.target).hasClass('.result'))? $(e.target) : $(e.target).parents('.result');
                    autofillTarget(result);
                }
                closeAutocompleteList();
            }
        });
    }

    /**
     * Update the active option on the autocomplete field
     */
    function updateCurrentResult() {
        $('.result', autocompleteResults).each(function(index, element) {
            if (index === currentChoice) {
                $(element).addClass('active');
            } else {
                $(element).removeClass('active');
            }
        });
    }

});
