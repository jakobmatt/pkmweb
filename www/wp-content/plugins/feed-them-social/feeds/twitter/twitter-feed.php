<?php
namespace feedthemsocial;
class FTS_Twitter_Feed extends feed_them_social_functions
{
    /**
     * Construct
     * Added Since 9/28/2016 https://dev.twitter.com/overview/api/upcoming-changes-to-tweets
     *
     * Twitter Feed constructor.
     *
     * @since 1.9.6
     */
    function __construct() {
        add_shortcode('fts_twitter', array($this, 'fts_twitter_func'));
        add_action('wp_enqueue_scripts', array($this, 'fts_twitter_head'));
    }

    /**
     * FTS Twitter Head
     *
     * Add Styles and Scripts functions.
     *
     * @since 1.9.6
     */
    function fts_twitter_head() {
        wp_enqueue_style('fts-feeds', plugins_url('feed-them-social/feeds/css/styles.css'));

    }

    function fts_twitter_load_videos($post_data) {
        // if (!wp_verify_nonce($_REQUEST['fts_security'], $_REQUEST['fts_time'] . 'load-more-nonce')) {
        //     exit('Sorry, You can\'t do that!');
        // } else {
        $tFinal = isset($post_data->entities->urls[0]->expanded_url) ? $post_data->entities->urls[0]->expanded_url : "";
        $tFinal_retweet_video = isset($post_data->retweeted_status->entities->media[0]->expanded_url) ? $post_data->retweeted_status->entities->media[0]->expanded_url : "";


        //strip Vimeo URL then ouput Iframe

        if (strpos($tFinal, 'vimeo') > 0) {
            if (strpos($tFinal, 'staffpicks') > 0) {
                $parsed_url = $tFinal;
                // var_dump(parse_url($parsed_url));
                $parsed_url = parse_url($parsed_url);
                $vimeoURLfinal = preg_replace('/\D/', '', $parsed_url["path"]);
            } else {
                $vimeoURLfinal = (int)substr(parse_url($tFinal, PHP_URL_PATH), 1);
                // echo $vimeoURLfinal;
            }
            // echo $vimeoURLfinal;
            return '<div class="fts-fluid-videoWrapper"><iframe src="http://player.vimeo.com/video/' . $vimeoURLfinal . '?autoplay=0" class="video" height="390" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
        } //strip Vimeo Staffpics URL then ouput Iframe


        elseif (strpos($tFinal, 'vine') > 0 && !strpos($tFinal, '-vine') > 0) {
            // $pattern = str_replace( array( 'https://vine.co/v/', '/', 'http://vine.co/v/'), '', $tFinal);
            // $vineURLfinal = $pattern;
            return '<div class="fts-fluid-videoWrapper"><iframe height="281" class="fts-vine-embed" src="' . $tFinal . '/embed/simple" frameborder="0"></iframe></div>';
        } //strip Youtube URL then ouput Iframe and script
        elseif (strpos($tFinal, 'youtube') > 0 && !strpos($tFinal, '-youtube') > 0) {
            $pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
            preg_match($pattern, $tFinal, $matches);
            $youtubeURLfinal = $matches[1];
            return '<div class="fts-fluid-videoWrapper"><iframe height="281" class="video" src="http://www.youtube.com/embed/' . $youtubeURLfinal . '?autoplay=0" frameborder="0" allowfullscreen></iframe></div>';
        } //strip Youtube URL then ouput Iframe and script
        elseif (strpos($tFinal, 'youtu.be') > 0) {
            $pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
            preg_match($pattern, $tFinal, $matches);
            $youtubeURLfinal = $matches[1];
            return '<div class="fts-fluid-videoWrapper"><iframe height="281" class="video" src="http://www.youtube.com/embed/' . $youtubeURLfinal . '?autoplay=0" frameborder="0" allowfullscreen></iframe></div>';
        } //strip Youtube URL then ouput Iframe and script
        elseif (strpos($tFinal, 'soundcloud') > 0) {
            //Get the JSON data of song details with embed code from SoundCloud oEmbed
            $getValues = file_get_contents('http://soundcloud.com/oembed?format=js&url=' . $tFinal . '&auto_play=false&iframe=true');
            //Clean the Json to decode
            $decodeiFrame = substr($getValues, 1, -2);
            //json decode to convert it as an array
            $jsonObj = json_decode($decodeiFrame);
            return '<div class="fts-fluid-videoWrapper">' . $jsonObj->html . '</div>';
        } else {
            include_once(WP_CONTENT_DIR . '/plugins/feed-them-social/feeds/twitter/twitteroauth/twitteroauth.php');
            $fts_twitter_custom_consumer_key = get_option('fts_twitter_custom_consumer_key');
            $fts_twitter_custom_consumer_secret = get_option('fts_twitter_custom_consumer_secret');
            $fts_twitter_custom_access_token = get_option('fts_twitter_custom_access_token');
            $fts_twitter_custom_access_token_secret = get_option('fts_twitter_custom_access_token_secret');
            //Use custom api info
            if (!empty($fts_twitter_custom_consumer_key) && !empty($fts_twitter_custom_consumer_secret) && !empty($fts_twitter_custom_access_token) && !empty($fts_twitter_custom_access_token_secret)) {
                $connection = new TwitterOAuthFTS(
                //Consumer Key
                    $fts_twitter_custom_consumer_key,
                    //Consumer Secret
                    $fts_twitter_custom_consumer_secret,
                    //Access Token
                    $fts_twitter_custom_access_token,
                    //Access Token Secret
                    $fts_twitter_custom_access_token_secret
                );
            } //else use default info
            else {
                $connection = new TwitterOAuthFTS(
                //Consumer Key
                    'dOIIcGrhWgooKquMWWXg',
                    //Consumer Secret
                    'qzAE4t4xXbsDyGIcJxabUz3n6fgqWlg8N02B6zM',
                    //Access Token
                    '1184502104-Cjef1xpCPwPobP5X8bvgOTbwblsmeGGsmkBzwdB',
                    //Access Token Secret
                    'd789TWA8uwwfBDjkU0iJNPDz1UenRPTeJXbmZZ4xjY'
                );
            }
            //  if (strpos($tFinal, 'amp.twimg.com') > 0) {

            $reg_video = $post_data->id;
            // bug about mixed content made by srl
            // https://twittercommunity.com/t/bug-with-mixed-content-in-embedded-tweet-with-video/77507
            $videosDecode = $reg_video;
            $fetchedTweets2 = $connection->get(
                'statuses/oembed',
                array(
                    'id' => $videosDecode,
                    'widget_type' => 'video',
                    'hide_tweet' => true,
                    'hide_thread' => true,
                    'hide_media' => false,
                    'omit_script' => false,
                )
            );
            return $fetchedTweets2->html;
            //   } else {
            //      exit('That is not allowed. FTS!');
            //  }
        } //strip Vine URL then ouput Iframe and script


        //  } // end main else
        //  die();
    } // end function

