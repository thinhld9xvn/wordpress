<!-- newsboxlist -->
<div class="newsboxlist">

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
				
				<?php 
					$args = array(
							'post_type' => 'post',
							'category__in' => $cat->term_id,
							'post__not_in' => array( $post->ID ),
							'posts_per_page' => 6,
							'order' => 'desc',
							'orderby' => 'id'
						);
					
					query_posts( $args ); 
					
					if ( have_posts() ) : ?>

						<!-- boxnews-relate -->
						<div class="boxnews-relate mtop20 clearfix">
	
							<h3 class="spboxtitle --no-padlr" data-navig="drawline" data-childcompare=".caption" data-childtarget=".hr">
								<span class="caption">Có thể bạn quan tâm</span>
								<span class="hr"></span>
							</h3>
	
							<ul class="pboxlist --newslist --hasborder --hasicon --green">
								
								<?php while ( have_posts() ) : the_post(); ?>
								
								    <li>
								    	<a href="<?php the_permalink(); ?>">
								    		<?php the_title(); ?>
								    	</a>
								    </li>
								    
								<?php endwhile; 
									  wp_reset_query(); ?>
								
							</ul>
	
						</div>
						<!-- #boxnews-relate -->
						
				<?php endif; ?>

			</div>
			<!-- #aticlepagebox -->	
    
    	</div>
    	<!-- #colright -->
    
    </div>
    <!-- #container -->

</div>
<!-- #newsboxlist -->