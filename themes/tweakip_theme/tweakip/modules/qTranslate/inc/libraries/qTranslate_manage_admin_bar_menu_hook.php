<?php 
	
	class QTranslate_Menu {		

		private $languages;
		private $lang_helper;		


		public function __construct() {						

			include QTRANSLATE_DIRECTORY_PACKAGES . '/languages.php';

    		require_once QTRANSLATE_DIRECTORY_HELPER . '/languages_helper.php';
			
			$this->lang_helper = new LanguagesHelper();
		}

		public function qTranslate_add_menu_to_admin_bar( $wp_admin_bar ) {

			$lang_packages = $_SESSION['qtranslate_languages'];

			if ( $lang_packages ) :

				$active_lang = $_SESSION['qtranslate_active_lang'];
			
				$request_uri = $_SERVER['REQUEST_URI'];

				if ( false == strpos( $request_uri, '?' ) ) :

					$request_uri .= '?';

				else:

					$request_uri .= '&';

				endif;

				$request_uri .= 'qtranslate_lang';

				$languages = $this->languages;
				
				$lang_helper = $this->lang_helper;

				if ( ! isset( $active_lang ) ) :

					$lang_default = $lang_helper->get_language_default( $lang_packages );

				else :

					$lang_default = $lang_helper->get_language_from_langcode( $lang_packages, $active_lang );					

					$args = array(
						"id" => "qtranslate-menu",
						"title" => "<img style='vertical-align:middle' src='{$lang_helper->get_flag_language( $lang_default->locale )}' />
								    <span style='vertical-align:middle; margin-left: 5px'>$lang_default->name</span>"			
					);		

					$wp_admin_bar->add_menu( $args );					

					foreach ( $lang_packages as $lang ) :

						if ( $lang_default->name != $lang->name ) :

							// thêm menu con
							$args = array(
								"id"     => "qtranslate-{$lang->code}-lang-menu",
								"title"  => "<img style='vertical-align:middle' src='{$lang_helper->get_flag_language( $lang->locale )}' />
											 <span style='vertical-align:middle; margin-left: 5px'>$lang->name</span>",
								"href"   => "{$request_uri}={$lang->code}",
								"parent" => "qtranslate-menu"
							);
							$wp_admin_bar->add_node( $args );

						endif;

					endforeach;	

				endif;				

			endif;

		}		

	}

	$qt_menu = new QTranslate_Menu();

	add_action( 'admin_bar_menu', array( $qt_menu, 'qTranslate_add_menu_to_admin_bar'), 1000 );
?>