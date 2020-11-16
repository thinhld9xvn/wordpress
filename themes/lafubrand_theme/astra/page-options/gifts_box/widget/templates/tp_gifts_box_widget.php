<?php 
	define('_BANNER_LISTS_OPTION_NAME', 'lafu_banner_lists_options');

	$arrBanners = array();

	$is_tag = ! empty( $GLOBALS['tag_id'] );

	if ( is_category() || $is_tag || is_single() ) :	

			$gifts_box_options = get_option(_BANNER_LISTS_OPTION_NAME); 

			if ( ! empty( $gifts_box_options ) ) :

				//print_r( $gifts_box_options );

				foreach ($gifts_box_options as $banner) :

					$banner_info = array(

						'name' => $banner['name'],
						'url' => $banner['url'],
						'src' => $banner['src']

					);

					if ( sizeof( $banner['categories'] ) > 0 ) :

						foreach( $banner['categories'] as $category ) :

							if ( is_category() && lafu_is_category_has_set_banner($category) ) :
							
								array_push($arrBanners, $banner_info);	

							elseif ( $is_tag && lafu_is_subject_has_set_banner($category, (int) $GLOBALS['tag_id'] ) ) :

								array_push($arrBanners, $banner_info);		

							elseif ( is_single() && lafu_is_single_has_set_banner($category) ) :

								array_push($arrBanners, $banner_info);						

							endif;

						endforeach;

					endif;
					
				endforeach;


			endif;

	endif;

		?>

	<?php if ( ! empty( $arrBanners ) ) : 

			echo $before_widget; ?>

				<div class="widget-container">

		<?php 	echo $before_title . $title . $after_title;  ?>

				<nav>

					<ul>

						<?php 
							foreach ( $arrBanners as $banner ) : ?>

								<li>
									<a target="<?= ! empty( $banner['target'] ) ? $banner['target'] : '_blank' ?>" 
									   href="<?= ! empty( $banner['url'] ) ? $banner['url'] : '#' ?>">
										<img src="<?php echo $banner['src']; ?>" alt="<?php echo $banner['name'] ?>" />
									</a>
								</li>

						<?php 
							endforeach; ?>
						
					</ul>
					
				</nav>

			</div>

<?php 
			echo $after_widget;
	endif;	
	