    function fts_twitter_description($post_data) {
        // Message. Convert links to real links.
        $pattern = array('/http:(\S)+/', '/https:(\S)+/', '/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/', '/([^a-zA-Z0-9-_&])#([0-9a-zA-Z_]+)/');
        $replace = array(' <a href="${0}" target="_blank" rel="nofollow">${0}</a>', ' <a href="${0}" target="_blank" rel="nofollow">${0}</a>', ' <a href="https://twitter.com/$2" target="_blank" rel="nofollow">@$2</a>', ' <a href="https://twitter.com/search?q=%23$2&src=hash" target="_blank" rel="nofollow">#$2</a>');
        $full_text = preg_replace($pattern, $replace, $post_data->full_text);
        return nl2br($full_text);
    }


    function fts_twitter_image($post_data, $popup) {
        $fts_twitter_hide_images_in_posts = get_option('fts_twitter_hide_images_in_posts');
        $permalink = 'https://twitter.com/' . $post_data->user->screen_name . '/status/' . $post_data->id;
        if (!empty($post_data->entities->media[0]->media_url)) {
            $media_url = $post_data->entities->media[0]->media_url_https;
            // $media_url = str_replace($not_protocol, $protocol, $media_url);
        } elseif (!empty($post_data->retweeted_status->entities->media[0]->media_url_https)) {
            $media_url = $post_data->retweeted_status->entities->media[0]->media_url_https;
        } else {
            $media_url = '';
        }

        if ($media_url !== '' && isset($fts_twitter_hide_images_in_posts) && $fts_twitter_hide_images_in_posts !== 'yes') {
            if (isset($popup) && $popup == 'yes') {
                return '<a href="' . $media_url . '" class="fts-twitter-link-image" target="_blank"><img class="fts-twitter-description-image" src="' . $media_url . '" alt="' . $post_data->user->screen_name . ' photo"/></a>';
            } else {
                return '<a href="' . $permalink . '" class="" target="_blank"><img class="fts-twitter-description-image" src="' . $media_url . '" alt="' . $post_data->user->screen_name . ' photo"/></a>';
            }
        }
    }


