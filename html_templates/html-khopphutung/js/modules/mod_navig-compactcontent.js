$(document).ready(function() {

	var eh = {		
		setEqResponsive: function( $object, elem, css_property, css_value) {			

			var first_parse = true,
				_index = 0,
				index = 0,
				mh = 0,
				count = 0; // đếm xem đã duyệt bao nhieu object

			// duyet object lan thu nhat tu 0 den vi tri object co css = "clear:both" tru 1
			// tu lan thu hai tro di duyet object tu vi tri object co css = "clear:both" gan nhat cong 1
			// cho den vi tri object co css = "clear:both" tiep theo roi lap lai nhu tren cho den het

			for ( var i = 0; i < $object.length; i++) {				
				$object.eq(i).find(elem).css('height', '');				
			}

			$object.filter(function() {

				count++;

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

					var length = $object.length;

					if ( count === length ) {

						// doi tuong chua xu ly
						if ( $(this).data('setheight') !== 'true' ) {

							mh = eh.getMaxHeightObj( $object, elem, index, length );

							for ( var i = index; i < length - 1; i++ ) {

								$object.eq(i).find(elem).data('setheight', 'true')
												    	.height(mh);
							}

						}

					}


				}

			});				
				
		

		},
		getMaxHeightObj: function( $object, elem, _index, index ) {

			var mh = $object.eq(_index).find(elem).height();

			for ( var i = _index; i < index - 1; i++ ) {

				var h1 = $object.eq(i).find(elem).height();

				for ( var j = i+1; j < index; j++ ) {
					
					var h2 = $object.eq(j).find(elem).height();

					if ( h2 > h1  ) {
						mh = h2;								
					}

				}

			}

			return mh;
		}
	}	

	var compact = {

		ready: function() {

			this.doWorkBackground();
			$(window).resize(this.doWorkBackground);

		},
		doWorkBackground: function() {

			var t = null,
				$object = null,
				$owl = $('.owl-carousel'),				
				wait_owlCarousel = '';

			$('*[data-navig="compactcontent"]').each(function() {


				$object = $(this);
				wait_owlCarousel = $(this).attr('data-wait-owlcarousel-completed');

				if ( wait_owlCarousel === 'true' ) {

					t = setInterval( function() {

						if ( $owl.is(':visible') ) {

							clearInterval( t );
							compact.doShortContent( $object );

						}

					}, 200 );

				}

				else {

					compact.doShortContent( $object );

				}

			});

		},
		doShortEachElem: function($elem, content, numOnIpad, numOnMobile, endShort) {

			var w = $(window).width();

			// ipad
			if ( w > 768 & w < 992 ) {

				if ( numOnIpad < content.length ) {
					content = content.substr(0, numOnIpad) + ' ' + endShort;				
				}

			}

			// mobile
			else if ( w < 768 ) {

				if ( numOnMobile < content.length ) {
					content = content.substr(0, numOnMobile) + ' ' + endShort;
				}

			}

			$elem.html( content );		

		},
		doShortContent: function($this) {

			var multiple = $this.attr('data-multiple'),
				object = $this.attr('data-object'),
				$object = $this.find(object),					
				elem = $this.attr('data-setcompact'),
				$elem = null,
				content = '',
				numCharOnIpad = $this.attr('data-numCharOnIpad'),
				numCharOnMobile = $this.attr('data-numCharOnMobile'),
				endShortContent = $this.attr('data-endShortContent'),
				cssProperty = $this.attr('data-delimiter-css-property'),
				cssValue = $this.attr('data-delimiter-css-value');

			if ( multiple === 'true') {

				var elems = elem.split(','),
					numCharOnIpads = numCharOnIpad.split(','),
					numCharOnMobiles = numCharOnMobile.split(','),
					endShortContents = endShortContent.split(',');

				for( var i = 0; i < elems.length; i++ ) {

					elem = elems[i].trim();					
					numCharOnIpad = numCharOnIpads[i].trim() ;
					numCharOnMobile = numCharOnMobiles[i].trim();
					endShortContent = endShortContents[i].trim();

					$object.each(function () {

						$elem = $(this).find( elem );
						content = $elem.attr('data-originalContent');
						compact.doShortEachElem( $elem, content, numCharOnIpad, numCharOnMobile, endShortContent );						

					});

					eh.setEqResponsive( $object, elem, cssProperty, cssValue );			

				}	

			}

			else if ( multiple === 'false') {

				$object.each(function () {

					$elem = $(this).find( elem );
					content = $elem.attr('data-originalContent');
					compact.doShortEachElem( $elem, content, numCharOnIpad, numCharOnMobile, endShortContent );						

				});

				eh.setEqResponsive( $object, elem, cssProperty, cssValue );				

			}
			

		}
	}
	compact.ready();

});
