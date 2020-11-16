jQuery(function($) {

	var qtranslate_terms = {

		flags : [],
		_qselect_value: '',

		ready: function() {

			var self = this,
				$qselect = $('.qtranslate_select_choices');

			self.getAllFlags();
			self._qselect_value = $qselect.val();
			
			$qselect.change( self.onSelectLangOption );				
		},
		getAllFlags: function() {

			var self = qtranslate_terms;

			$('img.qtranslate_flag', '.qtranslate-form-field').each(function() {

				flagcode = $(this).attr('data-flag');

				self.flags[ flagcode ] = $(this).attr('src');

			});

		},
		// sự kiện chọn ngôn ngữ trong hộp select
		// ở form tạo và edit terms
		onSelectLangOption: function(e) {

			var self = qtranslate_terms,
				val = $(this).val(),

				$group_container = $(this).closest('.qtranslate-form-field'),

				$qflag = $group_container.find('img.qtranslate_flag'),
				$qflag_translation = $qflag.filter('.' + val ),
				$qflag_select = $qflag.filter('.' + self._qselect_value );
			
				$qflag_translation.attr('src', self.flags[ self._qselect_value ]);			
				$qflag_select.attr('src', self.flags[ val ]);

				$qflag_translation.removeClass( val )
					  	  		  .addClass( self._qselect_value )
					  	  		  .attr('data-flag', self._qselect_value);

				$qflag_translation.next('input[type=text]')						        
						 		  .attr('name', 'qtranslate_meta_translation_' + self._qselect_value);

				$qflag_select.removeClass( self._qselect_value )
					  	  	 .addClass( val );	

				$('#qtranslate_meta_langcode').val( val );

			self._qselect_value = val;

		}

	}
	qtranslate_terms.ready();

});