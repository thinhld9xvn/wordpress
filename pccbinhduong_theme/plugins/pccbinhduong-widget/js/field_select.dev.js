jQuery(function( $ ) {

	var $wp_dropdown_select = $('.wp-dropdown-select');

	if ( $wp_dropdown_select.length > 0 ) {

		$wp_dropdown_select.each( function() {

			var selected_val = $(this).next('input[type=hidden]').val();
			$(this).val( selected_val );

		});

	}	

});