<?php 

    namespace Attachments;

    class AttachmentGetMaxUploadSizeUtils {

        public static function get() {

            return wp_max_upload_size() / (1024 * 1024);

        }

    }