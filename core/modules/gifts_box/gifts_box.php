<?php 	

	class Lafubrand_Gifts_Box {

		private $page_name,
				$tags_list,
				$option_meta;

		public function __construct() { 

			$this->page_name = 'lafubrand-gifts-box';
			$this->tags_list = $this->lafubrand_get_all_tags_list();

			add_action('admin_menu', array(

            	$this,
            	'add_plugin_page'

        	));

        	add_action( 'admin_enqueue_scripts', array($this, 'lafubrand_admin_gifts_box_load_style' ) );

        	add_action( 'wp_ajax_sb_get_subjects', array($this, 'lafubrand_admin_get_subjects') );
        	add_action( 'wp_ajax_nopriv_sb_get_subjects', array($this, 'lafubrand_admin_get_subjects') );

        	add_action( 'wp_ajax_sb_get_options_data', array($this, 'lafubrand_admin_get_options_data') );
        	add_action( 'wp_ajax_nopriv_sb_get_options_data', array($this, 'lafubrand_admin_get_options_data') );

        	add_action( 'wp_ajax_sb_update_all', array($this, 'lafubrand_admin_update_all') );
        	add_action( 'wp_ajax_nopriv_sb_update_all', array($this, 'lafubrand_admin_update_all') );

        	$this->option_meta =$this->page_name . '_options';

		}

		public function lafubrand_admin_gifts_box_load_style() {   

		    if ( $_GET['page'] === $this->page_name ) :

		    	wp_enqueue_media();

		        wp_enqueue_style( 'admin-bootstrap-css', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );
		        wp_enqueue_style( 'admin-lafubrand-gifts-box-stylesheet', get_template_directory_uri() . '/page-options/gifts_box/admin/css/style.css' );

		         wp_enqueue_script( 'admin-bootstrap-js', get_template_directory_uri() . '/page-options/gifts_box/admin/js/bootstrap.min.js' );
		         wp_enqueue_script( 'admin-lafubrand-gifts-box-js', get_template_directory_uri() . '/page-options/gifts_box/admin/js/gifts-box-backend.js' );
		        
		    endif;
		    
		}

		public function add_plugin_page() {
     
	        add_menu_page(
	        				__( 'Quà tặng cuộc sống', $this->page_name ), // Thay title của trang Theme Option
	            			'Quà tặng cuộc sống', // Thay tên hiển thị trên Menu
	            			'manage_options', $this->page_name, array($this, 'lafubrand_main_settings_page'), 'dashicons-clipboard' // Thay icon của bạn
	            );    

	    }  

	    public function lafubrand_main_settings_page() {

	    	include dirname(__FILE__) . '/admin/admin.php';

	    }

	    public function lafubrand_get_all_tags_list() {

	    	$args = array(

				'taxonomy' => 'post_tag',
				'hide_empty' => false

			); 

			return get_terms( $args ); 

	    }

	    public function lafubrand_admin_get_subjects() {

	    	$cid = (int) $_POST['cid'];
	    	$tags_list = $this->tags_list;

	    	/*$term_meta = get_option( "term_{$cid}" );
	    	$subject = $term_meta['_tag_parent_category'];*/

	    	$arr_tags = array();

	    	foreach ( $tags_list as $tag ) :

	    		$term_meta = get_option("term_{$tag->term_id}");

				if ( $cid === (int) $term_meta['_tag_parent_category'] ) :

					array_push( $arr_tags, $tag );

				endif;

	    	endforeach;

	    	header('Content-Type: application/json; charset: utf-8');

	    	echo json_encode( $arr_tags );

	    	die();

	    }

	    public function lafubrand_admin_get_options_data() {

	    	$data = get_option( _BANNER_LISTS_OPTION_NAME );

	        //echo var_dump( $data );

	        if ( ! $data || empty( $data ) ) :

	            echo 'null';

	            die();

	        endif;

	        header('Content-Type: application/json; charset: utf-8');
	        echo json_encode( $data );

	        die();

	    }

	    public function lafubrand_admin_update_all() {

	    	$options = $_POST['options'];

	    	update_option(_BANNER_LISTS_OPTION_NAME, $options);

	    	echo 'success';

	    	die();

	    }

	}	


	if ( is_admin() ) :

		define('_BANNER_LISTS_OPTION_NAME', 'lafu_banner_lists_options');

	    new Lafubrand_Gifts_Box();	    

	endif;

	function lafu_is_category_has_set_banner($category) {

		$cid = (int) get_query_var('cat');			

		if ( (int) $category['id'] === $cid ) :

			if ( (int) $category['settings']['show'] === 1 ) :

				return true;

			endif;

		endif;	

		return false;

	}

	function lafu_is_subject_has_set_banner($category, $tid) {

		if ( sizeof( $category['subjects'] ) > 0 ) :

			foreach ($category['subjects'] as $subject) :

				if ( (int) $subject['id'] === (int) $tid ) :

					return true;

				endif;
				
			endforeach;

		endif;

		return false;

	}

	function lafu_is_single_has_set_banner($category) {

		global $post;

		$cat = get_the_category();
		$cat = $cat[0];

		$p_cid = $cat->term_id;

		$isAllSinglesShow = false;

		while ( $p_cid > 0 ) :

			$p_cat = get_category( $p_cid );

			if ( (int) $category['id'] === (int) $p_cat->term_id ) :

				if ( (int) $category['settings']['showOnAllPosts'] === 1 ) :

					$isAllSinglesShow = true;

					break;

				endif;

			endif;

			$p_cid = (int) $p_cat->parent;

		endwhile;

		if ( ! $isAllSinglesShow ) :

			$postTagsList = json_decode( get_post_meta($post->ID, '_astra_subject_tags_list', true), true );

			if ( false !== $postTagsList && sizeof( $postTagsList ) > 0 ) :

				//print_r($postTagsList); die();

				foreach ( $postTagsList as $tag ) :

					if ( lafu_is_subject_has_set_banner($category, $tag['id']) ) :

						$isAllSinglesShow = true;

						break;

					endif;

				endforeach;

			endif;

		endif;

		return $isAllSinglesShow;

	}

	require_once dirname(__FILE__) . '/widget/lafu_gifts_box_widget.php';