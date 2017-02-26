<div class="wrap">    
    <div class="sola_t_header">
        <div class="sola_t_header_text">            
            <h2><?php _e('Sola Testimonials - Settings', 'sola_t'); ?></h2>
            <small><div class="help-block"><?php _e('Please ensure you have saved any changes before navigating to another tab', 'sola_t'); ?></div></small>
        </div>
    </div>
    <div class="sola_settings_body">
        <h2 class="nav-tab-wrapper">
            <a class="nav-tab <?php if(isset($_GET['tab']) && $_GET['tab'] == 'styles' || !isset($_GET['tab'])) { echo 'nav-tab-active'; } ?>" href="?post_type=testimonials&page=sola_t_settings&tab=styles"><?php _e('Styles', 'sola_t'); ?></a>
            <a class="nav-tab <?php if(isset($_GET['tab']) && $_GET['tab'] == 'shortcodes') { echo 'nav-tab-active'; } ?>" href="?post_type=testimonials&page=sola_t_settings&tab=shortcodes"><?php _e('Shortcodes', 'sola_t'); ?></a>
            <a class="nav-tab <?php if(isset($_GET['tab']) && $_GET['tab'] == 'options') { echo 'nav-tab-active'; } ?>" href="?post_type=testimonials&page=sola_t_settings&tab=options"><?php _e('Options', 'sola_t'); ?></a>
            <a class="nav-tab <?php if(isset($_GET['tab']) && $_GET['tab'] == 'forms') { echo 'nav-tab-active'; } ?>" href="?post_type=testimonials&page=sola_t_settings&tab=forms"><?php _e('Form Options', 'sola_t'); ?></a>
            <a class="nav-tab <?php if(isset($_GET['tab']) && $_GET['tab'] == 'slider') { echo 'nav-tab-active'; } ?>" href="?post_type=testimonials&page=sola_t_settings&tab=slider"><?php _e('Slider', 'sola_t'); ?></a>
            <?php if(function_exists('sola_t_pro_activate')){ ?>
            <a class="nav-tab <?php if(isset($_GET['tab']) && $_GET['tab'] == 'categories') { echo 'nav-tab-active'; } ?>" href="?post_type=testimonials&page=sola_t_settings&tab=categories"><?php _e('Categories', 'sola_t'); ?></a>
            <?php } ?>
            <?php do_action( 'sola_testimonials_settings_page_tabs' ); ?>
            <?php if (!function_exists('sola_t_register_pro')){ ?>
                <a class="nav-tab <?php if(isset($_GET['tab']) && $_GET['tab'] == 'upgrade') { echo 'nav-tab-active'; } ?>" href="?post_type=testimonials&page=sola_t_settings&tab=upgrade"><?php _e('Upgrade', 'sola_t'); ?></a>
            <?php } ?>
        </h2>
        <?php
        if(isset($_GET['tab'])){
            $tab = $_GET['tab'];
        } else {
            $tab = '';
        }
        echo '<table class="form-table">';

        $pages_array = array(
            array(
                'url' => 'options',
                'page' => 'settings/options.php'
            ),
            array(
                'url' => 'forms',
                'page' => 'settings/forms.php'
            ),
            array(
                'url' => 'shortcodes',
                'page' => 'settings/shortcodes.php'
            ),
            array(
                'url' => 'slider',
                'page' => 'settings/slider.php'
            ),
            array(
                'url' => 'upgrade',
                'page' => 'settings/upgrade.php'
            ),
            array(
                'url' => 'categories',
                'page' => 'settings/categories.php'
            ),
            array(
                'url' => 'styles',
                'page' => 'settings/styles.php'
            )

        );
        
        $settings_page_array = apply_filters( 'sola_t_settings_page_contents' , $pages_array );
        
        if( $tab == '' ){
            include 'settings/styles.php';
        } else {
            foreach( $settings_page_array as $page ){            
                if( $page['url'] == $tab ){
                    include $page['page'];
                }
            }
        }

        echo '</table>';
        include 'footer.php';
        ?>
    </div>
</div>




