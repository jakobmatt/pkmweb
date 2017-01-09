<?php
$fb_event_post_count_option = isset($fb_event_post_count_option) ? $fb_event_post_count_option : "";
$fb_event_title_option = isset($fb_event_title_option) ? $fb_event_title_option : "";
$fb_event_description_option = isset($fb_event_description_option) ? $fb_event_description_option : "";
$fb_event_word_count_option = isset($fb_event_word_count_option) ? $fb_event_word_count_option : "";

$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('# of Posts', 'feed-them-premium') . '</div>';
$output .= '<input type="text" name="fb_event_post_count" id="fb_event_post_count" class="feed-them-social-admin-input" value="' . $fb_event_post_count_option . '" placeholder="5 ' . __('is the default value', 'feed-them-premium') . '" />';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Show Event Title', 'feed-them-premium') . '</div>';
$output .= '<select name="fb_event_title_option" id="fb_event_title_option" class="feed-them-social-admin-input">';
$output .= '<option ' . selected($fb_event_title_option, 'yes', false) . ' value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($fb_event_title_option, 'no', false) . ' value="no">' . __('No', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Show Event Description', 'feed-them-premium') . '</div>';
$output .= '<select name="fb_event_description_option" id="fb_event_description_option" class="feed-them-social-admin-input">';
$output .= '<option ' . selected($fb_event_description_option, 'yes', false) . ' value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($fb_event_description_option, 'no', false) . ' value="no">' . __('No', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Amount of words per post', 'feed-them-premium') . '</div>';
$output .= '<input type="text" name="fb_event_word_count_option" id="fb_event_word_count_option" class="feed-them-social-admin-input" value="' . $fb_event_word_count_option . '" placeholder="45 ' . __('is the default value', 'feed-them-premium') . '" />';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';
?>