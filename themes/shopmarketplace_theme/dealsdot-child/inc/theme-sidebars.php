<?php

	register_sidebar(

		array(
			'name'          => __( 'Header Contact Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-header-contact',
			'description'   => 'This sidebar displays in header top',			
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s pull-right">',
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
			'description'   => 'This sidebar displays in home screen (under slider)',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetBox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="toursHeadingTitle %1$s">',
			'after_title'   => '</h2>'
		) 

	);
	
	register_sidebar(

		array(

			'name'          => __( 'Footer Column One Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-column-one',
			'description'   => 'This sidebar displays in footer',
			'class'         => 'sidebar',
			'before_widget' => '<div class="item-layout footerColumn col-md-3 col-sm-6 col-xs-12 %1$s">',							
			'after_widget'  => '</div>',							
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'

		) 

	);	

	register_sidebar(

		array(

			'name'          => __( 'Footer Column Two Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-column-two',
			'description'   => 'This sidebar displays in footer',
			'class'         => 'sidebar',
			'before_widget' => '<div class="item-layout footerColumn col-md-3 col-sm-6 col-xs-12 %1$s">',							
			'after_widget'  => '</div>',							
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'

		) 

	);	

	register_sidebar(

		array(

			'name'          => __( 'Footer Column Three Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-column-three',
			'description'   => 'This sidebar displays in footer',
			'class'         => 'sidebar',
			'before_widget' => '<div class="item-layout footerColumn col-md-3 col-sm-6 col-xs-12 %1$s">',							
			'after_widget'  => '</div>',							
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'

		) 

	);	

	register_sidebar(

		array(

			'name'          => __( 'Footer Column Four Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-column-four',
			'description'   => 'This sidebar displays in footer',
			'class'         => 'sidebar',
			'before_widget' => '<div class="item-layout footerColumn col-md-3 col-sm-6 col-xs-12 %1$s">',							
			'after_widget'  => '</div>',							
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'

		) 

	);	

	register_sidebar(

		array(

			'name'          => __( 'Footer Copyright Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-copyright',
			'description'   => 'This sidebar displays in footer',
			'class'         => 'sidebar',
			'before_widget' => '<div class="copyright tcenter %1$s">',							
			'after_widget'  => '</div>',							
			'before_title'  => '<div class="widgetTitle %1$s">',
			'after_title'   => '</div>'

		) 

	);