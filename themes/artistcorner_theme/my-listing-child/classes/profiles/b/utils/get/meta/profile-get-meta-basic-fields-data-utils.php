<?php 

    namespace Profiles;

    class ProfileGetMetaBasicFieldsDataUtils {

        public static function get() {

            $data['_field_jobs_location'] = '_' . _FIELD_JOBS_CONTACT_LOCATION;
            $data['_field_jobs_location_latitude'] = _FIELD_JOBS_LOCATION_LATITUDE;
            $data['_field_jobs_location_lngitute'] = _FIELD_JOBS_LOCATION_LNGITUTE;
            /*$data['_field_jobs_company_logo'] = '_' . _FIELD_JOBS_COMPANY_LOGO;
            $data['_field_jobs_company_gallery'] = '_' . _FIELD_JOBS_GALLERIES;
            $data['_field_upload_pdf'] = '_' . _FIELD_JOBS_ATTACHMENTS;*/
    
            $data['_field_jobs_book_online'] = '_' . _FIELD_JOBS_BOOK_ONLINE;
            $data['_field_jobs_demo_tape'] = '_' . _FIELD_JOBS_DEMO_TAPE;
            $data['_field_jobs_portfolio'] = '_' . _FIELD_JOBS_PORTFOLIO;
    
            $data['_field_jobs_email'] = '_' . _FIELD_JOBS_EMAIL;
            $data['_field_jobs_phone'] = '_' . _FIELD_JOBS_CONTACT_PHONE;
            $data['_field_jobs_website'] = '_' . _FIELD_JOBS_COMPANY_WEBSITE;
            $data['_field_jobs_socials'] = '_' . _FIELD_JOBS_SOCIAL_NETWORKS;
            $data['_field_jobs_bg_cover_profile'] = '_' . _FIELD_JOBS_BG_COVER;
            $data['_field_jobs_account_type'] = _FIELD_JOBS_ACCOUNT_TYPE;
            $data['_field_jobs_rates_by_hour'] = _FIELD_JOBS_RATES_BY_HOUR;
    
            return $data;

        }

    }