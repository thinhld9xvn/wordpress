const ONE_DAY_MILISECONDS = 86400000;
const dateFormat = "dd/mm/yy";
const getDate = function(d) {
    const date = d.getDay(d) + 1;
    if ( date === 1 ) return 'Chủ Nhật';
    return 'Thứ ' + date;
}
const getDay = function(d) {
    return d.getDate(d);
}
const getMonth = function(d) {
    return d.getMonth() + 1;
}
const getFullYear = function(d) {
    return d.getFullYear(d);
}
const getFormatDateString = function(d) {
    return getDay(d) + '/' + getMonth(d) + '/' + getFullYear(d);
}
const getDateElem = ( element ) => {
    var date;
    try {
        date = $.datepicker.parseDate( dateFormat, element.value );
    } catch( error ) {
        date = null;
    }
    return date;
}
const changeDateSelected = ($input) => {
    const $parent = $input.parent(),
            $day = $parent.find('h2'),
            $date = $parent.find('.date'),
            $month = $parent.find('.month'),
            $year = $parent.find('.year'),
            d = $input.datepicker('getDate'),
            day = getDay(d),
            date = getDate(d),
            month = getMonth(d),
            year = getFullYear(d);
    $day.text(day);
    $date.text(date);
    $month.text(month);
    $year.text(year);
}
const hideBookingModal = (modal) => {
    jQuery('body').removeClass('disable-scroll');
    if ( modal ) {
        modal.classList.remove("show");
        modal.classList.remove("__inline");
        modal.setAttribute('style', '');
    }
}
const showBookingModal = (modal) => {
    jQuery('body').addClass('disable-scroll');
    modal.classList.add("show");
}
const setToggleStateBookingModal = () => {
    const booking_modal = jQuery('.qt-header-booking-modal')[0],
         booking_button = jQuery('.header-button-booking')[0],
         datepicker = jQuery('.ui-widget.ui-widget-content')[0],
         buttonClose = jQuery('.qt-header-booking-modal .button-close')[0],
         booking_modal_inner = jQuery('.qt-header-booking-modal .inner')[0];
    jQuery(document).on('mouseup', function(e) {        
        const target = e.target;
        if ( booking_button && booking_button.contains(target) ) {
            if ( booking_modal && ! booking_modal.classList.contains("show") ) {
                showBookingModal(booking_modal);
            }
            else {
                hideBookingModal(booking_modal);
            }           
        }
        else {
            if ( booking_modal && booking_modal.contains(target) ) {
                if ( booking_modal.classList.contains('__inline') ) {
                    if ( booking_modal_inner.contains(target) ) {
                    }
                    else {
                        hideBookingModal(booking_modal);
                    }
                }
            }
            if ( buttonClose && buttonClose.contains(target) ) {
                hideBookingModal(booking_modal);
            }
           if ( ( booking_modal && booking_modal.contains(target) ) || 
                ( datepicker && datepicker.contains(target) ) ) {
           }
           else {
                hideBookingModal(booking_modal);
           }
        }
    })
}
const isLatestDate = (d1, d2) => {
    return d1.getTime() >= d2.getTime();
}
export function setupBookingForm() {   
    const $fromDate = jQuery('#element-jq-datepicker-fromdate');
    const $toDate = jQuery('#element-jq-datepicker-todate');    
    const fromDate = new Date(),
          toDate = new Date(fromDate.getTime() + ONE_DAY_MILISECONDS); 
    const fromDatePick =  $fromDate.datepicker({        
        dateFormat: 'dd/mm/yy',
        minDate : 0
    }).on('change', function(e) {
        changeDateSelected(jQuery(this));
        const minDate = getDateElem( this ),
              newMinDate = new Date(minDate.getTime() + ONE_DAY_MILISECONDS); 
        //console.log(minDate, toDatePick.datepicker('getDate'));
        if ( isLatestDate(minDate, toDatePick.datepicker('getDate') ) ) {            
            $toDate.val(getFormatDateString(newMinDate));
            changeDateSelected($toDate);
        }
        toDatePick.datepicker( "option", "minDate", newMinDate );
    });
    const toDatePick =  $toDate.datepicker({        
        dateFormat: 'dd/mm/yy'
    }).on('change', function(e) {
        changeDateSelected(jQuery(this));
        //fromDatePick.datepicker( "option", "maxDate", getDateElem( this ) );
    });
    fromDatePick.datepicker('setDate', fromDate);    
    toDatePick.datepicker('setDate', toDate);
    $fromDate.val(getFormatDateString(fromDate))
            .trigger('change');
    $toDate.val(getFormatDateString(toDate))
           .trigger('change');
    jQuery('figure.booking-element-selected').click(function(e) {
        const target = jQuery(this).data('jqDatepickerTarget');
        const zIndex = jQuery('.qt-booking-modal').css('z-index');       
        jQuery(`#${target}`).datepicker('show');
        setTimeout(function() {
            jQuery('.ui-widget.ui-widget-content').css('z-index', zIndex);
        }, 50);
    })
    jQuery('.header-button-booking').click(function(e) {
        e.preventDefault();
        const $container = jQuery(this).closest('.container'),
              $modal = jQuery('.qt-header-booking-modal'),
              $header = jQuery('#header');
        const left = $container.offset().left + $container.width() - $modal.width(),
              top = $header.outerHeight(),
              maxHeight = window.innerHeight - $header.height();       
        $modal.css({
            'left' : left + 'px',
            'top' : top + 'px',
            'max-height' : maxHeight + 'px'
        });
    });
    jQuery('.qt-header-booking-modal .button-close').click(function(e) {
        e.preventDefault();
    });
    jQuery('.btnOrderBooking').click(function(e) {
        e.preventDefault();
        const modal = jQuery('.qt-header-booking-modal')[0];
        modal.classList.add('__inline');
        showBookingModal(modal);
    })    
    setToggleStateBookingModal();
}