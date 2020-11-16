jQuery(function($) {

	const TITLE_MINIMUM_LENGTH = 10,
		  TITLE_MAXIMUM_LENGTH = 70;

	$('*[data-seochecker="title"]').each(function() {

		var $input = $(this),	
			$input_parent = $input.parent(),
			str_length = 0,
			seo_msg = '',
			$seo_msg = null;

		$input.keyup(function(e) {

			str_length = $input.val().toString().length;
			$seo_msg = $input_parent.find('.seochecker-msg');

			if ( str_length >= TITLE_MINIMUM_LENGTH && str_length <= TITLE_MAXIMUM_LENGTH ) {				

				seo_msg = '	Tiêu đề có độ dài ' + str_length + ' , đã chuẩn seo';

				if ( $seo_msg.length === 0 ) {

					$input_parent.append( ['<span class="seochecker-msg validate">',								   	   
									   	    seo_msg,
									   	   '</span>'].join('') );

				}

				else {

					$seo_msg.attr('class', 'seochecker-msg validate')
					        .html( seo_msg );

				}
				
			}

			else {

				if ( str_length < TITLE_MINIMUM_LENGTH ) {

					seo_msg = '	Tiêu đề có độ dài quá ngắn, tiêu đề phải nằm trong khoảng từ ' + TITLE_MINIMUM_LENGTH + ' ký tự đến ' + TITLE_MAXIMUM_LENGTH + ' ký tự';

					if ( $seo_msg.length === 0 ) {

						$input_parent.append( ['<span class="seochecker-msg error">',									   	   
										   	   seo_msg,
										   	   '</span>'].join('') );

					}

					else {

						$seo_msg.attr('class', 'seochecker-msg error')
					        	.html(seo_msg);

					}


				}

				else {

					seo_msg = '	Tiêu đề quá dài, tiêu đề phải nằm trong khoảng từ ' + TITLE_MINIMUM_LENGTH + ' ký tự đến ' + TITLE_MAXIMUM_LENGTH + ' ký tự';

					if ( $seo_msg.length === 0 ) {

						$input_parent.append( ['<span class="seochecker-msg error">',									   	   
										   	    seo_msg,
										   	   '</span>'].join('') );

					}

					else {

						$seo_msg.attr('class', 'seochecker-msg error')
					        	.html(seo_msg);

					}

				}
					
			}

		})

	});

});