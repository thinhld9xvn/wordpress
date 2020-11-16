jQuery(function($) {

	$('*[data-navig="compactWidgTitleBox"]').each(function() {

		var $obj = $(this).find('span'),
			height = $obj.outerHeight(),
			top = $obj.position().top;

		height = height + top;

		$(this).height( height );

	});

})