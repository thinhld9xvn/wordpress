jQuery( function($) {

	var _pvcf = {

		pvcf_index: 0,
		ready: function() {

			this.pvcf_index = pvcf_index;

			$( ".pvcf-sortable-fields" ).sortable({
			      connectWith: ".pvcf-sortable-fields",
			      handle: ".pvcf-handle-title",		   
			      placeholder: "pvcf-placeholder ui-corner-all"
		    })
		    .on( "sortupdate", this.on_pvcf_sortupdate );

			$(document).on( 'click', '.pvcf-collapse-box', this.on_collapse_field_box )
					   .on( 'change', '.pvcf-field-required-checkbox', this.on_pvcf_field_required_check )
					   .on( 'change', '.sl-pvcf-field-type', this.on_pvcf_field_type_change )
					   .on( 'keyup', '.pvcf-field-title', this.on_pvcf_field_title_keyup )
					   .on( 'click', '.pvcf-button-remove-field', this.on_pvcf_remove_field );

			$('#pvcf-button-add-fields').click( this.on_pvcf_add_field );

			$('form').submit( this.on_pvcf_submit_form );

		},
		scrollToEndField: function() {

			$("html, body").animate({ scrollTop: $('.pvcf-field:last-child').position().top }, 200);

		},
		on_pvcf_sortupdate: function( event, ui ) { 

			var index = 0,
				name = '',
				$fields_has_name = null;

			$('.pvcf-field:not(.pvcf-template-field)').each(function() {

				$fields_has_name = $(this).find('*[name]');
				$fields_has_name.each(function() {

					name = $(this).attr('name');
					name = name.replace(/pv\-contact\-form\-field\[\d\]/ig, 'pv-contact-form-field[' + index + ']');

					$(this).attr('name', name);

				});				

				index++;

			});

		},
		on_collapse_field_box: function(e) {

			$(this).closest('.pvcf-field-box').toggleClass('closed');

		},
		on_pvcf_add_field: function(e) {

			var $pvcf_group_fields = $('.pvcf-group-fields'),
				$pvcf_field = $pvcf_group_fields.find('.pvcf-template-field').clone(),
				html = '';

			$pvcf_field.removeClass('pvcf-template-field').appendTo( $pvcf_group_fields );			
			$( ".pvcf-sortable-fields" ).sortable('refresh');

			html = $pvcf_field.html();
			html = html.replace(/\%index/ig, _pvcf.pvcf_index);

			$pvcf_field.html( html );

			_pvcf.pvcf_index++;

			_pvcf.scrollToEndField();

		},
		on_pvcf_remove_field: function(e) {

			$(this).closest('.pvcf-field').remove();

			_pvcf.pvcf_index--;

		},
		on_pvcf_field_title_keyup: function(e) {

			var $field = $(this).closest('.pvcf-field'),
				$field_section_title = $field.find('.pvcf-field-section-title'),

				$field_title_label = $field_section_title.find('.title'),
				$field_type_label = $field_section_title.find('.type'),	
				$field_require_label = $field_section_title.find('.require'),	

				$field_type = $field.find('.sl-pvcf-field-type'),
				field_type_value = $field_type.val(),
				field_type_title = $field_type.find('option[value="' + field_type_value + '"]').text().trim(),											

				$field_required = $field.find('.pvcf-field-required-checkbox'),
				field_require_value = $field_required.prop('checked') ? '(*)' : '',
				
				title_val = $(this).val(),
				txt_field_title = '',
				txt_field_require = '',
				txt_field_type = '';

			if ( title_val !== '' ) {

				txt_field_title = ': ' + title_val;					

				if ( field_require_value !== '' ) {

					txt_field_require = field_require_value;

				}

				if ( field_type_value !== 'null' ) {
					
					txt_field_type = '[' + field_type_title + ']';

				}

				$field_title_label.text( txt_field_title );
				$field_require_label.text( txt_field_require );
				$field_type_label.text( txt_field_type );
			}

			else {
				$field_title_label.text( '' );
				$field_require_label.text( '' );
				$field_type_label.text( '' );
			}

		},
		on_pvcf_field_required_check: function(e) {

			console.log( $(this).prop('checked') );

			$(this).closest('.pvcf-field-input').find('input[type=hidden]').val( $(this).prop('checked') );			
			$(this).closest('.pvcf-field').find('.pvcf-field-title').trigger('keyup');

		},
		on_pvcf_field_type_change: function(e) {

			var val = $(this).val(),	
				text = $(this).find('option[value="' + val  + '"]').text().trim(),
				$pvcf_field = $(this).closest('.pvcf-field'),
				$pvcf_field_hidden_cg = $pvcf_field.find('.pvcf-field-cg-hidden');				

			$pvcf_field_hidden_cg.each( function() {

				if ( $(this).hasClass( val ) ) {

					if ( $(this).hasClass('hidden') ) {
						$(this).removeClass('hidden');
					}

				}

				else {

					if ( ! $(this).hasClass('hidden') ) {
						$(this).addClass('hidden');
					}

				}

			});

			var $input = $(this).closest('.pvcf-field-input');

			$input.find('.pvcf-field-type-value-hidden').val( val );			
			$input.find('.pvcf-field-type-text-hidden').val( text );			

			$(this).closest('.pvcf-field').find('.pvcf-field-title').trigger('keyup');

		},
		on_pvcf_submit_form: function(e) {

			var $field_selects = $('.pvcf-field-select-cg'),
				$select_options = null,
				$select_options_hidden_field = null;

			$field_selects.each( function() {

				if ( $(this).is(':visible') ) {

					$select_options = $(this).find('.txt-pvcf-select-options');
					$select_options_hidden_field = $select_options.next('input[type=hidden]');

					$select_options_hidden_field.val( $select_options.val() );
				}

			});

		}
	}	

	_pvcf.ready();

});