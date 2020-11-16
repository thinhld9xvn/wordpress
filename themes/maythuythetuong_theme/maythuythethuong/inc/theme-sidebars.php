<?php
	register_sidebar( 
		array(
			'name'          => __( 'Contact Header Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-contact-header',
			'description'   => 'This sidebar displays in top header',			
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle">',
			'after_title'   => '</div>'
		)
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'Slider Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-slider',
			'description'   => 'This sidebar displays under header',			
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle">',
			'after_title'   => '</div>'
		)
	);	
	
	register_sidebar( 
		array(
			'name'          => __( 'Home Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-home',
			'description'   => 'This sidebar displays in home',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle">',
			'after_title'   => '</div>'
		) 
	);	

	register_sidebar( 
		array(
			'name'          => __( 'Partner Logo Column Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-partner-logo-column',
			'description'   => 'This sidebar displays in footer',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox footer-partner">' .
							   '	<div class="container">',
			'after_widget'  => '	</div>' .
							   '</div>',
			'before_title'  => '<h2 class="headPartnerLogo" data-navig="drawline-heading">' .
							   '	<span class="line lleft"></span>' .
							   '	<span class="caption">',							  
			'after_title'   => '	</span>' .
			 				   '	<span class="line lright"></span>' .
							   '</h2>'

		) 
	);	
	
	register_sidebar( 
		array(
			'name'          => __( 'Footer Column One Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-column-one',
			'description'   => 'This sidebar displays in footer column one',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox footer-sidebar col-md-6 col-sm-6 col-xs-12 %1$s">',
			'after_widget'  => '</div>',							   
			'before_title'  => '<h3 class="headFooterTitle">',
			'after_title'   => '</h3>'
		) 
	);	

	register_sidebar( 
		array(
			'name'          => __( 'Footer Column Two Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-column-two',
			'description'   => 'This sidebar displays in footer column two',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox footer-sidebar padleft40-ms mtop20-xs col-md-6 col-sm-6 col-xs-12 %1$s">',					
			'after_widget'  => '</div>',							   
			'before_title'  => '<h3 class="headFooterTitle">',
			'after_title'   => '</h3>'
		) 
	);
	
?>