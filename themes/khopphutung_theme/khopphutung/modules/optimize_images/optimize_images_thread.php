<?php 
    class OptimizeImagesThread {

        protected $optimize_utils;

        public function __construct() {
            $this->optimize_utils = new OptimizeLib();
        }        

        function optimize() {

            $template_dir = get_template_directory();
            $template_dir_name = array_pop( explode( '/', $template_dir ) );

            $listDirPaths = array(
                $_SERVER['DOCUMENT_ROOT'] . '/wp-content/uploads',
                $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/' . $template_dir_name . '/images',
            );

            // chỉ duyệt những cây thư mục được chỉ định ở trên
            foreach ( $listDirPaths as $path ) :

                $this->scanRootDir( $path );

            endforeach;

            return true;

        }

        function ProcessListPaths( $listPaths ) {

            while ( sizeof ( $listPaths ) > 0 ) :

                $path = array_pop( $listPaths );

                // nếu path là file => xử lý file đang duyệt
                if ( is_file( $path ) && is_readable( $path ) ) :

                    $this->ProcessFile( $path );

               // nếu path là folder => xử lý folder đang duyệt
                else :

                    if ( is_dir( $path ) && is_readable( $path ) ) :                    

                        $this->ProcessSubDir( $path );

                    endif;

                endif;

            endwhile;       

        }       

        function ProcessFile( $filePath ) {

            $utils = $this->optimize_utils;

            $fileinfo = pathinfo( $filePath );
            $ext = $fileinfo['extension'];

            if ( 'jpg' === $ext ||
                 'png' === $ext ) :                

                switch ( $ext ) :

                    case 'jpg':

                        $utils->CompressJpegImage( $filePath );                    
                        break;

                    case 'png' :

                        $utils->CompressPngImage( $filePath );
                        break;
                    
                    default:                    
                        break;

                endswitch;         

            endif;

        }

        function ProcessSubDir( $dirPath ) {

            $this->scanRootDir( $dirPath );

        }

        function scanRootDir( $rootDir, $listPaths = array() ) {

            // set filenames exclude if you want
            $exclude_files = array(".", "..", ".htaccess", ".htpasswd");       

            // run through content of root directory
            $dirContent = scandir($rootDir);

            foreach ( $dirContent as $key => $content ) :

                // filter all files not accessible
                $path = $rootDir . '/' . $content;

                if ( ! in_array( $content, $exclude_files ) ) :                

                    array_push( $listPaths, $path );

                endif;        

            endforeach;

            // process all list paths
            $this->ProcessListPaths( $listPaths ); 
           
        }

    }   
?>