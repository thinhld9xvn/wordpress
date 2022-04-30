<?php 

    namespace Archive\Services;

    class SVSinglePrintCarouselElementsHtmlUtils  {

        public static function render($post, $id = 0) { ?>

            <div class="item">

                <div class="elem-jcarousel-grid grid-two-columns grid-no-pad">

                   <?php 
                   
                        if ( $id === 0 ) :
                            
                            SVSinglePrintCarouselLargeImageHtmlUtils::render($post, $id);
                            SVSinglePrintCarouselPanelContentHtmlUtils::render($post, $id);

                        else :
                            
                            SVSinglePrintCarouselPanelContentHtmlUtils::render($post, $id);
                            SVSinglePrintCarouselLargeImageHtmlUtils::render($post, $id);

                        endif; ?>
                    
                </div>

            </div>

        <?php }

    }