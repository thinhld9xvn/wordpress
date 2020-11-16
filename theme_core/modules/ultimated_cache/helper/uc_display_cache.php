<?php 
	
	require_once 'uc_generate_cache.php';

	class UC_Display_Cache extends UC_Generate_Cache {		

		public function display( $cached ) {

			echo $cached;
			
		}

	}
?>