<?php
/*
Plugin Name: Code-Architect Contact Widget
Plugin URI: https://github.com/code-architect
Description: A contact from widget for wordpress by code-architect.
Version: 1.0
Author: Code Architect
Author URI: http://codearchitect.tk/
License: A "Slug" license name e.g. GPL2
*/

/**
 * Include javascript
 */
function add_scripts(){
    wp_enqueue_script('contact-scripts', plugins_url().'/contact-widget/js/script.js', array('jquery'), '1.11.1', false);
}
add_action('wp_enqueue_scripts', 'add_scripts');

/**
 * Include Class
 */
include('class.contact-widget.php');

/**
 * Register the widget
 */
function register_contact_widget(){
    register_widget('Contact_Widget');
}
add_action('widgets_init', 'register_contact_widget');
