<?php
/*
  Plugin Name: Form Pop-up
  Description: Form Pop-up for prestation asks
  Version: 1.0
  Author: Vanessa Lagouy
  Author URI: https://cv-vanessa-lagouy.web.app
 */

 /* ##############################
Creation of the menu into the back-office
############################## */

// Add menu at the loading of the admin menu
 add_action('admin_menu','fp_admin_menu');

// --- Add menu 1st level --- 
function fp_admin_menu() {
     add_menu_page('Form Pop-up', 'Form Pop-up settings', 'manage_option', 'form-pop-up', 'fp_function', 'dashicons-clipboard');
 }

 /* ##############################
Set up the function at the creation of the menu
############################## */
function fp_function() {
    // --- Link the content page of the plugin menu ---
    // include('fp-admin.php');
    include_once plugin_dir_path( __FILE__ ) . ('fp-admin.php');
 
    // --- Link the css file of the menu ---
    wp_enqueue_style( 'fp_admin_css', plugins_url( 'fp-admin.css', __FILE__ ));
}

/* ##############################
Functions to insert css in the head
############################## */
 
// css to put the form in a pop up show
function fp_include_front_css() {
    // --- link the css file of the style' menu ---
    wp_enqueue_style( 'fp_include_front_css', plugins_url( 'fp-front.css', __FILE__ ));
}

/* ##############################
Function of creation form' html
############################## */
function fp_include_front_snippet() {
    // --- link the content page ---
   echo '<div id="fp-front">'.
       stripslashes(get_option('fp_content'))
        .'</div>';
}
 
/* ##############################
Conditions to add html code
############################## */
// To recover var from DB
$fp_activation = get_option( 'fp_activation'); // activation?
//$fp_display    = get_option( 'fp_display' ); // page?
//$fp_position   = get_option( 'fp_position' ); 

 
// if activated
if($fp_activation == "on") {
        add_action( 'wp_head', 'fp_include_front_css' );

}
?>