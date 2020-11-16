<?php 
    register_sidebar( 
		array(
			'name'          => __( 'Header Slogun Sidebar', 'vietnhat' ),
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
			'name'          => __( 'Header Phone Sidebar', 'vietnhat' ),
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
			'name'          => __( 'ColLeft Sidebar', 'vietnhat' ),
			'id'            => 'sidebar-colleft',
			'description'   => 'Sidebar nay hien thi o cot trai',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox widgbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="spboxtitle --bg-green">',
			'after_title'   => '</h3>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'ColLeft Sidebar', 'vietnhat' ),
			'id'            => 'sidebar-colleft',
			'description'   => 'Sidebar nay hien thi o cot trai',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox widgbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="spboxtitle --bg-green">',
			'after_title'   => '</h3>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'ColRight Home Sidebar', 'vietnhat' ),
			'id'            => 'sidebar-colright',
			'description'   => 'Sidebar nay hien thi o cot phai tai trang chu',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="spboxtitle --no-padlr" data-navig="drawline" data-childcompare=".caption" data-childtarget=".hr">' .
							   '	<span class="caption">',
			'after_title'   => '	</span>' .
							   '	<span class="hr"></span>' .
							   '</h2>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'Footer Column Sidebar', 'vietnhat' ),
			'id'            => 'sidebar-footer',
			'description'   => 'Sidebar nay hien thi o footer',
			'class'         => 'sidebar',
			'before_widget' => '<div class="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle ft-title">',
			'after_title'   => '</div>'
		) 
	);
?>