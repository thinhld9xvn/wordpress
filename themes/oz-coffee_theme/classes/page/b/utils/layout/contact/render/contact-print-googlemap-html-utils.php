<?php 

    namespace Page\Contact;

    class ContactPrintGooglemapHtmlUtils  {

        public static function render($post) {

            $iframe = ContactGetMetaGoogleMapIframeUtils::get($post->ID); ?>

            <div class="google-map-location">

                <?php echo apply_filters('the_content', $iframe) ?>
                
            </div>                       

        <?php }

    }