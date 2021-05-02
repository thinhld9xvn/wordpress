<?php 

    namespace Search;

    class SearchPerformUtils {

        public static function perform($args, $form_data) {        

            $num_per_page = 8;
    
            $job_salary = $form_data['job-salary'];
    
            $job_vacancy_type = $form_data['job-vacancy-type'];
        
            $job_qualification = $form_data['job-qualification'];
        
            $job_location = $form_data['search_location'];
        
            $job_location_lat = $form_data['lat'];
            $job_location_lng = $form_data['lng'];
        
            $proximity = $form_data['proximity'];
        
            $job_region = $form_data['region'];
    
            $results = query_posts( $args );   
        
            $arrListings = array(
                'found_posts' => 0,
                'html' => '',
                'html_template' => '',
                'max_num_pages' => 0,
                'pagination' => null,
                'showing' => '',
                'results' => array()
            );
        
            $html = '';
        
            $count = 0;
        
            $arrResults = array();
        
            while ( have_posts() ) : the_post();
        
                global $post;
        
                $boolValidate = true;         
             
        
                if ( $job_vacancy_type ) :
        
                    $vacancy_types = get_profile_vacancy_types($post);             
        
                endif;
        
                if ( $job_salary ) :
        
                    $salary = (float) get_profile_salary($post);
        
                endif;
        
                if ( $job_qualification ) :
        
                    $qualifications = get_profile_qualifications($post);
        
                endif;
        
                if ( $job_region ) :
        
                    $regions = get_profile_regions($post);
        
                endif;
        
                if ( $job_location_lat && $job_location_lng ) :
        
                    $lat = get_profile_latitude($post);
                    $lng = get_profile_lngtitude($post);
        
                endif;
        
                //echo var_dump($vacancy_types);
        
                if ( $job_vacancy_type ) :
        
                    if ( in_profile_terms($vacancy_types, $job_vacancy_type) ) : 
                        
                        //echo var_dump($boolValidate);
        
                        $boolValidate = true;
        
                    else :
        
                        $boolValidate = false;
        
                    endif;
        
                endif;
        
                //echo var_dump($boolValidate); die();
        
                if ( $boolValidate && $job_salary ) :
        
                    $salaries = explode('..', $job_salary);
                    $min = (float) $salaries[0];
                    $max = (float) $salaries[1];
    
                    $_max = (float) _FILTER_PRICE_MAX_PLUS;
    
                    if ( $max === $_max ) :
    
                        if ( $salary >= $min ) :
    
                            $boolValidate = true;
    
                        else :
    
                            $boolValidate = false;
    
                        endif;
    
                    else :     
                        
                        if ( $salary >= $min && $salary <= $max  ) :                    
    
                            $boolValidate = true;
        
                        else :
        
                            $boolValidate = false;
        
                        endif;
    
                    endif;              
        
                endif;
        
                if ( $boolValidate && $job_qualification ) :
        
                    if ( in_profile_terms($qualifications, $job_qualification) ) :
        
                        $boolValidate = true;
        
                    else :
        
                        $boolValidate = false;
        
                    endif;
        
                endif;
        
                if ( $boolValidate && $job_region ) :
        
                    //echo "<pre>"; print_r( $regions );
        
                    if ( in_profile_terms($regions, $job_region) ) :
        
                        $boolValidate = true;
        
                    else :
        
                        $boolValidate = false;
        
                    endif;
        
                endif;
        
                if ( $boolValidate && $job_location_lat && $job_location_lng ) :            
        
                else :
        
                   
                endif;
        
                //echo var_dump($boolValidate);
        
                if ( ! $boolValidate ) continue;
        
                /*$html .= '<div class="col-md-12 grid-item">';
        
                $html .= get_entry_profile_html_in_loop();
        
                $html .= '</div>';*/
        
                $arrResults[] = get_entry_profile_data_in_loop();
        
                $count++;
        
            endwhile;
            
            $length = $count;
            $max_num_pages = $length / $num_per_page;
        
            $arrListings['found_posts'] = $length;
            $arrListings['max_num_pages'] = $max_num_pages;
            $arrListings['showing'] = "Showing <b>{$length}</b> results";
            $arrListings['pagination'] = "<div id='searchPagination' class='pagination js-simple-pagination'></div>";
            
            $arrListings['html_template'] = '<div class="col-md-12 grid-item">' . get_entry_profile_template_html_in_loop() . '</div>';
            $arrListings['results'] = $arrResults;
    
            return $arrListings;
    
        }

    }