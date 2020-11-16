<?php 

    $template_dir = get_template_directory();
    $template_dir_name = array_pop( explode( '/', $template_dir ) );
    
    define('CACHE_DIRECTORY_URI', 'http://' . $_SERVER['SERVER_NAME'] . '/wp-content/cache' );
    define('CACHE_DIRECTORY', $_SERVER['DOCUMENT_ROOT'] . '/wp-content/cache' );
    
    define('STYLESHEET_COMBINE_FILE_URI', CACHE_DIRECTORY_URI . '/pitviet-stylesheet-combines-one.css');
    define('STYLESHEET_COMBINE_FILE_PATH', CACHE_DIRECTORY . '/pitviet-stylesheet-combines-one.css');

    define('JAVASCRIPT_COMBINE_FILE_URI', CACHE_DIRECTORY_URI . '/pitviet-script-combines-one.js');
    define('JAVASCRIPT_COMBINE_FILE_PATH', CACHE_DIRECTORY . '/pitviet-script-combines-one.js');         

    define('THEME_FONT_DIRECTORY_URI', 'http://' . $_SERVER['SERVER_NAME'] . '/wp-content/themes/' . $template_dir_name . '/fonts' );
    define('THEME_IMAGES_DIRECTORY_URI', 'http://' . $_SERVER['SERVER_NAME'] . '/wp-content/themes/' . $template_dir_name . '/images' );    

    class WP_HTML_Compression
    {
        // Settings
        protected $compress_css = true;
        protected $compress_js = true;
        protected $info_comment = true;
        protected $remove_comments = true;
    
        // Variables
        protected $html;
        public function __construct($html)
        {
            if ( ! empty( $html ) ) :
            
                $this->parseHTML( $html );                

            endif;
        }
        public function __toString()
        {
            return $this->html;
        }
        protected function bottomComment($raw, $compressed)
        {
            $raw = strlen($raw);
            $compressed = strlen($compressed);
            
            $savings = ($raw-$compressed) / $raw * 100;
            
            $savings = round($savings, 2);
            
            return '<!--HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes-->';
        }
        protected function minifyHTML( $html )
        {
            $pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
            preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
            $overriding = false;
            $raw_tag = false;
            // Variable reused for output
            $html = '';
            foreach ($matches as $token)
            {
                $tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
                
                $content = $token[0];
                
                if (is_null($tag))
                {
                    if ( !empty($token['script']) )
                    {
                        $strip = $this->compress_js;
                    }
                    else if ( !empty($token['style']) )
                    {
                        $strip = $this->compress_css;
                    }
                    else if ($content == '<!--wp-html-compression no compression-->')
                    {
                        $overriding = !$overriding;
                        
                        // Don't print the comment
                        continue;
                    }
                    else if ($this->remove_comments)
                    {
                        if (!$overriding && $raw_tag != 'textarea')
                        {
                            // Remove any HTML comments, except MSIE conditional comments
                            $content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
                        }
                    }
                }
                else
                {
                    if ($tag == 'pre' || $tag == 'textarea')
                    {
                        $raw_tag = $tag;
                    }
                    else if ($tag == '/pre' || $tag == '/textarea')
                    {
                        $raw_tag = false;
                    }
                    else
                    {
                        if ($raw_tag || $overriding)
                        {
                            $strip = false;
                        }
                        else
                        {
                            $strip = true;
                            
                            // Remove any empty attributes, except:
                            // action, alt, content, src
                            $content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
                            
                            // Remove any space before the end of self-closing XHTML tags
                            // JavaScript excluded
                            $content = str_replace(' />', '/>', $content);
                        }
                    }
                }
                
                if ($strip)
                {
                    $content = $this->removeWhiteSpace($content);
                }
                
                $html .= $content;
            }
            
            return $html;
        }
      

        protected function minifyJS( $js_codes ) {

            $comment_begin_tag = "/*";
            $comment_end_tag = "*/";

            $removed_all_comments = false; 
            $start = 0;

            while ( ! $removed_all_comments ) :

                $begin_pos = strpos( $js_codes, $comment_begin_tag, $start );

                if ( false !== $begin_pos ) :

                    $end_pos = strpos( $js_codes, $comment_end_tag, $begin_pos );                   

                    if ( false !== $end_pos ) :

                        $js_codes = substr( $js_codes, 0, $begin_pos ) . substr( $js_codes, $end_pos + strlen( $comment_end_tag ) ); 

                        $start = $begin_pos;

                        // vị trí bắt đầu vượt quá độ dài chuỗi => thoát
                        if ( $start >= strlen( $js_codes ) ) :

                            $removed_all_comments = true;

                        endif;            

                    else :

                        $removed_all_comments = true;

                    endif;
                
                else :

                    $removed_all_comments = true;

                endif;

            endwhile;

            //$js_codes = $this->removeWhiteSpace( $js_codes );

            return $js_codes;

        }

        public function combineStyleSheet( $html ) {

            $output = '';

            $continue = true;

            $stylesheet_begin_tag_search = "<link rel='stylesheet'";
            $stylesheet_end_tag_search = "/>";

            $href_begin_keyword_search = "href='";
            $href_end_keyword_search = "'";

            $stylesheet_contents = '';          

            $start = 0;     

            while ( $continue ) :

                // bắt đầu tìm từ vị trí 0 của chuỗi $html
                $pos_bg = strpos( $html, $stylesheet_begin_tag_search, $start );              

                if ( false !== $pos_bg ) :

                    $pos_end = strpos( $html, $stylesheet_end_tag_search, $pos_bg );

                    if ( false !== $pos_end ) :

                        $output = substr( $html, $pos_bg, $pos_end + strlen( $stylesheet_end_tag_search ) - $pos_bg );
                        $html = str_replace( $output, '', $html );

                        $href_pos_bg = strpos( $output, $href_begin_keyword_search );

                        // cập nhật lại vị trí bắt đầu tìm kiếm là từ vị trí sau dấu '
                        $href_pos_bg = $href_pos_bg + strlen( $href_begin_keyword_search );
                        $href_pos_end = strpos( $output, $href_end_keyword_search, $href_pos_bg );

                        // lấy chuỗi đường dẫn file css trong thuộc tính href nằm giữa cặp ''
                        $href = substr( $output, $href_pos_bg, $href_pos_end - $href_pos_bg );                      

                        $stylesheet_contents .= file_get_contents( $href );

                        // mỗi lần tìm xong thì cập nhật lại vị trí tìm kiếm mới                                        
                        $start = $pos_bg;
 
                    endif;          

                else :

                    $continue = false;

                endif;

            endwhile;        

            $stylesheet_contents = preg_replace( sprintf( '/%s|%s|%s/i', 
                                                         '..\/fonts\/',
                                                         '\/fonts\/',
                                                         'fonts\/' ), THEME_FONT_DIRECTORY_URI . '/', $stylesheet_contents );

            $stylesheet_contents = preg_replace( sprintf( '/%s|%s|%s|%s|%s|%s/i', 
                                                         '..\/images\/',
                                                         '\/images\/',
                                                         'images\/',
                                                         '..\/img\/',
                                                         '\/img\/',
                                                         'img\/' ), THEME_IMAGES_DIRECTORY_URI . '/', $stylesheet_contents ); 

            $stylesheet_contents = $this->minifyHTML( $stylesheet_contents );

            if ( ! is_dir( CACHE_DIRECTORY ) ) :

                mkdir( CACHE_DIRECTORY );

            endif;

            file_put_contents( STYLESHEET_COMBINE_FILE_PATH, $stylesheet_contents );           

            // chèn tag link rel đến file css mới tạo ở trước tag </body>
            $stylesheet_tag = "<link rel='stylesheet' href='" . STYLESHEET_COMBINE_FILE_URI . "' type='text/css' />";

            $body_endtag_pos = strpos( $html, '</body>' );
            $html = substr( $html, 0, $body_endtag_pos ) . $stylesheet_tag . substr( $html, $body_endtag_pos );

            return $html;           

        }

        public function combineScripts( $html ) {

            $continue = true;
            $output = '';

            $script_begin_tag_search = "<script type='text/javascript'";
            $script_end_tag_search = "</script>";

            $src_begin_keyword_search = "src='";
            $src_end_keyword_search = "'";

            $script_contents = '';          

            $start = 0;

            while ( $continue ) :

                // bắt đầu tìm từ vị trí 0 của chuỗi $html
                $pos_bg = strpos( $html, $script_begin_tag_search, $start );              

                if ( false !== $pos_bg ) :

                    $pos_end = strpos( $html, $script_end_tag_search, $pos_bg );

                    if ( false !== $pos_end ) :

                        $output = substr( $html, $pos_bg, $pos_end + strlen( $script_end_tag_search ) - $pos_bg );                                         

                        $src_pos_bg = strpos( $output, $src_begin_keyword_search );

                        if ( false !== $src_pos_bg ) :

                            // cập nhật lại vị trí bắt đầu tìm kiếm là từ vị trí sau dấu '
                            $src_pos_bg = $src_pos_bg + strlen( $src_begin_keyword_search );
                            $src_pos_end = strpos( $output, $src_end_keyword_search, $src_pos_bg );

                            // lấy chuỗi đường dẫn file js trong thuộc tính href nằm giữa cặp ''
                            $src = substr( $output, $src_pos_bg, $src_pos_end - $src_pos_bg );

                            $script_contents .= file_get_contents( $src );    

                            $html = str_replace( $output, '', $html );      

                            // mỗi lần tìm xong thì cập nhật lại vị trí tìm kiếm mới                    
                            $start = $pos_bg;  

                        else :

                             $start = $pos_end;      

                        endif;                        
 
                    endif;     

                else :

                    $continue = false;

                endif;

            endwhile;

            $script_contents = $this->minifyJS( $script_contents );

            if ( ! is_dir( CACHE_DIRECTORY ) ) :

                mkdir( CACHE_DIRECTORY );

            endif;

            file_put_contents( JAVASCRIPT_COMBINE_FILE_PATH, $script_contents );

            // chèn tag <script type='text/javascript' đến file js mới tạo ở trước tag </body>      
            $script_tag = "<script type='text/javascript' src='" . JAVASCRIPT_COMBINE_FILE_URI . "'></script>";

            $body_endtag_pos = strpos( $html, '</body>' );
            $html = substr( $html, 0, $body_endtag_pos ) . $script_tag . substr( $html, $body_endtag_pos );

            return $html;          

        }
 
        public function combineAllStyleScripts( $html ) {                 

            $outputs = $html;

            $outputs = $this->combineStyleSheet( $outputs );
            $outputs = $this->combineScripts( $outputs );
            
            return $outputs;

        }
            
        public function parseHTML( $html )
        {           

            $outputs = $html;            
            
            $outputs = $this->combineAllStyleScripts( $outputs );

            if ( ! is_admin() ) :
                $this->html = $this->minifyHTML( $outputs );
            endif;
            
            if ($this->info_comment)
            {
                $this->html .= "\n" . $this->bottomComment($html, $this->html);
            }
        }
        
        protected function removeWhiteSpace($str)
        {
            $str = str_replace("\t", ' ', $str);
            $str = str_replace("\n",  '', $str);
            $str = str_replace("\r",  '', $str);
            
            while (stristr($str, '  '))
            {
                $str = str_replace('  ', ' ', $str);
            }
            
            return $str;
        }
    }
    
    function wp_html_compression_finish($html)
    {
        return new WP_HTML_Compression($html);        
    }
    
    function wp_html_compression_start()
    {
        ob_start('wp_html_compression_finish');
    }
    
    add_action('get_header', 'wp_html_compression_start');

?>