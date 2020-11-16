<?php echo $before_widget; ?>

	<h2 class="headingFooterTitle -two-sample">							
		<?php echo $title; ?>
	</h2>

	<div class="rowContent mtop20">

		<div class="footer-lightgallery lightGallery">

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

					while ( have_posts() ) : the_post(); 

						$thumbnail_url = wp_get_attachment_image_url( get_post_thumbnail_id( get_the_id() ), 'full', false ); ?>

						<a href="<?php echo $thumbnail_url; ?>">
							<?php the_post_thumbnail( 'full' ); ?>
						</a>	

			<?php 	endwhile; 
					wp_reset_query();

				endif; ?>		
		
		</div>
		
	</div>

<?php echo $after_widget; ?>