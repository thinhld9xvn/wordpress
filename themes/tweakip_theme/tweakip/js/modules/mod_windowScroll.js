jQuery(function($) {

	var $windom = $(window),	
		$tophead = $('.htop', '#header');

	function topHeadMouseOver(e) {	

		if ( $tophead.hasClass('-scroll') ) {
			$tophead.removeClass('-scroll');
		}	

	}

	function windowScroll(e) {

		// không xét trên mobile && ipad
		if ( window.innerWidth > 1050 ) {

			if ( $windom.scrollTop() > 0 ) {

				if ( ! $tophead.hasClass('-scroll') ) {
					$tophead.addClass('-scroll'); 
				}
			}

			else {

				topHeadMouseOver(e);

			}

		}

	}	

	$tophead.mouseover( topHeadMouseOver );

	$windom.scroll( windowScroll )
		   .resize( windowScroll );

    $('.scrollHash').click(function(e) {

    	e.preventDefault();

    	var target = $(this).attr('href'),
    		url = target.split( '#' ),
    		mainUrl = url[0],
    		hash = '#' + url[1],
    		locationUrl = window.location.origin + window.location.pathname;    	

    	window.history.pushState( "", "", hash );

    	if ( mainUrl === locationUrl ) {    		

    		$('html, body').animate({

    			scrollTop : $( hash ).offset().top - 200

    		}, 200);

    	}

    	else {

    		window.location.href = target;

    	}

    });

});