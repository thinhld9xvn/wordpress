<?php 

    namespace Page\Contact;

    class ContactPrintFormCF7HtmlUtils  {

        public static function render($post) {

            $cf7_id = ContactGetMetaFormCF7IdFieldUtils::get($post->ID);  ?>

            <div class="item googlemapItemGrid">

                <div class="contactFormItemElem">

                    <?php echo do_shortcode("[contact-form-7 id='{$cf7_id}']") ?>

                </div>

            </div>            

        <?php }

    }