<?php get_header(); ?>

    </header>
    <!-- #header -->
    
    <!-- main -->
    <section id="main">
        
        <!-- container -->
        <div class="container">
			
			<!-- home-colleft -->
			<div class="home-column home-colleft col-md-8 col-sm-8 col-xs-12">	
			
    			<!-- tquizHead -->
    			<div id="tquizHead" class="tquizHead">
    				Tag: <?php echo single_tag_title(); ?>
    			</div>
    			<!-- #tquizHead -->
            
                <?php include( locate_template( '/templates/tp-tag-mtoastbox.php' ) ); ?>
    			
    		</div>
    		<!-- #home-colleft -->
    		
    		<!-- home-colright -->
			<div class="home-column home-colright col-md-4 col-sm-4 col-xs-12">
			    <?php dynamic_sidebar( 'ColRight Sidebar' ); ?>
			</div>
			<!-- #home-colright -->
            
        </div>
        <!-- #container -->
        
    </section>
    <!-- #main -->
  
<?php get_footer(); ?>
