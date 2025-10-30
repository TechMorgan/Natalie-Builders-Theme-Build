<?php
/**
 * Default page template with content output (Elementor compatible).
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        $is_elementor = class_exists('\\Elementor\\Plugin') && \Elementor\Plugin::$instance->db->is_built_with_elementor(get_the_ID());

        if ($is_elementor) {
            // Let Elementor control the layout (no theme container wrap).
            the_content();
        } else {
            echo '<div class="container section">';
            the_content();
            echo '</div>';
        }
    endwhile;
endif;

get_footer();


