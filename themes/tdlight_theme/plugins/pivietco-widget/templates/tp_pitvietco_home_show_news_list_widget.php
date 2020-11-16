<?php echo $before_widget; ?>

	<h2>
		<?php echo $title; ?>
	</h2>

	<?php 
		$args = array(

			'post_type' => 'post',
			'category__in' => $cat_id,
			'order' => 'desc',
			'order' => 'date',
			'posts_per_page' => $num_items,
			'no_paging' => true

		);

		query_posts( $args ); 

		if ( have_posts() ) : ?>

			<!-- footerColumnContent -->
			<div class="footerColumnContent mtop20">

				<ul class="pboxlist -footer-news">

					<?php while ( have_posts() ) : the_post(); ?>

					    <li>
					    	<a href="<?php the_permalink(); ?>">
					    		<?php echo title(200); ?>
					    	</a>
					    </li>

					<?php endwhile; ?>
				  
				</ul>
				
			</div>
			<!-- #footerColumnContent -->

  <?php endif; 
  		wp_reset_query(); ?>

<?php echo $after_widget; ?>