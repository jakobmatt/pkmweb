<?php
$youtube_name_option = isset($youtube_name_option) ? $youtube_name_option : "";
$youtube_vid_count_option = isset($youtube_vid_count_option) ? $youtube_vid_count_option : "";
$youtube_columns_option = isset($youtube_columns_option) ? $youtube_columns_option : "";
$youtube_first_video_option = isset($youtube_first_video_option) ? $youtube_first_video_option : "";


// YOUTUBE FEED TYPE
$output .= '<div class="feed-them-social-admin-input-wrap youtube_type_selector">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Feed Type', 'feed-them-premium') . '</div>';
$output .= '<select name="youtube-messages-selector" id="youtube-messages-selector" class="feed-them-social-admin-input">';
$output .= '<option value="username">' . __('User\'s Most Recent Videos', 'feed-them-premium') . '</option>';
$output .= '<option value="userPlaylist">' . __('User\'s Specific Playlist', 'feed-them-premium') . '</option>';
$output .= '<option value="channelID">' . __('Channel Feed', 'feed-them-premium') . '</option>';
$output .= '<option value="playlistID">' . __('Channel\'s Specific Playlist', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';


$output .= '<div class="feed-them-social-admin-input-wrap youtube_name">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Youtube Username (required)', 'feed-them-premium') . '</div>';
$output .= '<input type="text" name="youtube_name" id="youtube_name" class="feed-them-social-admin-input" value="' . $youtube_name_option . '" />';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';


$output .= '<div class="feed-them-social-admin-input-wrap youtube_playlistID2" style="display:none">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Youtube Playlist ID (required)', 'feed-them-premium') . '</div>';
$output .= '<input type="text" name="youtube_playlistID2" id="youtube_playlistID2" class="feed-them-social-admin-input" value="' . $youtube_name_option . '" />';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';


$output .= '<div class="feed-them-social-admin-input-wrap youtube_name2" style="display:none">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Youtube Username<br/><small>Required if showing <a href="admin.php?page=fts-youtube-feed-styles-submenu-page">Subscribe button</a></small>', 'feed-them-premium') . '</div>';
$output .= '<input type="text" name="youtube_name2" id="youtube_name2" class="feed-them-social-admin-input" value="' . $youtube_name_option . '" />';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';


$output .= '<div class="feed-them-social-admin-input-wrap youtube_playlistID" style="display:none">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Youtube Playlist ID (required)', 'feed-them-premium') . '</div>';
$output .= '<input type="text" name="youtube_playlistID" id="youtube_playlistID" class="feed-them-social-admin-input" value="' . $youtube_name_option . '" />';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

$output .= '<div class="feed-them-social-admin-input-wrap youtube_channelID" style="display:none">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Youtube Channel ID (required)', 'feed-them-premium') . '</div>';
$output .= '<input type="text" name="youtube_channelID" id="youtube_channelID" class="feed-them-social-admin-input" value="' . $youtube_name_option . '" />';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

//		$output .= '<div class="instructional-text youtube_channelID2" style="display:none">'.__('You only need to fill this out if you are showing a playlist from a channel.', 'feed-them-premium').'</div>';
$output .= '<div class="feed-them-social-admin-input-wrap youtube_channelID2" style="display:none">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Youtube Channel ID<br/><small>Required if showing <a href="admin.php?page=fts-youtube-feed-styles-submenu-page">Subscribe button</a></small>', 'feed-them-premium') . '</div>';
$output .= '<input type="text" name="youtube_channelID2" id="youtube_channelID2" class="feed-them-social-admin-input" value="' . $youtube_name_option . '" />';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';


$output .= '<div class="feed-them-social-admin-input-wrap youtube_vid_count">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('# of videos (required)', 'feed-them-premium') . '</div>';
$output .= '<input type="text" name="youtube_vid_count" id="youtube_vid_count" class="feed-them-social-admin-input" value="' . $youtube_vid_count_option . '" />';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

$output .= '<div class="feed-them-social-admin-input-wrap youtube_columns">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('# of videos in each row', 'feed-them-premium') . '</div>';
$output .= '<select id="youtube_columns" class="feed-them-social-admin-input" size="1">';
$output .= '<option ' . selected($youtube_columns_option, '1', false) . ' value="1">' . __('1 video per row', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($youtube_columns_option, '2', false) . ' value="2">' . __('2 video per row', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($youtube_columns_option, '3', false) . ' value="3">' . __('3 video per row', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($youtube_columns_option, '4', false) . ' value="4">' . __('4 video per row', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

$output .= '<div class="feed-them-social-admin-input-wrap youtube_first_video">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Display First video full size', 'feed-them-premium') . '</div>';
$output .= '<select name="youtube_first_video" id="youtube_first_video" class="feed-them-social-admin-input" size="1">';
$output .= '<option ' . selected($youtube_first_video_option, 'yes', false) . ' value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($youtube_first_video_option, 'no', false) . ' value="no">' . __('No', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

if (!$save_options) {
    $output .= $this->generate_shortcode('updateTextArea_youtube();', '' . __('YouTube Feed Shortcode', 'feed-them-premium') . '', 'youtube-final-shortcode');
    $output .= '</form>';
} else {
    $output .= '<input type="submit" class="feed-them-social-admin-submit-btn" value="' . __('Save Changes', 'feed-them-premium') . '" />';
}
?>