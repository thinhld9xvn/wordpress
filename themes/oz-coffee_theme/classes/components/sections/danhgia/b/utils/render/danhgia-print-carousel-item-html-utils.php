<?php 

    namespace Home\Sections;

    class ReviewsSectionPrintCarouselItemHtmlUtils {

        public static function render($post) { 
            
            ob_start(); 
            
            $author = $post->post_title;
            $avatar_url = ReviewsSectionGetMetaAvatarFieldUtils::get($post->ID);
            $jobtitle = ReviewsSectionGetMetaJobTitleFieldUtils::get($post->ID);
            
            $attachment_id = pn_get_attachment_id_from_url($avatar_url);
            
            $avatar = wp_get_attachment_image($attachment_id, "thumbnail");
            
            $comment = apply_filters('the_content', $post->post_content); ?>

            <div class="item reviews-elem-item">
                <div class="wrapper">
                    <div class="thumbnail">
                       <?php echo get_the_post_thumbnail($post, 'feature-image-testimolates-image'); ?>
                    </div>
                    <div class="contents">
                        <div class="avatar">
                            <?php echo $avatar ?>
                        </div>
                        <h4><?= $author ?></h4>
                        <h5><?= $jobtitle ?></h5>
                        <h5 class="comment">

                            <?php echo $comment; ?>
                           
                        </h5>
                    </div>
                </div>
            </div>

        <?php           

            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;
        }

    }