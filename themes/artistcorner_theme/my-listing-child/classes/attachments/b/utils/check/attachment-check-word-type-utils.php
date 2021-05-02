<?php 

    namespace Attachments;

    class AttachmentCheckWordTypeUtils {

        public static function has($ext) {

            return in_array( $ext, ['doc', 'docx'] );

        }

    }