jQuery(function($) {

	$('.searchbox button').click(function(e) {

		e.preventDefault();

		$(this).next('.search-field')
			   .toggleClass('active');

	});
 
});