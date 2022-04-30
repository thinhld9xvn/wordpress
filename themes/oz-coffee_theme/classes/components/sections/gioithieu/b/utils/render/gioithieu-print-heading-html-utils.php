<?php 

    namespace Home\Sections;

    class GTSectionPrintHeadingHtmlUtils {

        public static function render() {

            ob_start();
            
            $heading = GTSectionGetHeadingTextUtils::get(); ?>

                <h2 class="sectionTitlteHeading"><?= $heading ?></h2>
            
            <?php 
                
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;

        }

    }