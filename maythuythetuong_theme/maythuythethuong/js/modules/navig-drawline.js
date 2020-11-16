jQuery( function($) {

	var drawline = {
		ready: function() {
			this.responsiveDrawLineSize();

			$(window).resize(this.responsiveDrawLineSize);
		},
		responsiveDrawLineSize: function(e) {

			$('*[data-navig="drawline-heading"]').each(function() {

				var pw = $(this).parent().width(),			
					capw = $(this).find('.caption').width(),				
					line_w = ( pw - capw - 20 ) / 2,				
					$line = $(this).find('.line');
				
				$line.width( line_w );

			});

		}
	}

	drawline.ready();

});