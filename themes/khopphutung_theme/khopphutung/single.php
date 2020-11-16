<?php get_header(); 
	  global $post;	?>
	
	<!-- main -->
	<section id="main">

		<!-- container -->
		<div class="container">

			<!-- mainColLeft -->
			<div class="mainColLeft col-md-3 col-sm-4 col-xs-12">

				<?php dynamic_sidebar( 'ColLeft Sidebar' ); ?>

			</div>
			<!-- #mainColLeft -->

			<!-- mainColRight -->
			<div class="mainColRight col-md-9 col-sm-8 col-xs-12 mtop20-xs">

				<!-- menu -->
				<div id="menu" class="lapmenu padleft20 shown-lap">

					<?php 							  
						$args = array(
							'theme_location' => 'primary'
						);
					
						wp_nav_menu( $args ); ?>

				</div>
				<!-- #menu -->

				<!-- m-menu -->
				<div class="lapmenu m-menu shown-mb cushidden-xs">									

					<div class="m-menuicon tcenter">
						<span class="fa fa-navicon"></span>
						Main Menu
					</div>

					<?php 							  
						$args = array(
							'theme_location' => 'primary',									
							'menu_class' => 'm-mainmenu'
						);
					
						wp_nav_menu( $args ); ?>

				</div>
				<!-- #m-menu -->

				<!-- mColumnContent -->
				<div class="mColumnContent padleft20-ms">

					<?php 
						dynamic_sidebar( 'Slider Sidebar' ); ?>

					<!-- boxArticleDetails -->
					<div class="boxArticleDetails mtop20">

						<!-- boxArticleTitle -->
						<h3 class="boxArticleTitle widgTitleBox" 
							data-navig="compactWidgTitleBox">

							<span><?php echo $post->post_title; ?></span>

						</h3>
						<!-- #boxArticleTitle -->

						<!-- boxArticleContent -->
						<div class="boxArticleContent border --left --right --bottom pad20">

							<?php 

								if ( ! empty( $post->post_content ) ) :

									echo apply_filters( 'the_content', $post->post_content ); 

								else :

									echo '<div class="tcenter"><strong>Nội dung đang cập nhật ...</strong></div>';

								endif;

							?>

						</div>
						<!-- #boxArticleContent -->

					</div>
					<!-- #boxArticleDetails -->		

				</div>
				<!-- #mColumnContent -->

			</div>
			<!-- #mainColRight -->

		</div>
		<!-- #container -->
		
	</section>
	<!-- #main -->

<?php get_footer() ?>