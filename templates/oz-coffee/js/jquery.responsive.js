function responsiveSlider() {

    const pos = ( jQuery(window).width() - jQuery('.container').width() ) / 2;

    jQuery('.mainslider-cn-wrapper .bx-prev').css('left', -pos + 'px');
    jQuery('.mainslider-cn-wrapper .bx-next').css('right', -pos + 'px');

}

export function reponsiveWindow() {

    jQuery(window).resize(responsiveSlider);

    responsiveSlider();
    
}