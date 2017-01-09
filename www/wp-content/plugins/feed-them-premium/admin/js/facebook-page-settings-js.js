var fb_page_title_option = ' title=' + jQuery("select#fb_page_title_option").val();
var fb_page_title_align = jQuery("select#fb_page_title_align").val();
var fb_page_description_option = ' description=' + jQuery("select#fb_page_description_option").val();
var facebook_height = jQuery("input#facebook_page_height").val();
var load_more_option = jQuery("select#fb_load_more_option").val();
var load_more_posts_style = jQuery("select#fb_load_more_style").val();
var facebook_grid = jQuery("select#fb-grid-option").val();
var facebook_grid_colmn_width = jQuery("input#facebook_grid_colmn_width").val();
var facebook_grid_space_between_posts = jQuery("input#facebook_grid_space_between_posts").val();
var facebook_popup = jQuery("select#facebook_popup").val();
var center_container = jQuery("select#fts-slicker-facebook-container-position-custom").val();
var image_stack_animation = jQuery("select#fts-slicker-facebook-container-animation-custom").val();
var fb_page_word_count_option_check = jQuery("input#fb_page_word_count_option").val();
// fb videos
var fts_play_btn = jQuery("select#facebook_show_video_button").val();
var fts_play_btn_size = jQuery("input#facebook_size_video_play_btn").val();
var fts_play_btn_visible = jQuery("select#facebook_show_video_button_in_front").val();
var fts_images_align = jQuery("input#facebook_video_align_images").val();
// fb like box
var fts_hide_like_option = jQuery("select#fb_hide_like_box_button").val();
var fts_like_option_align = jQuery("select#fb_align_likebox").val();
// fb loadmore button styles
var fts_loadmore_button_width = jQuery("input#loadmore_button_width").val();
var fts_loadmore_btn_margin = jQuery("input#loadmore_button_margin").val();
if (fts_play_btn !== '') {
	var fts_play_btn = ' play_btn=' + jQuery("select#facebook_show_video_button").val();
} else {
	var fts_play_btn = '';
}
if (fts_play_btn_size !== '') {
	var fts_play_btn_size = ' play_btn_size=' + jQuery("input#facebook_size_video_play_btn").val();
} else {
	var fts_play_btn_size = '';
}
if (fts_play_btn_visible !== '') {
	var fts_play_btn_visible = ' play_btn_visible=' + jQuery("select#facebook_show_video_button_in_front").val();
} else {
	var fts_play_btn_visible = '';
}
if (fts_images_align !== '') {
	var fts_images_align = ' images_align=' + jQuery("input#facebook_video_align_images").val();
} else {
	var fts_images_align = '';
}
if (fts_hide_like_option !== '') {
	var fts_hide_like_option = ' hide_like_option=' + jQuery("select#fb_hide_like_box_button").val();
} else {
	var fts_hide_like_option = '';
}
if (fts_like_option_align !== 'left') {
	var fts_like_option_align = ' like_option_align=' + jQuery("select#fb_align_likebox").val();
} else {
	var fts_like_option_align = '';
}
if (fts_loadmore_button_width !== '') {
	var fts_loadmore_button_width = ' loadmore_btn_maxwidth=' + jQuery("input#loadmore_button_width").val();
} else {
	var fts_loadmore_button_width = '';
}
if (fts_loadmore_btn_margin !== '') {
	var fts_loadmore_btn_margin = ' loadmore_btn_margin=' + jQuery("input#loadmore_button_margin").val();
} else {
	var fts_loadmore_btn_margin = '';
}
if (fts_images_align !== 'left') {
	var fts_images_align = ' images_align=' + jQuery("select#facebook_video_align_images").val();
} else {
	var fts_images_align = '';
}
if (fb_page_word_count_option_check !== '') {
	var fb_page_word_count_option = ' words=' + jQuery("input#fb_page_word_count_option").val();
} else {
	var fb_page_word_count_option = ' words=45';
}
if (facebook_height) {
	var facebook_height_final = ' height=' + jQuery("input#facebook_page_height").val();
} else {
	var facebook_height_final = '';
}
if (facebook_grid == 'yes') {
	var facebook_grid = ' grid=' + jQuery("select#fb-grid-option").val();
} else {
	var facebook_grid = '';
}
if (facebook_grid_colmn_width && facebook_grid) {
	var facebook_grid_colmn_width = ' colmn_width=' + jQuery("input#facebook_grid_colmn_width").val();
} else {
	var facebook_grid_colmn_width = '';
}
if (facebook_grid_space_between_posts && facebook_grid) {
	var facebook_grid_space_between_posts = ' space_between_posts=' + jQuery("input#facebook_grid_space_between_posts").val();
} else {
	var facebook_grid_space_between_posts = '';
}
if (center_container == 'yes') {
	var center_container = ' center_container=' + jQuery("select#fts-slicker-facebook-container-position-custom").val();
} else {
	var center_container = '';
}
if (image_stack_animation == 'yes') {
	var image_stack_animation = ' image_stack_animation=' + jQuery("select#fts-slicker-facebook-container-animation-custom").val();
} else {
	var image_stack_animation = '';
}
if (facebook_popup == 'yes') {
	var facebook_popup = ' popup=' + jQuery("select#facebook_popup").val();
} else {
	var facebook_popup = '';
}
if (load_more_option == 'no') {
	var load_more_posts_style_final = '';
} else {
	var load_more_posts_style_final = ' loadmore=' + jQuery("select#fb_load_more_style").val();
}
if (fb_page_title_align == 'left') {
	var fb_page_title_align = '';
} else {
	var fb_page_title_align = ' title_align=' + jQuery("select#fb_page_title_align").val();
}

