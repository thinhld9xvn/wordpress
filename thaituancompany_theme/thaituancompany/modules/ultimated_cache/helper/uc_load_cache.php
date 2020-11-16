<?php 
	require_once 'uc_display_cache.php';

	class UC_Load_Cache extends UC_Display_Cache {			

		public function get_cache( $cache_obj, $template = false ) {

			require_once ULTIMATED_CACHE_DIRECTORY_LIBRARIES . '/uc_system.php';
			
			$uc_system = new UC_System();
			
			$cache_block_path = $uc_system->get_cache_block_path( $cache_obj, $template );
		
			// đã cache
			if ( file_exists( $cache_block_path ) ) :

				return file_get_contents( $cache_block_path );

			endif;			

			return false;

		}

		public function load_cache( $cache_obj, $lc_template, $template = false ) { 

			$cached = $this->get_cache( $cache_obj, $template );

			if ( $cached ) :

				$this->display( $cached );

			else :

				$this->cache_start(); 

					include ( locate_template( $lc_template ) );

				$this->cache_end( $cache_obj, $template );

			endif;



		}

		public function no_cache( $lc_template ) {

			require_once 'uc_minify_cache.php';

			$uc_minify_cache = new UC_Minify_Cache();

			ob_start();		

				include ( locate_template( $lc_template ) );	

				$contents = ob_get_contents();

			ob_end_clean();

			echo $uc_minify_cache->minify( $contents );

		}

	}