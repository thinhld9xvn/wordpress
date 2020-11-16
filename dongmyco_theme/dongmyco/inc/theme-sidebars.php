<?php 
    register_sidebar( 
		array(
			'name'          => __( 'Header Slogun Sidebar', 'dongmy' ),
			'id'            => 'sidebar-header-slogun',
			'description'   => 'Sidebar nay hien thi o cot thu hai o header',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle">',
			'after_title'   => '</div>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'Header Contact Sidebar', 'dongmy' ),
			'id'            => 'sidebar-header-contact',
			'description'   => 'Sidebar nay hien thi o dong thu hai o header',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle">',
			'after_title'   => '</div>'
		) 
	);

	register_sidebar( 
		array(
			'name'          => __( 'Slider Sidebar', 'dongmy' ),
			'id'            => 'sidebar-slider',
			'description'   => 'Sidebar nay hien thi o duoi header',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle">',
			'after_title'   => '</div>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'ColLeft Sidebar', 'dongmy' ),
			'id'            => 'sidebar-colleft',
			'description'   => 'Sidebar nay hien thi o cot trai',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox widgbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="hg-title --center --bg-border">',
			'after_title'   => '</h3>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'ColRight Home Sidebar', 'dongmy' ),
			'id'            => 'sidebar-colright',
			'description'   => 'Sidebar nay hien thi o cot phai tai trang chu',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox widgbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="hg-title --double-border --double-active-border">',
			'after_title'   => '</h3>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'Footer Column One Sidebar', 'dongmy' ),
			'id'            => 'sidebar-footer-column-one',
			'description'   => 'Sidebar nay hien thi o cot footer thu nhat',
			'class'         => 'sidebar',
			'before_widget' => '<div class="item-layout col-md-4 col-sm-6 col-xs-12 %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'Footer Column Two Sidebar', 'dongmy' ),
			'id'            => 'sidebar-footer-column-two',
			'description'   => 'Sidebar nay hien thi o cot footer thu hai',
			'class'         => 'sidebar',
			'before_widget' => '<div class="item-layout col-md-4 col-sm-6 col-xs-12 %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'Footer Column Three Sidebar', 'dongmy' ),
			'id'            => 'sidebar-footer-column-three',
			'description'   => 'Sidebar nay hien thi o cot footer thu ba',
			'class'         => 'sidebar',
			'before_widget' => '<div class="item-layout col-md-4 col-sm-6 col-xs-12 %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		) 
	);
?>