<?php 
    namespace Products;
    class PrintProductFilterResultsUtils {
        public static function print($num = DEFAULT_POSTS_PER_PAGE, $myterm = '') {
            $paged = $_GET['page'] ? (int) $_GET['page'] : 1;
            $pa_hsx = $_GET[PA_HSX];
            $pa_hsx = !empty($pa_hsx) ? explode(',', $pa_hsx) : '';
            //
            $pa_cpu = $_GET[PA_CPU];
            $pa_cpu = !empty($pa_cpu) ? explode(',', $pa_cpu) : '';
            //
            $pa_ram = $_GET[PA_RAM];
            $pa_ram = !empty($pa_ram) ? explode(',', $pa_ram) : '';
            //
            $pa_vga = $_GET[PA_VGA];
            $pa_vga = !empty($pa_vga) ? explode(',', $pa_vga) : '';
            //
            $pa_ocung = $_GET[PA_OCUNG];
            $pa_ocung = !empty($pa_ocung) ? explode(',', $pa_ocung) : '';
            //
            $pa_price = $_GET[PA_PRICE];
            $pa_price = !empty($pa_price) ? explode(',', $pa_price) : '';
            //
            $sort = $_GET['sort'];
            $order = '';
            $orderby = '';
            if ( $sort === 'sort_by_price_desc' ) :
                $order = 'DESC';
                $orderby = 'meta_value_num';
            endif;
            if ( empty($sort) || $sort === 'sort_by_price_asc' ) :
                $order = 'ASC';
                $orderby = 'meta_value_num';
            endif;
            if ( $sort === 'sort_by_a_z' ) :
                $order = 'ASC';
                $orderby = 'title';
            endif;
            if ( $sort === 'sort_by_z_a' ) :
                $order = 'DESC';
                $orderby = 'title';
            endif;
            //
            $args = [
                'post_type' => PRODUCTS_POST_TYPE,
                'posts_per_page' => $num,
                'paged' => $paged,
                'order' => $order,
                'orderby' => $orderby,
                'no_paging' => true
            ];
            $tax_query = [];
            $meta_query = [];
            if ( !empty($myterm) ) :
                $tax_query[] = [
                    'taxonomy'         => PRODUCTS_TAXONOMY,                    
                    'field'            => 'id',
                    'terms'            => $myterm->term_id,
                    'include_children' => true
                ];
            endif;
            if ( !empty($pa_hsx) ) :
                $tax_query[] = [
                    'taxonomy' => PA_HSX,
                    'field'    => 'slug',
                    'terms'    => $pa_hsx,
                ];
            endif;
            if ( !empty($pa_ram) ) :
                $tax_query[] = [
                    'taxonomy' => PA_RAM,
                    'field'    => 'slug',
                    'terms'    => $pa_ram,
                ];
            endif;
            if ( !empty($pa_cpu) ) :
                $tax_query[] = [
                    'taxonomy' => PA_CPU,
                    'field'    => 'slug',
                    'terms'    => $pa_cpu,
                ];
            endif;
            if ( !empty($pa_vga) ) :
                $tax_query[] = [
                    'taxonomy' => PA_VGA,
                    'field'    => 'slug',
                    'terms'    => $pa_vga,
                ];
            endif;
            if ( !empty($pa_ocung) ) :
                $tax_query[] = [
                    'taxonomy' => PA_OCUNG,
                    'field'    => 'slug',
                    'terms'    => $pa_ocung,
                ];
            endif;            
            if ( !empty($pa_price) ) :
                foreach($pa_price as $price) :
                    if ( 0 === strpos($price, 'below_') || 
                            0 === strpos($price, 'upper_') ) :
                        $value = (int) substr($price, 6);
                        $meta_query[] = [
                            'key' => '_sale_price',
                            'value' => $value * ONE_MILLION_DONG,
                            'compare' => 0 === strpos($price, 'below_') ? '<' : '>',
                            'type'    => 'numeric'
                        ];
                    endif;
                    $pos = strpos($price, '_to_');
                    if ( FALSE !== $pos ) :
                        $from = (int) substr($price, 0, $pos);
                        $to = (int) substr($price, $pos + 4);
                        $meta_query[] = [
                            'key' => '_sale_price',
                            'value' => [$from * ONE_MILLION_DONG, $to * ONE_MILLION_DONG],
                            'compare' => 'BETWEEN',
                            'type'    => 'numeric'
                        ];
                    endif;
                endforeach;
            else :
                $meta_query[] = [
                    'key' => '_sale_price',
                    'compare' => 'EXISTS'
                ];
            endif;
            if ( count($tax_query) > 0) :
                $tax_query['relation'] = 'AND';
                $args['tax_query'] = $tax_query;
            endif;
            if ( count($meta_query) > 0) :
                $meta_query['relation'] = 'OR';
                $args['meta_query'] = $meta_query;
            endif;
            //echo "<pre>";
            //print_r($args);
            query_posts($args); ?>
             <div class="page__product-filter">
                <div class="filter-search">
                    <p>Tìm thấy <strong><?= GetProductsQueryCountUtils::get() ?></strong> sản phẩm</p>
                </div>
                <div class="filter__group">
                    <span class="fl-sort-label">Sắp xếp sản phẩm theo: </span>
                    <select id="slPSort">
                        <option value="sort_by_price_asc" <?php selected($sort, 'sort_by_price_asc') ?>>
                            Giá tiền tăng dần
                        </option>
                        <option value="sort_by_price_desc" <?php selected($sort, 'sort_by_price_desc') ?>>
                            Giá tiền giảm dần
                        </option>
                        <option value="sort_by_a_z" <?php selected($sort, 'sort_by_a_z') ?>>
                            Tên sản phẩm (A-Z)
                        </option>
                        <option value="sort_by_z_a" <?php selected($sort, 'sort_by_z_a') ?>>
                            Tên sản phẩm (Z-A)
                        </option>
                    </select>
                    <button type="button" class="btn btn__filter">
                        <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__list-box.png" alt="icon__list-box.png">
                    </button>
                    <button type="button" class="btn btn__filter">
                        <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__list-row.png" alt="icon__list-row.png">
                    </button>
                </div>
                <input type="hidden" id="txtSlSort" name="sort" value="<?= $sort ?>" />
            </div> 
            <div class="page__product-group">
                <?php 
                    if ( have_posts() ) :
                        while(have_posts()) : the_post();
                            global $product;
                            PrintProductTemplate::print($product);
                        endwhile;
                    else :
                        echo "<p class='empty-list'>Không có sản phẩm nào ở đây ...</p>";
                    endif;
                ?>
            </div>
        <?php 
            the_page_navigation();
            wp_reset_query();
        }
    }