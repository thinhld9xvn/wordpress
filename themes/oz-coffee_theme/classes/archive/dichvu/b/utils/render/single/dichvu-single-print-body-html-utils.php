<?php 

    namespace Archive\Services;

    class SVSinglePrintBodyHtmlUtils  {

        public static function render($post) { ?>

            <div class="page-elements-body">

                <?php SVSinglePrintCarouselHtmlUtils::render($post); ?>
                <?php SVSinglePrintCarouselHtmlUtils::render($post, 1); ?>

            </div>

        <?php }

    }