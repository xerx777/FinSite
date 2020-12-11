$('a[href^="#"]').click(function(){
    var headerHeight = 90;

    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top - headerHeight
    }, 500);
    return false;
});