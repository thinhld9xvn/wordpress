<?php 

    namespace Archive\Galleries\Single;

    use \Archive\Galleries\GalleriesGetMetaAddressFieldUtils;

    class GalleriesPrintHeadingHtmlUtils {

        public static function render($post) { 
            
            $post_title = $post->post_title;
            $address = GalleriesGetMetaAddressFieldUtils::get($post->ID); ?>
        
            <h2 class="sectionTitleHeading text-center">
                <?= $post_title ?>
            </h2>

            <div class="metadata metadata-datetime metadata-address-element flex-layout flex-justify-center">

                <?= $address ?>

            </div>

        <?php }
        

    }