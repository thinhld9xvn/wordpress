<?php 

    namespace Footer;

    class FooterPrintHeadingColumnAddressHtmlUtils {

        public static function render() {

            ob_start();  ?>

            <h4><?= FooterGetContactColumnTitleUtils::get() ?></h4>
                      
        <?php 
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;
        }

    }