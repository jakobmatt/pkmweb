<?php
/************************************************
 * Function file for Feed Them Social plugin
 ************************************************/
if (isset($_GET['page']) && $_GET['page'] == 'feed-them-settings-page') {
    add_action('admin_enqueue_scripts', 'feed_them_premium_settings');

    /**
     * Feed Them Premium Settings
     *
     * @since 1.5.6
     */
    function feed_them_premium_settings()
    {
        wp_register_style('feed_them__premium_settings_css', plugins_url('admin/css/premium-settings-page.css', dirname(__FILE__)));
        wp_enqueue_style('feed_them__premium_settings_css');
    }
}