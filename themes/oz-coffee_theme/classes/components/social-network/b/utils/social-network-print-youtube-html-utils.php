<?php 

    namespace Social_Network;

    class SocialNetworkPrintYoutubeHtmlUtils {

        public static function render($icon = 'youtube') {

            ob_start();

            $url = SocialNetworkGetYoutubeUrlUtils::get(); ?>

            <a target="_blank" class="youtube" href="<?= $url ?>">
                <span class="fa fa-<?= $icon ?>"></span>
            </a>

        <?php 
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;

        }

    }