<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$default_pages = array(
    'Home' => array(
        'title' => 'Home',
        'content' => 'Welcome to our website!',
        'template' => 'index.php',
    ),
);

foreach ($default_pages as $slug => $page) {
}

