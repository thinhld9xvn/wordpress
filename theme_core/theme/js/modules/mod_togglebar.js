jQuery(function($) {

	var toggle_bar = {

		ready: function() {

			$(document).on('mouseup', this.onLangBarToggle);

			var $langbar = $('.langbar');

			var selected_lang = $langbar.find('.lang-selected')
										.find('a')
								 		.attr('class');

			if ( selected_lang !== '' ) {

				$langbar.find('> ul')
						.find('a[class=' + selected_lang + ']')
						.parent()
						.addClass('hidden');

			}

		},

		onLangBarToggle: function(e) {

            var $container = $('.langbar'),
            	$langList = $container.find('> ul'),

                $target = $(e.target);

            if ( $target.hasClass('lang-selected') || $target.parent().hasClass('lang-selected') ) {

                $langList.toggleClass('active');

            }       

            else {

                if ( ! $container.is(e.target) // if the target of the click isn't the container...
                     && $container.has(e.target).length === 0 ) { // ... nor a descendant of the container
                
                  if ( $langList.hasClass('active') ) {

                    $langList.removeClass('active');

                  }

                }   
            }
        }	
		

	}

	toggle_bar.ready();

});