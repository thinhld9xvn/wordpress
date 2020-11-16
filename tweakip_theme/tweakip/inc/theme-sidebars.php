<?php
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
			'name'          => __( 'Footer Column One Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-column-one',
			'description'   => 'This sidebar displays in footer column one',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox footer-sidebar col-md-3 col-sm-6 col-xs-12 %1$s">' . 
							   '	<div class="sidebar-wrap">',
			'after_widget'  => '	</div>' .
							   '</div>',
			'before_title'  => '<h2 class="tcenter-ms">',
			'after_title'   => '</h2>'
		) 
	);	

	register_sidebar( 
		array(
			'name'          => __( 'Footer Column Two Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-column-two',
			'description'   => 'This sidebar displays in footer column two',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox footer-sidebar col-md-6 col-sm-6 col-xs-12 padleft20-ms padright20-ms mtop20-xs %1$s">' . 
							   '	<div class="sidebar-wrap">',
			'after_widget'  => '	</div>' .
							   '</div>',
			'before_title'  => '<h2 class="tcenter-ms">',
			'after_title'   => '</h2>'
		) 
	);	

	register_sidebar( 
		array(
			'name'          => __( 'Footer Column Three Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-column-three',
			'description'   => 'This sidebar displays in footer column three',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox footer-sidebar col-md-3 col-sm-6 col-xs-12 padtb20-ms mtop20-xs %1$s">' . 
							   '	<div class="sidebar-wrap vcenter">',
			'after_widget'  => '	</div>' .
							   '</div>',
			'before_title'  => '<h2 class="tcenter-ms">',
			'after_title'   => '</h2>'
		) 
	);	

	register_sidebar( 
		array(
			'name'          => __( 'Footer Copyright Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-copyright',
			'description'   => 'This sidebar displays in footer copyright',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox footer-sidebar mtop40-ms mtop20-xs col-xs-12 %1$s">',							 
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle">',
			'after_title'   => '</div>'
		) 
	);	
	
	
?>