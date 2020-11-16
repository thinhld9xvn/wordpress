<?php 	
	$previous_thread_text = get_post_meta( $post_parent->ID, '_pt-field-support-vragen-template-subchildren-previous-thread-text', true ); ?>

<h2 class="tcenter">
	<?php echo $previous_thread_text; ?>: 
	<a class="mybutton mybutton-danger tinySize padwrap -tshadow -normal" 
	   href="<?php echo get_page_link( $post ); ?>">
	   <?php echo $post->post_title ?>
	</a>
</h2>

<div class="vragen-subchildren-content mtop40-ms mtop20-xs">
	<?php 
		echo $entries[ $t_id - 1 ][ 'accordion-vragen-subchildren-entry-content' ] ?>
</div>