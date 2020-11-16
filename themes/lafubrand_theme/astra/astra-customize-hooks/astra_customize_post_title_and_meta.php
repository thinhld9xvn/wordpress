<?php 
	if ( ! function_exists('_astra_blog_post_title') ) :

		function _astra_blog_post_title() { 

			$shortcode = '[toc]';
			$fixedtoc_contents = do_shortcode($shortcode); ?>

			<header class="entry-header ast-no-thumbnail">

				<div class="ast-single-post-order">

					<h1 class="entry-title" itemprop="headline">
						<?php the_title(); ?>
					</h1>

					<div class="post-entry-meta show-laptop">

						<span class="post-published-date">

							<span class="fa fa-history"></span>
							<span class="caption">Ngày đăng: <?php echo get_the_date( 'd/m/Y g:i:s a' ) ?></span>
							
						</span>

						<span class="delimiter">|</span>

						<span class="post-modified-date">

							<span class="fa fa-calendar-check-o"></span>
							<span class="caption">Ngày cập nhật: <?php echo get_the_modified_date( 'd/m/Y g:i:s a' ) ?></span>
							
						</span>

						
					</div>

					<div class="post-entry-meta show-mobile">

						<span class="post-published-date">

							<span class="fa fa-history"></span>
							<span class="caption">Ngày đăng: <?php echo get_the_date( 'd/m/Y' ) ?></span>
							
						</span>

						<span class="delimiter">|</span>

						<span class="post-modified-date">

							<span class="fa fa-calendar-check-o"></span>
							<span class="caption">Cập nhật: <?php echo get_the_modified_date( 'd/m/Y' ) ?></span>
							
						</span>

						
					</div>

					<?php if ( $fixedtoc_contents !== $shortcode ) : ?>

						<div class="post-fixed-toc mtop20">

							<?php echo $fixedtoc_contents ?>
							
						</div>

					<?php endif; ?>

				</div>

			</header>

 <?php }

	endif;
	