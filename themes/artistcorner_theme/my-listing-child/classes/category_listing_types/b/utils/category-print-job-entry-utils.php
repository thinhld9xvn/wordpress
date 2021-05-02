<?php 

    namespace Category_Listing_Types;

    class CategoryPrintJobEntryUtils {

        public static function print($term, $count, $length) {

            $image = get_profile_term_image($term); 
            $icon = get_profile_term_icon($term); 

            $option = get_option('section-discover-job-categories_option_name');
            
            $label = $term->name;
            
            if ( $count === 0 ) :

                $label = "Explore " . $label;

            elseif ( $count === $length - 1 ) :

                $label = "Discover " . $label;
            
            endif; 
            
            if ( $count === $length - 2 ) : ?>

                <a class="__quotes" href="<?php print_category_jobs_url($term) ?>">

                    <div class="quote-icon">
                        <span class="elementor-icon fa <?php echo $option['discover-jobs-cat-slogan-icon-id'] ?>"></span>
                    </div>

                    <div class="quote-caption">
                        <?php echo $option['discover-jobs-cat-slogan-intro-id'] ?>
                    </div>

                    <div class="quote-author"><?php echo $option['discover-jobs-cat-slogan-author-id'] ?></div>

                </a>   

            <?php 
                else : ?>

                    <a href="<?php print_category_jobs_url($term) ?>" 
                    <?php if ( ! empty( $image['url'] ) ) : ?>
                            style="background-image: url('<?php echo $image['url'] ?>')"
                        <?php endif; ?>>

                        <span class="icon <?php echo $icon ?>"></span>
                        <span class="caption"><?php echo $label ?></span> 
                    </a>   

            <?php endif;

        }

    }