<?php 

    namespace Profiles;

    class ProfileGetFormDataUtils {

        public static function get($user) {

            $args = array(
                'post_type' => JOBS_POST_TYPE,
                'posts_per_page' => 1,
                'author' => $user->ID,
                'meta_key' => _FIELD_JOBS_TYPE_KEY,
                'meta_value' => _FIELD_JOBS_TYPE_VALUE            
            ); 
            
            query_posts($args); 
    
            $data = array();
            
            if ( have_posts() ) :
    
                while ( have_posts() ) : the_post();
    
                    global $post;
    
                    $data['first_name'] = get_usermeta($user->ID, 'first_name');
                    $data['last_name'] = get_usermeta($user->ID, 'last_name');
    
                    $data['job_title'] = $post->post_title;
                    $data['job_description'] = $post->post_content;
                    $data['avatar_profile'] = get_the_post_thumbnail_url( $post->ID, 'full' );                
    
                    $data['bg_cover_profile'] = get_profile_bg_cover_profile($post);
    
                    $data['account_type'] = get_profile_account_types($post);
                    $data['languages'] = get_profile_languages($post);
    
                    $data['rates_by_hour'] = get_profile_rates_by_hour($post);
    
                    $data['category_of_service'] = get_profile_category_of_service($post);
    
                    /*$data['company_logos'] = get_profile_company_logos($post);
                    $data['galleries'] = get_profile_galleries($post);
                    $data['upload_attachments'] = get_profile_attachments($post);*/
    
                    $data['portfolio'] = get_profile_portfolio($post);
                    $data['demo_tape'] = get_profile_demo_tape($post);
                    $data['book_online'] = get_profile_book_online($post);
    
                    $data['email'] = get_profile_email($post);
                    $data['phone'] = get_profile_contact_phone($post);
                    $data['website'] = get_profile_website($post);
                    $data['socials'] = get_profile_social_networks($post);
    
                    $data['categories'] = get_the_terms($post->ID, JOBS_TAXONOMY);
                    $data['salary'] = get_profile_salary($post);
                    $data['qualifications'] = get_the_terms($post->ID, JOBS_QUALIFICATION_TAXONOMY);
                    $data['vacancy_types'] = get_the_terms($post->ID, JOBS_VACANCY_TYPE_TAXONOMY);
    
                    $data['job_location'] = get_profile_contact_location($post);
                    $data['job_location__latitude'] = get_profile_latitude($post);
                    $data['job_location__longitude'] = get_profile_lngtitude($post);
    
                    $data['region'] = get_profile_regions($post);
    
                endwhile;
            
            endif;
            
            wp_reset_query();
    
            return $data;


        }

    }