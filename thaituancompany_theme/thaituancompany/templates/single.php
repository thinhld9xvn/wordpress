<?php 

	global $post; 



	$cat = get_the_category( $post->ID ); 

	$cat = $cat[0]; 



	$tags = wp_get_post_tags( $post->ID ); ?>	



<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>



<!-- main -->

<section id="main">	



	<?php dynamic_sidebar( 'Slider Sidebar' ); ?>



	<div id="breadcumbs">



		<div class="container">



			<?php the_breadcrumbs('bread-cumbs', 'bread-cumbs', 'Trang chủ', '<span class="divide"></span>');?>

			

		</div>

		

	</div>		



	<div class="mainColumns ohidden">



		<div class="mainColLeft col-md-9 col-sm-12 col-xs-12">



			<div class="singleContent mtop20">



				<div class="container">



					<h2 class="toursCatListHeading -linebottom">

						<?php echo $post->post_title; ?>

					</h2>



					<div class="singleDetails defFormat fixed-object mtop20">



						<?php echo apply_filters('the_content', $post->post_content); ?>

						

					</div>



					<div class="fbComments mtop20">



						<h2 class="fbCommentsHeading">

							<span class="fa fa-comments"></span> 

							Bình luận

						</h2>



						<div class="fb-comments" data-href="<?php echo get_the_permalink( $post->ID ); ?>" data-numposts="5"></div>

						

					</div>



				</div>

				

			</div>



		</div>



		<div class="mainColRight col-md-3 col-sm-12 col-xs-12">



			<?php dynamic_sidebar( 'ColRight Sidebar' ); ?>

			

		</div>



	</div>				



</section>	

<!-- #main -->