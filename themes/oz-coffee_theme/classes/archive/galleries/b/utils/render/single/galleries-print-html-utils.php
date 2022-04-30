<?php 

    namespace Archive\Galleries\Single;

    class GalleriesPrintHtmlUtils {

        public static function render() { 
            
            global $post; ?>
        
            <div id="page-main-elements" class="page-main-elements page-galleries-elements 
                                                page-galleries-helena-element page-main-builders element-no-mgtop">

                <div class="page-uudai-contents page-galleries-helena-contents">

                   <div class="galleries-helena-opening-el">

                        <div class="container">

                           <?php GalleriesPrintHeadingHtmlUtils::render($post) ?>

                        </div>

                    </div>

                    <div class="galleries-helena-grid-layout">

                        <?php GalleriesPrintListsHtmlUtils::render($post); ?>

                    </div>
                    
                </div>

            </div>    

        <?php }
        

    }