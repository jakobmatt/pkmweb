<?php
namespace feedthemsocial;
/**
 * Class FTS Youtube Feed
 *
 * @package feedthemsocial
 */
class FTS_Youtube_Feed extends feed_them_social_functions
{
    /**
     * Construct
     *u
     * FTS Youtube Feed constructor.
     *
     * @since 1.5.6
     */
    function __construct()
    {
        add_shortcode('fts_youtube', array($this, 'fts_youtube_func'));

        add_action('wp_enqueue_scripts', array($this, 'fts_youtube_head'));
    }
    /**
     * FTS Youtube Head
     *
     * @since 1.5.6
     */
    function fts_youtube_head()
    {
        wp_enqueue_style('fts-feeds', plugins_url('feed-them-social/feeds/css/styles.css'));
    }

    /**
     * FTS Youtube Functions
     *
     * @param $atts
     * @return string
     * @since 1.5.6
     */
    function fts_youtube_func($atts)
    {
        global $channel_id, $playlist_id, $username_subscribe_btn, $username;
        include_once ABSPATH . 'wp-admin/includes/plugin.php';
        extract(shortcode_atts(array(
            'username' => '',
            'vid_count' => '1',
            'large_vid' => '',
            'vids_in_row' => '',
            'channel_id' => '',
            'playlist_id' => '',
            'username_subscribe_btn' => '',
        ), $atts));

        $youtube_show_follow_btn = get_option('youtube_show_follow_btn');
        $youtube_show_follow_btn_where = get_option('youtube_show_follow_btn_where');

        // you must create a youtube app now to get this.
        $youtubeAPIkey = get_option('youtube_custom_api_token');

        if ($username !== '') {
            // here we are getting the users channel ID for their uploaded videos
            $youtube_userID_data['items'] = 'https://www.googleapis.com/youtube/v3/channels?part=contentDetails&forUsername=' . $username . '&key=' . $youtubeAPIkey;
            $userID_returned = $this->fts_get_feed_json($youtube_userID_data);

            $userIDfinal = json_decode($userID_returned['items']);

            if (isset($youtubeAPIkey) && $youtubeAPIkey !== '') {
                // now we parse the users uploaded vids ID and create the playlist
                foreach ($userIDfinal->items as $userID) {
                    $video_data['videos'] = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=' . $vid_count . '&playlistId=' . $userID->contentDetails->relatedPlaylists->uploads . '&order=date&key=' . $youtubeAPIkey;
                }
            }
            $videos_returned = $this->fts_get_feed_json($video_data);
            $videos = $videos_returned['videos'];

         //   echo'<pre>';
         //   print_r($videos_returned);
         //   echo'</pre>';


            //Youtube Username Cache Folder
            $youtube_cache_url = 'pics_vids_list_' . $username . '_bnum' . $vid_count . '_user';
        } elseif ($channel_id !== '' && $playlist_id == '') {
            $youtube_channelID_data['items'] = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=' . $channel_id . '&order=date&maxResults=' . $vid_count . '&key=' . $youtubeAPIkey;
            $userChannel_returned = $this->fts_get_feed_json($youtube_channelID_data);
            $videos = $userChannel_returned['items'];
            //Youtube Channel Cache
            $youtube_cache_url = 'pics_vids_list_' . $channel_id . '_bnum' . $vid_count . '_channel';
        } elseif ($playlist_id !== '' || $playlist_id !== '' && $channel_id !== '') {
            $youtube_playlistID_data = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=' . $vid_count . '&playlistId=' . $playlist_id . '&order=date&key=' . $youtubeAPIkey;
            $video_data['videos'] = $youtube_playlistID_data;
            $videos_returned = $this->fts_get_feed_json($video_data);
            $videos = $videos_returned['videos'];
            //Youtube Playlist Cache Folder
            $youtube_cache_url = 'pics_vids_list_' . $playlist_id . '_bnum' . $vid_count . '_playlist';
        }
        //Youtube Create Cache
        if (false !== ($transient_exists = $this->fts_check_feed_cache_exists($youtube_cache_url))) {
            $videos = $this->fts_get_feed_cache($youtube_cache_url);
        } else {
            $videos = json_decode($videos);
            $this->fts_create_feed_cache($youtube_cache_url, $videos);
        }

        $output = '';

        ob_start();
        //***********************
        // SOCIAL BUTTON TOP
        //***********************

        if (isset($youtube_show_follow_btn) && $youtube_show_follow_btn == 'yes' && $youtube_show_follow_btn_where == 'youtube-follow-above') {
            $output .= '<div class="youtube-social-btn-top">';
            if ($username !== '' || $username_subscribe_btn !== '') {
                $output .= $this->social_follow_button('youtube', $username);
            } elseif ($channel_id !== '') {
                $output .= $this->social_follow_button('youtube', $channel_id);
            }
            $output .= '</div>';
        }

        // we ob_get_clean here so the button is on top and also allows the content in wordpress textarea to be on top if shortcode is below text.
        $output .= ob_get_clean();
        // and we start over so we can ob_get_clean at the very end
        ob_start();
        $ssl = is_ssl() ? 'https' : 'http';
        // This first line was added to fix the bug that happens when using the popular DIVI theme.
        $output .= '<div class="et_smooth_scroll_disabled fts_smooth_scroll_disabled">';
        $output .= '<div id="fts-yt-videogroup-' . $username . '" class="fts-yt-videogroup fts-yt-user-' . $username . ' fts-yt-vids-in-row' . $vids_in_row . '">';
        $output .= '<div id="fts-yt-videolist-' . $username . '" class="fts-yt-videolist">';

        if ($large_vid == 'yes' || $vids_in_row == '1') {
            foreach ($videos->items as $post_data) {
                $output .= '<div id="fts-yt-large-' . $username . '" class="fts-yt-large">';
                $output .= '<div class="fts-yt-first-video">';

                $output .= '<h2>' . $this->fts_youtube_title($post_data) . '</h2>';

                $output .= $this->fts_youtube_video_and_wrap($post_data, $username, $playlist_id);

                $output .= '<p>' . $this->fts_youtube_description($post_data) . '</p>';

                $output .= '</div>';
                $output .= '</div>';
                // we stop the foreach loop here because we only want the first video in the loop
                if ($vids_in_row !== '1') {
                    break;
                }
            }
        }
        $output .= '<ul>';
        if ($vids_in_row !== '1') {
            // if large vid yes then we want to offset the foreach loop below so we don't duplicate the first video
            if ($large_vid == 'yes') {
                $i = 1;
            } else {
                $i = 2;
            };

            // foreach for the videos and thumbnails
            foreach ($videos->items as $post_data) {
                if ($vids_in_row == '1') {
                    $output .= '<li><div class="entriestitle">' . $post_data->snippet->title . '</div>';
                    //$output .= '<div class="fts-fluid-videoWrapper"><iframe id="fts-'.$post_data->snippet->resourceId->videoId.'" src="http://www.youtube.com/embed/'.$post_data->snippet->resourceId->videoId.'?wmode=transparent&HD=0&rel=0&showinfo=0&controls=1&fs=1&autoplay=0" frameborder="0" allowfullscreen></iframe></div>';
                    $output .= '<div class="fts-fluid-videoWrapper">';
                    if ($username !== '' || $playlist_id !== '') {
                        $output .= '<iframe src="' . $ssl . '://www.youtube.com/embed/' . $post_data->snippet->resourceId->videoId . '?wmode=transparent&HD=0&rel=0&showinfo=0&controls=1&autoplay=0" frameborder="0" allowfullscreen></iframe>';
                    } else {
                        $output .= '<iframe id="fts-' . $post_data->id->videoId . '" src="' . $ssl . '://www.youtube.com/embed/' . $post_data->id->videoId . '?wmode=transparent&HD=0&rel=0&showinfo=0&controls=1&fs=1&autoplay=0" frameborder="0" allowfullscreen></iframe>';
                    }
                    $output .= '</div>';
                } else {
                    if ($i > 1) {
                        $output .= '<li><div class="entriestitle">' . $post_data->snippet->title . '</div>';

                        if ($username !== '' || $playlist_id !== '') {
                            $output .= '<a href="javascript:;" id="fts-' . $post_data->snippet->resourceId->videoId . '-open" onClick="startVideos();" rel="fts-yt-iframe-' . $post_data->snippet->resourceId->videoId . '" class="fts-yt-popup-open"><img src="' . $post_data->snippet->thumbnails->high->url . '" /></a>';
                            $output .= '<div id="#fts-' . $post_data->snippet->resourceId->videoId . '" class="fts-yt-overlay-wrap">';
                        } else {
                            $output .= '<a href="javascript:;" id="fts-' . $post_data->id->videoId . '-open" onClick="startVideos();" rel="fts-yt-iframe-' . $post_data->id->videoId . '" class="fts-yt-popup-open"><img src="' . $post_data->snippet->thumbnails->high->url . '" /></a>';
                            $output .= '<div id="#fts-' . $post_data->id->videoId . '" class="fts-yt-overlay-wrap fts-yt-iframe-' . $post_data->id->videoId . '">';
                        }
                        $output .= '<div class="fts-yt-overlay">';
                        $output .= '<div class="fts-fluid-videoWrapper">';

                        if ($username !== '' || $playlist_id !== '') {
                            $output .= '<iframe id="fts-yt-iframe-' . $post_data->snippet->resourceId->videoId . '" class="fts-yt-player" src="' . $ssl . '://www.youtube.com/embed/' . $post_data->snippet->resourceId->videoId . '?&wmode=transparent&HD=0&rel=0&showinfo=0&controls=1&fs=1" frameborder="0" allowfullscreen></iframe>';
                        } else {
                            $output .= '<iframe id="fts-yt-iframe-' . $post_data->id->videoId . '" class="fts-yt-player" src="' . $ssl . '://www.youtube.com/embed/' . $post_data->id->videoId . '?&wmode=transparent&HD=0&rel=0&showinfo=0&controls=1&fs=1" frameborder="0" allowfullscreen></iframe>';
                        }
                        $output .= '</div>';

                        if ($username !== '' || $playlist_id !== '') {
                            $output .= '<a href="javascript:;" onClick="stopVideos();" rel="fts-yt-iframe-' . $post_data->snippet->resourceId->videoId . '" class="fts-yt-popup-close">Close</a>';

                        } else {
                            $output .= '<a href="javascript:;" onClick="stopVideos();" rel="fts-yt-iframe-' . $post_data->id->videoId . '" class="fts-yt-popup-close">Close</a>';
                        }
                        $output .= '</div>';
                        $output .= '</div>';
                        $output .= '</li>';
                    };
                    $i++;
                };
            }
        }
        $output .= '</ul>';
        $output .= '</div>';
        $output .= '</div>';
        // End DIVI theme .et_smooth_scroll_disabled
        $output .= '</div>';
        //***********************
        // SOCIAL BUTTON BOTTOM
        //***********************
        if (isset($youtube_show_follow_btn) && $youtube_show_follow_btn == 'yes' && $youtube_show_follow_btn_where == 'youtube-follow-below') {
            $output .= '<div class="youtube-social-btn-bottom">';


            if ($username !== '' || $username_subscribe_btn !== '') {
                $output .= $this->social_follow_button('youtube', $username);
            } elseif ($channel_id !== '') {
                $output .= $this->social_follow_button('youtube', $channel_id);
            }
            $output .= '</div>';
        }
        // js click states for the popup
        $output .= "<script>function stopVideos(){jQuery(document).on('click', 'a.fts-yt-popup-close', function () {var this_frame = jQuery(this).attr('rel');var old_fixed_src = jQuery('#'+this_frame).attr('src');new_src = old_fixed_src.replace('&autoplay=1', '');jQuery('#'+this_frame).attr('src', new_src);jQuery('.fts-yt-overlay-wrap').fadeOut('fast');});}function startVideos() {jQuery(document).on('click', 'a.fts-yt-popup-open', function (event) {event.stopPropagation();var this_frame = jQuery(this).attr('rel');var fixed_src = jQuery('#'+this_frame).attr('src') + '&autoplay=1';jQuery('#'+this_frame).attr('src', fixed_src);jQuery(this).next('div.fts-yt-overlay-wrap').fadeIn('fast').addClass('fts-yt-target');});}</script>";
        $output .= ob_get_clean();
        return $output;
    }
}
new FTS_Youtube_Feed();
?>