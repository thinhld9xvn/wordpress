<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post">
		<?php $images = rwmb_meta( 'klb_blogitemslides', 'type=image_advanced&size=medium' ); ?>
		<?php if($images) { ?>
			<?php wp_enqueue_script( 'dealsdot-blog-gallery'); ?>
			<div class="blog-gallery"> 
				<div class="slider-items slider-width-col1 owl-carousel owl-theme"> 
					<?php  foreach ( $images as $image ) { ?>
						<img src="<?php echo esc_url($image['full_url']); ?>" alt="<?php esc_attr_e('blogimage','dealsdot'); ?>">
					<?php } ?>
				</div>
			</div>
		<?php } ?>
		
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		
		<a href="<?php the_permalink(); ?>"><span class="date-time"><?php echo get_the_date(); ?></span></a>
		<?php if(has_category()){ ?>
		<span class="cat"><?php the_category(', '); ?></span>
		<?php } ?>
		<?php the_tags( '<span class="tags">', ', ', ' </span>'); ?>
		<?php if ( is_sticky()) {
			printf( '<span class="sticky">%s</span>', esc_html__( 'Featured', 'dealsdot' ) );
		} ?>
		
		<div class="klb-post">
			<?php the_content(); ?>
			<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'dealsdot' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
		</div>
	</div>
</article>