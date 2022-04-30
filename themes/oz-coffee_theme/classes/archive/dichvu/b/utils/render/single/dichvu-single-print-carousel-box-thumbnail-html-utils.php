<?php 

    namespace Archive\Services;

    class SVSinglePrintCarouselBoxThumbnailHtmlUtils  {

        public static function render($post, $side = 0, $id = 0) {

            $image_url = $side === 0 ? SVGetMetaCarouselAboveImageFieldUtils::get($post->ID, $id) : 
                                        SVGetMetaCarouselBelowImageFieldUtils::get($post->ID, $id);
                                        
            $image_attachment_id = pn_get_attachment_id_from_url($image_url);
            $image_attachment_src = wp_get_attachment_image_src($image_attachment_id, 'feature-image-carousel-service-small-image')[0]; ?>
                        
            <div class="elem-jcarousel-hambird bg-thumbnail-animation __bg bg-default-settings bg-fullheight backgroundi-lazy" 
                            data-src="<?= $image_attachment_src ?>"></div>

        <?php }

    }