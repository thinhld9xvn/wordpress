<?php

	require_once dirname(__FILE__) . '/sitemap-helper.php';

	define('SITEMAP_DIR', ABSPATH . 'xml');
	define('SITEMAP_DIR_URL', SitemapHelper::get_site_protocol() . $_SERVER['HTTP_HOST'] . '/xml');

	require_once dirname(__FILE__) . '/config.php';

	class Ultimate_Sitemap_Admin {   
	    /**
	     * Start up
	     */
	    public function __construct()
	    {	    	

	        $taxonomy = $_GET['taxonomy'];

		    if ( isset( $taxonomy ) ) :

		        add_filter("{$taxonomy}_edit_form_fields", array( &$this, 'sitemap_extra_term_fields' ) );    
		        add_action("{$taxonomy}_add_form_fields", array( &$this, 'sitemap_extra_front_term_fields' ), 10, 2);		        

			else :

				add_action( 'add_meta_boxes', array( &$this, 'sitemap_metaboxes_init' ) );
	    		add_action( 'save_post', array( &$this, 'sitemap_metaboxes_save') );    	

	        	add_action( 'admin_menu', array( $this, 'add_menu_page' ) );

		    endif; 

		    // save extra term extra fields hook
		    add_action ( "edited_terms", array( &$this, 'sitemap_save_extra_term_fields' ), 10, 2 );
		    add_action ( "created_term", array( &$this, 'sitemap_save_extra_term_fields' ), 10, 2 );

		    add_action ( "in_admin_footer", array( &$this, 'sitemap_reset_term_form_field_after_create' ) );
	      
	    }

	    public function sitemap_metaboxes_init() {

	    	add_meta_box( 'ultimate-sitemap-metaboxes', 'Sitemap', array( &$this, 'ultimate_sitemap_metabox_callback' ), null, 'side', 'low' );

	    }

	    public function sitemap_metaboxes_save( $post_id ) {	    	

	    	update_post_meta( $post_id, "_txtPriSitemap", $_POST['txtPriSitemap'] ); 

	    }

	    public function ultimate_sitemap_metabox_callback( $post, $args_callback ) {

	    	$priority = get_post_meta( $post->ID, '_txtPriSitemap', true );

	    	if ( is_null( $priority ) ) :

	    		if ( $post->post_type === 'post' ) :

	    			$priority = 0.8;

	    		elseif ( $post->post_type === 'page' ) :

	    			$frontpage_id = (int) get_option( 'page_on_front' );

	    			$priority = 1;

	    			if ( $frontpage_id !== $post->ID ) :

	    				$priority = 0.9;

	    			endif;
	    			

	    		endif;

	    	endif;

	    	//$index = get_post_meta( $post->ID, 'rank_math_robots', true );    	
	    	

	    	ob_start(); ?>

	    		<div class="ult-sitemap-container">

	    			<div>
	    				Độ ưu tiên (priority)
	    			</div>

	    			<div style="margin-top:10px">

	    				<input id="ult-priority-sitemap" style="width:100%" type="text" name="txtPriSitemap" value="<?php echo $priority ?>" />

	    			</div>
	    			
	    		</div>

	    <?php 
	    	$contents = ob_get_contents();
	    	ob_end_clean();

	    	echo $contents;
		}

		private function option_exist( $name ) {

			global $wpdb;

			$option = $wpdb->get_row (

				"
					SELECT 

						option_name FROM {$wpdb->prefix}options

					WHERE 

						option_name = '{$name}'

				"

			);

			return ! is_null( $option );

		}

		public function sitemap_extra_term_fields( $tag ) { 

			$field_id = "sitemap-term-{$tag->term_id}-priority";

			//if ( $this->option_exist( "term_{$tag->term_id}" ) ) :

			$term_meta = get_option( "term_{$tag->term_id}"); 

			$priority = (float) $term_meta[$field_id];

			//else :

				//$priority = 0.7;

			//endif; ?>

			<table class="form-table form_table_layout">

				<tr class="form-field">

	                <th scope="row" valign="top">

	                    <label for="<?= $field_id ?>">
	                       Độ ưu tiên (prioriy)
	                    </label>

	                </th>

	                <td>
	                    <input type="text" id="<?= $field_id ?>" 
	                    				   name="term_meta[<?= $field_id ?>]" 
	                    				   value="<?php echo $priority; ?>" />

	                    <br/>

	                    <p class="description"></p>
	        
	                </td>

            	</tr>   

			</table>

  <?php }

		public function sitemap_extra_front_term_fields( $tag ) { 

			$field_id = "sitemap-term-%term_id%-priority"; 
			$def_priority = 0.7;
			//$term_meta = get_option( "term_{$tag->term_id}");

			//$priority = $term_meta[$field_id] ? (float) $term_meta[$field_id] : 0.7; ?>

			<!-- form-field -->
            <div class="form-field">

                <label for="sitemap-term-priority">
                    Độ ưu tiên (prioriy)
                </label>    
                
                <!-- metabox-field -->
                <div class="metabox-field">                   

                    <input type="text" id="<?= $field_id ?>" 
                    	   name="term_meta[<?= $field_id ?>]" 
                    	   value="<?= $def_priority ?>" />
        
                </div>
                <!-- #metabox-field -->

            </div>
            <!-- #form-field -->     

	<?php }

		public function sitemap_save_extra_term_fields( $term_id, $taxonomy ) {			

			if ( isset( $_POST['term_meta'] ) ) :
                
                $t_id = $term_id;
                $term_meta = get_option( "term_{$t_id}");
                
                $term_keys = array_keys( $_POST['term_meta'] );

                foreach ( $term_keys as $key ) :
	                    
                    if ( isset( $_POST['term_meta'][$key] ) ) :

                    	$v = $_POST['term_meta'][$key];

                    	$key = str_replace('%term_id%', $t_id, $key);

                        $term_meta[$key] = $v;

                    endif;	                
                    
                endforeach;
                
                //save the option array
                update_option( "term_{$t_id}", $term_meta );               
                
            endif;

		}	


	    /**
	     * Add options page
	     */

	    public function add_menu_page()
	    {
	        // This page will be under "Settings"

	        add_options_page(
	            'Sitemap',
	            'Sitemap',
	            'manage_options',
	            'ultimate-settings-sitemap',
	            array( $this, 'create_admin_page' )
	        );
	    }
	    /**
	     * Options page callback
	     */
	    public function create_admin_page()
	    { 

	    	//require_once dirname(__FILE__) . '/sitemap-helper.php';

	    	//$registered_post_types = SitemapHelper::get_all_custom_post_types_obj();
	    	//$registered_taxonomies = SitemapHelper::get_all_taxonomies_obj();

	    	//echo "<pre>"; print_r( $registered_post_types ); echo "</pre>";die();
	    	//print_r( $registered_taxonomies ); die();

	    	if ( isset( $_POST['btnSitemap'] ) ) :

	    		$this->perform();

	    	endif; ?>

	    	<form action="<?php echo "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" ?>"
	    		  method="post">

	            <div class="wrap">

	                <h3>

	                	<?php 
	                		if ( isset( $_POST['btnSitemap'] ) ) : ?>

	                			Đã tạo thành công !

	                	<?php

	                		else : ?>

	                			Nhấn bắt đầu để tạo sitemap cho website...

	                	<?php
	                		endif; ?>
	                	
	                </h3>
	              
	                <button id="btnSitemap" name="btnSitemap" type="submit" class="button button-primary">
	                    Bắt đầu
	                </button>
	               
	            </div>

	        </form>
	        
	        <?php
	    }

	    public function perform() {	    	

	    	SitemapHelper::createLocalSiteMap();

	    	/*$postsForSitemap = get_posts( array(
	            'numberposts' => -1,
	            'orderby'     => 'modified',
	            'post_type'   => array( 'post', 'page' ),
	            'order'       => 'DESC'
	        ) );

	        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
	        $sitemap .= "\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

	        foreach( $postsForSitemap as $post ) :

	        	$priority = get_post_meta( $post->ID, '_txtPriSitemap', true );
	        	$priority = empty( $priority ) ? '0.8' : $priority;

	            setup_postdata( $post );

	            $postdate = explode( " ", $post->post_modified ); 

	            $sitemap .= "\t" . '<url>' . "\n" .
	                "\t\t" . '<loc>' . get_permalink( $post->ID ) . '</loc>' .
	                "\n\t\t" . '<lastmod>' . $postdate[0] . '</lastmod>' .
	                "\n\t\t" . '<changefreq>weekly</changefreq>' .
	                "\n\t\t" . '<priority>' . $priority . '</priority>' .
	                "\n\t" . '</url>' . "\n";

	        endforeach;

	        $sitemap .= '</urlset>';    

	        $fp = fopen( ABSPATH . "sitemap.xml", 'w' );

	        fwrite( $fp, $sitemap );
	        fclose( $fp );*/

	    }

	}	

	new Ultimate_Sitemap_Admin();