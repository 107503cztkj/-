(function ($) {
    'use strict';

    // 1.0 Full Screen Banner Code

    $(window).on('resizeEnd', function () {
        $(".welcome_area, #edu-n-slider img, .coming-soon-area").height($(window).height());
    });

    $(window).on('resize', function () {
        if (this.resizeTO) clearTimeout(this.resizeTO);
        this.resizeTO = setTimeout(function () {
            $(this).trigger('resizeEnd');
        }, 300);
    }).trigger("resize");

    // 2.0 search box active code
    $(".main_menu_area .search_button").on('click', function () {
        $("#search").css('transform', 'scale(1,1)');
        $(".search_box_area").css({
            "transform": "scale(1,1)",
            "transition-delay": "1200ms"
        });
    });

    $("#close_button").on('click', function () {
        $("#search").css('transform', 'scale(1,0)');
        $(".search_box_area").css({
            "transform": "scale(1,0)",
            "transition-delay": "0ms"
        });
    });

    // 3.0 magnific-popup active code 

    $('.magnific-popup').magnificPopup({
        type: 'image'
    });

    $('.video_btn').magnificPopup({
        disableOn: 0,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: true,
        fixedContentPos: false
    });

    // 4.0 counterup active code

    $('.counter').counterUp({
        delay: 10,
        time: 3000
    });

    // 5.0 team slider active code

    $(".testimonials").owlCarousel({
        items: 3,
        margin: 0,
        loop: true,
        nav: false,
        dots: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            }
        }
    });

    // 6.0 team slider active code

    $(".testimonials_home2").owlCarousel({
        items: 2,
        margin: 50,
        loop: true,
        nav: false,
        dots: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 2
            }
        }
    });

    // 7.0 scrollUp active code
    $.scrollUp({
        scrollName: 'scrollUp',
        scrollDistance: 450,
        scrollFrom: 'top',
        scrollSpeed: 500,
        easingType: 'linear',
        animation: 'fade',
        animationSpeed: 200,
        scrollTrigger: false,
        scrollTarget: false,
        scrollText: '<i class="fa fa-angle-up"></i>',
        scrollTitle: false,
        scrollImg: false,
        activeOverlay: false,
        zIndex: 2147483647
    });

    // 8.0 meanmenu active code
    $('.main_menu_area .mainmenu nav').meanmenu();

    // 9.0 wow active code
    new WOW().init();

    // 10.0 PreventDefault a click
    $("a[href='#']").on('click', function ($) {
        $.preventDefault();
    });

    // 11.0 countdown active code
    $('[data-countdown]').each(function () {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function (event) {
            $(this).find(".days").html(event.strftime("%D"));
            $(this).find(".hours").html(event.strftime("%H"));
            $(this).find(".minutes").html(event.strftime("%M"));
            $(this).find(".seconds").html(event.strftime("%S"));
        });
    });

    // 12.0 Preloader active code
    $(window).load(function () {
        $('body').css('overflow-y', 'visible');
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

})(jQuery);