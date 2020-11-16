<?php
	class UC_System {

		private $uc_encrypt;

		public function __construct() {

			require_once ULTIMATED_CACHE_DIRECTORY_LIBRARIES . '/uc_encrypt.php';
			$this->uc_encrypt = new UC_Encrypt();

		}

		public function is_empty_dir( $dirPath ) {			

			$destdir = $dirPath;

			$handle = opendir($destdir);

			$c = 0;

			while ( $file = readdir($handle) && $c < 3 ) :

			    $c++;

			endwhile;

			if ( $c > 2 ) :

			    return false;

			endif;

			return true;

		}

		public function get_cache_obj_dir( $template ) {

			$uc_encrypt = $this->uc_encrypt;
			$dir_base64 = "";		

			if ( ! $template ) :

				$dir_base64 = ULTIMATED_CACHE_DIRECTORY . "/" . $uc_encrypt->generate_uri_base64( $_SERVER['REQUEST_URI'] );

			else :

				$dir_base64 = ULTIMATED_CACHE_DIRECTORY . "/" . $uc_encrypt->generate_template_base64();

			endif;

			return $dir_base64;

		}

		public function get_cache_block_path( $cache_obj, $template ) {

			$dir_base64 = $this->get_cache_obj_dir( $template );
			$uc_cache_block_name = base64_encode( "block_{$cache_obj}" );

			return $dir_base64 . "/{$uc_cache_block_name}.php";

		}

	}
?>