var vine_logo_size = jQuery("input#vine_logo_size").val();
var show_text = jQuery("select#show_text").val();
var show_vine_logo = jQuery("select#show_vine_logo").val();
if (vine_logo_size) {
	var vine_logo_size = ' vine_logo_size=' + jQuery("input#vine_logo_size").val();
} else {
	var vine_logo_size = '';
}
if (show_text) {
	var show_text = ' show_text=' + jQuery("select#show_text").val();
} else {
	var show_text = '';
}
if (show_vine_logo) {
	var show_vine_logo = ' show_vine_logo=' + jQuery("select#show_vine_logo").val();
} else {
	var show_vine_logo = '';
}
var final_vine_shorcode = '[fts_vine' + vine_id + vine_maxwidth + space_between_photos + round_thumb_corner_size + show_text + vine_logo_size + show_vine_logo + ']';