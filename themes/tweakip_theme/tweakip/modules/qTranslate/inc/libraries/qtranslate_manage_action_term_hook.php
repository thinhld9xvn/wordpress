<?php
	function qTranslate_get_terms_filter( $terms, $taxonomies, $args, $term_query ) {

		if ( ! is_admin() ) :

			global $wpdb;

			$mainsite_langcode = $_SESSION['qtranslate_mainsite_langcode'];

			if ( ! is_array( $terms ) && count( $terms ) < 1 ) :

				return $terms;

			endif;

			if ( isset( $mainsite_langcode ) ) :

				$tbl_terms = $wpdb->prefix . 'terms';

				$filtered_terms = array();

				foreach ( $terms as $term ) :

					$result = $wpdb->get_var(

						"

							SELECT 

								term_id

							FROM 

								$tbl_terms

							WHERE 

								term_id = $term->term_id AND

								qtranslate_term_langcode = '$mainsite_langcode'

						"

					);



					if ( ! is_null( $result ) ) :

						$filtered_terms[] = $term;

					endif;



				endforeach;

				return $filtered_terms;				


			endif;	

		endif;

		return $terms;

	}



	add_filter('get_terms', 'qTranslate_get_terms_filter');

	function qTranslate_get_term_filter( $term, $taxonomy ) {

		if ( ! is_admin() ) :

			$mainsite_langcode = $_SESSION['qtranslate_mainsite_langcode'];

			if ( is_null( $term ) ||

				 ( isset( $mainsite_langcode ) && $mainsite_langcode != $term->qtranslate_term_langcode ) ) :

				return null;

			endif;

		endif;

		return $term;

	}

	add_filter( 'get_term', 'qTranslate_get_term_filter' );	

	function update_term_after_created( $term_id, $tt_id, $taxonomy ) {

		if ( is_admin() ) :	

			$active_langcode = $_SESSION['qtranslate_active_lang'];

			$my_term = get_term_by( 'id', $term_id, $taxonomy );

			if ( $active_langcode != $my_term->qtranslate_term_langcode ) :

				global $wpdb;

				$tbl_terms = $wpdb->prefix . 'terms';

				$active_langcode = $_SESSION['qtranslate_active_lang'];

				$wpdb->query(
					"

						UPDATE $tbl_terms

						SET 

							qtranslate_term_langcode = '$active_langcode'

						WHERE 

							term_id = $term_id

					"

				);		



			endif;

		endif;

	}

	add_action( 'created_term', 'update_term_after_created' );

	// thay đổi tham số truy vấn mysql chỉ hiển thị 

	// nội dung tương ứng với ngôn ngữ đang chọn

	function admin_change_term_clauses_query( $clauses ) {

		if ( is_admin() ) :	

			$active_langcode = $_SESSION['qtranslate_active_lang'];

			if ( isset( $active_langcode ) ) :

				if ( false === strpos( $clauses['where'], "tt.taxonomy IN ('nav_menu')" ) ) :

					$clauses['where'] .= " AND qtranslate_term_langcode = '$active_langcode' ";

				endif;

			endif;

		endif;

		return $clauses;

	}	

	add_action( 'terms_clauses', 'admin_change_term_clauses_query', 10, 3 );

?>