const EMPTY_THUMBNAIL_URL = '/wp-content/themes/galio-design/theme_settings/metaboxes/images/empty-thumbnail.png';
jQuery( function($) {
	var accordion = {
		accordion_indexes: [],
		accordion_poses : [],
		ready: function() {			
			var $metabox_groupbox_fields_sortables = $( ".metabox_groupbox_fields_sortables" );			
			$metabox_groupbox_fields_sortables.sortable({
			      connectWith: ".metabox-field-postbox-item",
			      handle: ".metabox-handle-title",		   
			      placeholder: "metabox-placeholder ui-corner-all"
		    });
		    var $accordion_sortables = $( ".metabox-accordion-sortables" );
			// init indexes
			$accordion_sortables.each(function(i, e) {
				const id = e.closest('.metabox_group_field').getAttribute('id');
				accordion.accordion_indexes[id] = typeof(accordion_indexes) !== 'undefined' && accordion_indexes[id] ? accordion_indexes[id] : 0;
				accordion.accordion_poses[id] = typeof(accordion_poses) !== 'undefined' && accordion_poses[id] ? accordion_poses[id] : [];
				
			});
		    $accordion_sortables.sortable({
			      connectWith: ".metabox-field-postbox-item",
			      handle: ".metabox-handle-title",		   
			      placeholder: "metabox-placeholder ui-corner-all",
				  start: this.on_accordion_startSortUpdate,
				  stop: this.on_accordion_stopSortupdate
		    });
			//$accordion_sortables.on( "sortupdate", this.on_accordion_sortupdate );
			$accordion_sortables.each( function(index, elem) {
				var accordion_title_field = $(elem).find('.accordion-template-item')
							    				   .find('.metabox-accordion-title')
							    				   .find('.title')
							    				   .attr('data-accordion-title-field');
				$(document).on( 'keyup', 
								'input[type=text][id*="' + accordion_title_field + '"]', 
								accordion.on_accordion_field_title_keyup );
			});
			$(document).on( 'click', '.metabox-collapse-button', this.on_collapse_field_box )			   
					   .on( 'click', '.metabox-accordion-remove-button', this.on_accordion_remove_field )
					   .on( 'click', '.metabox-accordion-clone-button', this.on_accordion_clone_field )
					   .on( 'click', '.metabox-handle-title, .metabox-collapse-button', this.on_accordion_handle_click );
			$('.metabox-accordion-add-button').click( this.on_accordion_add_field );		
			const $firstMetabox = $('#advanced-sortables .postbox:eq(0)').find('.metabox_groupbox_fields_sortables:eq(0)')
												   				   .find('.metabox-field-postbox-item:eq(0)');
			$firstMetabox.find('h2:eq(0)').click();
			$firstMetabox.removeClass('closed');
		},
		removeTinymceEditor: function($obj, remove_inst = false) {
			var textarea_id = $obj.attr('id'),
				textarea_name = $obj.attr('name');
			if ( remove_inst ) {
				tinymce.get(textarea_id).destroy();
			}
			var $editor_container = $obj.closest('.wp-editor-container'),
				$editor_toolbar = $editor_container.prev('.wp-editor-tools'),					
				$add_media_button = $editor_toolbar.find('button.add_media'),
				$editor_tabs_button = $editor_toolbar.find('button.wp-switch-editor');							
			$obj.prev('.mce-container').remove();
			$obj.prev('.quicktags-toolbar').remove();
			$obj.remove();
			$add_media_button.attr('data-editor', textarea_id);
			$editor_tabs_button.attr('data-wp-editor-id', textarea_id);
			$editor_container.append("<textarea class='wp-editor-area' rows='5' tabindex='1' autocomplete='off' cols='40' id='" + textarea_id + "' name='" + textarea_name + "'></textarea>");
		},
		reInitTinymceEditor: function(id, old_id) {
			var $editor_container = $('#' + id).closest('.wp-editor-container'),
				$editor_toolbar = $editor_container.prev('.wp-editor-tools');
			var mceInit = tinyMCEPreInit.mceInit[old_id];
			mceInit.selector = '#' + id;				
			tinymce.init( mceInit ); //init tinymce							
			var qt_instance = quicktags({ id }),
				t = setInterval(function() {
					if ( typeof qt_instance === 'object' ) {
						QTags._buttonsInit();
						$editor_toolbar.find('.wp-switch-editor.switch-html')
										.click();
						clearInterval( t );
					}
				}, 200);
		},
		on_accordion_startSortUpdate: function( event, ui ) {
			/*$(ui.item).find('textarea').each(function(i, e){
		        tinymce.EditorManager.execCommand('mceRemoveEditor', 
														false, 
														$(e).attr('id'));
		    });*/
		},
		on_accordion_stopSortupdate: function( event, ui ) { 
			let index = 0,
				length = $(ui.item).parent().find('.metabox-accordion-item').length - 1;			
				$fields_has_name = null; // cập nhật lại id && name của các field trong accordion
			$('.metabox-accordion-item:not(.accordion-template-item)').each(function () {
				$fields_has_name = $(this).find('*[name]');
				$fields_has_name.each(function () {
				  let id = $(this).attr('id'),
				  	  name = $(this).attr('name'),
					  s = name.split(/\[\d\]/),
					  ac_container = '',
					  ac_field = '';
				  if (2 === s.length) {
					ac_container = s[0];
					ac_field = s[1];
					ac_field = ac_field.replace('[', '\\[');
					ac_field = ac_field.replace(']', '\\]');
					name = name.replace(new RegExp(ac_container + '\\[\\d\\]' + ac_field, 'ig'), 
											ac_container + '[' + index + ']' + ac_field);
					name = name.replace(/\\/ig, '');
					$(this).attr('name', name);
					if ( id ) {
						s = id.split(/-\d-/);
						ac_container = s[0];
						ac_field = s[1];
						id = id.replace(new RegExp(ac_container + '-\\d-' + ac_field, 'ig'), 
											ac_container + '-' + index + '-' + ac_field);
						$(this).attr('id', id);
					}
				  }
				});
				index++;
			  });	
			index = $(ui.item).index() - 1;
			$(ui.item).find('textarea').each(function(i, e) {
				const id = e.getAttribute('id');
				const regMatch = id.match(/[0-9]{1,}/);
				if ( regMatch ) {
					const vMatch = regMatch[0];
					const idMce1 = id.replace(vMatch, index),
						  idMce2 = index - 1 >= 0 ? id.replace(vMatch, index - 1) : null,
						  idMce3 = index + 1 < length  ? id.replace(vMatch, index + 1) : null;
					idMce1 && tinymce.get(idMce1).destroy();
					idMce2 && tinymce.get(idMce2).destroy();
					idMce3 && tinymce.get(idMce3).destroy();
					idMce1 && tinymce.EditorManager.execCommand('mceAddEditor', 
																	false, 
																	idMce1);
					idMce2 && tinymce.EditorManager.execCommand('mceAddEditor', 
														false, 
														idMce2);
					idMce3 && tinymce.EditorManager.execCommand('mceAddEditor', 
														false, 
														idMce3);
				}
				//tinymce.get().destroy();
				/*tinymce.EditorManager.execCommand('mceAddEditor', 
														false, 
														e.getAttribute('id'));*/
			});
		},	
		on_collapse_field_box: function(e) {
			var $postbox_item = $(this).closest('.metabox-field-postbox-item'),
				$groupbox = $postbox_item.find('.metabox-field-postbox-item');
			$postbox_item.siblings().filter(function(index) { 
				return ! $(this).hasClass('closed');
			}).addClass('closed');	
			if ( $postbox_item.hasClass('closed') ) {
				$postbox_item.removeClass('closed');
				$groupbox.removeClass('closed');
			}
			else {
				$postbox_item.addClass('closed');
			}			
		},
		on_accordion_add_field: function(e) {
			var $accordion_group_fields = $(this).next('.metabox-accordion-group'),
				$accordion_field = $accordion_group_fields.find('.accordion-template-item').clone(),
				id = $(this).closest('.metabox_group_field').attr('id'),
				accordion_index = accordion.accordion_indexes[id];
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
								 	id = id.replace( new RegExp('__index__', 'ig'), accordion_index  );
								 	$obj.attr('id', id);						 									 		
								}
								if ( undefined !== name ) {
								 	name = name.replace( new RegExp('-uo-', 'ig'), '[' );
								 	name = name.replace( new RegExp('-__index__-', 'ig'), accordion_index );
								 	name = name.replace( new RegExp('-uc-', 'ig'), ']' );
								 	$obj.attr('name', name);
									if ( typeof($obj.data('prefix')) !== 'undefined' && $obj.hasClass('thumbnail') ) {
										const value = name.substr(0, name.length - "[thumbnail]".length);
										$obj.data('prefix', value);	
										$obj.attr('data-prefix', value);										
										$obj.val('');
										$obj.prev('img')
											.attr('src', EMPTY_THUMBNAIL_URL);
									}
								}										 
							});		
			$accordion_field.removeClass('closed')
							.appendTo( $accordion_group_fields );
			var $textarea = $accordion_field.find('.wp-editor-wrap')
									 		.find('textarea');
			$textarea.each( function( index, elem ) {
				const $obj = $(elem),
					  textarea_id = $obj.attr('id'),
						old_textarea_id = $obj.data('editor-old-id');			
				accordion.removeTinymceEditor($obj);
				accordion.reInitTinymceEditor(textarea_id, old_textarea_id);
			});
			accordion.accordion_indexes[id]++;			
		},
		on_accordion_remove_field: function(e) {
		 var $accordion = $(this).closest('.metabox-accordion-item'),
			 id = $(this).closest('.metabox_group_field').attr('id');
		 // remove instance tinymce
		 $accordion.find("textarea[class='wp-editor-area']")
		 		   .each( function(index, elem) {
		 		   		tinymce.get( $(elem).attr('id') ).remove();
		 		   });
		 $accordion.remove();
		 accordion.accordion_indexes[id]--;
		},
		on_accordion_clone_field: function(e) {
			var $accordion_group_fields = $(this).closest('.metabox-accordion-group'),
				$accordion = $(this).closest('.metabox-accordion-item').clone(),
				$groupbox = $accordion.find('.metabox-field-postbox-item'),
				newAccordionId = $accordion_group_fields.find('> .metabox-accordion-item').length - 1,
				getNewAttributeElem = function(attr, newValue) {
					const reg = /[0-9]{1,}/;
					const matchReg = attr.match(reg);
					if ( matchReg && matchReg['index'] ) {
						const myId = matchReg[0];
						return attr.replace(myId, newValue);
					}
					return null;
				};
			$groupbox.removeClass('closed');
			$accordion_group_fields.append($accordion);
			$accordion.find('*')
					  .each(function(i, elem) {
						var $obj = $(elem),
							id = $obj.attr('id'),
							name = $obj.attr('name'),
							newId = '',
							newName = '';
				if ( id ) {
					newId = getNewAttributeElem(id, newAccordionId);
					newId && $obj.attr('id', newId);					
				}
				if ( name ) {
					newName = getNewAttributeElem(name, newAccordionId);
					newName && $obj.attr('name', newName);
					if ( typeof($obj.data('prefix')) !== 'undefined' && 
							$obj.hasClass('thumbnail') ) {
						const value = newName.substr(0, newName.length - "[thumbnail]".length);
						$obj.data('prefix', value);	
						$obj.attr('data-prefix', value);
					}
				}	
				if ( elem.type === 'textarea') {
					if ( newId ) {						
						accordion.removeTinymceEditor($obj);
						accordion.reInitTinymceEditor(newId, 'content');
						tinymce.get(newId).setContent(tinymce.get(id).getContent());
					}
				}
			});
			$(this).closest('.metabox-accordion-sortables').sortable('refresh');
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
			if ( $obj.hasClass('metabox-collapse-button') ) {
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
	accordion.ready();
});