<?php get_header(); ?>

    <!-- main -->
    <section id="main">
    
    	<!-- container -->
    	<div class="container">
    	    
    	    <?php dynamic_sidebar('Home Sidebar') ?>
    
    		<!-- navPortfolio -->
    		<div class="mainSidePanel navPortfolio mtop40">
    
    			<!-- two-columns-layout -->
    			<div class="split-columns two-columns-layout">
    
    				<div class="item-layout col-md-6 col-sm-6 col-xs-12">
    				  
    				  <?php
    				     dynamic_sidebar('Home Bottom Sidebar Column Left'); ?>
    
    				</div>
    
    				<div class="item-layout col-md-6 col-sm-6 col-xs-12">	
    				
      				<?php
      				     dynamic_sidebar('Home Bottom Sidebar Column Right'); ?>
    
    				</div>
    
    
    			</div>
    			<!-- #two-columns-layout -->				
    
    		</div>
    		<!-- #navPortfolio -->
    
    	</div>
    	<!-- #container -->
    	
    </section>
    <!-- #main -->
    
<?php get_footer(); ?>