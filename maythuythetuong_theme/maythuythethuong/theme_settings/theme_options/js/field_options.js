jQuery(function($) {

	var editor = {

		ready: function() {

			$('form').on( 'submit', function(e) {                



		        if ( typeof( tinyMCE ) != "undefined") {



		            $wp_editors = tinyMCE.editors;



		            if ( $wp_editors.length > 0 ) {



		                $('.wp-switch-editor.switch-tmce').click();



		                for ( var i = 0; i < $wp_editors.length; i++ ) {



		                    var id = $wp_editors[i].id,

		                        $editor_field = $('#' + id + '-editor'),

		                        contents = '';



		                    if ( $editor_field.length > 0 ) {



		                        $wp_editors[i].save();



		                        contents = $wp_editors[i].getContent();



		                        $editor_field.val( contents );



		                    }



		                }



		            }



		        }

		        

		    });

		}

	}

	var media = {

		ready: function() {

			$('.media_upload').click(function(e) {        

		        var id = $(this).attr('data-upload-startwiths-id'),

		            $attachment_thumbnail = $('#' + id + '-id'),

		            $attachment_inputbox = $('#' + id + '-input-id');

		        var custom_uploader = wp.media({

		            title: 'Select Image',

		            button: {

		                text: 'Upload Image'

		            },

		            multiple: false  // Set this to true to allow multiple files to be selected

		        })

		        .on('select', function() {

		            

		            var attachment = custom_uploader.state().get('selection').first().toJSON();

		            

		            $attachment_thumbnail.attr('src', attachment['url']);

		            $attachment_inputbox.val( attachment['url'] );

		           

		        })

		        .open();

		    });

		}

	}

	var typical = {

		ready: function() {

			var $tFTypical = $('.txtFTypical'),

				$tFChange = $tFTypical.filter('.tFChange'),

				$tFText = $tFTypical.filter('.tFText');

			if ( $tFChange.length > 0 ) {

			    $tFChange.change(function(e) {

			        $(this).next().val( $(this).val() );

			    });

			}

			if ( $tFText.length > 0 ) {

			    $('form').on('submit', function(e) {

			    	//e.preventDefault();

			    	$tFText.each(function() {

			    		var $obj = $(this);

			    		$obj.next('input[type=hidden]')

			    			.val( $obj.val() );

			    	});

			    });

			}    

		}

	}

	editor.ready();
	media.ready();

	typical.ready();

})