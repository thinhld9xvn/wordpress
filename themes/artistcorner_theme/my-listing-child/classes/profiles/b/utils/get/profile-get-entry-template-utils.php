<?php 

    namespace Profiles;

    class ProfileGetEntryTemplateUtils {

        public static function get_html_in_loop() {

            $html = '<div class="%profile-class%"';
            $html .= 'data-id="listing-id-%profile-id%"';
            $html .= '%data-latitude%';
            $html .= '%data-longitude%';
            $html .= '%data-category-icon%';
            $html .= '%data-category-color%';
            $html .= '%data-category-text-color%';
            $html .= '%data-thumbnail%';
            $html .= '%data-template%>';

            $html .= '<div class="lf-item lf-item-alternate" 
                            %data-template%>

                            <a href="%profile-permalink%">' .

                                '<div class="overlay" style="%profile-term-bg-color-style%"></div>

                                <div class="lf-background optml-bg-lazyloaded" style="%profile-bg-thumbnail-style%"></div>

                                <div class="lf-item-info-2">                             

                                    <h4 class="case27-secondary-text listing-preview-title">%profile-title%</h4>

                                    <!--<h6>Edwardian picture house, screening mainstream films</h6>-->

                                    <ul class="lf-contact">

                                        %profile-phone-html%                       

                                        %profile-location-html%                                          

                                    </ul>

                                </div>

                                <div class="lf-head">
                                    <div class="lf-head-btn">
                                        %profile-salary-html%
                                    </div>
                                    <div class="lf-head-btn">
                                        %profile-vacancy-types-html%
                                    </div>
                                    <small class="profile-status %profile-status-classname%">
                                        <span class="fa fa-circle"></span>
                                        %profile-status%                            
                                    </small>
                                </div>

                                <div class="lf-author">
                                    <span class="fa fa-user"></span>
                                    <span class="author-name padLeft5">%profile-author%</span>
                                </div>

                            </a>

                        </div>

                        <div class="listing-details c27-footer-section">

                            %profile-category-list-html%
                            
                            <div class="ld-info">

                                <ul>

                                    <li class="item-preview" data-toggle="tooltip" data-placement="top" data-original-title="Quick view">
                                        <a href="#" type="button" class="c27-toggle-quick-view-modal" data-id="%profile-id%">
                                            <i class="mi zoom_in"></i>
                                        </a>
                                    </li>

                                    <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark">
                                        <a class="c27-bookmark-button" data-listing-id="%profile-id%" 
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