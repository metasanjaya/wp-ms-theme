<?php

function ms_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'ms_theme_enqueue_styles' );

function ms_theme_wp_head() {
    
}
add_action( 'wp_head' , 'ms_theme_wp_head' );