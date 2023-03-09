<?php
/*
* Shortcode Box button
* Author luyendev
*/
function luyendev_box_button_element(){

        add_ux_builder_shortcode('luyendev_box_button', array(
        'name'      => __('Box button'),
        'category'  => __('Content'),
        'options' => array(
            'image_options' => array(
                'type' => 'group',
                'heading' => __( 'Image' ),
                'options' => array(
                    'img' => array(
                        'type' => 'image',
                        'heading' => 'Image',
                        'group' => 'background',
                        'param_name' => 'img',
                    ),

                    'image_size' => array(
                        'type' => 'select',
                        'heading' => __( 'Size' ),
                        'default' => '',
                        'options' => array(
                            '' => 'Default',
                            'large' => 'Large',
                            'medium' => 'Medium',
                            'thumbnail' => 'Thumbnail',
                            'original' => 'Original',
                        )
                    ),

                ),
            ),
            'text_options' => array(
                'type' => 'group',
                'heading' => __( 'Text' ),
                'options' => array(

                    'title_1'  => array(
                        'type'    => 'textfield',
                        'heading' => __( 'Title 1' ),
                        'default' => '',
                    ),
                    'text_button_app_store'  => array(
                        'type'    => 'textfield',
                        'heading' => __( 'Text button "App Store"' ),
                        'default' => '',
                    ),
                    'link_app_store'  => array(
                        'type'    => 'textfield',
                        'heading' => __( 'Link "App Store"' ),
                        'default' => '',
                    ),
                    'text_button_google_play'  => array(
                        'type'    => 'textfield',
                        'heading' => __( 'Text button "Google Play"' ),
                        'default' => '',
                    ),
                    'link_google_play'  => array(
                        'type'    => 'textfield',
                        'heading' => __( 'Link "Google Play"' ),
                        'default' => '',
                    ),
                    'title_2'  => array(
                        'type'    => 'textfield',
                        'heading' => __( 'Title 2' ),
                        'default' => '',
                    ),
                    'text_button_web_app'  => array(
                        'type'    => 'textfield',
                        'heading' => __( 'Text button "Web App"' ),
                        'default' => '',
                    ),
                    'link_web_app'  => array(
                        'type'    => 'textfield',
                        'heading' => __( 'Link "Web App"' ),
                        'default' => '',
                    ),
                    'margin_top' => array(
                        'type' => 'slider',
                        'heading' => 'Margin top',
                        'default' =>'25',
//                        'responsive' => true,
                        'max' => '100',
                        'min' => '1',
                    ),
                ),
            ),
        )

    ));
}
add_action('ux_builder_setup', 'luyendev_box_button_element');

function luyendev_box_button_func($atts){
    extract(shortcode_atts(array(
        "_id" => 'row-'.rand(),
        'style' => '',
        'class' => '',

        'title_1' => '',
        'text_button_app_store' => '',
        'link_app_store' => '',
        'text_button_google_play' => '',
        'link_google_play' => '',
        'title_2' => '',
        'text_button_web_app' => '',
        'link_web_app' => '',
        'margin_top' => '25',

        // Box styles
        'img' => '',
        'image_size' => 'medium',
        'image_width' => '',
        'image_radius' => '',
        'image_height' => '56%',
        'image_hover' => '',
        'image_hover_alt' => '',
        'image_overlay' => '',
        'image_depth' => '',
        'image_depth_hover' => '',

    ), $atts));

    $classes_box = array();
    $classes_image = array();
    $classes_text = array();

    if($image_hover)  $classes_image[] = 'image-'.$image_hover;
    if($image_hover_alt)  $classes_image[] = 'image-'.$image_hover_alt;
    if($image_height) $classes_image[] = 'image-cover';


    $css_args_img = array(
        array( 'attribute' => 'border-radius', 'value' => $image_radius, 'unit' => '%' ),
        array( 'attribute' => 'width', 'value' => $image_width, 'unit' => '%' ),
    );

    $css_image_height = array(
        array( 'attribute' => 'padding-top', 'value' => $image_height),
    );




    $classes_image = implode(' ', $classes_image);
    $classes_box = implode(' ', $classes_box);




    ob_start();
// Get repeater HTML.

    ?>
    <div class="box-button">
        <div class="box-button-wrap">
            <div class="box-image">
                <?php echo flatsome_get_image( $img, $image_size ); ?>
            </div><!-- box-image -->
            <div class="box-button-content" style="top: <?php echo $margin_top .'%'; ?>;">
                <?php if(!empty($title_1)){
                    ?>
                    <div class="box-buton-title box-buton-title-1">
                        <?php echo $title_1; ?>
                    </div>
                    <?php
                } ?>
                <div class="text_button">
                    <?php if(!empty($text_button_app_store)){
                        ?>
                        <a href="<?php echo $link_app_store; ?>" class="btn button primary"><i class="ic-app-store"></i><?php echo $text_button_app_store; ?></a>
                        <?php
                    } ?>

                    <?php if(!empty($text_button_google_play)){
                        ?>
                        <a href="<?php echo $link_google_play; ?>" class="btn button white"><i class="ic-google-play"></i><?php echo $text_button_google_play; ?></a>
                        <?php
                    } ?>

                </div>
                <?php if(!empty($title_2)){
                    ?>
                    <div class="box-buton-title box-buton-title-2">
                        <?php echo $title_2; ?>
                    </div>
                <?php
                } ?>
                <div class="text_button text_button-2">
                    <?php if(!empty($text_button_web_app)){
                        ?>
                        <a href="<?php echo $link_web_app; ?>" class="btn button white"><i class="ic-web-app"></i><?php echo $text_button_web_app; ?></a>
                        <?php
                    } ?>

                </div>

            </div>
        </div>
    </div>


    <?php

    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}
add_shortcode('luyendev_box_button', 'luyendev_box_button_func');