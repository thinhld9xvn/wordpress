<?php 

    namespace Social_Network;

    class SocialNetworkPrintZaloHtmlUtils {

        public static function render() {

            ob_start();

            $url = SocialNetworkGetZaloUrlUtils::get(); ?>

            <a target="_blank" 
                href="<?= $url ?>" 
                class="zalo bg-default-settings"> </a>

        <?php 
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;

        }

    }