<?php
    
    add_shortcode( 'artistcorner-search', '__sc_artist_corner_search_box' );

    function __sc_artist_corner_search_box( $atts ) { ?>

        <form method="GET" action="<?= EXPLORE_JOBS_SEARCH_URL ?>" novalidate>

            <div class="artist-main-searchbox <?= is_page_template() ? '__fixed-top' : '' ?>">

                <div class="searchbox-wrapper">                

                    <div class="form-group location-wrapper explore-filter location-filter md-group">

                        <input required="required" type="text" placeholder="" name="search_location" value="" /> 

                        <i class="material-icons geocode-location">my_location</i> 

                        <label>Where to look ?</label>

                    </div>

                    <div id="form-group-category-filter" class="form-group category-filter md-group">

                        <label>All Jobs Category</label>

                        <select id="slHomeFilterCategory" 
                                class="js-select2-dropdown-simple slCategories" 
                                name="category"
                                data-placeholder="All jobs category">

                                <option></option>

                                <?php $terms = get_jobs_categories();
                                    foreach ( $terms as $key => $term ) : ?>

                                        <option value="<?= $term->slug ?>">
                                            <?= $term->name ?>
                                        </option>
                                    
                                <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="form-group looking-for md-group">

                        <input id="txtSearchKeywords" 
                                required="required"
                                name="search_keywords" 
                                type="text" 
                                autocomplete="off" 
                                placeholder="" value="" /> 

                        <label>What are you looking for ?</label>

                    </div>

                    <div class="form-group search-filter featured-search">

                        <button class="buttons button-2 search">

                            <i class="material-icons geocode-search">search</i>
                            <span>Search</span>
                            
                        </button>

                    </div>

                </div>

            </div>

            <input type="hidden" name="type" value="<?= _FIELD_JOBS_TYPE_VALUE ?>" />

        </form>
       

<?php }