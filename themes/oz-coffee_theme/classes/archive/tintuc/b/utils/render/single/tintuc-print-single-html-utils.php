<?php 

    namespace Archive\News\Single;

    class NewsPrintSingleHtmlUtils  {        

        public static function render() {
            
            global $post; ?>
            
            <div id="page-main-elements" class="page-main-elements page-uudai-child-elements page-jnewscambridge-elements page-main-builders">
                <div class="page-uudai-contents page-uudai-child-contents">
                    
                    <div class="container">

                       <?php NewsPrintHeadingHtmlUtils::render($post) ?>

                        <?php NewsPrintMetaDataHtmlUtils::render($post) ?>

                        <?php NewsPrintPageContentHtmlUtils::render($post) ?>

                        <?php NewsPrintFacebookCommentsUtils::render($post) ?>

                        <?php NewsPrintRelatedBoxHtmlUtils::render($post) ?>

                    </div>

                        
                </div>

            </div>
            
        <?php }

    }