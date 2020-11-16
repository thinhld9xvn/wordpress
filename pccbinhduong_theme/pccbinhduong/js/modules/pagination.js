jQuery(function($) {

var pagination = {
	ready: function() {

		var pg_show_size = 0,
			pg_max_size = 0,
			pg_jump_size = 0,
			options = {};

		$('.simple_ajax_pager').each( function() {

			pg_show_size = $(this).attr('data-pg-show-size'),
			pg_max_size = $(this).attr('data-pg-max-size'),
			pg_jump_size = $(this).attr('data-pg-jump-size');

			options = {
				page_show_size: pg_show_size,   // showing index number of pager
	            page_max_size: pg_max_size,  // max length of pager
	            first_page: 'Trang đầu',  // first page text of pager                
	            last_page: 'Trang cuối',// last page text of pager
	            page_jump_index: pg_jump_size,
	            pageitem_click : function( index ) {}
			};

			if ( $(this).hasClass('galleryPagination') )  {

				options.pageitem_click = pagination.galleryPgItemClick;

			}			

			$(this).simplePager(options);

		});

	},
	galleryPgItemClick: function( num ) {		

		$('.allGalleryObjects[data-wrapper-templates="true"]').each( function() {

			var $self = $(this),
				$item_template = null,
				current_idx = num - 1;

			// data-parent-template
			$( 'div[data-parent-template="true"]' ).each( function() {				

				var $item_template = $(this).find('*[data-template="true"]:first-child').clone(),
					items_per_page = $(this).attr('data-items-per-page'),
					pg_mlength = parseInt( current_idx ) + parseInt( items_per_page ),
					t = 0;	

				$(this).html( '' );

				for ( var i = current_idx; i < pg_mlength; i++ ) {						

					var $item = $item_template,
						$element = null;					

					if ( $(this).hasClass('galleryImages') ) {	

						$element = $item.find('a[data-template-element="true"]');						

						$element.attr( 'href', galleries_project[i] )
								.html( galleries_img_tag[i] );

					}

					else if ( $(this).hasClass('galleryObjects') ) {

						$element = $item;

						$element.attr( 'href', galleries_project[i] )
								.html( galleries_iobject_tag[i] );						

					}						

					$item.wrap('<div></div>');

					$(this).append( $item.parent().html() );						

					setTimeout( function() {}, t + 200 );

					t++;

				}				


			});
			// #data-parent-template

		});

		$lg.data('lightGallery').destroy(true);

		$lg = $('.lightgallery').lightGallery({
		    thumbnail: true,
		    animateThumb: true,
		    showThumbByDefault: true,
		    mode: 'lg-fade'
		}); 
	}
}

pagination.ready();

});