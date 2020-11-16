<?php

/*

Plugin Name: VietNhat Widget

Plugin URI: 

Description: Tuyển tập các widget cho website Việt Nhật

Author: Luu Duc Thinh

Version: 1.0

Author URI: 

*/

function widget_load_style() {

	$current_screen = get_current_screen();

	if ( 'widgets' === $current_screen->base ) :

		wp_enqueue_style( 'vietnhat-style', plugins_url('css/style.css', __FILE__) );		

	endif;

}

add_action( 'admin_enqueue_scripts', 'widget_load_style' );

require_once plugin_dir_path(__FILE__) . 'vietnhat_category_widget.php';
require_once plugin_dir_path(__FILE__) . 'vietnhat_showcat_products_widget.php';

?>