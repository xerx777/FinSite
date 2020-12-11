$(window).scroll(function () {
    if ($(this).scrollTop() > 1) {
        $('nav').addClass('line-bottom');
    } else {
        $('nav').removeClass('line-bottom');
    }
});