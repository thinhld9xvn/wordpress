<?php 
	require_once QTRANSLATE_DIRECTORY_INC . '/qTranslate_db.php';

	require_once QTRANSLATE_DIRECTORY_INC . '/helper/languages_helper.php';

	if ( ! function_exists( 'qt_the_laptop_languages') ) :

		function qt_the_laptop_languages( $args ) { 

			ob_start(); 

			$lang_helper = new LanguagesHelper();

			$languages = $_SESSION['qtranslate_languages'];	

			$html = '';

			foreach( $languages as $lang ) : ?>

				<?php if ( $lang->code === $_SESSION['qtranslate_mainsite_langcode'] ) : ?>

		    		<li class="<?= $lang->code === $_SESSION['qtranslate_mainsite_langcode'] ? 'active' : '' ?>">

			    		<a href="<?php echo $lang_helper->get_link_target_from_current( $lang->code ); ?>">
			    		</a>

			    		<span class="bg <?php echo $args['link_class'] . ' flag-lang ' . $lang->code ?>"></span>

			    		<span class="caption"><?= $lang->code === 'vi' ? 'Vietnamese' : 'English' ?></span>

			    		<ul>

			    <?php else :

			    		$html .= sprintf('<li>' .
			    						 '	<a href="%s"></a>' .
			    						 '	<span class="bg %s"></span><span class="caption">%s</span>' .
			    						 '</li>',			    						 	
			    						    $lang_helper->get_link_target_from_current( $lang->code ),
			    						    $args['link_class'] . ' flag-lang ' . $lang->code,
			    							$lang->code === 'vi' ? 'Vietnamese' : 'English');

			    	  endif; ?>
		    	

	  <?php endforeach;

	  						if ( ! empty( $html ) ) : 

	  							echo $html;
	  							  	
	  						endif; ?>

	  					</ul>

		<?php 
			$contents = ob_get_contents();

			ob_end_clean();

			echo $contents;
		}		

	endif;

	if ( ! function_exists( 'qt_the_mobile_languages') ) :

		function qt_the_mobile_languages( $args ) { 

			ob_start(); 

			$lang_helper = new LanguagesHelper();

			$languages = $_SESSION['qtranslate_languages'];	

			foreach( $languages as $lang ) : ?>

		    	<li>

		    		<a class="<?php echo $args['link_class'] . ' flag-lang ' . $lang->code ?>" 
		    		   href="<?php echo $lang_helper->get_link_target_from_current( $lang->code ); ?>">
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

			if ( is_admin() ) :

				return isset( $_GET['qtranslate_lang'] ) ? $_GET['qtranslate_lang'] : $_SESSION['qtranslate_active_lang'];

			endif;

			return $_SESSION['qtranslate_mainsite_langcode'];			

		}

	endif;

	if ( ! function_exists('qt_set_current_lang') ) :

		function qt_set_current_lang( $langcode ) {			

			$_SESSION['qtranslate_active_lang'] = $langcode;		

			$_SESSION['qtranslate_mainsite_langcode'] = $langcode;			

		}

	endif;

	if ( ! function_exists('qt_get_langcodes') ) :

		function qt_get_langcodes() {

			$languages = $_SESSION['qtranslate_languages'];	
			$langcodes = array();

			foreach( $languages as $lang ) : 

				$langcodes[] = $lang->code;

			endforeach;

			return $langcodes;

		}

	endif;

	if ( ! function_exists('qt_get_current_locale') ) :

		function qt_get_current_locale() {

			$languages = qt_get_languages();

			$langcode = qt_get_current_lang();

			foreach ($languages as $lang) :

				if ( $lang->code === $langcode ) return $lang;
				
			endforeach;

		}

	endif;

	if ( ! function_exists('qt_get_locale_from_code') ) :

		function qt_get_locale_from_code( $langcode ) {

			$languages = qt_get_languages();		

			foreach ($languages as $lang) :

				if ( $lang->code === $langcode ) return $lang->locale;
				
			endforeach;

		}

	endif;

	if ( ! function_exists( 'qt_show_lang_all' ) ) :

		function qt_show_lang_all() {

			$_SESSION['q_current_lang'] = qt_get_current_lang();

			qt_set_current_lang('all');

		}

	endif;

	if ( ! function_exists( 'qt_reset_lang' ) ) :

		function qt_reset_lang() {

			$q_current_lang = isset( $_SESSION['q_current_lang'] ) ? $_SESSION['q_current_lang'] : qt_get_current_lang();

			qt_set_current_lang( $q_current_lang );

		}

	endif;