var video_album = 'yes';
var fb_position_likebox = ' show_follow_btn_where=' + jQuery("select#fb_position_likebox").val();

var like_box_width = jQuery("input#like_box_width").val();
if (like_box_width == '') {
	var like_box_width = '';
} else {
	var like_box_width = ' like_box_width=' + like_box_width;
}

////////////////////////////////////////////////////////
///////////////////////////////////////////////////////
/////////////// Carousel/Slider JS ///////////////////
/////////////////////////////////////////////////////
////////////////////////////////////////////////////

var slider = jQuery("select#fts-slider").val();
if (slider == 'no') {
	var slider = '';
} else {
	var slider = ' slider=' + slider;
}

var scrollhorz_or_carousel = jQuery("select#scrollhorz_or_carousel").val();
if (jQuery("select#fts-slider").val() == 'no') {
	var scrollhorz_or_carousel = '';
} else {
	var scrollhorz_or_carousel = ' scrollhorz_or_carousel=' + scrollhorz_or_carousel;
}

var slides_visible = jQuery("input#slides_visible").val();
if (slides_visible == '' && slider !== 'no') {
	var slides_visible = '';
} else {
	var slides_visible = ' slides_visible=' + slides_visible;
}

var slider_spacing = jQuery("input#slider_spacing").val();
if (slider_spacing == '' && slider !== 'no') {
	var slider_spacing = '';
} else {
	var slider_spacing = ' slider_spacing=' + slider_spacing;
}

var slider_margin = jQuery("input#slider_margin").val();
if (slider_margin == '' && slider !== 'no') {
	var slider_margin = '';
} else {
	var slider_margin = ' slider_margin="' + slider_margin + '"';
}

var slider_speed = jQuery("input#slider_speed").val();
if (slider_speed == '' && slider !== 'no') {
	var slider_speed = '';
} else {
	var slider_speed = ' slider_speed=' + slider_speed;
}

var slider_timeout = jQuery("input#slider_timeout").val();
if (slider_timeout == '' && slider !== 'no') {
	var slider_timeout = '';
} else {
	var slider_timeout = ' slider_timeout=' + slider_timeout;
}

var slider_controls = jQuery("select#slider_controls").val();
if (slider !== 'no') {
	var slider_controls = '';
} else {
	var slider_controls = ' slider_controls=' + slider_controls;
}

var slider_controls_text_color = jQuery("input#slider_controls_text_color").val();
if (slider_controls_text_color == '' && slider !== 'no') {
	var slider_controls_text_color = '';
} else {
	var slider_controls_text_color = ' slider_controls_text_color=' + slider_controls_text_color;
}

var slider_controls_bar_color =  jQuery("input#slider_controls_bar_color").val();
if (slider_controls_bar_color == '' && slider !== 'no') {
	var slider_controls_bar_color = '';
} else {
	var slider_controls_bar_color = ' slider_controls_bar_color=' + slider_controls_bar_color;
}

var slider_controls_width = jQuery("input#slider_controls_width").val();
if (slider_controls_width == '' && slider !== 'no') {
	var slider_controls_width = '';
} else {
	var slider_controls_width = ' slider_controls_width=' + slider_controls_width;
}