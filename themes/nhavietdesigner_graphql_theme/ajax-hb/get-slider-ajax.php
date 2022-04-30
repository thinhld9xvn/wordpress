<?php
add_action('wp_ajax_data_slider', 'getslider_hb_init');
add_action('wp_ajax_nopriv_data_slider', 'getslider_hb_init');
function getslider_hb_init()
{

    //do bên js để dạng json nên giá trị trả về dùng phải encode
    $post_type = (isset($_POST['post_type'])) ? esc_attr($_POST['post_type']) : '';
    $id_post = (isset($_POST['id_post'])) ? esc_attr($_POST['id_post']) : '';
    if (!empty($id_post)):
        $array_list_img = get_field('thu_vien_hinh_anh', $id_post);
    //var_dump($array_list_img);
        var_dump($array_list_img); 
        ob_start();
        foreach ($array_list_img as $item) :
            ?>
            <div class="_item">
                <div class="vk-design-detail-item" style="background-image: url(<?php echo $item['url'];?>);"><a href="#" class="vk-design-detail-item__logo"><img
                                src="<?php echo wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]; ?>" alt="<?php echo $item['alt']; ?>"></a>
                    <div class="vk-design-detail-item__brief"><h2
                                class="vk-design-detail-item__title"><?php echo $item['title'];?></h2>
                        <div class="vk-design-detail-item__text">
                            <?php echo $item['description'];?>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        endforeach;

    else :
        echo false;
    endif;
    die();//bắt buộc phải có khi kết thúc
}