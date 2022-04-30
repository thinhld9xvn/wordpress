<?php 

    namespace Archive\News;

    class NewsPrintArticleHtmlUtils  {


        public static function render($post) {            

            $post_title = $post->post_title;
            $post_excerpt = short_text($post->post_excerpt, 200);
            $post_permalink = get_the_permalink($post);

            $thumbnail_url = get_the_post_thumbnail_url($post, 'feature-image-article-large-image'); 
            
            $day = date('d', strtotime($post->post_date));
            $month = date('m', strtotime($post->post_date)); ?>
            
            <article class="article-single-element article-cambridge-element article-news-cambridge-element item-thumbnail-animation article-box-animation">

                <a class="thumbnail bg-thumbnail bg-default-settings bg-fullheight backgroundi-lazy" 
                    href="<?= $post_permalink ?>" 
                    data-src="<?= $thumbnail_url ?>"></a>

                <div class="metadata metadata-entries news-metadata-entries article-metadata-entries flex-layout flex-align-center flex-justify-center" >
                    <span class="bg-linear-shadow" ></span>
    
                    <div class="datetime news-datetime-entries">
                        <div class="day datetime-entry news-datetime-entry"><?= $day ?></div>
                        <span class="day datetime-entry news-datetime-entry news-datetime-separate"></span>
                        <div class="month datetime-entry news-datetime-entry"><?= $month ?></div>
                    </div>
                </div>                                         

                <h4 class="no-border-line">
                    <a href="<?= $post_permalink ?>">
                        <?= $post_title ?>
                    </a>
                </h4>

                <figcaption>
                    <p class="description"><?= $post_excerpt ?></p>
                    <p class="readmore article-readmore">
                        <a href="<?= $post_permalink ?>">Xem thêm</a>
                    </p>
                </figcaption>

            </article>
            
        <?php }

    }