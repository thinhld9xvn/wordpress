<?php 
    namespace Products;
    class GetProductOptUtils {
        public static function get($product) {
            $arrOpts = [];
            $opts = get_field('prod_opts', $product->get_id());
            $opts = explode(PHP_EOL, $opts);
            foreach ( $opts as $key => $opt ) :
                $str = explode(':', $opt);
                $text = trim($str[0]);
                $value = trim($str[1]);
                $arrOpts[] = [
                    'text' => $text,
                    'value' => $value
                ];
            endforeach;
            return $arrOpts;
        }
    }