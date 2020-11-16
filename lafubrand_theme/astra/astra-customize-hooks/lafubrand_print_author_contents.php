<?php 
	function lafubrand_print_author_contents() {

		global $author;	

		$active_lang = pll_current_language();

		$paged = get_query_var('paged') ? (int) get_query_var('paged') : 1;

		$user = get_userdata( $author );

		$display_name = $user->data->display_name;
		$email = $user->data->user_email;
		$website = $user->data->user_url;

	    $avatar = esc_attr( get_the_author_meta( 'profile_avatar', $user->ID ) );

	    $avatar = ! empty( $avatar ) ? $avatar : 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/User_font_awesome.svg/600px-User_font_awesome.svg.png';

		$fb = esc_attr( get_the_author_meta( 'profile_social_facebook', $user->ID ) );

		$twitter = esc_attr( get_the_author_meta( 'profile_social_twitter', $user->ID ) );

		$pinterest = esc_attr( get_the_author_meta( 'profile_social_pinterest', $user->ID ) );

		$medium = esc_attr( get_the_author_meta( 'profile_social_medium', $user->ID ) );

		$instagram = esc_attr( get_the_author_meta( 'profile_social_instagram', $user->ID ) );

		$vimeo = esc_attr( get_the_author_meta( 'profile_social_vimeo', $user->ID ) );

		$vk = esc_attr( get_the_author_meta( 'profile_social_vk', $user->ID ) );

		$linkedin = esc_attr( get_the_author_meta( 'profile_social_linkedin', $user->ID ) );

		$youtube = esc_attr( get_the_author_meta( 'profile_social_youtube', $user->ID ) );

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

		<div class="profile-wrapper-box">

			<div class="profile-info text-center">

				<div class="profile-avatar">

					<img src="<?php echo $avatar; ?>" width="150" height="150" alt="avatar" />
					
				</div>

				<h2 class="profile-name">
					<?php echo $display_name ?>
				</h2>

				<?php if ( ! empty( $fb ) || ! empty( $medium ) || ! empty( $pinterest ) || 
						   ! empty( $linkedin ) || ! empty( $instagram ) || ! empty( $vimeo ) || 
						   ! empty( $twitter ) || ! empty( $youtube ) || ! empty( $vk ) ) : ?>

					<div class="profile-social">

						<?php if ( ! empty( $fb ) ) : ?>

							<a href="<?= $fb ?>">
								<span class="fa fa-facebook"></span>
							</a>

						<?php endif; ?>

						<?php if ( ! empty( $medium ) ) : ?>

							<a href="<?= $medium ?>">
								<span class="fa fa-maxcdn"></span>
							</a>

						<?php endif; ?>

						<?php if ( ! empty( $pinterest ) ) : ?>

							<a href="<?= $pinterest ?>">
								<span class="fa fa-pinterest"></span>
							</a>

						<?php endif; ?>

						<?php if ( ! empty( $linkedin ) ) : ?>

							<a href="<?= $linkedin ?>">
								<span class="fa fa-linkedin"></span>
							</a>

						<?php endif; ?>

						<?php if ( ! empty( $instagram ) ) : ?>

							<a href="<?= $instagram ?>">
								<span class="fa fa-instagram"></span>
							</a>

						<?php endif; ?>

						<?php if ( ! empty( $vimeo ) ) : ?>

							<a href="<?= $vimeo ?>">
								<span class="fa fa-vimeo-square"></span>
							</a>

						<?php endif; ?>

						<?php if ( ! empty( $twitter ) ) : ?>

							<a href="<?= $twitter ?>">
								<span class="fa fa-twitter-square"></span>
							</a>

						<?php endif; ?>

						<?php if ( ! empty( $youtube ) ) : ?>

							<a href="<?= $youtube ?>">
								<span class="fa fa-youtube"></span>
							</a>

						<?php endif; ?>

						<?php if ( ! empty( $vk ) ) : ?>

							<a href="<?= $vk ?>">
								<span class="fa fa-dot-circle-o"></span>
							</a>

						<?php endif; ?>				
						
					</div>

				<?php endif; ?>

				<div class="profile-email text-center">

					<?php if ( ! empty( $email ) ) : ?>

						<a href="mailto:<?= $email ?>">

							<span class="fa fa-envelope-o"></span> 
							<span><?= $email ?></span>

						</a>

					<?php endif; ?>
					
				</div>

			</div>

			<?php if ( ! empty( $description ) ) : ?>

				<div class="profile-description">

					<?php echo $description; ?>
					
				</div>

			<?php endif; ?>

			<?php //echo "<pre>"; print_r( $user ); echo "</pre>"; ?>

			<div class="postRelatedCat authorRelatedPosts mtop20">

				<h4>
		           Các bài viết từ tác giả <?= $display_name ?>
		        </h4>	
				
				<?php if ( have_posts() ) : ?>
			
					<div class="catRelatedContent mtop20">

						<div id="authorPostsLists" class="split-columns three-columns-layout">

							<?php while ( have_posts() ) : the_post(); 

								$category = get_the_category(get_the_id());
		                        $category = $category[0]; ?>

								<div class="article item-object">

									<div class="thumbnail tcenter ohidden">

										<a href="<?php the_permalink(); ?>">

											<?php the_post_thumbnail( 'full' ); ?>

										</a>

										<a class="cat" href="<?= get_category_link($category) ?>">

		                                    <span class="fa fa-tags"></span>

		                                    <span>
		                                        <?php echo $category->name ?>
		                                    </span>
		                                    
		                                </a>

		                                <a class="readmore" 
		                                   href="<?php the_permalink(); ?>">

		                                   <span>

		                                        Xem thêm 
		                                        <span class="fa fa-angle-double-right"></span>

		                                    </span>


		                                </a>

									</div>

									<div class="title mtop10">

										<a class="default block uppercase" 
		                                    href="<?php the_permalink(); ?>">

		                                    <strong>
		                                        <?php 
		                                           the_title(); ?>
		                                    </strong>

		                                </a>

									</div>

									<div class="excerpt mtop10">

										<?php the_excerpt(); ?>

									</div>

								</div>

							<?php endwhile; ?>
						    
						</div>

						<div class="loadMorePosts mtop20">

						    <a id="authorLoadMorePosts" href="#">
						        Xem thêm <span class="fa fa-angle-double-right"></span>
						    </a>
						    
						</div>
						
					</div>

				<?php endif; ?>		

			</div>
			

		</div>

		<?php wp_reset_query(); ?>

		<script type="text/javascript">
			
			window.addEventListener('DOMContentLoaded', function() {

				let callbackAfterLoadJS = function($) {

					var ajax_url = window.location.origin + "/wp-admin/admin-ajax.php",
						paged = <?= $paged + 1 ?>,	
						n_items = <?= $n_items ?>,			
						continue_loading_ajax = true;

					function createLoadingAjaxIcon() {

						let html = `<div class="ajaxLoading">
    									<span class="fa fa-circle-o-notch fa-spin"></span>
    								</div>`;

    					$('#authorLoadMorePosts').addClass('pauseActionAjax');

						$('.loadMorePosts').prepend( html );										  

					}

					function removeLoadingAjaxIcon() {

						$('#authorLoadMorePosts').removeClass('pauseActionAjax');

						$('.loadMorePosts .ajaxLoading').remove();

					}

					function removeLoadingButton() {

						$('.loadMorePosts').remove();

					}

					$('#authorLoadMorePosts').click(function(e) {

						e.preventDefault();

						createLoadingAjaxIcon();

						$.ajax({

							method : "POST",
							async : true,
							url : ajax_url,
							data : {

								action : 'sb_loading_infinite_posts',
								author_id : <?= $author ?>,							
								n_items,
								paged

							}

						}).done(function( posts_list ) {

							var $posts_list = $('#authorPostsLists');								

							if ( posts_list.length > 0 ) {

								$.each( posts_list, function( i, post ) {

									//console.log( post );

									let item = `<div class="article item-object">

													<div class="thumbnail tcenter ohidden">

														<a href="${post['post_permalink']}">

															${post['post_thumbnail']}

														</a>

														<a class="cat" href="${post['post_category']['permalink']}">

						                                    <span class="fa fa-tags"></span>

						                                    <span>
						                                       ${post['post_category']['name']}
						                                    </span>
						                                    
						                                </a>

						                                <a class="readmore" 
						                                   href="${post['post_permalink']}">

						                                   <span>

						                                        Xem thêm 
						                                        <span class="fa fa-angle-double-right"></span>

						                                    </span>


						                                </a>

													</div>

													<div class="title mtop10">

														<a class="default block uppercase" 
						                                    href="${post['post_permalink']}">

						                                    <strong>
						                                        ${post['post_title']}
						                                    </strong>

						                                </a>

													</div>

													<div class="excerpt mtop10">														
															${post['post_excerpt']}
													</div>

												</div>`;

									$posts_list.append( item );


								});

								if ( posts_list.length === n_items ) {
									
									removeLoadingAjaxIcon();

									paged += 1;

								}

								// dữ liệu trả về không đủ {n_items} bài viết => dừng xem thêm
								else {

									removeLoadingButton();

								}												

							}

							else {

								removeLoadingButton();

							}							

						});


					});

				};

				let t = setInterval(function() {

					if ( typeof( jQuery ) !== 'undefined' ) {

						const $ = jQuery.noConflict();

						callbackAfterLoadJS($);

						clearInterval( t );	

					}

				}, 100);		

			});

		</script>

<?php }