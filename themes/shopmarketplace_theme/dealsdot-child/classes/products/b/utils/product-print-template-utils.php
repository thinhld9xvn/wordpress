<?php 

    namespace Products;

    class ProductPrintTemplateUtils {

        public static function print($product) {

            $messages = \MessageNotification\MessageGetUtils::get_all();

            //extract($messages);

            $product_id = $product->get_id(); 

            $product_name = $product->get_name();
            $product_url = $product->get_permalink();

            $feature_image = get_the_post_thumbnail($product_id, 'full');

            $price_html = $product->get_price_html();

            $shop_name = \Commercants\CommercantGetShopNameUtils::get_by_pid($product_id, 'uppercase');

            if ( empty($shop_name) ) return;

            //$rating = $product->get_average_rating(); 
            //$count = $product->get_rating_count();

            //$rating_html = wc_get_rating_html( $rating, $count );

            /*$regular_price = floatval($product->regular_price);
            $sale_price = floatval($product->regular_price);

            $discount = floor(( $regular_price - $sale_price ) / $regular_price * 100) + 1;*/  ?>

            <div class="product">

                <div class="product-image">

                    <div class="image">

                        <a href="<?php echo $product_url ?>">

                            <?php echo $feature_image ?>
                            
                        </a>

                    </div>

                    <!--<div class="tag new"><span>-<?php //echo $discount ?>%</span></div>-->

                </div>

                <div class="product-info text-left">

                    <h3 class="name">

                        <a href="<?php echo $product_url ?>">
                            <?php echo $product_name ?>
                        </a>

                    </h3>

                    <?php if ( ! empty( $shop_name ) ):

                        $commercants_list = \Commercants\CommercantGetListUtils::get();
                    
                        $id = \Commercants\CommercantSearchShopUtils::search_id($commercants_list, $shop_name) + 1;

                        $url = \Urls\UrlGetStoreDetailsPageUtils::get() . $id;
                        
                        //$url = "//{$_SERVER['SERVER_NAME']}/commerce/{$shop_name_in_url}"; ?>

                        <div class="store-info tcenter">
                            <strong>
                                <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_OFFERED_BY_LABEL_ID] ?> 
                                <a href="<?php echo $url ?>">
                                    <?php echo $shop_name ?>
                                </a>
                            </strong>
                        </div>

                    <?php endif; ?>

                    <div class="product-price">
                        <span class="price">
                            <?php echo $price_html; ?>
                        </span>
                    </div>
                </div>

                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <ul class="list-unstyled">					
                            <li class="lnk wishlist">
                                <div class="tinv-wraper woocommerce tinv-wishlist tinvwl-shortcode-add-to-cart" 
                                        data-product_id="<?php echo $product_id ?>">
                                    <div class="tinv-wishlist-clear"></div>
                                    <a
                                        role="button"
                                        aria-label="<?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::ADD_TO_WISHLIST_LABEL_ID] ?>"
                                        class="tinvwl_add_to_wishlist_button tinvwl-icon-heart tinvwl-position-after"
                                        data-tinv-wl-list="[]"
                                        data-tinv-wl-product="<?php echo $product_id ?>"
                                        data-tinv-wl-productvariation="0"
                                        data-tinv-wl-productvariations="[0]"
                                        data-tinv-wl-producttype="simple"
                                        data-tinv-wl-action="add"
                                    >
                                        <span class="tinvwl_add_to_wishlist-text"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::ADD_TO_WISHLIST_LABEL_ID] ?></span>
                                    </a>
                                    <div class="tinv-wishlist-clear"></div>
                                    <div class="tinvwl-tooltip"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::ADD_TO_WISHLIST_LABEL_ID] ?></div>
                                </div>
                            </li>						
                        </ul>
                    </div>
                </div>

            </div>  

        <?php }

    }