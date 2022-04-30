<?php 
    namespace Projects;
use \Taxonomies\TaxGetMetaTermsUtils;
    class ProjectsGetAllItemUtils {
        private static function get_by_id($pid, $lang) {           
            $thumbnail = get_the_post_thumbnail_url($pid, 'full');
            $banner_description = ProjectsGetMetaBannerDescriptionUtils::get($pid);
            $heading = ProjectsGetMetaHeadingUtils::get($pid);
            $desc = ProjectsGetMetaDescriptionUtils::get($pid);
            $location = ProjectsGetMetaLocationUtils::get($pid);
            $dentision = ProjectsGetMetaDentisionUtils::get($pid);
            $time = ProjectsGetMetaTimeUtils::get($pid);
            $team = ProjectsGetMetaTeamUtils::get($pid);
            $galleries = ProjectsGetMetaGalleriesUtils::get($pid);
            $categories = TaxGetMetaTermsUtils::get($pid, PROJECTS_TAXONOMY);
            $post_trans = pll_get_post($pid, $lang === DEFAULT_LANG ? 'en' : DEFAULT_LANG);
            return [
                PROJECT_FIELDS::ID_GQL_FIELD => $pid,
                PROJECT_FIELDS::TITLE_GQL_FIELD => get_the_title(),
                PROJECT_FIELDS::URL_GQL_FIELD => filter_permalink(get_the_permalink()),
                PROJECT_FIELDS::THUMBNAIL_GQL_FIELD => !empty($thumbnail) ? $thumbnail : '',
                PROJECT_FIELDS::BANNER_DESCRIPTION_GQL_FIELD => $banner_description,
                PROJECT_FIELDS::HEADING_GQL_FIELD => $heading,
                PROJECT_FIELDS::DESCRIPTION_GQL_FIELD => $desc,
                PROJECT_FIELDS::LOCATION_GQL_FIELD => $location,
                PROJECT_FIELDS::DENTISION_GQL_FIELD => $dentision,
                PROJECT_FIELDS::TIME_GQL_FIELD => $time,
                PROJECT_FIELDS::TEAM_GQL_FIELD => $team,
                PROJECT_FIELDS::GALLERIES_GQL_FIELD => $galleries,
                PROJECT_FIELDS::POLYLANG_POST_GQL_FIELD => filter_permalink(get_the_permalink($post_trans)),
                PROJECT_FIELDS::CATEGORIES_GQL_FIELD => $categories,
            ];
        }
        public static function get($lang = DEFAULT_LANG, $slug = '', $keyword = '') {
            $results = [];
            $args = array(
                'post_type' => PROJECTS_POST_TYPE,
                'posts_per_page' => -1,
                'no_paging' => true,
                'lang' => $lang
            );
            if ( $slug ) :                
                $args['name'] = $slug;
            else :
                if ( $keyword ) :
                    $args['s'] = $keyword;
                endif;
            endif;
            query_posts($args);
            while ( have_posts() ) : the_post();
                $pid = get_the_id();
                $results[] = self::get_by_id($pid, $lang);
            endwhile;
            wp_reset_query();
            return $results;
        }
    }