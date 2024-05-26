<?php

function init_wp_theme()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('custom-css', get_template_directory_uri() . './style.css');
    wp_enqueue_script('custom-js', get_template_directory_uri() . './assets/js/script.js');

    wp_enqueue_style('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js');

}


add_action('init', 'init_wp_theme');

/**
 * features support
 */

add_theme_support('menus');
// add dynamic title tag support
add_theme_support('title_tag');

// custom logo
add_theme_support('custom-logo');
add_theme_support('post-thumbnails');

// widget support
add_theme_support('widget');

/**
 * register nav menus
 */

$locations = array(
    'main-menu' => 'Show on the header',
    'footer-menu' => 'Show on the footer'
);

register_nav_menus($locations);

register_sidebar(
    array(
        'before-title' => '',
        'after-title' => '',
        'before-widget' => '',
        'after-widget' => '',
        'name' => 'Right Sidebar Area',
        'id' => 'right-sidebar',
        'description' => 'Sidebar Widget Area for right side on archive page'
    )
);

register_sidebar(
    array(
        'before-title' => '',
        'after-title' => '',
        'before-widget' => '',
        'after-widget' => '',
        'name' => 'Left Sidebar Area',
        'id' => 'left-sidebar',
        'description' => 'Sidebar Widget Area for left side on archive page'
    )
);

?>