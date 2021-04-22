<?php 

    $args = array(

        'taxonomy' => PRODUCT_TAXONOMY,
        'hide_empty' => true,
        'parent' => 0

    );  

    $categories = get_terms( $args ); 

    if ( $categories ) : ?>

        <div class="widget widget-categories-box">
        	
            <h4 class="widget-title">Catégories</h4>

            <div class="widget-content">

                <ul class="menu-lists">

                    <?php 
                        $count = 1;

                        foreach ( $categories as $key => $cat ) : ?>

                            <li class="<?= $count > 20 ? 'none' : '' ?>">

                                <a data-id="<?php echo $cat->term_id; ?>" 
                                   data-slug="<?php echo $cat->slug; ?>"  
                                   data-name="<?php echo $cat->name; ?>"                                   
                                    href="<?php echo get_term_link($cat); ?>">

                                    <?php echo $cat->name; ?>

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