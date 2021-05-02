<?php 

    namespace Attachments;

    class AttachmentGetFontAwesomeIconUtils {

        public static function get($ext) {

            if ( is_attachment_image_type($ext) ) :
    
                return 'fa fa-image';
    
            endif;
    
            if ( is_attachment_word_type($ext) ) :
    
                return 'fa fa-file-word';
            
            endif;
    
            if ( is_attachment_excel_type($ext) ) :
    
                return 'fa fa-file-excel';
            
            endif;
    
            if ( is_attachment_pdf_type($ext) ) :
    
                return 'fa fa-file-pdf';
            
            endif;
    
            if ( is_attachment_audio_type($ext) ) :
    
                return 'fa fa-file-audio';
            
            endif;
    
            return 'fa fa-file';
    
        }

    }