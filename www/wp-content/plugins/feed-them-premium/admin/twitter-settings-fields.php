<?php
$twitter_popup_option = isset($twitter_popup_option) ? $twitter_popup_option : "";

//Pop Up Option
$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Display Photos in Popup', 'feed-them-premium') . '</div>';
$output .= '<select name="twitter_popup_option" id="twitter-popup-option" class="feed-them-social-admin-input">';
$output .= '<option ' . selected($twitter_popup_option, 'no', false) . ' value="no">' . __('No', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($twitter_popup_option, 'yes', false) . ' value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';
?>