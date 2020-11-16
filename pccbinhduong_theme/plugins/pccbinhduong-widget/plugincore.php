<?php

/*

Plugin Name: PCCBinhDuong Widget

Plugin URI: 

Description: Tuyển tập các widget cho website PCCBinhDuong

Author: PitViet Company

Version: 1.0

Author URI: 

*/

function widget_load_style() {

	$current_screen = get_current_screen();

	if ( 'widgets' === $current_screen->base ) :

		wp_enqueue_style( 'pccbinhduong-style', plugins_url('css/style.css', __FILE__) );
		wp_enqueue_script( 'pccbinhduong-jquery-field-select', plugins_url( 'js/field_select.js', __FILE__ ), array('jquery'), '1.0.0', true );

	endif;
	
}

add_action( 'admin_enqueue_scripts', 'widget_load_style' );

require_once plugin_dir_path(__FILE__) . 'pccbinhduong_slider_widget.php';
require_once plugin_dir_path(__FILE__) . 'pccbinhduong_carousel_showcat_widget.php';
require_once plugin_dir_path(__FILE__) . 'pccbinhduong_carousel_feedback_customer_widget.php';
require_once plugin_dir_path(__FILE__) . 'pccbinhduong_carousel_partner_widget.php';
require_once plugin_dir_path(__FILE__) . 'pccbinhduong_showchildcat_widget.php';
require_once plugin_dir_path(__FILE__) . 'pccbinhduong_recentposts_cat_widget.php';

?>