import addonMenu from "./addons/menu.js";
import addonSearch from "./addons/addon-search.js";
// import bsModal from "./addons/bs-modal.js";
addonMenu();
addonSearch();
// bsModal();

$(document).ready(function() {
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 5,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        breakpoints: {
            0: {
                slidesPerView: 3
            },
            768: {
                slidesPerView: 4
            }
        }
    });
    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
    $(".btn__more").click(function() {
        $('.evaluate__company-content').addClass('active');
        $(this).css('display', 'none');
    });
    $('.header__top-item').click(function() {
        $(this).toggleClass('active');
    });
    if ($(window).width() > 575.98) {
        $('.header__top-item:first-child').addClass('active');
    }
    $(window).scroll(function() {
        if ($(window).scrollTop() > $('#header').height()) {
            $('.header__bottom').addClass('scroll');
        } else {
            $('.header__bottom').removeClass('scroll');

        }
    });
    function backTop() {
        var offset = 300;
        $(window).scroll(function() {
            if ($(this).scrollTop() > offset) {
                $('.btn__up').addClass('active');
            } else {
                $('.btn__up').removeClass('active');
            }
            // ($(this).scrollTop() > offset) ? $back_to_top.addClass('active'): $back_to_top.removeClass('active');
        });
        $('.btn__up').on('click', function() {
            $('body,html').animate({
                scrollTop: 0,
            }, 0);
        });
    }
    backTop();
    var heightNewsss = function() {
        var win = $(window);
        var heightNewss = $('.groups-news__pages >li:first-child .items-news__pages ').outerHeight();
        $('.groups-news__pages').css('height', heightNewss);
    };    
    const $chk = $('.chkFilterItem');
    $chk.click(function() {
        const $e = $(this);
        const st_name = $e.data('obj');
        const $obj = $('input[type=hidden][name=' + st_name + ']');
        const v = $e.val();
        if ( !fl_options[st_name] ) {
            fl_options[st_name] = [];
        }
        const index = fl_options[st_name].indexOf(v);
        if ( index === -1 ) {
            fl_options[st_name].push(v);
        }
        else {
            fl_options[st_name].splice(index, 1);
        }
        $obj.val(fl_options[st_name].join(','));
    });
    $('#slPSort').change(function() {
        const $e = $(this);
        $('#txtSlSort').val($e.val());
        $('#frmFilterProd').submit();
    });
    $('#frmRating').submit(function(e) {
        const txtReviews = $('#txtUserReviews').val();
        const txtRatingPoint = $('#txtRatingPoint').val();
        if ( !txtReviews || !txtRatingPoint ) {
            e.preventDefault();
            alert('Mời nhập đầy đủ thông tin yêu cầu !');
        }
    });
    $('#frmRating .rating .stars input[type=radio]').click(function(e) {
        $('#txtRatingPoint').val($(this).val());
    });
})
