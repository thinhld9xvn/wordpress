<?php 

	function enable_more_buttons($buttons) {

		$buttons[] = 'fontselect';
		$buttons[] = 'fontsizeselect';
		$buttons[] = 'styleselect';
		$buttons[] = 'backcolor';
		$buttons[] = 'newdocument';
		$buttons[] = 'cut';
		$buttons[] = 'copy';
		$buttons[] = 'charmap';
		$buttons[] = 'hr';
		$buttons[] = 'visualaid';

		return $buttons;

	}
	add_filter("mce_buttons_3", "enable_more_buttons");

	add_filter( 'tiny_mce_before_init', 'myformatTinyMCE' );

	function myformatTinyMCE( $in ) {

		$in['wordpress_adv_hidden'] = FALSE;

		return $in;
	}

	function my_theme_add_editor_styles() {
	    add_editor_style( ASTRA_THEME_URI . 'astra-customize-hooks/tinymce-custom-stylesheet/style.css' );
	}
	add_action( 'init', 'my_theme_add_editor_styles' );

	