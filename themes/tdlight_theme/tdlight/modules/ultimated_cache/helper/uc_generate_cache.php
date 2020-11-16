<?php 
	require_once 'uc_exist_cache.php';

	class UC_Generate_Cache extends UC_Exist_Cache {				
		
		public function cache_start() {

			ob_start();

		}

		public function cache_end( $cache_obj, $template = false ) {

			require_once ULTIMATED_CACHE_DIRECTORY_LIBRARIES . '/uc_system.php';
			require_once 'uc_minify_cache.php';						
			
			$uc_minify = new UC_Minify_Cache();
			$uc_system = new UC_System();

			$dir_base64 = $uc_system->get_cache_obj_dir( $template );
			$cache_block_path = $uc_system->get_cache_block_path( $cache_obj, $template );

			$contents = ob_get_contents();
			$contents = $uc_minify->minify( $contents );

			if ( ! file_exists( $dir_base64 ) ) :

				mkdir( $dir_base64, 0777, true );

			endif;

			file_put_contents( $cache_block_path, $contents );

			ob_end_clean();

			echo $contents;

		}		

	}
?>