<?php 
	require_once QTRANSLATE_DIRECTORY_INC . '/qTranslate_db.php';

	require_once QTRANSLATE_DIRECTORY_INC . '/helper/languages_helper.php';

	if ( ! function_exists( 'qt_the_languages') ) :

		function qt_the_languages( $args ) { 

			ob_start(); 

			$lang_helper = new LanguagesHelper();

			$languages = $_SESSION['qtranslate_languages'];	

			foreach( $languages as $lang ) : ?>

		    	<li>
		    		<a class="<?php echo $args['link_class'] . ' ' . $lang->code ?>" 
		    		   href="<?php echo "/{$lang->code}" ?>">
		    		</a>
		    	</li>

	  <?php endforeach;

			$contents = ob_get_contents();

			ob_end_clean();

			echo $contents;
		}		

	endif;

	if ( ! function_exists('qt_get_languages') ) :

		function qt_get_languages() {

			return $_SESSION['qtranslate_languages'];

		}

	endif;

	if ( ! function_exists('qt_get_current_lang') ) :

		function qt_get_current_lang() {

			return $_SESSION['qtranslate_mainsite_langcode'];

		}

	endif;
?>