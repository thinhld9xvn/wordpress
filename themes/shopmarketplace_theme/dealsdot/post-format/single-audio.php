<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post">
		<?php echo get_post_meta($post->ID, 'klb_blogaudiourl', true); ?>
		
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