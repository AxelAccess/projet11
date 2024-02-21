<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles() {
    wp_enqueue_style('twentytwentyone', get_stylesheet_directory_uri(). '/style.css'); 
    wp_enqueue_script('modale', get_stylesheet_directory_uri(). '/scripts/modale.js');
}

function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'footer-menu' => __( 'Footer Menu' ),
       )
     );
   }
   add_action( 'init', 'register_my_menus' );