<?php 

    namespace Profiles;

    class ProfilePrintRelatedUtils {

        public static function print() {

            global $post, $current_user;

            $num_items = 6;

            $args = array(

                'post_type' => JOBS_POST_TYPE,
                'posts_per_page' => $num_items,
                'post__not_in' => array($post->ID),
                'author__not_in' => array($current_user->ID),
                'order' => 'date',
                'orderby' => 'desc',
                'meta_key' => _FIELD_JOBS_TYPE_KEY,
                'meta_value' => _FIELD_JOBS_TYPE_VALUE

            );

            query_posts( $args );

            if ( have_posts() ) : ?>

                <section class="i-section similar-listings">

                    <div class="container">

                        <div class="row section-title">

                            <h2 class="case27-primary-text">
                                You May Also Be Interested In
                            </h2>

                        </div>

                        <div class="grid-three-columns mtop20">

                            <?php while ( have_posts() ) : the_post();

                                    print_entry_profile_in_loop();

                                endwhile; ?>

                        </div>

                    </div>

                </section>

            <?php endif;
                wp_reset_query();        

        }

    }