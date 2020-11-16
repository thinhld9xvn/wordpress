<?php 
	function contact_form_custom_post_type_generate() {

		$args = array(

			'label'               => __( 'Contact Form', 'pitviet' ),

			'description'         => __( 'Form để khách hàng nhập thông tin liên hệ', 'pitviet' ),

			// Features this CPT supports in Post Editor

			'supports'            => array( 'title' ),

			// You can associate this CPT with a taxonomy or custom taxonomy. 

			/* A hierarchical CPT is like Pages and can have

			* Parent and child items. A non-hierarchical CPT

			* is like Posts.

			*/	

			'hierarchical'        => false,

			'public'              => true,

			'show_ui'             => true,

			'show_in_menu'        => true,

			'show_in_nav_menus'   => true,

			'show_in_admin_bar'   => true,

			'menu_position'       => 5,

			'can_export'          => true,

			'has_archive'         => true,

			'exclude_from_search' => false,

			'publicly_queryable'  => true,

			'capability_type'     => 'page',

		);

	

		// Registering your Custom Post Type

		register_post_type( 'pv-contact-form', $args );

	}
	add_action( 'init', 'contact_form_custom_post_type_generate', 0 );  

?>