<?php 
    echo $before_widget;
    
        $args = array(
                'post_type' => 'post',
                'category__in' => $cat_id,
                'order' => 'desc',
                'orderby' => 'id',
                'posts_per_page' => $posts_per_page
            ); 
            
        query_posts( $args ); ?>
        
    <!-- navNewsBox -->
	<div class="mainSidePanel navNewsBoxCarousel ohidden">

		<h2 class="navBoxHeading mtop20">
		    <?php echo $title; ?>
		</h2>

		<!-- navBoxContent -->
		<div class="navBoxContent mtop40">

			<!-- navCarousel -->
			<div class="navCarousel" data-navig="compactcontent" data-multiple="true" data-object=".article" data-setcompact=".articleBoxTitle > a, .article-excerpt" data-numCharOnIpad="100, 100" data-numCharOnMobile="30, 50" data-endShortContent="..., [...]" data-delimiter-css-property="clear" data-delimiter-css-value="both" data-wait-owlcarousel-completed="true">

				<!-- owl-carousel -->
				<div class="owl-carousel --two-columns-layout" data-carousel-items="2" data-carousel-autoplay="true" data-carousel-navigation="false" data-carousel-pagination="true">
				    
				    <?php
				        
				        if ( have_posts() ) :
				            
				            $count = 0;
				            $articles = array();
				            
    				        while ( have_posts() ) : the_post(); 
    				            
    				            $articles[] = array(
    				                
				                    'title' => title(100),
				                    'excerpt' => excerpt(200),
				                    'url' => get_the_permalink(),
				                    'thumb' => get_the_post_thumbnail( get_the_id(), 'theme-feature-image-carousel-news' )
				                );
    				            
        				    endwhile; 
            				    wp_reset_query(); 
            				    
            				    foreach ( $articles as $article ) : 
            				    
            				        if ( $count % 2 === 0 ) : ?>
            				        
                    					<!-- item -->
                    					<div class="item">
                    					    
                    			<?php endif; ?>
                    
                    						<!-- article -->
                    						<div class="article">
                    
                    							<h3 class="articleBoxTitle">
                    								<a class="block" data-originalContent="<?php echo $article['title']; ?>" href="<?php echo $article['url']; ?>">
                    								    <?php echo $article['title']; ?>
                    								</a>
                    							</h3>
                    
                    							<!-- article-box -->
                    							<div class="article-box ohidden mtop20">
                    
                    								<!-- article-thumb -->
                    								<div class="article-thumb col-md-5 col-sm-5 col-xs-12">
                    									<a href="<?php echo $article['url']; ?>">
                    										<?php echo $article['thumb']; ?>
                    									</a>
                    								</div>
                    								<!-- #article-thumb -->
                    
                    								<!-- article-excerpt -->
                    								<div class="article-excerpt padleft20-ms mtop20-xs col-md-7 col-sm-7 col-xs-12" data-originalContent="<?php echo $article['excerpt']; ?>">
                    
                    									<?php echo $article['excerpt']; ?>
                    
                    								</div>
                    								<!-- #article-excerpt -->
                    
                    							</div>
                    							<!-- #article-box -->
                    							
                    						</div>
                    						<!-- #article -->
                    						
                    			<?php if ( $count %2 !== 0 ) : ?>
                    
                    					</div>
                    					<!-- #item -->
                    					
                    			<?php endif; 
                    			    $count++; ?>
                					
                         <?php endforeach;
                         endif; ?>
				
				</div>
				<!-- #owl-carousel -->

			</div>
			<!-- #navCarousel -->

		</div>
		<!-- #navBoxContent -->

	</div>
	<!-- #navNewsBox -->    
      
    	
<?php echo $after_widget; ?>