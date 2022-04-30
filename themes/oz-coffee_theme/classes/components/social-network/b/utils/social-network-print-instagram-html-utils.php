<?php 

    namespace Social_Network;

    class SocialNetworkPrintInstagramHtmlUtils {

        public static function render() {

            ob_start();

            $url = SocialNetworkGetInstagramUrlUtils::get(); ?>

            <a target="_blank" class="inst" href="<?= $url ?>">
                <span class="fa fa-instagram"></span>
            </a>

        <?php 
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;

        }

    }