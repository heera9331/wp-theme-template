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



/**
 * theme option additions
 */

function my_theme_add_admin_menu()
{
    add_menu_page(
        'WP-Theme Options', // Page title
        'WP-Theme', // Menu title
        'manage_options', // Capability
        'wp-theme', // Menu slug
        'my_theme_options_page', // Callback function
        '', // Icon URL (optional)
        61 // Position (optional)
    );
}


function my_theme_options_page()
{
    ?>
    <div class="wrap">
        <h1>WP Theme Options</h1>
        <form class="form" action="options.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php
}


add_action('admin_menu', 'my_theme_add_admin_menu');



/**
 * creating theme pages when theme is install
 */


function create_wp_theme_home_page()
{
    $default_pages = array(
        'Home' => array(
            'title' => 'Home',
            'content' => 'Welcome to our website!',
            'template' => 'index.php',
        ),
    );

    foreach ($default_pages as $slug => $page) {
        // Check if the page already exists
        if (!get_page_by_path($slug)) {
            // Create the page
            $page_id = wp_insert_post(
                array(
                    'post_title' => $page['title'],
                    'post_content' => $page['content'],
                    'post_status' => 'publish',
                    'post_type' => 'page',
                    'post_name' => $slug,
                )
            );

            // Assign the template if specified
            if ($page_id && isset($page['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page['template']);
            }
        }
    }
}


add_action('after_switch_theme', 'create_wp_theme_home_page');