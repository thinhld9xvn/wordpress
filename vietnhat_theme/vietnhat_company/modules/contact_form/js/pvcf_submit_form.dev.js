(function( $ ) {

	var pvcf_form = {

		ready: function() {

			$('.frm_pvcf_contact_form').submit(this.on_pvcf_submit_form);			

		},
		remove_log: function( $obj, t ) {

			setTimeout( function() {

				$obj.fadeOut(500)
					.promise().done(function() {

						$obj.remove();

					});

			}, t)

		},
		on_pvcf_submit_form: function(e) {

			e.preventDefault();

			var $submit_log = $('<div class="pvcf_submit_log mtop20"></div>'),
				validate = $(this).jvalidate(),
				$submit_ajax_img = $(this).find('.pvcf_ajax_submit'),
				form = this;

			if ( validate ) {	

				$submit_ajax_img.addClass('active');

				var data = {

		            'action': 'sb_pvcf_contact_form_submit_ajax',		          
		            'cmd' : 'send_mail',
		            'form-id' : $(this).attr('data-form-id'),
		            'form-data' : $(this).serialize()
		        };
             
		        // Bien toan cuc sb_admin_ajax ban phai khai bao truoc, ben trong chua url den tap tin admin-ajax.php
		        $.post( sb_admin_ajax.url, data )
		         .done( function( msg ) {

		         	$submit_ajax_img.removeClass('active');

		         	msg = msg.trim();

		         	if ( msg === 'success' ) {

			         	$submit_log.addClass('alert alert-success')							   	   
							   	   .html('Gửi yêu cầu thành công !')
							   	   .appendTo( $(form) );						

						pvcf_form.remove_log( $submit_log, 5000 );

						form.reset();
					}

					else {

						$submit_log.addClass('alert alert-danger')
							   	   .html('Phát sinh lỗi trong quá trình gửi, xin hãy kiểm tra lại !')
							   	   .appendTo( $(form) );

						pvcf_form.remove_log( $submit_log, 3000 );

						 form.reset();		
					}					

			    })

		        .fail( function() {

		        	$submit_ajax_img.removeClass('active');

		        	$submit_log.addClass('alert alert-danger')
						   	   .html('Phát sinh lỗi trong quá trình gửi, xin hãy kiểm tra lại !')
						   	   .appendTo( $(form) );

					pvcf_form.remove_log( $submit_log, 3000 );

					 form.reset();		
					

		        });

			}


		}		

	}

	pvcf_form.ready();

})(jQuery);