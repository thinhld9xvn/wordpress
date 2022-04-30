$(document).ready(function() {

    $(".tag-prds__mains .nav a").click(function() {
        $($(this).attr('href')).siblings().removeClass(' show active');
        $($(this).attr('href')).addClass(' show active');
        $(".tag-prds__mains .nav a").removeClass("active");
        $(this).addClass('active');
    });

    $(".tag-prds__mains .nav a:nth-child(1)").click(function() {
        $(".tag-prds__mains .nav a:nth-child(2)").removeClass("before-tag__prds");
    });

    $(".tag-prds__mains .nav a:nth-child(2)").click(function() {
        $(".tag-prds__mains .nav a:nth-child(1)").addClass("before-tag__prds");
        $(".tag-prds__mains .nav a").removeClass("active");
        $(".tag-prds__mains .nav a:nth-child(2)").addClass("active");
    });

    $(".tag-prds__mains .nav a:nth-child(3)").click(function() {
        $(".tag-prds__mains .nav a:nth-child(2)").addClass("before-tag__prds");
        $(".tag-prds__mains .nav a:nth-child(1)").removeClass("before-tag__prds");

    });


    // var win = await $(window);

    $('.items-prds__tags').parent('').parent('').each(function() {
        var highestBoxx = 0;
        $(this).find('.items-prds__tags .names-prds__tags').each(function() {
            if ($(this).height() > highestBoxx) {
                highestBoxx = $(this).height();
            }
        })
        $(this).find('.items-prds__tags .names-prds__tags').height(highestBoxx);
    });

    if ($('.sl-prds__mains').length === 0) return;
    var swiper2 = new Swiper('.sl-prds__mains', {
        slidesPerView: 5,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 5000,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        draggable: true,
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 2,
                spaceBetween: 5
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            992: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
            1200: {
                slidesPerView: 5,
                spaceBetween: 20,
            },
            1440: {
                slidesPerView: 5,
                spaceBetween: 20,
            }
        }
    });

    $(".showss-button-prev").click(function() {
        $(this).parent(".group-btns__showss").parent().find(".swiper .swiper-button-prev").trigger("click");
    });

    $(".showss-button-next").click(function() {
        $(this).parent(".group-btns__showss").parent().find(".swiper .swiper-button-next").trigger("click");
    });
})
