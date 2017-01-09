<?php
//set empty settings
$fb_page_title_option = isset($fb_page_title_option) ? $fb_page_title_option : "";
$fb_page_description_option = isset($fb_page_description_option) ? $fb_page_description_option : "";
$fb_page_word_count_option = isset($fb_page_word_count_option) ? $fb_page_word_count_option : "";

$output .= '<div class="feed-them-social-admin-input-wrap fb-page-title-option-hide">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Show Page Title', 'feed-them-premium') . '</div>';
$output .= '<select name="fb_page_title_option" id="fb_page_title_option" class="feed-them-social-admin-input">';
$output .= '<option ' . selected($fb_page_title_option, 'yes', false) . ' value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($fb_page_title_option, 'no', false) . ' value="no">' . __('No', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

$output .= '<div class="feed-them-social-admin-input-wrap fb-page-title-option-hide">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Align Title', 'feed-them-premium') . '</div>';
$output .= '<select name="fb_page_title_align" id="fb_page_title_align" class="feed-them-social-admin-input">';
$output .= '<option value="left">' . __('Left', 'feed-them-premium') . '</option>';
$output .= '<option value="center">' . __('Center', 'feed-them-premium') . '</option>';
$output .= '<option value="right">' . __('Right', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

$output .= '<div class="feed-them-social-admin-input-wrap fb-page-description-option-hide">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Show Page Description', 'feed-them-premium') . '</div>';
$output .= '<select name="fb_page_description_option" id="fb_page_description_option" class="feed-them-social-admin-input">';
$output .= '<option ' . selected($fb_page_description_option, 'yes', false) . ' value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($fb_page_description_option, 'no', false) . ' value="no">' . __('No', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Amount of words per post', 'feed-them-premium') . '<br/><small>' . __('Type 0 to remove the posts description', 'feed-them-premium') . '</small></div>';
$output .= '<input type="text" name="fb_page_word_count_option" id="fb_page_word_count_option" class="feed-them-social-admin-input" value="' . $fb_page_word_count_option . '" placeholder="45 ' . __('is the default value', 'feed-them-premium') . '"/>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';
?>