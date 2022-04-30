import addonMenu from "./addons/menu.js";
import addonSearch from "./addons/addon-search.js";
import bsModal from "./addons/bs-modal.js";
import popup from "./addons/popup.js";
import thenAuthor from "./addons/thenAuthor.js";

addonMenu();
addonSearch();
bsModal();
thenAuthor();
popup();


$(document).ready(function() {

    var preloader = function() {
        $(".preloader").css("display", "none");
    };
    // var button = function() {
    //     $(".button").addClass("button__active");
    // };
    // var buttonHover = function() {
    //     $(".button").addClass("button__hover");
    // };
    // setTimeout(button, 0);
    // setTimeout(buttonHover, 1000);
    setTimeout(preloader, 1100);
});

var animations = {

    init: function() {
  
      var th = animations;
      th.$splitLetters = $("[data-split-letters]");
      th.$splitLettersBig = $("[data-split-letters-big]");
  
      th.prepareElements();
      //th.start();
  
    },
  
    prepareElements: function() {
  
      var th = animations;
  
      th.$splitLetters.each(function(){
  
        var $letters = $(this);
  
        splitLines($letters);
  
        var $lines = $letters.find('.line');
  
        var isSpace = 0;
  
        $lines.each(function() {
          var $l = $(this);
          var arrayLetters = $l.text().split('');
          var string = '';
          var delay = 0;
          var step = .05;
          var tr = .5;
          var trStep = .03;
  
          for (let i = 0; i < arrayLetters.length; i++) {
  
            var transition = 'transition: all '+(tr+trStep)+'s ease ' + (delay+step) + 's; -webkit-transition: all '+(tr+trStep)+'s ease ' + (delay+step) + 's; -o-transition: all '+(tr+trStep)+'s ease ' + (delay+step) + 's;';
            delay = delay+step;
            tr = tr+trStep;
  
            var element = '<span class="letter" style="'+transition+'">'+ arrayLetters[i] +'</span>';
            var next = i+1;
  
            if (next < arrayLetters.length && arrayLetters[next] == ' ') {
              element = '<span class="letter" style="'+transition+'">'+ arrayLetters[i] +'&nbsp;</span>';
            }
  
            if (arrayLetters[i] == ' ') {
              element = '';
            }
  
            string += element;
  
          };
  
          $l.html(string);
  
        });
  
      });
  
      th.$splitLettersBig.each(function(){
  
        var $letters = $(this);
  
        splitLines($letters);
  
        var $lines = $letters.find('.line');
  
        var isSpace = 0;
  
        $lines.each(function() {
          var $l = $(this);
          var arrayLetters = $l.text().split('');
          var string = '';
          var delay = 0;
          var step = .1;
          var tr = 1;
          var trStep = .03;
  
          for (let i = 0; i < arrayLetters.length; i++) {
  
            var transition = 'transition: all '+(tr+trStep)+'s ease ' + (delay+step) + 's; -webkit-transition: all '+(tr+trStep)+'s ease ' + (delay+step) + 's; -o-transition: all '+(tr+trStep)+'s ease ' + (delay+step) + 's;';
            delay = delay+step;
            tr = tr+trStep;
  
            var element = '<span class="letter" style="'+transition+'">'+ arrayLetters[i] +'</span>';
            var next = i+1;
  
            if (next < arrayLetters.length && arrayLetters[next] == ' ') {
              element = '<span class="letter" style="'+transition+'">'+ arrayLetters[i] +'&nbsp;</span>';
            }
  
            if (arrayLetters[i] == ' ') {
              element = '';
            }
  
            string += element;
  
          };
  
          $l.html(string);
  
        });
  
      });
  
    },
  
    start: function() {
  
      var th = animations;
  
      th.showElement();
  
      $(window).on('scroll', function(){
        th.showElement();
      })
  
    },
  
    showElement: function(){
  
      var th = animations;
  
      th.$splitLetters.each(function() {
        var $el = $(this);
        if (isElementInViewport($el)) {
          var delay = $el.data('split-letters');
  
          setTimeout(function(){
            $el.addClass('show');
          }, delay);
  
        }
      });
  
      th.$splitLettersBig.each(function() {
        var $el = $(this);
        if (isElementInViewport($el)) {
          var delay = $el.data('split-letters');
  
          setTimeout(function(){
            $el.addClass('show');
          }, delay);
  
        }
      });
    }
};
  
