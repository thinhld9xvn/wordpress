jQuery( function($) {

	var mySearchProdBox = {

		ready: function() {

			$('.slSearchSelectCat').change(this.onSelectTermBoxChange);

		},
		onSelectTermBoxChange: function(e) {

			var term = $(this).val(),
				taxonomy = $(this).attr('data-taxonomy'),
				$input_hidden = $(this).closest('.searchSelectCat')
									   .find('input[type=hidden]');

			$input_hidden.filter('.searchform-term').val( term );
			$input_hidden.filter('.searchform-taxonomy').val( taxonomy );			

		}

	}

	mySearchProdBox.ready();
	

});