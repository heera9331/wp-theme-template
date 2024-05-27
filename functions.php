<?php

/**
 * Exit if accessed directly.
 */
if (!defined('ABSPATH')) {

    exit;
}

function init_setup()
{
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    /**
     * enable short code
     */
    add_theme_support('shortcodes');

    /**
     *  Enable support for Post Formats.
     */

    add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link', 'status', 'chat'));

    /**
     * Register navigation menus. 
     */

    register_nav_menus(
        array(
            'main-menu' => __('Main Menu', 'elegance'),
        )
    );

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );
    add_theme_support('custom-logo');
}

function bootstrap_init()
{
    wp_enqueue_style("bootstrap-css", get_template_directory_uri() . './assets/css/bootstrap.min.css');
    wp_enqueue_script("bootstrap-js", get_template_directory_uri() . './assets/js/bootstrap.min.js');
    wp_enqueue_style("custom-css", get_template_directory_uri() . './styles.css');
}

function init_custom_style_script_setup()
{

    wp_enqueue_style('custom-css', get_template_directory_uri() . "./style.css");
}

function new_theme_widgets_init()
{
    register_sidebar(
        array(
            'name' => __('Footer Widget Area 1', 'elegance'),
            'id' => 'footer-1',
            'description' => __('Add widgets here to appear in your footer.', 'elegance'),
            'before_widget' => '<section class="widget">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => __('Footer Widget Area 2', 'elegance'),
            'id' => 'footer-2',
            'description' => __('Add widgets here to appear in your footer.', 'elegance'),
            'before_widget' => '<section class="widget">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}


function new_theme_enqueue_scripts()
{
    wp_enqueue_style('elegance-style', get_stylesheet_uri());
}


add_action('widgets_init', 'new_theme_widgets_init');
add_action('wp_enqueue_scripts', 'new_theme_enqueue_scripts');
add_action('after_setup_theme', 'init_setup');
add_action('init', 'bootstrap_init');



/**
 * short codes
 */

// Function to display the login form
function user_login_form()
{
    // Check if the user is already logged in
    if (is_user_logged_in()) {
        return '<p>You are already logged in. <a href="/profile">Go To Profile</a></p>';
    }

    // Output the login form
    ob_start(); ?>
    <form action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>" method="post">
        <p>
            <label for="username">Username or Email Address</label>
            <input type="text" name="log" id="username" class="input" value="" size="20" />
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" name="pwd" id="password" class="input" value="" size="20" />
        </p>
        <p>
            <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Log In" />
            <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url()); ?>" />
        </p>
    </form>
    <?php
    return ob_get_clean();
}

function user_register_form()
{

}
function current_instructor()
{
    if (!is_user_logged_in()) {
        return '<p>You are not logged in. <a href="/login">Go To Login</a></p>';
    }

    // Get current user information
    $current_user = wp_get_current_user();

    ob_start(); ?>
    <div class="user-dashboard">
        <h2>Welcome, <?php echo esc_html($current_user->display_name); ?>!</h2>
        <p><strong>Username:</strong> <?php echo esc_html($current_user->user_login); ?></p>
        <p><strong>Email:</strong> <?php echo esc_html($current_user->user_email); ?></p>
        <p><strong>Role:</strong> <?php echo implode(', ', $current_user->roles); ?></p>

        <?php if (in_array('administrator', $current_user->roles)): ?>
            <p>You have administrator access. <a href="<?php echo esc_url(admin_url()); ?>">Go to Admin Dashboard</a></p>
        <?php elseif (in_array('instructor', $current_user->roles)): ?>
            <p>Welcome, Instructor! Here are your courses: [List of courses]</p>
        <?php else: ?>
            <p>Welcome to your dashboard. Check out your profile and recent activities.</p>
        <?php endif; ?>

        <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>">Logout</a>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * in this function we show Login when user is not logined in
 * else we show profile page link for user
 */
function login_register()
{
    if (is_user_logged_in()) {
        return '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-33 nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="/profile" class="ekit-menu-nav-link menu-link">Profile</a></li>';
    }
    return '<li   class="menu-item menu-item-type-post_type menu-item-object-page menu-item-33 nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="/login" class="ekit-menu-nav-link menu-link">Login</a></li>';

}

add_shortcode('current_instructor', 'current_instructor');
add_shortcode('greet', 'greet_hello');
// Register the shortcode
add_shortcode('user_login_form', 'user_login_form');
add_shortcode('login_register', 'login_register');


