<?php get_header(); 
	$head_options = get_option('section-header_option_name'); 
	global $post; ?>
	
	<!-- main -->
	<section id="main">
		
		<!-- support -->
		<div class="support">

			<!-- container -->
			<div class="container">
				<img class="w100p" src="<?php echo $head_options['banner-support-id']; ?>" alt="support" />
			</div>
			<!-- #container -->

		</div>
		<!-- #support -->

		<!-- spboxlist -->
		<div class="spboxlist">

			<!-- container -->
			<div class="container">

				<!-- colleft -->
				<div class="colleft col-md-3 col-sm-3 col-xs-12">

					<?php dynamic_sidebar('ColLeft Sidebar'); ?>

				</div>
				<!-- #colleft -->

				<!-- colright -->
				<div class="colright padleft20-md padleft20-sm mtop20-xs col-md-9 col-sm-9 col-xs-12">	
				
					<!-- aticlepagebox -->
					<div class="aticlepagebox">

						<h3 class="spboxtitle --no-padlr" data-navig="drawline" data-childcompare=".caption" data-childtarget=".hr">
							<span class="caption"><?php echo $post->post_title; ?></span>
							<span class="hr"></span>
						</h3>				

						<!-- articleboxcontent -->
						<div class="articleboxcontent">

							<?php echo apply_filters( 'the_content', $post->post_content ); ?>

						</div>
						<!-- #articleboxcontent -->

					</div>
					<!-- #aticlepagebox -->		
					
				</div>
				<!-- #colright -->

			</div>
			<!-- #container -->

		</div>
		<!-- #spboxlist -->
		
	</section>
	<!-- #main -->

<?php get_footer() ?>