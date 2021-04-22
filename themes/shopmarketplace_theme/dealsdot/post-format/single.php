<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post">
		<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
			<?php  
				$att=get_post_thumbnail_id();
				$image_src = wp_get_attachment_image_src( $att, 'full' );
				$image_src = $image_src[0]; 
			?>
			<a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo esc_url($image_src); ?>" alt="<?php the_title_attribute(); ?>"></a>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php } else { ?>
			<h1 class="no-image"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php } ?>
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