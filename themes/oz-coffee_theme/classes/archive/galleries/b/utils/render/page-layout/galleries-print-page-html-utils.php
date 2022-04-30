<?php 

    namespace Archive\Galleries\PageLayout;

    class GalleriesPrintPageHtmlUtils {

        public static function render($data) { ?>
        
            <div id="page-main-elements" class="page-main-elements page-galleries-elements 
                                                page-galleries-helena-element page-galleries-manjaro-element page-main-builders element-no-mgtop">

                <div class="page-uudai-contents page-galleries-helena-contents page-galleries-manjaro-contents">
                  
                    <div class="container">

                        <?php GalleriesPrintPageHeadingHtmlUtils::render($data) ?>

                        <?php GalleriesPrintFilterBarHtmlUtils::render() ?>

                        <?php GalleriesPrintFilterResultsHtmlUtils::render($data) ?>                        
                        

                    </div>
                    
                </div>

            </div>
           
         

        <?php }
        

    }