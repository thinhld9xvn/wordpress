<?php    
	
	register_sidebar( 

		array(
			'name'          => __( 'Header Contact Sidebar', 'pitvietco' ),
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
			'name'          => __( 'Slider Sidebar', 'pitvietco' ),
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
			'name'          => __( 'ColLeft Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-colleft',
			'description'   => 'Sidebar nay hien thi o cot trai',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox widgbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgTitleBox" data-navig="compactWidgTitleBox">' .
							   '<span>',
			'after_title'   => '</span></h3>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'ColRight Home Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-colright',
			'description'   => 'Sidebar nay hien thi o cot phai tai trang chu',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox widgbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgTitleBox" data-navig="compactWidgTitleBox">' .
							   '<span>',
			'after_title'   => '</span></h3>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'Footer Column One Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-column-one',
			'description'   => 'Sidebar nay hien thi o cot footer thu nhat',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle">',
			'after_title'   => '</div>'
		) 
	);
	
	register_sidebar( 
		array(
			'name'          => __( 'Footer Column Two Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer-column-two',
			'description'   => 'Sidebar nay hien thi o cot footer thu hai',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle">',
			'after_title'   => '</div>'
		) 
	);
	
?>