    function fts_twitter_permalink($post_data) {
        $permalink = 'https://twitter.com/' . $post_data->user->screen_name . '/status/' . $post_data->id;
        return '<div class="fts-tweet-reply-left"><a href="' . $permalink . '" target="_blank"><div class="fts-twitter-reply"></div></a></div>';
    }

    function fts_twitter_retweet($post_data) {
        if (isset($post_data->retweet_count) && $post_data->retweet_count !== 0) {
            $retweet_count = $post_data->retweet_count;
        } else {
            $retweet_count = '';
        }
        return '<a href="https://twitter.com/intent/retweet?tweet_id=' . $post_data->id . '&related=' . $post_data->user->name . '" target="_blank" class="fts-twitter-retweet-wrap"><div class="fts-twitter-retweet">' . $retweet_count . '</div></a>';
    }

    function fts_twitter_favorite($post_data) {
        if (isset($post_data->favorite_count) && $post_data->favorite_count !== 0) {
            $favorite_count = $post_data->favorite_count;
        } else {
            $favorite_count = '';
        }
        return '<a href="https://twitter.com/intent/like?tweet_id=' . $post_data->id . '&related=' . $post_data->user->name . '" target="_blank" class="fts-twitter-favorites-wrap"><div class="fts-twitter-favorites">' . $favorite_count . '</div></a>';
    }


