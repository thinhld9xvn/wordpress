<?php 

    namespace Page\Contact;

    class ContactGetMetaFormCF7IdFieldUtils  {

        public static function get($post_id) { 

            return get_post_meta($post_id, PAGE_CONTACT_FIELDS::FORM_CF7_ID_FIELD, true);


        }

    }