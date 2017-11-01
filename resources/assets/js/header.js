$(document).ready(function() {

    // Initial states

    // Click event
    $(document).on('click', '.burger-menu', function () {
        $(this).find(".cross").toggle();
        $(this).find(".icon").toggle();
        var mobileMenu = $(this).parent().find(".header-part.menu-content")
        mobileMenu.toggleClass('open');
    });

});