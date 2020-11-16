<?php 	

	// bổ sung các fields vào front taxonomy form
	/*function term_add_new_front_meta_fields() {

		include QTRANSLATE_DIRECTORY . '/templates/qTranslate_term_front_form_fields_hook.php';		

	}

	// bổ sung các fields vào taxonomy edited form
	function term_add_new_edited_meta_fields( $tag ) {

		ob_start(); 

		include QTRANSLATE_DIRECTORY . '/templates/qTranslate_term_edited_form_fields_hook.php';		

		$contents = ob_get_contents();
		ob_end_clean();

		echo $contents;
	}

	$taxonomy = $_GET['taxonomy'];

	if ( ! isset( $taxonomy) ) :

		$taxonomy = 'category';

	endif;	
	
	add_action( "{$taxonomy}_add_form_fields", "term_add_new_front_meta_fields", 10, 2 );
	add_action( "edit_{$taxonomy}_form_fields", "term_add_new_edited_meta_fields" ); */

	?>