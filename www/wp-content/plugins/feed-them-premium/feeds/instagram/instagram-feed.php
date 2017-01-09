<?php
extract(shortcode_atts(array(
    'instagram_id' => '',
    'type' => '',
    'pics_count' => '6',
    'super_gallery' => '',
    'image_size' => '',
    'icon_size' => '',
    'space_between_photos' => '',
    'hide_date_likes_comments' => '',
    'center_container' => '',
    'image_stack_animation' => '',
    'popup' => '',
    'loadmore' => '',
    'height' => '',
    // user profile options
    'profile_wrap' => '',
    'profile_photo' => '',
    'profile_stats' => '',
    'profile_name' => '',
    'profile_description' => '',
), $atts));

$popup = isset($popup) ? $popup : "";
$height = isset($height) ? $height : "";
$scrollMore = isset($loadmore) ? $loadmore : "";
?>