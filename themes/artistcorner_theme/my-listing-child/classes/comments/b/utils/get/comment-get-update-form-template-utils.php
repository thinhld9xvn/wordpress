<?php 

    namespace Comments;

    class CommentGetUpdateFormTemplateUtils {

        public static function get() {

            $option = get_option('section-comments-form_option_name');

            return $option['commentform-update-template-id'];

        }

    }