<?php 

//set_map_categories_with_shop();

    $shop_name = \Strings\StringGetQueryUtils::get('shop_id');

    if ( ! empty( $shop_name ) ) :

        $categories = \Commercants\CommercantGetStoreCategoriesListUtils::get_by_store($shop_name);

    //echo "<pre>"; print_r( $categories );

        if ( $categories ) : ?>

            <div class="widget widget-categories-box">
                
                <h4 class="widget-title">Catégories</h4>

                <div class="widget-content">

                    <ul class="menu-lists">

                        <?php 
                            $count = 1;

                            foreach ( $categories as $key => $cat ) : ?>

                                <li class="<?= $count > 20 ? 'none' : '' ?>">

                                    <a data-id="<?php echo $cat['id']; ?>" 
                                    data-slug="<?php echo $cat['permalink']; ?>"  
                                    data-name="<?php echo $cat['name']; ?>"                                   
                                        href="<?php echo $cat['permalink'] ?>">

                                        <?php echo $cat['name']; ?>

                                    </a>

                                </li>

                        <?php 
                                $count++;

                            endforeach; ?>                 

                    </ul>

                    <?php if ( $count < sizeof( $categories ) ) : ?>

                        <div class="load-more mtop20">
                            <a id="btnCategoriesListViewAll" class="btn btn-primary btn-sm btnListViewAll" href="#">
                                Voir toute la liste
                                <span class="fa fa-angle-double-down"></span>
                            </a>
                        </div>

                    <?php endif; ?>

                </div>

            </div>		


<?php   endif; 

    endif; ?>