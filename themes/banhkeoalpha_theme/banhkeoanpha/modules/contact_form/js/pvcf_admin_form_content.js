jQuery( function($) {

	$('form').submit(function(e) {

		var val = $('textarea', '.pv-contact-form-body').val();

		$('.pv-contact-form-body-field', '.pv-contact-form-body').val( val );


	});

});