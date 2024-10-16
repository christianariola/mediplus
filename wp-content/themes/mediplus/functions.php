<?php

/**
 * Add theme features.
 */
if(function_exists('add_theme_support')) {

    add_theme_support('post-thumbnails');

    // Add image size.
    add_image_size('blog-cover', 550, 280, true);
    add_image_size('blog-single', 800, 280, true);
    
}

/**
 * Setting Excerpt Length
 */
function custom_excerpt_length() {
    return 20;
}
add_action('excerpt_length', 'custom_excerpt_length');

/**
 * Add theme styles
 */
function enqueue_all_style_plus_tailwind_styles() {
    wp_enqueue_style('style', get_stylesheet_uri(), '1.0', 'all');
    wp_enqueue_style('custom_style', get_template_directory_uri() . '/customStyle.css');
}

add_action('wp_enqueue_scripts', 'enqueue_all_style_plus_tailwind_styles');

/**
 * Register navigation menus
 */
function theme_register_menus() {
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'footer-menu' => __('Footer Menu'),
        )
    );
}

add_action('after_setup_theme', 'theme_register_menus');

/**
 * Widget Areas
 */

function theme_widget_init() {
    $args = [
        'name' => __('Sidebar'),
        'id' => 'sidebar_widget',
        'description' => 'Registering Widget Area',
        'before_widget' => '<section class="someId">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ];

    register_sidebar($args);
}

add_action('widgets_init', 'theme_widget_init');