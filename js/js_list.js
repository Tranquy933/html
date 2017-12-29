$(function() {
    var pull = $('#pull');
    menu = $('.container-nav .navbar-nav');
    menuHeight = menu.height();

    $(pull).on('click', function(e) {
        e.preventDefault();
        menu.slideToggle();
    });
});
