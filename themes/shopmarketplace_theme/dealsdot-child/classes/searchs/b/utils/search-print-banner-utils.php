<?php 

    namespace Searchs;

    class SearchPrintBannerUtils {

        public static function print() {

            $banner_button_url = \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_BUTTON_URL_ID,
															\Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SECTION_ID);
															
            $banner_image_url = \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_IMAGE_ID,
                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SECTION_ID); 
            
            $heading_text = \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_HEADING_TEXT_ID,
                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SECTION_ID);
                                                                            
            $medium_text = \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_MEDIUM_TEXT_ID,
                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SECTION_ID);
                                                                            
            $small_text = \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SMALL_TEXT_ID,
                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SECTION_ID);
                                                                        
            $banner_button_text = \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_BANNER_BUTTON_TEXT_ID,
                                                                            \Theme_Options\THEME_OPTIONS_FIELDS::SEARCH_PAGE_SECTION_ID);?>

            <div id="page-entry-banner">

                <a href="<?php echo $banner_button_url ?>">

                    <?php if ( ! empty( $banner_image_url ) ) :
                    
                            $attachment_id = \Attachments\AttachmentGetIdFromUrlUtils::get($banner_image_url);
                            $attachment_thumbnail = wp_get_attachment_image( $attachment_id, 'full' ); 

                            echo $attachment_thumbnail;

                        endif; ?>

                </a>

                <?php if ( ! empty( $heading_text ) &&
                        ! empty( $medium_text ) && 
                        ! empty( $small_text ) && 
                        ! empty( $banner_button_text ) ) : ?>

                    <figcaption>

                        <h2><?php echo $heading_text ?></h2>
                        <h4><?php echo $medium_text ?></h4>
                        <h5><?php echo $small_text ?></h5>

                        <a href="<?php echo $banner_button_url ?>" 
                            class="btn btn-primary">
                            <?php echo $banner_button_text ?>
                        </a>
                    </figcaption>

                <?php endif; ?>

            </div>

        <?php }

    }