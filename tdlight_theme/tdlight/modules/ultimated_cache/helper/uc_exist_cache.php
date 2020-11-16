<?php 
	class UC_Exist_Cache {

		// kiểm tra trang hiện tại đã tồn tại cache hay chưa ?
		public function has_cached() {

			require_once ULTIMATED_CACHE_DIRECTORY_LIBRARIES . '/uc_encrypt.php';
			require_once ULTIMATED_CACHE_DIRECTORY_LIBRARIES . '/uc_system.php';

			$uc_encrypt = new UC_Encrypt();
			$uc_system = new UC_System();

			$template_dir_base64 = ULTIMATED_CACHE_DIRECTORY . '/' . $uc_encrypt->generate_template_base64();

			if ( file_exists( $template_dir_base64 ) ) :

				if ( ! $uc_system->is_empty_dir( $template_dir_base64 ) ) :

					return true;

				endif;

			endif;			

			return false;

		}

	}
?>