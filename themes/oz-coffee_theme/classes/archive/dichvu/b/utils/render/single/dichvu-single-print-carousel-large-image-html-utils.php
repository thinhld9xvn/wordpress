<?php 

    namespace Archive\Services;

    class SVSinglePrintCarouselLargeImageHtmlUtils  {

        public static function render($post, $id = 0) {             
            
            $large_image_url = SVGetMetaCarouselLargeImageFieldUtils::get($post->ID, $id);
            
            $large_image_attachment_id = pn_get_attachment_id_from_url($large_image_url);
            $large_image_attachment_src = wp_get_attachment_image_src($large_image_attachment_id, 'feature-image-carousel-service-large-image')[0]; ?>
                        
            <div class="item elem-jcarousel-item item-thumbnail-animation">

                <?php if ( $large_image_attachment_src ) : ?>

                    <div class="thumbnail bg-thumbnail bg-default-settings bg-fullheight backgroundi-lazy" 
                        data-src="<?= $large_image_attachment_src ?>"></div>

                <?php endif; ?>

            </div>

        <?php }

    }