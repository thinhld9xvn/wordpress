<?php 
	/* Template Name: Diensten Template */ 

	define('DIENSTEN_LAYOUT_DIRECTORY', get_template_directory() . '/layout/diensten');

	global $post;	

	if ( $post->post_parent ) :
		$parent = get_page( $post->post_parent );
	endif;

	$post_template = $post;

	while ( $post_template->post_parent > 0 ) :

		$post_template = get_post( $post_template->post_parent );

	endwhile;

	$previous_thread_text = get_post_meta( $post_template->ID, '_pt-field-diensten-template-previous-thread', true );
	$page_layout = get_post_meta( $post->ID, '_pt-field-diensten-item-layout', true );

	if ( 'none' === $page_layout ||
		 empty( $page_layout ) ) :

		  header("Location: " . get_site_url() . '/' . qt_get_current_lang() . '/#onze-section-hash' );

	endif;

	get_header(); ?>

</header>
<!-- #header -->

<!-- main -->
<section id="main">

	<!-- page-diensten -->
	<div class="page-custom-fullwidth page-diensten page-standard-layout">

		<!-- container -->
		<div class="container">	

			<div class="col-md-9 col-sm-9 col-xs-12 padright20-ms">

				<?php echo apply_filters( 'the_content', $post->post_content ); ?>

			</div>

			<div class="col-md-3 col-sm-3 col-xs-12 mtop20-xs">

				<ul class="pbox-list -default -lastspacing -item-center">

					<?php 

						$args = array(
							'post_type' => 'page',
							'child_of' => $post->ID,
							'hierarchical' => 0,
							'parent' => $post->ID,
							'sort_order' => 'asc',
							'sort_column' => 'post_date',
						);

						$child_pages = get_pages( $args );

						foreach ( $child_pages as $c_page ) :  ?>

						    <li>
						    	<a href="<?php echo get_page_link( $c_page ); ?>">
						    		<?php echo $c_page->post_title; ?>
						    	</a>
						   	</li>

				<?php   endforeach;

						if ( $parent ) : ?>

							<li>
								<a href="<?php echo get_page_link( $parent ); ?>">
						    		<?php echo $previous_thread_text . ' ' .  $parent->post_title ?>
						    	</a>
							</li>

				  <?php endif; ?>
				  			    
				</ul>

			</div>

		</div>
		<!-- #container -->

	</div>
	<!-- #page-diensten -->

</section>
<!-- #main -->

<?php get_footer(); ?>