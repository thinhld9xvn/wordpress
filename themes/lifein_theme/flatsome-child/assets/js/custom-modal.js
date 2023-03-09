jQuery(document).ready(function($){
				// jQuery extend functions for popup
				(function($) {
					$.fn.openPopup = function( settings ) {
						var elem = $(this);
						// Establish our default settings
						var settings = $.extend({
							anim: 'fade'
						}, settings);
						elem.addClass('__show');
						elem.find('.popup-content').addClass(settings.anim+'In');
					}

					$.fn.closePopup = function( settings ) {
						var elem = $(this);
						// Establish our default settings
						var settings = $.extend({
							anim: 'fade'
						}, settings);
						elem.find('.popup-content').removeClass(settings.anim+'In').addClass(settings.anim+'Out');

						setTimeout(function(){
							elem.removeClass('__show');
							elem.find('.popup-content').removeClass(settings.anim+'Out')
						}, 500);
					}

				}(jQuery));

				// Click functions for popup
				$('.open-popup').click(function(){
					$('body').css('overflow', 'hidden');
					$('#'+$(this).data('id')).openPopup({
						anim: (!$(this).attr('data-animation') || $(this).data('animation') == null) ? 'fade' : $(this).data('animation')
					});
					//e.preventDefault();
				});
				$(document).on('click', '.close-popup', function(){
					$('body').css('overflow', '');
					$('#'+$(this).data('id')).closePopup({
						anim: (!$(this).attr('data-animation') || $(this).data('animation') == null) ? 'fade' : $(this).data('animation')
					});
					//e.preventDefault();
				});

				// To open/close the popup at any functions call the below
				 //$('#popup_1').openPopup();
				// $('#popup_default').closePopup();								

				$(document).on('mouseup', function(e) {

					const target = e.target,
						  parent_node = $('#popup_1')[0],
						  node = $('#popup_1 .popup-content .popup-wrapper')[0];

					if ( node && node.contains(target) ) {}

					else {

						if ( parent_node && parent_node.contains(target) ) {
							$('#popup_1 .close-popup').trigger('click');
						}

						//$('#popup_1 .close-popup').trigger('click');

					}

				});	
			});