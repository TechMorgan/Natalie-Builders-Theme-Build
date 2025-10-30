<?php
/**
 * Header template
 */

if (!defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container header-inner">
        <div class="site-branding">
            <?php
            if (function_exists('the_custom_logo') && has_custom_logo()) {
                the_custom_logo();
            } else {
                ?>
                <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                <?php
            }
            ?>
        </div>

        <nav class="primary-nav" aria-label="Primary">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'menu',
                    'fallback_cb'    => false,
                )
            );
            ?>
        </nav>

        <div class="header-actions">
            <details class="header-search">
                <summary aria-label="Search" class="search-toggle" role="button">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M11 4a7 7 0 105.293 12.293l3.707 3.707 1.414-1.414-3.707-3.707A7 7 0 0011 4zm0 2a5 5 0 110 10 5 5 0 010-10z" fill="currentColor"/></svg>
                </summary>
                <div class="search-panel">
                    <?php get_search_form(); ?>
                </div>
            </details>

            <?php $phone = get_theme_mod('natale_phone', '716-580-3318'); ?>
            <a class="cta-button" href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
        </div>
    </div>
</header>

<main id="content" class="site-content">

