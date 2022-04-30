<?php 

    namespace Home\Sections;

    class GalleriesSectionPrintHtmlUtils {

        public static function render() {

            ob_start();  ?>

            <div class="galleries-section home-galleries-section fullwidth-section">
                <div class="section-wrapper">
                    <div class="container">

                        <?php GalleriesSectionPrintHeadingHtmlUtils::render(); ?>

                        <div class="sectionMainContent">

                            <?php GalleriesSectionPrintEntriesElementUtils::render(); ?>
                            
                        </div>
                    </div>
                </div>
            </div>

            <?php 
            
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;

        }

    }