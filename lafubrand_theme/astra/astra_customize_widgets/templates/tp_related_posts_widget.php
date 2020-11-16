<?php 
    if ( is_single() ) : 

        global $post;
        
        echo $before_widget; ?>

          <div class="widget-container">       
        
    <?php   echo $before_title . $title . $after_title; 
            
            $args = array(

                'post_type' => 'post',
                'order' => 'desc',
                'orderby' => 'date',
                'category__in' => $category->term_id,
                'post__not_in' => array( $post->ID ),						
                'posts_per_page' => $num_posts

            );

            query_posts( $args ); ?>

            <nav>

                <ul>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <li>
                            <div class="thumbnail">

                                <a href="<?php the_permalink() ?>">
                                    <?php the_post_thumbnail(array($thumb_width, $thumb_height)); ?>
                                </a>

                            </div>

                            <div class="title">

                                <a href="<?php the_permalink(); ?>">
                                    <?php  
                                        if ( $limit_post_title_chars === -1 ) :

                                            echo get_the_title();

                                        else :

                                            $chars_text = strlen(get_the_title());
            
                                            //add ... so the user knows the text is actually longer
                                            if ($chars_text > $limit_post_title_chars) :

                                                $text = mb_substr( $text, 0, $limit, 'UTF-8' );	
                                                $text = $text . "...";

                                                echo $text;

                                            else :

                                                echo get_the_title();

                                            endif;

                                        endif;
                                    ?>
                                </a>

                            </div>

                        </li>
                    
                    <?php endwhile; ?>
                </ul>

            </nav>

         </div>

<?php 
        echo $after_widget;
        wp_reset_query();
    endif;
?>