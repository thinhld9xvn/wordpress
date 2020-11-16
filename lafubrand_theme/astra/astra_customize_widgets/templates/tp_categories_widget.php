<?php

	$category = null;

	$box_titles = array(

		'thương hiệu' => 'KIẾN THỨC XÂY DỰNG THƯƠNG HIỆU',
		'digital marketing' => 'Kiến thức Digital Marketing',
		'kinh doanh' => 'Kiến thức Kinh doanh hiện đại',
		'ebook' => 'Ebook Thương hiệu & Marketing',
		'thị trường' => 'Kinh nghiệm Marketing tổng hợp'

	);

	if ( is_single() ) :

		$category = get_the_category();
		$category = $category[0];

	else :

		if ( is_category() ) :

			$cid = get_query_var('cat');

			$category = get_category( $cid );

		endif;

	endif;

	if ( ! is_null($category) ) :

		$sj_lists_options = get_option('_astra_subjects_tags_list_options');

		$sj_lists_options = FALSE === $sj_lists_options || empty( $sj_lists_options ) ? array() : json_decode( $sj_lists_options, true );

		//echo "<pre>"; print_r( $sj_lists_options );

		$key = trim( strtolower( $category->name) );

		$title = array_key_exists($key, $box_titles) ? $box_titles[$key] : $category->name;

		echo $before_widget; ?>

			<div class="widget-container">

		<?php
			echo $before_title . $title . $after_title;  

			$args = array(

				'taxonomy' => 'post_tag',
				'hide_empty' => false

			); 

			$tags = get_terms( $args ); 

			$tags_list = array();

			if ( ! empty( $tags ) ) :

				foreach ( $tags as $tag ) :

					$term_meta = get_option("term_{$tag->term_id}");

					$cid = (int) $term_meta['_tag_parent_category'];

					if ( $cid === $category->term_id ) :

						if ( array_key_exists( $tag->term_id, $sj_lists_options ) && 
							 ! empty( $sj_lists_options[$tag->term_id] ) ) :

							array_push( $tags_list, $tag );

						endif;

					endif;

				endforeach; 

			endif; ?>

		<nav>

			<ul>

				<li>

					<a href="<?= get_category_link($cid) ?>">

						<?= $category->name ?>

						<?php if ( ! empty( $tags_list ) ) : ?>

								<ul>
									
									<?php foreach ( $tags_list as $tag ) : ?>

										<li>

											<a href="<?= get_tag_link($tag) ?>">

												<?= $tag->name ?>
												
											</a>
											
										</li>

									<?php endforeach; ?>

								</ul>

						<?php 
							  else : 

							  	$args = array(

							  		'taxonomy' => 'category',
							  		'hide_empty' => true,
							  		'parent' => $category->term_id

							  	);	

							  	$sub_categories = get_terms( $args ); 

							  	if ( ! empty( $sub_categories ) ) : ?>

								  	<ul>

								  		<?php foreach ( $sub_categories as $sub_cat ) : ?>

									  		<li>

									  			<a href="<?php echo get_category_link($sub_cat) ?>">

									  				<?php echo $sub_cat->name ?>
									  				
									  			</a>
									  			
									  		</li>

									  	<?php endforeach; ?>
								  		
								  	</ul>


						<?php 
								endif;

							endif; ?>

					</a>

				</li>

			</ul>

		</nav>

	</div>

<?php 
		echo $after_widget;

	endif;