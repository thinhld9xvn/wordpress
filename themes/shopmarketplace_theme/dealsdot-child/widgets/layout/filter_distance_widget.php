<?php 
	$filter_min_value = $sidebar_options['sidebar-filter-distance-min-value-id'];
	$filter_max_value = $sidebar_options['sidebar-filter-distance-max-value-id'];
	$filter_value = -1;
	$_filter_value = $filter_min_value;

	if ( $_GET['dis_radius'] ) :

		$filter_value = (int) $_GET['dis_radius'];

		if ( $filter_value === -1 ) :

			$_filter_value = $filter_min_value;

		else :

			$_filter_value = $filter_value;

		endif;

	endif; ?>

<div class="widget widget-filter-distance">

	<h4 class="widget-title">Filtrer par distance</h4>

	<div class="widget-content">

		<div class="filter-box slider-range-distance">

			<div class="filter-distance-control">
				<div id="slider-range-distance" 
					 data-min-value="<?php echo $filter_min_value ?>"
					 data-max-value="<?php echo $filter_max_value ?>"
					 data-selected-value="<?php echo $_filter_value ?>" ></div>
			</div>

			<div class="range-inputs">
			    <div class="input-wrapper">
			        <span><?php echo $filter_min_value ?></span>
			        <span><?php echo $filter_max_value ?></span>
			    </div>
			</div>

			<div class="filter-wrap-main flex flex-algn-center flex-just-space">
				<div class="box-left">
					Rayon:
					<span class="value"><?php echo $_filter_value  ?></span> Km
				</div>
				<div class="box-right">

					<button id="btnFilterDistance" class="btn btn-primary btnFilterDistance" type="submit">
						Filtrer
					</button>

				</div>
			</div>

			<input type="hidden" id="txtFilDistance" name="dis_radius" value="<?php echo $filter_value ?>" />
			<input type="hidden" id="txtUserLocationLat" name="user_lat" value="" />
			<input type="hidden" id="txtUserLocationLng" name="user_lng" value="" />

		</div>
	</div>
</div>