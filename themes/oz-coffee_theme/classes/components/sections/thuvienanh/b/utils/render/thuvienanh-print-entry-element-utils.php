<?php 

    namespace Home\Sections;

    class GalleriesSectionPrintEntryElementUtils {

    

        public static function render($post, $index) {

            ob_start(); 
            
                $url = get_the_post_thumbnail_url($post, 'feature-image-galleries-small-image');
                
                $post_permalink = get_the_permalink($post);
                $post_title = $post->post_title;
                
                $address = GalleriesGetMetaAddressFieldFieldUtils::get($post->ID); ?>

                <div class="gallery-item item-thumbnail-animation article-box-animation">

                    <div class="thumbnail">

                        <a href="<?= $post_permalink ?>" 
                            class="bg-thumbnail bg-default-settings bg-fullheight backgroundi-lazy"
                            data-src="<?= $url ?>"> </a>

                        <div class="metadata metadata-entries galleries-metadata-entries flex-layout flex-align-center flex-justify-center" >
                            <span class="bg-linear-shadow" ></span>

                            <div class="datetime news-datetime-entries">
                                <div class="number datetime-entry news-datetime-entry galleries-datetime-entry">
                                    <?= $index < 10 ? "0{$index}" : $index ?>
                                </div>
                            </div>

                        </div>

                    </div>

                    <h3>
                        <a href="<?= $post_permalink ?>">
                            <?= $post_title ?>
                        </a>
                    </h3>

                    <h5><?= $address ?></h5>

                </div>
            
            <?php 
                
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;

        }

    }