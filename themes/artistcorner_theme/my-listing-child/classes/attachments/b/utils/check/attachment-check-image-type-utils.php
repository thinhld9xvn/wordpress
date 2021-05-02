<?php 

    namespace Attachments;

    class AttachmentCheckImageTypeUtils {

        public static function has($ext) {

            return in_array( $ext, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'] );
    
        }

    }