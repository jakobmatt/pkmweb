<?php
$boards_count_option = isset($boards_count_option) ? $boards_count_option : "";

$output .= '<div class="feed-them-social-admin-input-wrap number-of-boards">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('# of Boards', 'feed-them-social') . '</div>';
$output .= '<input type="text" name="boards_count" id="boards_count" class="feed-them-social-admin-input" placeholder="6 ' . __('is the default value', 'feed-them-social') . '" value="' . $boards_count_option . '" />';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

$output .= '<div class="feed-them-social-admin-input-wrap show-pins-amount" style="display:none;">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('# of Pins', 'feed-them-social') . '</div>';
$output .= '<input type="text" name="pins_count" id="pins_count" class="feed-them-social-admin-input" placeholder="6 ' . __('is the default value', 'feed-them-social') . '" value="' . $boards_count_option . '" />';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';
?>