    /**
     * FTS Twitter Function
     *
     * Display Twitter Feed.
     *
     * @param $atts
     * @return mixed
     * @since 1.9.6
     */
    function fts_twitter_func($atts) {

        global $connection;
        $twitter_show_follow_btn = get_option('twitter_show_follow_btn');
        $twitter_show_follow_btn_where = get_option('twitter_show_follow_btn_where');
        $twitter_show_follow_count = get_option('twitter_show_follow_count');
        include_once ABSPATH . 'wp-admin/includes/plugin.php';

        if (isset($twitter_allow_shortlink_conversion) && $twitter_allow_shortlink_conversion == 'yes' && isset($twitter_allow_shortlink_conversion) && $twitter_allow_shortlink_conversion == 'yes') {
            wp_enqueue_script('fts-longurl-js', plugins_url('feed-them-social/feeds/js/jquery.longurl.js'));
        }
        // option to allow this action or not from the Twitter Options page
        if (is_plugin_active('feed-them-premium/feed-them-premium.php')) {

            include WP_CONTENT_DIR . '/plugins/feed-them-premium/feeds/twitter/twitter-feed.php';

            if ($popup == 'yes') {
                // it's ok if these styles & scripts load at the bottom of the page
                $fts_fix_magnific = get_option('fts_fix_magnific') ? get_option('fts_fix_magnific') : '';
                if (isset($fts_fix_magnific) && $fts_fix_magnific !== '1') {
                    wp_enqueue_style('fts-popup', plugins_url('feed-them-social/feeds/css/magnific-popup.css'));
                }
                wp_enqueue_script('fts-popup-js', plugins_url('feed-them-social/feeds/js/magnific-popup.js'));
            }
        } else {
            extract(shortcode_atts(array(
                'twitter_name' => '',
                'twitter_height' => '',
                'tweets_count' => '',
                'description_image' => '',
                'search' => '',
                'show_retweets' => '',
                'cover_photo' => '',
                'stats_bar' => '',
                'show_replies' => '',
            ), $atts));
        }
        $numTweets = $tweets_count;
        if ($numTweets == NULL) {
            $numTweets = '6';
        }

        if (!is_plugin_active('feed-them-premium/feed-them-premium.php') && $numTweets > '6') {
            $numTweets = '6';
        }

        $name = $twitter_name;

        if ($show_replies == 'no') {
            $exclude_replies = 'true';
        } else {
            $exclude_replies = 'false';
        }

        ob_start();

        if (!empty($search)) {
            $data_cache = 'twitter_data_cache_' . $search . '_num' . $numTweets . '';
        } else {
            $data_cache = 'twitter_data_cache_' . $name . '_num' . $numTweets . '';
        }

        //Check Cache
        if (false !== ($transient_exists = $this->fts_check_feed_cache_exists($data_cache))) {
            $fetchedTweets = $this->fts_get_feed_cache($data_cache);
            $cache_used = true;
        } else {
            include_once WP_CONTENT_DIR . '/plugins/feed-them-social/feeds/twitter/twitteroauth/twitteroauth.php';
            $fts_twitter_custom_consumer_key = get_option('fts_twitter_custom_consumer_key');
            $fts_twitter_custom_consumer_secret = get_option('fts_twitter_custom_consumer_secret');
            $fts_twitter_custom_access_token = get_option('fts_twitter_custom_access_token');
            $fts_twitter_custom_access_token_secret = get_option('fts_twitter_custom_access_token_secret');
            //Use custom api info
            if (!empty($fts_twitter_custom_consumer_key) && !empty($fts_twitter_custom_consumer_secret) && !empty($fts_twitter_custom_access_token) && !empty($fts_twitter_custom_access_token_secret)) {
                $connection = new TwitterOAuthFTS(
                //Consumer Key
                    $fts_twitter_custom_consumer_key,
                    //Consumer Secret
                    $fts_twitter_custom_consumer_secret,
                    //Access Token
                    $fts_twitter_custom_access_token,
                    //Access Token Secret
                    $fts_twitter_custom_access_token_secret
                );
            } //else use default info
            else {
                $connection = new TwitterOAuthFTS(
                //Consumer Key
                    'dOIIcGrhWgooKquMWWXg',
                    //Consumer Secret
                    'qzAE4t4xXbsDyGIcJxabUz3n6fgqWlg8N02B6zM',
                    //Access Token
                    '1184502104-Cjef1xpCPwPobP5X8bvgOTbwblsmeGGsmkBzwdB',
                    //Access Token Secret
                    'd789TWA8uwwfBDjkU0iJNPDz1UenRPTeJXbmZZ4xjY'
                );
            }
            // $videosDecode = 'https://api.twitter.com/1.1/statuses/oembed.json?id=507185938620219395';
            // If excluding replies, we need to fetch more than requested as the
            // total is fetched first, and then replies removed.
            $totalToFetch = ($exclude_replies) ? max(50, $numTweets * 3) : $numTweets;
            $description_image = !empty($description_image) ? $description_image : "";

            if ($show_retweets == 'yes') {
                $show_retweets = 'true';
            }
            if ($show_retweets == 'no') {
                $show_retweets = 'false';
            }
            // $url_of_status = !empty($url_of_status) ? $url_of_status : "";
            // $widget_type_for_videos = !empty($widget_type_for_videos) ? $widget_type_for_videos : "";
            if (!empty($search)) {
                $fetchedTweets = $connection->get(
                    'search/tweets',
                    array(
                        'q' => $search,
                        'count' => $totalToFetch,//
                        'result_type' => 'recent',
                        'include_rts' => $show_retweets,
                        'tweet_mode' => 'extended',
                    )
                );
            } else {
                $fetchedTweets = $connection->get(
                    'statuses/user_timeline',
                    array(
                        'tweet_mode' => 'extended',
                        'screen_name' => $name,
                        'count' => $totalToFetch,
                        'exclude_replies' => $exclude_replies,
                        'images' => $description_image,
                        'include_rts' => $show_retweets,
                    )
                );
            }

            if (!empty($search)) {
                $fetchedTweets = $fetchedTweets->statuses;
            } else {
                $fetchedTweets = $fetchedTweets;
            }

            // get the count based on $exclude_replies
            $limitToDisplay = min($numTweets, count($fetchedTweets));
            for ($i = 0; $i < $limitToDisplay; $i++) {
                $numTweets = $limitToDisplay;
                break;
            }

            $convert_Array1['data'] = $fetchedTweets;
            $fetchedTweets = (object)$convert_Array1;


        }//END ELSE
        //Error Check
        if (isset($fetchedTweets->errors)) {
            $error_check = __('Oops, Somethings wrong. ', 'feed-them-social') . $fetchedTweets->errors[0]->message;
            if ($fetchedTweets->errors[0]->code == 32) {
                $error_check .= __(' Please check that you have entered your Twitter API token information correctly on the Twitter Options page of Feed Them Social.', 'feed-them-social');
            }
            if ($fetchedTweets->errors[0]->code == 34) {
                $error_check .= __(' Please check the Twitter Username you have entered is correct in your shortcode for Feed Them Social.', 'feed-them-social');
            }
        } elseif (empty($fetchedTweets) && !isset($fetchedTweets->errors)) {
            $error_check = __(' This account has no tweets. Please Tweet to see this feed. Feed Them Social.', 'feed-them-social');
        }
        //IS RATE LIMIT REACHED?
        if (isset($fetchedTweets->errors) && $fetchedTweets->errors[0]->code !== 32 && $fetchedTweets->errors[0]->code !== 34) {
            _e('Rate Limited Exceeded. Please go to the Feed Them Social Plugin then the Twitter Options page and follow the instructions under the header Twitter API Token.', 'feed-them-social');
        }
        // Did the fetch fail?
        if (isset($error_check)) {
            echo $error_check;
        }//END IF
        else {
            if (!empty($fetchedTweets)) {
                //Cache It
                if (!isset($cache_used)) {
                    $this->fts_create_feed_cache($data_cache, $fetchedTweets);
                }
                $twitter_allow_shortlink_conversion = get_option('twitter_allow_shortlink_conversion');

                $protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
                // $not_protocol = !isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
                $user_permalink = $protocol . 'twitter.com/' . $twitter_name;


                foreach ($fetchedTweets->data as $post_data) {

                    $profile_banner_url = isset($post_data->user->profile_banner_url) ? $post_data->user->profile_banner_url : "";
                    $statuses_count = isset($post_data->user->statuses_count) ? $post_data->user->statuses_count : "";
                    $followers_count = isset($post_data->user->followers_count) ? $post_data->user->followers_count : "";

                    $friends_count = isset($post_data->user->friends_count) ? $post_data->user->friends_count : "";
                    $favourites_count = isset($post_data->user->favourites_count) ? $post_data->user->favourites_count : "";
                    // we break this foreach because we only need on post to get the info above.
                    break;
                }

                ?>
                <div id="twitter-feed-<?php print $twitter_name ?>" class="fts-twitter-div<?php if ($twitter_height !== 'auto' && empty($twitter_height) == NULL) { ?> fts-twitter-scrollable<?php }
                if (isset($popup) && $popup == 'yes') { ?> popup-gallery-twitter<?php } ?>" <?php if ($twitter_height !== 'auto' && empty($twitter_height) == NULL) { ?>style="height:<?php echo $twitter_height; ?>"<?php } ?>>

                    <?php
                    //******************
                    // SOCIAL BUTTON IF COVER PHOTO ON
                    //******************
                    if (!empty($search)) {
                        $twitter_name = $twitter_name;
                    }
                    if (isset($profile_banner_url) && isset($cover_photo) && $cover_photo == "yes") {
                        ?>
                        <div class="fts-twitter-backg-image">
                            <?php
                            if (isset($twitter_show_follow_btn) && $twitter_show_follow_btn == 'yes' && $twitter_show_follow_btn_where == 'twitter-follow-above' && $twitter_name !== '') {
                                echo '<div class="twitter-social-btn-top">';
                                $this->social_follow_button('twitter', $twitter_name);
                                echo '</div>';
                            }
                            ?>
                            <img src="<?php print $profile_banner_url; ?>"/>

                        </div>
                    <?php } elseif (isset($twitter_show_follow_btn) && $twitter_show_follow_btn == 'yes' && $twitter_show_follow_btn_where == 'twitter-follow-above' && $twitter_name !== '' && $cover_photo !== "yes") {
                        echo '<div class="twitter-social-btn-top">';
                        $this->social_follow_button('twitter', $twitter_name);
                        echo '</div>';
                    }// if cover photo = yes


                    // These need to be in this order to keep the different counts straight since I used either $statuses_count or $followers_count throughout.

                    // here we add a , for all numbers below 9,999
                    if (isset($statuses_count) && $statuses_count <= 9999) {
                        $statuses_count = number_format($statuses_count);
                    }
                    // here we convert the number for the like count like 1,200,000 to 1.2m if the number goes into the millions
                    if (isset($statuses_count) && $statuses_count >= 1000000) {
                        $statuses_count = round(($statuses_count / 1000000), 1) . 'm';
                    }
                    // here we convert the number for the like count like 10,500 to 10.5k if the number goes in the 10 thousands
                    if (isset($statuses_count) && $statuses_count >= 10000) {
                        $statuses_count = round(($statuses_count / 1000), 1) . 'k';
                    }

                    // here we add a , for all numbers below 9,999
                    if (isset($followers_count) && $followers_count <= 9999) {
                        $followers_count = number_format($followers_count);
                    }
                    // here we convert the number for the comment count like 1,200,000 to 1.2m if the number goes into the millions
                    if (isset($followers_count) && $followers_count >= 1000000) {
                        $followers_count = round(($followers_count / 1000000), 1) . 'm';
                    }
                    // here we convert the number  for the comment count like 10,500 to 10.5k if the number goes in the 10 thousands
                    if (isset($followers_count) && $followers_count >= 10000) {
                        $followers_count = round(($followers_count / 1000), 1) . 'k';
                    }

                    // option to allow the followers plus count to show
                    if (isset($twitter_show_follow_count) && $twitter_show_follow_count == 'yes' && $search == '' && isset($stats_bar) && $stats_bar !== "yes") {
                        print '<div class="twitter-followers-fts-singular"><a href="' . $user_permalink . '" target="_blank">' . __('Followers:', 'feed-them-social') . '</a> ' . $followers_count . '</div>';
                    }
                    if (isset($stats_bar) && $stats_bar == "yes" && $search == '') {
                        // option to allow the followers plus count to show

                        print '<div class="fts-twitter-followers-wrap">';
                        print '<div class="twitter-followers-fts fts-tweets-first"><a href="' . $user_permalink . '" target="_blank">' . __('Tweets', 'feed-them-social') . '</a> ' . $statuses_count . '</div>';
                        print '<div class="twitter-followers-fts fts-following-link-div"><a href="' . $user_permalink . '" target="_blank">' . __('Following', 'feed-them-social') . '</a> ' . number_format($friends_count) . '</div>';
                        print '<div class="twitter-followers-fts fts-followers-link-div"><a href="' . $user_permalink . '" target="_blank">' . __('Followers', 'feed-them-social') . '</a> ' . $followers_count . '</div>';
                        print '<div class="twitter-followers-fts fts-likes-link-div"><a href="' . $user_permalink . '" target="_blank">' . __('Likes', 'feed-them-social') . '</a> ' . number_format($favourites_count) . '</div>';
                        print '</div>';

                    } ?>

                    <?php
                    $i = 0;
                    foreach ($fetchedTweets->data as $post_data) {

                        $name = isset($post_data->user->name) ? $post_data->user->name : "";
                        $name_retweet = isset($post_data->retweeted_status->user->name) ? $post_data->retweeted_status->user->name : "";
                        $twitter_name = isset($post_data->user->screen_name) ? $post_data->user->screen_name : "";
                        $screen_name_retweet = isset($post_data->retweeted_status->user->screen_name) ? $post_data->retweeted_status->user->screen_name : "";
                        $in_reply_screen_name = isset($post_data->entities->user_mentions[0]->screen_name) ? $post_data->entities->user_mentions[0]->screen_name : "";
                        $protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
                        $not_protocol = !isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';

                        $permalink = $protocol . 'twitter.com/' . $twitter_name . '/status/' . $post_data->user->id_str;
                        $user_permalink = $protocol . 'twitter.com/' . $twitter_name;

                        $user_retweet_permalink = $protocol . 'twitter.com/' . $screen_name_retweet;


                        $in_reply_permalink = $protocol . 'twitter.com/' . $in_reply_screen_name;

                        //  $widget_type_for_videos = $post_data->widget_type_for_videos;

                        /* Alternative image sizes method: http://dev.twitter.com/doc/get/users/profile_image/:screen_name */
                        $image = isset($post_data->user->profile_image_url_https) ? $post_data->user->profile_image_url_https : "";

                        $image_retweet = isset($post_data->retweeted_status->user->profile_image_url_https) ? $post_data->retweeted_status->user->profile_image_url_https : "";

                        //  $image = str_replace($not_protocol, $protocol, $image);

                        // Need to get time in Unix format.
                        $times = isset($post_data->created_at) ? $post_data->created_at : "";
                        // tied to date function
                        $feed_type = 'twitter';
                        // call our function to get the date
                        $fts_date_time = $this->fts_custom_date($times, $feed_type);

                        $id = isset($post_data->id) ? $post_data->id : "";

                        // the retweet count works for posts and retweets
                        $retweet_count = isset($post_data->retweet_count) ? $post_data->retweet_count : "";

                        // the favorites count needs to be switched up for retweets
                        if (empty($post_data->retweeted_status->favorite_count)) {
                            $favorite_count = $post_data->favorite_count;
                        } else {
                            $favorite_count = $post_data->retweeted_status->favorite_count;
                        }

                        $fts_twitter_full_width = get_option('twitter_full_width');
                        $fts_dynamic_name = isset($fts_dynamic_name) ? $fts_dynamic_name : ''; ?>
                        <div class="fts-tweeter-wrap <?php echo $fts_dynamic_name; ?>">
                            <div class="tweeter-info">

                                <?php if ($fts_twitter_full_width !== 'yes') { ?>
                                    <div class="fts-twitter-image"> <?php
                                        if (!isset($post_data->retweeted_status)) { ?>
                                            <a href="<?php print $user_permalink; ?>" target="_blank" class="black"><img class="twitter-image" src="<?php print $image ?>" alt="<?php print $name ?>"/></a>
                                        <?php } else { ?>
                                            <a href="<?php print $user_retweet_permalink; ?>" target="_blank" class="black"><img class="twitter-image" src="<?php print $image_retweet ?>" alt="<?php print $name_retweet ?>"/></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                                <div class="<?php if ($fts_twitter_full_width == 'yes') { ?>fts-twitter-full-width<?php } else { ?>right<?php } ?>">
                                    <div class="uppercase bold">

                                        <?php if ($fts_twitter_full_width !== 'yes' && !isset($post_data->retweeted_status) && empty($post_data->in_reply_to_user_id)) { ?>
                                            <a href="<?php print $user_permalink ?>" target="_blank" class="fts-twitter-full-name"><?php print $post_data->user->name; ?></a>
                                            <a href="<?php print $user_permalink ?>" target="_blank" class="fts-twitter-at-name">@<?php print $twitter_name ?></a>
                                        <?php } else {

                                            if (empty($post_data->in_reply_to_user_id)) { ?>
                                                <a href="<?php print $user_permalink ?>" target="_blank" class="fts-twitter-at-name"><?php print $post_data->user->name; ?> <?php echo _e('Retweeted', 'feed-them-social'); ?> <strong>&middot;</strong></a>
                                                <a href="<?php print $user_retweet_permalink ?>" target="_blank" class="fts-twitter-full-name"><?php print $name_retweet; ?></a>
                                                <a href="<?php print $user_retweet_permalink ?>" target="_blank" class="fts-twitter-at-name">@<?php print $screen_name_retweet ?></a>
                                            <?php } else { ?>
                                                <a href="<?php print $in_reply_permalink ?>" target="_blank" class="fts-twitter-at-name"><?php echo _e('In reply to', 'feed-them-social'); ?> <?php echo $post_data->entities->user_mentions[0]->name; ?> </a>
                                            <?php } ?>
                                        <?php } ?>

                                    </div>
                                    <span class="time"><a href="<?php print $user_permalink; ?>" target="_blank"><?php print $fts_date_time ?></a></span><br/>
                                        <span class="fts-twitter-text"><?php print $this->fts_twitter_description($post_data); ?>
                                            <div class="fts-twitter-caption">
                                                <a href="<?php print $user_permalink; ?>" class="fts-view-on-twitter-link" target="_blank"><?php echo _e('View on Twitter', 'feed-them-social'); ?></a>
                                            </div>
                                        </span>

                                    <?php

                                    $twitter_video_reg = isset($post_data->extended_entities->media[0]->type) && $post_data->extended_entities->media[0]->type == 'video';
                                    $twitter_video_extended = isset($post_data->extended_entities->media[0]->type) && $post_data->extended_entities->media[0]->type == 'video';
                                    $twitter_video_retweeted = isset($post_data->retweeted_status->extended_entities->media[0]->type) && $post_data->retweeted_status->extended_entities->media[0]->type == 'video';
                                    if ($twitter_video_reg || $twitter_video_extended || $twitter_video_retweeted) {

                                        $twitter_is_video_allowed = get_option('twitter_allow_videos');
                                        $twitter_allow_videos = !empty($twitter_is_video_allowed) ? $twitter_is_video_allowed : 'yes';
                                        if ($twitter_allow_videos !== 'no') {
                                            //Print our video if one is available
                                            print $this->fts_twitter_load_videos($post_data);
                                        }
                                    } else {
                                        //Print our image if one is available
                                        print $this->fts_twitter_image($post_data, $popup);
                                    }

                                    ?>
                                </div>
                                <div class="fts-twitter-reply-wrap <?php if ($fts_twitter_full_width == 'yes') { ?>fts-twitter-full-width<?php } else { ?>fts-twitter-no-margin-left<?php } ?>">

                                    <?php
                                    // twitter permalink per post
                                    print $this->fts_twitter_permalink($post_data);
                                    ?>

                                    <div class="fts-tweet-others-right">
                                        <?php print $this->fts_twitter_retweet($post_data) ?>
                                        <?php print $this->fts_twitter_favorite($post_data) ?>

                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <?php $i++;
                        if ($i == $numTweets) break;
                    } // endforeach;

                    ?>
                    <div class="clear"></div>
                </div>
                <?php if ($twitter_height !== 'auto' && empty($twitter_height) == NULL) { ?>
                    <script>
                        // this makes it so the page does not scroll if you reach the end of scroll bar or go back to top
                        jQuery.fn.isolatedScrollTwitter = function () {
                            this.bind('mousewheel DOMMouseScroll', function (e) {
                                var delta = e.wheelDelta || (e.originalEvent && e.originalEvent.wheelDelta) || -e.detail,
                                    bottomOverflow = this.scrollTop + jQuery(this).outerHeight() - this.scrollHeight >= 0,
                                    topOverflow = this.scrollTop <= 0;
                                if ((delta < 0 && bottomOverflow) || (delta > 0 && topOverflow)) {
                                    e.preventDefault();
                                }
                            });
                            return this;
                        };
                        jQuery('.fts-twitter-scrollable').isolatedScrollTwitter();
                    </script>
                <?php } ?>
                <?php
            }// END IF $fetchedTweets
        }//END ELSE
        //******************
        // SOCIAL BUTTON
        //******************
        if (isset($twitter_show_follow_btn) && $twitter_show_follow_btn == 'yes' && $twitter_show_follow_btn_where == 'twitter-follow-below' && $twitter_name !== '') {
            echo '<div class="twitter-social-btn-bottom">';
            $this->social_follow_button('twitter', $twitter_name);
            echo '</div>';
        }
        //  echo'<pre>';
        //  print_r($fetchedTweets);
        //  echo'</pre>';

        return ob_get_clean();
    }

    /**
     * Random String generator
     *
     * @param int $length
     * @return string
     * @since 1.9.6
     */
    function rand_string_twitter($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}// FTS_Twitter_Feed END CLASS
?>