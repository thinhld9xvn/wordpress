jQuery(function($) {

	$('a[modal-type="master-modal"]').click(function(e) {

		e.preventDefault();

		var modal_target = $(this).attr('modal-target');

		$( modal_target ).modal({
		  escapeClose: false,
		  clickClose: false,
		  showClose: true
		});

	});	

})