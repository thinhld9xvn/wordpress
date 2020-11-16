<?php $search_options = get_option( 'search-section_option_name' ); ?>

<!-- head-searchbar -->
<div class="head-searchbar pull-left hidden-xs">

	<form class="searchform-product" method="post" action="<?php echo bloginfo('url') ?>">

		<!-- searchTextBox -->
		<div class="searchTextBox col-md-7 col-sm-7">

			<input type="text" id="txtKeySearch" name="s" class="form-control pvcontrolSearch txtKeySearch borderRadius --notopright --nobottomright" placeholder="Mời nhập từ khóa ..." />

		</div>
		<!-- #searchTextBox -->

		<!-- searchSelectCat -->
		<div class="searchSelectCat col-md-5 col-sm-5">

			<!-- slSearchSelectCat -->
			<select id="slSearchSelectCat" 
					class="form-control pvcontrolSearch slSearchSelectCat inlineblock borderRadius --noall" 					
					data-taxonomy="<?php echo $search_options['searchform-taxonomy-id']; ?>">

				<option value="_">Mời chọn danh mục</option>

				<?php 

					$terms = get_terms( 

						array(
							'hide_empty' => 0,
							'taxonomy' => $search_options['searchform-taxonomy-id']
						) 

					);

					if ( $terms ) :

						foreach ( $terms as $term ) : ?>

							<option value="<?php echo $term->slug; ?>">
								<?php echo $term->name; ?>
							</option>

				<?php   endforeach;

					endif; ?>

			</select>
			<!-- #slSearchSelectCat -->

			<input type="hidden" name="posttype" class="searchform-posttype" value="<?php echo $search_options['searchform-custom-post-type-id'] ?>" />
			<input type="hidden" name="taxonomy" class="searchform-taxonomy" value="<?php echo $search_options['searchform-taxonomy-id']; ?>" />
			<input type="hidden" name="term" class="searchform-term" />			

			<!-- btnSearchSubmit -->
			<button id="btnSearchSubmit" class="btn btn-success pvcontrolSearch pvSearchButton btnSearchSubmit inlineblock borderRadius --notopleft --nobottomleft" type="submit">
				<span class="fa fa-search"></span>
			</button>
			<!-- #btnSearchSubmit -->

		</div>
		<!-- #searchSelectCat -->

	</form>

</div>
<!-- #head-searchbar -->

<!-- hm-searchbar -->
<div class="hm-searchbar hidden-lg hidden-md hidden-sm">

	<!-- btnSearchSubmit -->
	<a id="btn-hmShowSearchBoxCat" href="#">
		<span class="fa fa-search-plus"></span>
	</a>
	<!-- #btnSearchSubmit -->

	<!-- hmSearchBoxCatContent -->
	<div class="hmSearchBoxCatContent">						

		<!-- hmclose -->
		<div id="hmclose">								
		</div>
		<!-- #hmclose -->	

		<!-- hmBox -->
		<div class="hmBox ohidden">

			<!-- searchTextBox -->
			<div class="searchTextBox">

				<input type="text" id="txtMKeySearch" class="form-control pvcontrolSearch txtKeySearch borderRadius --notopright --nobottomright" placeholder="Mời nhập từ khóa ..." />

			</div>
			<!-- #searchTextBox -->

			<!-- searchSelectCat -->
			<div class="searchSelectCat">

				<!-- slMSearchSelectCat -->
				<select id="slMSearchSelectCat" class="form-control pvcontrolSearch slSearchSelectCat inlineblock borderRadius --noall">
					<option value="_">Mời chọn danh mục</option>

					<?php 

						$terms = get_terms( 

							array(
								'hide_empty' => 0,
								'taxonomy' => $search_options['searchform-taxonomy-id']
							) 

						);

						if ( $terms ) :

							foreach ( $terms as $term ) : ?>

								<option value="<?php echo $term->slug; ?>">
									<?php echo $term->name; ?>
								</option>

				<?php   	endforeach;
				
						endif; ?>

				</select>
				<!-- #slMSearchSelectCat -->

				<input type="hidden" name="posttype" class="searchform-posttype" value="<?php echo $search_options['searchform-custom-post-type-id'] ?>" />
				<input type="hidden" name="taxonomy" class="searchform-taxonomy" value="<?php echo $search_options['searchform-taxonomy-id']; ?>" />
				<input type="hidden" name="term" class="searchform-term" />

				<!-- btnMSearchSubmit -->
				<button id="btnMSearchSubmit" class="btn btn-success pvcontrolSearch inlineblock borderRadius --notopleft --nobottomleft tcenter" type="submit">
					<span class="fa fa-search"></span>
				</button>
				<!-- #btnMSearchSubmit -->

			</div>
			<!-- #searchSelectCat -->

		</div>			
		<!-- #hmBox -->			

	</div>
	<!-- #hmSearchBoxCatContent -->

</div>
<!-- #hm-searchbar -->