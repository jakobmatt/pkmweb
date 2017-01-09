var boards_count = ' boards_count=' + jQuery("input#boards_count").val();
if (boards_count == " boards_count=") {
	var boards_count_final = '';
}
if (boards_count != " boards_count=") {
	var boards_count_final = boards_count;
}
var pins_count = ' pins_count=' + jQuery("input#pins_count").val();
if (pins_count == " pins_count=") {
	var pins_count_final = '';
}
if (pins_count != " pins_count=") {
	var pins_count_final = pins_count;
}
//Generate Pinterest Shortcode
if (jQuery("select#pinterest-messages-selector").val() == "pins_from_user") {
	var final_pinterest_shorcode = '[fts_pinterest' + pinterest_name + pins_count_final + type_final + ']';
} else if (jQuery("select#pinterest-messages-selector").val() == "single_board_pins") {
	var final_pinterest_shorcode = '[fts_pinterest' + pinterest_name + pinterest_board_name_final + pins_count_final + type_final + ']';
} else {
	var final_pinterest_shorcode = '[fts_pinterest' + pinterest_name + boards_count_final + type_final + ']';
}