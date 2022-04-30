<?php 

    namespace Home\Sections;

    class NewsSectionPrintLargeArticleHtmlUtils {

       

        public static function render($post) {

            ob_start();  
            
                $url = get_the_post_thumbnail_url($post, 'feature-image-article-large-image');
                $post_permalink = get_the_permalink($post);
                $post_title = $post->post_title;
                $post_excerpt = $post->post_excerpt;
                             
                $day = date('d', strtotime($post->post_date));
                $month = date('m', strtotime($post->post_date)); ?>

                <article class="news-featured-article article-box-animation item-thumbnail-animation">

                    <div class="thumbnail">

                        <a class="bg-thumbnail bg-default-settings bg-fullheight backgroundi-lazy" 
                            href="<?= $post_permalink ?>" 
                            data-src="<?= $url ?>"></a>

                    </div>

                    <div class="metadata metadata-entries news-metadata-entries flex-layout flex-align-center flex-justify-center" >

                        <span class="bg-linear-shadow" ></span>
        
                        <div class="datetime news-datetime-entries">
                            <div class="day datetime-entry news-datetime-entry"><?= $day ?></div>
                            <span class="day datetime-entry news-datetime-entry news-datetime-separate"></span>
                            <div class="month datetime-entry news-datetime-entry"><?= $month ?></div>
                        </div>

                    </div>

                    <h3>
                        <a href="<?= $post_permalink ?>">
                            <?= $post_title ?>
                        </a>
                    </h3>

                    <p class="excerpt article-excerpt">
                        <?= $post_excerpt ?>
                    </p>

                    <p class="readmore article-readmore">
                        <a href="<?= $post_permalink ?>">Xem thêm</a>
                    </p>

                </article>

            <?php 
            
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;

        }

    }