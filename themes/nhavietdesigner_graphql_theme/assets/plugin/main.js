'use strict';
jQuery(document).ready(function ($) {

    $(".vk-content > div").scroll(function () {
        if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
            $("#scrollUp").show();
        }
        else {
            $("#scrollUp").hide();
        }


    });


    $('.page-template-pageabout-php .vk-menu__child a[href*=\\#]').on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $(this.hash).offset().top
        }, 500);


    });

    $(window).on('load', function () {
        TruncateLine.init();
    });

    $(function () {

        MobileMenu.init();
        PreLoader.init();
        AnimationScrollPage.init();
        // CountTo.init();
        // ParallaxBackground.init();
        Slider.init();
        // InputFile.init();
        ScrollToTop.init();
        CustomTheme.init();
        // PriceRange.init();
        // CalcQuantity.init();
        // StickyScroll.init();
        // ToolTip.init();
        // Barrating.init(); //require poper.js
        // NiceSelect.init();
        // ScrollBar.init();
        // FormValidation.init();


        function textSplit(els) {

            els = $(els);

            els.each(function () {
                var txtArray;
                var result = '';

                var el = $(this);
                var txt = el.text().trim();
                txtArray = txt.split(' ');

                txtArray.forEach(function (value) {
                    result += '<span>' + value + '</span>'
                });

                el.html(result);

            });
        }

        textSplit('.test')

    });


    var FormValidation = function () {
        var _initInstances = function () {
            var checkoutForm = function () {
                var els = $('.vk-form--checkout input, .vk-form--checkout textarea');

                function telIsNumberOnly() {
                    var el = $("#tel");
                    el.keydown(function (e) {
                        // Allow: backspace, devare, tab, escape, enter and .
                        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                            // Allow: Ctrl/cmd+A
                            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                            // Allow: Ctrl/cmd+C
                            (e.keyCode === 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                            // Allow: Ctrl/cmd+X
                            (e.keyCode === 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                            // Allow: home, end, left, right
                            (e.keyCode >= 35 && e.keyCode <= 39)) {
                            // var it happen, don't do anything
                            return;
                        }
                        // Ensure that it is a number and stop the keypress
                        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                            e.preventDefault();
                        }
                    });
                }


                function inputHandleFocus() {
                    els.on('focus', function () {
                        $(this).addClass('active');
                    })
                }

                function inputHandleBlur() {
                    els.on('blur', function () {
                        var el = $(this);
                        console.log(el.val().trim().length);
                        if (el.val().trim().length < 1) {
                            $(this).removeClass('active');
                        }


                    })
                }

                function checkoutFormValidation() {
                    var el = $("#checkoutForm");

                    $.validator.addMethod("valueNotEquals", function (value, element, arg) {
                        return arg !== value;
                    }, "Value must not equal arg.");

                    el.validate({

                        rules: {
                            fullname: {
                                required: true,
                                minlength: 2,
                            },
                            tel: {
                                required: true,
                                minlength: 10,
                                maxlength: 11,
                            },
                            province: {
                                required: true,
                                valueNotEquals: '0'
                            },
                            district: {
                                required: true,
                                valueNotEquals: '0'
                            },
                            addr: {
                                required: true,
                            }
                        },

                        //noti
                        messages: {
                            fullname: {
                                required: "Nhập họ tên của bạn",
                                minlength: "Họ tên của bạn quá ngắn"
                            },
                            tel: {
                                required: "Nhập số điện thoại của bạn",
                                minlength: "Số điện thoại không đúng định dạng 10 hoặc 11 số",
                                maxlength: "Số điện thoại không đúng định dạng 10 hoặc 11 số",
                            },
                            province: {
                                required: "Chọn tỉnh/thành",
                                valueNotEquals: 'Chọn tỉnh/thành'
                            },
                            district: {
                                required: "Chọn quận/huyện",
                                valueNotEquals: 'Chọn quận/huyện'
                            },
                            addr: {
                                required: "Nhập địa nhận hàng",
                            }
                        }
                    });
                }

                function run() {
                    telIsNumberOnly();
                    inputHandleFocus();
                    inputHandleBlur();
                    checkoutFormValidation();
                }

                run();

            }();


            $("#txtboxToFilter").keydown(function (e) {
                // Allow: backspace, devare, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl/cmd+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: Ctrl/cmd+C
                    (e.keyCode === 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: Ctrl/cmd+X
                    (e.keyCode === 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // var it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });


            $("#signupForm").validate({
                rules: {
                    firstname: "required",
                    test: {
                        required: true,
                        minlength: 3

                    },
                    tel: {
                        required: true,
                        minlength: 10,
                        maxlength: 11
                    },
                    username: {
                        required: true,
                        minlength: 5
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    agree: "required"
                },

                //noti
                messages: {
                    firstname: "Nhập họ tên của bạn",
                    test: {
                        required: 'nhập lại test',
                        minlength: 'chưa dủ 3 ký tự'
                    },

                    tel: {
                        required: "Nhập số điện thoại của bạn",
                        minlength: 'Số điện thoại không phù hợp',
                        maxlength: 'Số điện thoại không phù hợp',
                    },
                    username: {
                        required: "Please enter a username",
                        minlength: "Tài khoản đăng nhập phải có ít nhất {0} ký tự"
                    },
                    password: {
                        required: "Nhập mật khẩu của bạn",
                        minlength: "Mật khẩu phải có ít nhất {0} ký tự"
                    },
                    confirm_password: {
                        required: "Nhập mật khẩu của bạn",
                        minlength: "Mật khẩu phải có ít nhất {0} ký tự",
                        equalTo: "Nhập lại mật khẩu chưa đúng"
                    },
                    email: "Email không hợp lệ",
                    agree: "Bạn chưa đồng ý với điều khoản của chúng tôi",
                },


                submitHandler: function (form) {
                    console.log(form);
                    postContent();

                },
            });

        };

        return {
            init: function () {
                _initInstances();
            }


        };
    }();

    var ScrollBar = function () {
        var _initInstances = function () {
            $('.scrollbar-inner').scrollbar();
        };

        return {
            init: function () {
                _initInstances();
            }


        };
    }();

    var NiceSelect = function () {
        var _initInstances = function () {
            var el = $('[data-nice-select]');
            el.niceSelect();

        };

        return {
            init: function () {
                _initInstances();
            }


        };
    }();

    var Barrating = function () {
        var _initInstances = function () {
            var el = $('[data-rate]');
            el.barrating({
                theme: 'fontawesome-stars'
            });

        };

        return {
            init: function () {
                _initInstances();
            }


        };
    }();

    var TruncateLine = function () {
        var _initInstances = function () {
            var el = $('[data-truncate-lines]');
            el.each(function () {
                var lines = $(this).data('truncate-lines');
                console.log(lines);
                $(this).truncate({
                    lines: lines
                });
            })

        };

        return {
            init: function () {
                _initInstances();
            },
            responsive: function () {
                _initInstances();
            }


        };
    }();

    var ToolTip = function () {

        var _initInstances = function () {

            $('[data-toggle="tooltip"]').tooltip({})

        };

        return {
            init: function () {
                _initInstances();
            }

        };
    }();

    var StickyScroll = function () {

        var _initInstances = function () {

            var obj = $('[data-layout="sticky"]');
            var shrinkHeader = 300;

            obj.stickOnScroll({
                topOffset: 0,
                bottomOffset: 5,
                footerElement: null,
                viewport: window,
                stickClass: 'stickOnScroll-on',
                setParentOnStick: false,
                setWidthOnStick: false,
                onStick: null,
                onUnStick: null
            });


            // obj.next().css({
            //     'position':'relative',
            //     'top': obj.outerHeight(true) + 'px',
            // });


            $(window).scroll(function () {
                var scroll = getCurrentScroll();
                if (scroll >= shrinkHeader) {
                    obj.addClass('_shrink');
                } else {
                    obj.removeClass('_shrink');
                }
            });

            var getCurrentScroll = function () {
                return window.pageYOffset || document.documentElement.scrollTop;
            }

        };

        return {
            init: function () {
                _initInstances();
            }

        };
    }();

    var PreLoader = function () {
        var _initInstances = function () {
            $('.animsition').animsition({
                // loadingClass: 'loader',
                inDuration: 900,
                outDuration: 500,
                linkElement: 'a:not([data-fancybox]) a:not([data-image]) a:not([target="_blank"]):not([href^="#"]):not([href^="javascript:void(0);"]):not([href^="callto:"]):not([href^="mailto:"])',
            });
        };

        return {
            init: function () {
                _initInstances();
            }
        };
    }();

    var MobileMenu = function () {
        var _initInstances = function () {

            var mobileMenu = $('[data-menu]');

            if (mobileMenu.length) {
                mobileMenu.each(function () {
                    var el = $(this).data('menu');

                    $(el).mmenu({
                        "extensions": [
                            "position-right",
                            // "fx-panels-zoom",
                            "pagedim-black",
                            // "theme-dark"
                        ],
                        // "navbars": [
                        //     {
                        //         "position": "bottom",
                        //         "content": [
                        //             "<a class='fa fa-envelope' href='#/'></a>",
                        //             "<a class='fa fa-twitter' href='#/'></a>",
                        //             "<a class='fa fa-facebook' href='#/'></a>"
                        //         ]
                        //     }
                        // ]
                    });
                })


            }

        };


        return {
            init: function () {
                _initInstances();
            }
        };
    }();

    var AnimationScrollPage = function () {
        var _initInstances = function () {

            var anchor = $('[data-animation]');

            anchor.waypoint(function (direction) {


                var el = $(this.element);
                var animationName = el.data('animation');
                var animationDuration = el.data('animation-duration');
                var animationDelay = el.data('animation-delay');

                el.css('opacity', 1);
                if (animationDuration) {

                    el.css({
                        "-webkit-animation-duration": animationDuration + "s",
                        "animation-duration": animationDuration + "s"
                    })
                }

                if (animationDelay) {

                    el.css({
                        "-webkit-animation-delay": animationDelay + "s",
                        "animation-delay": animationDelay + "s"
                    })
                }

                el.addClass('animated ' + animationName);
            }, {
                offset: '90%',
                triggerOnce: true
            });
        };

        return {
            init: function () {
                _initInstances();
            }
        };
    }();

    var CountTo = function () {
        var _initInstances = function () {
            var el = $('.vk-countto');
            el.waypoint({
                handler: function (direction) {
                    $(this.element).countTo({
                        refreshInterval: 50,
                        formatter: function (value, options) {
                            return numeral(value).format('0,0');
                        }
                    });
                },
                offset: '100%',
                triggerOnce: true,
            });
        };

        return {
            init: function () {
                _initInstances();
            }
        };
    }();

    var ParallaxBackground = function () {
        var _initInstances = function () {
            $('.vk-parallax').attr('data-stellar-background-ratio', '0.3');
            $.stellar({
                verticalOffset: 0,
                horizontalScrolling: false,
            });
        };

        return {
            init: function () {
                _initInstances();
            }
        };
    }();

    var Slider = function () {

        var _initInstances = function () {


            var slider = $('[data-slider]');
            slider.addClass('vk-slider');


            $('[data-slider="slider-nav"]').slick({

                slidesToShow: 4,
                slidesToScroll: 4,
                autoplay: false,
                autoplaySpeed: 4000,
                // swipeToSlide:true,
                infinite: false,
                speed: 250,

                dots: false,
                arrows: true,
                prevArrow: '<button class="vk-slider__arrow _prev"><i class="fa fa-angle-left"></i></button>',
                nextArrow: '<button class="vk-slider__arrow _next"><i class="fa fa-angle-right"></i></button>',
            });

            $('[data-slider="banner"]').slick({
                slidesToShow: 1,
                fade: true,
                autoplay: true,
                autoplaySpeed: 4000,
                infinite: true,
                pauseOnHover: false,
                speed: 250,

                dots: false,
                arrows: false,
                prevArrow: '<button class="vk-slider__arrow _prev"><i class="fa fa-angle-left"></i></button>',
                nextArrow: '<button class="vk-slider__arrow _next"><i class="fa fa-angle-right"></i></button>',

                responsive: [{
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                    }

                }, {

                    breakpoint: 768,
                    settings: {
                        arrows: false,
                    }

                }, {

                    breakpoint: 576,
                    settings: {
                        arrows: false,
                    }

                }]
            });

            $('[data-slider="banner-2"]').slick({
                slidesToShow: 1,
                fade: false,
                autoplay: true,
                autoplaySpeed: 4000,
                infinite: true,
                pauseOnHover: false,
                speed: 400,

                dots: false,
                arrows: true,
                prevArrow: '<button class="vk-slider__arrow _prev"><i class="ti-angle-left"></i></button>',
                nextArrow: '<button class="vk-slider__arrow _next"><i class="ti-angle-right"></i></button>',

                responsive: [{
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                    }

                }, {

                    breakpoint: 768,
                    settings: {
                        arrows: false,
                    }

                }, {

                    breakpoint: 576,
                    settings: {
                        arrows: false,
                    }

                }]
            });

            var shop1 = $('[data-slider="shop-1"]');

            shop1.slick({
                slidesToShow: 1,
                fade: false,
                autoplay: false,
                autoplaySpeed: 4000,
                infinite: true,
                pauseOnHover: false,
                speed: 1000,
                vertical: true,
                verticalSwiping: true,
                touchThreshold: 50,

                dots: false,
                arrows: false,
                prevArrow: '<button class="vk-slider__arrow _prev"><i class="fa fa-angle-left"></i></button>',
                nextArrow: '<button class="vk-slider__arrow _next"><i class="fa fa-angle-right"></i></button>',

                responsive: [{
                    breakpoint: 992,
                    settings: 'unslick'

                }]
            });


            if (shop1.length) {

                var timeout = 0;


                $(window).on('keyup', function (e) {
                    if (e.keyCode === 38) { //up
                        (function myLoop(i) {
                            setTimeout(function () {
                                $(shop1[i]).slick('slickPrev');
                                i++
                                if (i < 3) {
                                    myLoop(i)

                                }
                            }, timeout)
                        })(0);
                    } else if (e.keyCode === 40) { //down
                        (function myLoop(i) {
                            setTimeout(function () {
                                $(shop1[i]).slick('slickNext');
                                i++
                                if (i < 3) {
                                    myLoop(i)

                                }
                            }, timeout)
                        })(0);
                    }
                })


                $(window).on('wheel', function (e) {
                    var dektaY = e.originalEvent.deltaY;
                    var direction = dektaY > 0 ? "down" : "up";

                    if (direction === "down") {


                        (function myLoop(i) {
                            setTimeout(function () {
                                $(shop1[i]).slick('slickNext');
                                i++
                                if (i < 3) {
                                    myLoop(i)

                                }
                            }, timeout)
                        })(0);


                    } else {
                        (function myLoop(i) {
                            setTimeout(function () {
                                $(shop1[i]).slick('slickPrev');
                                i++
                                if (i < 3) {
                                    myLoop(i)

                                }
                            }, timeout)
                        })(0);
                    }

                })

            }


            $('[data-slider="design-detail"]').slick({
                slidesToShow: 1,
                fade: true,
                autoplay: true,
                autoplaySpeed: 4000,
                infinite: true,
                pauseOnHover: false,
                speed: 250,

                dots: false,
                arrows: true,
                prevArrow: '<button class="vk-slider__arrow _prev"><i class="ti-angle-left"></i></button>',
                nextArrow: '<button class="vk-slider__arrow _next"><i class="ti-angle-right"></i></button>',

                responsive: [{
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                    }

                }, {

                    breakpoint: 768,
                    settings: {
                        arrows: false,
                    }

                }, {

                    breakpoint: 576,
                    settings: {
                        arrows: false,
                    }

                }]
            });

            // $('[data-slider="design-detail"]').css('opacity',0);
            // $('.modal').on('shown.bs.modal', function (e) {
            //     $('[data-slider="design-detail"]').resize();
            //     setTimeout(function(){ $('[data-slider="design-detail"]').css('opacity',1);},500)
            //
            //
            // })

            var designSlider = $('[data-slider="design"]');
            designSlider.slick({
                slidesToShow: 2,
                slidesToScroll: 2,
                autoplay: false,
                autoplaySpeed: 4000,
                touchThreshold: 30,
                // swipeToSlide: true,
                infinite: false,
                speed: 400,
                vertical: true,
                verticalSwiping: true,

                dots: false,
                arrows: false,
                prevArrow: '<button class="vk-slider__arrow _prev"><i class="fa fa-angle-left"></i></button>',
                nextArrow: '<button class="vk-slider__arrow _next"><i class="fa fa-angle-right"></i></button>',

            })

            designSlider.on('wheel', function (e) {
                var whell = e.originalEvent.deltaY;

                if (whell > 0) {
                    designSlider.slick('slickNext')
                } else {
                    designSlider.slick('slickPrev')
                }

            })

            $('[data-slider="relate"]').slick({
                slidesToShow: 4,
                autoplay: false,
                autoplaySpeed: 4000,
                swipeToSlide: true,
                infinite: true,
                speed: 250,

                dots: false,
                arrows: true,
                prevArrow: '<button class="vk-slider__arrow _prev"><i class="fa fa-angle-left"></i></button>',
                nextArrow: '<button class="vk-slider__arrow _next"><i class="fa fa-angle-right"></i></button>',

                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }

                }, {

                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }

                }, {

                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                    }

                }]
            })

            $('[data-slider="blog-relate"]').slick({
                slidesToShow: 3,
                autoplay: false,
                autoplaySpeed: 4000,
                swipeToSlide: true,
                infinite: true,
                speed: 250,

                dots: false,
                arrows: false,
                prevArrow: '<button class="vk-slider__arrow _prev"><i class="fa fa-angle-left"></i></button>',
                nextArrow: '<button class="vk-slider__arrow _next"><i class="fa fa-angle-right"></i></button>',

                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }

                }, {

                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }

                }, {

                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                    }

                }]
            })

            $('[data-slider="cus"]').slick({
                slidesToShow: 4,
                autoplay: true,
                autoplaySpeed: 4000,
                swipeToSlide: true,
                infinite: true,
                speed: 250,
                rows: 2,

                dots: false,
                arrows: false,
                prevArrow: '<button class="vk-slider__arrow _prev"><i class="fa fa-angle-left"></i></button>',
                nextArrow: '<button class="vk-slider__arrow _next"><i class="fa fa-angle-right"></i></button>',

                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                    }

                }, {

                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                    }

                }, {

                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                    }

                }]
            })


        };

        return {
            init: function () {
                _initInstances();
            }
        };
    }();

    var MasonryItem = function () {
        var masonry = '[data-layout="masonry"]';
        var masonryItem = '[data-layout="masonry-item"]'
        var masonryFix = '[data-layout="masonry-fix"]';

        var buttonFilterDefault = '[data-filter-button="default"]';
        var buttonFilterFix = '[data-filter-button="filter-fix"]';

        var filterFix = function () {

            var delayFilter = function () {
                $(masonryFix).isotope({
                    filter: '.first',
                })
            }

            setTimeout(delayFilter, 100);
            $(buttonFilterFix)

                .on('click', 'li', function () {
                    var filterValue = $(this).attr('data-filter');
                    $(masonryFix).isotope({
                        filter: filterValue,
                    });

                    return false;
                })
                .on('change', function () {

                    // get filter value from option value
                    var filterValue = this.value;
                    $(masonryFix).isotope({
                        filter: filterValue,

                    });

                    return false;
                });


        }

        var masonryLayout = function () {
            $(masonry).isotope({
                // options...
                itemSelector: masonryItem,
                masonry: {
                    columnWidth: masonryItem,
                }
            });

            //filter items on button click
            $(buttonFilterDefault)
                .on('click', 'li', function () {
                    var filterValue = $(this).attr('data-filter');
                    console.log(filterValue);
                    $(masonry).isotope({
                        filter: filterValue,

                    });

                    return false;
                })
                .on('change', function () {
                    // get filter value from option value
                    var filterValue = this.value;
                    // console.log(filterValue);
                    $(masonry).isotope({
                        filter: filterValue,

                    });

                    return false;
                });
        };

        var _initInstances = function () {
            masonryLayout();
            filterFix();

        };

        return {
            init: function () {
                _initInstances();
            },

            responsive: function () {

            }
        };
    }();

    var ScrollToTop = function () {

        var _initInstances = function () {
            $.scrollUp({
                scrollText: '<i class="fa fa-angle-up"></i>',
                scrollSpeed: 500,
                zIndex: 1,

            });

            $('[data-scroll-to^="#"]').on('click', function (event) {

                var target = $(this.getAttribute('data-scroll-to'));
                var offset = this.getAttribute('data-scroll-offset');
                offset = parseFloat(offset);
                console.log(offset)
                if (target.length) {
                    event.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top - offset

                    }, 1000);
                }

            });

        };

        return {
            init: function () {
                _initInstances();
            }
        };
    }();

    var PriceRange = function () {

        var _initInstances = function () {
            var slider_range = $('#slider-range');

            if (slider_range.length) {

                var min = slider_range.data('min');
                var max = slider_range.data('max');

                var amount1 = slider_range.siblings('#amount1');
                var amount2 = slider_range.siblings('#amount2');

                var text_amount1 = slider_range.siblings('.vk-range__show').find('#text_amount1');
                var text_amount2 = slider_range.siblings('.vk-range__show').find('#text_amount2');

                slider_range.slider({
                    range: true,
                    min: min,
                    max: max,
                    values: [min + max * .1, max - max * .1],
                    slide: function (event, ui) {
                        amount1.val(ui.values[0]);
                        amount2.val(ui.values[1]);

                        //value
                        text_amount1.text(numeral(ui.values[0]).format('0,0'));
                        text_amount2.text(numeral(ui.values[1]).format('0,0'));
                    }
                });

                //value
                amount1.val(slider_range.slider("values", 0));
                amount2.val(slider_range.slider("values", 1));
                //text
                text_amount1.text(numeral(slider_range.slider("values", 0)).format('0,0'));
                text_amount2.text(numeral(slider_range.slider("values", 1)).format('0,0'));

            }


        };

        return {
            init: function () {
                _initInstances();
            }
        };
    }();

    var CalcQuantity = function () {
        var _initInstances = function () {

            var calculatorDefault = function () {
                $("[data-calculator] .vk-btn").on("click", function () {

                    var $button = $(this);
                    var oldValue = $button.siblings("input").val();
                    var newVal = 0;

                    if ($button.attr('data-index') === "plus") {

                        var newVal = parseFloat(oldValue) + 1;

                    } else {
                        // Don't allow decrementing below zero
                        if (oldValue > 1) {
                            newVal = parseFloat(oldValue) - 1;
                        } else {
                            newVal = 1;
                        }
                    }

                    $button.siblings("input").val(newVal);

                    return false;
                });
            }();

            var calculatorSync = function () {
                function handleClick() {
                    $("[data-calculator-cart] .vk-btn").on("click", function () {

                        var button = $(this);
                        var parent = button.closest('tr');
                        var oldValue = button.siblings("input").val();
                        var newVal;

                        if (button.attr('data-index') === "plus") {

                            if (oldValue > 0) {
                                newVal = parseFloat(oldValue) + 1;
                            } else {
                                newVal = 1;
                            }

                        } else {
                            // Don't allow decrementing below zero
                            if (oldValue > 1) {
                                newVal = parseFloat(oldValue) - 1;
                            } else {
                                newVal = 1;
                            }
                        }

                        button.siblings("input").val(newVal);

                        //cal sync

                        calTotal(parent, newVal);

                        return false;
                    });
                }

                function handChange() {
                    $('.vk-calculator input').on('keyup', function (e) {
                        var keyCode = e.keyCode;

                        var parent = $(this).closest('tr');
                        var newVal = $(this).val();

                        if (newVal.length === 0) {
                            $(this).val(0);
                        }
                        calTotal(parent, newVal);
                        if (keyCode === 8) {
                            calTotal(parent, newVal);
                        }

                        if (keyCode === 43 || keyCode === 45) {
                            return false;
                        }
                    })
                }

                function init() {
                    var rowDataFirst = $('.vk-table--cart tbody tr:first');

                    if (rowDataFirst.length) {
                        var newVal = rowDataFirst.find('.vk-calculator input').val();
                        newVal = parseFloat(newVal);

                        calTotal(rowDataFirst, newVal);
                    }
                }

                function calTotal(parent, newVal) {
                    var price = parent.find('.vk-shopcart-item__price').data('price');
                    var priceTotal = parent.find('.vk-shopcart-item__price--total');
                    // console.log(price);

                    var result = price * newVal;


                    var resultPrime = result;

                    parent.siblings().each(function () {
                        var priceSibling = $(this).find('.vk-shopcart-item__price').data('price');
                        var quantitySibling = $(this).find('.vk-calculator input').val();
                        // console.log(priceSibling);

                        priceSibling = parseFloat(priceSibling);
                        quantitySibling = parseFloat(quantitySibling);

                        resultPrime += priceSibling * quantitySibling;


                    });

                    priceTotal.text(numeral(result).format('0,0'));
                    $('#shopcartPriceTotal').text(numeral(resultPrime).format('0,0'))


                }

                function cartRowDataDevare() {
                    $('.vk-shopcart-item__btn-del').on('click', function (e) {
                        e.preventDefault();

                        var parent = $(this).closest('tr');
                        calTotal(parent, 0)
                        parent.remove();

                        return false;
                    })
                };

                function run() {
                    init();
                    handleClick();
                    handChange();
                    cartRowDataDevare();
                }

                run();

            }();

        };

        return {
            init: function () {
                _initInstances();
            }
        };
    }();

    var CustomTheme = function () {

        var _initInstances = function () {

            var onpageLoadDocument = function () {


            }();

            var onePageScroll = function () {
                if ($(window).width() > 992) {
                    var myFullpage = new fullpage('#fullpage', {
                        verticalCentered: true,
                        onLeave: function (origin, destination, direction) {
                            //section 2
                            if (destination.index == 2) {

                                $('[data-animation]').each(function () {
                                    var animationName = $(this).data('animation');
                                    var animationDelay = $(this).data('animation-delay');
                                    var animationDuration = $(this).data('animation-delay');
                                    // console.log(animationDelay);

                                    // $(this).css({
                                    //     'animation-delay': animationDelay +'s',
                                    //     'animation-duration': animationDuration+'s'
                                    // });

                                    $(this).addClass('animated ' + animationName);

                                });

                            }

                            //back to original state
                            // else if(origin && origin.index == 2){
                            // $('[data-animation]').each(function(){
                            // var animationName = $(this).data('animation');
                            // var animationDelay = $(this).data('animation-delay');
                            // var animationDuration = $(this).data('animation-delay');

                            // $(this).css({
                            //     'animation-delay': animationDelay,
                            //     'animation-duration': animationDuration
                            // });

                            // $(this).removeClass('animated '+ animationName);

                            // });
                            // }

                            //section 3 is using the state classes to fire the animation
                            //see the CSS code above!
                        }

                    });
                }

                var fullpage1 = $('#fullpage-1');
                var matrix = [1, 0, 0, 1, 0, 0];
                fullpage1.css('transform', 'matrix(' + matrix.toString() + ')')
                var items = fullpage1.find('._item');
                var count = 3;
                var row = items.length / 3;

                items.each(function (i) {

                    $(this).css('z-index', items.length - i);

                });

                if ($(window).width() > 992) {
                    $(document).on('wheel', function (e) {
                        var dektaY = e.originalEvent.deltaY;
                        var direction = dektaY > 0 ? "down" : "up";
                        var windowHeight = $(window).height();
                        var el = fullpage1
                        var contentHeight = el.height();
                        var offset = windowHeight / 2
                        var heightTarget = contentHeight - offset;

                        row = Math.abs(parseInt(row));

                        if (direction === "down" && count <= items.length) {

                            for (var i = count; i < count + 3; i++) {
                                $(items[i]).addClass('active');
                            }

                            count += 3;


                        } else if (direction === "up" && count > 3) {
                            // console.log("count: ",count);
                            // console.log("items: ",items.length);

                            if (count === items.length + 3) {
                                count = count - 3
                            }

                            if (count > 3) {
                                for (var i = count; i > count - 3; i--) {
                                    $(items[i - 1]).removeClass('active');
                                }

                                count -= 3;
                            }

                        }

                        // el.css('transform', 'matrix(' + matrix.toString() + ')')
                    })
                }


            }();

            var designPage = function () {
                var windowHeight = $(window).height();
                var el = $('[data-layout="full-height"]');

                el.each(function () {
                    var offset = $(this).data('offset');
                    offset = parseFloat(offset);
                    windowHeight -= offset;
                    $(this).height(windowHeight);
                })


            }();

            var activeList = function () {

                var activeListEl = $('[data-list="active"]');

                var activeListLoad = function () {

                    activeListEl.each(function () {
                        var el = $(this);
                        var activeItem = el.find('.active');
                        var data = activeItem.data('value');
                        var input = el.closest('[data-list="active"]').siblings('input').first();

                        if (activeItem.length) {
                            input.val(data);
                        } else {
                            input.val(0);
                        }
                    })


                }();

                var activeListHandle = function () {
                    activeListEl.on('click', 'li', function (e) {
                        e.preventDefault();
                        var el = $(this);
                        var parent = el.closest('[data-list="active"]').siblings('input').first();
                        var data = el.data('value');

                        el.siblings().removeClass('active');
                        el.toggleClass('active');
                        // console.log(parent);

                        if (el.hasClass('active')) {
                            parent.val(data)
                        } else {
                            parent.val(0);
                        }

                        return false;
                    })
                }();


            }();

            var aTagNullClick = function () {

                $('a').on("click", function (e) {
                    if ($(this).attr('href') === undefined) {
                        e.preventDefault();
                        return false;
                    }
                });

            }();


        }

        return {
            init: function () {
                _initInstances();
            }
        };
    }();
});

function processAjaxData(response, urlPath) {
    // document.getElementById("main_content").innerHTML = response.html;
    document.title = response.pageTitle;
    window.history.pushState({
        "html": response.html,
        "pageTitle": response.pageTitle
    }, "", urlPath);
}

function getNewContent(el) {

    var res = {
        html: el,
        pageTitle: "new title"
    };

    processAjaxData(res, 'test.url')

}

function getNewContentBack(linkcurrent,titlecurrent) {

    window.history.back();
    document.title = titlecurrent;
    window.history.pushState({
        "pageTitle": titlecurrent
    }, "", linkcurrent);

}