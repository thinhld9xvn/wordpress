jQuery(function($) {

var eh = {
	ready: function() {
		this.setEqResponsive();
		$(window).resize(this.setEqResponsive);
	},
	setEqResponsive: function() {

		$('*[data-navig="setequalheight"]').each(function() {

			var css_property = $(this).attr('data-css-delimiter-property'),
				css_value = $(this).attr('data-css-delimiter-value'),
				object = $(this).attr('data-object'),
				$object = $(this).find(object),
				elem = $(this).attr('data-setheight'),					
				first_parse = true,
				_index = 0,
				index = 0,
				mh = 0;

			// duyet object lan thu nhat tu 0 den vi tri object co css = "clear:both" tru 1
			// tu lan thu hai tro di duyet object tu vi tri object co css = "clear:both" gan nhat cong 1
			// cho den vi tri object co css = "clear:both" tiep theo roi lap lai nhu tren cho den het

			for ( var i = 0; i < $object.length; i++) {
				$object.eq(i).find(elem).css('height', '');
			}

			$object.filter(function() {

				// object co css = "clear:both"
				if ( $(this).css( css_property ) === css_value ) {

					// duyet lan dau tien
					if ( first_parse ) {
						_index = 0;
						index = $(this).index();
						first_parse = false;
					}

					// duyet tu lan thu hai tro di
					else {							
						_index = index;
						index = $(this).index();
					}					
					

					if ( index > 0 ) {

						mh = eh.getMaxHeightObj($object, elem, _index, index);

						for ( var i = _index; i < index; i++ ) {

							$object.eq(i).find(elem).data('setheight', 'true')
												    .height(mh);
						}
						

					}

				}

				else {			

					var length = $object.length

					if ( $(this).index() === length - 1 ) {

						// doi tuong chua xu ly
						if ( $(this).data('setheight') !== 'true' ) {

							mh = eh.getMaxHeightObj( $object, elem, index, length );

							for ( var i = index; i < length; i++ ) {

								$object.eq(i).find(elem).data('setheight', 'true')
												    	.height(mh);
							}

						}

					}

				}

			});				
			
		});	

	},
	getMaxHeightObj: function( $object, elem, _index, index ) {

		var mh = $object.eq(_index).find(elem).height(),
			h = 0;

		for ( var i = _index + 1; i < index; i++ ) {
			
			h = $object.eq(i).find(elem).height();
			
			if ( mh < h ) {
				mh = h;
			}
			
		}

		return mh;
	}
}
eh.ready();

});