<?php
	register_sidebar(
		array(
			'name'          => __( 'Banners Sidebar', 'gco' ),
			'id'            => 'sidebar-home-banners',
			'description'   => 'Sidebar hiển thị ở đầu trang chủ (cạnh danh mục)',			
			'class'         => 'sidebar',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<!-- ',
			'after_title'   => ' -->'
		)
	);	
	register_sidebar(
		array(
			'name'          => __( 'Home Sidebar', 'gco' ),
			'id'            => 'sidebar-home-main',
			'description'   => 'Sidebar hiển thị ở dưới banners trang chủ',			
			'class'         => 'sidebar',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
		)
	);	
	register_sidebar(
		array(
			'name'          => __( 'Footer Sidebar', 'gco' ),
			'id'            => 'sidebar-footer',
			'description'   => 'Sidebar hiển thị ở footer',			
			'class'         => 'sidebar',
			'before_widget' => '<div class="footer__main-item %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="footer__main-title footer__main-title-1">',
			'after_title'   => '</div>'
		)
	);	