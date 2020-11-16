<?php echo $before_widget; ?>

	<div class="widgetBox">

		<?php echo $before_title . $title . $after_title; ?>

		<ul class="pboxlist -list mtop10">

			<?php 
				$args = array(
					'post_type' => $post_type,
					'posts_per_page' => $num_items,
					'no_paging' => true,
					'order' => 'desc',
					'orderby' => 'date'
				);

				query_posts( $args );

				if ( have_posts() ) :

					while ( have_posts() ) : the_post(); ?>

					    <li>
					    	<a href="<?php the_permalink(); ?>">
					    		<span><?php the_title(); ?></span>
					    	</a>
					    </li>

			<?php 	endwhile; 
					wp_reset_query();

				endif; ?>			    

		</ul>

	</div>

<?php echo $after_widget; ?>