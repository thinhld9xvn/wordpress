<?php 

    namespace Attachments;

    class AttachmentCheckPdfTypeUtils {

        public static function has($ext) {

            return in_array( $ext, ['pdf'] );

        }

    }