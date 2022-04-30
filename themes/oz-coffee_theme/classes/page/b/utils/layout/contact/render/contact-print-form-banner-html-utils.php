<?php 

    namespace Page\Contact;

    class ContactPrintFormBannerHtmlUtils  {

        public static function render($post) {

            $bg = ContactGetMetaFormBannerFieldUtils::get($post->ID);
            $bg = $bg['thumbnail']; ?>

            <div class="item googlemapItemGrid">

                <div class="thumbnail banner bg-thumbnail bg-default-settings bg-fullheight backgroundi-lazy" 
                    data-src="<?= $bg ?>"></div>

            </div>                  

        <?php }

    }