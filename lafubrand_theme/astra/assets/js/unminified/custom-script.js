//console.log('abc');

const t = setInterval(() => {

    if ( typeof(jQuery) !== 'undefined' ) {

        clearInterval(t);

        initialize();

    }

}, 200);


function initialize() {

    jQuery(function($) {       

        const bindingToggleMenuItems = () =>  { 

            $('#primary-menu > li.menu-item-has-children > a').each((i, e) => {

                const $e = $(e);              

                $e.replaceWith($e.clone());

            });        

            $('#primary-menu > li.menu-item-has-children > a').click((e) => {

                e.preventDefault(); 

                const $this = $(e.currentTarget),
                    $subMenu = $this.siblings('.sub-menu');

                if ( $subMenu.length > 0 ) {
                    
                    const $toggleMenu = $this.siblings('.ast-menu-toggle');

                    //console.log( $toggleMenu );

                    $toggleMenu.click();

                }

            });

            $('.menu-toggle.main-header-menu-toggle').click((e) => {

                e.preventDefault();

                $('body').toggleClass('ohidden');

            });

        };

        const bindingToggleSearchBox = () => {       

            const $searchFieldText = $('.above-header-searchbar.-short').find('input[type=search]');

            $searchFieldText.width( $(window).width() - 12 );

            $('.above-header-searchbar.-short .btnSearch').click((e) => {

                e.preventDefault();

                $(e.target).closest('.above-header-searchbar.-short')
                           .find('input[type=search]').toggleClass('hidden');

            });

            $(window).scroll((e) => {

                if ( $(window).width() < 768 ) {
                    $searchFieldText.addClass('hidden');
                }

            })

            /*$(document).on('click', (e) => {

                const searchFieldText = $searchFieldText[0],
                        btnSearch = $btnSearch[0];

                console.log( searchFieldText.contains(e.target) );
                console.log( $searchFieldText.hasClass('hidden') );

                if ( ! searchFieldText.contains(e.target) &&
                       ! $searchFieldText.hasClass('hidden') ) {

                    $searchFieldText.addClass('hidden');

                }

            })*/

        };

        const bindingToggleFooterBox = () => {

            if ( $(window).width() < 768 ) {

                $('.site-footer h2').click(e => {

                    const $this = $(e.target);

                    $this.toggleClass('-expand');

                    $this.siblings('.footer-content').toggleClass('show');

                });

            }

        };

        const bindingScrollToListsBox = () => {

            const showElement = function(target) {

                if ( ! target.classList.contains('show') ) {

                    target.classList.add('show');

                }

            };
           

            const observer = new IntersectionObserver((entries, observer) => {

              entries.forEach(entry => {

                if (entry.intersectionRatio === 1) {

                    setTimeout(() => showElement(entry.target), 1000);
                  
                } 
              

              });

            }, {
              threshold: 1
            });

            const elements = document.querySelectorAll('.lafu-dn-trouble-box ul li')

            elements.forEach(element => {
              observer.observe(element)
            });

        };

        const bindingResponsiveBreadcrumb = () => {

            let childs_width = 0,                
                $breadcrumb = $('.ast-breadcrumbs').eq(0),
                width = $breadcrumb.closest('.ast-container').width(),
                delta_width = 0;

            $breadcrumb.find('li:not(:last-child)')
                                 .each((i, e) => {

                                    childs_width += $(e).width();

                                 });

            delta_width = width - childs_width - 1;

             $breadcrumb.find('li:last-child').width( delta_width );

        };

        const bindingGiftsBoxWidgetScrollFixed = () => { 

            const offset = 200;

            let $container = $('.widget.lafu-gifts-box-widget'),
                $widget_box = $container.find('.widget-container'),
                $footer = $('#colophon');                

            if ( $container.length > 0 ) {

                $(window).scroll(function(e) {

                    var v_top = $(this).scrollTop(),                  
                        container_top = $container.position().top + offset,
                        end_point_scroll = $footer.position().top - $widget_box.outerHeight() - offset;
                
                    if ( v_top > container_top ) {                   

                        if ( v_top >= end_point_scroll ) {

                            if ( $widget_box.hasClass('-fixedScrollBox') ) {

                                $widget_box.removeClass('-fixedScrollBox');

                            }

                        }

                        else {

                             if ( ! $widget_box.hasClass('-fixedScrollBox') ) {

                                $widget_box.addClass('-fixedScrollBox');

                            }

                        }

                    }

                    else if ( v_top < container_top ) {

                        if ( $widget_box.hasClass('-fixedScrollBox') ) {

                            $widget_box.removeClass('-fixedScrollBox');

                        }

                    }

                });

            }

        };

        $(window).load(() => {            

        //bindingAjax();
            bindingToggleMenuItems();
            bindingResponsiveBreadcrumb();

            if ( window.innerWidth > 992 ) {
                bindingGiftsBoxWidgetScrollFixed();
            }

        });

        $(window).resize(() => {

            bindingResponsiveBreadcrumb();

        });

        bindingToggleSearchBox();
        bindingToggleFooterBox();
        bindingScrollToListsBox();
        


    });

}