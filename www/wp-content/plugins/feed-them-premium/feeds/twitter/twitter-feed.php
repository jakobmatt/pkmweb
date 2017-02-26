<?php
extract(shortcode_atts(array(
    'twitter_name' => '',
    'twitter_height' => '',
    'tweets_count' => '5',
    'popup' => '',
    'search' => '',
    'show_retweets' => '',
    'cover_photo' => '',
    'stats_bar' => '',
    'show_replies' => '',
    'loadmore' => '',
    'loadmore_btn_margin' => '',
    'loadmore_btn_maxwidth' => '',
    'grid' => '',
    'colmn_width' => '',
    'space_between_posts' => '',

), $atts));
$popup = isset($popup) ? $popup : "";
$scrollMore = isset($loadmore) ? $loadmore : "";
?>