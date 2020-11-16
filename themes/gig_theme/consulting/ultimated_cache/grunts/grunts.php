<?php 
	//include 'grunts-task.php';
	include 'grunts-frontend.php';

	class Ultimate_Grunts_Admin {   
	    /**
	     * Start up
	     */
	    public function __construct()
	    {
	        add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
	        //add_action( 'admin_init', array( $this, 'page_init' ) );
	    }
	    /**
	     * Add options page
	     */
	    public function add_menu_page()
	    {
	        // This page will be under "Settings"

	        add_options_page(
	            'Grunts',
	            'Grunts',
	            'manage_options',
	            'ultimate-settings-grunts',
	            array( $this, 'create_admin_page' )
	        );
	    }
	    /**
	     * Options page callback
	     */
	    public function create_admin_page()
	    { 

	    	if ( isset( $_POST['btnGrunts'] ) ) :

	    		new GRUNTS_TASKS();

	    	endif; ?>

	    	<form action="<?php echo "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" ?>"
	    		  method="post">

	            <div class="wrap">

	                <h3>

	                	<?php 
	                		if ( isset( $_POST['btnGrunts'] ) ) : ?>

	                			Đã tạo thành công !

	                	<?php

	                		else : ?>

	                			Nhấn bắt đầu để tạo css và js cho website...

	                	<?php
	                		endif; ?>
	                	
	                </h3>
	              
	                <button id="btnGrunts" name="btnGrunts" type="submit" class="button button-primary">
	                    Bắt đầu
	                </button>
	               
	            </div>

	        </form>
	        
	        <?php
	    }
	}	

	//new Ultimate_Grunts_Admin();
?>