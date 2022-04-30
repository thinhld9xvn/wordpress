$('.slider-main').owlCarousel({
  loop: true,
  margin: 0,
  autoplay: true,
  autoplayTimeout: 993000,
  smartSpeed: 2000,
  nav: false,
  responsive: {
    0: {
      items: 1
    },
  }
})
$('.slider-main-banner').owlCarousel({
  loop: false,
  margin: 0,
  autoplay: true,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 1
    },
  }
})
let iconHeadSearch = document.querySelectorAll('form.search i')
let formHeadSearch = document.querySelector('form.search')
let iconHeadBar = document.querySelector('.icon-head-bar')
let menuSearch = document.querySelector('.menu-search')
iconHeadSearch.forEach(element => {
  element.addEventListener("click", function () {
    formHeadSearch.classList.toggle("active");
  })
});
iconHeadBar.addEventListener("click", function () {
  menuSearch.classList.toggle("active");
})
$('.menu-head-mobile i').click(function () {
  menuSearch.classList.toggle("active");
});

$(window).scroll(function () {
  if ($(window).scrollTop() >= 90) {
    $('header.header').addClass('fixed-header');
  }
  else {
    $('header.header').removeClass('fixed-header');
  }
});

$('.mega-drop-item .fas.fa-caret-down').click(function () {
  $(this).parent().toggleClass('active')
});

$('.icon-mega-mobile').click(function () {
  $(this).siblings().toggleClass('active')
});
$('.icon-return').click(function () {
  $(this).parent().parent().parent().parent().toggleClass('active')
});
