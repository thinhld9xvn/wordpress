<?php 

    namespace Home\Sections;

    class SVSectionPrintCatalogEntryHtmlUtils {

        public static function render($post) {

            ob_start(); 
            
            $thumbnail_url = get_the_post_thumbnail_url( $post, 'feature-image-galleries-large-image' );

            $post_title = $post->post_title;
            $post_permalink = get_the_permalink($post);

            $icon_url = SVGetMetaIconFieldUtils::get($post->ID);
            
            $icon_id = pn_get_attachment_id_from_url($icon_url);

            $icon_attachment = wp_get_attachment_image($icon_id, 'full');
            
            ?> 
            
            <div class="item item-thumbnail-animation item-rotate-icon-animation" >
                <div class="wrapper" >
                    <div class="thumbnail bg-default-settings bg-fullheight backgroundi-lazy" 
                         data-src="<?= $thumbnail_url ?>"></div>

                    <figure class="flex-layout flex-justify-center flex-align-center flex-direction-column">

                        <?php echo $icon_attachment ?>

                        <label><?= $post_title ?></label>

                    </figure>

                    <a class="catalog-link" href="<?= $post_permalink ?>"></a>

                </div>
            </div>  

        <?php 
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;

        }

    }