jQuery(function($) {

	var $scrollObj = $('.scrollToTop'),
		$_window = $(window);

	$scrollObj.click(function(e) {
		e.preventDefault();

		$('html, body').animate({
			scrollTop: 0
		}, 200);
	});

	$_window.scroll(function(e) {

		var scrollTop = $_window.scrollTop();

		if ( scrollTop > 0 ) {

			if ( ! $scrollObj.hasClass('active') ) {
				$scrollObj.addClass('active');
			}

		}

		else {

			if ( $scrollObj.hasClass('active') ) {
				$scrollObj.removeClass('active');
			}

		}


	});

})