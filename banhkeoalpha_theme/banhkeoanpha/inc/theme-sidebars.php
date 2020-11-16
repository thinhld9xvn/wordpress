<?php    
	
	register_sidebar( 

		array(
			'name'          => __( 'Header Contact Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-header-contact',
			'description'   => 'Sidebar nay hien thi o cot thu nhat header',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s head-contact pull-left">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle">',
			'after_title'   => '</div>'
		)
		
	);

	register_sidebar( 

		array(
			'name'          => __( 'Header Social Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-header-social',
			'description'   => 'Sidebar nay hien thi o cot thu hai header',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s head-social pull-right">',
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
			'name'          => __( 'Home Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-home',
			'description'   => 'Sidebar nay hien thi o trang chu',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox fullwidth-section mtop20 %1$s">'
							  .    '<div class="container">',

			'after_widget'  => '	</div>' .
							   '</div>',

			'before_title'  => '<h2 class="mySectionHeadTitle vcenter">' .
							   '	<div class="title">',

			'after_title'   => '	</div>' . 
							   '	<div class="line">' .
							   '	<span class="headline lleft"></span>' .
							   '	<span class="licon fa fa-gg"></span>' .
							   '	<span class="headline lright"></span>' .
							   '</h2>'
		) 
	);
	
	
	register_sidebar( 
		array(
			'name'          => __( 'Footer Sidebar', 'pitvietco' ),
			'id'            => 'sidebar-footer',
			'description'   => 'Sidebar nay hien thi o footer',
			'class'         => 'sidebar',
			'before_widget' => '<div class="widgetbox %1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle">',
			'after_title'   => '</div>'
		) 
	);	
	
	
?>