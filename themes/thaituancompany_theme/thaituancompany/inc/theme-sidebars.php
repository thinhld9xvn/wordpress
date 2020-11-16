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
			'name'          => __( 'Header Top Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-header-top',
			'description'   => 'This sidebar displays top header',			
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle">',
			'after_title'   => '</div>'
		)

	);

	register_sidebar(

		array(
			'name'          => __( 'Header Secondary Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-header-secondary',
			'description'   => 'This sidebar displays second header',			
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle">',
			'after_title'   => '</div>'
		)

	);

	register_sidebar( 

		array(
			'name'          => __( 'ColLeft Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-colleft',
			'description'   => 'This sidebar displays in column left (under slider)',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetBox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="headingCProductTitle">'
							 . '	<span>',
			'after_title'   => '	</span>'
							 . '</h3>'
		) 

	);

	register_sidebar( 

		array(
			'name'          => __( 'Home Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-home',
			'description'   => 'This sidebar displays in home screen (under slider)',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgetTitle">',
			'after_title'   => '</div>'
		) 

	);
	
	register_sidebar(

		array(

			'name'          => __( 'Footer Column One Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-column-one',
			'description'   => 'This sidebar displays in footer column one',
			'class'         => 'sidebar',
			'before_widget' => '<div class="item-layout row-column col-md-6 col-sm-6 col-xs-12 padright20-ms %1$s">',							
			'after_widget'  => '</div>',							
			'before_title'  => '<div class="widgetTitle">',
			'after_title'   => '</div>'

		) 

	);	

	register_sidebar( 

		array(

			'name'          => __( 'Footer Column Two Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-column-two',
			'description'   => 'This sidebar displays in footer column two',
			'class'         => 'sidebar',
			'before_widget' => '<div class="item-layout row-column col-md-6 col-sm-6 col-xs-12 padleft20-ms mtop20-xs %1$s">',
			'after_widget'  => '</div>',							   
			'before_title'  => '<div class="widgetTitle">',
			'after_title'   => '</div>'
		) 

	);
	
	register_sidebar( 

		array(

			'name'          => __( 'Footer Copyright Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-copyright',
			'description'   => 'This sidebar displays in footer copyright',
			'class'         => 'sidebar',
			'before_widget' => '<div class="footer-row ohidden %1$s">',							   
			'after_widget'  => '</div>',							   
			'before_title'  => '<div class="widgetTitle">',
			'after_title'   => '</div>'
		) 

	); ?>