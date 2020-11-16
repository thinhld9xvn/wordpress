<?php 
	
	add_action( "init", "qtranslate_register_sidebars" );

	function qtranslate_register_sidebars() {

		if ( is_admin() ) :
		
			$active_langcode = $_SESSION["qtranslate_active_lang"];

		else :

			$active_langcode = $_SESSION['qtranslate_mainsite_langcode'];

		endif;
	  	
	    $register_sidebars = $GLOBALS["wp_registered_sidebars"];

	    while ( $sidebar = current( $register_sidebars ) ) :

	     	$sidebar_id = key( $register_sidebars );	     	

	 		$args = array(
	 			"name"          => __( $sidebar["name"], "pitvietco" ),
	 			"id"            => "{$sidebar_id}-qtranslate-{$active_langcode}",
	 			"description"   => $sidebar["description"],
	 			"class"         => $sidebar["class"],
	 			"before_widget" => $sidebar["before_widget"],
	 			"after_widget"  => $sidebar["after_widget"],
	 			"before_title"  => $sidebar["before_title"],
	 			"after_title"   => $sidebar["after_title"]
	 		);     	
	 	
	 		register_sidebar( $args );			 	

	 		unregister_sidebar( $sidebar_id );

	     	next( $register_sidebars );
	     	
	    endwhile;	 
	  
	}

	function qtranslate_dynamic_sidebar( $did_one, $index ) {

		$langcode = $_SESSION['qtranslate_mainsite_langcode'];

		$index .= "-qtranslate-$langcode";

		return $index;

	}

	add_action('dynamic_sidebar_has_widgets', 'qtranslate_dynamic_sidebar');

?>