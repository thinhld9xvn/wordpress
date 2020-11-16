<?php 

	require_once QTRANSLATE_DIRECTORY_INC . '/qTranslate_db.php';
	require_once QTRANSLATE_DIRECTORY_INC . '/helper/languages_helper.php';

	if ( ! function_exists( 'qt_the_languages') ) :

		function qt_the_languages() { 

			ob_start(); 

			$lang_helper = new LanguagesHelper();

			$languages = $_SESSION['qtranslate_languages'];			

			foreach( $languages as $lang ) : ?>

		    	<li>
		    		<a href="<?php echo "/{$lang->code}" ?>">
		    			<img src="<?php echo $lang_helper->get_flag_language( $lang->locale ) ?>" 
		    				 alt="<?php echo "qflag-$lang->code" ?>" />
		    		</a>
		    	</li>	

	  <?php endforeach; 

			$contents = ob_get_contents();
			ob_end_clean();

			echo $contents;

		}		

	endif;

	if ( ! function_exists('qt_get_current_lang') ) :

		function qt_get_current_lang() {
			return $_SESSION['qtranslate_mainsite_langcode'];
		}

	endif;
?>