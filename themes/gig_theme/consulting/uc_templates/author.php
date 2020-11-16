<?php	
	global $author;	

	$active_lang = qt_get_current_lang();

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

	$user = get_userdata( $author );

	$display_name = $user->data->display_name;
	$email = $user->data->user_email;
	$website = $user->data->user_url;

	$avatar = esc_attr( get_the_author_meta( 'profile_avatar', $user->ID ) );

	$fb = esc_attr( get_the_author_meta( 'profile_social_facebook', $user->ID ) );
	$fb = $fb ? $fb : '#';

	$twitter = esc_attr( get_the_author_meta( 'profile_social_twitter', $user->ID ) );
	$twitter = $twitter ? $twitter : '#';

	$pinterest = esc_attr( get_the_author_meta( 'profile_social_pinterest', $user->ID ) );
	$pinterest = $pinterest ? $pinterest : '#';

	$medium = esc_attr( get_the_author_meta( 'profile_social_medium', $user->ID ) );
	$medium = $medium ? $medium : '#';

	$instagram = esc_attr( get_the_author_meta( 'profile_social_instagram', $user->ID ) );
	$instagram = $instagram ? $instagram : '#';

	$vimeo = esc_attr( get_the_author_meta( 'profile_social_vimeo', $user->ID ) );
	$vimeo = $vimeo ? $vimeo : '#';	

	$vk = esc_attr( get_the_author_meta( 'profile_social_vk', $user->ID ) );
	$vk = $vk ? $vk : '#';

	$linkedin = esc_attr( get_the_author_meta( 'profile_social_linkedin', $user->ID ) );
	$linkedin = $linkedin ? $linkedin : '#';

	$youtube = esc_attr( get_the_author_meta( 'profile_social_youtube', $user->ID ) );	
	$youtube = $youtube ? $youtube : '#';

	$description = get_the_author_meta( "profile_description_{$active_lang}", $user->ID );	

	$n_items = 6;

	$args = array(        
        
        'author' => $author,
        'posts_per_page' => $n_items,
        'order' => 'desc',
        'orderby' => 'date',        
        'paged' => $paged

    ); 

    query_posts( $args ); ?>

<div class="row content-area posts_list_container">

	<div class="wpb_column vc_column_container vc_col-sm-8">

		<div class="vc_column-inner">

			<div class="profile-info text-center">

				<div class="profile-avatar">

					<img src="<?php echo $avatar; ?>" width="150" height="150" alt="avatar" />
					
				</div>

				<h2 class="profile-name">
					<?php echo $display_name ?>
				</h2>

				<div class="profile-social">

					<a href="<?= $fb ?>">
						<span class="fa fa-facebook"></span>
					</a>

					<a href="<?= $medium ?>">
						<span class="fa fa-maxcdn"></span>
					</a>

					<a href="<?= $pinterest ?>">
						<span class="fa fa-pinterest"></span>
					</a>

					<a href="<?= $linkedin ?>">
						<span class="fa fa-linkedin"></span>
					</a>

					<a href="<?= $instagram ?>">
						<span class="fa fa-instagram"></span>
					</a>

					<a href="<?= $vimeo ?>">
						<span class="fa fa-vimeo-square"></span>
					</a>

					<a href="<?= $twitter ?>">
						<span class="fa fa-twitter-square"></span>
					</a>

					<a href="<?= $youtube ?>">
						<span class="fa fa-youtube-square"></span>
					</a>

					<a href="<?= $vk ?>">
						<span class="fa fa-dot-circle-o"></span>
					</a>				
					
				</div>

				<div class="profile-email text-center">

					<a href="mailto:<?= $email ?>">

						<span class="fa fa-envelope-o"></span> 
						<span><?= $email ?></span>

					</a>
					
				</div>

			</div>

			<div class="profile-description">

				<?php echo $description; ?>
				
			</div>

			<?php //echo "<pre>"; print_r( $user ); echo "</pre>"; ?>

			<div class="author-posts widget">

				<div class="widget_title">

					Các bài viết từ tác giả <?= $display_name ?>
					
				</div>
				
				<?php if ( have_posts() ) : ?>
			
					<div class="posts_grid with_sidebar">

						<ul class="post_list_ul">

							<?php while ( have_posts() ) : the_post(); ?>

								<li id="<?php echo 'post-' . get_the_id() ?>" class="<?php echo 'post-' . get_the_id() ?> post type-post status-publish format-standard has-post-thumbnail hentry">

									<div class="post_thumbnail">

										<a href="<?php the_permalink(); ?>">

											<?php the_post_thumbnail( 'consulting-image-350x250-croped' ); ?>

										</a>

									</div>

									<h5>

										<a href="<?php the_permalink(); ?>">
											<?php echo title(60); ?>										
										</a>

									</h5>

									<div class="post_date">

										<i class="fa fa-clock-o"></i> 

										<?php echo get_the_date('d F, Y'); ?>

									</div>

								</li>

							<?php endwhile; ?>
						    
						</ul>
						
					</div>

				<?php endif; ?>		

			</div>

		</div>

	</div>
	
	<div class="wpb_column vc_column_container vc_col-sm-4">	

		<div class="vc_column-inner">	

			<?php 
				$sidebar_id = 4012;
				$sidebar = get_post( $sidebar_id );

				echo apply_filters('the_content', $sidebar->post_content); ?>

		</div>

	</div>	

