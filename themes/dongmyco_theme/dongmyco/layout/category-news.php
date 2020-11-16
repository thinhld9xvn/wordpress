<!-- container -->
<div class="container">
	
	<!-- home-cblockquote -->
	<div class="home-cblockquote main-columns-layout padtb2per col-xs-12">

		<!-- colleft -->
		<div class="column left bg_white pad5 col-md-3 col-sm-3 col-xs-12">
	
			<?php dynamic_sidebar('ColLeft Sidebar'); ?>
	
		</div>
		<!-- #colleft -->
	
		<!-- colright -->
		<div class="column right bg_white pad15 col-md-8 col-sm-8 col-xs-12 pull-right">
	
			<h3 class="hg-title --double-border --double-active-border">
				<?php echo single_cat_title(); ?>
			</h3>
			
			<?php 
			    $args = array(
			            'post_type' => 'post',
			            'category_name' => $cat->name,
			            'posts_per_page' => 20,
			            'order' => 'desc',
			            'orderby' => 'id',
			            'paged' => $paged
			        );
			    query_posts( $args ); ?>

			<!-- newsboxcontent -->
			<div class="newsboxcontent split-columns four-columns-layout mtop20" data-navig="setequalheight" data-object=".newsb" data-css-delimiter-property="clear" data-css-delimiter-value="both" data-setheight=".title">
			    
			    <?php while ( have_posts() ) : the_post(); 

			            $thumb_id = get_post_thumbnail_id();
			            $thumb_tag = wp_get_attachment_image( $thumb_id, 'theme-feature-image-news' ); ?>

					<!-- newsb -->
					<div class="newsb item-layout col-md-3 col-sm-4 col-xs-6">

						<!-- thumb -->
						<div class="item-thumb tcenter">
							<a href="<?php the_permalink(); ?>">
								<?php echo $thumb_tag; ?>
							</a>
						</div>
						<!-- #thumb -->

						<!-- title -->
						<div class="title tcenter mtop10">
							<a href="<?php the_permalink(); ?>"><?php echo title(40); ?></a>
						</div>
						<!-- #title -->									

					</div>
					<!-- #newsb -->	
					
				<?php endwhile; ?>				    
				
			</div>
			<!-- #newsboxcontent -->

			<?php wp_page_navigation(); 
	    			  wp_reset_query();  ?>
			
		</div>
		<!-- #colright -->
		
	</div>
	<!-- #home-cblockquote -->

</div>
<!-- #container -->