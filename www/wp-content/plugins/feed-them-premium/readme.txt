=== Feed Them Social Premium Extension ===
Contributors: SlickRemix
Tags:  social, social plugin, hashtags, facebook hashtags facebook, facebook plugin, facebook group, facebook page, twitter, twitter plugin, instagram, instagram plugin, youtube, youtube plugin, feed me social, feed, shortcode, slickremix, pinterest
Requires at least: 3.6.0
Tested up to: 4.7
Stable tag: 1.6.6
License: GPLv2 or later

Easily add Instagram, Facebook Group, Facebook Page, Twitter, YouTube and now Pinterest Feeds to any page, post or widget!

== Description ==
Easily add Instagram, Facebook Group, Facebook Page, Twitter, YouTube and now Pinterest Feeds to any page, post or widget!

= Features include the following: =
  * Add a single or multiple feeds to any post or page!
  * Easily Generate all the shortcodes you need for any feed!
  * Responsive social feeds! 
  * With <a href="http://www.slickremix.com/downloads/feed-them-social-premium-extension/" target="_blank">Premium Extension</a> you can set how many posts, pictures, or tweets for each individual social feed!
  * …and much more!
   
== Installation ==
Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.

== Changelog ==
= Version 1.6.6 Thursday, December 15th, 2016 =
 * Updated: Got the updater part of plugin updated and showing error/success messages now.

= Version 1.6.5 Friday, December 9th, 2016 =
  * NEW: YouTube: Created functions for some repetive calls. Should speed up page rendering too.
  * NEW: Cleaned up shortcode functions for new settings page shortcode generator backend.

= Version 1.6.5 Friday, December 9th, 2016 =
  * NEW: YouTube: Created functions for some repetive calls. Should speed up page rendering too.
  * NEW: Cleaned up shortcode functions for new settings page shortcode generator backend.

