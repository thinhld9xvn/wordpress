<?php 
    /* Template Name: Profile Gallery */ ?>

<?php get_header(); ?>

<?php do_shortcode('[artistcorner-search]'); ?>

<div id="main">
    <div class="container-fluid">

        <div class="main-wrapper ohidden">

            <div class="sidebar col-sm-3 col-xs-12">

                <div class="widget widget-filter-box">

                    <?php $filter_selected_min_value = $filter_min_value = 300; 
                          $filter_selected_max_value = $filter_max_value = 1210; ?>

                    <h2 class="widget-heading">Filter</h2>

                    <div class="widget-content mtop20">

                        <div class="reset-filter">

                            <a class="flex flex-wrap flex-col-direction flex-algn-center" href="#">
                                <span class="fa fa-refresh"></span>
                                <span class="caption">Reset criteria</span>
                            </a>

                        </div>

                        <div class="wage-box">

                            <label>Wage/day</label>

                            <div class="wg-filter-display mtop20">

                                <div class="filter-box slider-range-price slider-range-two-points">

                                    <div id="filter-price-range" 
                                        data-min-value="<?php echo $filter_min_value ?>" 
                                        data-max-value="<?php echo $filter_max_value ?>"
                                        data-selected-min-value="<?php echo $filter_selected_min_value ?>"
                                        data-selected-max-value="<?php echo $filter_selected_max_value ?>"></div>

                                    <div class="range-inputs">
                                        <div class="input-wrapper">
                                            <span><?php echo $filter_min_value ?> € and -</span>
                                            <span><?php echo $filter_max_value ?> € and +</span>
                                        </div>
                                    </div>

                                    <div class="filter-wrap-main flex flex-algn-center flex-just-space">

                                        <div class="box-left">

                                            <span class="price-filter-value">
                                                Price:
                                                <span class="lowest"><?php echo $filter_selected_min_value ?></span>
                                            </span>

                                            <span class="currency">€</span> 
                                                - 
                                            <span class="highest"><?php echo $filter_selected_max_value ?></span>

                                            <span class="currency">€</span>
                                                
                                        </div>

                                        <div class="box-right">

                                            <button class="btn btn-primary" type="submit">
                                            Filter
                                            </button>

                                        </div>

                                    </div>

                                    <input type="hidden" id="txtFilPriceMin" name="min_price" value="<?php echo $filter_selected_min_value ?>" />
                                    <input type="hidden" id="txtFilPriceMax" name="max_price" value="<?php echo $filter_selected_max_value ?>" />

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="widget widget-skill-lv">

                    <div class="box-heading">
                        <label data-toggle="checkbox-toggle"
                                
                                data-handle-size="20"
                                data-handle-color="bg-white"
                                data-off-color="bg-gray-400"
                                data-on-color="bg-blue-400">
                            <input type="checkbox" />
                        </label>
                    </div>

                </div>

            </div>
            <div class="page-contents col-sm-9 col-xs-12"></div>
        </div>
    </div>
</div>



<?php get_footer(); ?>