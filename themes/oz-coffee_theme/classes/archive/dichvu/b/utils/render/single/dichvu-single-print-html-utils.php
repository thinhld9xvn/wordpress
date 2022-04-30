<?php 

    namespace Archive\Services;

    class SVSinglePrintHtmlUtils  {

        public static function render() { 
            
            global $post; ?>

            <div id="page-main-elements" 
                class="page-main-elements page-service-catalogue page-main-builders">

                <?php SVSinglePrintHeadingHtmlUtils::render($post) ?>   
                
                <?php SVSinglePrintBodyHtmlUtils::render($post) ?>

                <?php SVSinglePrintGalleriesSectionHtmlUtils::render(); ?>

            </div>

        <?php }

    }