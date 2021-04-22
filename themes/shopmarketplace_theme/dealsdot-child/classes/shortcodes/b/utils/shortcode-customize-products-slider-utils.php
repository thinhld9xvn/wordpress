<?php 

    namespace Shortcodes;

    class ShortcodeCustomizeProductsSliderUtils {

        public static function render($attr) {

          /*$atts = shortcode_atts( array(
            'foo' => 'no foo',
            'baz' => 'default baz'
        ), $atts, 'bartag' );*/ 

        $num_products = 15;
        
        $args = array(

            'taxonomy' => PRODUCT_TAXONOMY,
            'hide_empty' => true,
            'parent' => 0

        );

        $terms = get_terms( $args ); ?>    

        <div id="product-tabs-slider" class="scroll-tabs">

            <div class="more-info-tab clearfix">

                <h3 class="new-product-title pull-left">Derniers produits</h3>

                <div class="navProductSlideShowWrapper">

                    <div class="hidden-md">

                        <select id="slNavProductSlideShow" class="js-select2-dropdown-simple">

                            <option value="#all-product-categories" data-loaded="true">
                                Tous
                            </option>

                        <?php foreach ($terms as $key => $term) : ?>

                                <option value="<?php echo '#' . $term->slug ?>"
                                        data-term-slug="<?php echo $term->slug ?>"
                                        data-num-products="<?php echo $num_products ?>">
                                    <?php echo $term->name ?>
                                </option>

                            <?php endforeach; ?>
            
                        </select>
                    
                    </div>

                    <div class="hidden-xs hidden-sm">

                        <ul class="nav nav-tabs nav-tab-line pull-right">

                            <li class="active">
                                <a href="#all-product-categories" data-loaded="true">
                                    Tous
                                </a>
                            </li>

                            <?php foreach ($terms as $key => $term) : ?>

                                <li>
                                    <a href="<?php echo '#' . $term->slug ?>"
                                    data-term-slug="<?php echo $term->slug ?>"
                                    data-num-products="<?php echo $num_products ?>">
                                        <?php echo $term->name ?>
                                    </a>
                                </li>
                                
                            <?php endforeach; ?>

                        </ul>

                    </div>

                </div>

            </div>

            <div class="tab-content outer-top-xs">

                <?php 
                     $args = array(
                        'post_type' => \Products\PRODUCT_FIELDS::PRODUCT_POST_TYPE,
                        'order' => 'desc',
                        'orderby' => 'rand',
                        'posts_per_page' => $num_products
                    );
                ?>

                <div class="tab-pane active" id="all-product-categories">

                    <div class="product-slider">

                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

                            <?php 
                                \Products\ProductPrintListsInLoopSliderUtils::print($args); ?>

                        </div>

                    </div>

                </div>

                <?php foreach ($terms as $key => $term) : ?>

                    <div class="tab-pane" id="<?php echo $term->slug ?>">

                        <div class="product-slider">

                            <div class="perform-ajax">
                                <span class="fa fa-circle-o-notch fa-spin"></span>
                                <span class="caption">Chargement des produits, veuillez patienter ...</span>
                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>
        

<?php }

    }