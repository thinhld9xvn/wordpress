<?php
    
    namespace Strings;

    class StringJoinFileNameUtils {

        public static function parse($data) {

            extract($data);

            return $name . '.' . $ext;

        }

    }