<?php get_header(); 
	global $tp_options; ?>
	 
	<!-- main -->
	<section id="main">

		<!-- container -->
		<div class="container">
			
			<!-- home-cblockquote -->
			<div class="home-cblockquote main-columns-layout padtb2per col-xs-12">

				<!-- column left -->
				<div class="column left bg_white pad5 col-md-3 col-sm-3 col-xs-12">
					
					<?php dynamic_sidebar('ColLeft Sidebar'); ?>

				</div>
				<!-- #colleft -->

				<!-- colright -->
				<div class="column right bg_white pad15 col-md-8 col-sm-8 col-xs-12 pull-right">
				
					<?php dynamic_sidebar('ColRight Home Sidebar'); ?>
					
				</div>
				<!-- #colright -->
				
			</div>
			<!-- #home-cblockquote -->

		</div>
		<!-- #container -->
			
	</section>
	<!-- #main -->

<?php get_footer() ?>