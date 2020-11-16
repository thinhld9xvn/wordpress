<?php

	function sb_qtranslate_quick_edit_callback() {

		global $q_db;

		require_once QTRANSLATE_DIRECTORY_INC . '/qTranslate_db.php';

		$cmd = $_POST['cmd'];

		$params = $_POST['params'];

		$post_type = $params['post_type'];

		$taxonomy = $params['taxonomy'];

		if ( isset( $params['id'] ) ) :

			$id = (int) $params['id'];	

		else :

			$id = 0;	

		endif;

		switch ( $cmd ) :

			case 'q_get_items_list':

				global $wpdb;

				$langcode = $params['langcode'] === 'vi' ? 'en' : 'vi';

				if ( isset( $post_type ) ) :

					$tbl_items = $wpdb->prefix . 'posts';

					$results = $wpdb->get_results(
						"
							SELECT id, post_title FROM {$tbl_items} WHERE post_type = '{$post_type}' AND qtranslate_post_langcode = '{$langcode}' AND post_status = 'publish' AND id NOT IN ({$id})
						"
					);

				else :

					if ( isset( $taxonomy ) ) :

						$tbl_terms = $wpdb->prefix . 'terms';
						$tbl_term_taxonomy = $wpdb->prefix . 'term_taxonomy';						

						$results = $wpdb->get_results(
						"
							SELECT {$tbl_terms}.term_id, name 

							FROM 
								{$tbl_terms} 

							LEFT JOIN
								{$tbl_term_taxonomy}

							ON
								{$tbl_terms}.term_id = {$tbl_term_taxonomy}.term_id

							WHERE {$tbl_terms}.qtranslate_term_langcode = '{$langcode}' AND 

								  {$tbl_term_taxonomy}.taxonomy = '{$taxonomy}' AND 

								  {$tbl_terms}.term_id NOT IN ({$id})

						"
					);

					endif;

				endif;

				header("Content-Type: application/json; charset=UTF-8");

				echo json_encode( $results );

				die();
				
				break;
			
			default:

				$langcode = $params['langcode'];				

				if ( $langcode === 'vi' ) :

					if ( isset( $post_type ) ) :			

						$t_object = $q_db->get_post_foreign( $id, 'en', $post_type );

					else :

						if ( isset( $taxonomy) ) :

							$t_object = $q_db->get_term_foreign( $id, 'en', $taxonomy );

						endif;

					endif;

				else :

					if ( isset( $post_type ) ) :

						$t_object = get_post( $id );

						if ( (int) $t_object->qtranslate_post_id_primary !== 0 ) :

							$t_object = get_post( $t_object->qtranslate_post_id_primary );

						else :

							$t_object = null;

						endif;

					else :

						if ( isset( $taxonomy) ) :

							$t_object = get_term_by( 'id', $id, $taxonomy );

							if ( (int) $t_object->qtranslate_term_id_primary !== 0 ) :

								$t_object = get_term_by( 'id', $t_object->qtranslate_term_id_primary, $taxonomy );

							else :

								$t_object = null;

							endif;

						endif;

					endif;				

				endif;

				header('Content-type:application/json;charset: UTF-8');

				echo json_encode( $t_object );

				die();
				
				break;

		endswitch;

		
	}

	add_action('wp_ajax_sb_qtranslate_quick_edit', 'sb_qtranslate_quick_edit_callback');
	add_action('wp_ajax_nopriv_sb_qtranslate_quick_edit', 'sb_qtranslate_quick_edit_callback'); 

	function set_object_id_when_click_quick_edit() { 

		$request_uri = $_SERVER['REQUEST_URI']; 

		if ( false === strpos('term.php', $request_uri) || false === strpos('post.php', $request_uri) ) : ?>

			<style type="text/css">
				.q-loadingicon img {
				    animation: q-loading-animation infinite linear 2s;
				    position: relative;
				    display: block;
				}

				@keyframes q-loading-animation {
				  from { 
				  	transform: rotate(0deg);
				  	-webkit-transform: rotate(0deg);
				  }
				  to { 
				  	transform: rotate(360deg); 
				  	-webkit-transform: rotate(360deg);
				  }
				}

				@-webkit-keyframes q-loading-animation {
				  from { 
				  	transform: rotate(0deg);
				  	-webkit-transform: rotate(0deg);
				  }
				  to { 
				  	transform: rotate(360deg); 
				  	-webkit-transform: rotate(360deg);
				  }
				}
			</style>

	    	<script type="text/javascript">

	    		var qtranslate_active_langcode = '<?php echo $_SESSION['qtranslate_active_lang'] ?>';

	    		function q_get_loadingicon() {

					return '<div class="q-loadingicon">' +
		     			   '	<img src="<?= QTRANSLATE_LOADING_AJAX ?>" alt="loading" />' +
		     			   '</div>';

				}

	    		jQuery(document).ready(function($) {  

	    			function _get_typenow() {

	    				return pagenow.substr(5);

	    			}

		    		function get_obj_tr( id ) {

		    			return $('#edit-' + id);

		    		} 			

	    			$(document).on('change', '.qtranslate_meta_lang', function(e) {

	    				let val = $(this).val(),
	    					id = parseInt( q_get_item_id( $(this) ) ),
	    					$input = $(this).next('.qtranslate_langcode');

	    				$input.val( val );

	    				q_get_initialize( id, val );


	    			});

	    			$(document).on('change', '.qtranslate_items_list', function(e) {

	    				let val = $(this).val(),    					
	    					$input = $(this).next('.qtranslate_mapping_item');
	    				
	    				$input.val( val );

	    			});

	    			$(document).on('click', '.button-link.editinline', function(e) {

	    				let id = q_get_item_id( $(this) ),

	    					t = setInterval(function() {

			    				let	$obj_tr = get_obj_tr( id );		    				

			    				if ( $obj_tr.length > 0 ) {

			    					clearInterval( t );
			    					
			    					q_get_initialize( id, qtranslate_active_langcode, $obj_tr );

			    				}

		    				}, 200);


	    			});

	    			function q_get_initialize( id, langcode, $obj_tr ) {    				

						if ( typeof( $obj_tr ) === 'undefined' ) {

							$obj_tr = get_obj_tr( id );

						}

	    				let $q_mapping_wrap = $obj_tr.find('.q-mapping-items-list');

	    				$q_mapping_wrap.html( q_get_loadingicon() );

	    				q_get_items_list( id, langcode ).then(function( items_list ) {

							q_get_map_item( id ).then(function( item_obj ) {

	    						let e_id = -1;

	    						$q_mapping_wrap.html('<select class="vmiddle qtranslate_items_list"></select>' +
				     								 '<input type="hidden" class="qtranslate_mapping_item" name="qtranslate_mapping_item" value="">' +

				     								 '<input type="hidden" class="_qtranslate_mapping_item" name="_qtranslate_mapping_item" value="">');

		    					let	$q_items_list = $q_mapping_wrap.find('.qtranslate_items_list'),
		    						$q_mapping_item = $q_items_list.next('.qtranslate_mapping_item'),

		    						$_q_mapping_item = $q_items_list.nextAll('._qtranslate_mapping_item');
		    					
	    						$q_items_list.append("<option value='-1' " + ( item_obj === null ? "selected='selected'" : "" ) + ">Chưa liên kết</option>");

	    						if ( item_obj !== null ) {

	    							e_id = parseInt( _get_typenow() === typenow ? item_obj['ID'] : item_obj['term_id'] );		    							

	    						}

	    						//console.log( $_q_mapping_item );

	    						$_q_mapping_item.val( e_id );
	    						$q_mapping_item.val( e_id );

		    					$.each(items_list, function(i, e) {

		    						q_add_item_to_list( $q_items_list, e, e_id );

		    					});	

			    				

		    				});

	    					
	    				});

	    			}

	    			function q_add_item_to_list( $q_items_list, elem, _id ) {

	    				if ( _get_typenow() === typenow ) {

	    					$q_items_list.append("<option value='" + elem.id + "' " + ( _id !== -1 && _id === parseInt( elem.id ) ? "selected='selected'" : "" ) + " >" + elem.post_title + "</option>");    					

	    				}

	    				else {

	    					$q_items_list.append("<option value='" + elem.term_id + "' " + ( _id !== -1 && _id === parseInt( elem.term_id ) ? "selected='selected'" : "" ) + " >" + elem.name + "</option>");

	    				}

	    			}

	    			function q_get_items_list( id, langcode ) {

	    				let params = {	

	    								langcode : langcode,
										id : id

									},
							_typenow = _taxonomy = _get_typenow();

						if ( _typenow === typenow ) {

							params.post_type = typenow;

						}

						else {

							params.taxonomy = _taxonomy;

						}

	    				return $.ajax({

							method : 'POST',
							url : ajaxurl,
							async : true,
							data : {

								action : 'sb_qtranslate_quick_edit',
								cmd : 'q_get_items_list',
								params : params

							}


						});

	    			}

	    			function q_get_map_item( id ) {

	    				let params = {

									id : id,
									langcode : qtranslate_active_langcode

								},

							_taxonomy = _get_typenow();

						if ( _taxonomy !== typenow ) {

							params.taxonomy = _taxonomy;

						}

						else {

							params.post_type = typenow;

						}


	    				return $.ajax({

							method : 'POST',
							url : ajaxurl,
							async : true,
							data : {

								action : 'sb_qtranslate_quick_edit',
								cmd : 'q_get_map_item',

								params : params

							}


						});


	    			}

	    			function q_get_item_id( $obj ) {

	    				let $tr = $obj.closest('tr'),
	    					id = $tr.attr('id'); 

	    				return _get_typenow() === typenow ? id.substr(5) : id.substr(4);

	    			}

	    			function q_getValue( key, data ) {

	    				let _key = key + '=',
	    					pos_b = data.indexOf( _key ) + _key.length,
	    					pos_e = data.indexOf( '&', pos_b );

	    				return data.substr( pos_b, pos_e - pos_b );

	    			}    			

	    			$(document).ajaxComplete(function(event, xhr, settings) {

	    				let data = settings.data,
	    					action = q_getValue( 'action', data );   

	    				//console.log( action ); 				

	    				if ( typeof( action ) !== 'undefined' && action.indexOf('inline-save') === 0 ) { 

	    					let langcode = q_getValue( 'qtranslate_langcode', data ),
	    						q_mapping_item = q_getValue( 'qtranslate_mapping_item', data ),
	    						_q_mapping_item = q_getValue( '_qtranslate_mapping_item', data );

						    if ( langcode !== qtranslate_active_langcode ) {

						    	window.location.reload();

						    }

						    if ( q_mapping_item !== _q_mapping_item ) {

						    	window.location.reload();

						    }

						}

					    //console.log( settings );


					});

				});

	    	</script>


 <?php  endif; }

 	add_action('in_admin_footer', 'set_object_id_when_click_quick_edit');

	function display_custom_quickedit_langbox( $column_name, $post_type ) {		

		$languages = $_SESSION['qtranslate_languages'];
		$active_langcode = $_SESSION['qtranslate_active_lang'];		

		if ( 1 === did_action( 'quick_edit_custom_box' ) ) : ?>

			<fieldset class="inline-edit-col-right inline-edit-langbox">

		     	<div class="inline-edit-col column-qtranslate-langbox">

		     		<label>

		     			<span class='title'>Ngôn ngữ</span>

		     			<span class="qtranslate-input-wrap">		     				

				     		<select class="vmiddle qtranslate_meta_lang" 
				     				name="qTranslate_meta_lang">

				     			<?php foreach ( $languages as $lang ) : ?>

					     			<option value="<?php echo $lang->code ?>"
					     					<?= $lang->code === $active_langcode ? "selected='selected'" : "" ?>>

					     				<?php echo $lang->name ?>

					     			</option>

					     		<?php endforeach; ?>
				     			
				     		</select>

				     		<input type="hidden" class="qtranslate_langcode" name="qtranslate_langcode" value="<?php echo $active_langcode ?>">

				     	</span>

			     	</label>

			     	<label>

		     			<span class='title'>Mục liên kết</span>

		     			<span class="qtranslate-input-wrap q-mapping-items-list">

				     	</span>

			     	</label>

		    	</div>

		    </fieldset>

<?php
		endif;
	}	

	add_action( 'quick_edit_custom_box', 'display_custom_quickedit_langbox', 10, 2 );