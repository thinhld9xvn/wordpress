<?php 

    namespace Archive\Services;

    class SVSinglePrintCarouselHtmlUtils  {

        public static function render($post, $id = 0) { ?>

            <div class="page-uicarousel-element page-uicarousel-e<?= $id + 1 ?>">

                <div class="bxslider-uicarousel-element bxslider-cn-wrapper">

                    <div id="bxslider-uicarousel-e<?= $id + 1 ?>" 
                        class="bxslider --carousel"  data-numShow="1" data-pause="10000">
                        
                        <?php SVSinglePrintCarouselElementsHtmlUtils::render($post, $id) ?>

                    </div>
                    
                    <div class="bxslider-custom-controls">
                        <a class="bx-prev" href="#"></a>

                        <a class="bx-next" href="#"></a>
                    </div>
                </div>
            </div>

        <?php }

    }