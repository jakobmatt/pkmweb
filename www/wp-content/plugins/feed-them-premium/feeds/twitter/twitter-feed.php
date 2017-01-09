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

), $atts));
$popup = isset($popup) ? $popup : "";
?>