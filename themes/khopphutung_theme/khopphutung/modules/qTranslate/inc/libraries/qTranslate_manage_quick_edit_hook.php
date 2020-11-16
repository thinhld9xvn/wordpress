<?php

	function sb_qtranslate_quick_edit_callback() {

		$cmd = $_POST['cmd'];
		$tag_id = $_POST['tag_id']; 
		$taxonomy = $_POST['taxonomy'];
		$post_type = $_POST['post_type'];
		$adminpage = $_POST['adminpage'];

		if ( 'edit-tags-php' == $adminpage ) :

			$term = get_term_by( 'id', $tag_id, $taxonomy );

			echo $term->qtranslate_term_langcode;

		else :

			$post = get_post( $tag_id );

			echo $post->qtranslate_post_langcode;

		endif;

		die();
	}

	add_action('wp_ajax_sb_qtranslate_quick_edit', 'sb_qtranslate_quick_edit_callback');
	add_action('wp_ajax_nopriv_sb_qtranslate_quick_edit', 'sb_qtranslate_quick_edit_callback'); 

	function set_object_id_when_click_quick_edit() { ?>

    	<script type="text/javascript">

    		jQuery(document).ready(function($) {    			

    			$(document).bind('DOMNodeInserted', function(e) { 

    				var $target = $(e.target);

    				if ( 'inline-edit' == $target.attr('id') ) {

    					tag_id = $target.prev().attr('id').replace('tag-', '');

    				 	var data = {

	    						'action' : 'sb_qtranslate_quick_edit',    						
	    						'tag_id' : tag_id,
	    						'adminpage' : adminpage,
	    						'taxonomy' : '<?= isset( $_GET["taxonomy"] ) ? $_GET["taxonomy"] : "category" ?>',
	    						'post_type' : typenow
	    					};

    					$.post( ajaxurl, data )
    			     	 .done(function( object_langcode ) {

	    			     	var obj_langcode = object_langcode.trim(),   
	    			     		$obj = $('#edit-' + tag_id),
	    			     		$fieldset = $obj.find('fieldset.inline-edit-langbox'),
	    			     		$qselect = $obj.find('select.qtranslate_meta_lang'),
	    			     	  	q_langcode = $qselect.val();

	    			     	// bật ngôn ngữ tương ứng trong hộp chọn
	    			     	if ( '' != obj_langcode ) {

	    			     		$qselect.val( obj_langcode )
	    			     				.attr('disabled', 'disabled');

	    			     	}

	    			     	// cho phép chọn ngôn ngữ trong hộp chọn
	    			     	else {

	    			     		$qselect.removeAttr('disabled');

	    			     	}

	    			     	if ( $qselect.hasClass('invisible') ) {
	    			     		$qselect.removeClass('invisible');
	    			     	}    			     	

    			     	});	    			 

    				}
 
    			});    			

    		});

    	</script>


 <?php  }

 	add_action('in_admin_footer', 'set_object_id_when_click_quick_edit');

	function display_custom_quickedit_langbox( $column_name, $post_type ) {

		$languages = $_SESSION['qtranslate_languages'];

		if ( 1 === did_action( 'quick_edit_custom_box' ) ) : ?>

			<fieldset class="inline-edit-col-right inline-edit-langbox">

		     	<div class="inline-edit-col column-qtranslate-langbox">

		     		<label>

		     			<span class='title'>Ngôn ngữ</span>

		     			<span class="qtranslate-input-wrap">

		     				<img src="<?php echo QTRANSLATE_LOADING_AJAX ?>" />		     				

				     		<select class="vmiddle qtranslate_meta_lang invisible" 
				     				name="qTranslate_meta_lang">

				     			<?php foreach ( $languages as $lang ) : ?>

					     			<option value="<?php echo $lang->code ?>">

					     				<?php echo $lang->name ?>

					     			</option>

					     		<?php endforeach; ?>
				     			
				     		</select>

				     	</span>

			     	</label>

		    	</div>

		    </fieldset>

<?php
		endif;
	}	

	add_action( 'quick_edit_custom_box', 'display_custom_quickedit_langbox', 10, 2 );
?>