<?php 

    namespace Page\Contact;

    class ContactGetMetaGoogleMapIframeUtils  {

        public static function get($post_id) { 

            return get_post_meta($post_id, PAGE_CONTACT_FIELDS::GOOGLE_MAP_FIELD, true);


        }

    }