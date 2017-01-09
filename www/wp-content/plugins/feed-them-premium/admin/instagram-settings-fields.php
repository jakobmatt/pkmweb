<?php
$fts_bar_fb_prefix = isset($fts_bar_fb_prefix) ? $fts_bar_fb_prefix : "";
$instagram_load_more_option = isset($instagram_load_more_option) ? $instagram_load_more_option : "";
$instagram_load_more_style = isset($instagram_load_more_style) ? $instagram_load_more_style : "";
$instagram_popup_option = isset($instagram_popup_option) ? $instagram_popup_option : "";

// INSTAGRAM LOAD MORE OPTION
$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Load more posts', 'feed-them-premium') . '</div>';
$output .= '<select name="' . $fts_bar_fb_prefix . 'instagram_load_more_option" id="instagram_load_more_option" class="feed-them-social-admin-input">';
$output .= '<option ' . selected($instagram_load_more_option, 'no', false) . ' value="no">' . __('No', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($instagram_load_more_option, 'yes', false) . ' value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';


// INSTAGRAM LOAD MORE TYPE OPTION
$output .= '<div class="fts-instagram-load-more-options-wrap" style="display:none">';
$output .= '<div class="instructional-text"><strong>' . __('NOTE:', 'feed-them-premium') . '</strong> ' . __('The Button option will show a "Load More Posts" button under your feed. The AutoScroll option will load more posts when you reach the bottom of the feed. AutoScroll ONLY works if you\'ve filled in a Fixed Height for your feed.', 'feed-them-premium') . '</div>';
$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Load more style', 'feed-them-premium') . '</div>';
$output .= '<select name="' . $fts_bar_fb_prefix . 'instagram_load_more_style" id="instagram_load_more_style" class="feed-them-social-admin-input">';
$output .= '<option ' . selected($instagram_load_more_style, 'button', false) . ' value="button">' . __('Button', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($instagram_load_more_style, 'autoscroll', false) . ' value="autoscroll">' . __('AutoScroll', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';
$output .= '</div><!--/fts-facebook-load-more-options-wrap-->';

//Pop Up Option
$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Display Photos & Videos in Popup', 'feed-them-premium') . '</div>';
$output .= '<select name="instagram_popup_option" id="instagram-popup-option" class="feed-them-social-admin-input">';
$output .= '<option ' . selected($instagram_popup_option, 'no', false) . ' value="no">' . __('No', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($instagram_popup_option, 'yes', false) . ' value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';
?>