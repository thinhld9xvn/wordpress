<?php
/* Template Name: Design Template */
get_header();
get_template_part('template-parts/header', 'style-2');
?>
<?php
$term = get_queried_object();
$args = array(
    'posts_per_page' => 100,
    'post_type' => 'design',
    'post_status' => 'publish',
);

$query = new WP_Query($args);

$num = $query->post_count;
$row_int = intval($num / 3) ;
$phan_du = $num % 3;
$limit = 0;
if($phan_du < 3 || $phan_du > 0)
{
	$limit ++;
	$row = $limit + $row_int;
} 
else
{
	$row = $row_int ;
}
if (!empty($query)) :
    $posts = $query->posts;
    $colum_3_array = array_chunk($posts, $row);

endif;

?>
    <div class="vk-shop__bot">
        <div class="row no-gutters">
            <?php foreach ($colum_3_array as $value) : ?>
                <div class="col-lg-4">

                    <div class="vk-shop__list--style-1 vk-slider--style-3 row no-gutters" data-slider="shop-1">

                        <?php if (is_array($value)): foreach ($value as $item) : ?>
                            <div class="col-12 _item">
                                <div class="vk-shop-item vk-shop-item--style-1">
                                    <div class="vk-shop-item__img">
                                        <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), 'single-post-thumbnail')[0]; ?>"
                                             alt="<?php echo get_the_title($item->ID); ?>" class="_img">
                                    </div>

                                    <div class="vk-shop-item__brief">
                                        <div class="vk-shop-item__box">
                                            <h3 class="vk-shop-item__title"><?php echo $item->post_title; ?></h3>
                                            <div class="vk-shop-item__icon"><img
                                                        src="<?php echo link_asset_theme . 'images/icon-1.png'; ?>"
                                                        alt=""></div>
                                        </div>
                                    </div>

                                    <a href="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), 'single-post-thumbnail')[0]; ?>"
                                       class="vk-shop-item__link"
                                       data-fancybox="images-<?php echo $item->ID;?>"><img
                                                src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), 'single-post-thumbnail')[0]; ?>"
                                                alt="<?php echo get_the_title($item->ID); ?>"
                                                class=""></a>

                                    <div class="d-none">
                                        <?php
                                        if (!empty(get_field('thu_vien_hinh_anh', $item->ID))) :
                                            foreach (get_field('thu_vien_hinh_anh', $item->ID) as $image):
                                                ?>
                                                <a href="<?php echo $image['url'];?>"
                                                   data-fancybox="images-<?php echo $item->ID;?>">
                                                    <img src="<?php echo $image['url'];?>"/>
                                                </a>
                                            <?php
                                            endforeach;
                                        endif; ?>
                                    </div>
                                </div>
                                <!--./vk-shop-item-->
                            </div>
                        <?php endforeach;endif; ?>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>


    </div>
    <!--./bot-->

<?php
get_footer();