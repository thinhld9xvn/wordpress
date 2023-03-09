<?php
/*
* Shortcode Box price
* Author luyendev
*/
function luyendev_box_price_element(){

    add_ux_builder_shortcode('luyendev_box_price', array(
        'name'      => __('Box price'),
        'category'  => __('Content'),
        'options' => array(
            'text_options' => array(
                'type' => 'group',
                'heading' => __( 'Text' ),
                'options' => array(

                    'title'  => array(
                        'type'    => 'textfield',
                        'heading' => __( 'Title' ),
                        'default' => '',
                    ),
                    'sub_title'  => array(
                        'type'    => 'textfield',
                        'heading' => __( 'Sub titie' ),
                        'default' => '',
                    ),
                    'content'  => array(
                        'type'    => 'textarea',
                        'heading' => __( 'Text content' ),
                        'default' => '',
                    ),
                    'text_button'  => array(
                        'type'    => 'textfield',
                        'heading' => __( 'Text button' ),
                        'default' => '',
                    ),
                    'link'  => array(
                        'type'    => 'textfield',
                        'heading' => __( 'Link' ),
                        'default' => '',
                    ),
                    'text_bottom'  => array(
                        'type'    => 'textfield',
                        'heading' => __( 'Text bottom' ),
                        'default' => '',
                    ),
                ),
            ),
        )

    ));
}
add_action('ux_builder_setup', 'luyendev_box_price_element');

function luyendev_box_price_func($atts){
    extract(shortcode_atts(array(
        "_id" => 'row-'.rand(),
        'style' => '',
        'class' => '',

        'title' => '',
        'sub_title' => '',
        'content' => '',
        'text_button' => '',
        'text_bottom' => '',
        'link' => '',

    ), $atts));

    $classes_box = array();
    $classes_text = array();

    ob_start();


    $classes_box = implode(' ', $classes_box);

// Get repeater HTML.

    ?>
    <div class="box-price">
        <div class="box-price-wrap">
            <div class="box-price-header">
                <div class="box-price-title"><?php echo $title; ?></div>
                <div class="box-price-sub-title"><?php echo $sub_title; ?></div>
            </div>
            <div class="box-price-line"></div>
            <div class="box-price-content">
                <?php
                echo apply_filters( 'the_content', wp_kses_post( htmlspecialchars_decode($content) ) );
                ?>
            </div>

        </div>
        <div class="box-price-footer">
            <div class="box-price-price"><a href="<?php echo $link; ?>" class="btn"><?php echo $text_button; ?></a></div>
            <div class="box-price-bottom"><?php echo $text_bottom; ?></div>
        </div>
    </div>


    <?php

    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}
add_shortcode('luyendev_box_price', 'luyendev_box_price_func');