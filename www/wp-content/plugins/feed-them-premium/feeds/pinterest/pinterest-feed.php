<?php
extract(shortcode_atts(array(
    'pinterest_name' => '',
    'board_id' => '',
    'boards_count' => '6',
    'pins_count' => '6',
    //type can equal 1 of 3 things; boards_list, single_board_pins, pins_from_user
    'type' => '',
), $atts));
?>