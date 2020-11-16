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
		wp_enqueue_script( 'ajax-pitvietco-showterm-widget', plugins_url( 'js/ajax_showterm.min.js', __FILE__ ), array('jquery'), '1.0.0', true );
		wp_localize_script('ajax-pitvietco-showterm-widget', 'sb_admin_ajax', array('url' => admin_url('admin-ajax.php')));

	endif;
	
}

add_action( 'admin_enqueue_scripts', 'widget_load_style' );

require_once 'plugin_ajax.php';

require_once plugin_dir_path(__FILE__) . 'pitvietco_slider_widget.php';
require_once plugin_dir_path(__FILE__) . 'pitvietco_carousel_showterm_widget.php'; ?>