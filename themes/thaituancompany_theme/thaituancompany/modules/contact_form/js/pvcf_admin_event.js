jQuery(function($) {

	var pvcf_modal = {

		ready: function() {

			$('.pvcf-modal-button').click( this.showPvcfModal );	
			$('#pvcf-settings-save').click( this.saveSettingsModal );			

		},
		showPvcfModal: function(e) {

			var target = $(this).attr('data-target-modal');

			$( target ).modal({
			  escapeClose: false,
			  clickClose: false,
			  showClose: false
			});

		},	
		saveSettingsModal: function(e) {

			e.preventDefault();

			var setting_val = $(this).closest('.pvcf-modal').find('.pvcf-settings-class').val(),
				$pvcf_settings_field = $('#pvcf-settings-hidden-class');		

			$pvcf_settings_field.val( setting_val );
		}	

	}

	var pvcf_navigation = {

		ready: function() {

			$('#pvcf-button-export').click( this.onExportButtonClick );
			$('#btnImportChooseFile').change( this.onImportChooseFileClick );

		},
		onExportButtonClick: function() {

			var data = {
				'action' : 'sb_pvcf_admin_event_ajax',
				'cmd' : 'export',
				'post_id' : $(this).attr('data-post-id')
			};

			$.post( ajaxurl, data )
			 .done(function(fn) {

			 	var n = fn.split('/').pop(),
			 		$download_link = $("<a id='pvcf_data_download' href='" + fn + "' download='" + n + "'>download</a>");

			 	$download_link[0].click();		 	

			 });
		},
		onImportChooseFileClick: function(e) {

			var file_data = this.files[0],				
				data = new FormData();

			if ( file_data ) {

				$('#txtImportFilePath').val( file_data.name );

				data.append('action', 'sb_pvcf_admin_event_ajax');
				data.append('cmd', 'import');
				data.append('post_id', $(this).attr('data-post-id') );
				data.append('file', file_data);

				$.ajax({

					type : 'POST',
					url : ajaxurl,
					data : data,
					cache : false,
					dataType : 'json',
					processData: false,
					contentType : false,
					success: function( msg ) {
						window.location.reload();					
						
					}

				});

			}

		}
	}

	pvcf_modal.ready();
	pvcf_navigation.ready();

});