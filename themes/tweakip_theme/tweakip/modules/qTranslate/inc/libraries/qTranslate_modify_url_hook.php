<?php 	

	class WP_QTRANSLATE_MODIFY_URL {

    	// Variables

    	protected $html;

    	public function __construct($html) {

    		if ( ! empty( $html ) ) :    		

    			$this->modifyTargetURL( $html );

    		endif;

    	}

    	public function __toString() {

    		return $this->html;

    	} 

    	protected function getSiteProtocol() {


    		if ( isset( $_SERVER['HTTPS'] ) &&

			   	 ( $_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||

			     isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&

			     $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') :



			  return 'https://';

			

			else :



			  return 'http://';



			endif;			

    	}

    	protected function startsWith( $haystack, $needle ) {



    		$length = strlen($needle);

     		return ( substr($haystack, 0, $length) === $needle);

    	}

    	protected function changeUrlToRightLanguage( $url ) { 

			$my_url = $url.trim();

			if ( '' != $my_url && '#' != $my_url ) :

				$languages = $_SESSION['qtranslate_languages'];

				$site_langcode = $_SESSION['qtranslate_mainsite_langcode'];

				$protocol = $this->getSiteProtocol();

				$hostname = $_SERVER['HTTP_HOST'];

				$prefix_langcode = '';

				$has_prefix_langcode = false;

				if ( ! $this->startsWith( $my_url, $protocol . $hostname ) &&

					 ! $this->startsWith( $my_url, $hostname ) &&

					 ! $this->startsWith( $my_url, '/' ) ) :

					$my_url = $protocol . $hostname . '/' . $my_url;

				elseif ( ! $this->startsWith( $my_url, $protocol . $hostname ) && 

					 	  ! $this->startsWith( $my_url, $hostname ) &&

					 	  $this->startsWith( $my_url, '/' ) ) :

					$my_url = $protocol . $hostname  . $my_url;

				elseif ( !$this->startsWith( $my_url, $protocol . $hostname ) &&

						  $this->startsWith( $my_url, $hostname ) ) :

					$my_url = $protocol . $my_url;

				endif;

				$my_url = explode( '//', $my_url );						

				$my_url = explode( '/', $my_url[1] );

				if ( sizeof( $my_url ) > 1 ) :

					$prefix_langcode = $my_url[1];

				endif;

				if ( '' != $prefix_langcode ) :

					foreach( $languages as $lang ) :

						if ( $prefix_langcode == $lang->code ) :

							$has_prefix_langcode = true;

							break;

						endif;

					endforeach;

					if ( ! $has_prefix_langcode ) :	

						array_splice( $my_url, 1, 0, $site_langcode  );	

					endif;

					$my_url = $protocol . implode( '/', $my_url );	

				else :

					$my_url = $protocol . $my_url[0] . '/' . $site_langcode;

				endif;

			endif;

			return $my_url;

		}	

    	public function modifyTargetURL( $html ) {

    		$protocol = $this->getSiteProtocol();

    		$slug_excludes = array('wp-login', 'wp-content', 
    							   'wp-admin', 'wp-includes',
    							   'login', 'admin');

    		$href_tag_begin = '<a href=';

    		$href_tag_end = '>';

    		$start = 0;

    		$continue = true;

    		while ( $continue ) :

    			$found_exclude = false;

    			$begin_pos = strpos( $html, $href_tag_begin, $start );

	    		if ( false !== $begin_pos ) :

	    			$end_pos = strpos( $html, $href_tag_end, $begin_pos );

	    			if ( false !== $end_pos ) :

	    				$begin_pos += strlen( $href_tag_begin ) + 1;	

	    				$end_pos--;    	

	    				$url = substr( $html, $begin_pos,  $end_pos - $begin_pos );

	    				// url bắt đầu bằng domain
	    				if ( $this->startsWith( $url, $protocol . $_SERVER['HTTP_HOST'] ) ||
	    					 $this->startsWith( $url, $_SERVER['HTTP_HOST'] ) || 
	    					 $this->startsWith( $url, '/' ) ) :

	    					// duyệt danh sách đen
		    				foreach ( $slug_excludes as $e_slug ) :

		    					// tìm thấy

		    					if ( false !== strpos( $url, '/' . $e_slug ) ) :

		    						$found_exclude = true;

		    						break;

		    					endif;	    					

		    				endforeach;	

		    				// url không có trong danh sách đen => tiến hành thay đổi url

		    				if ( ! $found_exclude ) :

		    					$new_url = $this->changeUrlToRightLanguage( $url );

		    					$html = substr( $html, 0, $begin_pos ) . $new_url . substr( $html, $end_pos );

		    					$start = $begin_pos + strlen( $new_url ) + strlen( $href_tag_end ) + 1;

		    				else :

								$start = $end_pos;

		    				endif;

		    			else :

		    				$start = $end_pos;

		    			endif;

	    			else :

	    				$continue = false;

	    			endif;

	    		else :

	    			$continue = false;

	    		endif;

	    		if ( $start >= strlen( $html ) ) :

	    			$continue = false;

	    		endif;

	    	endwhile;

    		$this->html = $html;           

    	}    	    

    }

	function qtranslate_modify_url_target_finish( $html ) {

		return new WP_QTRANSLATE_MODIFY_URL($html);  				

	}

	function qtranslate_modify_url_target_begin() {

		ob_start('qtranslate_modify_url_target_finish');

	}

	add_action('get_header', 'qtranslate_modify_url_target_begin');	
?>