<?php
/*
* Shortcode Map
* Author LuyenDev
*/
    function luyendev_map_element(){

    add_ux_builder_shortcode('luyendev_map', array(
        'name'      => __('Google Map'),
        'category'  => __('Content'),
        'options'   => array(
            'address'         => array(
                'type'    => 'textfield',
                'heading' => 'Address',
                'value'   => '',
            ),
            'lat'         => array(
                'type'    => 'textfield',
                'heading' => 'Lat',
                'value'   => '',
            ),
            'long'         => array(
                'type'    => 'textfield',
                'heading' => 'Long',
                'value'   => '',
            ),
            'zoom'         => array(
                'type'    => 'textfield',
                'heading' => 'Zoom',
                'value'   => '',
            ),
            'width'         => array(
                'type'    => 'textfield',
                'heading' => 'Width',
                'value'   => '',
            ),
            'height'         => array(
                'type'    => 'textfield',
                'heading' => 'Height',
                'value'   => '',
            ),
            'markerimage'         => array(
                'type'    => 'image',
                'heading' => 'Marker image',
                'value'   => '',
            ),
            
        ),

    ));
}
add_action('ux_builder_setup', 'luyendev_map_element');

function luyendev_map_func($atts){

    extract(shortcode_atts(array(

        "lat" => "16.019210",
        "long" => "108.229350",
        "zoom" => "14",
        'width' => '100%',
        'height' => '400',
        'address' => '',
        'marker' => 'true',
        'markerimage' => '',
        'traffic' => '',
        'draggable' => '',
        'infowindow' => '',
        'infowindowdefault' => '',
        'hidecontrols' => '',
        'scrollwheel' => '',
        'class' => ''


    ), $atts));

    $lat = $lat . 0;
    $long = $long . 0;

    ob_start();

    $width = (substr($width, -1) != "%" && substr($width, -2) != "px" ? $width . "px" : $width);

    $height = (substr($height, -1) != "%" && substr($height, -2) != "px" ? $height . "px" : $height);

    ?>
    <div id="luyendev_map" class="luyendev-map" style="<?php echo ($width != "" ? "width:" . esc_attr($width) . ";" : "") . ($height != "" ? "height:" . esc_attr($height) . ";" : ""); ?>"></div>
    <script>
        function initMap(){
            var myLatlng=new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $long; ?>);
            var myOptions={
                zoom:<?php echo $zoom; ?>,
                center:myLatlng,
                mapTypeId:"roadmap",
                mapTypeControl:false,
                streetViewControl:false,
                rotateControl:false,
                fullscreenControl:false,
                styles:[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
            };
            var map=new google.maps.Map(document.getElementById("luyendev_map"),myOptions);
            var contentString="";
            var infowindow=new google.maps.InfoWindow({content:contentString});
            var image="<?php echo wp_get_attachment_url($markerimage); ?>";
            var marker=new google.maps.Marker({position:myLatlng,map:map,icon:image,title:"<?php echo $address; ?>"});
            google.maps.event.addListener(marker,"click",function(){infowindow.open(map,marker);});
        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2QcaLut7vOHPi6-HuUZDjBrp3XYJ7Ln4&callback=initMap"></script>
    <?php
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}
add_shortcode('luyendev_map', 'luyendev_map_func');