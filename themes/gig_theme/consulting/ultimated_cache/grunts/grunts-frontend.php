<?php
    class GRUNTS_FRONTEND
    {
        
        // Variables
        protected $html, $data_js, $data_js_inline, $data_css;
        public function __construct($html)
        {
            if ( ! empty( $html ) ) :

                $this->data_js = '';
                $this->data_js_inline = '';
                $this->data_css = '';

                $this->parseHTML( $html );


            endif;
        }
        public function __toString()
        {
            return $this->html;
        } 

        protected function curl_get_file_contents($URL) {

            $c = curl_init();
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($c, CURLOPT_URL, $URL);
            $contents = curl_exec($c);
            curl_close($c);

            if ($contents) return $contents;
                else return FALSE;
        }

        protected function filterHTML($str, $start_tag, $end_tag) {

            global $grunts;

            $start = 0;            

            $output = $str;
            $continue = true;

            while ( $continue ) :

                // bắt đầu tìm từ vị trí 0 của chuỗi $html
                $pos_bg = strpos( $output, $start_tag, $start );

                if ( false !== $pos_bg ) :

                    $pos_end = strpos( $output, $end_tag, $pos_bg + strlen( $start_tag ) );

                    if ( false !== $pos_end ) :

                        $_pos_end = $pos_end + strlen( $end_tag );

                        $content = substr($output, $pos_bg, $_pos_end - $pos_bg );

                        switch ( $start_tag ) :

                            case '<link':

                                $href_pos = strpos($content, ' href=');

                                $boolCheck = false !== $href_pos && (false !== strpos($content, " rel='stylesheet'") || false !== strpos($content, ' rel="stylesheet"'));
                               
                                break;                              
                            
                            default:  

                                $boolCheck = true;    

                                /*foreach( $grunts['excludes']['keywords'] as $keyword ) :

                                    // xoa
                                    if ( false === strpos( $tag, $keyword ) ) :

                                        $boolCheck = true;

                                        break;

                                    endif;

                                endforeach;*/                                

                                break;

                        endswitch;                         

                        if ( $boolCheck ) :

                            //if ( $start_tag === '<script' ) :

                                //file_put_contents(dirname(__FILE__) . '/grunts.log', $content . PHP_EOL, FILE_APPEND);

                            //endif;

                            if ( ! file_exists( JAVASCRIPT_COMBINE_FILE_PATH ) ) :

                                if ( 0 === strpos( $start_tag, '<script' ) ) :

                                    $tag_pos = strpos( $content, '>' );

                                    $tag = substr( $content, 0, $tag_pos + 1 );

                                    $src_pos = strpos( $tag, ' src=' );

                                    if ( false !== $src_pos ) :

                                        $src_pos += strlen( ' src=' ) + 1;

                                        $_src_pos = strpos( $tag, '"', $src_pos );

                                        if ( false === $_src_pos ) :

                                            $_src_pos = strpos( $tag, "'", $src_pos );

                                        endif;

                                        $src = substr( $tag, $src_pos, $_src_pos - $src_pos );

                                        $this->data_js .= $this->curl_get_file_contents( $src ) . PHP_EOL;

                                    else :

                                        $content_pos_bg = strpos( $content, '>' ) + 1;
                                        $content_pos_end = strpos( $content, $end_tag, $content_pos_bg );

                                        $_content = substr( $content, $content_pos_bg, $content_pos_end - $content_pos_bg );
                                        
                                        $this->data_js_inline .= $_content . PHP_EOL;

                                    endif;

                                endif;

                            endif;

                            if ( ! file_exists( STYLESHEET_COMBINE_FILE_PATH ) ) :

                                if ( 0 === strpos( $start_tag, '<link' ) ) :

                                    $href_pos += strlen( ' href=' ) + 1;
                                    $_href_pos = strpos( $content, '"', $href_pos );

                                    if ( false === $_href_pos ) :

                                        $_href_pos = strpos( $content, "'", $href_pos );

                                    endif;

                                    $href = substr( $content, $href_pos, $_href_pos - $href_pos );

                                    $_content = $this->curl_get_file_contents( $href ) .PHP_EOL;

                                    $font_pos = strpos( $_content, '@font-face' );

                                    if ( false !== $font_pos ) :

                                        $this->data_css = substr_replace( $this->data_css, $_content, 0, 0 );

                                    else :

                                        $this->data_css .= $_content;

                                    endif;                               

                                endif;                                

                            endif;

                            $output = substr( $output, 0, $pos_bg ) . substr( $output, $_pos_end );

                            $start = $pos_bg;

                        else :                            

                            $start = $_pos_end;

                        endif;
 
                    endif;     

                else :

                    $continue = false;

                endif;

            endwhile;

            //file_put_contents(dirname(__FILE__) . '/grunts.log', $output, FILE_APPEND);

            return $output;

        }

        protected function _filterHTML($str, $start_tag, $end_tag) {            

            $start = 0;            

            $output = $str;
            $continue = true;

            while ( $continue ) :

                // bắt đầu tìm từ vị trí 0 của chuỗi $html
                $pos_bg = strpos( $output, $start_tag, $start );

                if ( false !== $pos_bg ) :

                    $pos_end = strpos( $output, $end_tag, $pos_bg + strlen( $start_tag ) );

                    if ( false !== $pos_end ) :

                        $_pos_end = $pos_end + strlen( $end_tag );

                        $content = substr($output, $pos_bg, $_pos_end - $pos_bg );

                        switch ( $start_tag ) :

                            case '<link':

                                $href_pos = strpos($content, ' href=');

                                $boolCheck = false !== $href_pos && ( false !== strpos($content, " rel='stylesheet'" ) || false !== strpos( $content, ' rel="stylesheet"') );
                               
                                break;                              
                            
                            default:      

                                // mac dinh la xoa tag script
                                $boolCheck = true;                            

                                $excludes = array('required="true"', 'application/ld+json', 'toomarketer', 'google', 'onesignal', 'SGPMPopupLoader', '.slick', 'googletagmanager', 'gtag', 'AIOSRS');

                                foreach ($excludes as $key) : 
                                    
                                    if ( false !== strpos( $content, $key ) ) :

                                        $boolCheck = false;

                                        break;

                                    endif;
                                   
                                endforeach;                                

                                break;

                        endswitch;                         

                        if ( $boolCheck ) :                            

                            $output = substr( $output, 0, $pos_bg ) . substr( $output, $_pos_end );
                            $start = $pos_bg;

                        else :

                            $tag_pos = strpos( $content, '>' );

                            $tag = substr( $content, 0, $tag_pos + 1 );

                            $src_pos = strpos( $tag, ' src=' );

                            $slick_pos = strpos( $content, '.slick' );  

                            if ( false === $src_pos && false !== $slick_pos ) :

                                $content_pos_bg = strpos( $content, '>' ) + 1;
                                $content_pos_end = strpos( $content, $end_tag, $content_pos_bg );

                                $_content = substr( $content, $content_pos_bg, $content_pos_end - $content_pos_bg );
                                
                                $this->data_js_inline .= $_content . PHP_EOL;

                                $output = substr( $output, 0, $pos_bg ) . substr( $output, $_pos_end );

                                $start = $pos_bg;

                            else :

                                $start = $_pos_end;

                            endif;                            

                        endif;

                        
 
                    endif;     

                else :

                    $continue = false;

                endif;

            endwhile;          

            return $output;

        }

        protected function adjustImgSrc( $str ) {

            $start = 0;            

            $output = $str;

            $start_tag = '<img';

            $continue = true;

            while ( $continue ) :

                // bắt đầu tìm từ vị trí 0 của chuỗi $html
                $pos_bg = strpos( $output, $start_tag, $start );

                if ( false !== $pos_bg ) :

                    $pos_end = strpos( $output, '>', $pos_bg + strlen( $start_tag ) );

                    if ( false !== $pos_end ) :

                        $_pos_end = $pos_end + 1;

                        $img_tag = substr($output, $pos_bg, $_pos_end - $pos_bg );

                        $p_bg = strpos( $img_tag, ' data-src' );

                        // not data-src
                        if ( false === $p_bg ) :                             

                            $p_loadingIcon = strpos( $img_tag, 'loadingIcon.gif' );

                            // src is not point to loadingIcon.gif
                            if ( false === $p_loadingIcon ) :

                                $p_src = strpos( $img_tag, ' src="');

                                if ( false === $p_src ) :

                                    $p_src = strpos( $img_tag, " src='") + 6;
                                    $ep_src = strpos( $img_tag, "'", $p_src);

                                else :

                                    $p_src += 6;
                                    $ep_src = strpos( $img_tag, '"', $p_src);

                                endif;

                                // save old src
                                //$old_src = substr($img_tag, $ep_src - $p_src );

                                // change src to data-src
                                $img_tag = str_replace(' src=', ' data-src=', $img_tag );

                                // add src 
                                $img_tag = substr_replace( $img_tag, " src=\"//{$_SERVER["HTTP_HOST"]}/wp-content/cache/grunts/images/loadingIcon.gif\"", $p_src - 6, 0 );

                                $output = substr( $output, 0, $pos_bg ) . $img_tag . substr( $output, $_pos_end );

                                $start = $_pos_end;

                            else :

                                $start = $pos_bg;


                            endif;
                            
                        else :                            

                            $start = $_pos_end;

                        endif;

                    else :

                        $start = $_pos_end;
 
                    endif;     

                else :

                    $continue = false;

                endif;

            endwhile;          

            return $output;

        }       

        protected function removeCustomStylesheet( $str, $start_tag, $end_tag ) {

            $start = 0;            

            $output = $str;
            $continue = true;

            while ( $continue ) :

                // bắt đầu tìm từ vị trí 0 của chuỗi $html
                $pos_bg = strpos( $output, $start_tag, $start );

                if ( false !== $pos_bg ) :

                    $pos_end = strpos( $output, $end_tag, $pos_bg + strlen( $start_tag ) );

                    if ( false !== $pos_end ) :

                        $_pos_end = $pos_end + strlen( $end_tag );

                        $content = substr($output, $pos_bg, $_pos_end - $pos_bg );

                        if ( false !== strpos( $content, 'title="dynamic-css"' ) ) :                             

                            $output = substr( $output, 0, $pos_bg ) . substr( $output, $_pos_end );

                            $start = $pos_bg;

                        else :                            

                            $start = $_pos_end;

                        endif;
 
                    endif;     

                else :

                    $continue = false;

                endif;

            endwhile;          

            return $output;

        }

        protected function add_font_disp_swap( $css ) {

            $continue = true;

            $start = 0;

            $length = strlen( $css );

            while ( $continue ) :               

                if ( $start < $length ) :

                    $key = '@font-face';

                    $pos = strpos( $css, $key, $start );

                    // found $key
                    if ( false !== $pos ) :

                        $pos1 = strpos( $css, '}', $pos + strlen( $key ) );
                        $substr = substr( $css, $pos, $pos1 + 1 );

                        // not found attribute
                        if ( false === strpos( $substr, 'font-display:' ) ):    

                            $_pos = strpos( $css, '{', $pos );                      

                            $css = substr_replace($css, 'font-display: swap;', $_pos + 1, 0);
                        
                        endif;

                        $start = $pos1 + 1;

                        continue;   

                    else :

                        $continue = false;

                    endif;                  

                else :

                    $continue = false;

                endif;              

            endwhile;

            return $css;
        }

        protected function appendGruntsFile( $output ) {               

            $pos = strpos( $output, '<head>');          
            //$pos1 = strpos( $output, '>', $pos + 5 );
            //<link rel='stylesheet' href='%s' type='text/css' async>

            if ( ! empty( $this->data_js ) ) :

                file_put_contents( JAVASCRIPT_COMBINE_FILE_PATH, $this->data_js, LOCK_EX );

            endif;

            if ( ! empty( $this->data_js_inline ) ) :

                file_put_contents( JAVASCRIPT_COMBINE_FILE_PATH, $this->data_js_inline, FILE_APPEND | LOCK_EX );

            endif;

            if ( ! empty( $this->data_css ) ) :

                $this->data_css = preg_replace( sprintf( '/%s|%s|%s/i', 
                                                 '..\/fonts\/',
                                                 '\/fonts\/',
                                                 'fonts\/' ), GRUNTS_THEME_FONT_DIRECTORY_URI . '/', $this->data_css );

                $this->data_css = preg_replace( sprintf( '/%s|%s|%s|%s|%s|%s|%s/i', 
                                                     '..\/images\/',
                                                     '\/images\/',
                                                     'images\/',
                                                     '..\/..\/images\/',                               
                                                     '..\/img\/',
                                                     '\/img\/',
                                                     'img\/' ), GRUNTS_THEME_IMAGES_DIRECTORY_URI . '/', $this->data_css );

                $this->data_css = str_replace("url('../assets/", "url('" . GRUNTS_THEME_IMAGES_DIRECTORY_URI . "/assets/", $this->data_css);

                $this->data_css = str_replace("url('stm.", "url('" . GRUNTS_THEME_FONT_DIRECTORY_URI . "/stm.", $this->data_css);

                $this->data_css = $this->add_font_disp_swap( $this->data_css );

                file_put_contents( STYLESHEET_COMBINE_FILE_PATH, $this->data_css, LOCK_EX );

            endif;        

            //$css = file_get_contents( STYLESHEET_COMBINE_FILE_PATH );
            //$js = file_get_contents( JAVASCRIPT_COMBINE_FILE_PATH );  

            $content = sprintf("<link type='text/css' rel='stylesheet' media='print' href='%s' onload='this.media=\"all\"'><script type='text/javascript' src='%s' async></script>",
                                STYLESHEET_COMBINE_FILE_PATH_URI,
                                JAVASCRIPT_COMBINE_FILE_PATH_URI
                                );

            $output = substr_replace( $output, $content, $pos + 6, 0 );

            return $output;

        }

        protected function _appendGruntsFile( $output ) {              

            global $uc_enqueues;

            if ( ! empty( $uc_enqueues['stylesheets'] ) ) :

                $css_contents = file_get_contents( STYLESHEET_COMBINE_FILE_PATH ) . PHP_EOL;

                foreach ( $uc_enqueues['stylesheets'] as $stylesheet ) :

                    $css_contents .= file_get_contents( $stylesheet ) . PHP_EOL;
                
                endforeach;

                file_put_contents( _STYLESHEET_COMBINE_FILE_PATH, $css_contents );

            endif;

            if ( ! empty( $uc_enqueues['scripts'] ) ) :

                $js_contents = file_get_contents( JAVASCRIPT_COMBINE_FILE_PATH ) . PHP_EOL;

                foreach ( $uc_enqueues['scripts'] as $script ) :

                    $js_contents .= file_get_contents( $script ) . PHP_EOL;
                
                endforeach;

                file_put_contents( _JAVASCRIPT_COMBINE_FILE_PATH, $js_contents );

            endif;

            if ( ! empty( $this->data_js_inline ) ) :

                $js_contents = file_get_contents( JAVASCRIPT_COMBINE_FILE_PATH ) . PHP_EOL . $this->data_js_inline . PHP_EOL;

                file_put_contents( _JAVASCRIPT_COMBINE_FILE_PATH, $js_contents );

            endif;

            $css_href = file_exists( _STYLESHEET_COMBINE_FILE_PATH ) ? _STYLESHEET_COMBINE_FILE_PATH_URI : STYLESHEET_COMBINE_FILE_PATH_URI;

            $js_href = file_exists( _JAVASCRIPT_COMBINE_FILE_PATH ) ? _JAVASCRIPT_COMBINE_FILE_PATH_URI : JAVASCRIPT_COMBINE_FILE_PATH_URI;

            $pos = strpos( $output, '</body>');

            $content = sprintf("<link type='text/css' rel='stylesheet' href='%s'><script type='text/javascript' async src='%s' ></script>",
                                $css_href . "?v=" . filemtime( str_replace( '//' . $_SERVER['HTTP_HOST'], ABSPATH, $css_href ) ),
                                $js_href . "?v=" . filemtime( str_replace( '//' . $_SERVER['HTTP_HOST'], ABSPATH, $js_href ) )
                                );

            //$content = sprintf("<script type='text/javascript' async src='//{$_SERVER['HTTP_HOST']}/wp-content/cache/grunts/loader.js' ></script>");

            $output = substr_replace( $output, $content, $pos, 0 );

            return $output;

        }


        protected function removeAllSEnqueue( $html ) {
            
            $output = $html;           

            $stylesheet_begin_tag_search = "<link";
            $stylesheet_end_tag_search = ">";

            $script_begin_tag_search = "<script";
            $script_end_tag_search = "</script>";                  

            $output = $this->_filterHTML( $output, $stylesheet_begin_tag_search, $stylesheet_end_tag_search );

            $output = $this->_filterHTML( $output, $script_begin_tag_search, $script_end_tag_search );

            $output = $this->removeCustomStylesheet( $output, '<style', '</style>' );

            //$output = $this->adjustImgSrc( $output );

            $output = $this->_appendGruntsFile( $output );

            //return $html;
            return $output;

        }        
            
        protected function parseHTML( $html )
        {           

            $outputs = $html;         
            
            $this->html = $this->removeAllSEnqueue( $outputs );

            //$this->html = $outputs;
            
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
    
    function wp_grunts_frontend_finish( $html )
    {
        return new GRUNTS_FRONTEND( $html );        
    }
    
    function wp_grunts_frontend_start()
    {

        if ( ! is_admin() ) :

            $vc_mode = $_GET['vc_editable'];
            $thrive = $_GET['tve'];

            if ( ( isset( $vc_mode ) && $vc_mode === 'true' ) || ( isset( $thrive ) && $thrive === 'true' )  ) :

            else :

               ob_start('wp_grunts_frontend_finish');

            endif;

        endif;
    }  

    add_action('get_header', 'wp_grunts_frontend_start', 100);

   