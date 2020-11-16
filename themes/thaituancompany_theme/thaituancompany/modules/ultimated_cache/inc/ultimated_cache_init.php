<?php 
	
	class Ultimated_Cache_Initialize {

		private $uc_load_cache;

		public function __construct() {

			require_once ULTIMATED_CACHE_DIRECTORY_HELPER . '/uc_load_cache.php';

			$this->uc_load_cache = new UC_Load_Cache();

		}		

		public function ultimated_cache_initialize() {

			if ( ! is_admin() ) :

				global $uc_cache;

				$uc_cache = $this->uc_load_cache;

			endif;
			
		}

	}

	$ultimated_cache_initialize = new Ultimated_Cache_Initialize();

	add_action('after_setup_theme', array( $ultimated_cache_initialize, 'ultimated_cache_initialize' ) ); ?>