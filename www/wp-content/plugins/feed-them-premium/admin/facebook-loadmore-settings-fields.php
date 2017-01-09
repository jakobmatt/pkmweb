<?php

$fts_bar_fb_prefix = isset($fts_bar_fb_prefix) ? $fts_bar_fb_prefix : "";
$fb_load_more_option = isset($fb_load_more_option) ? $fb_load_more_option : "";
$fb_load_more_style = isset($fb_load_more_style) ? $fb_load_more_style : "";
$fb_page_posts_displayed_option = isset($fb_page_posts_displayed_option) ? $fb_page_posts_displayed_option : "";
$facebook_grid_colmn_width = isset($facebook_grid_colmn_width) ? $facebook_grid_colmn_width : "";
$facebook_popup = isset($facebook_popup) ? $facebook_popup : "";
$facebook_grid_space_between_posts = isset($facebook_grid_space_between_posts) ? $facebook_grid_space_between_posts : "";


//IF NOT FTS BAR
if ($_GET['page'] && $_GET['page'] !== 'fts-bar-settings-page') {

    $output .= '<div class="like-box-wrap">';
        // FACEBOOK LIKE BOX SHOW OR HIDE OPTION
        $output .= '<div class="feed-them-social-admin-input-wrap">';
        $output .= '<div class="feed-them-social-admin-input-label">' . __('Hide Like Box or Button', 'feed-them-premium') . '<br/><small>' . __('Turn on from <a href="admin.php?page=fts-facebook-feed-styles-submenu-page">Facebook Options</a> page', 'feed-them-premium') . '</small></div>';
        $output .= '<select id="fb_hide_like_box_button" class="feed-them-social-admin-input">';
        $output .= '<option value="no">' . __('No', 'feed-them-premium') . '</option>';
        $output .= '<option value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
        $output .= '</select>';
        $output .= '<div class="clear"></div>';
        $output .= '</div><!--/feed-them-social-admin-input-wrap-->';

        // FACEBOOK SHOW LIKEBOX/BUTTON ABOVE TITLE, BELOW TITLE OR BOTTOM
        $output .= '<div class="fb_align_likebox">';
        $output .= '<div class="feed-them-social-admin-input-wrap">';
        $output .= '<div class="feed-them-social-admin-input-label">' . __('Position of Like Box or Button', 'feed-them-premium') . '</div>';
        $output .= '<select id="fb_position_likebox" class="feed-them-social-admin-input">';
        $output .= '<option value="above_title">' . __('Above Title', 'feed-them-premium') . '</option>';
        $output .= '<option value="below_title">' . __('Below Title', 'feed-them-premium') . '</option>';
        $output .= '<option value="bottom">' . __('Bottom of Feed', 'feed-them-premium') . '</option>';
        $output .= '</select>';
        $output .= '<div class="clear"></div>';
        $output .= '</div><!--/feed-them-social-admin-input-wrap-->';
        $output .= '</div><!--/fb_align_likebox-->';

        // FACEBOOK ALIGN LIKEBOX OR BUTTON OPTION
        $output .= '<div class="fb_align_likebox">';
        $output .= '<div class="feed-them-social-admin-input-wrap">';
        $output .= '<div class="feed-them-social-admin-input-label">' . __('Align Like Box or Button', 'feed-them-premium') . '</div>';
        $output .= '<select id="fb_align_likebox" class="feed-them-social-admin-input">';
        $output .= '<option value="left">' . __('Left', 'feed-them-premium') . '</option>';
        $output .= '<option value="center">' . __('Center', 'feed-them-premium') . '</option>';
        $output .= '<option value="right">' . __('Right', 'feed-them-premium') . '</option>';
        $output .= '</select>';
        $output .= '<div class="clear"></div>';
        $output .= '</div><!--/feed-them-social-admin-input-wrap-->';
        $output .= '</div><!--/fb_align_likebox-->';

        $output .= '<div class="feed-them-social-admin-input-wrap fb_align_likebox">';
        $output .= '<div class="feed-them-social-admin-input-label">' . __('Width of Like Box', 'feed-them-premium') . '<br/><small>' . __('This only works for the Like Box', 'feed-them-premium') . '</small></div>';
        $output .= '<input type="text" name="like_box_width" id="like_box_width" class="feed-them-social-admin-input" value="" placeholder="' . __('500px max', 'feed-them-premium') . '"/>';
        $output .= '<div class="clear"></div>';
        $output .= '</div><!--/feed-them-social-admin-input-wrap-->';
    $output .= '</div><!--/"like-box-wrap-->';
}

