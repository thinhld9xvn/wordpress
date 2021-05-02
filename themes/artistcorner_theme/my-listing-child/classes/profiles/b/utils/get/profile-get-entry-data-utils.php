<?php 

    namespace Profiles;

    class ProfileGetEntryDataUtils {

        public static function get_in_loop() {

            global $post;

            //$profile_id = get_profile_ID();      
            
            $data = array();

            $user = UserMemberShip::get_user_by_id($post->post_author);

            $is_online = UserMemberShip::is_user_online($post->post_author);

            $data['profile_classname'] = get_entry_profile_class($post);
            $data['profile_id'] = $post->ID;
            $data['profile_permalink'] = get_profile_permalink();
            $data['profile_title'] = get_profile_title();

            $data['profile_author'] = $user->display_name; 
            
            $data['profile_status_classname'] = $is_online ? '__online' : '__offline';
            $data['profile_status'] = $is_online ? 'Online' : 'Offline';

            $data['profile_template'] = ALTERNATE_VIEW_TEMPLATE_NAME;
            
            $data['latitude'] = get_profile_latitude($post);
            $data['lngtitude'] = get_profile_lngtitude($post);

            $terms = get_profile_terms($post);
            $term = $terms[0];
            
            $data['terms'] = $terms;
            $data['term'] = $term;

            $term_icon = get_profile_term_icon($term);

            $data['term_icon'] = $term_icon;

            if ( $term_icon ) :

                $data['profile_category_icon_html'] = get_profile_category_icon_html($term);

            endif;

            $data['term_image'] = get_profile_term_image($term);

            $term_bg_color = get_profile_term_color($term);

            $data['term_bg_color'] = $term_bg_color;

            if ( $term_bg_color ) :

                $data['profile_term_bg_color_style'] = 'background-color: ' . $term_bg_color . '; opacity: 0.4;';

            endif;

            $data['term_text_color'] = get_profile_term_text_color($term); 

            $thumbnail_url = get_profile_featured_thumbnail_url($post);

            $data['profile_thumbnail_url'] = $thumbnail_url;

            if ( $thumbnail_url ) :

                $data['profile_bg_thumbnail_style'] = "background-image: url('{$thumbnail_url}')";
            
            endif;

            $profile_phone = get_profile_contact_phone($post);
            
            $data['profile_phone'] = $profile_phone;

            if ( $profile_phone ) :

                $data['profile_phone_html'] = "<li>
                                                <i class=\"icon-phone-outgoing sm-icon\"></i>
                                                {$profile_phone}
                                            </li>";

            endif;

            $profile_location = get_profile_short_contact_location($post);

            $data['profile_location'] = $profile_location;

            if ( $profile_location ) :

                $data['profile_location_html'] = "<li>
                                                    <i class=\"icon-location-pin-add-2 sm-icon\"></i>
                                                    {$profile_location}
                                                </li>";

            endif;

            $profile_vacancy_types = get_profile_vacancy_types($post);

            $data['profile_vacancy_types'] = $profile_vacancy_types;

            if ( $profile_vacancy_types ) :

                $data['profile_vacancy_types_html'] = get_profile_vacancy_types_html($profile_vacancy_types);

            endif;

            $profile_salary = get_profile_salary($post);

            $data['profile_salary'] = $profile_salary;

            if ( $profile_salary ) :

                $data['profile_salary_html'] = get_profile_salary_html($profile_salary);

            endif;       

            if ( $terms ) :

                $data['profile_category_list_html'] = get_profile_category_list_html($terms);

            endif;

            return $data;
            
        }

    }