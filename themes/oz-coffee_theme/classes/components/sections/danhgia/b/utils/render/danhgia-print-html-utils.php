<?php 

    namespace Home\Sections;

    class ReviewsSectionPrintHtmlUtils {

        public static function render() {

            ob_start(); ?>

            <div class="reviews-section home-reviews-section fullwidth-section">

                <div class="section-wrapper">

                    <div class="container">

                       <?php ReviewsSectionPrintHeadingHtmlUtils::render(); ?>

                        <div class="sectionMainContent">

                            <?php ReviewsSectionPrintCarouselHtmlUtils::render(); ?>
                            
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