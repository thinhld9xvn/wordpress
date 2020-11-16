<?php

/*

Plugin Name: PitVietCo Widget

Plugin URI: 

Description: Tuyển tập các widget của công ty PitViet

Author: PitViet Company

Version: 1.0

Author URI: 

*/

function widget_load_style() {

	global $combine_admin_enqueue;

	$request_uri = $_SERVER['REQUEST_URI'];

	if ( false !== strpos( $request_uri, 'widgets.php' ) ) :

		$combine_admin_enqueue['stylesheet'][] = plugins_url('css/style.css', __FILE__);		

	endif;
	
}

add_action( 'admin_init', 'widget_load_style' );

require_once plugin_dir_path(__FILE__) . 'pitvietco_slider_widget.php';
require_once plugin_dir_path(__FILE__) . 'pitvietco_feature_single_product_widget.php';
require_once plugin_dir_path(__FILE__) . 'pitvietco_feature_cat_news_carousel_widget.php';
require_once plugin_dir_path(__FILE__) . 'pitvietco_feature_footer_lightgallery_widget.php';
require_once plugin_dir_path(__FILE__) . 'pitvietco_feature_products_list_widget.php';