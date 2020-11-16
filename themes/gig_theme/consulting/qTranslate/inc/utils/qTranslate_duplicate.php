<?php 
	class qTranslate_duplicate {

		public function __construct() {

		}

		public static function duplicate( $pid ) {	

			global $wpdb;			

			$post_obj = get_post( $pid );

			$dup_post = array(
			  'comment_status' => $post_obj->comment_status,
				'ping_status'    => $post_obj->ping_status,
				'post_author'    => $post_obj->post_author,
				'post_content'   => $post_obj->post_content,
				'post_excerpt'   => $post_obj->post_excerpt,
				'post_name'      => $post_obj->post_name,
				'post_parent'    => $post_obj->post_parent,
				'post_password'  => $post_obj->post_password,
				'post_status'    => 'publish',
				'post_title'     => $post_obj->post_title . '-duplicate',
				'post_type'      => $post_obj->post_type,
				'to_ping'        => $post_obj->to_ping,
				'menu_order'     => $post_obj->menu_order,
			  'qtranslate_post_langcode' => $post_obj->qtranslate_post_langcode,
			  'qtranslate_post_id_primary' => 0
			);

			if ( $post_obj->post_category ) :

				$dup_post['post_category'] = $post_obj->post_category;

			endif;			
			
			$new_post_id = wp_insert_post( $dup_post );

			/*
			 * get all current post terms ad set them to the new post draft
			 */
			$taxonomies = get_object_taxonomies( $post_obj->post_type ); // returns array of taxonomy names for post type, ex array("category", "post_tag");
			
			foreach ( $taxonomies as $taxonomy ) :

				$post_terms = wp_get_object_terms( $pid, $taxonomy, array('fields' => 'slugs') );
				wp_set_object_terms( $new_post_id, $post_terms, $taxonomy, false );

			endforeach;
	 
			/*
			 * duplicate all post meta just in two SQL queries
			 */
			$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id = {$pid}");

			if ( count( $post_meta_infos ) != 0 ) :

				$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";

				foreach ($post_meta_infos as $meta_info) :

					$meta_key = $meta_info->meta_key;

					if( $meta_key == '_wp_old_slug' ) continue;

					$meta_value = addslashes($meta_info->meta_value);
					$sql_query_sel[] = "SELECT $new_post_id, '$meta_key', '$meta_value'";

				endforeach;

				$sql_query.= implode(" UNION ALL ", $sql_query_sel);
				$wpdb->query($sql_query);

			endif;

		}

	}

	function qtrans_duplicate_init() {

		$p_duplicate = $_GET['qtrans_duplicate'];
		$p_post = $_GET['post'];

		if ( $p_duplicate === 'true' && isset( $p_post ) ) :

			qTranslate_duplicate::duplicate( (int) $p_post );

			$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

			$url = remove_query_arg( array('qtrans_duplicate', 'post'), $url );		

			wp_redirect( $url ); die();

		endif;

	}

	add_action('admin_init', 'qtrans_duplicate_init'); ?>