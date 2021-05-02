<?php 

    namespace Users;

    class ProfileGenerateUtils {

        public static function perform($data) {            

            extract($data);

            $profile_data = array(
                'post_status'   => 'publish',
                'post_title'    => $job_title,
                'post_content'  => $job_description,		  
                'post_author'   => $author_id,		 
                'post_type' => JOBS_POST_TYPE
            );		 
              
            $pid = wp_insert_post( $profile_data );
        
            if ( 0 === $pid || is_wp_error( $pid ) ) :
        
                return 'error';
        
            endif;       
        
            update_profile_field($pid, _FIELD_JOBS_TYPE_KEY, _FIELD_JOBS_TYPE_VALUE );

            $data['pid'] = $pid;
        
            self::__perform_update_profile($data);

            return 'success';

        }

        

    }