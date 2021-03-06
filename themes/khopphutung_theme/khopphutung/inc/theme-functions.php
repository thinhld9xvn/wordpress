<?php 
    function short_text($text, $limit) {
		
		$chars_text = strlen($text);				
		
		//add ... so the user knows the text is actually longer
		if ($chars_text > $limit) {

			$text = mb_substr( $text, 0, $limit, 'UTF-8' );	
			$text = $text . "...";

		}

		return $text;
		
	}
	
	function excerpt($limit) {
		return short_text( get_the_excerpt(), $limit );
	}
	
	function title($limit) {
		return short_text( get_the_title(), $limit );
	}
	
	function content($limit) {
		return short_text( get_the_content(), $limit );
	}	
	
	function pn_get_attachment_id_from_url( $attachment_url = '' ) {
 
		global $wpdb;
		$attachment_id = false;
	 
		// If there is no url, return.
		if ( '' == $attachment_url )
			return;
	 
		// Get the upload directory paths
		$upload_dir_paths = wp_upload_dir();
	 
		// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
		if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
	 
			// If this is the URL of an auto-generated thumbnail, get the URL of the original image
			$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
	 
			// Remove the upload path base directory from the attachment URL
			$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
	 
			// Finally, run a custom database query to get the attachment ID from the modified attachment URL
			$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
	 
		}
	 
		return $attachment_id;
	}

	function wp_page_navigation() {

		if( is_singular() ) :
			return;
		endif;

		global $wp_query;

		/** Stop execution if there's only 1 page */		
		if( $wp_query->max_num_pages <= 1 ) :
		   return;
		endif;

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max = intval( $wp_query->max_num_pages );

		/** Add current page to the array */
		if ( $paged >= 1 ) :

		  $links[] = $paged;

		endif;

		/** Add the pages around the current page to the array */
	  	if ( $paged >= 3 ) :

	  		$links[] = $paged - 1;
	  		$links[] = $paged - 2;

	  	endif;

		if ( ( $paged + 2 ) <= $max ) :

	        $links[] = $paged + 2;
	        $links[] = $paged + 1;

		endif;

        echo '<div class=""><ul class="pagination">';

        /** Previous Post Link */
        if ( get_previous_posts_link() ) :

        	printf( '<li>%s</li>', get_previous_posts_link() );

        endif;

        /** Link to first page, plus ellipses if necessary */
        if ( ! in_array( 1, $links ) ) :

	        $class = 1 == $paged ? ' class="active"' : '';

	        printf( '<li%s><a href="%s">%s</a></li>', $class, esc_url( get_pagenum_link( 1 ) ), '1' );

	        if ( ! in_array( 2, $links ) ) :
        		echo '<li>…</li>';
        	endif;

        endif;

        /** Link to current page, plus 2 pages in either direction if necessary */
        sort( $links );

        foreach ( (array) $links as $link ) :

        	$class = $paged == $link ? ' class="active"' : '';
        	printf( '<li%s><a href="%s">%s</a></li>', $class, esc_url( get_pagenum_link( $link ) ), $link );

        endforeach;

        /** Link to last page, plus ellipses if necessary */
        if ( ! in_array( $max, $links ) ) :

        	if ( ! in_array( $max - 1, $links ) ) :
        		echo '<li>…</li>';
        	endif;

        	$class = $paged == $max ? ' class="active"' : '';
        	printf( '<li%s><a href="%s">%s</a></li>', $class, esc_url( get_pagenum_link( $max ) ), $max );

        endif;

        /** Next Post Link */
        if ( get_next_posts_link() ) :

       	 	printf( '<li>%s</li>', get_next_posts_link() );
        	echo '</ul></div>';

        endif;

    }

	function print_breadcrumbs( $breadcumbs_id, $home_text, $d ) {

		$delimiter = $d; // dấu phân cách giữa các breadcumbs
		$home = $home_text; // chữ thay thế cho phần 'Home' link
		$before = '<span class="current">'; // thẻ html đằng trước mỗi link $after = '</span>'; // thẻ đằng sau mỗi link

		if ( ! is_home() && ! is_front_page() || is_paged() ) {

			echo '<div id="' . $breadcumbs_id . '">';

			global $post;
			$homeLink = get_bloginfo('url');
			echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

			if ( is_category() ) {

				global $wp_query;
				$cat_obj = $wp_query->get_queried_object();
				$thisCat = $cat_obj->term_id;
				$thisCat = get_category($thisCat);
				$parentCat = get_category($thisCat->parent);
				if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
				echo $before . single_cat_title('', false) . $after;

			} 

			elseif ( is_day() ) {

				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
				echo $before . get_the_time('d') . $after;

			} 

			elseif ( is_month() ) {

				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo $before . get_the_time('F') . $after;

			} 

			elseif ( is_year() ) {

				echo $before . get_the_time('Y') . $after;

			} 

			elseif ( is_single() && ! is_attachment() ) {

				if ( get_post_type() != 'post' ) {

					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
					echo $before . get_the_title() . $after;

				} 

				else {

					$cat = get_the_category(); $cat = $cat[0];
					echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
					echo $before . get_the_title() . $after;
				}

			} 

			elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() ) {

				$post_type = get_post_type_object(get_post_type());
				echo $before . $post_type->labels->singular_name . $after;

			} 

			elseif ( is_attachment() ) {

				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;

			}

			elseif ( is_page() && !$post->post_parent ) {

				echo $before . get_the_title() . $after;

			} 

			elseif ( is_page() && $post->post_parent ) {

				$parent_id = $post->post_parent;
				$breadcrumbs = array();

				while ($parent_id) {

					$page = get_page($parent_id);
					$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					$parent_id = $page->post_parent;
				}

				$breadcrumbs = array_reverse($breadcrumbs);

				foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
					echo $before . get_the_title() . $after;

			} 

			elseif ( is_search() ) {

				echo $before . 'Kết quả tìm kiếm cho "' . get_search_query() . '"' . $after;

			} 

			elseif ( is_tag() ) {
				echo $before . 'Tags bài viết "' . single_tag_title('', false) . '"' . $after;

			} 

			elseif ( is_author() ) {

				global $author;
				$userdata = get_userdata($author);
				echo $before . 'Tác giả bài viết ' . $userdata->display_name . $after;

			} 

			elseif ( is_404() ) {
				echo $before . 'Lỗi không tìm thấy' . $after;
			}

			if ( get_query_var('paged') ) {

				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
					echo __('Page') . ' ' . get_query_var('paged');
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';

			}

			echo '</div>';

		}

	} // end print_breadcrumbs()

?>