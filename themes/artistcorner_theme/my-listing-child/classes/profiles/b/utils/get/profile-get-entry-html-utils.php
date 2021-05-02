<?php 

    namespace Profiles;

    class ProfileGetEntryHtmlUtils {

        public static function get_in_loop() {

            global $post;

            $data = get_entry_profile_data_in_loop();
            
            extract($data);     

            $html = '<div class="' . $profile_classname . '"';
            $html .= 'data-id="listing-id-' . $profile_id . '"';

            if ( $latitude ) :
                $html .= 'data-latitude="' . $latitude . '"';
            endif;
            
            if ( $lngtitude ) :

                $html .= 'data-longitude="' . $lngtitude . '"';

            endif;

            //echo var_dump($term_icon);

            if ( $term_icon ) :

                $html .= 'data-category-icon="' . $profile_category_icon_html . '"';

            endif;                                                                  
            
            if ( $term_bg_color ) :

                $html .= 'data-category-color="' . $term_bg_color . '"';

            endif;

            if ( $term_text_color ) :

                $html .= 'data-category-text-color="' . $term_text_color . '"';

            endif;

            if ( $profile_thumbnail_url ) :

                $html .= 'data-thumbnail="' . $profile_thumbnail_url . '"';

            endif;

            $html .= 'data-template="' . ALTERNATE_VIEW_TEMPLATE_NAME . '">';

            $html .= '<div class="lf-item lf-item-alternate" 
                        data-template="' . ALTERNATE_VIEW_TEMPLATE_NAME . '">

                        <a href="' . $profile_permalink . '">' .

                            //'<div class="overlay"' . ($term_bg_color ? 'style="background-color: ' . $term_bg_color . '; opacity: 0.4;"' : '') . '></div>
                            '<div class="overlay"></div>

                            <div class="lf-background optml-bg-lazyloaded"' .

                                ($profile_thumbnail_url ? "style=\"background-image: url('" . $profile_thumbnail_url . "');\"" : "") . '
                            
                            ></div>

                            <div class="lf-item-info-2">                                                              

                                <h4 class="case27-secondary-text listing-preview-title">' .

                                    get_profile_title() .
                                    
                                '</h4>

                                <!--<h6>Edwardian picture house, screening mainstream films</h6>-->

                                <ul class="lf-contact">' .

                                    ($profile_phone ? 

                                        "<li>
                                            <i class=\"icon-phone-outgoing sm-icon\"></i>
                                            {$profile_phone}
                                        </li>" : "") .                                

                                    ($profile_location ? 

                                        "<li>
                                            <i class=\"icon-location-pin-add-2 sm-icon\"></i>
                                            {$profile_location}
                                        </li>" : "") . '                                                

                                </ul>

                            </div>

                            <div class="lf-head">
                                <div class="lf-head-btn">' . 
                                    $profile_salary_html . '                                 
                                </div>
                                <div class="lf-head-btn">' .
                                    $profile_vacancy_types_html . '                              
                                </div>
                                <small class="profile-status "'. $profile_status_classname . '>
                                    <span class="fa fa-circle"></span>
                                    '. $profile_status . '                          
                                 </small>
                            </div>

                            <div class="lf-author">
                                <span class="fa fa-user"></span>
                                <span class="author-name padLeft5">' . $profile_author . '</span>
                            </div>

                        </a>

                    </div>

                    <div class="listing-details c27-footer-section">' .

                        $profile_category_list_html . '

                        <div class="ld-info">

                            <ul>

                                <li class="item-preview" data-toggle="tooltip" data-placement="top" data-original-title="Quick view">
                                    <a href="#" type="button" class="c27-toggle-quick-view-modal" data-id="' . get_profile_ID() . '">
                                        <i class="mi zoom_in"></i>
                                    </a>
                                </li>

                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark">
                                    <a class="c27-bookmark-button" data-listing-id="' . get_profile_ID() . '" 
                                        onclick="MyListing.Handlers.Bookmark_Button(event, this)">
                                        <i class="mi favorite_border"></i>
                                    </a>
                                </li>

                            </ul>

                        </div>

                    </div>             

            </div>';

            return $html;


        }

    }