= Version 1.6.4 Friday, September 30th, 2016 =
  * NEW: Twitter: Add cover_photo=yes and or stats_bar=yes to your Twitter shortcode to see the new additions. [See Example](http://feedthemsocial.com/twitter-feed-demo/).
  * NEW: Instagram: Add masonry=yes to use masonry.
  * FIXED: YouTube: Truncated js to speed up load time and also stop some themes from adding p tags around spacing in script on page.

= Version 1.6.3 Tuesday, August 9th, 2016 =
  * FIXED: Instagram: Load More button option still adding to shortcode if selecting no.

= Version 1.6.2 Monday, August 8th, 2016 =
  * FIXED: updater back out of namespace so STD class works.
  * ADDED: show comments in NEW popup!

= Version 1.6.1 Tuesday, August 2th, 2016 =
  * UPDATED: The plugin updater.
  * FIXED: Updates will now show Changelog for Premium plugin.
  * ADDED: Messages to check for plugin license key activated and/or empty.

= Version 1.6.0 Thursday, July 6th, 2016 =
  * NEW: Facebook: New shortcode options to Align the title, show the like box or buttons above the feed, below the title or at the bottom. You can also adjust the length of the like box too for each feed.
  * NEW: [Feed Them Carousel Premium](http://www.slickremix.com/downloads/feed-them-carousel-premium/) for Feed Them Social

= Version 1.5.9 Tuesday, June 21st, 2016 =
  * NEW: Instagram: Photos and Videos in popup now available.
  * FIXED: Updater Issue.

= Version 1.5.8 =
  * Compatibility: With new Feed Them Facebook. (just Facebook feeds)

= Version 1.5.6 Tuesday, April 27th, 2016 =
  * NEW: All functions are now properly documented using PHPDoc formatting.
  * FIXED: YouTube: Missing underscore when outputting the shortcode on settings page.
  * FIXED: Facebook: Undefined notice in popup if no content text was found.
  * ADDED: Support and Rate Plugin links to FTS for the plugins.php page.

= Version 1.5.5 Tuesday, April 4th, 2016 =
  * FIXED: UPDATER: Transient class need to be backed out in order to work and not throw error.
  * FIXED: YouTube: Videos will show if you have an SSL(https) on your website now too.

= Version 1.5.4 Wednesday, December 9th, 2015 =
  * FIXED: ALL FEEDS: Shortcodes names had to be fixed due to a change in WordPress Core 4.4. (You must regenerate all FTS Shortcodes in settings page.)
  
= Version 1.5.3 Friday, September 18th, 2015 =
  * NEW: Licensing update
  * NEW: Misc Cleanup
  * FIXED: Facebook: Fixed blank image in Events feed if no image in place for event.
		
= Version 1.5.2 Monday, August 2nd, 2015 =
  * NEW: Twitter: Now you can search #hashtag, @person, or single words. For example, weather or weather-channel. No spaces allowed.
		* CLEANED: Minifed all CSS scripts.
		
= Version 1.5.1 Wednesday, July 8th, 2015 =
  * NEW: Facebook Video Feed. Now you can add a feed of your Facebook page's uploaded videos, many options! Only Works with Facebook Pages. Not user accounts or groups etc. See example here: [http://feedthemsocial.com/facebook-videos-demo/](hhttp://feedthemsocial.com/facebook-videos-demo/)
  * NEW: Facebook: Type 0 for the words= option and the description for each post will disappear.
  * NEW: Facebook: Hide the Like Button or Box if you are using more than one feed on a page.
  * NEW: Facebook: Align the Like Button or Box left, center or right.
  * NEW: Facebook: Set the Max Width for the Load More button.
  * NEW: Facebook: Set the margin for the Load More button. Setting this to 0 will align the button in the center.
		
= Version 1.5.0 Monday, June 29th, 2015 =
 * NEW: Vine Feed. Now you can add a gallery of Vine videos with thumbnails. See example here: [http://feedthemsocial.com/vine-demo/](http://feedthemsocial.com/vine-demo/)
	
= Version 1.4.9 Friday, June 19th, 2015 =
 * CLEANED: Namespacing and Classification for rest of files.
 * NEW: YouTube: Fixed outdated .live action, now using .on for opening video in popup and closing.

= Version 1.4.8 Saturday, May 16th, 2015 =
 * NEW: Instagram Load More Options. Includes loadmore button, or if you set the height of the Instagram feed you can choose Autoscroll so when the scrollbar reaches the bottom it will automatically load the next set of images.
 * NEW: YouTube: New cache method using transient instead of cache folder.
	
= Version 1.4.7 Friday, May 8th, 2015 =
 * NEW: YouTube: Support for Channels, Channel Playlists and Playlist IDs.
 * NEW: Truncated and combined files to speed up HTTP requests.
 * NOTICE: The old Custom widgets are now depreciated because our settings page has way more options. Please generate a shortcode from the settings page and add that to a Text Widget instead.
	
= Version 1.4.6 Thursday, April 30th, 2015 =
 * FIXED: License Updater.
 
= Version 1.4.5 Thursday, April 23rd, 2015 =
 * ADDED: Youtube: Fixed out of date API calls. Now running on API v3.0
 * NEW: Youtube: If you have large_vid set to yes the thumbnails with videos below will be offset by one as to not duplicate the first video in the list.
 * NEW: Youtube: The video popup is now larger.
 * NEW: Youtube: When choosing 1 vid per row now Every Video will get the title and description.
 * NEW: Youtube: Converted Feed from using JS method to PHP now.
 
= Version 1.4.4 Thursday, April 9th, 2015 =
 * ADDED: Youtube: Now has a follow button option. You can find it on the New YouTube Options page.

= Version 1.4.3 Thursday, March 12th, 2014 =
 * FIXED: Missing plugin license menu item from the plugins menu
 
= Version 1.4.2 Tuesday, March 10th, 2014 =
 * FIXED: Pinterest Feed now pull from API.
 * NEW: Pinterest: Get Pins from a Board or your most recent Pins!

= Version 1.4.1 Monday, December 29th, 2014 =
 * FIXED: Now large image shows in popup when clicking ‘View Photo’ on Facebook Album Covers.
 * SETTINGS PAGE: Fixed grid_column=yes not showing up in shortcode generator.
 * SETTINGS PAGE: center_container and image_stack_animation now work proper in shortcode generator.

= Version 1.4.0 Thursday, December 18th, 2014 =
 * FIXED: Cleaned up additional php notices
 * UPDATED: Licensing system.
 
= Version 1.3.9 Saturday, December 13th, 2014 =
 * FIXED: Added Stackanimation and Center Container options for Facebook Grid Feeds
 * FIXED: popup=yes attribute not being added to generated Facebook Photo albums and Covers.
 * FIXED: Select options for center_container=no and image_stack_animation=no attribute not being added to generated Facebook Pages, Groups, Events and hashtags.
 
= Version 1.3.8 Friday, December 5th, 2014 =
 * NEW: Remove the Twitter profile photo on every tweet. Look at the [example on this page's sidebar](http://feedthemsocial.com/twitter-feed-demo/).

= Version 1.3.7 Tuesday, November 25th, 2014 =
 * NEW: Twitter Popup for images.
 * NEW: Twitter Settings options page.
 * FIXED: CSS bugs
 
= Version 1.3.6 Friday, November 21st, 2014 =
 * NEW: Facebook Popup for images.
 * NEW: Facebook Grid Format options.
 * NEW: Facebook Settings options page.

= Version 1.3.5 Friday, November 7th, 2014 =
 * FIXED: Pinterest Simple dom errors when using nexgen gallery or lightbox plus plugin. Those plugins are calling the same function for dom scraping.
 * NEW: Instagram Popup for images
 * CLEANED: Unneeded CSS throughout all feeds.
 
= Version 1.3.4 Friday, October 31st, 2014 =
 * FIXED: Twitter height output in shortcode

= Version 1.3.3 Saturday, October 18th, 2014 =
 * NEW: Load More option for Facebook Feed
 * FIXED: Rename a Pinterest function to not cause fatal error with Lightbox plugin

= Version 1.3.2 Thursday, September 24th, 2014 =
 * UPDATED: Functions to work with the New Additions in our update of Feed Them Social 1.5.5
 * FIXED: CSS for Youtube and Pinterest
 
= Version 1.3.1 Wednesday, September 3rd, 2014 =
 * UPDATED: FTS framework to now work on non-root installs. **NOTE** Feed Them Social (Free) and FTS Bar will also be getting this update.
 
= Version 1.3.0 Sunday, August 31st, 2014 =
 * NEW: functionality for brand new [FTS Bar Extension.](http://www.slickremix.com/downloads/fts-bar/)  **NOTE** Requires Feed Them Social (Free Version) and Feed Them Social Premium extension.
 * FIXED: Pinterest feed now caching properly and uses new wp_remote_fopen method.
 * FIXED: CSS edits for pinterest and youtube.
 * ADDED: cache folder to Pinterest and Youtube to prevent no touch error.

= Version 1.2.9 Saturday, August 16th, 2014 =
 * NEW: Multi language setup. Please visit [http://glotpress.slickremix.com/projects/](http://glotpress.slickremix.com/projects/) to help translate.
 
= Version 1.2.8 Monday, July 14th, 2014 =
 * FIXED: Widgets and shortcodes for Youtube and Pinterest are now working again.
 
= Version 1.2.7 Thursday, July 3rd, 2014 =
 * FIXED: Added check for PHP 5.3 to stop Fatal Error on activation.
 
= Version 1.2.6 June 13th, 2014 =
 * FIXED: EDD License Manager error.
 
= Version 1.2.5 June 11th, 2014 =
 * FIXED: License Manager. If you don't have a premium version for this plugin then you don't need to worry about updating to this version.
 
= Version 1.2.4 March 20th, 2014 =
 * FIXED: Facebook Page shortcode now shows the words=45 by default or whatever number you choose.

= Version 1.2.3 February 15th, 2014 =
 * FIXED: Instagram post count not spitting out correctly.
 * FIXED: Facebook Event Feed widget has now been created.
 * ADDED: Facebook Page now can be sorted by pages posts only!
 
= Version 1.2.2 February 11th, 2014 =
 * ADDED: Facebook Event Feed.

= Version 1.2.1 November 13th, 2013 =
 * FIXED: More Pintrest conflicting issues with NextGen Gallery plugin. Fixes Fatal Error on activation.

= Version 1.2.0 October 16th, 2013 =
 * FIX: Pintrest conflicting issue with NextGen Gallery plugin.

= Version 1.1.9 September 15th, 2013 =
 * MAJOR FIX: Removed Top Quark plugin update status from feed-them-premium.php as it is added in our plugin automatically when uploaded now on slickremix.com. This was causing text from the feed-them-premium.php to be written on all the pages. Not good. All fixed now.

= Version 1.1.8 September 15th, 2013 =
 * FIXED: Changed function name 'file_get_html' for Pinterest feed as it was causing a conflict with the Lightbox Plus wordpress plugin. Thanks to [ragstein](http://www.slickremix.com/support-forum/wordpress-plugins-group3/feed-them-social-forum9/fatal-error-when-trying-to-activate-thread135/) for pointing this out on our support forum.

= Version 1.1.7 September 9th, 2013 =
 * ADDED: Facebook Page feed. Also allows you to choose to add a title or description of your Facebook page. Widget included too.

= Version 1.1.6 September 1st, 2013 =
 * MAJOR FIX: Facebook group feed had some out of order divs causing formatting issues that were added in 1.1.5 version, they have been adjusted now. This should fix the widget area as well.
 
= Version 1.1.5 August 12th, 2013 =
 * ADDED: Option to hide the Group Title or Description for Facebook Groups.
 
= Version 1.1.4 August 1st, 2013 =
 * ADDED: Pinterest Feed and Widgets

= Version 1.1.3 June 4rd, 2013 =
 * FIXED: Misc. YouTube style fixes for overlay in Chrome and widget style fixes for FireFox.

= Version 1.1.2 June 3rd, 2013 =
 * FIXED: Made a warning that all users must have free version installed and activated.

= Version 1.1.1 February 15th, 2013 =
 * NEW: Widget support for all feeds. You can now also paste shortcodes into a text widget and they will appear.

= Version 1.1.0 =
 * NEW: YouTube feed added to plugin! Includes Html 5 Pop-Up.

= Version 1.0.0 =
 * Initial Release

== Frequently Asked Questions ==

You can find answers to your questions, suggest a feed, or just drop us a line at our [Support Forum](http://www.slickremix.com/support-forum).

= Are there Extensions for this plugin? =

Yes. Currently we have [2 Premium Extension](http://www.slickremix.com/downloads/category/feed-them-social/).

== Screenshots ==
