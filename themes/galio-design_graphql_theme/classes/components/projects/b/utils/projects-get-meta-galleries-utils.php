<?php 
    namespace Projects;
    class ProjectsGetMetaGalleriesUtils {
        public static function get($pid) {
            $field = get_post_meta($pid, PROJECT_FIELDS::GALLERIES_FIELD, true);
            $field = array_map(function($item) {
                $itemGalleriesRow = [];
                foreach($item[PROJECT_FIELDS::GALLERY_SETOF_FIELD] as $key => $gallery) :
                    $results = [];
                    $thumbnail_id = pn_get_attachment_id_from_url($gallery[PROJECT_FIELDS::THUMBNAIL_GQL_FIELD]);
                    $results[PROJECT_FIELDS::THUMBNAIL_GQL_FIELD] = wp_get_attachment_image_url($thumbnail_id, 'feature_image_project_thumbnail');
                    $results[PROJECT_FIELDS::FULL_IMAGE_GQL_FIELD] = wp_get_attachment_image_url($thumbnail_id, 'full');
                    $itemGalleriesRow[] = $results;
                endforeach;
                return ['data' => $itemGalleriesRow];
            }, $field);
            return $field;
        }
    }