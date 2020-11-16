<?php 	

	$mydb = $this->mydb;	

	$current_screen = get_current_screen();

	$languages = qt_get_languages();

	qt_show_lang_all();	

	$nav_menus = get_terms( 

		array(
			'taxonomy' => 'nav_menu',
			'hide_empty' => false					
		)

	); 

	qt_reset_lang(); ?>



<div class="col-wrap">



    <div class="navtab-content">



		<h3>
			Thiết lập Menu
		</h3>



		<div id="col-left">



			<form method="post" action="<?php echo admin_url( "{$current_screen->parent_file}?page=qtranslate-settings-admin" ) ?>">



				<div class="qtranslate-groupbox">


					<table class="wp-list-table widefat fixed striped languages mtop35 w100p">



			            <thead>



			                <tr>

			                    <th>

			                        <a href="#">
			                            Menu
			                        </a>

			                    </th>



			                    <th>

			                        <a href="#">
			                            Ngôn ngữ
			                        </a>

			                    </th>                   


			                </tr>



			            </thead>



			            <tbody>

			            	<?php foreach ( $nav_menus as $nav_menu ) : ?>

				                <tr>

				                    <td>
				                        
				                        <?php echo $nav_menu->name; ?>

				                    </td>


				                    <td>
				                       
				                       <select class="qtranslate_meta_lang">

				                       		<?php foreach ( $languages as $language ) : ?>
				                       			
				                       			<option value="<?= $language->code ?>"
				                       					<?= $language->code === $nav_menu->qtranslate_term_langcode ? 'selected="selected"' : '' ?> ><?= $language->name ?></option>

				                       		<?php endforeach; ?>
				                      

				                       </select>

				                       <input type="hidden" 
				                       		  class="_qtranslate_meta_lang" 
				                       		  name="qtranslate_nav_menu_lang[<?= $nav_menu->term_id ?>]" 
				                       		  value="<?= $nav_menu->qtranslate_term_langcode ?>">

				                    </td>

				                </tr>

				           	<?php endforeach; ?>


			            </tbody>

			        </table>

			        <div class="submit">

			        	<button class="button button-primary" name="btnQNavMenusSave" type="submit">
                       	 	Cập nhật
                   		 </button>

			        </div>


				</div>

			</form>

		</div>

	</div>

</div>


<script type="text/javascript">

	jQuery(function($) {

		$(document).on('change', '.qtranslate_meta_lang', function(e) {

			$(this).next()
				   .val( $(this).val() );

		});

	})
	
</script>