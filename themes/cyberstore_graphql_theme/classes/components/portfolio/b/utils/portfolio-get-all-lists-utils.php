<?php 

    namespace Portfolio;

    class PortfolioGetAllListsUtils {

        public static function get() {

            $args = array(

                'post_type' => PORTFOLIO_POST_TYPE,
                'posts_per_page' => -1                

            );

            query_posts($args);

            $data = [];

            $id = 0;

            while ( have_posts() ) : the_post();

               $data[] = [
                   'id' => 'portfolio_' . $id,
                   'text' => PortfolioGetTitleUtils::get(),
                   'background' => PortfolioGetBackgroundUtils::get(),
                   'button' => [
                       'text' => PortfolioGetButtonTextUtils::get(),
                       'url' => PortfolioGetButtonUrlUtils::get()
                   ]     
                   
               ];

               $id++;

            endwhile;

            wp_reset_query();

            return $data;

           
        }

    }