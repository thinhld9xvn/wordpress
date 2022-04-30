"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.setupBookingForm = setupBookingForm;
var ONE_DAY_MILISECONDS = 86400000;
var dateFormat = "dd/mm/yy";

var getDate = function getDate(d) {
  var date = d.getDay(d) + 1;
  if (date === 1) return 'Chủ Nhật';
  return 'Thứ ' + date;
};

var getDay = function getDay(d) {
  return d.getDate(d);
};

var getMonth = function getMonth(d) {
  return d.getMonth() + 1;
};

var getFullYear = function getFullYear(d) {
  return d.getFullYear(d);
};

var getFormatDateString = function getFormatDateString(d) {
  return getDay(d) + '/' + getMonth(d) + '/' + getFullYear(d);
};

var getDateElem = function getDateElem(element) {
  var date;

  try {
    date = $.datepicker.parseDate(dateFormat, element.value);
  } catch (error) {
    date = null;
  }

  return date;
};

var changeDateSelected = function changeDateSelected($input) {
  var $parent = $input.parent(),
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
};

var hideBookingModal = function hideBookingModal(modal) {
  jQuery('body').removeClass('disable-scroll');

  if (modal) {
    modal.classList.remove("show");
    modal.classList.remove("__inline");
    modal.setAttribute('style', '');
  }
};

var showBookingModal = function showBookingModal(modal) {
  jQuery('body').addClass('disable-scroll');
  modal.classList.add("show");
};

var setToggleStateBookingModal = function setToggleStateBookingModal() {
  var booking_modal = jQuery('.qt-header-booking-modal')[0],
      booking_button = jQuery('.header-button-booking')[0],
      datepicker = jQuery('.ui-widget.ui-widget-content')[0],
      buttonClose = jQuery('.qt-header-booking-modal .button-close')[0],
      booking_modal_inner = jQuery('.qt-header-booking-modal .inner')[0];
  jQuery(document).on('mouseup', function (e) {
    var target = e.target;

    if (booking_button && booking_button.contains(target)) {
      if (booking_modal && !booking_modal.classList.contains("show")) {
        showBookingModal(booking_modal);
      } else {
        hideBookingModal(booking_modal);
      }
    } else {
      if (booking_modal && booking_modal.contains(target)) {
        if (booking_modal.classList.contains('__inline')) {
          if (booking_modal_inner.contains(target)) {} else {
            hideBookingModal(booking_modal);
          }
        }
      }

      if (buttonClose && buttonClose.contains(target)) {
        hideBookingModal(booking_modal);
      }

      if (booking_modal && booking_modal.contains(target) || datepicker && datepicker.contains(target)) {} else {
        hideBookingModal(booking_modal);
      }
    }
  });
};

var isLatestDate = function isLatestDate(d1, d2) {
  return d1.getTime() >= d2.getTime();
};

function setPosHeaderBookingModal() {
  var $button = this,
      $container = $button.closest('.container'),
      $modal = jQuery('.qt-header-booking-modal'),
      $header = jQuery('#header'),
      button_offset = $button.offset(),
      modal_width = $modal.outerWidth();
  var left = button_offset.left + $button.outerWidth() - modal_width,
      top = $header.outerHeight() - jQuery(window).scrollTop(),
      //top = $button.offset().top,
  maxHeight = window.innerHeight - $header.height();

  if (left < 0) {
    left = 0;
  }

  $modal.css({
    'left': left + 'px',
    'top': top + 'px',
    'max-height': maxHeight + 'px'
  });
}

function responsiveHeaderBookingModal() {
  var $button = jQuery('.header-button-booking'),
      $modal = jQuery('.qt-header-booking-modal'),
      isModalInlineMode = $modal.hasClass("__inline");

  if (!isModalInlineMode) {
    setPosHeaderBookingModal.call($button);
  }
}

function setupBookingForm() {
  var $fromDate = jQuery('#element-jq-datepicker-fromdate');
  var $toDate = jQuery('#element-jq-datepicker-todate');
  var fromDate = new Date(),
      toDate = new Date(fromDate.getTime() + ONE_DAY_MILISECONDS);
  var fromDatePick = $fromDate.datepicker({
    dateFormat: 'dd/mm/yy',
    minDate: 0
  }).on('change', function (e) {
    changeDateSelected(jQuery(this));
    var minDate = getDateElem(this),
        newMinDate = new Date(minDate.getTime() + ONE_DAY_MILISECONDS); //console.log(minDate, toDatePick.datepicker('getDate'));

    if (isLatestDate(minDate, toDatePick.datepicker('getDate'))) {
      $toDate.val(getFormatDateString(newMinDate));
      changeDateSelected($toDate);
    }

    toDatePick.datepicker("option", "minDate", newMinDate);
  });
  var toDatePick = $toDate.datepicker({
    dateFormat: 'dd/mm/yy'
  }).on('change', function (e) {
    changeDateSelected(jQuery(this)); //fromDatePick.datepicker( "option", "maxDate", getDateElem( this ) );
  });
  fromDatePick.datepicker('setDate', fromDate);
  toDatePick.datepicker('setDate', toDate);
  $fromDate.val(getFormatDateString(fromDate)).trigger('change');
  $toDate.val(getFormatDateString(toDate)).trigger('change');
  jQuery('figure.booking-element-selected').click(function (e) {
    var target = jQuery(this).data('jqDatepickerTarget');
    var zIndex = jQuery('.qt-booking-modal').css('z-index');
    jQuery("#".concat(target)).datepicker('show');
    setTimeout(function () {
      jQuery('.ui-widget.ui-widget-content').css('z-index', zIndex);
    }, 50);
  });
  jQuery('.header-button-booking').click(function (e) {
    e.preventDefault();
    setPosHeaderBookingModal.call(jQuery(this));
  });
  jQuery('.qt-header-booking-modal .button-close').click(function (e) {
    e.preventDefault();
  });
  jQuery('.btnOrderBooking').click(function (e) {
    e.preventDefault();
    var modal = jQuery('.qt-header-booking-modal')[0];
    modal.classList.add('__inline');
    showBookingModal(modal);
  });
  jQuery(window).resize(function (e) {
    responsiveHeaderBookingModal();
  });
  setToggleStateBookingModal();
}