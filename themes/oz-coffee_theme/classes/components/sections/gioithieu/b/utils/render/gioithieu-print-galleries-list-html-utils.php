<?php 

    namespace Home\Sections;

    class GTSectionPrintGallerisListHtmlUtils {

        public static function render() {

            ob_start(); 

            $galleries = GTSectionGetGalleriesDataUtils::get(); 
            
            if ( $galleries ) : ?>

                <div class="galleries intro-galleries galleries-animation grid-two-columns">

                    <?php foreach ( $galleries as $key => $gallery ) : 
                        
                            if ( $gallery ) : ?>

                                <a class="item bg-thumbnail bg-default-settings bg-fullheight backgroundi-lazy" 
                                    href="#" 
                                    data-src="<?= $gallery ?>"> </a>

                    <?php
                            endif;

                        endforeach; ?>

                </div>

                <div class="galleries-view-fullscreen">
                    <a href="#">xem full hình ảnh</a>
                </div>

            <?php 

            endif;
            
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;

        }

    }