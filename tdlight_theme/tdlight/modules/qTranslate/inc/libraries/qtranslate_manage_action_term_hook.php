<?php
	/*function qTranslate_get_terms_filter( $terms, $taxonomies, $args, $term_query ) {		

		if ( ! is_admin() ) :

			global $wpdb;

			$active_langcode = $_SESSION['qtranslate_mainsite_langcode'];	
		
			if ( ! is_array( $terms ) || count( $terms ) < 1 ) :

				return $terms;

			endif;

			if ( isset( $active_langcode ) ) :			

				$tbl_terms = $wpdb->prefix . 'terms';

				$filtered_terms = array();

				foreach ( $terms as $term ) :

					$result = $wpdb->get_var(

						"

							SELECT 

								term_id

							FROM 

								{$tbl_terms}

							WHERE 

								term_id = {$term->term_id} AND

								qtranslate_term_langcode = '{$active_langcode}'

						"

					);

					if ( ! is_null( $result ) ) :

						$filtered_terms[] = $term;

					endif;

				endforeach;

				return $filtered_terms;

			endif;		

			return $terms;

		endif;

	}*/

	//add_filter('get_terms', 'qTranslate_get_terms_filter');

	function qTranslate_get_term_filter( $term, $taxonomy ) {

		global $pagenow;

		if ( ! is_admin() ) :

			$active_langcode = $_SESSION['qtranslate_mainsite_langcode'];

		else :

			$active_langcode = $_SESSION['qtranslate_active_lang'];

		endif;

		if ( is_null( $term ) ||
		   ( isset( $active_langcode ) && $active_langcode != $term->qtranslate_term_langcode ) ) :

			return null;

		endif;

		if ( 0 === strpos( $term->name, "{$active_langcode}_" ) ) :

			$term->name = mb_substr( $term->name, strlen( "{$active_langcode}_" ) );

		endif;

		if ( is_admin() ) :

			if ( $pagenow !== 'edit.php' ) :

				if ( 0 === strpos( $term->slug, "{$active_langcode}_" ) ) :

					$term->slug = mb_substr( $term->slug, strlen( "{$active_langcode}_" ) );

				endif;

			endif;

		endif;

		return $term;

	}

	add_filter( 'get_term', 'qTranslate_get_term_filter' );	

	function update_term_before_created( $term, $taxonomy ) {	

		if ( is_admin() ) :

			$active_langcode = $_SESSION['qtranslate_active_lang'];

			if ( $taxonomy !== 'nav_menu' && 0 !== strpos( $term, "{$active_langcode}_" ) ) :

				return $active_langcode . '_' . $term;

			endif;

		endif;

		return $term;

	}

	add_filter( 'pre_insert_term', 'update_term_before_created', 10, 2 );

	function update_term_after_created( $term_id, $tt_id, $taxonomy ) {

		global $wpdb;				
		
		$tbl_terms = $wpdb->prefix . 'terms';
		//$tbl_term_taxonomy = $wpdb->prefix . 'term_taxonomy';

		if ( is_admin() ) :

			$active_langcode = $_SESSION['qtranslate_active_lang'];

			$my_term = $wpdb->get_row( "SELECT * FROM {$tbl_terms} WHERE term_id = {$term_id}" );
			//$my_term_taxonomy = $wpdb->get_var( "SELECT taxonomy FROM {$tbl_term_taxonomy} WHERE term_id = {$term_id}" );

			/*$t_name = $my_term->name;
			$t_slug = $my_term->slug;

			if ( 0 === strpos( $t_name, "{$active_langcode}_" ) ) :

				$t_name = $active_langcode . '_' . $t_name;

			endif;

			if ( 0 === strpos( $t_slug, "{$active_langcode}_" ) ) :

				$t_slug = $active_langcode . '_' . $t_slug;

			endif;		

			$wpdb->query(

				"
					UPDATE {$tbl_terms}

					SET 					
						name = '{$t_name}',
						slug = '{$t_slug}'

					WHERE

						term_id = {$term_id}
				"

			);*/

			if ( $active_langcode != $my_term->qtranslate_term_langcode ) :

				$wpdb->query(

					"
						UPDATE {$tbl_terms}

						SET 

							qtranslate_term_langcode = '{$active_langcode}'							

						WHERE

							term_id = {$term_id}
					"

				);

			endif;			

		endif;

	}

	add_action( 'created_term', 'update_term_after_created' );

	function update_term_after_edited( $term_id, $tt_id, $taxonomy ) {

		global $wpdb;				
		
		$tbl_terms = $wpdb->prefix . 'terms';
		$tbl_term_taxonomy = $wpdb->prefix . 'term_taxonomy';

		if ( is_admin() ) :

			$active_langcode = $_SESSION['qtranslate_active_lang'];

			$my_term = $wpdb->get_row( "SELECT * FROM {$tbl_terms} WHERE term_id = {$term_id}" );
			$my_term_taxonomy = $wpdb->get_var( "SELECT taxonomy FROM {$tbl_term_taxonomy} WHERE term_id = {$term_id}" );			

			$t_name = $my_term->name;
			$t_slug = $my_term->slug;

			if ( $my_term_taxonomy !== 'nav_menu' ) :

				if ( 0 !== strpos($my_term->name, "{$active_langcode}_") ) :

					$t_name = $active_langcode . '_' . $my_term->name;

				endif;

				if ( 0 !== strpos($my_term->slug, "{$active_langcode}_") ) :

					$t_slug = $active_langcode . '_' . $my_term->slug;

				endif;

			endif;

			if ( $t_name !== $my_term->name || $t_slug !== $my_term->slug ) :

				$wpdb->query(

					"
						UPDATE {$tbl_terms}

						SET 					
							name = '{$t_name}',
							slug = '{$t_slug}'

						WHERE

							term_id = {$term_id}
					"

				);

			endif;

			if ( $active_langcode != $my_term->qtranslate_term_langcode ) :

				$wpdb->query(

					"
						UPDATE {$tbl_terms}

						SET 

							qtranslate_term_langcode = '{$active_langcode}'
							
						WHERE

							term_id = {$term_id}
					"

				);

			endif;			

		endif;

	}
	add_action( 'edited_term', 'update_term_after_edited' );

	// thay đổi tham số truy vấn mysql chỉ hiển thị
	// nội dung tương ứng với ngôn ngữ đang chọn

	function admin_change_term_clauses_query( $clauses ) {

		if ( is_admin() ) :			

			$active_langcode = $_SESSION['qtranslate_active_lang'];

			if ( isset( $active_langcode ) ) :				

				$clauses['where'] .= " AND t.qtranslate_term_langcode = '$active_langcode' ";				

			endif;

		endif;		

		return $clauses;

	}	

	add_action( 'terms_clauses', 'admin_change_term_clauses_query', 10, 3 );