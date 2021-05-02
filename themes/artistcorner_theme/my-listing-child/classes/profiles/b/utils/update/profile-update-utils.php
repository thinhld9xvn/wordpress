<?php

    namespace Users;

    class ProfileUpdateUtils {

        private static function __perform($data) {

            extract($data);

            $basic_meta_fields_names = get_all_basic_profile_meta_fields_names();

            extract($basic_meta_fields_names);

            set_profile_avatar($pid, $avatar_profile);

            $display_name = $nick_name = $first_name . ' ' . $last_name;

            self::update_user_info(array(

                'ID' => $author_id,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'user_nicename' => $nick_name,
                'display_name' => $display_name

            ));

            if ( $bg_cover_profile ) : 
                
                update_profile_attachment_field($pid, $_field_jobs_bg_cover_profile, $bg_cover_profile);

            endif;

            if ( $job_account_type ) :

                update_profile_field($pid, _FIELD_JOBS_ACCOUNT_TYPE, $job_account_type );

            endif;        
            
            if ( $job_languages ) :

                update_profile_field($pid, _FIELD_JOBS_LANGUAGES, $job_languages );

            endif;        

            if ( $rates_by_hour ) :

                update_profile_field($pid, _FIELD_JOBS_RATES_BY_HOUR, $rates_by_hour );

            else :

                update_profile_field($pid, _FIELD_JOBS_RATES_BY_HOUR, null );

            endif;

            if ( $category_of_service ) :

                update_profile_field($pid, _FIELD_JOBS_CATEGORY_OF_SERVICE, $category_of_service );

            endif;  

            if ( $job_category ) :
        
                wp_set_post_terms( $pid, $job_category, JOBS_TAXONOMY);
        
            endif;
        
            if ( $job_salary ) :               
        
                //wp_set_post_terms( $pid, $job_salary, JOBS_SALARY_TAXONOMY);
                update_profile_field($pid, _FIELD_JOBS_SALARY, $job_salary );
        
            endif;
        
            if ( $job_qualification ) :
        
                wp_set_post_terms( $pid, $job_qualification, JOBS_QUALIFICATION_TAXONOMY);
        
            endif;
        
            if ( $job_vacancy_type ) :
        
                wp_set_post_terms( $pid, $job_vacancy_type, JOBS_VACANCY_TYPE_TAXONOMY);
        
            endif;
        
            if ( $region ) :
        
                wp_set_post_terms( $pid, $region, REGION_TAXONOMY);
        
            endif;
            
            if ( $job_location ) :
        
                update_profile_field($pid, $_field_jobs_location, $job_location);
        
            endif;
        
            if ( $job_location__longitude && $job_location__latitude ) :
        
                update_profile_field($pid, $_field_jobs_location_latitude, $job_location__latitude);
                update_profile_field($pid, $_field_jobs_location_lngitute, $job_location__longitude);
        
            endif;
        
            if ( $job_book_online ) :                
        
                update_profile_attachment_field($pid, $_field_jobs_book_online, $job_book_online);

            else :

                update_profile_attachment_field($pid, $_field_jobs_book_online, null);
        
            endif;
        
            if ( $job_portfolio ) :
                
                update_profile_attachment_field($pid, $_field_jobs_portfolio, $job_portfolio);

            else :

                update_profile_attachment_field($pid, $_field_jobs_portfolio, null);
        
            endif;
        
            if ( $job_demo_tape ) :
        
                update_profile_attachment_field($pid, $_field_jobs_demo_tape, $job_demo_tape);

            else :

                update_profile_attachment_field($pid, $_field_jobs_demo_tape, null);
        
            endif;
        
            if ( $job_email ) :
        
                update_profile_field($pid, $_field_jobs_email, $job_email);
        
            endif;
        
            if ( $job_phone ) :
        
                update_profile_field($pid, $_field_jobs_phone, $job_phone ); 
        
            endif;
        
            if ( $job_website ) :
        
                update_profile_field($pid, $_field_jobs_website, $job_website ); 

            else :

                update_profile_field($pid, $_field_jobs_website, null);
        
            endif;
        
            if ( $links ) :
        
                update_profile_field($pid, $_field_jobs_socials, $links);

            else :

                update_profile_field($pid, $_field_jobs_socials, null);
        
            endif;


        }

        public static function update($data) {

            $user_profile = self::$active_user_profile;

            extract($data); 

            $profile_data = array(

                'ID'    => $user_profile->ID               

            );

            if ( ! compareTwoStr($user_profile->post_title, $job_title) ) :

                $profile_data['post_title'] = $job_title;

            endif;

            if ( ! compareTwoStr($user_profile->post_content, $job_description) ) :

                $profile_data['post_content'] = $job_description;

            endif;
        
            $pid = wp_update_post( $profile_data );

            if ( 0 === $pid || is_wp_error( $pid ) ) :
        
                return 'error';
        
            endif;

            $data['pid'] = $pid;

            self::__perform($data);
            
            return 'success';


        }

    }