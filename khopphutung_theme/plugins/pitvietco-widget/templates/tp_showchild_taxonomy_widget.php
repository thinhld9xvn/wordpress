<?php 
    echo $before_widget; ?>

        <!-- boxSPCategory -->
        <div class="boxSPCategory">

            <h3 class="spWidgCatTitleBox">
                <?php echo $title; ?>
            </h3>

            <!-- spWidgCatContentBox -->
            <div class="spWidgCatContentBox widgContentBox bg_lightgray">

                <ul class="pboxlist --catbox">

                    <?php                   
                    
                        $args = array(
                            'hide_empty' => 0,
                            'orderby' => 'date',
                            'order' => 'desc',
                            'taxonomy' => $tax,
                            'parent' => 0,
                            'number' => $num_tax
                        );

                        $terms = get_terms( $args );

                        foreach( $terms as $term ) : ?>

                            <li>
                                <a href="<?php echo get_term_link( $term ); ?>">
                                    <?php echo short_text( $term->name, 60 ); ?>
                                </a>
                            </li>
                            
                    <?php
                        endforeach; ?>  

                </ul>

            </div>
            <!-- #spWidgCatContentBox -->

        </div>
        <!-- #boxSPCategory -->
    	
<?php echo $after_widget; ?>