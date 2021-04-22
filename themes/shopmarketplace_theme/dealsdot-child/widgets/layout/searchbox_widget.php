<?php if ( ! is_search() ) : ?>

	<div class="widget widget-searchbox">

		<div class="search-dropdown">
			<a id="btnSearchToggleBox" class="btnSearchToggleBox" href="#">
				<span class="fa fa-angle-down"></span>
			</a>
		</div>

		<div class="searchbox">	

			<div class="search-wrapper flex">			

				<input type="text" 
					class="search-field" 
					autocomplete="off" 
					value="<?php echo $_GET['s'] ?>" 
					name="s" 
					placeholder="Cherchez un produit" />

				<button type="submit">
					<span class="fa fa-search"></span>
				</button>

			</div>

			
		</div>

		<div id="__sidebar-categories-dropdown" class="sidebar-categories-dropdown mtop10">
			<div class="box-wrapper">

				<?php 
					$args = array(

						'taxonomy' => PRODUCT_TAXONOMY,
						'hide_empty' => true

					);
		
					$data_product_categories_list = get_terms($args); 

					$product_cat_id = -1;

					if ( is_search() ) :
					
						$product_cat_id = $_GET['product_cat_id'] ? (int) $_GET['product_cat_id'] : -1;
						
					else :

						if ( is_tax(PRODUCT_TAXONOMY) ) :

							$product_cat_id = get_term_by('slug', get_query_var('term'), PRODUCT_TAXONOMY)->term_id;

						endif;					
					
					endif; ?>

				<select id="slSbLeftSearchBarShopCategories"
						class="form-control js-select2-header-dropdown-simple"
						data-field-value-init="<?= $product_cat_id ?>"
						data-field-id-binding="txtHidSbLeftFilCategory">

					<option value="-1">--- Sélectionnez une catégorie de produit ---</option>

					<?php 
						foreach ($data_product_categories_list as $key => $category) : ?>

							<option value="<?php echo $category->term_id ?>">

								<?php echo $category->name ?>
								
							</option>
						
					<?php endforeach; ?>				

				</select>

				<input type="hidden" id="txtHidSbLeftFilCategory" name="product_cat_id" value="<?= $product_cat_id ?>" />
				
			</div>
		</div>

	</div>

<?php endif; ?>