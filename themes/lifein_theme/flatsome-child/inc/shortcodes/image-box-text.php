<?php
/*
* Shortcode Image box text
* Author luyendev
*/
function luyendev_image_box_text_element(){

    add_ux_builder_shortcode('luyendev_image_box_text', array(
        'name'      => __('Image box text'),
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
//                    'image_height' => array(
//                        'type' => 'scrubfield',
//                        'heading' => __('Height'),
//                        'default' => '',
//                        'placeholder' => __('Auto'),
//                        'min' => 0,
//                        'max' => 1000,
//                        'step' => 1,
//                        'helpers' => array(
//                            array('title' => 'X','value' => ''),
//                            array('title' => '1:1','value' => '100%'),
//                            array('title' => '2:1','value' => '200%'),
//                            array('title' => '4:3','value' => '75%'),
//                            array('title' => '16:9','value' => '56.25%'),
//                            array('title' => '1:2','value' => '50%'),
//                        ),
//                        'on_change' => array(
//                            'selector' => '.box-image-inner',
//                            'style' => 'padding-top: {{ value }}'
//                        )
//                    ),
//
//                    'image_width' => array(
//                        'type' => 'slider',
//                        'heading' => __( 'Width' ),
//                        'unit' => '%',
//                        'default' => 100,
//                        'max' => 100,
//                        'min' => 0,
//                        'on_change' => array(
//                            'selector' => '.box-image',
//                            'style' => 'width: {{ value }}%'
//                        )
//                    ),


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
                ),
            ),
        )

    ));
}
add_action('ux_builder_setup', 'luyendev_image_box_text_element');

function luyendev_image_box_text_func($atts){
    extract(shortcode_atts(array(
        "_id" => 'row-'.rand(),
        'style' => '',
        'class' => '',

        'title' => '',
        'content' => '',
        'text_button' => '',
        'link' => '',

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
        <div class="image-box-text">
            <div class="image-box-text-wrap">
                <div class="box-image">
                    <?php echo flatsome_get_image( $img, $image_size ); ?>
                </div><!-- box-image -->
                <div class="image-box-content">
                    <div class="caption">
                        <?php
                        echo apply_filters( 'the_content', wp_kses_post( htmlspecialchars_decode($content) ) );
                        ?>
                    </div>
                    <div class="text_button">
                        <a href="<?php echo $link; ?>" class="btn"><?php echo $text_button; ?></a>
                    </div>
                </div>
            </div>
        </div>


    <?php

    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}
add_shortcode('luyendev_image_box_text', 'luyendev_image_box_text_func');