</div>

<?php wp_reset_query(); ?>

<script type="text/javascript" required="true">
	
	window.addEventListener('DOMContentLoaded', function() {

		let callbackAfterLoadJS = function() {

			var ajax_url = window.location.origin + "/wp-admin/admin-ajax.php",
			paged = <?= $paged + 1 ?>,
			is_loading_ajax = false,
			continue_loading_ajax = true;

			function createLoadingAjaxIcon() {

				let html = '<div class="loadingIconAjax"><img src="<?= loadingIcon ?>" width="90px" alt="loadingIcon" /></div>';

				$('.posts_grid').append( html );

			}

			function removeLoadingAjaxIcon() {

				$('.posts_grid .loadingIconAjax').remove();

			}

			$(window).scroll(function(e) {

				var v_top = $(this).scrollTop(),
					container_top = $('.posts_list_container').position().top,
					posts_list_height = $('.post_list_ul').outerHeight(),

					end_point_scroll = container_top + posts_list_height;

				// call ajax load infinite
				if ( v_top <= end_point_scroll  ) {

					if ( ! is_loading_ajax && continue_loading_ajax ) {

						is_loading_ajax = true;

						createLoadingAjaxIcon();

						$.ajax({

							method : "POST",
							async : true,
							url : ajax_url,
							data : {

								action : 'sb_loading_infinite_posts',
								author_id : <?= $author ?>,							
								n_items : <?= $n_items ?>,
								paged : paged

							}

						}).done(function( posts_list ) {

							//console.log( posts_list );

							var $posts_list = $('.post_list_ul'),
								item_template = "<li id='{%post_id}' class='post-{%post_id} post type-post status-publish format-standard has-post-thumbnail hentry'>" +

												"	<div class='post_thumbnail'>" +

												"		<a href='{%post_permalink}'>" +
												"			{%post_thumbnail}" +

												"		</a>" +

												"	</div>" +

												"	<h5>" +

												"		<a href='{%post_permalink}'>" +
												"			{%post_title}" +
												"		</a>" +

												"	</h5>" +

												"	<div class='post_date'>" +

												"		<i class='fa fa-clock-o'></i>" +

												"		{%post_date}" +

												"	</div>" +

												"</li>";

							if ( posts_list.length > 0 ) {

								$.each( posts_list, function( i, post ) {

									//console.log( post );

									let item = item_template.replace( /\{\%post\_id\}/ig, 'post-' + post['ID'] )
															.replace( /\{\%post\_thumbnail\}/ig, post['post_thumbnail'] )
															.replace( /\{\%post\_permalink\}/ig, post['post_permalink'] )
															.replace( /\{\%post\_title\}/ig, post['post_title'] )
															.replace( /\{\%post\_date\}/ig, post['post_date'] );

									$posts_list.append( item );


								});

								paged += 1;						

							}

							else {

								continue_loading_ajax = false;

							}				

							is_loading_ajax = false;		

							removeLoadingAjaxIcon();

						});

					}

				}


			});

		};

		let t = setInterval(function() {

			if ( typeof( $ ) !== 'undefined' ) {

				callbackAfterLoadJS();			

				clearInterval( t );	

			}

		}, 100);		

	});

</script>