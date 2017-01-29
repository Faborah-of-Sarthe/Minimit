
$(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': Laravel.csrfToken }
    });
});
