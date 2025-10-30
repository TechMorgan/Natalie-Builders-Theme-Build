<?php
/**
 * Theme bootstrap for Natale Builders theme.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Set up theme supports and register menus.
 */
function natale_setup_theme() {
    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable featured images.
    add_theme_support('post-thumbnails');

    // Custom logo for header branding.
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 80,
            'width'       => 220,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );

    // Enable HTML5 markup for core components.
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));

    // Menus.
    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'natale'),
            'footer'  => __('Footer Menu', 'natale'),
        )
    );
}
add_action('after_setup_theme', 'natale_setup_theme');

/**
 * Enqueue theme styles and scripts.
 */
function natale_enqueue_assets() {
    $theme   = wp_get_theme();
    $version = is_a($theme, 'WP_Theme') ? $theme->get('Version') : null;

    // Main stylesheet (style.css).
    wp_enqueue_style('natale-style', get_stylesheet_uri(), array(), $version);
}
add_action('wp_enqueue_scripts', 'natale_enqueue_assets');

/**
 * Customizer: Header phone number
 */
function natale_customize_register($wp_customize) {
    $wp_customize->add_section(
        'natale_header',
        array(
            'title'       => __('Header', 'natale'),
            'priority'    => 30,
            'description' => __('Header options like phone number.', 'natale'),
        )
    );

    $wp_customize->add_setting(
        'natale_phone',
        array(
            'default'           => '716-580-3318',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'natale_phone',
        array(
            'label'   => __('Header phone number', 'natale'),
            'section' => 'natale_header',
            'type'    => 'text',
        )
    );
}
add_action('customize_register', 'natale_customize_register');


