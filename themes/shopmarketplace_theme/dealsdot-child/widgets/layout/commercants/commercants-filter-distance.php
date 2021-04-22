<?php 
	$filter_min_value = $sidebar_options['sidebar-filter-distance-min-value-id'];
	$filter_max_value = $sidebar_options['sidebar-filter-distance-max-value-id']; ?>

<div class="widget widget-filter-distance">

	<h4 class="widget-title">Filtrer par distance</h4>

	<div class="widget-content">

		<div class="filter-box slider-range-distance">

			<div class="filter-distance-control">
				<div id="slider-range-distance" 
					 data-min-value="<?php echo $filter_min_value ?>"
					 data-max-value="<?php echo $filter_max_value ?>"
					 data-selected-value="<?php echo $filter_min_value ?>" ></div>
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
					<span class="value"><?php echo $filter_min_value  ?></span> Km
				</div>
				<div class="box-right">

					<a id="btnResetFilter" 
						href="#" 
						class="btn btn-primary">
						<span class="fa fa-refresh"></span>
					</a>

					<a id="btnFilterDistance" href="#" class="btn btn-primary">
						Filtrer
					</a>

				</div>
			</div>			

		</div>
	</div>
</div>