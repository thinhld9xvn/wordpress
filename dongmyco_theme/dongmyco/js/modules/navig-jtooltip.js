jQuery(function($) {

	var tooltip = {
		ready: function() {

			$('*[data-navig="jtooltip"').each(function() {

				$(this).mousemove(tooltip.onActiveTooltip)
					   .mouseout(tooltip.onDeactiveTooltip);				

			});

		},
		onActiveTooltip: function(e) {

			target = $(this).attr('data-target'),
			$target = $(this).next( target ),
			edg_top = $(this).offset().top - $(window).scrollTop(),
			e_top = 0,
			e_left = 0;			

			if ( ! $target.hasClass('active') ) {
				$target.addClass('active');

			}

			edg_top = -edg_top;
			e_top = e.pageY - $(this).offset().top - 60 - $target.height();
			e_left = e.pageX - $(this).offset().left;						

			if ( e_top < edg_top ) {
				e_top = edg_top;
			}

			$target.css({
				'left' : e_left  + 'px',
				'top' : e_top + 'px'
			}); 

		},
		onDeactiveTooltip: function(e) {

			target = $(this).attr('data-target'),
			$target = $(this).next( target );

			if ( $target.hasClass('active') ) {
				$target.removeClass('active');
			}

		}		
	}

	tooltip.ready();

});