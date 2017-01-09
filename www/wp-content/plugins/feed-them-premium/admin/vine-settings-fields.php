<?php

//Hide Text Option
$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Show Title and Text', 'feed-them-premium') . '</div>';
$output .= '<select name="show_text" id="show_text" class="feed-them-social-admin-input">';
$output .= '<option value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
$output .= '<option value="no">' . __('No', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

//Hide Logo Option
$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Show Vine Logo', 'feed-them-premium') . '</div>';
$output .= '<select name="show_vine_logo" id="show_vine_logo" class="feed-them-social-admin-input">';
$output .= '<option value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
$output .= '<option value="no">' . __('No', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

//Logo Size Option
$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Vine logo Size <br/><small>Leave blank for default size</small>', 'feed-them-premium') . '</div>';
$output .= '<input type="text" name="vine_logo_size" id="vine_logo_size" class="feed-them-social-admin-input" value="" placeholder="18px" />';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

?>