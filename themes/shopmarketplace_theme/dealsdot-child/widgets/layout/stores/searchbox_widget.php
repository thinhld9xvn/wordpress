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
				   value="" 
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
                $shop_name = \Strings\StringGetQueryUtils::get('shop_id');

                if ( ! empty( $shop_name ) ) :

                    $categories = \Commercants\CommercantGetStoreCategoriesListUtils::get_by_store($shop_name); 
                    
                    if ( $categories ) : ?>

                        <select id="slSbLeftSearchBarShopCategories"
                                class="form-control js-select2-header-dropdown-simple"
                                data-field-value-init="-1"
                                data-field-id-binding="txtHidSbLeftFilCategory">

                            <option value="-1">--- Sélectionnez une catégorie de produit ---</option>

                            <?php 
                                foreach ($categories as $key => $category) : ?>

                                    <option value="<?php echo $category['id'] ?>">

                                        <?php echo $category['name'] ?>
                                        
                                    </option>
                                
                            <?php endforeach; ?>				

                        </select>

                        <input type="hidden" id="txtHidSbLeftFilCategory" name="product_cat_id" value="-1" />

        <?php 
                    endif; 
                    
                endif; ?>
			
		</div>
	</div>

</div>