function isElementInViewport(el) {
      //special bonus for those using jQuery
      if (typeof jQuery === "function" && el instanceof jQuery) {
          el = el[0];
      }
  
      var rect = el.getBoundingClientRect();
  
      return (
          rect.top >= 0 &&
          rect.left >= 0 &&
          rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /*or $(window).height() */
          rect.right <= (window.innerWidth || document.documentElement.clientWidth) /*or $(window).width() */
      );
};
function splitLines($block) {
  
    var text = $block.html(function(i, h){
      return h.replace(/(\S+\s*)/g, '<span>$1</span>');
    });
  
    var  pt = 0,
    obj = {},
    curPt = 0,
    k = 0,
    output = '';
  
    $('span', $block).each(function(i, el){
      curPt = $(el).offset().top;
      var text = $(this).html();
  
      if(curPt > pt) {
        pt = curPt;
        obj[++k] = [];
      };
  
      try {
        obj[k].push(text);
      } catch(error) {}
  
    });
  
    var layout = "";
  
    $.each(obj, function(i, line){
      layout += '<span class="line">' +  line.join('')  + '</span>';
    });
  
    $block.html(layout);
  
};
var scrollAnimatedCtrl = {

	init: function() {

		var th = scrollAnimatedCtrl;

		th.elements = {
			$scrollLine: $("[data-animated-one]")
		};

		th.events();

	},

	events: function() {

		var th = scrollAnimatedCtrl;

		$(window).scroll(function(){

			th.elements.$scrollLine.each(function(e){

				if ($(document).scrollTop() + $(window).height() > $(this).offset().top && $(document).scrollTop() - $(this).offset().top < $(this).height()) {

					if (!$(this).hasClass('scroll_animated')) {
						$(this).addClass('scroll_animated');
					}
				}

			})



		});

	}
};
var typesHoverCtrl = {

	init: function(){

		var th = typesHoverCtrl;

		th.$cards = $('[data-types-card]');
		th.$bgWrap = $('[data-bg-wrap]');
		th.$bgImgs = $('[data-types-bg]');
		th.$list = $('[data-types-list]');

		th.events();
	},

	addOpacity: function($nearby){

		var th = typesHoverCtrl;

		$nearby.each(function(e){
			$(this).addClass('card_opacity');
		})

	},

	currentBg: function(index){

		var th = typesHoverCtrl;
		th.$bgImgs.removeClass('types__img_active');
		var $img = th.$bgImgs.eq(index);
		$img.addClass('types__img_active');

	},

	removeOpacity: function(){

		var th = typesHoverCtrl;

		th.$cards.removeClass('card_opacity');

	},

	events: function(){

		var th = typesHoverCtrl;

		th.$cards.hover(function(e){
			if (!client.isMobile) {
				var $card = $(this);
				var index = $card.index();
				var $nearby = $card.siblings(".card");
				th.addOpacity($nearby);
				th.currentBg(index);
			}
		}, function(){
			if (!client.isMobile) {
				th.removeOpacity();
			}
		});

		th.$list.hover(function(){
			if (!client.isMobile) {
				th.$list.addClass('types__list_active');
				th.$bgWrap.addClass('types__bg_active');
			}
		}, function(){
			if (!client.isMobile) {
				th.$list.removeClass('types__list_active');
				th.$bgImgs.removeClass('types__img_active');
				th.$bgWrap.removeClass('types__bg_active');
			}
		});

	}

};

var buttonAnimations = {
	init: function(){

		var th = buttonAnimations;
		th.$btns = $('[data-button]');

		if (!th.$btns.length) return

		th.check();
		th.events();
	},
	check: function(){
        let client = $(window);
		var th = buttonAnimations;
		var scrollTop = $(document).scrollTop();
		var checkpoint = scrollTop + client.height() - 30;
		th.$btns.each(function(){
			var $btn = $(this);
			var topPosition = $btn.offset().top;
			var delay = $btn.data('button');
			var hoverDelay = delay + 2000;

			if (checkpoint >= topPosition && !$btn.hasClass('button_active')) {

				setTimeout(function(){
					$btn.addClass('button_active');
				}, delay);
				setTimeout(function(){
					$btn.addClass('button_hover');
				}, hoverDelay);
			};
		})
	},
	events: function(){
		var th = buttonAnimations;
		$(document).scroll(function(){
			th.check();
		});
		$(window).resize(function(){
			th.check();
		});
	}
};

animations.init();
scrollAnimatedCtrl.init();
animations.start();
buttonAnimations.init();