var load_more_option = jQuery("select#instagram_load_more_option").val();
var load_more_posts_style = jQuery("select#instgram_load_more_style").val();
if (load_more_option == 'no') { var load_more_posts_style_final = ''; } else { var load_more_posts_style_final = ' loadmore=' + jQuery("select#instagram_load_more_style").val();}
if (jQuery("select#instagram-custom-gallery").val() == "no") {
	var final_instagram_shorcode = '[fts_instagram' + instagram_id + pics_count_final + instagram_feed_type + instagram_popup_option + load_more_posts_style_final + instagram_page_height_final + ']';
} else {
	var final_instagram_shorcode = '[fts_instagram' + instagram_id + pics_count_final + super_gallery + image_size + icon_size + space_between_photos + hide_date_likes_comments + center_container + image_stack_animation + instagram_feed_type + instagram_popup_option + load_more_posts_style_final + instagram_page_height_final + ']';
}