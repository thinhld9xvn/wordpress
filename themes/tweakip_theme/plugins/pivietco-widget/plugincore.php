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

	$current_screen = get_current_screen();

	if ( 'widgets' === $current_screen->base ) :
		wp_enqueue_style( 'pitvietco-stylesheet-widget', plugins_url('css/style.min.css', __FILE__) );		

	endif;
	
}

add_action( 'admin_enqueue_scripts', 'widget_load_style' );

require_once plugin_dir_path(__FILE__) . 'pitvietco_slider_widget.php';
require_once plugin_dir_path(__FILE__) . 'pitvietco_show_childpage_diensten_layout_widget.php';
require_once plugin_dir_path(__FILE__) . 'pitvietco_show_childpage_portfolio_layout_widget.php'; ?>