<?php

	// class khởi tạo các giá trị  	
	class qTranslateInitialize {
		
		private $lang_helper;

		public function __construct() {
			
			require_once 'inc/helper/languages_helper.php';

			$this->init_generated_languages();

			if ( is_admin() ) :

				$this->lang_helper = new LanguagesHelper();
				$this->init_actived_language();
				
			endif;			

		}		

		function init_generated_languages() {

			global $q_db;			

			$_SESSION['qtranslate_languages'] = $q_db->get_all_languages();

		}

		function init_actived_language() {

			global $q_db;

			if ( ! isset( $_SESSION['qtranslate_active_lang'] ) ) :	    	

	    		$lang = $q_db->get_default_language();

	    		if ( $lang ) :

	    			$_SESSION['qtranslate_active_lang'] = $lang->code;	    		

	    		endif;

	    	endif;

		}		

	}