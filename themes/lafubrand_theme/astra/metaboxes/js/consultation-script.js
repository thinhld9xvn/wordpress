jQuery(function($) {

	$('#slConsultation').change(function(e) {

		$('#txtConsultation').val( $(this).val() );

	});

});