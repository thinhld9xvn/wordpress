<?php 
	global $post, $q_db;       

    $active_langcode = qt_get_current_lang();

    //echo $active_langcode . '-' . $post->qtranslate_post_langcode; die();

    if ( $active_langcode !== $post->qtranslate_post_langcode ) :       

        $post = $q_db->get_post_foreign( $post->ID, $active_langcode, 'page' );

    endif; ?>

<div class="content-area">

		<?php
			if ( $post !== null ) :

				echo apply_filters('the_content', $post->post_content);

			endif;
		?>

	</div>