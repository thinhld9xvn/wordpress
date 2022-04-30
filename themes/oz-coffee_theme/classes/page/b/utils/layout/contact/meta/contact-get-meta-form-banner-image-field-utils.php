<?php 

    namespace Page\Contact;

    class ContactGetMetaFormBannerFieldUtils  {

        public static function get($post_id) { 

            return get_post_meta($post_id, PAGE_CONTACT_FIELDS::FORM_BANNER_IMAGE_FIELD, true);


        }

    }