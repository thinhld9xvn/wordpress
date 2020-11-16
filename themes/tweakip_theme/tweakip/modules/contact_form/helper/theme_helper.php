<?php 
	class PVCF_ThemeHelper {

		private $pvcf_theme_languages;

		public function __construct() {

			include PVCF_DIRECTORY_PACKAGES . '/mod_themes.php';		

		}

		public function translate( $key ) {

			global $theme_ui_language;

			$pvcf_theme_languages = $this->pvcf_theme_languages;	

			if ( 'vi' === $theme_ui_language ) :

				return $key;

			endif;	
			
			return $pvcf_theme_languages["$key"]["$theme_ui_language"];

		}

	}	
?>