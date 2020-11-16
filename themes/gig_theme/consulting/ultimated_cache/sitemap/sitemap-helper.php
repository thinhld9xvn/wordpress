<?php 
	class SitemapHelper {

		private static $sitemap_local_url;

		public static function get_site_protocol() {

			return ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';

		}		

		public static function get_all_custom_post_types_obj() {

			$args = array(
		       'public'   => true,
		       '_builtin' => false,
		    );

		    $output = 'objects'; // names or objects, note names is the default
		    $operator = 'and'; // 'and' or 'or'

		    return get_post_types( $args, $output, $operator ); 
		    

		}

		public static function get_all_taxonomies_obj() {

			$args = array(
		       'public'   => true,
		       '_builtin' => false,
		    );

		    $output = 'objects'; // names or objects, note names is the default
		    $operator = 'and'; // 'and' or 'or'

		    return get_taxonomies( $args, $output, $operator ); 

		}

		public static function get_all_authors_obj() {

			/*$args = array(
				'meta_key'     => 'rank_math_robots',
				'meta_value'   => array('index'),
				'meta_compare' => 'IN'
			);*/			

			$authors = get_users();			

			foreach ( $authors as $i => $author ) :

				$rm_robots = get_the_author_meta( 'rank_math_robots', $author->ID );

				$priority = get_the_author_meta( 'profile_priority', $author->ID );

				//print_r( $rm_robots ); die();

				if ( $rm_robots[0] !== 'index' || empty( $priority ) ) unset( $authors[ $i ] );
				
			endforeach;

			return $authors;

		}

		public static function make_dir( $path, $permissions = 0777 ) {

		    return is_dir( $path ) || mkdir( $path, $permissions, true );

		}

		public static function createSitemapFile( $filepath, $content ) {

			$fp = fopen( $filepath, 'w' );

	        fwrite( $fp, $content );
	        fclose( $fp );

		}		

		private static function sort_sitemap_desc_priority($p1, $p2) {

			$priority1 = floatval( $p1->priority ) * 10;
			$priority2 = floatval( $p2->priority ) * 10;

			if ( $priority1 === $priority2 ) :

				return 0;

			endif;
			
			return $priority1 > $priority2 ? -1 : 1;

		}

		private static function getSitemapHeadingMeta() {

			$contents = '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="//' . $_SERVER['HTTP_HOST'] . '/xml/sitemap-stylesheet.xsl"?>';
	        $contents .= "\n" . '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";	  

	        return $contents;

		}

		private static function getPostTypeContents( $post_type ) {

			$args = array(

    			'post_type' => $post_type,
    			'posts_per_page' => -1

    		);

    		$results = query_posts( $args ); 

    		wp_reset_query();

    		return $results;

		}

		private static function getPostTypeContentSitemap( $results, $post_type ) {

			$contents = SitemapHelper::getSitemapHeadingMeta();	

    		//$results = SitemapHelper::getPostTypeContents( $post_type );

			if ( ! empty( $results ) ) :

	    		foreach ( $results as &$post ) :	    			

	    			$priority = get_post_meta( $post->ID, '_txtPriSitemap', true );

		        	$post->priority = (float) $priority;	
		        	
		        	$post->post_images = array();	        	

		        	$attimages = get_attached_media('image', $post->ID);

					foreach ( $attimages as $image ) :

						$obj_info = array(

							'caption' => wp_get_attachment_caption( $image->ID ),
							'url' => wp_get_attachment_url( $image->ID )

						);

						$post->post_images[] = $obj_info;			    

					endforeach;

	    		endforeach;  

	    		unset( $post );

	    		usort( $results, array('SitemapHelper', 'sort_sitemap_desc_priority' ) );	

	    		$length = sizeof( $results );    		

	    		foreach ( $results as $post ) :	    			

	    			$postdate = explode( " ", $post->post_modified );

	    			$contents .= "\t" . '<url>' . "\n" .
		               			 "\t\t" . '<loc>' . get_permalink( $post->ID ) . '</loc>' .
		                		 "\n\t\t" . '<lastmod>' . $postdate[0] . '</lastmod>' .
		                		 "\n\t\t" . '<changefreq>daily</changefreq>' .
		                		 "\n\t\t" . '<priority>' . $post->priority . '</priority>' . "\n";

		            if ( ! empty( $post->post_images ) ) :

		            	foreach ( $post->post_images as $image ) :	            		

			            	$contents .= "\t\t" . '<image:image>' . "\n";

			            	$contents .= "\t\t\t" . '<image:loc>' . $image['url'] . '</image:loc>' . "\n" .
			            				 "\t\t\t" . '<image:caption><![CDATA[' . $image['caption'] . ']]></image:caption>';

			            	$contents .= "\n\t\t"	. '</image:image>' . "\n";

			            endforeach;

		            endif;

		            $contents .= "\n\t" . '</url>' . "\n";

		        endforeach;	    		

    		endif;

    		//die();

    		$contents .= "</urlset>";

    		//wp_reset_query();

    		return $contents;

		}

		private static function getTermsContents( $taxonomy ) {

			$args = array(

    			'taxonomy' => $taxonomy,
    			'hide_empty' => true,    			

    		);

    		return get_terms( $args );

		}

		private static function createTaxonomySitemapFile( $results, $taxonomy ) {				

    		$contents = SitemapHelper::getSitemapHeadingMeta();

    		if ( ! empty( $results ) ) :

	    		foreach ( $results as &$tag ) :	    			

	    			$field_id = "sitemap-term-{$tag->term_id}-priority";
	    			$term_meta = get_option( "term_{$tag->term_id}" );	    			

	    			$tag->priority = (float) $term_meta[ $field_id ];	    			
		        	
	    		endforeach; 

	    		unset( $tag );

	    		usort( $results, array('SitemapHelper', 'sort_sitemap_desc_priority' ) );    	

	    		foreach ( $results as $tag ) :	    			

	    			$contents .= "\t" . '<url>' . "\n" .
		               			 "\t\t" . '<loc>' . get_term_link( $tag->term_id ) . '</loc>' .
		                		 "\n\t\t" . '<lastmod>' . date('Y-m-d') . '</lastmod>' .
		                		 "\n\t\t" . '<changefreq>monthly</changefreq>' .
		                		 "\n\t\t" . '<priority>' . $tag->priority . '</priority>' .
		                		 "\n\t" . '</url>' . "\n";

		        endforeach;	    		

	    	endif;   	

	    	$contents .= "</urlset>";

	    	return $contents;

		}

		private static function createAuthorSitemapFile( $authors) {

    		$contents = SitemapHelper::getSitemapHeadingMeta();

    		foreach( $authors as $author ) :		

				$priority = (float) get_the_author_meta( 'profile_priority', $author->ID );

				$contents .= "\t" . '<url>' . "\n" .
	               			 "\t\t" . '<loc>' . get_author_posts_url( $author->ID ) . '</loc>' .
	                		 "\n\t\t" . '<lastmod>' . date('Y-m-d') . '</lastmod>' .
	                		 "\n\t\t" . '<changefreq>monthly</changefreq>' .
	                		 "\n\t\t" . '<priority>' . $priority . '</priority>' .
	                		 "\n\t" . '</url>' . "\n";

		    endforeach;	

	    	$contents .= "</urlset>";

	    	return $contents;

		}

		public static function createPostSitemapFile() {

			$results = SitemapHelper::getPostTypeContents( 'post' );

			if ( empty( $results ) ) return;

			foreach ( $results as $i => $post ) :

				$rm_robots = get_post_meta( $post->ID, 'rank_math_robots', true );
				$priority = get_post_meta( $post->ID, '_txtPriSitemap', true );

				if ( $rm_robots[0] != 'index' || empty( $priority ) ) unset( $results[ $i ] );
				
			endforeach;

    		$fn = SITEMAP_DIR . "/post-sitemap.xml";

    		$fn_url = SITEMAP_DIR_URL . "/post-sitemap.xml";

	    	SitemapHelper::$sitemap_local_url[] = $fn_url;

    		if ( ! file_exists( SITEMAP_DIR ) ) :

	    		SitemapHelper::make_dir( SITEMAP_DIR );	

    		endif;    

    		$contents = SitemapHelper::getPostTypeContentSitemap( $results, 'post' ); 

    		//echo $contents; die();

    		SitemapHelper::createSitemapFile( $fn, $contents );

		}

		public static function createPageSitemapFile() {	

			$results = SitemapHelper::getPostTypeContents( 'page' );

			if ( empty( $results ) ) return;	

			foreach ( $results as $i => $page ) :

				$rm_robots = get_post_meta( $page->ID, 'rank_math_robots', true );
				$priority = get_post_meta( $page->ID, '_txtPriSitemap', true );

				if ( $rm_robots[0] != 'index' || empty( $priority ) ) unset( $results[ $i ] );
				
			endforeach;	

    		$fn = SITEMAP_DIR . "/page-sitemap.xml";

    		$fn_url = SITEMAP_DIR_URL . "/page-sitemap.xml";

	    	SitemapHelper::$sitemap_local_url[] = $fn_url;

    		if ( ! file_exists( SITEMAP_DIR ) ) :

	    		SitemapHelper::make_dir( SITEMAP_DIR );	

    		endif; 

    		$contents = SitemapHelper::getPostTypeContentSitemap( $results, 'page' );

    		SitemapHelper::createSitemapFile( $fn, $contents );
    		

		}

		public static function createCategorySitemapFile() {	

			$results = SitemapHelper::getTermsContents( 'category' );	

			if ( empty( $results ) ) return;

			foreach ( $results as $i => $term ) :

				$rm_robots = get_term_meta( $term->term_id, 'rank_math_robots', true );

				$field_id = "sitemap-term-{$term->term_id}-priority";
	    		$term_meta = get_option( "term_{$term->term_id}" );  

				if ( $rm_robots[0] != 'index' || empty( $term_meta[ $field_id ] ) ) unset( $results[ $i ] );
				
			endforeach;	


    		$fn = SITEMAP_DIR . "/category-sitemap.xml";

    		$fn_url = SITEMAP_DIR_URL . "/category-sitemap.xml";

	    	SitemapHelper::$sitemap_local_url[] = $fn_url;

    		if ( ! file_exists( SITEMAP_DIR ) ) :

	    		SitemapHelper::make_dir( SITEMAP_DIR );	

    		endif; 

    		$contents = SitemapHelper::createTaxonomySitemapFile( $results, 'category' );
	    	
	    	SitemapHelper::createSitemapFile( $fn, $contents );

		}


		public static function createCustomPostTypesSitemapFile() {

			global $sitemap_config;

			$registered_custom_post_types = SitemapHelper::get_all_custom_post_types_obj();

	    	foreach ( $registered_custom_post_types as $post_type ) :

	    		if ( isset( $sitemap_config['excludes']['post_types'] ) && 
	    			 in_array( $post_type->name, $sitemap_config['excludes']['post_types'] ) ) :

	    			continue;

	    		endif;

	    		$results = SitemapHelper::getPostTypeContents( $post_type->name );

	    		if ( empty( $results ) ) continue;

	    		foreach ( $results as $i => $post ) :

					$rm_robots = get_post_meta( $post->ID, 'rank_math_robots', true );
					$priority = get_post_meta( $post->ID, '_txtPriSitemap', true );

					if ( $rm_robots[0] != 'index' || empty( $priority ) ) unset( $results[ $i ] );
					
				endforeach;

				if ( empty( $results ) ) continue;

	    		$name = preg_replace('/\_/', '-', $post_type->name);
	    		$fn = SITEMAP_DIR . "/{$name}-sitemap.xml";

	    		$fn_url = SITEMAP_DIR_URL . "/{$name}-sitemap.xml";

	    		SitemapHelper::$sitemap_local_url[] = $fn_url;

	    		if ( ! file_exists( SITEMAP_DIR ) ) :

		    		SitemapHelper::make_dir( SITEMAP_DIR );	

	    		endif;    		    		

	    		$contents = SitemapHelper::getPostTypeContentSitemap( $results, $post_type->name ); 

		    	SitemapHelper::createSitemapFile( $fn, $contents );
		    	
	    		
	    	endforeach;

		}

		public static function createTaxonomiesSitemapFile() {

			global $sitemap_config;

			$registered_taxonomies = SitemapHelper::get_all_taxonomies_obj();

	    	foreach ( $registered_taxonomies as $taxonomy ) :

	    		if ( isset( $sitemap_config['excludes']['taxonomies'] ) && in_array( $taxonomy->name, $sitemap_config['excludes']['taxonomies'] ) ) :

	    			continue;

	    		endif;

	    		$results = SitemapHelper::getTermsContents( $taxonomy->name );		

				if ( empty( $results ) ) return;

				foreach ( $results as $i => $term ) :

					$rm_robots = get_term_meta( $term->term_id, 'rank_math_robots', true );

					$field_id = "sitemap-term-{$term->term_id}-priority";
		    		$term_meta = get_option( "term_{$term->term_id}" );    			

					if ( $rm_robots[0] != 'index' || empty( $term_meta[ $field_id ] ) ) unset( $results[ $i ] );
					
				endforeach;	

				if ( empty( $results ) ) continue;

	    		$name = preg_replace('/\_/', '-', $taxonomy->name);
	    		$fn = SITEMAP_DIR . "/{$name}-sitemap.xml";

	    		$fn_url = SITEMAP_DIR_URL . "/{$name}-sitemap.xml";

	    		SitemapHelper::$sitemap_local_url[] = $fn_url;

	    		if ( ! file_exists( SITEMAP_DIR ) ) :

		    		SitemapHelper::make_dir( SITEMAP_DIR );	

	    		endif;

	    		$contents = SitemapHelper::createTaxonomySitemapFile( $taxonomy->name );

	    		SitemapHelper::createSitemapFile( $fn, $contents );
	    		
	    	endforeach;

		}

		public static function createAuthorsSitemapFile() {			

			$registered_authors = SitemapHelper::get_all_authors_obj();

			if ( empty( $registered_authors ) ) return;

    		$name = preg_replace('/\_/', '-', $author->display_name);
    		$fn = SITEMAP_DIR . "/author-sitemap.xml";

    		$fn_url = SITEMAP_DIR_URL . "/author-sitemap.xml";

    		SitemapHelper::$sitemap_local_url[] = $fn_url;

    		if ( ! file_exists( SITEMAP_DIR ) ) :

	    		SitemapHelper::make_dir( SITEMAP_DIR );	

    		endif;

    		$contents = SitemapHelper::createAuthorSitemapFile( $registered_authors );

    		SitemapHelper::createSitemapFile( $fn, $contents );	    		
	    	

		}

		public static function createLocalSiteMapFile() {

			$fn = SITEMAP_DIR . "/sitemap.xml";

    		if ( ! file_exists( SITEMAP_DIR ) ) :

	    		SitemapHelper::make_dir( SITEMAP_DIR );	

    		endif;

    		$contents = '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="//' . $_SERVER['HTTP_HOST'] . '/xml/sitemap-stylesheet.xsl"?>';
	        $contents .= "\n" . '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

	        foreach ( SitemapHelper::$sitemap_local_url as $url ) :

	        	$contents .= "\t" . '<sitemap>' . "\n";
	        	
		        $contents .= "\t\t" . '<loc>' . $url . '</loc>' .
		                	 "\n\t\t" . '<lastmod>' . date('Y-m-d') . '</lastmod>';               		
		              		 

		        $contents .= "\t" . '</sitemap>' . "\n";

		    endforeach;

		    $contents .= '</sitemapindex>';


    		SitemapHelper::createSitemapFile( $fn, $contents );

		}

		public static function createLocalSiteMap() {

			SitemapHelper::$sitemap_local_url = array();

			SitemapHelper::createPostSitemapFile();	    	
	    	SitemapHelper::createPageSitemapFile();	    		    	

	    	SitemapHelper::createCustomPostTypesSitemapFile();

	    	SitemapHelper::createCategorySitemapFile();

	    	SitemapHelper::createTaxonomiesSitemapFile();

	    	SitemapHelper::createAuthorsSitemapFile();

	    	SitemapHelper::createLocalSiteMapFile();

		}

	}
?>