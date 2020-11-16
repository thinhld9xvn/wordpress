<?php 
    echo $before_widget; 

        echo $before_title . $title . $after_title; ?>
    
            <ul class="pboxlist --default">

                    <?php                   
                        
                        $args = array(
                            'hide_empty' => 0,
                            'orderby' => 'date',                            
                            'parent' => $cat_id,
                            'number' => $num_cat                            
                        );
                        $categories = get_categories( $args );

                        foreach( $categories as $category ) : ?>

                            <li>
                                <a href="<?php echo get_category_link( $category ); ?>">
                                    <?php echo short_text( $category->name, 60 ); ?>
                                </a>
                            </li>           

                            
                    <?php
                        endforeach; ?>                                
                   
                </ul>      
    	
<?php echo $after_widget; ?>