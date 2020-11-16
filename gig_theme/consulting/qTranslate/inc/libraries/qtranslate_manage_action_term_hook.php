<?php

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

		return $term;

	}	

	function update_term_after_created( $term_id, $tt_id, $taxonomy ) {

		global $wpdb;				
		
		$tbl_terms = $wpdb->prefix . 'terms';

		if ( is_admin() ) :

			$active_langcode = $_SESSION['qtranslate_active_lang'];

			$taxonomy = $_POST['taxonomy'];

			$my_term = $wpdb->get_row( "SELECT * FROM {$tbl_terms} WHERE term_id = {$term_id}" );
			
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

			//if ( $taxonomy === 'nav_menu' ) return;

			if ( isset( $_POST['qtranslate_langcode'] ) && isset( $_POST['qtranslate_mapping_item'] ) ) :

				$langcode = $_POST['qtranslate_langcode'];        

	        	$q_mapping_tid = (int) $_POST['qtranslate_mapping_item'];

				admin_qtranslate_submit_save( $my_term, $taxonomy, $q_mapping_tid, $langcode );		

			endif;

		endif;

	}

	add_action( 'created_term', 'update_term_after_created', 1000 );

	function admin_qtranslate_submit_save( $my_term, $taxonomy, $q_mapping_tid, $langcode ) {

		global $wpdb, $q_db;

        $tbl_terms = $wpdb->prefix . 'terms';        

        $active_langcode = qt_get_current_lang();

		if ( $langcode !== $active_langcode ) :

            $sql = "
                    UPDATE 

                        {$tbl_terms}

                    SET
                        qtranslate_term_langcode = '{$langcode}'


                    WHERE

                        term_id = {$my_term->term_id}
                ";

            $wpdb->query( $sql );

        endif;

        if ( $q_mapping_tid !== -1 ) :

            if ( $langcode !== 'vi' ) :

                $sql = "
                    UPDATE 

                        {$tbl_terms}

                    SET
                        qtranslate_term_id_primary = {$q_mapping_tid}


                    WHERE

                        term_id = {$my_term->term_id}
                ";


                $wpdb->query( $sql );


            else :

                // unlink old term foreign
                $q_db->unlink_term_foreign( $my_term->term_id, 'en', $taxonomy );

                // update new post foreign
                $sql = "
                    UPDATE 

                        {$tbl_terms}

                    SET
                        qtranslate_term_id_primary = {$my_term->term_id}


                    WHERE

                        term_id = {$q_mapping_tid}
                ";            

                //echo $sql; die();    

                $wpdb->query( $sql );

            endif;

        else :

            if ( $langcode !== 'vi' ) :

               
                $sql = "

                    UPDATE 

                        {$tbl_terms}

                    SET
                        qtranslate_term_id_primary = 0


                    WHERE

                        term_id = {$my_term->term_id}
                ";

                $wpdb->query( $sql );

            else :           

                // unlink term foreign
                $q_db->unlink_term_foreign( $my_term->term_id, 'en', $taxonomy ); 

            endif;

        endif;

	}

	function admin_qtranslate_non_ajax_submit_save_term( $my_term, $taxonomy ) {

		global $wpdb;

        $tbl_terms = $wpdb->prefix . 'terms'; 

		$t_name = $my_term->name;
		$t_slug = $my_term->slug;

		$active_langcode = qt_get_current_lang();

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

		$term_meta = $_POST['term_meta'];

		if ( isset( $term_meta ) ) :

			//$keys = array_keys( $term_meta );		

			//echo var_dump( $keys[1] ); die();

			$langcode = $term_meta[ "qtranslate-term-{$my_term->term_id}-langbox" ];

	        $q_mapping_tid = (int) $term_meta[ "qtranslate-term-{$my_term->term_id}-mappingbox" ];

	        //echo $q_mapping_tid; die();

			admin_qtranslate_submit_save( $my_term, $taxonomy, $q_mapping_tid, $langcode );

		endif;

	}

	function admin_qtranslate_ajax_submit_save_term( $my_term, $taxonomy ) {	

		if ( isset( $_POST['qtranslate_langcode'] ) && isset( $_POST['qtranslate_mapping_item'] ) ) :	

	        $langcode = $_POST['qtranslate_langcode'];        

	        $q_mapping_tid = (int) $_POST['qtranslate_mapping_item'];

	        admin_qtranslate_submit_save( $my_term, $taxonomy, $q_mapping_tid, $langcode );

	    endif;

	}

	function update_term_after_edited( $term_id, $tt_id ) {

		global $wpdb;				
		
		$tbl_terms = $wpdb->prefix . 'terms';

		if ( is_admin() ) :			

			$taxonomy = $_POST['taxonomy'];

			//if ( $taxonomy === 'nav_menu' ) return;

			$my_term = $wpdb->get_row( "SELECT * FROM {$tbl_terms} WHERE term_id = {$term_id}" );

			//print_r( $my_term ); die();

			//echo "<pre>"; print_r( $_POST ); echo "</pre>"; die();			

			if (defined('DOING_AJAX') && DOING_AJAX) :

	            admin_qtranslate_ajax_submit_save_term( $my_term, $taxonomy );

	        else :
	            
	            admin_qtranslate_non_ajax_submit_save_term( $my_term, $taxonomy );

	        endif;		

		endif;

	}
	add_action( 'edited_term', 'update_term_after_edited', 1000 );

	// thay đổi tham số truy vấn mysql chỉ hiển thị
	// nội dung tương ứng với ngôn ngữ đang chọn

	function admin_change_term_clauses_query( $clauses ) {

		if ( is_admin() ) :	

			$active_langcode = $_SESSION['qtranslate_active_lang'];

			if ( $active_langcode === 'all' ) return $clauses;

			if ( isset( $active_langcode ) ) :				

				$clauses['where'] .= " AND t.qtranslate_term_langcode = '$active_langcode' ";				

			endif;

		endif;		

		/*echo "<pre>";
		print_r( $clauses );
		echo "</pre>";*/

		return $clauses;

	}	

	add_action( 'terms_clauses', 'admin_change_term_clauses_query', 10, 3 );