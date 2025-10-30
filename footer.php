<?php
/**
 * Footer template
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

</main>

<footer class="site-footer">
    <div class="container">
        <div class="footer-inner">
            <p>&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?></p>
            <nav class="footer-nav" aria-label="Footer">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'menu',
                        'fallback_cb'    => false,
                    )
                );
                ?>
            </nav>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>

</body>
</html>

