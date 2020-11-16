<?php 

	if ( is_category() ) :         

		$category = get_category( get_query_var('cat') );

		$args = array(

	        'post_type' => 'post',
	        'order' => 'desc',
	        'cat' => $category->term_id,
	        'meta_key' => 'post_views_count',	        
	        'orderby' => 'meta_value_num',
	        'posts_per_page' => 10

	    );

    	query_posts( $args );

    	if ( have_posts() ) :

            echo $before_widget; ?>

            <div class="widget-container">

    <?php       echo $before_title . $title . $after_title; ?>

        		<nav>

        			<ul>

    		    	<?php 
    		    		while ( have_posts() ) : the_post(); ?>

    		    			<li>
                                <div class="thumbnail">

                                    <a href="<?php the_permalink() ?>">
                                        <?php the_post_thumbnail( array(75, 75) ); ?>
                                    </a>

                                </div>

                                <div class="title">

                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        	$text = get_the_title();
                                            $chars_length = mb_strlen($text, 'UTF-8');
                                            $limit = 50;
            
                                            //add ... so the user knows the text is actually longer
                                            if ($chars_length > $limit) :

                                                $text = mb_substr( $text, 0, $limit, 'UTF-8' );	
                                                $text = $text . "...";

                                                echo $text;

                                            else :

                                                echo get_the_title();

                                            endif;
                                        ?>
                                    </a>

                                </div>

                            </li>


    		    	<?php 
    		    		endwhile; ?>

    	    		</ul>

    	    	</nav>

            </div>

	<?php             
		  echo $after_widget;

        endif;        

	    wp_reset_query();

    endif;	