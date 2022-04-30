<?php 

    namespace Home\Sections;

    class SVSectionPrintDescriptionHtmlUtils {

        public static function render() { 
            
            ob_start(); 
            
            $description = SVSectionGetDescriptionHtmlUtils::get(); ?>

                <figure>
                    <?php echo apply_filters('the_content', $description) ?>
                </figure> 

        <?php            

            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;
        }

    }