jQuery(function($) {

	var tabsList = {

		ready: function() {

			$("*[data-navig='tabsList']").each(function() {

				var $tList = $(this).find( $(this).attr('data-tlist') ),
					$tContent = $(this).find( $(this).attr('data-tcontent') );

				$tContent.find('> div').each(function() {

					$(this).data('original-height', $(this).outerHeight() );

				});

				$tList.on('click', 'li', tabsList.onTabClick);

				$tList.find('li:eq(0)').click();

			});

		},

		onTabClick: function(e) {	

			e.preventDefault();		

			if ( ! $(this).hasClass('active') ) {

				var $t_target = $( $(this).attr('data-target') ),
					t_height = $t_target.data('original-height');

				//console.log( $t_target );

				$(this).siblings().removeClass('active');
				$(this).addClass('active');

				if ( ! $t_target.hasClass('active') ) {

					$t_target.siblings().removeClass('active');

					$t_target.outerHeight( t_height );
					$t_target.parent().outerHeight( t_height );
					$t_target.addClass('active');

				}

			}

		},

	}

	tabsList.ready();

})