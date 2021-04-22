<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post">
		<figure class="entry-media embed-responsive embed-responsive-16by9">
	   <?php  
		if (get_post_meta( get_the_ID(), 'klb_blog_video_type', true ) == 'vimeo') {  
		  echo '<iframe src="//player.vimeo.com/video/'.get_post_meta( get_the_ID(), 'klb_blog_video_embed', true ).'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" height="515" allowFullScreen></iframe>';  
		}  
		else if (get_post_meta( get_the_ID(), 'klb_blog_video_type', true ) == 'youtube') {  
		  echo '<iframe height="450" src="//www.youtube.com/embed/'.get_post_meta( get_the_ID(), 'klb_blog_video_embed', true ).'?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" allowfullscreen></iframe>';  
		}  
		else {  
			echo ' '.get_post_meta( get_the_ID(), 'klb_blog_video_embed', true ).' '; 
		}  
		?>
		</figure>
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
			<?php the_excerpt(); ?>
			<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'dealsdot' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
		</div>
	</div>
</article>