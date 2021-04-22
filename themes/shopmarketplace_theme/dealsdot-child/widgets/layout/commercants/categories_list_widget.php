<?php 

//set_map_categories_with_shop();

    $categories = \Commercants\CommercantGetStoreCategoriesListUtils::get_all();

    //echo "<pre>"; print_r( $categories );

    if ( $categories ) : ?>

        <div class="widget widget-categories-box">
        	
            <h4 class="widget-title">Catégories</h4>

            <div class="widget-content">

                <ul class="menu-lists">

                    <?php 
                        $count = 1;

                        foreach ( $categories as $key => $name ) : 
                        
                            $_name = mb_strtolower($name, 'UTF-8');
                            $show_all_label = mb_strtolower(SHOW_ALL_FRANCE_LABEL, 'UTF-8'); ?>

                            <li class="<?= $count > 20 ? 'none' : '' ?>">

                                <a href="#" 
                                  data-name="<?= $_name === $show_all_label ? SHOW_ALL_ENGLISH_LABEL : $_name ?>">

                                    <?php echo ucfirst( $name ); ?>

                                </a>

                            </li>

                    <?php 
                            $count++;

                        endforeach; ?>                 

                </ul>

                <div class="load-more mtop20">
                    <a id="btnCategoriesListViewAll" class="btn btn-primary btn-sm btnListViewAll" href="#">
                        Voir toute la liste
                        <span class="fa fa-angle-double-down"></span>
                    </a>
                </div>

            </div>

        </div>		


<?php endif; ?>