<?php 
	class QT_ThemeHelper {

		private $qt_theme_languages;

		public function __construct() {

			include QTRANSLATE_DIRECTORY_PACKAGES . '/mod_themes.php';

		}

		public function translate( $key ) {

			global $theme_ui_language;

			$qt_theme_languages = $this->qt_theme_languages;
			
			include get_template_directory() . '/options/config.php';

			if ( 'vi' === $theme_ui_language ) :

				return $key;

			endif;			
			
			return $qt_theme_languages["$key"]["$theme_ui_language"];			

		}

	}	
?>