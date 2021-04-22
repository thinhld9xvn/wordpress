<?php

/**
 * page.php
 * @package WordPress
 * @subpackage Dealsdot
 * @since Dealsdot 1.0
 */
?>

<?php get_header(); ?>
		
	<?php get_template_part( 'includes/pageheader' ); ?>

	

	<?php $content = ''; ?>
	<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
		  <?php $content .= get_the_content(); ?>
	<?php  endwhile; ?>
	<?php endif; ?> 
	
	<?php if ( class_exists( 'woocommerce' ) ) { ?>

		<?php if (is_cart()) { ?>
			<div class="outer-top-ts">
				<div class="container">
					<div class="row ">
						<div class="col-md-12">
							<div class="shopping-cart">
								<?php while(have_posts()) : the_post(); ?>
									<?php the_content (); ?>
									<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'dealsdot' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
								<?php endwhile; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } elseif (is_checkout()) { ?>
			<div class="outer-top-ts">
				<div class="container">
					<div class="row ">
						<div class="col-md-12">
							<div class="klb-checkout-page">
							<?php while(have_posts()) : the_post(); ?>
								<?php the_content (); ?>
								<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'dealsdot' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
							<?php endwhile; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
	   <?php } elseif (is_account_page()) { ?>
			<div class="outer-top-ts">
				<div class="container">
					<div class="row ">
						<?php while(have_posts()) : the_post(); ?>
							<?php the_content (); ?>
							<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'dealsdot' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
	   <?php } elseif( has_shortcode( $content, 'vc_row' )) { ?>
		  
			<?php while(have_posts()) : the_post(); ?>
				<?php the_content (); ?>
				<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'dealsdot' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
			<?php endwhile; ?>
			
		<?php } else { ?>
			<div class="outer-top-ts">
				<div class="container">
					<div class="row ">
						<div class="col-md-10 col-md-offset-1">
							<div class="klb-panel pl-20 pr-20">
								<?php while(have_posts()) : the_post(); ?>
									<h1 class="klb-page-title"><?php the_title(); ?></h1>
									<div class="klb-post">
										<?php the_content (); ?>
										<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'dealsdot' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
									</div>
								<?php endwhile; ?>
							</div>		
							<?php comments_template(); ?>
						</div>
					</div>         
				</div>
			</div>
		<?php } ?>
	<?php } else { ?>
	
	   <?php if( has_shortcode( $content, 'vc_row' )) { ?>
		  
			<?php while(have_posts()) : the_post(); ?>
				<?php the_content (); ?>
				<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'dealsdot' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
			<?php endwhile; ?>
			
		<?php } else { ?>
			<div class="outer-top-ts">
				<div class="container">
					<div class="row ">
						<div class="col-md-10 col-md-offset-1">
							<div class="klb-panel pl-20 pr-20">
								<?php while(have_posts()) : the_post(); ?>
									<h1 class="klb-page-title"><?php the_title(); ?></h1>
									<div class="klb-post">
										<?php the_content (); ?>
										<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'dealsdot' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
									</div>
								<?php endwhile; ?>
							</div>		
							<?php comments_template(); ?>
						</div>
					</div>         
				</div>
			</div>
		<?php } ?>
	<?php } ?>
<?php get_footer(); ?>