<?php 
    echo $before_widget; 

        echo $before_title . $title . $after_title; ?>
    
            <ul class="pboxlist --default">

                <?php 
                    $args = array(
                        'post_type' => 'post',
                        'category__in' => $cat_id,
                        'posts_per_page' => $posts_per_page,
                        'order' => 'desc',
                        'orderby' => 'date'
                    );
                    query_posts( $args ); 

                    while ( have_posts() ) : the_post(); ?>

                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <?php echo title(60); ?>
                            </a>
                        </li>

            <?php   endwhile; 
                    wp_reset_query(); ?>
                   
            </ul>      
    	
<?php echo $after_widget; ?>