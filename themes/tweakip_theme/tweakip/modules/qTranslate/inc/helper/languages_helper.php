<?php 
	class LanguagesHelper {

		private $languages;

		public function __construct() {

			include QTRANSLATE_DIRECTORY_PACKAGES . '/languages.php';

		}

		public function get_flag_language( $locale ) {

			$languages = $this->languages;

			foreach ( $languages as $lang ) :

				if ( $locale === $lang['locale'] ) :

					return $lang['flag_base64'];

				endif;
				
			endforeach;

		}
 
		// hàm trả về ngôn ngữ mặc định trong gói ngôn ngữ đã lấy từ database
		public function get_language_default( $lang_packages ) {

			foreach ( $lang_packages as $lang ) :

				if ( 1 == $lang->ldefault ) :

					return $lang;
				
				endif;
				
			endforeach;

		}

		// hàm trả về ngôn ngữ dựa trên mã ngôn ngữ trong gói ngôn ngữ đã lấy từ database 
		public function get_language_from_langcode( $lang_packages, $code ) {

			foreach ( $lang_packages as $lang ) :

				if ( $code == $lang->code ) :

					return $lang;
				
				endif;
				
			endforeach;

		}

	}
?>