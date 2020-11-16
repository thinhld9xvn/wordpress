jQuery(function($) {

	var accordion = {

		accordion_index: 0,
		ready: function() {			

			var $metabox_groupbox_fields_sortables = $( ".metabox_groupbox_fields_sortables" );			

			$metabox_groupbox_fields_sortables.sortable({
			      connectWith: ".metabox-field-postbox-item",
			      handle: ".metabox-handle-title",		   
			      placeholder: "metabox-placeholder ui-corner-all"
		    });		   

		    var $accordion_sortables = $( ".metabox-accordion-sortables" );

		    $accordion_sortables.sortable({
			      connectWith: ".metabox-field-postbox-item",
			      handle: ".metabox-handle-title",		   
			      placeholder: "metabox-placeholder ui-corner-all"
		    });

		    try {
		    	this.accordion_index = accordion_index;
		    } catch(e) {}

			$accordion_sortables.on( "sortupdate", this.on_accordion_sortupdate );
			$accordion_sortables.each( function(index, elem) {

				var accordion_title_field = $(elem).find('.accordion-template-item')
							    				   .find('.metabox-accordion-title')
							    				   .find('.title')
							    				   .attr('data-accordion-title-field');

				$(document).on( 'keyup', 
								'input[type=text][id*="' + accordion_title_field + '"]', 
								accordion.on_accordion_field_title_keyup );

			});

			$(document).on( 'click', '.metabox-collapse-box', this.on_collapse_field_box )					   
					   .on( 'click', '.metabox-accordion-remove-button', this.on_accordion_remove_field )
					   .on( 'click', '.metabox-handle-title, .metabox-collapse-button', this.on_accordion_handle_click );

			$('.metabox-accordion-add-button').click( this.on_accordion_add_field );		

		},
		on_accordion_sortupdate: function( event, ui ) { 

			var index = 0,
				id = '',
				name = '',
				$fields_has_name = null;

			// cập nhật lại id && name của các field trong accordion
			$('.metabox-accordion-item:not(.accordion-template-item)').each(function() {

				$fields_has_name = $(this).find('*[name]');
				$fields_has_name.each(function() {

					id = $(this).attr('id'),
					name = $(this).attr('name');

					var s = name.split(/\[\d\]/),
						ac_container = '',
						ac_field = '';

					if ( 2 === s.length ) {

						ac_container = s[0];
						ac_field = s[1];

						ac_field = ac_field.replace('[', '\\[');
						ac_field = ac_field.replace(']', '\\]');

						name = name.replace( new RegExp( ac_container + '\\[\\d\\]' + ac_field, 'ig' ), ac_container + '[' + index + ']' + ac_field );
						name = name.replace(/\\/ig, '');

						$(this).attr('name', name);

						s = id.split(/-\d-/);
						ac_container = s[0];
						ac_field = s[1];

						id = id.replace( new RegExp( ac_container + '-\\d-' + ac_field, 'ig' ), ac_container + '-' + index + '-' + ac_field );

						$(this).attr('id', id);

					}

				});				

				index++;

			});

		},
		on_collapse_field_box: function(e) {

			var $postbox_item = $(this).closest('.metabox-field-postbox-item');			

			$postbox_item.siblings().filter(function(index) { 
				return ! $(this).hasClass('closed');				
			}).addClass('closed');
			$postbox_item.toggleClass('closed');

		},
		on_accordion_add_field: function(e) {

			var $accordion_group_fields = $(this).next('.metabox-accordion-group'),
				$accordion_field = $accordion_group_fields.find('.accordion-template-item').clone(),
				html = '';

			$accordion_field.removeClass('accordion-template-item');
			$(this).next( '.metabox-accordion-sortables' ).sortable('refresh');

			$accordion_field.find('*[id*="-uo-"], *[name*="-uo-"]')
							.each( function(index, elem) {

							 	var $obj = $(elem),
							 		id = $obj.attr('id'),
							 		name = $obj.attr('name');

							 	if ( undefined !== id ) {

							 		if ( $obj.is('textarea') && 
							 			 $obj.hasClass('wp-editor-area') ) {

							 			$obj.data('editor-old-id', id);
							 		}						 			

					 				id = id.replace( new RegExp('-uo-', 'ig'), '' );											 	
								 	id = id.replace( new RegExp('-uc-', 'ig'), '' );								 									 	
								 	id = id.replace( new RegExp('__index__', 'ig'), accordion.accordion_index  );

								 	$obj.attr('id', id);						 									 		

								}

								if ( undefined !== name ) {

								 	name = name.replace( new RegExp('-uo-', 'ig'), '[' );
								 	name = name.replace( new RegExp('-__index__-', 'ig'), accordion.accordion_index );
								 	name = name.replace( new RegExp('-uc-', 'ig'), ']' );

								 	$(elem).attr('name', name);

								}										 

							});		

			$accordion_field.removeClass('closed')
							.appendTo( $accordion_group_fields );

			var $textarea = $accordion_field.find('.wp-editor-wrap')
									 		.find('textarea');

			$textarea.each( function( index, elem ) {

				var $obj = $(elem),					
					$editor_container = $obj.closest('.wp-editor-container'),

					$editor_toolbar = $editor_container.prev('.wp-editor-tools'),					
					$add_media_button = $editor_toolbar.find('button.add_media'),
					$editor_tabs_button = $editor_toolbar.find('button.wp-switch-editor'),

					textarea_id = $obj.attr('id'),
					old_textarea_id = $obj.data('editor-old-id'),
					textarea_name = $obj.attr('name');				

				$obj.prev('.mce-container').remove();
				$obj.prev('.quicktags-toolbar').remove();
				$obj.remove();

				$add_media_button.attr('data-editor', textarea_id);
				$editor_tabs_button.attr('data-wp-editor-id', textarea_id);

				$editor_container.append("<textarea class='wp-editor-area' rows='5' tabindex='1' autocomplete='off' cols='40' id='" + textarea_id + "' name='" + textarea_name + "'></textarea>");

				var mceInit = tinyMCEPreInit.mceInit[old_textarea_id];				

				mceInit.selector = '#' + textarea_id;				

				tinymce.init( mceInit ); //init tinymce							

				var qt_instance = quicktags({ id : textarea_id }),

					t = setInterval(function() {

						if ( typeof qt_instance === 'object' ) {

							QTags._buttonsInit();

							$editor_toolbar.find('.wp-switch-editor.switch-html')
										   .click();

							clearInterval( t );

						}

					}, 200);

			});

			accordion.accordion_index++;			

		},
		on_accordion_remove_field: function(e) {

		 var $accordion = $(this).closest('.metabox-accordion-item');

		 // remove instance tinymce
		 $accordion.find("textarea[class='wp-editor-area']")
		 		   .each( function(index, elem) {

		 		   		tinymce.get( $(elem).attr('id') ).remove();

		 		   });

		 $accordion.remove();

		 accordion.accordion_index--;

		},
		on_accordion_field_title_keyup: function(e) {

			var $accordion_item = $(this).closest('.metabox-accordion-item'),
				$accordion_title = $accordion_item.find('.metabox-accordion-title')
												  .find('.title'),
				text = $(this).val();

			if ( '' !== text ) {
				$accordion_title.html( ' : ' + text );
			}

			else {
				$accordion_title.html( '' );
			}

		},
		on_accordion_handle_click: function(e) {

			var $obj = $(this);

			if ( $(this).hasClass('metabox-collapse-button') ) {
				$obj = $(this).next('h2.metabox-handle-title');
			}

			var $parent = $obj.closest('.metabox-field-postbox-item');

			$parent.closest('.metabox-field-postbox-item')
				   .siblings()
				   .find('h2.metabox-handle-title')
				   .removeClass('markup');

			if ( ! $obj.hasClass('markup') ) {
				$obj.addClass('markup');
			}

			if ( $parent.hasClass('closed') ) {

				var $c_parent = $parent.find('.metabox-field-postbox-item');

				if ( $c_parent.length > 0 ) {

				    $c_parent.find('h2.metabox-handle-title')
				   			 .removeClass('markup');

				   	$c_parent.addClass('closed');

				}

			}

		}

	}	

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

	var select = {

		ready: function() {

			var $select = $('.select_field_metabox');

		    function set_metabox_fields_simple_rule_callback( $object, s_value, rule_value, rule_compare, postbox ) {

		       switch ( rule_compare ) {

		            case '=' :

		                if ( s_value === rule_value ) {
		                    
		                    if ( $object.hasClass('mb_hidden') ) {
		                        $object.removeClass('mb_hidden'); 
		                    }

		                }

		                else {

		                    if ( ! $object.hasClass('mb_hidden') ) {
		                        $object.addClass('mb_hidden');
		                    }

		                }

		                break;

		            case '!=' :

		                if ( s_value !== rule_value ) { 

		                    if ( $object.hasClass('mb_hidden') ) {
		                        $object.removeClass('mb_hidden');
		                    }

		                }

		                else {

		                    if ( ! $object.hasClass('mb_hidden') ) {
		                        $object.addClass('mb_hidden');
		                    }

		                }

		                break;

		        }    

		    }

		    function set_metabox_fields_complex_rule_callback( $object, s_value, rule_fids, rule_values, rule_compares, rule_operator ) {

		        var rules_length = rule_fids.length,
		            boolLogic = null;

		        for ( var i = 0; i < rules_length; i++ ) {

		            //console.log( rule_fids[i] );

		            var fid = rule_fids[i],               
		                value = $('#' + fid).val(),
		                rule_value = rule_values[i],
		                rule_compare = rule_compares[i],
		                result_compare = true;

		            switch ( rule_compare ) {

		                case '=' :

		                    if ( value === rule_value  ) {
		                        result_compare = true;
		                    }

		                    else {
		                        result_compare = false;
		                    }

		                    break;

		                case '!=' :

		                    if ( value !== rule_value ) { 
		                        result_compare = true;
		                    }

		                    else {
		                        result_compare = false;
		                    }

		                    break;

		            }

		            switch ( rule_operator ) {

		                case 'AND' :

		                    boolLogic = null === boolLogic ? result_compare : boolLogic && result_compare;
		                    break;

		                case 'OR' :

		                    boolLogic = null === boolLogic ? result_compare : boolLogic || result_compare;
		                    break;

		            }

		            //console.log('boolLogic = ' + boolLogic );

		        }

		        if ( boolLogic ) {

		            if ( $object.hasClass('mb_hidden') ) {
		                $object.removeClass('mb_hidden');
		            }

		        }

		        else {

		            if ( ! $object.hasClass('mb_hidden') ) {
		                $object.addClass('mb_hidden');
		            }

		        }

		        $object.data('condition-complex-approved', 'approved');
		        
		    }

		    function set_state_metabox_fields( s_id, s_value, method ) {

		        // chỉ xét những metabox và trường ràng buộc có thuộc tính
		        // data-metabox-condition-field = s_id
		        var $metabox = $( '#advanced-sortables' ).find('.metabox_wrap'),
		            set_metabox_fields_callback = function( index, elem ) {

		                var $object = $(elem),
		                    postbox = false,

		                    rule_complex = $object.attr('data-metabox-condition-complex'),                     
		                    rule_name = $object.attr('data-metabox-condition-rule'),

		                    rule_fid = $object.attr('data-metabox-condition-field'),
		                    rule_value = $object.attr('data-metabox-condition-value'),
		                    rule_compare = $object.attr('data-metabox-condition-compare'),
		                    rule_operator = $object.attr('data-metabox-condition-operator'),

		                    // cờ này cho phép tiếp tục duyệt field này hay không ?
		                    // cờ này chỉ có tác dụng trong những rule complex và trong vòng lặp each của select
		                    // mỗi một field có rule complex chỉ cho phép duyệt một lần duy nhất
		                    // nếu field đã duyệt rồi thì data của field: "condition-complex-approved" = "approved"                    
		                    rule_complex_approved = true;

		                if ( $object.hasClass('metabox_wrap') ) {                   
		                    $object = $object.closest('.postbox'); 
		                    postbox = true;
		                }

		                if ( 'visible' === rule_name ) {

		                    if ( 'true' === rule_complex ) {

		                        if ( 'each' === method ) {

		                            // field đã duyệt rồi => set cờ 'rule_complex_approved' = false để không duyệt tiếp
		                            if ( 'approved' === $object.data('condition-complex-approved') ) {
		                                rule_complex_approved = false;
		                            } 

		                        }

		                        // tiến hành duyệt field có complex rule
		                        if ( rule_complex_approved ) {

		                            //console.log('approved');

		                            var rule_fids = rule_fid.split(','),
		                                rule_values = rule_value.split(','),
		                                rule_compares = rule_compare.split(',');

		                            set_metabox_fields_complex_rule_callback( $object, s_value, rule_fids, rule_values, rule_compares, rule_operator );

		                        }

		                    }

		                    else {
		                        set_metabox_fields_simple_rule_callback( $object, s_value, rule_value, rule_compare, postbox );
		                    }                                          

		                }
		            },
		            $mb = $metabox.filter('div[data-metabox-condition-field="' + s_id + '"]');
		        
		        if ( $mb.length > 0 ) {            
		            $mb.each( set_metabox_fields_callback );
		        }

		        var $fields = $metabox.find('div[data-metabox-condition-field*="' + s_id + '"]');
		        
		        if ( $fields.length > 0 ) {
		            $fields.each( set_metabox_fields_callback );
		        }

		    }

		    function set_state_term_metabox( $obj ) {

		    	var obj_value = $obj.val();

		    	if ( $obj.hasClass('slFrontTermLayout') || 
		        	 $obj.hasClass('slTermLayout') ) {

		        		$('.form_table_layout').each( function(index, elem) {

		        			if ( $(elem).hasClass( obj_value ) ) {

		        				if ( $(elem).hasClass('mb_hidden') ) {
		        					$(elem).removeClass('mb_hidden');
		        				}

		        			}

		        			else {

		        				if ( ! $(elem).hasClass('mb_hidden') ) {
		        					$(elem).addClass('mb_hidden');
		        				}

		        			}				   

		        		});

		        	}

		    }
		    
		    $select.change(function(e) {

		    	var $obj = $(this),
		            obj_value = $obj.val();

		        // có ràng buộc hiển thị trường dữ liệu
		        if ( $obj.hasClass('validate') ) {

		        	set_state_metabox_fields( $obj.attr('id'),
		                                      obj_value,
		                                      'change' );
		        }

		        else {

		        	set_state_term_metabox( $obj );

		        }

		    });

		    $select.each( function(index, elem) {

		        var $obj = $(elem);

		        if ( $obj.hasClass('validate') ) {

		            set_state_metabox_fields( $obj.attr('id'),
		                                      $obj.val(),
		                                      'each' );

		        }

		        else {

		        	set_state_term_metabox( $obj );

		        }

		    });    

		}

	}

	var media = {
        
        ready: function() {
            
            $(document).on('click', '.field_media_widget_remove', this.removeCustomFieldMedia)
                       .on('click', '.media_upload', this.uploadMedia)
                       .on('click', '.field_media_widget_add', this.addCustomFieldMedia);
                                       
        },
        
        addCustomFieldMedia: function(e) {

             e.preventDefault();
        
            var field_id = $(this).attr('data-field-id'),
                image_path = $(this).attr('data-image-path'),
                remove_widget_src = image_path + '/widget_remove.png',
                thumbnail_enable = $(this).attr('data-thumbnail-enable') === 'true',
                html_field = '';
            
            html_field += '<div class="field mtop10">';
            
            if ( thumbnail_enable  ) {
                html_field +=  '<img src="" class="thumbnail_media_field_metabox vmiddle" />';
            }
                       
            html_field +=  '    <input type="text" name="' + field_id + '[]' + '" class="media_field_metabox vmiddle" value="" />'
                       +  '    <input type="button" class="button button-default media_upload vmiddle" value="Chọn ảnh" />'
                       +  '    <img src="' + remove_widget_src  + '" class="field_media_widget_remove vmiddle cpointer" />'
                       +  '</div>';
            
            $(this).closest('.metabox_field').append( html_field );
            
        },
        
        removeCustomFieldMedia: function(e) {
            
            e.preventDefault();
            $(this).closest( '.field' ).remove();
            
        },
        
        uploadMedia: function(e) {
            
            e.preventDefault();
        
            var $field =  $(this).closest('.field'),
                $attachment_thumbnail = $field.find('.thumbnail_media_field_metabox'),
                $attachment_url = $field.find('.media_field_metabox'),
                
                custom_uploader = wp.media({
                    title: 'Select Media',
                    button: {
                        text: 'Upload Image'
                    },
                    multiple: false  // Set this to true to allow multiple files to be selected
                })
                .on('select', function() {
                    
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    
                    if ( $attachment_thumbnail.length > 0 ) {
                        $attachment_thumbnail.attr('src', attachment['url'] );
                    }
                    
                    $attachment_url.val( attachment['url'] );
                   
                })
                .open();
                
            }
    }   

    var typical = {

		ready: function() {

			var $tFTypical = $('.txtFTypical'),

				$tFChange = $tFTypical.filter('.tFChange');			

			if ( $tFChange.length > 0 ) {

			    $tFChange.change(function(e) {

			    	var val = $(this).val();

			    	if ( $(this).is(':checkbox') ) {
			    		val = $(this).prop('checked');
			    	}

			        $(this).next().val( val );

			    });

			}			

		}

	}
    
	accordion.ready();
	
	editor.ready();

	select.ready();

	media.ready();

	typical.ready();

});