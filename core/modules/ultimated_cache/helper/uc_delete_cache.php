<?php 
	class UC_Delete_Cache {		

		private function deleteDir($dirPath) {

		    if ( ! is_dir( $dirPath ) ) :

		        if ( file_exists($dirPath) !== false ) :

		            unlink($dirPath);

		        endif;

		        return;

		    endif;

		    if ( $dirPath[ strlen($dirPath) - 1 ] != '/' ) :

		        $dirPath .= '/';

		    endif;

		    $files = glob($dirPath . '*', GLOB_MARK);

		    foreach ($files as $file) :

		        if ( is_dir($file) ) :

		            $this->deleteDir($file);		        

		        else :

		            unlink($file);

		        endif;

		    endforeach;

		    rmdir( $dirPath );
		}

		public function delete_cache() {

			if ( file_exists( ULTIMATED_CACHE_DIRECTORY ) ) :

				$this->deleteDir( ULTIMATED_CACHE_DIRECTORY );
				mkdir( ULTIMATED_CACHE_DIRECTORY );

			endif;

		}

	}
?>