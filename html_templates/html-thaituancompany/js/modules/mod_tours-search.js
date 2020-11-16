jQuery(function($) {

	$('.mobile-box-search-tour .search-button, .mobile-box-search-tour .close').click(function(e) {		

		$(this).closest('.mobile-box-search-tour')
			   .find('.mainBoxSearch')
			   .toggleClass('active');

	});



});