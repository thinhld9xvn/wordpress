<?php

    namespace Search;

    class SearchQueryContextUtils {        

        public static function query($form_data) {

            global $current_user;

            $term = (int) $form_data['term'];

            $paged = (int) $form_data['page'] + 1;

            $sort = $form_data['sort']; 

            $args = array(

                'post_type' => JOBS_POST_TYPE,          
                'posts_per_page' => -1,
                'author__not_in' => array($current_user->ID),
                'tax_query' => array(
                    array(
                        'taxonomy' => JOBS_TAXONOMY,
                        'field' => 'id',
                        'terms' => array($term)
                    )
                )
        
            );        

            $args = array_merge($args, SearchGetSortArgsUtils::get($sort));

            return SearchPerformUtils::perform($args, $form_data);


        }

        public static function query_by_category($form_data) {     
        
            global $current_user;
    
            $paged = (int) $form_data['page'] + 1;
            $preserve_page = $form_data['preserve_page'];
            $s = $form_data['search_keywords'];
    
            $category = $form_data['category'];     
        
            $sort = $form_data['sort'];       
    
            $args = array(
    
                'post_type' => JOBS_POST_TYPE,         
                'meta_query' => array(),
                'posts_per_page' => -1,
                'author__not_in' => array($current_user->ID)
        
            );
        
            if ( $s ) :
        
                $args['s'] = $s;
        
            endif;
        
            $args = array_merge($args, SearchGetSortArgsUtils::get($sort));
        
            if ( $category ) :
        
                $args['tax_query'] = array(
        
                    array(
        
                        'taxonomy' => JOBS_TAXONOMY,
                        'field' => 'slug',
                        'terms' => array($category)
        
                    )
        
        
                );
        
            endif;
        
            $args['meta_query'][] = array(
        
                'key' => _FIELD_JOBS_TYPE_KEY,
                'value' => _FIELD_JOBS_TYPE_VALUE,
        
            );   
    
            return SearchPerformUtils::perform($args, $form_data);
           
    
        }

    }