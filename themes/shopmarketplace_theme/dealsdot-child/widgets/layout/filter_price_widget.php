<?php 
	$filter_min_value = $filter_selected_min_value = $sidebar_options['sidebar-filter-price-min-value-id'];
	$filter_max_value = $filter_selected_max_value = $sidebar_options['sidebar-filter-price-max-value-id'];

	if ( $_GET['min_price'] ) :

		$filter_selected_min_value = (int) $_GET['min_price'];

	endif;

	if ( $_GET['max_price'] ) :

		$filter_selected_max_value = (int) $_GET['max_price'];

	endif; ?>

<div class="widget widget-filter-price">

	<h4 class="widget-title">Filtrer par prix</h4>

	<div class="widget-content">

		<div class="filter-box slider-range-price slider-range-two-points">

			<div id="filter-price-range" 
				 data-min-value="<?php echo $filter_min_value ?>" 
				 data-max-value="<?php echo $filter_max_value ?>"
				 data-selected-min-value="<?php echo $filter_selected_min_value ?>"
				 data-selected-max-value="<?php echo $filter_selected_max_value ?>"></div>

			<div class="range-inputs">
			    <div class="input-wrapper">
			        <span><?php echo $filter_min_value ?></span>
			        <span><?php echo $filter_max_value ?></span>
			    </div>
			</div>

			<div class="filter-wrap-main flex flex-algn-center flex-just-space">

				<div class="box-left">

					<span class="price-filter-value">
						Prix:
						<span class="lowest"><?php echo $filter_selected_min_value ?></span>
					</span>

					<span class="currency">€</span> 
						- 
					<span class="highest"><?php echo $filter_selected_max_value ?></span>

					<span class="currency">€</span>
						
				</div>

				<div class="box-right">

					<button class="btn btn-primary" type="submit">
					Filtrer
					</button>

				</div>

			</div>

			<input type="hidden" id="txtFilPriceMin" name="min_price" value="<?php echo $filter_selected_min_value ?>" />
			<input type="hidden" id="txtFilPriceMax" name="max_price" value="<?php echo $filter_selected_max_value ?>" />

		</div>
		
	</div>

</div>