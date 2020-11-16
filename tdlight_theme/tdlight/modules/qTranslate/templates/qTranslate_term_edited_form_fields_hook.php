<?php 
	require_once QTRANSLATE_DIRECTORY_HELPER . '/languages_helper.php';		
	require_once QTRANSLATE_DIRECTORY_INC . '/qTranslate_db.php';	

	$lang_helper = new LanguagesHelper();		
	$mydb = new qTranslate_db();

	// this will add the custom meta field to the add new term page 

	$languages = $_SESSION['qtranslate_languages'];

	$active_lang = $lang_helper->get_language_from_langcode( $languages, $tag->qtranslate_term_langcode ); ?>

    <tr>

        <th scope="row" valign="top">

        	<label for="qtranslate_meta[primary_lang_meta]">
        		<?php _e( 'Ngôn ngữ', 'qtranslate' ); ?>
        	</label>

        </th>

        <td>

        	<img class="qtranslate_flag qtranslate_<?= $tag->qtranslate_term_langcode ?>_lang vmiddle" 
				 src="<?php echo $lang_helper->get_flag_language( $active_lang->locale )  ?>" />
			
			<select id="qtranslate_meta" 
					class="qtranslate_select_choices vmiddle mleft10" 
					name="qtranslate_meta"
					disabled="disabled">

				<?php foreach( $languages as $lang ) : ?>

					<option value="qtranslate_<?= $lang->code ?>_lang"
							<?php selected( $lang->code, $tag->qtranslate_term_langcode ) ?>>

						<?php echo $lang->name ?>

					</option>	

				<?php endforeach; ?>				

			</select>

        </td>

    </tr>

    <tr>
    	<th scope="row" valign="top">
    		<label><?php _e( 'Dịch tương ứng', 'qtranslate' ); ?></label>
    	</th>

    	<td>
    		<ul class="qtranslate-translationsbox">

				<?php foreach( $languages as $lang ) : 

						if ( $tag->qtranslate_term_langcode != $lang->code ) : 

							if ( QTRANSLATE_PRIMARY_LANGCODE == $lang->code ) :

								$t = $mydb->get_term_primary( $tag->term_id );

							else :

								$t = $mydb->get_term_foreign( $tag->term_id, $lang->code );

							endif; ?>

							<li>

								<img src="<?php echo $lang_helper->get_flag_language( $lang->locale ) ?>" 
									 class="qtranslate_<?= $lang->code ?>_lang vmiddle" />

								<input name="qtranslate_meta_translation_<?= $lang->code ?>" 
									   class="vmiddle"
									   type="text"
									   value="<?= ! is_null( $t ) ? $t->name : '' ?>" 
									   readonly="readonly" />

							</li>

				<?php 	endif;

					   endforeach; ?>
				

			</ul>
    	</td>
    </tr>