// FACEBOOK POP UP FOR PHOTOS
$output .= '<div class="feed-them-social-admin-input-wrap fts-photos-popup">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Display Photos in Popup', 'feed-them-premium') . '</div>';
$output .= '<select name="' . $fts_bar_fb_prefix . 'facebook_popup" id="facebook_popup" class="feed-them-social-admin-input">';
$output .= '<option ' . selected($facebook_popup, 'no', false) . ' value="no">' . __('No', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($facebook_popup, 'yes', false) . ' value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

// FACEBOOK LOAD MORE OPTION
$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Load More button', 'feed-them-premium') . '</div>';
$output .= '<select name="' . $fts_bar_fb_prefix . 'fb_load_more_option" id="fb_load_more_option" class="feed-them-social-admin-input">';
$output .= '<option ' . selected($fb_load_more_option, 'no', false) . ' value="no">' . __('No', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($fb_load_more_option, 'yes', false) . ' value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';


//IF NOT FTS BAR
if ($_GET['page'] && $_GET['page'] !== 'fts-bar-settings-page') {
// FACEBOOK LOAD MORE TYPE OPTION
    $output .= '<div class="fts-facebook-load-more-options-wrap" style="display:none">';

    $output .= '<div class="instructional-text"><strong>' . __('NOTE:', 'feed-them-premium') . '</strong> ' . __('The Button option will show a "Load More Posts" button under your feed. The AutoScroll option will load more posts when you reach the bottom of the feed. AutoScroll ONLY works if you\'ve filled in a Fixed Height for your feed.', 'feed-them-premium') . '</div>';
    $output .= '<div class="feed-them-social-admin-input-wrap">';
    $output .= '<div class="feed-them-social-admin-input-label">' . __('Load more style', 'feed-them-premium') . '</div>';
    $output .= '<select name="' . $fts_bar_fb_prefix . 'fb_load_more_style" id="fb_load_more_style" class="feed-them-social-admin-input">';
    $output .= '<option ' . selected($fb_load_more_style, 'button', false) . ' value="button">' . __('Button', 'feed-them-premium') . '</option>';
    $output .= '<option ' . selected($fb_load_more_style, 'autoscroll', false) . ' value="autoscroll">' . __('AutoScroll', 'feed-them-premium') . '</option>';

    $output .= '</select>';
    $output .= '<div class="clear"></div>';
    $output .= '</div><!--/feed-them-social-admin-input-wrap-->';

    $output .= '</div><!--/fts-facebook-load-more-options-wrap-->';
}


//IF NOT FTS BAR
if ($_GET['page'] && $_GET['page'] !== 'fts-bar-settings-page') {
    $output .= '<div class="fts-facebook-load-more-options2-wrap" style="display:none">';
//    $output .= '<div class="instructional-text"><strong>'.__('NOTE:', 'feed-them-premium').'</strong> '.__('Define the Width of each post and the Space between each post below.', 'feed-them-premium').'</div>';
    $output .= '<div class="feed-them-social-admin-input-wrap">';
    $output .= '<div class="feed-them-social-admin-input-label">' . __('Load more Button Width', 'feed-them-premium') . '<br/><small>' . __('Leave blank for auto width', 'feed-them-premium') . '</small></div>';
    $output .= '<input type="text" name="facebook_grid_colmn_width" id="loadmore_button_width" class="feed-them-social-admin-input" value="' . $facebook_grid_colmn_width . '" placeholder="300px ' . __('for example', 'feed-them-premium') . '"/>';
    $output .= '<div class="clear"></div>';
    $output .= '</div><!--/feed-them-social-admin-input-wrap-->';

    $output .= '<div class="feed-them-social-admin-input-wrap">';
    $output .= '<div class="feed-them-social-admin-input-label">' . __('Load more Button Margin', 'feed-them-premium') . '</div>';
    $output .= '<input type="text" name="facebook_grid_colmn_width" id="loadmore_button_margin" class="feed-them-social-admin-input" value="' . $facebook_grid_colmn_width . '" placeholder="10px ' . __('for example', 'feed-them-premium') . '"/>';
    $output .= '<div class="clear"></div>';
    $output .= '</div><!--/feed-them-social-admin-input-wrap-->';
    $output .= '</div><!--/fts-facebook-load-more-options2-wrap-->';
}


//IF NOT FTS BAR
if ($_GET['page'] && $_GET['page'] !== 'fts-bar-settings-page') {
    // FACEBOOK GRID OPTIONS
    $output .= '<div class="feed-them-social-admin-input-wrap fb-posts-in-grid-option-wrap">';
    $output .= '<div class="feed-them-social-admin-input-label">' . __('Display Posts in Grid', 'feed-them-premium') . '</div>';
    $output .= '<select name="fb-grid-option" id="fb-grid-option" class="feed-them-social-admin-input">';
    $output .= '<option ' . selected($fb_page_posts_displayed_option, 'no', false) . ' value="no">' . __('No', 'feed-them-premium') . '</option>';
    $output .= '<option ' . selected($fb_page_posts_displayed_option, 'yes', false) . ' value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
    $output .= '</select>';
    $output .= '<div class="clear"></div>';
    $output .= '</div><!--/feed-them-social-admin-input-wrap-->';

    // FACEBOOK GRID WIDTH
    $output .= '<div class="fts-facebook-grid-options-wrap" style="display:none">';

    // CENTER THE FACEBOOK CONTAINER
    $output .= '<div class="feed-them-social-admin-input-wrap facebook_name"><div class="feed-them-social-admin-input-label">' . __('Center Facebook Container', 'feed-them-premium') . '</div>
        	<select id="fts-slicker-facebook-container-position-custom" name="fts-slicker-facebook-container-position" class="feed-them-social-admin-input"><option value="no">' . __('No', 'feed-them-premium') . '</option><option value="yes">' . __('Yes', 'feed-them-premium') . '</option></select><div class="clear"></div></div>';

    // ANIMATE PHOTO POSITIONING
    $output .= ' <div class="feed-them-social-admin-input-wrap facebook_name"><div class="feed-them-social-admin-input-label">' . __('Image Stacking Animation On', 'feed-them-premium') . '<br/><small>' . __('This happens when resizing browser', 'feed-them-premium') . '</small></div>
        	 <select id="fts-slicker-facebook-container-animation-custom" name="fts-slicker-facebook-container-animation" class="feed-them-social-admin-input"><option value="no">' . __('No', 'feed-them-premium') . '</option><option value="yes">' . __('Yes', 'feed-them-premium') . '</option></select><div class="clear"></div></div>';


    $output .= '<div class="instructional-text"><strong>' . __('NOTE:', 'feed-them-premium') . '</strong> ' . __('Define the Width of each post and the Space between each post below. You must add px after any number.', 'feed-them-premium') . '</div>';
    $output .= '<div class="feed-them-social-admin-input-wrap">';
    $output .= '<div class="feed-them-social-admin-input-label">' . __('Grid Column Width', 'feed-them-premium') . '</div>';
    $output .= '<input type="text" name="facebook_grid_colmn_width" id="facebook_grid_colmn_width" class="feed-them-social-admin-input" value="' . $facebook_grid_colmn_width . '" placeholder="310px ' . __('for example', 'feed-them-premium') . '"/>';
    $output .= '<div class="clear"></div>';
    $output .= '</div><!--/feed-them-social-admin-input-wrap-->';

    // FACEBOOK GRID SPACE BETWEEN PHOTOS
    $output .= '<div class="feed-them-social-admin-input-wrap">';
    $output .= '<div class="feed-them-social-admin-input-label">' . __('Grid Spaces Between Posts', 'feed-them-premium') . '</div>';
    $output .= '<input type="text" name="facebook_grid_space_between_posts" id="facebook_grid_space_between_posts" class="feed-them-social-admin-input" value="' . $facebook_grid_space_between_posts . '" placeholder="10px ' . __('for example', 'feed-them-premium') . '"/>';
    $output .= '<div class="clear"></div>';
    $output .= '</div><!--/feed-them-social-admin-input-wrap-->';
    $output .= '</div><!--/fts-facebook-grid-options-wrap-->';


    //IF NOT FTS BAR
    if ($_GET['page'] && $_GET['page'] !== 'fts-bar-settings-page') {

        // FACEBOOK VIDEO PLAY BUTTON OPTION

        $output .= '<div class="fb-video-play-btn-options-wrap" style="display:none;">';
        $output .= '<div class="feed-them-social-admin-input-wrap">';
        $output .= '<div class="feed-them-social-admin-input-label">' . __('Video Play Button', 'feed-them-premium') . '<br/><small>' . __('Displays over Video Thumbnail', 'feed-them-premium') . '</small></div>';
        $output .= '<select id="facebook_show_video_button" class="feed-them-social-admin-input">';
        $output .= '<option value="no">' . __('No', 'feed-them-premium') . '</option>';
        $output .= '<option value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
        $output .= '</select>';
        $output .= '<div class="clear"></div>';
        $output .= '</div><!--/feed-them-social-admin-input-wrap-->';


        $output .= '<div class="fb-video-play-btn-options-content" style="display:none;">';
        // FACEBOOK SIZE OF VIDEO PLAY BUTTON
        $output .= '<div class="feed-them-social-admin-input-wrap">';
        $output .= '<div class="feed-them-social-admin-input-label">' . __('Size of the Play Button', 'feed-them-premium') . '</div>';
        $output .= '<input type="text" name="facebook_size_video_play_btn" id="facebook_size_video_play_btn" class="feed-them-social-admin-input" placeholder="40px ' . __('for example', 'feed-them-premium') . '"/>';
        $output .= '<div class="clear"></div>';
        $output .= '</div><!--/feed-them-social-admin-input-wrap-->';


        // FACEBOOK VIDEO PLAY BUTTON IN FRONT
        $output .= '<div class="feed-them-social-admin-input-wrap">';
        $output .= '<div class="feed-them-social-admin-input-label">' . __('Show Play Button in Front', 'feed-them-premium') . '<br/><small>' . __('Displays before hovering over thumbnail', 'feed-them-premium') . '</small></div>';
        $output .= '<select id="facebook_show_video_button_in_front" class="feed-them-social-admin-input">';
        $output .= '<option value="no">' . __('No', 'feed-them-premium') . '</option>';
        $output .= '<option value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
        $output .= '</select>';
        $output .= '<div class="clear"></div>';
        $output .= '</div><!--/feed-them-social-admin-input-wrap-->';


        $output .= '</div><!--/fb-video-play-btn-options-content-->';
        $output .= '</div><!--/fb-video-play-btn-options-wrap-->';


        // FACEBOOK VIDEO ALIGN IMAGES.
        $output .= '<div class="feed-them-social-admin-input-wrap" id="facebook_video_align_images_wrapper" style="display:none;">';
        $output .= '<div class="feed-them-social-admin-input-label">' . __('Align Images', 'feed-them-premium') . '</div>';
        $output .= '<select id="facebook_video_align_images" class="feed-them-social-admin-input">';
        $output .= '<option value="left">' . __('Left', 'feed-them-premium') . '</option>';
        $output .= '<option value="center">' . __('Center', 'feed-them-premium') . '</option>';
        $output .= '<option value="right">' . __('Right', 'feed-them-premium') . '</option>';
        $output .= '</select>';
        $output .= '<div class="clear"></div>';
        $output .= '</div><!--/feed-them-social-admin-input-wrap-->';

    }
}
?>