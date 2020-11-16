/* responsive breadcumbs */
	jQuery(function($) {

		var breadcumbs = {

			ready: function() {

				$(window).on('triggerResize', this.responsiveBreadCumbs)
						 .load(function() {

						 	breadcumbs.responsiveBreadCumbs();

						 });
		

			},

			responsiveBreadCumbs: function() {

				var $breadcumbs = $('#breadcumbs'),
					$b_container = $breadcumbs.find('> .container');

				if ( $breadcumbs.length > 0 ) {

					var $b_current = $breadcumbs.find('span.current'),
						breadcumbs_width = $breadcumbs.outerWidth() - ( $breadcumbs.outerWidth() - $b_container.width() ),					

						getTotalEWidth = function() {

							var total_e_width = 0;

							$breadcumbs.find('a, span')
									   .each(function(i, e) {

								var $element = $(e),
									w = $(e).outerWidth(),

									mleft = parseInt( $(e).css('margin-left') ),								
									mright = parseInt(  $(e).css('margin-right') );
								
								if ( w > 0 ) {

									total_e_width += w;

								}

								if ( ! isNaN( mleft ) && mleft > 0 ) {

									total_e_width += mleft;

								}								

								if ( ! isNaN( mright ) && mright > 0 ) {

									total_e_width += mright;

								}							

							});

							return total_e_width;

						};

					if ( $b_current.data('originalText') === undefined ) {

						$b_current.data('originalText', $b_current.text().trim() );

					}

					$b_current.data('originalPos', 4 );

					$b_current.text( $b_current.data('originalText').toString() );

					var total_e_width = getTotalEWidth();
					
					/* overflow */
					while ( total_e_width >= breadcumbs_width ) {				

						var originalText = $b_current.data('originalText')
											 		 .toString(),

							originalPos = parseInt( $b_current.data('originalPos')
															  .toString() ),

							text = $b_current.text().trim();

						/* one character and ... */
						if ( text.length === 4 ) {

							$breadcumbs.addClass('hidden');

							return;

						}

						else {

							$b_current.text( originalText.substr(0, originalText.length - originalPos ) + '...' );

							$b_current.data('originalPos', originalPos + 1);

						}

						total_e_width = getTotalEWidth();
						

					}

				}					

			}

		};

		breadcumbs.ready();	

	});