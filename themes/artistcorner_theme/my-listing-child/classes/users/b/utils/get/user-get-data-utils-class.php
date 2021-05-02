<?php 

    namespace Users;

    class UserGetData {

        public static function get($uid) {

            return get_userdata($uid);

        }    
        
        public static function get_by_ajax_post($params) {

            global $current_user;

            $params = extract_params_serialized($params);   

            $data['avatar_profile'] = $params['current_avatar-profile'];
            $data['bg_cover_profile'] = $params['current_bg-cover-profile'];

            $data['first_name'] = $params['first_name'];
            $data['last_name'] = $params['last_name'];

            $data['rates_by_hour'] = $params['rates_by_hour'];

            $data['category_of_service'] = $params['job_category_of_service'];

            $data['job_title'] = wp_strip_all_tags( $params['job_title'] );
            $data['job_description'] = $params['job_description'];

            $data['job_book_online'] = $params['current_job_book_online'];
            $data['job_portfolio'] = $params['current_job_portfolio'];
            $data['job_demo_tape'] = $params['current_job_demo_tape'];

            $data['job_email'] = $params['job_email'];
            $data['job_phone'] = $params['job_phone'];
            $data['job_website'] = $params['job_website'];
            $data['links'] = $params['links'];
            $data['job_account_type'] = $params['job_account_type'];
            $data['job_languages'] = $params['job_languages'];
            $data['job_category'] = $params['job_category'];
            $data['job_salary'] = $params['job_salary'];
            $data['job_qualification'] = $params['job-qualification'];
            $data['job_vacancy_type'] = $params['job-vacancy-type'];
            $data['job_location'] = $params['job_location'];
            $data['job_location__latitude'] = $params['job_location__latitude'];
            $data['job_location__longitude'] = $params['job_location__longitude'];
            $data['region'] = $params['region'];

            $data['author_id'] = (int) $current_user->ID;

            return $data;

        }

    }