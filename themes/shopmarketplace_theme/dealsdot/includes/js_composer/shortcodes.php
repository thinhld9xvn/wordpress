<?php
/*-----------------------------------------------------------------------------------*/
/*	Shortcode Filter
/*-----------------------------------------------------------------------------------*/

vc_remove_element( "vc_gmaps");
vc_remove_element( "vc_wp_search");
vc_remove_element(  "vc_wp_meta" );
vc_remove_element(  "vc_wp_recentcomments" );
vc_remove_element(  "vc_wp_calendar" );
vc_remove_element(  "vc_wp_pages" );
vc_remove_element(  "vc_wp_tagcloud" );
vc_remove_element(  "vc_wp_text" );
vc_remove_element(  "vc_wp_custommenu" );
vc_remove_element(  "vc_wp_posts" );
vc_remove_element(  "vc_wp_categories" );
vc_remove_element(  "vc_wp_archives" );
vc_remove_element(  "vc_wp_rss" );
vc_remove_element(  "vc_progress_bar" );
vc_remove_element(  "vc_message" );
vc_set_as_theme( $disable_updater = false ); 
vc_is_updater_disabled();

function dealsdot_vc_remove_woocommerce() {
	vc_remove_element( 'woocommerce_cart' );
	vc_remove_element( 'woocommerce_checkout' );
	vc_remove_element( 'woocommerce_order_tracking' );
	vc_remove_element( 'woocommerce_my_account' );
	vc_remove_element( 'recent_products' );
	vc_remove_element( 'featured_products' );
	vc_remove_element( 'product' );
	vc_remove_element( 'products' );
	vc_remove_element( 'add_to_cart' );
	vc_remove_element( 'add_to_cart_url' );
	vc_remove_element( 'product_page' );
	vc_remove_element( 'product_category' );
	vc_remove_element( 'product_categories' );
	vc_remove_element( 'sale_products' );
	vc_remove_element( 'best_selling_products' );
	vc_remove_element( 'top_rated_products' );
	vc_remove_element( 'product_attribute' );
	vc_remove_element( 'related_products' );
}
// Hook for admin editor.
add_action( 'vc_build_admin_page', 'dealsdot_vc_remove_woocommerce', 11 );
// Hook for frontend editor.
add_action( 'vc_load_shortcode', 'dealsdot_vc_remove_woocommerce', 11 );

/*-----------------------------------------------------------------------------------*/
/* dealsdot Style
/*-----------------------------------------------------------------------------------*/

$attributes = array(

	array(
		'type' => 'css_editor',
		'param_name' => 'klb_responsive',
		'heading' => esc_html__( 'XS Responsive option', 'dealsdot' ),
		'description' => esc_html__( 'These settings are worked for xsmall devices.', 'dealsdot' ),
		'group' => esc_html__('Responsive Design','dealsdot'),
	),

);
vc_add_params( 'vc_column', $attributes );		


