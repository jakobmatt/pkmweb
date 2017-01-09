//START youtube//
// Instagram Super Gallery option
   jQuery('select#youtube-messages-selector').bind('change', function (e) { 
    if( jQuery('#youtube-messages-selector').val() == 'channelID') {
      jQuery('.youtube_name, .youtube_playlistID, .youtube_channelID2, .youtube_playlistID2, .youtube_name2').hide();
      jQuery('.youtube_channelID').show();
    }
    else if( jQuery('#youtube-messages-selector').val() == 'userPlaylist'){
      jQuery('.youtube_name, .youtube_channelID, .youtube_playlistID, .youtube_channelID, .youtube_channelID2').hide();
      jQuery('.youtube_playlistID2, .youtube_name2').show();
    }
    else if( jQuery('#youtube-messages-selector').val() == 'playlistID'){
      jQuery('.youtube_name, .youtube_channelID, .youtube_playlistID2, .youtube_name2').hide();
      jQuery('.youtube_playlistID, .youtube_channelID2').show();
    }
	else {
      jQuery('.youtube_name').show();
      jQuery('.youtube_playlistID, .youtube_channelID, .youtube_channelID2, .youtube_playlistID2, .youtube_name2').hide();
    }          
  });
  
  
jQuery('.youtube_first_video').hide();

jQuery('select#youtube_columns').change(function(){
	var youtube_columns_count = jQuery(this).val();
	
	if (youtube_columns_count == '1') {
		jQuery('.youtube_first_video').hide();
	}
	else	{
		jQuery('.youtube_first_video').show();
	}
});

function updateTextArea_youtube() {
	
	var youtube_vid_count = ' vid_count=' + jQuery("input#youtube_vid_count").val();
	var youtube_columns = ' vids_in_row=' + jQuery("select#youtube_columns").val();
	
	//check # of vids in row//
	var youtube_columns_count = jQuery('select#youtube_columns').val();
	
	if (youtube_columns_count == '1') {
		var youtube_first_video = '';
	}
	else	{
		var youtube_first_video = ' large_vid=' + jQuery("select#youtube_first_video").val();
	}
	
	
	
	//check if username feed type show error
	var youtube_name = jQuery('select#youtube-messages-selector').val();
	var username_check = jQuery("input#youtube_name").val();
	
	if (youtube_name == "username" & username_check == '') {
	  	 jQuery(".youtube_name").addClass('fts-empty-error');  
      	 jQuery("input#youtube_name").focus();
		 return false;
	}
	else if (youtube_name == "username" & username_check != '') {
	  	 jQuery(".youtube_name").removeClass('fts-empty-error');
		 var youtube_name = ' username=' + jQuery("input#youtube_name").val();
	}
	else	{
		var youtube_name = '';
	}
	
	
	
	
	//check if Channel ID feed type show error
	var youtube_channel_id = jQuery('select#youtube-messages-selector').val();
	var channel_id_check = jQuery("input#youtube_channelID").val();
	
	if (youtube_channel_id == "channelID" & channel_id_check == '') {
	  	 jQuery(".youtube_channelID").addClass('fts-empty-error');  
      	 jQuery("input#youtube_channelID").focus();
		 return false;
	}
	else if (youtube_channel_id == "channelID" & channel_id_check != '') {
	  	 jQuery(".youtube_channelID").removeClass('fts-empty-error');
		 var youtube_channelID = ' channel_id=' + jQuery("input#youtube_channelID").val();
	}
	else	{
		var youtube_channelID = '';
	}
	
	
	//check if Playlist ID feed type show error
	var youtube_playlist_id = jQuery('select#youtube-messages-selector').val();
	var playlist_id_check = jQuery("input#youtube_playlistID").val();
	var youtube_channelID2 = jQuery("input#youtube_channelID2").val();
	
	if (youtube_playlist_id == "playlistID" & playlist_id_check == '') {
	  	 jQuery(".youtube_playlistID").addClass('fts-empty-error');  
      	 jQuery("input#youtube_playlistID").focus();
		 return false;
	}
	else if (youtube_playlist_id == "playlistID" & playlist_id_check != '') {
	  	 jQuery(".youtube_playlistID2").removeClass('fts-empty-error');
		 var youtube_playlistID = ' playlist_id=' + jQuery("input#youtube_playlistID").val();
			if (youtube_channelID2 != '') {
			 var youtube_channelID2 = ' channel_id=' + jQuery("input#youtube_channelID2").val();
			}
			else {
				var youtube_channelID2 = '';
			}
	}
	else	{
		var youtube_playlistID = '';
		var youtube_channelID2 = '';
	}
	
	
	
	
	
	
	//check if Playlist ID feed type show error
	var youtube_playlist_id = jQuery('select#youtube-messages-selector').val();
	var playlist_id_check2 = jQuery("input#youtube_playlistID2").val();
	var youtube_name2 = jQuery("input#youtube_name2").val();
	
	if (youtube_playlist_id == "userPlaylist" & playlist_id_check2 == '') {
	  	 jQuery(".youtube_playlistID2").addClass('fts-empty-error');  
      	 jQuery("input#youtube_playlistID2").focus();
		 return false;
	}
	else if (youtube_playlist_id == "userPlaylist" & playlist_id_check2 != '') {
	  	 jQuery(".youtube_playlistID2").removeClass('fts-empty-error');
		 var youtube_playlistID2 = ' playlist_id=' + jQuery("input#youtube_playlistID2").val();
			if (youtube_name2 != '') {
			 var youtube_name2 = ' username_subscribe_btn=' + jQuery("input#youtube_name2").val();
			}
			else {
				var youtube_name2 = '';
			}
	}
	else	{
		var youtube_playlistID2 = '';
		var youtube_name2 = '';
	}
	
	
	

	var final_youtube_shorcode = '[fts_youtube' + youtube_name + youtube_playlistID + youtube_playlistID2 + youtube_name2 + youtube_channelID + youtube_channelID2 + youtube_vid_count + youtube_columns + youtube_first_video + ']';

	jQuery('.youtube-final-shortcode').val(final_youtube_shorcode);
	
	jQuery('.youtube-shortcode-form .final-shortcode-textarea').slideDown();
}
//END youtube//