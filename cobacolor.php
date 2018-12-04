<?php 

/** 
 * @package Color
 */

 /*

Plugin name: Coba Color
Plugin URI: 
Description: coba
Author URI: http://www.google.com
License: GPLv2

 */

add_action('admin_menu', 'awesome_page_create');
function awesome_page_create() {
    $page_title = 'Test Setting';
    $menu_title = 'Ganti Warna';
    $capability = 'edit_posts';
    $menu_slug = 'awesome_page';
    $function = 'my_awesome_page_display';
    $icon_url = '';
    $position = 24;

    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}


function my_awesome_page_display() {
    if (isset($_POST['awesome_text'])) {
        $value = $_POST['awesome_text'];
        update_option('awesome_text', $value);
    }

    $value = get_option('awesome_text', 'hey-ho');
    var_dump($value);

    include 'admin-setting.php';
}

// add_action('admin_enqueue_scripts', 'mw_enqueue_color_picker' );
// function mw_enqueue_color_picker( $hook_suffix ) {
//     // first check that $hook_suffix is appropriate for your admin page
//     wp_enqueue_style( 'wp-color-picker' );
//     wp_enqueue_script( 'my-script-handle', plugins_url('nana.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
//     //wp_enqueue_script( 'custom', get_template_directory_uri() .'/js/nana.js', array('wp-color-picker'), '1.0', TRUE);
// }

add_action( 'admin_enqueue_scripts', 'wptuts_add_color_picker' );
function wptuts_add_color_picker( $hook ) {
 
    if( is_admin() ) { 
        // Add the color picker css file       
        wp_enqueue_style( 'wp-color-picker' ); 
         
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'custom-script-handle', plugins_url( 'nana.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 
    }
}