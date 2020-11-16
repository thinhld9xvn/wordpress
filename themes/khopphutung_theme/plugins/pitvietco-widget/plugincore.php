<?php

/*

Plugin Name: PitViet Company Widget

Plugin URI: 

Description: Tuyển tập các widget cho website

Author: PitViet Company

Version: 1.0

Author URI: 

*/

function widget_load_style() {
	$current_screen = get_current_screen();		

	if ( 'widgets' === $current_screen->base ) :

		wp_enqueue_style( 'pitvietco-plugin-style', plugins_url('css/style.min.css', __FILE__) );	

	endif;
}

add_action( 'admin_enqueue_scripts', 'widget_load_style' );

require_once 'plugin_ajax.php';

require_once plugin_dir_path(__FILE__) . 'pitviet_slider_widget.php';
require_once plugin_dir_path(__FILE__) . 'pitviet_show_term_widget.php';
require_once plugin_dir_path(__FILE__) . 'pitviet_showhot_products_widget.php';
require_once plugin_dir_path(__FILE__) . 'pitviet_showchild_taxonomy_widget.php'; ?>