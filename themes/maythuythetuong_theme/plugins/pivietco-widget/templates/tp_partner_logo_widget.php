<?php 
	echo $before_widget;
		echo $before_title . $title . $after_title; ?>

		<!-- bxslider-cn-wrapper -->
		<div class="bxslider-cn-wrapper partnerLogo-cn-wrapper mtop20">

			<!-- bxslider-partnerLogo -->
			<ul id="bxslider-partnerLogo" class="bxslider --carousel">

				<?php 
					$args = array(
						'post_type' => $post_type,
						'order' => 'desc',
						'orderby' => 'date',
						'posts_per_page' => $num_items,
						'nopaging' => true							
					);
					query_posts( $args ); 

					if ( have_posts() ) :

						while ( have_posts() ) : the_post(); ?>

							<li class="tcenter">

								<?php the_post_thumbnail( 'full',
														  array(
														  	'class' => 'inline'
														  ) 
														); ?>					
							</li>

			<?php   	endwhile; 
						wp_reset_query();

					endif; ?>		

			</ul>
			<!-- #bxslider-partnerLogo -->

		</div>
		<!-- #bxslider-cn-wrapper -->

<?php 
	echo $after_widget; ?>