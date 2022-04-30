<?php 

    namespace Home\Sections;

    class GTSectionPrintHtmlUtils {

        public static function render() {

            ob_start();  ?>

            <div class="introduction-section fullwidth-section">

                <div class="container">

                    <div class="section-wrapper">

                        <div class="section-elements intro-elem-section-grid grid-two-columns">

                            <div class="sectionLeft">

                                <?php GTSectionPrintHeadingHtmlUtils::render(); ?>

                                <?php GTSectionPrintDescriptionHtmlUtils::render(); ?>

                            </div>

                            <div class="sectionRight">

                                <?php GTSectionPrintGallerisListHtmlUtils::render(); ?>

                            </div>
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