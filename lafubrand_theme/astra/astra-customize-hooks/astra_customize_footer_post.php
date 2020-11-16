<?php 

	function astra_customize_footer_post() { 

		if ( is_single() ) : 			

			$consultation_author_id = get_post_meta(get_the_id(), '_lafu_post_consultation', true);
			$consultation_author_id = FALSE !== $consultation_author_id && ! empty( $consultation_author_id ) ? (int) $consultation_author_id : -1;  
 
         	$subjectsList = json_decode( get_post_meta(get_the_id(), '_astra_subject_tags_list', true), true );?>

			<div class="post-meta-footer">

			    <div class="meta-tv-tg">

			    	<?php if ( $consultation_author_id !== -1 ) : ?>

			    		<span class="tv">

					        <span class="label">Tham vấn nội dung</span>
					        <span>:</span>
					        <a class="name" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID', $consultation_author_id ) ) ?>">
					        	<?php echo get_the_author_meta('display_name', $consultation_author_id); ?>
					        </a> 

					    </span>

				        <span class="delimiter">|</span> 

				    <?php endif; ?>	

				    	<span class="tg">		        

					        <span class="label">Tác giả</span>
					        <span>:</span>
					        <a class="name" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>">
					        	<?php echo get_author_name() ?>
					        </a>

					    </span>

			    </div>

			    <div class="meta-lx-hy">

			    	<div class="meta-view">

			    		<span class="label">

			    			<span class="fa fa-eye"></span>
			    			<span class="padLeft5">Lượt xem</span>		    				    			
			    			
			    		</span>

			    		<span>:</span>

			    		<span class="content padLeft5"><?php echo lafubrand_get_post_view(); ?></span>
			    		
			    	</div>

			    	<div class="meta-ratingbox">

			    		<span class="label">

			    			<span class="fa fa-hand-peace-o"></span>
			    			<span class="padLeft5">Bài viết có hữu ích đối với bạn ?</span>
			    			
			    		</span>		    		

			    		<span class="content padLeft5">
			    			<?php lafuratingstar_print_frontend_box(); ?>
			    		</span>
			    		
			    	</div>

			    </div>

			    <div class="meta-social-share">

			    	<a target='_blank'
			    	   href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" 
			    	   class="btnSocialShare fb">

	    				<span class="fa fa-facebook"></span>
	    				<span class="caption">Chia sẻ lên facebook</span>

					</a>
			
					<a target="_blank"
						href="https://chat.zalo.me" 
					   class="btnSocialShare zl">

	    				<span class="icon">Za</span>
	    				<span class="caption">Chia sẻ lên zalo</span>
	    				
					</a>

					<a target='_blank'
					   href="https://twitter.com/share?url=<?php the_permalink() ?>" 
					   class="btnSocialShare tw">

	    				<span class="fa fa-twitter"></span>
	    				<span class="caption">Chia sẻ lên twitter</span>
	    				
					</a>

			    </div>

			    <?php if ( ! empty( $subjectsList ) && sizeof( $subjectsList ) > 1 ) : ?>

				    <div class="meta-subjects">

					    <div class="label">
					        Chủ đề liên quan: 
					    </div>

					    <div class="contents">

					    	<?php foreach ( $subjectsList as $subject ) :

					    			if ( $subject !== reset($subjectsList) ) : ?>
					        
										<a href="#"><?php echo $subject['value'] ?></a>	

							<?php 
									endif;

								endforeach; ?>					

					    </div>

					</div>

				<?php endif; ?>

			</div>			

	<?php 

		endif;
		
		}

	add_action( 'astra_entry_content_after', 'astra_customize_footer_post', 5 );