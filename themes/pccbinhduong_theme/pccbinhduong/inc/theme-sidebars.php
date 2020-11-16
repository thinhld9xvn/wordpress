<?php 
    register_sidebar( 
		array(
			'name'          => __( 'Header Slogun Sidebar', 'pccbinhduong' ),
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
			'name'          => __( 'Header Phone Sidebar', 'pccbinhduong' ),
			'id'            => 'sidebar-header-phone',
			'description'   => 'Sidebar nay hien thi o cot thu ba o header',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle">',
			'after_title'   => '</div>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'Home Sidebar', 'pccbinhduong' ),
			'id'            => 'sidebar-home',
			'description'   => 'Sidebar nay hien thi tai trang chu (dưới menu)',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle>',
			'after_title'   => '</div>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'Home Bottom Sidebar Column Left', 'pccbinhduong' ),
			'id'            => 'sidebar-home-bottom-column-left',
			'description'   => 'Sidebar nay hien thi tai trang chu dưới cùng trên footer',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="boxHeadTitle">',
			'after_title'   => '</h2>'
		) 
	);
	
		register_sidebar( 
		array(
			'name'          => __( 'Home Bottom Sidebar Column Right', 'pccbinhduong' ),
			'id'            => 'sidebar-home-bottom-column-right',
			'description'   => 'Sidebar nay hien thi tai trang chu dưới cùng trên footer',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="boxHeadTitle">',
			'after_title'   => '</h2>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'ColLeft News Sidebar', 'pccbinhduong' ),
			'id'            => 'sidebar-catnews-colleft',
			'description'   => 'Sidebar nay hien thi o cot trai cua danh muc dang tin tuc',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox widgbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="boxHeadColumnTitle">' .
							   '	<span class="icon fa fa-navicon"></span>' .
							   '	<span class="block padleft25">',
			'after_title'   => '	</span>' .
							   '</h2>'
		) 
	);

	register_sidebar( 
		array(
			'name'          => __( 'ColLeft Projects Sidebar', 'pccbinhduong' ),
			'id'            => 'sidebar-catprojects-colleft',
			'description'   => 'Sidebar nay hien thi o cot trai cua danh muc dang du an - cong trinh',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox widgbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="boxHeadColumnTitle">' .
							   '	<span class="icon fa fa-navicon"></span>' .
							   '	<span class="block padleft25">',
			'after_title'   => '	</span>' .
							   '</h2>'
		) 
	);

	register_sidebar( 
		array(
			'name'          => __( 'ColLeft Products Sidebar', 'pccbinhduong' ),
			'id'            => 'sidebar-catproducts-colleft',
			'description'   => 'Sidebar nay hien thi o cot trai cua danh muc dang san pham',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox widgbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="boxHeadColumnTitle">' .
							   '	<span class="icon fa fa-navicon"></span>' .
							   '	<span class="block padleft25">',
			'after_title'   => '	</span>' .
							   '</h2>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'Footer Column One Sidebar', 'pccbinhduong' ),
			'id'            => 'sidebar-footer-column-one',
			'description'   => 'Sidebar nay hien thi o footer',
			'class'         => 'sidebar',
			'before_widget' => '<div class="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle ft-title">',
			'after_title'   => '</div>'
		) 
	);
	
		register_sidebar( 
		array(
			'name'          => __( 'Footer Column Two Sidebar', 'pccbinhduong' ),
			'id'            => 'sidebar-footer-column-two',
			'description'   => 'Sidebar nay hien thi o footer',
			'class'         => 'sidebar',
			'before_widget' => '<div class="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle ft-title">',
			'after_title'   => '</div>'
		) 
	);
?>