<?php 

    namespace Home\Sections;

    class NewsSectionPrintHeadingHtmlUtils {

        public static function render() {

            ob_start(); 

            $heading = NewsSectionGetHeadingTextUtils::get();  ?>

                <h2 class="sectionTitleHeading text-center"><?= $heading ?></h2>

            <?php 
            
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;

        }

    }