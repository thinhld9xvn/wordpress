<?php 

    namespace Home\Sections;

    class SVSectionPrintHtmlUtils {

        public static function render() {

            ob_start(); ?>

            <div class="service-section fullwidth-section">
                <div class="section-wrapper">

                    <?php SVSectionPrintHeadingHtmlUtils::render(); ?>
                    
                    <div class="service-body-elem service-contents-elem">

                       <?php SVSectionPrintDescriptionHtmlUtils::render(); ?>

                       <?php SVSectionPrintCatalogEntriesHtmlUtils::render(); ?>                                     
                        
                    </div>
                    
                </div>
            </div>

            <?php 
                $contents = ob_get_contents();

                ob_end_clean();

                echo $contents;

        }

    }