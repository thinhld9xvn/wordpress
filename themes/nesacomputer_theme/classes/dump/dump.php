<?php 
    namespace Dump;
    class Dump {
        public static function start() {
            //setRndProductsListAtt();
            //setRndProductsListTopAtt();
            //print_r(get_post_meta(727, '_product_attributes')); die();
            //print_r(wp_get_object_terms(727, 'pa_cpu'));die();
            //$pas_ram = get_pas(PA_RAM);
            //update_pa(PA_CPU, 'ADM Ryzen 5');
            //update_pa(PA_HSX, 'Amd');
            //update_pa(PA_OCUNG, 'Chỉ có SSD');
            //convert_pa(PA_HSX, 'ADM Ryzen 5', 'Amd');
            //self::cloneDemoOpts(727);
            //die();
            self::createDemoUserLists();
            die();
        }
        private static function createDemoUserLists() {
            for ($i = 0; $i < 100; $i++) :
                wp_create_user( 'usertest' . $i, 'Thinh123456@#', 'usertest' . $i . '@gmail.com' );
            endfor;
        }
        private static function cloneDemoOpts($pid) {
            $opts = get_field('prod_opts', $pid);
            //echo $opts; die();
            $args = [
                'post_type' => PRODUCTS_POST_TYPE,
                'posts_per_page' => -1,
                'no_paging' => true
            ];
            query_posts($args);
            while ( have_posts() ) : the_post();
                update_post_meta(get_the_ID(), 'prod_opts', $opts);
            endwhile;
            wp_reset_query();
        }
        private static function convert_pa($pa, $value, $new_value) {
            $args = [
                'post_type' => PRODUCTS_POST_TYPE,
                'posts_per_page' => -1,
                'no_paging' => true,
                'tax_query' => [
                    [
                        'taxonomy' => $pa,
                        'field' => 'slug',
                        'terms' => $value
                    ]
                ]
            ];
            query_posts($args);
            while ( have_posts() ) : the_post();
                wp_delete_object_term_relationships(get_the_ID(), $pa);
                $term_taxonomy_ids = wp_set_object_terms( get_the_ID(), $new_value, $pa, true );			
                $pas = get_post_meta( get_the_ID(),'_product_attributes'); 
                $pas[$pa] = [
                    'name'=>$pa,
                    'value'=>$new_value,
                    'is_visible' => '1',
                    'is_taxonomy' => '1'
                ];
                update_post_meta(get_the_ID(), '_product_attributes', $pas);
            endwhile;
            wp_reset_query();
        }
        private static function update_pa($pa, $value) {
            $args = [
                'post_type' => PRODUCTS_POST_TYPE,
                'posts_per_page' => -1,
                'no_paging' => true,
                'tax_query' => [
                    [
                        'taxonomy' => $pa,
                        'operator'    => 'NOT EXISTS'
                    ]
                ]
            ];
            query_posts($args);
            while ( have_posts() ) : the_post();
                $term_taxonomy_ids = wp_set_object_terms( get_the_ID(), $value, $pa, true );
                $pas = get_post_meta( get_the_ID(),'_product_attributes'); 
                $pas[$pa] = [
                    'name'=>$pa,
                    'value'=>$value,
                    'is_visible' => '1',
                    'is_taxonomy' => '1'
                ];
                update_post_meta(get_the_ID(), '_product_attributes', $pas);
            endwhile;
            wp_reset_query();
        }
        private static function setRndProductsListTopAtt() {
            $atts = [
                SHOW_ON_TOP_PC_ST,
                SHOW_ON_TOP_PC_GRAPHICS_ST,
                SHOW_ON_TOP_PC_GAMING_ST
            ];
            $args = [
                'post_type' => PRODUCTS_POST_TYPE,
                'posts_per_page' => -1,
                'no_paging' => true
            ];
            query_posts($args);		
            while ( have_posts() ) : the_post();
                $pid = get_the_ID();
                $idx = floor(rand(1, 3));
                //echo "<pre>";
                //print_r(get_post_meta($pid, PROD_ADV_OPTIONS)); die();
                update_post_meta($pid, PROD_ADV_OPTIONS, [$atts[$idx]]);
            endwhile;
            wp_reset_query();
            die('done');
        }
        private static function setRndProductsListAtt() {
            //cloneProducts(64, 'vga-card-man-hinh-intel');		
            //die('done');
            //echo ipsum(1); die();
            $pas_cpu = get_pas('pa_cpu');
            $pas_hsx = get_pas('pa_hang-san-xuat');
            $pas_ocung = get_pas('pa_o-cung');
            $pas_ram = get_pas('pa_ram');
            $pas_vga = get_pas('pa_vga');
            $args = [
                'post_type' => PRODUCTS_POST_TYPE,
                'posts_per_page' => -1,
                'no_paging' => true,
                /*'tax_query' => [
                    [
                        'taxonomy' => PRODUCTS_TAXONOMY,
                        'field'    => 'slug',
                        'terms'    => 'pc-workstation',
                    ]
                ]*/
            ];
            query_posts($args);
            while ( have_posts() ) : the_post();			
                self::addAttribute(get_the_ID(), ['pas_cpu' => $pas_cpu, 
                                            'pas_hsx' => $pas_hsx, 
                                            'pas_ocung' => $pas_ocung,
                                            'pas_ram' => $pas_ram,
                                            'pas_vga' => $pas_vga]);
            endwhile;
            wp_reset_query();
            die('done');
        }
        private static function addAttribute($pid, $pas) {
            extract($pas);
            $pas_cpu_idx = floor(rand(1, 8));
            $pas_hsx_idx = floor(rand(1, 4));
            $pas_ocung_idx = floor(rand(1, 2));
            $pas_ram_idx = floor(rand(1, 5));
            $pas_vga_idx = floor(rand(1, 4));
            //
            delete_post_meta($pid, '_product_attributes');
            wp_delete_object_term_relationships($pid, 'pa_cpu');
            wp_delete_object_term_relationships($pid, 'pa_hang-san-xuat');
            wp_delete_object_term_relationships($pid, 'pa_o-cung');
            wp_delete_object_term_relationships($pid, 'pa_ram');
            wp_delete_object_term_relationships($pid, 'pa_vga');
            //
            $term_taxonomy_ids = wp_set_object_terms( $pid, $pas_cpu[$pas_cpu_idx]->name, 'pa_cpu', true );
            $term_taxonomy_ids = wp_set_object_terms( $pid, $pas_hsx[$pas_hsx_idx]->name, 'pa_hang-san-xuat', true );
            $term_taxonomy_ids = wp_set_object_terms( $pid, $pas_ocung[$pas_ocung_idx]->name, 'pa_o-cung', true );
            $term_taxonomy_ids = wp_set_object_terms( $pid, $pas_ram[$pas_ram_idx]->name, 'pa_ram', true );
            $term_taxonomy_ids = wp_set_object_terms( $pid, $pas_vga[$pas_vga_idx]->name, 'pa_vga', true );
            $thedata = ['pa_cpu' => [
                'name'=>'pa_cpu',
                'value'=>$pas_cpu[$pas_cpu_idx]->name,
                'is_visible' => '1',
                'is_taxonomy' => '1'
            ], 'pa_hang-san-xuat' => [
                'name'=>'pa_hang-san-xuat',
                'value'=>$pas_hsx[$pas_hsx_idx]->name,
                'is_visible' => '1',
                'is_taxonomy' => '1'
            ], 'pa_o-cung' => [
                'name'=>'pa_o-cung',
                'value'=>$pas_ocung[$pas_ocung_idx]->name,
                'is_visible' => '1',
                'is_taxonomy' => '1'
            ], 'pa_ram' => [
                'name'=>'pa_ram',
                'value'=>$pas_ram[$pas_ram_idx]->name,
                'is_visible' => '1',
                'is_taxonomy' => '1'
            ], 'pa_vga' => [
                'name'=>'pa_vga',
                'value'=>$pas_vga[$pas_vga_idx]->name,
                'is_visible' => '1',
                'is_taxonomy' => '1'
            ]];
            
            update_post_meta( $pid,'_product_attributes',$thedata); 
    
        }
        private static function cloneProducts($id, $cat_slug) {
            $term = get_term_by('slug', $cat_slug, PRODUCTS_TAXONOMY);
            $product_meta = get_post_custom($id);
            unset($product_meta['_edit_lock']);
            unset($product_meta['_edit_last']);
            $user_id = get_current_user_id();
            //print_r($product_meta); die();
            /*$defaults = [
                'post_author'           => $user_id,
                'post_title' => ipsum(1),
                'post_content'          => '',
                'post_content_filtered' => '',
                'post_excerpt'          => '',
                'post_status'           => 'publish',
                'post_type'             => PRODUCTS_POST_TYPE,
                'comment_status'        => '',
                'ping_status'           => '',
                'post_password'         => '',
                'to_ping'               => '',
                'pinged'                => '',
                'post_parent'           => 0,
                'menu_order'            => 0,
                'guid'                  => '',
                'import_id'             => 0,
                'context'               => '',
                'post_date'             => '',
                'post_date_gmt'         => '',
                ];
            $post_id = wp_insert_post($defaults);
            $regular_price = 100000000 / 2;
            foreach($product_meta as $key => $values) :
                foreach ($values as $value) :
                    if ( $key === '_regular_price' ) :
                        $regular_price = rand(20000000,100000000);
                        add_post_meta( $post_id, $key, $regular_price );
                        continue;
                    endif;
                    if ( $key === '_sale_price' ) :
                        $value = rand($regular_price / 2,$regular_price);
                        add_post_meta( $post_id, $key, $value );
                        continue;
                    endif;
                    add_post_meta( $post_id, $key, $value );
                endforeach;
            endforeach;
            wp_set_object_terms($post_id, $term->term_id, PRODUCTS_TAXONOMY);*/
        }
        private static function ipsum($nparagraphs) {
            $lorem = [
                0 => 'lorem',
                1 => 'ipsum',
                2 => 'dolor',
                3 => 'sit',
                4 => 'amet',
                5 => 'consectetur',
                6 => 'adipiscing',
                7 => 'elit',
                8 => 'praesent',
                9 => 'interdum',
                10 => 'dictum',
                11 => 'mi',
                12 => 'non',
                13 => 'egestas',
                14 => 'nulla',
                15 => 'in',
                16 => 'lacus',
                17 => 'sed',
                18 => 'sapien',
                19 => 'placerat',
                20 => 'malesuada',
                21 => 'at',
                22 => 'erat',
                23 => 'etiam',
                24 => 'id',
                25 => 'velit',
                26 => 'finibus',
                27 => 'viverra',
                28 => 'maecenas',
                29 => 'mattis',
                30 => 'volutpat',
                31 => 'justo',
                32 => 'vitae',
                33 => 'vestibulum',
                34 => 'metus',
                35 => 'lobortis',
                36 => 'mauris',
                37 => 'luctus',
                38 => 'leo',
                39 => 'feugiat',
                40 => 'nibh',
                41 => 'tincidunt',
                42 => 'a',
                43 => 'integer',
                44 => 'facilisis',
                45 => 'lacinia',
                46 => 'ligula',
                47 => 'ac',
                48 => 'suspendisse',
                49 => 'eleifend',
                50 => 'nunc',
                51 => 'nec',
                52 => 'pulvinar',
                53 => 'quisque',
                54 => 'ut',
                55 => 'semper',
                56 => 'auctor',
                57 => 'tortor',
                58 => 'mollis',
                59 => 'est',
                60 => 'tempor',
                61 => 'scelerisque',
                62 => 'venenatis',
                63 => 'quis',
                64 => 'ultrices',
                65 => 'tellus',
                66 => 'nisi',
                67 => 'phasellus',
                68 => 'aliquam',
                69 => 'molestie',
                70 => 'purus',
                71 => 'convallis',
                72 => 'cursus',
                73 => 'ex',
                74 => 'massa',
                75 => 'fusce',
                76 => 'felis',
                77 => 'fringilla',
                78 => 'faucibus',
                79 => 'varius',
                80 => 'ante',
                81 => 'primis',
                82 => 'orci',
                83 => 'et',
                84 => 'posuere',
                85 => 'cubilia',
                86 => 'curae',
                87 => 'proin',
                88 => 'ultricies',
                89 => 'hendrerit',
                90 => 'ornare',
                91 => 'augue',
                92 => 'pharetra',
                93 => 'dapibus',
                94 => 'nullam',
                95 => 'sollicitudin',
                96 => 'euismod',
                97 => 'eget',
                98 => 'pretium',
                99 => 'vulputate',
                100 => 'urna',
                101 => 'arcu',
                102 => 'porttitor',
                103 => 'quam',
                104 => 'condimentum',
                105 => 'consequat',
                106 => 'tempus',
                107 => 'hac',
                108 => 'habitasse',
                109 => 'platea',
                110 => 'dictumst',
                111 => 'sagittis',
                112 => 'gravida',
                113 => 'eu',
                114 => 'commodo',
                115 => 'dui',
                116 => 'lectus',
                117 => 'vivamus',
                118 => 'libero',
                119 => 'vel',
                120 => 'maximus',
                121 => 'pellentesque',
                122 => 'efficitur',
                123 => 'class',
                124 => 'aptent',
                125 => 'taciti',
                126 => 'sociosqu',
                127 => 'ad',
                128 => 'litora',
                129 => 'torquent',
                130 => 'per',
                131 => 'conubia',
                132 => 'nostra',
                133 => 'inceptos',
                134 => 'himenaeos',
                135 => 'fermentum',
                136 => 'turpis',
                137 => 'donec',
                138 => 'magna',
                139 => 'porta',
                140 => 'enim',
                141 => 'curabitur',
                142 => 'odio',
                143 => 'rhoncus',
                144 => 'blandit',
                145 => 'potenti',
                146 => 'sodales',
                147 => 'accumsan',
                148 => 'congue',
                149 => 'neque',
                150 => 'duis',
                151 => 'bibendum',
                152 => 'laoreet',
                153 => 'elementum',
                154 => 'suscipit',
                155 => 'diam',
                156 => 'vehicula',
                157 => 'eros',
                158 => 'nam',
                159 => 'imperdiet',
                160 => 'sem',
                161 => 'ullamcorper',
                162 => 'dignissim',
                163 => 'risus',
                164 => 'aliquet',
                165 => 'habitant',
                166 => 'morbi',
                167 => 'tristique',
                168 => 'senectus',
                169 => 'netus',
                170 => 'fames',
                171 => 'nisl',
                172 => 'iaculis',
                173 => 'cras',
                174 => 'aenean',
            ];
            $paragraphs = [];
            for ($p = 0; $p < $nparagraphs; ++$p) {
                $nsentences = mt_rand(3, 8);
                $sentences = [];
                for ($s = 0; $s < $nsentences; ++$s) {
                    $frags = [];
                    $commaChance = .33;
                    while (true) {
                        $nwords = mt_rand(3, 10);
                        $words = self::random_values($lorem, $nwords);
                        $frags[] = implode(' ', $words);
                        if (self::random_float() >= $commaChance) {
                            break;
                        }
                        $commaChance /= 2;
                    }
        
                    $sentences[] = ucfirst(implode(', ', $frags));
                }
                $paragraphs[] = implode(' ', $sentences);
            }
            return substr(implode($paragraphs), 0, 80);
        }
        private static function random_float() {
            return mt_rand(0, PHP_INT_MAX - 1) / PHP_INT_MAX;
        }
        private static function random_values($arr, $count) {
            $keys = array_rand($arr, $count);
            if ($count == 1) {
                $keys = [$keys];
            }
            return array_intersect_key($arr, array_fill_keys($keys, null));
        }
    }