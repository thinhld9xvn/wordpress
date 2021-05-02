<?php 

    namespace Profiles;

    class ProfilePrintListingDetailsTabUtils {

        public static function print() {

            $logged_in_users = get_transient('online_status');

            //echo var_dump($logged_in_users); 

            global $post;
            
            $tabs_info = _get_single_profile_listing_tabs_info(); 

            $profile_description = get_profile_description($post);

            $profile_book_online = get_profile_book_online($post);
            $profile_portfolio = get_profile_portfolio($post);
            $profile_demo_tape = get_profile_demo_tape($post);

            $profile_social_networks = get_profile_social_networks($post);
            $profile_categories = get_profile_terms($post);
            $profile_salary = get_profile_salary($post);
            $profile_qualifications = get_profile_qualifications($post);
            $profile_vacancy_types = get_profile_vacancy_types($post);
            $profile_galleries = get_profile_galleries($post);
            $profile_account_types = get_profile_account_types($post);
            $profile_rate_by_hour = get_profile_rates_by_hour($post);
            $profile_category_of_service = get_profile_category_of_service($post);
            $profile_languages = get_profile_languages($post);

            //echo var_dump( $profile_galleries );
            
            ?>

            <section class="profile-body listing-tab tab-type-main tab-layout-content-sidebar pre-init tab-active" 
                    id="listing_tab_<?php echo $tabs_info['details']['id'] ?>">

                <div class="container tab-template-content-sidebar">

                    <div class="row">

                        <div class="col-md-7">

                            <div class="row cts-column-wrapper cts-left-column">

                                <!--<div class="col-md-12 block-type-related_listing block-field-job-place-relation" 
                                    id="block_Cza1PGO">

                                    <div class="element related-listing-block">

                                        <div class="pf-head">
                                            <div class="title-style-1">
                                                <i class="mi layers"></i>
                                                <h5>Company</h5>
                                            </div>
                                        </div>

                                        <div class="pf-body">
                                            <div class="event-host">
                                                <a href="http://artist-corner-demo.io/listing/liman-restaurant/">
                                                    <div class="avatar">
                                                        <img src="http://artist-corner-demo.io/wp-content/uploads/2020/11/2625af16c063a7-150x150.png" />
                                                    </div>
                                                    <span class="host-name">Liman Restaurant</span>
                                                </a>
                                            </div>
                                        </div>

                                    </div>

                                </div>-->

                                <?php if ( $profile_description ) : ?>

                                    <div class="col-md-12 block-type-text block-field-job_description" 
                                        id="block_9rqNY7v">
                                        
                                        <div class="element content-block wp-editor-content">

                                            <div class="pf-head">

                                                <div class="title-style-1">
                                                    <i class="mi view_headline"></i>
                                                    <h5>Description</h5>
                                                </div>

                                            </div>
                                            
                                            <div class="pf-body">

                                                <?php echo apply_filters('the_contents', $profile_description); ?>

                                            </div>

                                        </div>

                                    </div>

                                <?php endif; ?>

                                <?php if ( $profile_book_online ) : ?>

                                    <div class="col-md-12 block-type-file block-field-book-online __toggle-show-mores" 
                                        id="block_profile_book_online">

                                        <div class="element files-block files-count-1">

                                            <div class="pf-head">
                                                <div class="title-style-1">
                                                    <i class="mi attach_file"></i>
                                                    <h5>Book online</h5>
                                                </div>
                                            </div>

                                            <div class="pf-body">

                                                <ul class="file-list">

                                                    <?php foreach ( $profile_book_online as $key => $attachment_url ) : 
                                                        $attachment_name = basename($attachment_url);
                                                        $ext = array_pop(explode('.', $attachment_name)); ?>

                                                        <a href="<?php echo $attachment_url ?>" target="_blank">
                                                            <li class="file">
                                                                <span class="file-icon"><i class="<?= get_fontawesome_file_icon($ext) ?>"></i></span>
                                                                <span class="file-name"><?php echo $attachment_name ?></span>
                                                                <span class="file-link">View<i class="mi open_in_new"></i></span>
                                                            </li>
                                                        </a>
                                                    
                                                    <?php endforeach; ?>

                                                </ul>
                                            </div>

                                        </div>

                                    </div>

                                <?php endif; ?>

                                <?php if ( $profile_portfolio ) : ?>

                                    <div class="col-md-12 block-type-file block-field-portfolio __toggle-show-mores" 
                                        id="block_profile_portfolio">

                                        <div class="element files-block files-count-1">

                                            <div class="pf-head">
                                                <div class="title-style-1">
                                                    <i class="mi attach_file"></i>
                                                    <h5>Portfolio</h5>
                                                </div>
                                            </div>

                                            <div class="pf-body">

                                                <ul class="file-list">

                                                    <?php foreach ( $profile_portfolio as $key => $attachment_url ) : 
                                                        $attachment_name = basename($attachment_url);
                                                        $ext = array_pop(explode('.', $attachment_name)); ?>

                                                        <a href="<?php echo $attachment_url ?>" target="_blank">
                                                            <li class="file">
                                                                <span class="file-icon"><i class="<?= get_fontawesome_file_icon($ext) ?>"></i></span>
                                                                <span class="file-name"><?php echo $attachment_name ?></span>
                                                                <span class="file-link">View<i class="mi open_in_new"></i></span>
                                                            </li>
                                                        </a>
                                                    
                                                    <?php endforeach; ?>

                                                </ul>
                                            </div>

                                        </div>

                                    </div>

                                <?php endif; ?>

                                <?php if ( $profile_demo_tape ) : ?>

                                    <div class="col-md-12 block-type-file block-field-demo-tape __toggle-show-mores" 
                                        id="block_profile_demo_tape">

                                        <div class="element files-block files-count-1">

                                            <div class="pf-head">
                                                <div class="title-style-1">
                                                    <i class="mi attach_file"></i>
                                                    <h5>Demo tape</h5>
                                                </div>
                                            </div>

                                            <div class="pf-body">

                                                <ul class="file-list">

                                                    <?php foreach ( $profile_demo_tape as $key => $attachment_url ) : 
                                                        $attachment_name = basename($attachment_url);
                                                        $ext = array_pop(explode('.', $attachment_name)); ?>

                                                        <a href="<?php echo $attachment_url ?>" target="_blank">
                                                            <li class="file">
                                                                <span class="file-icon"><i class="<?= get_fontawesome_file_icon($ext) ?>"></i></span>
                                                                <span class="file-name"><?php echo $attachment_name ?></span>
                                                                <span class="file-link">View<i class="mi open_in_new"></i></span>
                                                            </li>
                                                        </a>
                                                    
                                                    <?php endforeach; ?>

                                                </ul>
                                            </div>

                                        </div>

                                    </div>

                                <?php endif; ?>                            

                                <?php //if ( $profile_social_networks ) : ?>

                                    <!--<div class="col-md-12 block-type-social_networks" 
                                        id="block_yGZ498M">

                                        <div class="element">

                                            <div class="pf-head">
                                                <div class="title-style-1">
                                                    <i class="mi view_module"></i>
                                                    <h5>Social Networks</h5>
                                                </div>
                                            </div>

                                            <div class="pf-body">

                                                <ul class="outlined-list details-list social-nav item-count-<?php echo sizeof($profile_social_networks) ?>">

                                                    <?php foreach( $profile_social_networks as $key => $social ) : ?>

                                                        <li class="li_aHkmahZ">
                                                            <a href="<?php echo $social['url'] ?>"> 
                                                                <i class="<?php echo get_profile_social_network_icon($social['network']) ?>"></i> 
                                                                <span><?php echo $social['network'] ?></span> 
                                                            </a>
                                                        </li>      
                                                        
                                                    <?php endforeach; ?>
                                                    
                                                </ul>

                                            </div>

                                        </div>

                                    </div>-->

                                <?php //endif; ?>

                            </div>

                        </div>

                        <div class="col-md-5">

                            <div class="row cts-column-wrapper cts-right-column">                           

                                <?php if ( $profile_categories ) : ?>

                                    <div class="col-md-12 block-type-categories" 
                                        id="block_MmJZRGD">

                                        <div class="element">
                                            <div class="pf-head">
                                                <div class="title-style-1">
                                                    <i class="mi view_module"></i>
                                                    <h5>Categories</h5>
                                                </div>
                                            </div>
                                            <div class="pf-body">

                                                <div class="listing-details item-count-<?php echo sizeof($profile_categories) ?>">

                                                    <ul>

                                                        <?php foreach( $profile_categories as $key => $category ) : 
                                                                
                                                                $cat_bg_color = get_profile_term_color($category);
                                                                $cat_text_color = get_profile_term_text_color($category); ?>
                                                            
                                                            <li>
                                                                <a href="<?php echo get_term_link($category) ?>">

                                                                    <span class="cat-icon" 
                                                                        <?= $cat_bg_color ? 'style="background-color: ' . $cat_bg_color . '"' : '' ?>>

                                                                        <i class="icon-user-male" 
                                                                                <?= $cat_text_color ? 'style="color: ' . $cat_text_color . '"' : '' ?>></i>

                                                                    </span>

                                                                    <span class="category-name"><?php echo $category->name ?></span>

                                                                </a>
                                                            </li>

                                                        <?php endforeach; ?>

                                                    </ul>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>

                                <?php if ( $profile_salary ) : ?>

                                    <div class="col-md-12 block-type-terms" id="block_4TenbyM">
                                        <div class="element">
                                            <div class="pf-head">
                                                <div class="title-style-1">
                                                    <i class="mi view_module"></i>
                                                    <h5>Salary</h5>
                                                </div>
                                            </div>
                                            <div class="pf-body">
                                                <ul class="outlined-list details-list social-nav item-count-<?php echo sizeof($profile_salary) ?>">

                                                    <li class="li_9UnRVwb">
                                                        <a>
                                                            <i class="fa fa-money" style=""></i>
                                                            <span><?php echo '$' . $profile_salary ?></span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>

                                <?php if ( $profile_qualifications ) : ?>

                                    <div class="col-md-12 block-type-terms __toggle-show-mores" id="block_6kgOE6j">
                                        <div class="element">
                                            <div class="pf-head">
                                                <div class="title-style-1">
                                                    <i class="mi view_module"></i>
                                                    <h5>Qualification</h5>
                                                </div>
                                            </div>
                                            <div class="pf-body">

                                                <ul class="outlined-list details-list social-nav item-count-<?php echo sizeof($profile_qualifications) ?>">
                                                    
                                                    <?php foreach( $profile_qualifications as $key => $qualification ) : ?>

                                                        <li class="li_ZTB73cb">
                                                            <a>
                                                                <i class="mi bookmark_border" style=""></i>
                                                                <span><?php echo $qualification->name ?></span>
                                                            </a>
                                                        </li>

                                                    <?php endforeach; ?>
                                                
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>

                                <?php if ( $profile_vacancy_types ) : ?>

                                    <div class="col-md-12 block-type-terms __toggle-show-mores" id="block_vacancy_types">
                                        <div class="element">
                                            <div class="pf-head">
                                                <div class="title-style-1">
                                                    <i class="mi view_module"></i>
                                                    <h5>Vacancy type</h5>
                                                </div>
                                            </div>
                                            <div class="pf-body">
                                                <ul class="outlined-list details-list social-nav item-count-<?php echo sizeof($profile_vacancy_types) ?>">

                                                    <?php foreach ( $profile_vacancy_types as $key=> $vacancy_type ) : ?>
                                                            
                                                        <li class="li_VvbKsPC">

                                                            <a>

                                                                <i class="mi bookmark_border" style=""></i>
                                                                <span><?php echo $vacancy_type->name ?></span>

                                                            </a>

                                                        </li>

                                                    <?php endforeach; ?>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>

                                <?php if ( $profile_account_types ) : ?>

                                    <div class="col-md-12 block-type-terms __toggle-show-mores" id="block_account_types">
                                        <div class="element">
                                            <div class="pf-head">
                                                <div class="title-style-1">
                                                    <i class="mi view_module"></i>
                                                    <h5>Account type</h5>
                                                </div>
                                            </div>
                                            <div class="pf-body">
                                                <ul class="outlined-list details-list social-nav item-count-<?php echo sizeof($profile_account_types) ?>">

                                                    <?php foreach ( $profile_account_types as $key=> $term ) : ?>
                                                            
                                                        <li class="li_VvbKsPC">

                                                            <a>

                                                                <i class="mi bookmark_border" style=""></i>
                                                                <span><?php echo $term->name ?></span>

                                                            </a>

                                                        </li>

                                                    <?php endforeach; ?>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>

                                <?php if ( $profile_rate_by_hour ) : ?>

                                    <div class="col-md-12 block-type-terms __toggle-show-mores" id="block_rate_by_hour">
                                        <div class="element">
                                            <div class="pf-head">
                                                <div class="title-style-1">
                                                    <i class="mi view_module"></i>
                                                    <h5>Rate by hour</h5>
                                                </div>
                                            </div>
                                            <div class="pf-body">
                                                <ul class="outlined-list details-list social-nav item-count-<?php echo sizeof($profile_rate_by_hour) ?>">

                                                    <li class="li_VvbKsPC">

                                                        <a>

                                                            <i class="fa fa-money" style=""></i>
                                                            <span><?php echo '$' . $profile_rate_by_hour ?></span>

                                                        </a>

                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>

                                <?php if ( $profile_category_of_service ) : ?>

                                    <div class="col-md-12 block-type-terms __toggle-show-mores" id="block_category_of_service">
                                        <div class="element">
                                            <div class="pf-head">
                                                <div class="title-style-1">
                                                    <i class="mi view_module"></i>
                                                    <h5>Category of service</h5>
                                                </div>
                                            </div>
                                            <div class="pf-body">
                                                <ul class="outlined-list details-list social-nav item-count-<?php echo sizeof($profile_category_of_service) ?>">

                                                    <?php foreach ( $profile_category_of_service as $key=> $term ) : ?>
                                                            
                                                        <li class="li_VvbKsPC">

                                                            <a>

                                                                <i class="mi bookmark_border" style=""></i>
                                                                <span><?php echo $term->name ?></span>

                                                            </a>

                                                        </li>

                                                    <?php endforeach; ?>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>

                                <?php if ( $profile_languages ) : ?>

                                    <div class="col-md-12 block-type-terms __toggle-show-mores" id="block_account_types">
                                        <div class="element">
                                            <div class="pf-head">
                                                <div class="title-style-1">
                                                    <i class="mi view_module"></i>
                                                    <h5>Languages</h5>
                                                </div>
                                            </div>
                                            <div class="pf-body">
                                                <ul class="outlined-list details-list social-nav item-count-<?php echo sizeof($profile_languages) ?>">

                                                    <?php foreach ( $profile_languages as $key=> $lang ) : ?>
                                                            
                                                        <li class="li_VvbKsPC">

                                                            <a>

                                                                <i class="fa fa-language" style=""></i>
                                                                <span><?php echo $lang->name ?></span>

                                                            </a>

                                                        </li>

                                                    <?php endforeach; ?>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>                            

                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 flex-layout flex-just-center">
                        <a class="btnViewLocation btnToggleSection" href="#">Show mores</a>
                    </div>

                </div>
                
            </section>



        <?php }

    }