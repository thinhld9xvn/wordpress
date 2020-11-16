<?php 
	class OptimizeLib {

		function CompressPngImage( $imagePath ) {        

            $image = imagecreatefrompng( $imagePath );

            imageAlphaBlending($image, true);
            imageSaveAlpha($image, true);

            imagepng( $image, $imagePath, COMPRESS_HIGHEST_PNG_LEVEL );
            imagedestroy( $image );
        }

        function CompressJpegImage( $imagePath ) {

            $image = imagecreatefromjpeg( $imagePath );          

            imagejpeg( $image, $imagePath, COMPRESS_BEST_JPEG_QUALITY );
            imagedestroy( $image );

        }
		
	}
?>