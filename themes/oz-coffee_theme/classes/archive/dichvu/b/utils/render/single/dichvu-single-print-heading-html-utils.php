<?php 

    namespace Archive\Services;

    class SVSinglePrintHeadingHtmlUtils  {

        public static function render($post) { 
            
            $heading = SVGetMetaHeadingFieldUtils::get($post->ID);
            $short_contents = SVGetMetaShortContentsFieldUtils::get($post->ID);

            $video_image_url = SVGetMetaVideoImageFieldUtils::get($post->ID);
            $video_image_attachment_id = pn_get_attachment_id_from_url($video_image_url);
            $video_image_attachment = wp_get_attachment_image($video_image_attachment_id, 'feature-image-article-large-image');  
            
            $extras_content = SVGetMetaExtraContentsFieldUtils::get($post->ID);
            
            $video_url = SVGetMetaVideoUrlFieldUtils::get($post->ID); ?>

            <div class="page-elements-heading">

                <div class="container">

                    <h2 class="sectionTitleHeading sectionPageMainTitle text-center">

                        <div class="maintitle">
                            <?= $heading ?>
                        </div>

                    </h2>
                    
                    <div class="page-contents">

                        <div class="opening-paragraph-element grid-two-columns grid-no-pad">

                            <div class="paragraph-element elements-no-mgtop">   
                                
                                <?php echo apply_filters('the_content', $short_contents); ?>
                               
                            </div>
                            <div class="video-element element-no-mgtop">

                                <div class="wrapper">
                                    
                                    <a href="<?= $video_url ?>">
                                        <?php echo $video_image_attachment ?>
                                    </a>

                                </div>

                            </div>

                        </div>

                        <div class="extras-paragraph-element">

                            <?php 
                                echo apply_filters('the_content', $extras_content);
                            ?>

                        </div>

                    </div>

                </div>

            </div>

        <?php }

    }