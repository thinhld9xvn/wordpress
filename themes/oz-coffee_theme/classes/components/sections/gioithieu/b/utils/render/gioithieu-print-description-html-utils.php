<?php 

    namespace Home\Sections;

    class GTSectionPrintDescriptionHtmlUtils {

        public static function render() {

            ob_start();
            
            $description = GTSectionGetDescriptionHtmlUtils::get(); ?>

                <div class="description intro-elem-description">

                    <?php 
                        echo apply_filters('the_content', $description); ?>

                </div>
            
            <?php 
                
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;

        }

    }