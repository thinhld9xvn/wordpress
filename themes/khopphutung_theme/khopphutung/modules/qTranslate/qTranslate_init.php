<?php

	// class khởi tạo các giá trị  	
	class qTranslateInitialize {

		private $mydb;
		private $lang_helper;

		public function __construct() {

			require_once 'inc/qTranslate_db.php';
			require_once 'inc/helper/languages_helper.php';

			$this->mydb = new qTranslate_db();		

			$this->init_generated_languages();

			if ( is_admin() ) :

				$this->lang_helper = new LanguagesHelper();
				$this->init_actived_language();
				
			endif;

		}

		function init_generated_languages() {

			$mydb = $this->mydb;

			$_SESSION['qtranslate_languages'] = $mydb->get_all_languages();

		}

		function init_actived_language() {

			if ( ! isset( $_SESSION['qtranslate_active_lang'] ) ) :

	    		$mydb = $this->mydb;

	    		$lang = $mydb->get_default_language();

	    		if ( $lang ) :

	    			$_SESSION['qtranslate_active_lang'] = $lang->code;	    		

	    		endif;

	    	endif;

		}		

	}

?>