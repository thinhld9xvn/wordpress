<?php 

    namespace Archive\Services;

    class SVSinglePrintCarouselPanelContentHtmlUtils  {

        public static function render($post, $id = 0) {

            $ABOVE_SIDE = 0;
            $BELOW_SIDE = 1; ?>
           
           <div class="item elem-jcarousel-item">

                <div class="elem-jcarousel-item-grid grid-two-columns grid-no-pad">

                    <?php                                

                        SVSinglePrintCarouselBoxContentHtmlUtils::render($post, $ABOVE_SIDE, $id);
                        SVSinglePrintCarouselBoxThumbnailHtmlUtils::render($post, $ABOVE_SIDE, $id);
                        SVSinglePrintCarouselBoxThumbnailHtmlUtils::render($post, $BELOW_SIDE, $id);
                        SVSinglePrintCarouselBoxContentHtmlUtils::render($post, $BELOW_SIDE, $id); ?>

                
                </div>

            </div>

        <?php }

    }