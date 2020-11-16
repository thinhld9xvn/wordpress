<?php 
	class LanguagesHelper {

		private $languages;

		public function __construct() {

			include QTRANSLATE_DIRECTORY_PACKAGES . '/languages.php';

		}

		public function get_flag_language( $locale ) {

			$languages = $this->languages;

			foreach ( $languages as $lang ) :

				if ( $locale === $lang['locale'] ) :

					return $lang['flag_base64'];

				endif;
				
			endforeach;

		}
 
		// hàm trả về ngôn ngữ mặc định trong gói ngôn ngữ đã lấy từ database
		public function get_language_default( $lang_packages ) {

			foreach ( $lang_packages as $lang ) :

				if ( 1 == $lang->ldefault ) :

					return $lang;
				
				endif;
				
			endforeach;

		}

		// hàm trả về ngôn ngữ dựa trên mã ngôn ngữ trong gói ngôn ngữ đã lấy từ database 
		public function get_language_from_langcode( $lang_packages, $code ) {

			foreach ( $lang_packages as $lang ) :

				if ( $code == $lang->code ) :

					return $lang;
				
				endif;
				
			endforeach;

		}

		private function qTranslate_get_taxonomy_request( $q_db, $langcode, $taxonomy = 'category' ) {

			global $wp_query;

			$object = $wp_query->get_queried_object();

			if ( $object->qtranslate_term_langcode === $langcode ) :

				return $_SERVER['REQUEST_URI'];

			endif;

			if ( (int) $object->qtranslate_term_id_primary !== 0 ) :

				$term = get_term_by('id', $object->qtranslate_term_id_primary, $taxonomy);

			else :					

				$term = $q_db->get_term_foreign( $object->term_id, $langcode, $taxonomy );				

			endif;

			if ( $term !== null ) :				

				return get_term_link( $term );				

			endif;

			return '#';

		}

		private function qTranslate_get_post_redirect( $q_db, $langcode ) {

			global $post;	

			if ( is_front_page() ) :

				if ( $langcode === 'vi' ) return "/";

				return "/?lang={$langcode}";

			endif;	

			if ( $post->qtranslate_post_langcode === $langcode ) :

				return $_SERVER['REQUEST_URI'];

			endif;	

			// is post foreign
			if ( (int) $post->qtranslate_post_id_primary !== 0 ) :

				$_post = get_post( $post->qtranslate_post_id_primary );

			else :

				$_post = $q_db->get_post_foreign( $post->ID, $langcode, 'page' );					

			endif;

			if ( $_post !== null ) :

				if ( $_post->id ) return get_the_permalink( $_post->id );

				return get_the_permalink( $_post->ID );

			endif;				

			return '#';

		}		

		private function qTranslate_get_custom_post_type_redirect( $langcode ) {

			if ( $langcode === 'vi' ):

				return get_post_type_archive_link( get_query_var('post_type') );

			endif;		

			return add_query_arg( 'lang', $langcode, get_post_type_archive_link( get_query_var('post_type') ) );	


		}

		private function qTranslate_get_search_page( $langcode ) {

			//return add_query_arg( 'lang', $langcode, get_tag_link( get_query_var('tag_id') ) );

		}		

		private function qTranslate_get_author_page_redirect( $langcode ) {

			global $author;

			if ( $langcode === 'vi' ):

				return get_author_posts_url( $author );

			endif;		

			return add_query_arg( 'lang', $langcode, get_author_posts_url( $author ) );

		}	

		public function get_link_target_from_current( $langcode ) {

			require_once QTRANSLATE_DIRECTORY_INC . '/qTranslate_db.php';

			$q_db = new qTranslate_db();			

			if ( is_front_page() ) :

				return $this->qTranslate_get_post_redirect( $q_db, $langcode );

			elseif ( ! is_home() || ! is_front_page() && is_paged() ) :

				if ( is_category() ) :
					
					return $this->qTranslate_get_taxonomy_request( $q_db, $langcode, 'category' );

				elseif ( is_single() || is_page() && ! is_attachment() ) :

					return $this->qTranslate_get_post_redirect( $q_db, $langcode );				

				elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() ) :

					//echo get_query_var('post_type'); die();

					$taxonomy_slug = get_query_var('taxonomy');

					if ( $taxonomy_slug ) :

						return $this->qTranslate_get_taxonomy_request( $q_db, $langcode, $taxonomy_slug );

					else :

						return $this->qTranslate_get_custom_post_type_redirect( $langcode );

					endif;

				elseif ( is_attachment() ) :					
					
				elseif ( is_search() ) :

					return $this->qTranslate_get_search_page( $langcode );					

				elseif ( is_tag() ) :					
					
					return $this->qTranslate_get_taxonomy_request( $q_db, $langcode, 'post_tag' );					

				elseif ( is_author() ) :

					return $this->qTranslate_get_author_page_redirect( $langcode );

				elseif ( is_404() ) :							

				endif;
				
			endif;	

			return '#';

		}

	}
?>