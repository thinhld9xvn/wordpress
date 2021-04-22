<?php 
	$args = array(

		'post_type' => $sidebar_options['sidebar-carousel-testimolates-post-type-id'],		
		'order' => 'desc',
		'orderby' => 'date',
		'posts_per_page' => (int) $sidebar_options['sidebar-carousel-testimolates-num-items-id']

	);

	query_posts( $args );

	if ( have_posts() ) : ?>

		<div class="widget widget-profile-author-box profiles-slideshow">

		    <div class="profile-box-wrapper">

		    	<div class="owl-profiles owl-sidebar-testimolates owl-carousel owl-theme">

		    		<?php while ( have_posts() ) : the_post(); ?>		    		

			    		<div class="item">

					        <div class="prof-img">
					            <?php the_post_thumbnail('full') ?>
					        </div>
					        <div class="prof-introduction">
					            <div class="prof-text">
					             	<?php the_content(); ?>
					            </div>
					            <div class="prof-name">
					                <span><?php the_title(); ?></span> <br />
					                <span class="co"><?php the_excerpt(); ?></span>
					            </div>
					        </div>

					    </div>

					<?php endwhile; ?>

			    </div>

		    </div>
		</div>

<?php endif; 
		wp_reset_query(); ?>