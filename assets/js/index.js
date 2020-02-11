$(document).ready(function() {
    $('a').click(function(event) {
        event.preventDefault();

        let target = $(this).attr('href');

        $("html, body").animate({ scrollTop: $(target).offset().top }, 1000);
    })

    var btn = $('#btnBackTop');

    $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
    });
})
