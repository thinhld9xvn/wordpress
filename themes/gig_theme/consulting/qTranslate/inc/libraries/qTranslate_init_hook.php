<?php 	

	function init_mainsite_default_language() {  

		$rules = get_option( 'rewrite_rules' );

    	$lang = $_GET['lang'];

    	if ( isset( $lang ) ) :

    		qt_set_current_lang( $lang ); return;

    	endif;

    	$request_uri = $_SERVER['REQUEST_URI'];

    	if ( ! empty( $request_uri ) ) :

	    	$splices_url = array_reverse( explode( '/', $request_uri ) );

	    	$current_url = '';

	    	$base_url = '';

	    	$length = sizeof( $splices_url );

	    	for ( $i = 0; $i < $length; $i ++ ) :

	    		if ( ! empty( $splices_url[ $i ] ) ) :

	    			$current_url = $splices_url[ $i ];

	    			if ( $i + 1 < $length ) :

	    				$base_url = $splices_url[ $i + 1 ];

	    			endif;

	    			break;

	    		endif;
	    		
	    	endfor;

	    	global $wpdb;

	    	if ( empty( $base_url ) ) :

	    		// object may be category, post, page, archive

	    		$q_obj = $wpdb->get_row("

	    			SELECT qtranslate_post_langcode FROM {$wpdb->prefix}posts WHERE post_name = '{$current_url}'

	    		");

	    		if ( is_null( $q_obj ) ) :    			

	    			$q_obj = $wpdb->get_row("

		    			SELECT qtranslate_term_langcode FROM {$wpdb->prefix}terms WHERE slug = '{$current_url}'

		    		");

		    		if ( ! is_null( $q_obj ) ) :
		    			
		    			qt_set_current_lang( $q_obj->qtranslate_term_langcode );
		    			return;

		    		endif;

		    	else :

		    		qt_set_current_lang( $q_obj->qtranslate_post_langcode );
		    		return;


	    		endif;
	    		

	    	else :

	    		// may be author, custom taxonomy, custom post type

	    		$key = "{$base_url}/?$";

	    		$rule = $rules[ $key ];    		

	    		$v_rule = array_pop( explode('=', $rule) );

	    		if ( $v_rule !== $base_url ) :

	    			$base_url = $v_rule;

	    		endif;    		

	    		$q_obj = $wpdb->get_row("

	    			SELECT qtranslate_post_langcode FROM {$wpdb->prefix}posts WHERE post_name = '{$current_url}' AND post_type = '{$base_url}'

	    		");    		

	    		if ( is_null( $q_obj) ) :

	    			$q_obj = $wpdb->get_row("

		    			SELECT qtranslate_term_langcode FROM {$wpdb->prefix}terms WHERE slug = '{$current_url}'

		    		");

		    		if ( ! is_null( $q_obj ) ) :

		    			qt_set_current_lang( $q_obj->qtranslate_term_langcode );
		    			return;

		    		endif;

		    	else :

		    		qt_set_current_lang( $q_obj->qtranslate_post_langcode );
		    		return;

	    		endif;


	    	endif;

	    endif;

    	//echo qt_get_current_lang(); die();

        qt_set_current_lang( 'vi' );

	}	

	function qTranslate_wp_hook() {

		if ( ! is_admin() ) :			

			init_mainsite_default_language();

			flush_rewrite_rules(true);

			//qTranslate_modify_front_page();
			

		endif;

	}

	add_action('init', 'qTranslate_wp_hook', 2);	

	class qTranslate_change_meta_hook {		
    
    	// Variables
    	protected $html;
    	private $mydb;

    	public function __construct( $html ) {
    	    	
    		if ( ! empty( $html ) ) :    		

    			$this->parseHTML( $html );

    		endif;

    	}

        public function __toString() {
            return $this->html;
        } 

        public function change_meta_locale( $html ) {

        	$key = '<meta property="og:locale" content="';

			$pos_locale = strpos($html, $key) + strlen( $key );
			$_pos_locale = strpos($html, '">', $pos_locale );

			$locale = qt_get_locale_from_code( qt_get_current_lang() );

			//file_put_contents(dirname(__FILE__) . '/test.log', substr($html, 0, $pos_locale));

			return substr($html, 0, $pos_locale) . $locale . substr($html, $_pos_locale);

        }

        public function write( $data ) {
        	file_put_contents(dirname(__FILE__) . '/debug.log', $data);
        }

        public function processRURL( $url ) {

        	if ( 0 == strpos($url, '/') ) :

        		$new_url = 'https://'. $_SERVER['HTTP_HOST'];

        		if ( ! empty( substr( $url, 1 ) ) ) :
        			
        			return $new_url . '/' . substr( $url, 1 );

        		endif;

        		return $new_url;

        	endif;

        	// last character is slash
        	if ( '/' === substr($url, strlen( $url ) - 1 ) ) :

        		return substr($url, 0, strlen( $url ) - 1 );

        	endif;

        	return $url;


        }

        public function removeAnyParameters( $url ) {

        	$pos = strpos( $url, '?' );

			// xoá mọi tham số nếu tồn tại trong url 
			if ( false !== $pos ) :

				$url = substr($url, 0, $pos);

			endif;

			return $url;

        }

        public function change_meta_hreflang( $html ) {

        	require_once QTRANSLATE_DIRECTORY_HELPER . '/languages_helper.php';

        	$langHelper = new LanguagesHelper();

        	$key = '<link rel="canonical"';

        	$meta_hreflang = "\n";

        	$boolMapping = true;

			$pos_canonical = strpos($html, $key) + strlen( $key );
			$_pos_canonical = strpos($html, '/>', $pos_canonical ) + 2;

			$langcode = qt_get_current_lang();
			$ldefault = 'vi';		

			$languages = qt_get_langcodes();

			$urls = array();		

			// lấy urls của tất cả nhứng ngôn ngữ
			foreach ($languages as $lcode) :

				//if ( $lcode !== $langcode ) :

					$u = $langHelper->get_link_target_from_current( $lcode );

					//$this->write( $u );

					if ( $u === '#' ) :

						$boolMapping = false;						
						break;					

					endif;

					$urls[ $lcode ] = $u;

				//endif;
				
			endforeach;		

			if ( $boolMapping ) :

				//$url = $this->processRURL( 'https://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );	

				// kiểm tra url hiện tại có phải là tiếng việt ?
				//if ( $langcode === 'vi' ) :				

					//$url = $this->removeAnyParameters( $url );

					// set url hiện tại là x-default
					//$meta_hreflang .= "<link rel=\"alternate\" hreflang=\"x-default\" href=\"{$url}\" />\n";

			  	//endif;

			  	$def_url = $urls[ $ldefault ];
			  	$def_url = $this->processRURL( $def_url );
			  	$def_url = $this->removeAnyParameters( $def_url );

			  	$meta_hreflang .= "<link rel=\"alternate\" hreflang=\"x-default\" href=\"{$def_url}\" />\n";

			  	foreach ( $urls as $lcode => $_url ) :

	       			$locale = str_replace( '_', '-', qt_get_locale_from_code( $lcode ) );

	       			$_url = $this->processRURL( $_url );

	        		$meta_hreflang .= "<link rel=\"alternate\" hreflang=\"{$locale}\" href=\"{$_url}\" />\n";
	       			
	       		endforeach;					

				return substr_replace( $html, $meta_hreflang, $_pos_canonical, 0 );		

			endif;

			return $html;

        }

        public function add_meta_handlediv( $html ) {

        	$key = '<link rel="canonical"';

			$pos_locale = strpos($html, $key);
			$_pos_locale = strpos($html, '>', $pos_locale ) + 1;

        	$handheld = "<link rel=\"alternate\" media=\"handheld\" href=\"https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}\" />";

        	return substr($html, 0, $_pos_locale) . $handheld . substr($html, $_pos_locale);

        }

        public function change_meta_og( $html ) {

        	$key = '<meta property="og:url" content="';

			$pos_og = strpos($html, $key) + strlen( $key );
			$_pos_og = strpos($html, '">', $pos_og );

			$content = 'https://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			$content = $this->processRURL( $this->removeAnyParameters( $content ) );

			//file_put_contents(dirname(__FILE__) . '/test.log', substr($html, 0, $pos_locale));

			return substr($html, 0, $pos_og) . $content . substr($html, $_pos_og);


        }
    		
    	public function parseHTML( $html ) {

    		//file_put_contents(dirname(__FILE__) . '/test.log', $html);

    		$html = $this->add_meta_handlediv( $html );
    		$html = $this->change_meta_locale( $html );
    		$html = $this->change_meta_hreflang( $html );
    		//$html = $this->change_meta_og( $html );

			$this->html = $html;
    		
    	}    	
    	
    } 

    function qTranslate_change_meta_hook_finish($html) {
    	return new qTranslate_change_meta_hook($html);        

    }
    
    function qTranslate_change_meta_hook_start() {    
    	ob_start('qTranslate_change_meta_hook_finish');
    }
    
    add_action('get_header', 'qTranslate_change_meta_hook_start', 1000);	

	function admin_reset_taxonomy_options() {

		$request_uri = $_SERVER['REQUEST_URI'];

		if ( false !== strpos( $request_uri, 'edit-tags.php' ) ) :

			$taxonomy = $_GET['taxonomy'];

			if ( empty( $taxonomy ) ) :

				$taxonomy = 'category';

			endif;

			delete_option( "{$taxonomy}_children" );

		endif;

	}
	add_action( 'admin_init', 'admin_reset_taxonomy_options' );