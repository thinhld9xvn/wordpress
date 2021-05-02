<?php 

    namespace Attachments;

    class AttachmentCheckExcelTypeUtils {

        public static function has($ext) {

            return in_array( $ext, ['xls', 'xlsx'] );

        }

    }