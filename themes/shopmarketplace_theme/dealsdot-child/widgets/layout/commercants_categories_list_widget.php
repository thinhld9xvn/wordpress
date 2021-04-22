<?php 
    $categories_lists = \Products\ProductGetPriorityCategoriesUtils::get(); 
    
    if ( $categories_lists ) : ?>  

        <div class="widget widget-categories-box">
            
            <h4 class="widget-title">Catégories</h4>

            <div class="widget-content">

                <ul class="menu-lists">

                    <?php
                        
                        foreach ($categories_lists as $key => $cat) : ?>

                            <li>
                                <a href="<?php echo get_term_link($cat) ?>">
                                    <?php echo $cat->name ?>
                                </a>
                            </li>                          
                            
                    <?php endforeach; ?>                 

                </ul>

            </div>

        </div>	

<?php endif; ?>