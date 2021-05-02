<?php 

    namespace Profiles;

    class ProfileGetEntryClassUtils {

        public static function get($post) {

            return "lf-item-container 
                listing-preview 
                type-place 
                lf-type-2 
                post-{$post->ID} 
                job_listing 
                type-job_listing 
                status-publish 
                hentry   
                has-logo 
                has-tagline 
                has-info-fields 
                level-normal 
                priority-0";


        }

    }