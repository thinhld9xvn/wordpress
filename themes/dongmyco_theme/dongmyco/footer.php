	<?php $options = get_option('section-header_option_name'); ?>
	
	<!-- footer -->
	<footer id="footer" class="bg-head padtb20">

		<!-- container -->
		<div class="container">
			
			<!-- main-columns-layout -->
			<div class="main-columns-layout">
			
				<!-- ft-logo -->
				<div class="ft-column ft-logo tcenter col-md-3 col-sm-3 col-xs-12 padtop55-md">
	
					<a href="<?php echo bloginfo('url'); ?>">
						<img src="<?php echo $options['logo-image-id'] ?>" alt="logo" />
					</a>
	
				</div>
				<!-- #ft-logo -->
		
				<!-- ft-column -->
				<div class="ft-column mtop20-xs col-md-8 col-sm-8 col-xs-12 pull-right">
					
					<!-- split-columns -->
					<div class="split-columns three-columns-layout --last-vcenter">
					
						<?php dynamic_sidebar('Footer Column One Sidebar'); ?>
						<?php dynamic_sidebar('Footer Column Two Sidebar'); ?>
						<?php dynamic_sidebar('Footer Column Three Sidebar'); ?>
						
					</div>
					<!-- #split-columns -->
					
				</div>
				<!-- #ft-column -->
				
			</div>
			<!-- #main-columns-layout -->

		</div>
		<!-- #container -->			
		
	</footer>
	<!-- #footer -->

</div>
<!-- #wrapper -->

<?php wp_footer() ?>	

</body>
</html>