/*-----------------------------------------------------------------------------------*/
/*	Dealsdot Mega List
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'dealsdot_mega_list_integrateWithVC' );
function dealsdot_mega_list_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Dealsdot Mega List", "dealsdot" ),
      "base" => "mega_list",
	  "category" => "Dealsdot",
      "params" => array(
				
		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'List', 'dealsdot' ),
			'param_name' => 'values',
			'group' => esc_html__('List','dealsdot'),
			'value' => urlencode( json_encode( array(
				array(
					'title' => esc_html__( 'title here', 'dealsdot' )
				)
			) ) ),
			'params' => array(

				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'URL (Link)', 'dealsdot' ),
					'param_name' => 'link',
					'description' => esc_html__( 'Add an url for the image.', 'dealsdot' ),
					'admin_label' => true,
				),
				
				array(
					"type" => "textfield",
					"heading" => esc_html__("Count", "dealsdot"),
					"param_name" => "count",
					"description" => esc_html__("Set count.", "dealsdot"),
				),
				
				array(
					'type' => 'checkbox',
					'param_name' => 'enable_megamenu',
					'heading' => esc_html__( 'Activate Mega Sub Menu?', 'dealsdot' ),
					'description' => esc_html__( 'You want to enable mega menu?', 'dealsdot' ),
					'value' => array( esc_html__( 'Yes', 'dealsdot' ) => 'yes' ),
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Select Type', 'dealsdot' ),
					'param_name' => 'menu_type',
					'value' => array(
						esc_html__( 'Select Type', 'dealsdot' ) => 'select-type',
						esc_html__( '4 Columns', 'dealsdot' ) => '4-columns',						
						esc_html__( '3 Columns', 'dealsdot' ) => '3-columns',					
					),
					'dependency' => array(
						'element' => 'enable_megamenu',
						'value' => 'yes',
					),
					'description' => esc_html__( 'Set menu type for mega sub menu.', 'dealsdot' ),
				),
				
				array(
					'type' => 'param_group',
					'heading' => esc_html__( 'First Column', 'dealsdot' ),
					'param_name' => 'firstcolumn',
					'group' => esc_html__('List','dealsdot'),
					'dependency' => array(
						'element' => 'enable_megamenu',
						'value' => 'yes',
					),
					'value' => urlencode( json_encode( array(
						array(
							'title' => esc_html__( 'title here', 'dealsdot' )
						)
					) ) ),
					'params' => array(

						array(
							'type' => 'vc_link',
							'heading' => esc_html__( 'URL (Link)', 'dealsdot' ),
							'param_name' => 'sublink',
							'description' => esc_html__( 'Add an url for the item.', 'dealsdot' ),
							'admin_label' => true,
						),
					
					),
				),
				
				array(
					'type' => 'param_group',
					'heading' => esc_html__( 'Second Column', 'dealsdot' ),
					'param_name' => 'secondcolumn',
					'group' => esc_html__('List','dealsdot'),
					'dependency' => array(
						'element' => 'enable_megamenu',
						'value' => 'yes',
					),
					'value' => urlencode( json_encode( array(
						array(
							'title' => esc_html__( 'title here', 'dealsdot' )
						)
					) ) ),
					'params' => array(

						array(
							'type' => 'vc_link',
							'heading' => esc_html__( 'URL (Link)', 'dealsdot' ),
							'param_name' => 'sublink',
							'description' => esc_html__( 'Add an url for the item.', 'dealsdot' ),
							'admin_label' => true,
						),
					
					),
				),
				
				array(
					'type' => 'param_group',
					'heading' => esc_html__( 'Third Column', 'dealsdot' ),
					'param_name' => 'thirdcolumn',
					'group' => esc_html__('List','dealsdot'),
					'dependency' => array(
						'element' => 'menu_type',
						'value_not_equal_to' => array( '3-columns' ),
					),
					
					'value' => urlencode( json_encode( array(
						array(
							'title' => esc_html__( 'title here', 'dealsdot' )
						)
					) ) ),
					'params' => array(

						array(
							'type' => 'vc_link',
							'heading' => esc_html__( 'URL (Link)', 'dealsdot' ),
							'param_name' => 'sublink',
							'description' => esc_html__( 'Add an url for the item.', 'dealsdot' ),
							'admin_label' => true,
						),
					
					),
				),
				
				array(
					'type' => 'param_group',
					'heading' => esc_html__( 'Fourth Column', 'dealsdot' ),
					'param_name' => 'fourthcolumn',
					'group' => esc_html__('List','dealsdot'),
					'dependency' => array(
						'element' => 'menu_type',
						'value_not_equal_to' => array( '3-columns' ),
					),
					'value' => urlencode( json_encode( array(
						array(
							'title' => esc_html__( 'title here', 'dealsdot' )
						)
					) ) ),
					'params' => array(

						array(
							'type' => 'vc_link',
							'heading' => esc_html__( 'URL (Link)', 'dealsdot' ),
							'param_name' => 'sublink',
							'description' => esc_html__( 'Add an url for the item.', 'dealsdot' ),
							'admin_label' => true,
						),
					
					),
				),
				
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Image', 'dealsdot' ),
					'param_name' => 'image_url',
					'description' => esc_html__( 'Upload an image.', 'dealsdot' ),
					'dependency' => array(
						'element' => 'menu_type',
						'value' => '3-columns',
					),
				),
			
			),
		),
		
		
      ),
   ) );
}
class WPBakeryShortCode_Mega_List extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Dealsdot Slider
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'dealsdot_slider_integrateWithVC' );
function dealsdot_slider_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Dealsdot Slider", "dealsdot" ),
      "base" => "slider",
	  "category" => "Dealsdot",
      "params" => array(
				
		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Slides', 'dealsdot' ),
			'param_name' => 'values',
			'group' => esc_html__('Slides','dealsdot'),
			'value' => urlencode( json_encode( array(
				array(
					'title' => esc_html__( 'title here', 'dealsdot' )
				)
			) ) ),
			'params' => array(
			
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Image', 'dealsdot' ),
					'param_name' => 'image_url',
					'description' => esc_html__( 'Upload a image.', 'dealsdot' ),
				),
				
				array(
					"type" => "textfield",
					"heading" => esc_html__("Title", "dealsdot"),
					"param_name" => "title",
					"description" => esc_html__("Set title.", "dealsdot"),
					"admin_label" => true,
				),
				
				array(
					"type" => "textfield",
					"heading" => esc_html__("Second title", "dealsdot"),
					"param_name" => "second_title",
					"description" => esc_html__("Set title.", "dealsdot"),
				),
				
				array(
					"type" => "textfield",
					"heading" => esc_html__("Sub title", "dealsdot"),
					"param_name" => "subtitle",
					"description" => esc_html__("Set title.", "dealsdot"),
				),
				
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'URL (Link)', 'dealsdot' ),
					'param_name' => 'link',
					'description' => esc_html__( 'Add an url for the image.', 'dealsdot' ),
				),
			
			),
		),
		
		
      ),
   ) );
}
class WPBakeryShortCode_Slider extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Dealsdot Stores Carousel
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'dealsdot_stores_carousel_integrateWithVC' );
function dealsdot_stores_carousel_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Dealsdot Stores Carousel", "dealsdot" ),
      "base" => "stores_carousel",
	  "category" => "Dealsdot",
      "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "dealsdot"),
            "param_name" => "headtitle",
            "description" => esc_html__("Set a title.", "dealsdot"),
			"admin_label" => true,
			"group" => 'General',
        ),

		array(
			'type' => 'checkbox',
			'param_name' => 'icon_enable',
			'heading' => esc_html__( 'Activate Default Icon', 'dealsdot' ),
			'description' => esc_html__( 'You want to enable default icons for the stores?', 'dealsdot' ),
			'value' => array( esc_html__( 'Yes', 'dealsdot' ) => 'yes' ),
			"group" => 'General',
		),

		array(
			'type' => 'checkbox',
			'param_name' => 'displayname',
			'heading' => esc_html__( 'Display Store Name', 'dealsdot' ),
			'description' => esc_html__( 'You want to display store name?', 'dealsdot' ),
			'value' => array( esc_html__( 'Yes', 'dealsdot' ) => 'yes' ),
			"group" => 'General',
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Count', 'dealsdot' ),
			'param_name' => 'store_count',
			'description' => esc_html__( 'set a count. default: 11', 'dealsdot' ),
			"group" => 'General',
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Item Per Line', 'dealsdot' ),
			'param_name' => 'displayitem',
			'description' => esc_html__( 'set a count. default: 9', 'dealsdot' ),
			"group" => 'General',
		),

		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'List', 'dealsdot' ),
			'param_name' => 'values',
			'dependency' => array(
				'element' => 'icon_enable',
				'value' => 'yes',
			),
			"group" => 'General',
			'value' => urlencode( json_encode( array(
				array(
					'title' => esc_html__( 'title here', 'dealsdot' )
				)
			) ) ),
			'params' => array(
			
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Icon', 'dealsdot' ),
					'param_name' => 'icon_name',
					'description' => esc_html__( 'Add a icon. e.g: basketball-ball', 'dealsdot' ),
					"admin_label" => true,
				),
			
			),
		),
	
		  array(
			  'type' => 'colorpicker',
			  'param_name' => 'title_color',
			  'heading' => esc_html__( 'Title Color', 'dealsdot' ),
			  'description' => esc_html__( 'Set a color for the title.', 'dealsdot' ),	
			  "group" => 'General',
		  ),

		
      ),
   ) );
}
class WPBakeryShortCode_Stores_Carousel extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Dealsdot Stores Grid
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'dealsdot_stores_grid_integrateWithVC' );
function dealsdot_stores_grid_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Dealsdot Stores Grid", "dealsdot" ),
      "base" => "stores_grid",
	  "category" => "Dealsdot",
      "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Count", "dealsdot"),
            "param_name" => "count",
            "description" => esc_html__("Set count for stores.", "dealsdot"),
        ),
		
      ),
   ) );
}
class WPBakeryShortCode_Stores_Grid extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Dealsdot Product Carousel
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'dealsdot_product_carousel_integrateWithVC' );
function dealsdot_product_carousel_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Dealsdot Product Carousel", "dealsdot" ),
      "base" => "product_carousel",
	  "category" => "Dealsdot",
      "params" => array(
	  
		array(
			'type' => 'loop',
			'heading' => esc_html__('Products', 'dealsdot'),
			'param_name' => 'build_query',
			'settings' => array(
				'size' => array('hidden' => true, 'value' => 4 * 3),
				'order_by' => array('hidden' => true),
				'order' => array('hidden' => true),
				'post_type' => array('value' => 'product', 'hidden' => true),
				'categories' => array('hidden' => true),
				'tags' => array('hidden' => true),
				'by_id' => array('hidden' => true),
				'authors' => array('hidden' => true),
			),
			'description' => esc_html__('Create WordPress loop, to populate content from your site.', 'dealsdot')
		),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Post Count", "dealsdot"),
            "param_name" => "postcount",
            "description" => esc_html__("Set post count", "dealsdot"),
        ),	

		array(
			'type' => 'checkbox',
			'param_name' => 'filter',
			'heading' => esc_html__( 'Activate Category Filter?', 'dealsdot' ),
			'description' => esc_html__( 'You want to use filter with categories?', 'dealsdot' ),
			'value' => array( esc_html__( 'Yes', 'dealsdot' ) => 'yes' ),
		),

		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "dealsdot"),
            "param_name" => "title",
            "description" => esc_html__("Add a title for the description box.", "dealsdot"),
			"group"	=> 'Desc Box',
        ),

		
      ),
   ) );
}
class WPBakeryShortCode_Product_Carousel extends WPBakeryShortCode {
}


/*-----------------------------------------------------------------------------------*/
/*	Dealsdot Product Grid
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'dealsdot_product_grid_integrateWithVC' );
function dealsdot_product_grid_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Dealsdot Product Grid", "dealsdot" ),
      "base" => "product_grid",
	  "category" => "Dealsdot",
      "params" => array(
	  
		array(
			'type' => 'loop',
			'heading' => esc_html__('Latest Products', 'dealsdot'),
			'param_name' => 'build_query',
			'settings' => array(
				'size' => array('hidden' => false, 'value' => 4 * 3),
				'order_by' => array('value' => 'date'),
				'post_type' => array('value' => 'product', 'hidden' => true),
				'categories' => array('hidden' => true),
				'tags' => array('hidden' => true),
				
			),
			'description' => esc_html__('Create latest products loop.', 'dealsdot')
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Columns', 'dealsdot' ),
			'param_name' => 'column_count',
			'value' => array(
				esc_html__( 'Select Column', 'dealsdot' ) => 'select-column',
				esc_html__( 'Column 2', 'dealsdot' ) => 'col-md-6',						
				esc_html__( 'Column 3', 'dealsdot' ) => 'col-md-4',						
				esc_html__( 'Column 4', 'dealsdot' ) => 'col-md-3',						
			),			
			'description' => esc_html__( 'Set column count for the coupons.', 'dealsdot' ),
		),

		
      ),
   ) );
}
class WPBakeryShortCode_Product_Grid extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Dealsdot Stripe Image
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'dealsdot_strip_image_integrateWithVC' );
function dealsdot_strip_image_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Dealsdot Strip Image", "dealsdot" ),
      "base" => "strip_image",
	  "category" => "Dealsdot",
      "params" => array(
	  
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'dealsdot' ),
				'param_name' => 'image_url',
				'description' => esc_html__( 'Upload a image.', 'dealsdot' ),
			),
			
			array(
				"type" => "textfield",
				"heading" => esc_html__("Title", "dealsdot"),
				"param_name" => "title",
				"description" => esc_html__("Set title.", "dealsdot"),
				"admin_label" => true,
			),
			
			array(
				"type" => "textfield",
				"heading" => esc_html__("Subtitle", "dealsdot"),
				"param_name" => "subtitle",
				"description" => esc_html__("Set subtitle.", "dealsdot"),
			),
			
			array(
				"type" => "textfield",
				"heading" => esc_html__("Strip Text", "dealsdot"),
				"param_name" => "strip_text",
				"description" => esc_html__("Set the text.", "dealsdot"),
			),
			
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'URL (Link)', 'dealsdot' ),
				'param_name' => 'link',
				'description' => esc_html__( 'Add an url for the image.', 'dealsdot' ),
			),
		
		
      ),
   ) );
}
class WPBakeryShortCode_Strip_Image extends WPBakeryShortCode {
}


/*-----------------------------------------------------------------------------------*/
/*	Dealsdot Coupon Carousel
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'dealsdot_coupon_carousel_integrateWithVC' );
function dealsdot_coupon_carousel_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Dealsdot Coupon Carousel", "dealsdot" ),
      "base" => "coupon_carousel",
	  "category" => "Dealsdot",
      "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "dealsdot"),
            "param_name" => "title",
            "description" => esc_html__("Set the title.", "dealsdot"),
        ),

		array(
			'type' => 'loop',
			'heading' => esc_html__('Blog', 'dealsdot'),
			'param_name' => 'build_query',
			'settings' => array(
				'size' => array('hidden' => false, 'value' => 4 * 3),
				'order_by' => array('value' => 'date'),
				'post_type' => array('value' => 'shop_coupon', 'hidden' => true),
				'categories' => array('hidden' => true),
				'tags' => array('hidden' => true),
				
			),
			'description' => esc_html__('Create WordPress loop, to populate content from your site.', 'dealsdot')
		),
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Subscribe Title", "dealsdot"),
            "param_name" => "subscribe_title",
            "description" => esc_html__("Set subscribe title.", "dealsdot"),
			"group"       => 'Subscribe',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Subscribe Subtitle", "dealsdot"),
            "param_name" => "subscribe_subtitle",
            "description" => esc_html__("Set subscribe subtitle.", "dealsdot"),
			"group"       => 'Subscribe',
        ),
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Subscribe Form Id", "dealsdot"),
            "param_name" => "subscribe_form_id",
            "description" => esc_html__("You can find the form id in Dashboard > Mailchimp For Wp > Form", "dealsdot"),
			"group"       => 'Subscribe',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Expires On", "dealsdot"),
            "param_name" => "translate_expires",
            "description" => esc_html__("Translate the text: Expires On.", "dealsdot"),
			"group"       => 'Translate',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Show Code", "dealsdot"),
            "param_name" => "translate_showcode",
            "description" => esc_html__("Translate the text: Show Code.", "dealsdot"),
			"group"       => 'Translate',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Click Below", "dealsdot"),
            "param_name" => "translate_clickbelow",
            "description" => esc_html__("Translate the text: Click below to get your coupon code.", "dealsdot"),
			"group"       => 'Translate',
        ),
		
      ),
   ) );
}
class WPBakeryShortCode_Coupon_Carousel extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Dealsdot Coupon Grid
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'dealsdot_coupon_grid_integrateWithVC' );
function dealsdot_coupon_grid_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Dealsdot Coupon Grid", "dealsdot" ),
      "base" => "coupon_grid",
	  "category" => "Dealsdot",
      "params" => array(
	  
		array(
			'type' => 'loop',
			'heading' => esc_html__('Blog', 'dealsdot'),
			'param_name' => 'build_query',
			'settings' => array(
				'size' => array('hidden' => false, 'value' => 4 * 3),
				'order_by' => array('value' => 'date'),
				'post_type' => array('value' => 'shop_coupon', 'hidden' => true),
				'categories' => array('hidden' => true),
				'tags' => array('hidden' => true),
				
			),
			'description' => esc_html__('Create WordPress loop, to populate content from your site.', 'dealsdot')
		),
		
		array(
			'type' => 'checkbox',
			'param_name' => 'activate_pagination',
			'heading' => esc_html__( 'Activate Pagination?', 'dealsdot' ),
			'description' => esc_html__( 'You want to use pagination for the posts?', 'dealsdot' ),
			'value' => array( esc_html__( 'Yes', 'dealsdot' ) => 'yes' ),
		),
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Subscribe Title", "dealsdot"),
            "param_name" => "subscribe_title",
            "description" => esc_html__("Set subscribe title.", "dealsdot"),
			"group"       => 'Subscribe',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Subscribe Subtitle", "dealsdot"),
            "param_name" => "subscribe_subtitle",
            "description" => esc_html__("Set subscribe subtitle.", "dealsdot"),
			"group"       => 'Subscribe',
        ),
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Subscribe Form Id", "dealsdot"),
            "param_name" => "subscribe_form_id",
            "description" => esc_html__("You can find the form id in Dashboard > Mailchimp For Wp > Form", "dealsdot"),
			"group"       => 'Subscribe',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Expires On", "dealsdot"),
            "param_name" => "translate_expires",
            "description" => esc_html__("Translate the text: Expires On.", "dealsdot"),
			"group"       => 'Translate',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Show Code", "dealsdot"),
            "param_name" => "translate_showcode",
            "description" => esc_html__("Translate the text: Show Code.", "dealsdot"),
			"group"       => 'Translate',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Click Below", "dealsdot"),
            "param_name" => "translate_clickbelow",
            "description" => esc_html__("Translate the text: Click below to get your coupon code.", "dealsdot"),
			"group"       => 'Translate',
        ),
		
      ),
   ) );
}
class WPBakeryShortCode_Coupon_Grid extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Dealsdot Latest Blog
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'dealsdot_latest_blog_integrateWithVC' );
function dealsdot_latest_blog_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Dealsdot Latest Posts", "dealsdot" ),
      "base" => "latest_blog",
	  "category" => "Dealsdot",
      "params" => array(
	  
		array(
			'type' => 'loop',
			'heading' => esc_html__('Latest Posts', 'dealsdot'),
			'param_name' => 'build_query',
			'settings' => array(
				'size' => array('hidden' => false, 'value' => 4 * 3),
				'order_by' => array('value' => 'date'),
				'post_type' => array('value' => 'post', 'hidden' => true),
				'tax_query' => array('hidden' => true),
				'tags' => array('hidden' => true),
				
			),
			'description' => esc_html__('Create latest posts loop.', 'dealsdot')
		),

		  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Title", "dealsdot"),
			  "param_name" => "title",
			  "description" => esc_html__("Set a title.", "dealsdot"),
			  "admin_label" => true
		  ),
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Excerpt Size", "dealsdot"),
            "param_name" => "excerpt_size",
            "description" => esc_html__("Add Post Excerpt Size for example : 15", "dealsdot"),
        ),
		
      ),
   ) );
}
class WPBakeryShortCode_Latest_Blog extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Dealsdot Hot Section
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'dealsdot_hot_section_integrateWithVC' );
function dealsdot_hot_section_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Dealsdot Hot Section", "dealsdot" ),
      "base" => "hot_section",
	  "category" => "Dealsdot",
      "params" => array(
	  
		array(
			'type' => 'loop',
			'heading' => esc_html__('Latest Products', 'dealsdot'),
			'param_name' => 'build_query',
			'settings' => array(
				'size' => array('hidden' => false, 'value' => 4 * 3),
				'order_by' => array('value' => 'date'),
				'post_type' => array('value' => 'product', 'hidden' => true),
				'categories' => array('hidden' => true),
				'tags' => array('hidden' => true),
				
			),
			'description' => esc_html__('Create latest products loop.', 'dealsdot')
		),

		array(
			'type' => 'checkbox',
			'param_name' => 'mostviewed',
			'heading' => esc_html__( 'Activate Most Viewed?', 'dealsdot' ),
			'description' => esc_html__( 'You want to enable most viewed?', 'dealsdot' ),
			'value' => array( esc_html__( 'Yes', 'dealsdot' ) => 'yes' ),
		),
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "dealsdot"),
            "param_name" => "title",
            "description" => esc_html__("Set a title.", "dealsdot"),
			"admin_label" => true,
        ),
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Translate Ends Text", "dealsdot"),
            "param_name" => "countbox_end_text",
            "description" => esc_html__("Set the text.", "dealsdot"),
			"group" => 'Counter',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("End Date", "dealsdot"),
            "param_name" => "countbox_end",
            "description" => esc_html__("Set a end date for the countbox.Default: 2020/02/24 03:59:00", "dealsdot"),
			"group" => 'Counter',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Translate day", "dealsdot"),
            "param_name" => "translate_day",
            "description" => esc_html__("Translate the text: Day", "dealsdot"),
			"group" => 'Counter',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Translate hrs", "dealsdot"),
            "param_name" => "translate_hrs",
            "description" => esc_html__("Translate the text: Hrs", "dealsdot"),
			"group" => 'Counter',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Translate mins", "dealsdot"),
            "param_name" => "translate_mins",
            "description" => esc_html__("Translate the text: Mins", "dealsdot"),
			"group" => 'Counter',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Translate secs", "dealsdot"),
            "param_name" => "translate_secs",
            "description" => esc_html__("Translate the text: Secs", "dealsdot"),
			"group" => 'Counter',
        ),
		
      ),
   ) );
}
class WPBakeryShortCode_Hot_Section extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Dealsdot Breadcrumb Shortcode
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'dealsdot_breadcrumb_integrateWithVC' );
function dealsdot_breadcrumb_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Dealsdot Breadcrumb", "dealsdot" ),
      "base" => "breadcrumb_shortcode",
	  "category" => "Dealsdot",
      "params" => array(
		
      ),
   ) );
}
class WPBakeryShortCode_Breadcrumb_Shortcode extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Dealsdot Contact List
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'dealsdot_contact_list_integrateWithVC' );
function dealsdot_contact_list_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Dealsdot Contact List", "dealsdot" ),
      "base" => "contact_list",
	  "category" => "Dealsdot",
      "params" => array( 
		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'List', 'dealsdot' ),
			'param_name' => 'values',
			'group' => esc_html__('List','dealsdot'),
			'value' => urlencode( json_encode( array(
				array(
					'title' => esc_html__( 'title here', 'dealsdot' )
				)
			) ) ),
			'params' => array(
			
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Description', 'dealsdot' ),
					'param_name' => 'desc',
					'description' => esc_html__( 'Add title.', 'dealsdot' ),
					'dependency' => array(
						'element' => 'box_type',
						'value' => array('type1','select-type','type3'),
					),
				),
				
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'dealsdot' ),
					'param_name' => 'icon_fontawesome',
					'value' => 'fa fa-info-circle',
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'iconsPerPage' => 200, // default 100, how many icons per/page to display
					),
					'description' => esc_html__( 'Select icon from library.', 'dealsdot' ),		
				),
			
			),
		),
		

		
      ),
   ) );
}
class WPBakeryShortCode_contact_list extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Dealsdot Google Map
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'dealsdot_map_integrateWithVC' );
function dealsdot_map_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Dealsdot Google Map", "dealsdot" ),
      "base" => "map_container",
	  "category" => "Dealsdot",
      "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Latitude", "dealsdot"),
            "param_name" => "latitude",
            "description" => esc_html__("Add latitude for google map", "dealsdot")
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Longitude', 'dealsdot' ),
            'param_name' => 'longitude',
            "description" => esc_html__("Add longitude for google map", "dealsdot"),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Zoom', 'dealsdot' ),
            'param_name' => 'zoom',
            "description" => esc_html__("Adjust zoom for google map", "dealsdot"),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Height', 'dealsdot' ),
            'param_name' => 'height',
            "description" => esc_html__("Adjust height for google map", "dealsdot"),
        ),

        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'dealsdot' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'dealsdot' ),
        ),


      ),
   ) );
}
class WPBakeryShortCode_Map extends WPBakeryShortCode {
}