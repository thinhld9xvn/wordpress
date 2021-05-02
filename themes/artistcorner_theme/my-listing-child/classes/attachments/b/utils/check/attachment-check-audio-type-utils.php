<?php 

    namespace Attachments;

    class AttachmentCheckAudioTypeUtils {

        function has($ext) {       

            return in_array( $ext, ['avi', 'ogg', 'm4a', 'mov', 'mp3', 'mp4', 'mpg'] );
    
        }

    }