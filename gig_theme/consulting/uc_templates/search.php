<?php	

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

	$n_items = 6;

	$s = get_search_query();

    $args = array(

         'post_type' => 'post',
         's' => $s,
         'order' => 'desc',
         'orderby' => 'date',
         'paged' => $paged

    ); 

    query_posts( $args ); ?>

<h1 class="page_heading">
	<?php echo consulting_page_title( false, esc_html__( 'News', 'consulting' ), esc_html__( 'Careers', 'consulting' ) ); ?>		
</h1>

<div class="row content-area posts_list_container">

	<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

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
	
	<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">		

		<?php 
			$sidebar_id = 4012;
			$sidebar = get_post( $sidebar_id );

			echo apply_filters('the_content', $sidebar->post_content); ?>

	</div>	

</div>

<?php wp_reset_query(); ?>

<script type="text/javascript" required="true">
	
	jQuery(function($) {

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

							post_type : '<?php echo $post_type ?>',
							search_key : '<?= $s ?>',	
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

	});

</script>