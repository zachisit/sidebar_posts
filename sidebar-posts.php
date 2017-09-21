<?php
/*
Plugin Name: Sidebar Posts
Description: Allows user to select up to six posts to show in sidebar
Author: Zach Smith
Version: 2.0.0
Author URI: http://www.zachis.it
*/

/**
 * create menu
 */
function sidebar_posts_create_menu() {
    //create new top-level menu
    add_menu_page('Sidebar Posts', 'Sidebar Posts Widget', 'administrator', __FILE__, 'sidebar_posts_settings_page' );

    //call register settings function
    add_action( 'admin_init', 'register_sidebar_posts_settings' );
}
add_action('admin_menu', 'sidebar_posts_create_menu');

/**
 * register our settings page
 */
function register_sidebar_posts_settings() {
    register_setting( 'sidebar-posts-settings-group', 'location_one_option' );
    register_setting( 'sidebar-posts-settings-group', 'location_two_option' );
    register_setting( 'sidebar-posts-settings-group', 'location_three_option' );
    register_setting( 'sidebar-posts-settings-group', 'location_four_option' );
    register_setting( 'sidebar-posts-settings-group', 'location_five_option' );
    register_setting( 'sidebar-posts-settings-group', 'location_six_option' );
    register_setting( 'sidebar-posts-settings-group', 'new_option_name' );
}

/**
 * load stylesheet for backend
 */
function sidebar_posts_admin_scripts() {
    wp_enqueue_style( 'backend_sidebar_posts_plugin_style', plugins_url( '/css/sidebar_posts_backend.css', __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'sidebar_posts_admin_scripts' );

/**
 * load stylesheet for frontend
 */
function sidebar_posts_frontend_scripts() {
    wp_enqueue_style( 'frontend_plugin_style', plugins_url( '/css/sidebar_posts_frontend.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'sidebar_posts_frontend_scripts' );

/**
 * register settings view
 */
function sidebar_posts_settings_page() {
    include 'view/settings.php';
}

/**
 * output all selections as a shortcode
 * client will put this shortcode into a widget
*/
function sidebar_posts_shortcode($atts){
    include 'view/frontend_widget.php';
}

add_shortcode( 'sidebar_posts', 'sidebar_posts_shortcode' );

/**
 * Show frontend widget
 * @param $dropdown_value
 */
function outputSidebarWidgetListItem ($dropdown_value) {
    $currentPage = get_the_ID();

    /*
     * if user is looking at an article that is same article selected
     * from the settings panel by admin, then show random article
     */
    if ($dropdown_value ==$currentPage) {
        $randomQueryArgs = [
            'meta_query' => [
                [
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS'
                ], //make sure we show posts only with featured images
            ],
            'post_type' => 'post',
            'orderby'   => 'rand',
            'posts_per_page' => 1,
        ];
        $theRandomQuery = new WP_Query( $randomQueryArgs );

        while ( $theRandomQuery->have_posts() ) : $theRandomQuery->the_post(); ?>
            <a href="<?=the_permalink($theRandomQuery->post_id) ?>" title="Read More about - <?=the_title()?>"><?=get_the_post_thumbnail( $theRandomQuery->post_id, 'medium-large' )?><div class="title_block"><h3><?=the_title()?></h3></div></a>
        <?php endwhile;
    } else { ?>
        <a href="<?=get_post_permalink($dropdown_value)?>" title="Read More about - <?=get_the_title($dropdown_value)?>"><?=get_the_post_thumbnail( $dropdown_value, 'medium-large' )?><div class="title_block"><h3><?=get_the_title($dropdown_value)?></h3></div></a>
    <?php }
}