<?php

	function astra_customize_the_excerpt() {

		return '...';

	}

   add_filter('excerpt_more', 'astra_customize_the_excerpt');

   function __astra_archive_get_temp_post($is_description = true) { 

   		$category = get_the_category();
   		$category = $category[0]; ?>

   		<div class="thumbnail">

			<a href="<?php the_permalink() ?>">

				<?php the_post_thumbnail('feature-image-article-thumbnail') ?>

			</a>

			<a class="cat" href="<?= get_category_link($category) ?>">

				<span class="fa fa-tags"></span>

				<span>
					<?php echo $category->name ?>
				</span>
				
			</a>

			<a class="readmore" 
			   href="<?php the_permalink() ?>">

			   <span>

			   		Xem thêm 
			   		<span class="fa fa-angle-double-right"></span>

			   	</span>


			</a>
			
		</div>

		<div class="title mtop10">

			<a href="<?php the_permalink() ?>">
				<strong><?php the_title(); ?></strong>
			</a>

		</div>

		<?php if ( $is_description ) : ?>

			<div class="description mtop10">

				<?php the_excerpt(); ?>

			</div>

		<?php endif; ?>


   <?php }

	function __astra_archive_get_featured_post($counter) { 

		if ( $counter === 0 ) : ?>

			<article class="article-featured-large-post">

				<?php __astra_archive_get_temp_post() ?>
				
			</article>

	<?php 
		endif;
	}

	function __astra_archive_get_formular_posts($counter) { 

		if ( in_array($counter, [1, 2]) ) : ?>

			<article class="article-formular-post">

				<?php __astra_archive_get_temp_post(false) ?>
				
			</article>

	<?php 
		endif;
	}

	function __astra_archive_get_normal_posts($counter) { 

		if ( $counter > 2 ) : ?>

			<article class="item-object">

				<?php __astra_archive_get_temp_post() ?>
				
			</article>

	<?php 
		endif;
	}

	function __astra_print_opening_tag_wrapper($counter) { 

		if ( $counter === 0 ) :

			echo "<div class='archive-articles-wrapper'>";

	
		endif; 
	}

	function __astra_print_closing_tag_wrapper($counter, $length) {

		$boolCheck = $length > 0 && $length < 4 && $counter === $length - 1;

		if ( ! $boolCheck ) :

			$boolCheck = $counter === 2;

		endif;

		if ( $boolCheck ) :

			echo "</div>";


		endif;		

	}

	function __astra_print_opening_tag_formular($counter) {

		if ( $counter === 1 ) :

			echo "<div class='article-formular-wrapper'>";

		endif;

	}

	function __astra_print_closing_tag_formular($counter, $length) {

		$boolCheck = $length > 1 && $length < 4 && $counter === $length - 1;

		if ( ! $boolCheck ) :

			$boolCheck = $counter === 2;

		endif;

		if ( $boolCheck ) :

			echo "</div>";

		endif;

	}

	function __astra_print_opening_tag_normal($counter) {

		if ( $counter === 3 ) :

			echo '<div class="article-normal-wrapper split-columns two-columns-layout">';

		endif;

	}

	function __astra_print_closing_tag_normal($counter, $length) {

		if ( $length > 3 && $counter === $length - 1 ) :

			echo "</div>";

		endif;

	}

	function astra_get_paged_tag() {

		return (int) array_pop( explode('/', $_SERVER['REQUEST_URI']) );

	}

	function astra_customize_archive_content_loop() { 

		$paged = get_query_var('paged') ? (int) get_query_var('paged') : 1;		

		$args = array(			
			
			'orderby' => 'date',
			'order' => 'desc',
			'paged' => $paged

		);

		if ( is_category() ) :

			$args['cat'] = get_query_var('cat');

		else :

			$tagID = get_query_var('tag_id');
			
			$GLOBALS['tag_id'] = $tagID;

			$args['meta_key'] = '_astra_subject_tags_list';
			$args['meta_value'] = "\"id\":\"{$tagID}\"";
			$args['meta_compare'] = 'LIKE';	

			$paged = astra_get_paged_tag();
			$paged = $paged > 0 ? $paged : 1;	

			$args['paged'] = $paged;		

		endif;		

		$posts_list = query_posts( $args );		

		if ( have_posts() ) :

			$counter = 0; 
			$length = sizeof( $posts_list ); ?>

			<div class="archive-articles-codeblock">

	<?php 		while ( have_posts() ) : the_post(); 

					__astra_print_opening_tag_wrapper($counter); ?>

						<?php __astra_archive_get_featured_post($counter); ?>

			<?php   	__astra_print_opening_tag_formular($counter); ?>						

						<?php __astra_archive_get_formular_posts($counter); ?>	

			<?php   	__astra_print_closing_tag_formular($counter, $length); ?>						

			<?php 	__astra_print_closing_tag_wrapper($counter, $length); ?>			

				<?php __astra_print_opening_tag_normal($counter); ?>

						<?php __astra_archive_get_normal_posts($counter); ?>	

				<?php __astra_print_closing_tag_normal($counter, $length); ?>		

					<?php 

						$counter++;

				endwhile; ?>

			</div>

			<?php the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( '', 'lafubrand' ),
					'next_text' => __( '', 'lafubrand' ),
				) ); ?>

	<?php endif;	

		wp_reset_query();			  
	}

	function astra_customize_archive_hooks() {

		if ( is_category() || is_tag() ) :

			remove_all_actions('astra_content_loop');
			remove_all_actions('astra_pagination');

			add_action('astra_content_loop', 'astra_customize_archive_content_loop');

		endif;

	}

	add_action('wp', 'astra_customize_archive_hooks');