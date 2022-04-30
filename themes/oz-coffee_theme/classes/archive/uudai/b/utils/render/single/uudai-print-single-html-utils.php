<?php 

    namespace Archive\UuDai\Single;
 
    class UDPrintSingleHtmlUtils {
        
        public static function render() {
            
            global $post; ?>
            
            <div id="page-main-elements" class="page-main-elements page-uudai-child-elements page-jnewscambridge-elements page-main-builders">
                <div class="page-uudai-contents page-uudai-child-contents">
                    
                    <div class="container">

                       <?php UDPrintHeadingHtmlUtils::render($post) ?>

                        <?php UDPrintMetaDataHtmlUtils::render($post) ?>

                        <?php UDPrintPageContentHtmlUtils::render($post) ?>

                        <?php UDPrintFacebookCommentsUtils::render($post) ?>

                        <?php UDPrintRelatedBoxHtmlUtils::render($post) ?>

                    </div>
                        
                </div>

            </div>
            
        <?php }

        

    }