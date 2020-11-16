<?php
	define('SCHEMA_ADMIN_STYLESHEET_URI', ULTIMATED_CACHE_MODULE_DIRECTORY_URI . '/schema/metaboxes/css');

	class Ultimate_Schema_Metaboxes {   
	    /**
	     * Start up
	     */
	    public function __construct()
	    {

	    	add_action( 'add_meta_boxes', array( &$this, 'schema_metaboxes_init' ) );
	    	add_action( 'save_post', array( &$this, 'schema_metaboxes_save') );  

	    	add_action( 'admin_init', array( &$this, 'schema_enqueue_stylesheets' ) ); 
	        
	    }

	    public function schema_enqueue_stylesheets() {	    	

	    	wp_enqueue_style( 'schema-admin-stylesheet', SCHEMA_ADMIN_STYLESHEET_URI . '/schema-admin.css' );

	    }

	    public function schema_metaboxes_init() {

	    	add_meta_box( 'ultimate-schema-metaboxes', 'Schema', array( &$this, 'ultimate_schema_metabox_callback' ), null, 'advanced', 'high' );

	    }

	    public function schema_metaboxes_save( $post_id ) {

	    	update_post_meta( $post_id, "_txtPostHeadLine", trim( $_POST['txtPostHeadLine'] ) ); 
	    	update_post_meta( $post_id, "_txtPostDescription", trim( $_POST['txtPostDescription'] ) ); 

	    }

	    public function ultimate_schema_metabox_callback( $post, $args_callback ) {

	    	$headline = get_post_meta( $post_id, "_txtPostHeadLine", true ); 	    	
	    	$description = get_post_meta( $post_id, "_txtPostDescription", true );

	    	$headline = ! empty ( $headline ) ? $headline : $post->post_title;
	    	$description = ! empty ( $description ) ? $description : mb_substr( $post->post_excerpt, 0, 200 );

	    	ob_start(); ?>

	    		<div class="ult-schema-container">

	    			<div class="box-input">
	    				Headline
	    			</div>

	    			<div class="box-input">

	    				<input id="ult-headline-schema" type="text" name="txtPostHeadLine" value="<?php echo $headline ?>" />

	    			</div>

	    			<div class="box-input">

	    				Description

	    			</div>

	    			<div class="box-input">

	    				<input id="ult-description-schema" type="text" name="txtPostDescription" value="<?php echo $description ?>" />

	    			</div>
	    			
	    		</div>

	    <?php 
	    	$contents = ob_get_contents();
	    	ob_end_clean();

	    	echo $contents;
		}	 

	}	

	new Ultimate_Schema_Metaboxes();