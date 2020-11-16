<?php 
	class Ultimated_Cache_Event {

		private $uc_delete_cache_helper;

		public function __construct() {

			require_once ULTIMATED_CACHE_DIRECTORY_HELPER . '/uc_delete_cache.php';

			$this->uc_delete_cache_helper = new UC_Delete_Cache();
			
			$this->uc_event_listen();

		}

		public function uc_event_listen() {

			$uc_delete_cache_helper = $this->uc_delete_cache_helper;

			$action = $_GET['uc_action'];

			switch ( $action ) :

				case 'delete_cache':

					$uc_delete_cache_helper->delete_cache();
					
					break;

			endswitch;

		}

	}	

	$ultimated_cache_event = new Ultimated_Cache_Event();	
?>