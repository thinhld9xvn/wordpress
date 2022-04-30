<?php 

    namespace Home\Sections;

    class NewsSectionPrintNormalArticleHtmlUtils {


        public static function render($post) {

            ob_start();  
               
                $post_permalink = get_the_permalink($post);
                $post_title = $post->post_title;
                $post_excerpt = $post->post_excerpt; ?>

                <article class="article-item item-thumbnail-animation article-box-animation flex-layout">

                    <div class="thumbnail">

                        <a href="<?= $post_permalink ?>">

                            <?php echo get_the_post_thumbnail($post, 'feature-image-article-normal-image',
                                                                array(
                                                                    'class' => 'image-thumbnail img-fullheight'
                                                                )) ?>

                        </a>
                       
                    </div>

                    <div class="contents">
                        <h4>
                            <a href="<?= $post_permalink ?>">
                                <?= $post_title ?>
                            </a>
                        </h4>
                        <p class="excerpt article-excerpt article-normal-excerpt">
                            <span><?= $post_excerpt ?></span>
                            <span class="readmore article-readmore">
                                <a href="<?= $post_permalink ?>">Xem thêm</a
                            ></span>
                        </p>
                    </div>
                </article>
               
            <?php 
            
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;

        }

    }