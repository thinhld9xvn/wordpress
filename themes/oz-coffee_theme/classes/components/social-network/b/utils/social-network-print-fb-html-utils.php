<?php 

    namespace Social_Network;

    class SocialNetworkPrintFbHtmlUtils {

        public static function render() {

            ob_start();

            $url = SocialNetworkGetFbUrlUtils::get(); ?>

            <a target="_blank" class="fb" href="<?= $url ?>">
                <span class="fa fa-facebook"></span>
            </a>

        <?php 
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;

        }

    }