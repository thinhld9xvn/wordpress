jQuery( function($) {

	function showSettingsModal() {

		$('#pvcf-settings-modal').modal({
		  escapeClose: false,
		  clickClose: false,
		  showClose: false
		});

	}	

	function saveSettingsModal(e) {

		e.preventDefault();

		var setting_val = $(this).closest('.pvcf-modal').find('.pvcf-settings-class').val(),
			$pvcf_settings_field = $('#pvcf-settings-hidden-class');		

		$pvcf_settings_field.val( setting_val );
	}

	$('#pvcf-button-settings').click( showSettingsModal );	
	$('#pvcf-settings-save').click( saveSettingsModal );

});