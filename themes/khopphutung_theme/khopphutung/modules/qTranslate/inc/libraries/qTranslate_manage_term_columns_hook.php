<?php

	//require_once 'qTranslate_manage_quick_edit_hook.php'; 	

	// hook chỉnh sửa các column của mục terms : thêm, sửa, xóa các column
	/*function manage_my_terms_columns($columns) {

		require_once QTRANSLATE_DIRECTORY_HELPER . '/languages_helper.php';
		$lang_helper = new LanguagesHelper();

		// this will add the custom meta field to the add new term page 

		$languages = $_SESSION['qtranslate_languages']; 
		$active_langcode = $_SESSION['qtranslate_active_lang'];		

		$index = 0;	
		$found = false;

		$new_columns = array();

		foreach ($columns as $key => $title) :

			if ( 'posts' === $key ) :

				$found = true;

				break;				

			endif;		

			$index++;		
			
		endforeach;

		if ( $found ) :
			
			foreach( $languages as $lang ) :
			

				if ( $active_langcode != $lang->code ) :

					$new_columns["qtranslate_cat_$lang->code"] = "<img src='{$lang_helper->get_flag_language( $lang->locale )}' />";

				endif;


			endforeach;		

			$columns = array_merge( 
									array_splice( $columns, 0, $index ), 
									$new_columns, 
									array_splice( $columns, 0 ) 
								  );

		endif;		

     	return $columns;
     
    }*/  

    // hook chèn dữ liệu vào các column của mục terms
    /*function manage_terms_custom_fields( $deprecated, $column_name, $term_id) {

    	require_once QTRANSLATE_DIRECTORY_INC . '/qTranslate_db.php';

    	$mydb = new qTranslate_db();
   	
   		$languages = $_SESSION['qtranslate_languages'];
    	$active_langcode = $_SESSION['qtranslate_active_lang'];  

    	$taxonomy = $_GET['taxonomy'];
    	$post_type = $_GET['post_type'];

    	if ( ! isset( $post_type) ) :

    		$post_type = 'post';

    	endif;

    	$term = get_term_by( 'id', $term_id, $taxonomy );    	

    	foreach ( $languages as $lang ) :

		 	if ( "qtranslate_cat_{$lang->code}" === $column_name ) :

		 		// đang duyệt chính nó
		 		if ( $term->qtranslate_term_langcode == $lang->code ):		 		

		 			echo "<a title='$term->name'>
		   					<span class='dashicons dashicons-yes'>
		   			  		</span>
		   			  	  </a>";		   	

		 		else :

		 			$term_foreign = $mydb->get_term_foreign( $term_id, $lang->code );

		 			if ( ! is_null( $term_foreign ) ) :

		 				$url = "term.php?taxonomy=$taxonomy&post_type=$post_type&tag_ID=$term_foreign->term_id";
			 			$admin_url = admin_url( $url );

			 			echo "<a href='$admin_url' title='$term_foreign->name'>
		   						<span class='dashicons dashicons-edit'>
		   			  			</span>
		   			  	  	  </a>";

		 			else :

		 				$term_primary = $mydb->get_term_primary( $term_id );
		 				
		 				if ( ! is_null( $term_primary ) ) :

		 					$url = "term.php?taxonomy=$taxonomy&post_type=$post_type&tag_ID=$term_primary->term_id";
			 				$admin_url = admin_url( $url );

				 			echo "<a href='$admin_url' title='$term_primary->name'>
			   						<span class='dashicons dashicons-edit'>
			   			  			</span>
			   			  	  	  </a>";

		 				else :

		 					$term = get_term_by( 'id', $term_id, $taxonomy );

				 			$url = "edit-tags.php?taxonomy=$taxonomy&post_type=$post_type&qtranslate_term_id=$term_id&qtranslate_new_lang=$lang->code";
					 		$admin_url = admin_url( $url );

					   		echo "<a href='$admin_url' title='$term->name'>
					   				<span class='dashicons dashicons-plus'>
					   			  	</span>
					   			  </a>";

					   	endif;

				   	endif;

			   	endif;

		 	endif;

		endforeach; 
			
	}*/

	// hook chỉnh sửa các bài viết của custom post type : thêm, sửa, xóa các column
	/*function manage_my_post_type_columns($columns) {		

		require_once QTRANSLATE_DIRECTORY_HELPER . '/languages_helper.php';
		$lang_helper = new LanguagesHelper();

		// this will add the custom meta field to the add new term page
		$languages = $_SESSION['qtranslate_languages']; 
		$active_langcode = $_SESSION['qtranslate_active_lang'];		

		$index = 1;	
		$found = false;

		$new_columns = array();

		foreach ($columns as $key => $title) :

			if ( 'post' != $post_type ) :

				if ( 'title' === $key ) :

					$found = true;

					break;				

				endif;

			endif;			

			$index++;		
			
		endforeach;

		if ( $found ) :
			
			foreach( $languages as $lang ) :

				if ( 'all' == $active_langcode ):

					$new_columns["qtranslate_cat_$lang->code"] = "<img src='{$lang_helper->get_flag_language( $lang->locale )}' />";

				else :

					if ( $active_langcode != $lang->code ) :

						$new_columns["qtranslate_cat_$lang->code"] = "<img src='{$lang_helper->get_flag_language( $lang->locale )}' />";

					endif;

				endif;

			endforeach;		

			$columns = array_merge( 
									array_splice( $columns, 0, $index ), 
									$new_columns, 
									array_splice( $columns, 0 ) 
								  );

		endif;		

     	return $columns;

	}*/

	// hook chèn dữ liệu vào các column bài viết của custom post type
	/*function manage_post_type_custom_fields( $column_name, $post_id ) {

		require_once QTRANSLATE_DIRECTORY_INC . '/qTranslate_db.php';

    	$mydb = new qTranslate_db();
   	
   		$languages = $_SESSION['qtranslate_languages'];
    	$active_langcode = $_SESSION['qtranslate_active_lang']; 
    	
    	$post_type = $_GET['post_type'];

    	if ( ! isset( $post_type) ) :

    		$post_type = 'post';

    	endif;

    	$post = get_post( $post_id );    	

    	foreach ( $languages as $lang ) :

		 	if ( "qtranslate_cat_{$lang->code}" === $column_name ) :

		 		// đang duyệt chính nó
		 		if ( $post->qtranslate_post_langcode == $lang->code ):		 		

		 			echo "<a title='$post->post_title'>
		   					<span class='dashicons dashicons-yes'>
		   			  		</span>
		   			  	  </a>";		   	

		 		else :

		 			$post_foreign = $mydb->get_post_foreign( $post_id, $lang->code );

		 			if ( ! is_null( $post_foreign ) ) :

		 				$url = "post.php?post=$post_foreign->id&action=edit";
			 			$admin_url = admin_url( $url );

			 			echo "<a href='$admin_url' title='$post_foreign->post_title'>
		   						<span class='dashicons dashicons-edit'>
		   			  			</span>
		   			  	  	  </a>";

		 			else :

		 				$post_primary = $mydb->get_post_primary( $post_id );
		 				
		 				if ( ! is_null( $post_primary ) ) :

		 					$url = "post.php?post=$post_primary->id&action=edit";
			 				$admin_url = admin_url( $url );

				 			echo "<a href='$admin_url' title='$post_primary->post_title'>
			   						<span class='dashicons dashicons-edit'>
			   			  			</span>
			   			  	  	  </a>";

		 				else :

		 					$post = get_post( $post_id );

				 			$url = "post-new.php?post_type=$post_type&qtranslate_post_id=$post_id&qtranslate_new_lang=$lang->code";
					 		$admin_url = admin_url( $url );

					   		echo "<a href='$admin_url' title='$post->post_title'>
					   				<span class='dashicons dashicons-plus'>
					   			  	</span>
					   			  </a>";

					   	endif;

				   	endif;

			   	endif;

		 	endif;

		endforeach; 
			

	}*/
    
    /*function update_row_after_quick_edit () {  ?>    

    	<script type="text/javascript">
    		jQuery(document).ready(function($) {

    			var tag_id = 0,
    				$_tag_row = null;

    			$('.editinline').click(function(e) {

    				tag_id = $(this).closest('tr').attr('id');
    				$_tag_row = $('#' + tag_id);

    			});

    			$(document).ajaxSuccess( function( event, xhr, settings) {

    				var $tag_row = $('#' + tag_id);

    				$_tag_row.find('td.column-name').html( $tag_row.find('td.column-name').html() );
    				$_tag_row.find('td.column-slug').html( $tag_row.find('td.column-slug').html() );

    				$tag_row.html( $_tag_row.html() );

    				
    			});    			

    		});
    	</script>


 <?php  }

 	add_action('in_admin_footer', 'update_row_after_quick_edit');*/


 	/*$request_uri = $_SERVER['REQUEST_URI'];

	if ( false !== strpos( $request_uri, 'edit-tags.php' ) ||
		 false !== strpos( $request_uri, 'edit.php' ) ) :

		if ( false !== strpos( $request_uri, 'edit-tags.php' ) ) :
			
			$taxonomy = $_GET['taxonomy'];

			add_filter("manage_edit-{$taxonomy}_columns", "manage_my_terms_columns");
			add_filter ("manage_{$taxonomy}_custom_column", "manage_terms_custom_fields", 10, 3);			
			

		elseif ( false !== strpos( $request_uri, 'edit.php' ) ) :

			$post_type = $_GET['post_type'];

			if ( ! isset( $post_type ) ) :			

				$post_type = 'post';

			endif;

			add_filter("manage_{$post_type}_posts_columns", "manage_my_post_type_columns");															

			add_filter("manage_{$post_type}_posts_custom_column", "manage_post_type_custom_fields", 10, 3);

		endif;

	endif;*/
	
?>