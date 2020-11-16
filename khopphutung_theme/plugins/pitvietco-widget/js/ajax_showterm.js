(function($) {

	var select = {

		ready: function() {

			$(document).on( 'change', '.slCPostType', this.onPostTypeSelectChange )
					   .on( 'change', '.slCTaxonomy', this.onTaxonomySelectChange );			

		},
		getTerms: function( $slCTerm, data ) {

			// Bien toan cuc sb_admin_ajax ban phai khai bao truoc, ben trong chua url den tap tin admin-ajax.php
	        $.post(sb_admin_ajax.url, data, function( options ) {
	          	$slCTerm.html( options );
	        });

		},
		onPostTypeSelectChange: function(e) {

			var $obj = $(this),
				value = $obj.val(),						
				data = {
		            'action': 'sb_showterm_ajax',
		            'cmd' : 'select_taxonomies',
		            'post_type' : value      
		        };
             
          // Bien toan cuc sb_admin_ajax ban phai khai bao truoc, ben trong chua url den tap tin admin-ajax.php
          $.post(sb_admin_ajax.url, data, function( options ) {

          		var $slCTaxonomy = $obj.closest('.pitviet-widget-group-box').find('.slCTaxonomy'),
          			$slCTerm = $obj.closest('.pitviet-widget-group-box').find('.slCTerm'),
          			tax = '';

          	  	$slCTaxonomy.html( options );
          	  	tax = $slCTaxonomy.val();

          	  	$slCTaxonomy.val( tax );

          	  	data = {
		            'action': 'sb_showterm_ajax',
		            'cmd' : 'select_terms',
		            'taxonomy' : tax
		        };

          	  	select.getTerms( $slCTerm, data );          	  	

          });

		},
		onTaxonomySelectChange: function(e) {

			var $obj = $(this),
				$slCTerm = $obj.closest('.pitviet-widget-group-box').find('.slCTerm'),
				value = $obj.val(),										
				data = {
		            'action': 'sb_showterm_ajax',
		            'cmd' : 'select_terms',
		            'taxonomy' : value
		        };  

		    select.getTerms( $slCTerm, data );
          

		}


	}

	select.ready();	

})(jQuery);