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
    <div class="container footer-top">
        <div class="footer-brand">
            <div class="footer-logo">
                <?php if (function_exists('the_custom_logo') && has_custom_logo()) { the_custom_logo(); } else { bloginfo('name'); } ?>
            </div>
            <?php $phone = get_theme_mod('natale_phone', '716-580-3318'); ?>
            <p class="footer-contact"><a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a></p>
            <?php $address = get_theme_mod('natale_address'); if ($address) : ?>
                <p class="footer-contact"><?php echo esc_html($address); ?></p>
            <?php endif; ?>
            <?php $email = get_theme_mod('natale_email'); if ($email) : ?>
                <p class="footer-contact"><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
            <?php endif; ?>
        </div>

        <div class="footer-menu">
            <h4 class="footer-title"><?php esc_html_e('Explore', 'natale'); ?></h4>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer_explore',
                    'container'      => false,
                    'menu_class'     => 'footer-links',
                    'fallback_cb'    => false,
                )
            );
            ?>
        </div>

        <div class="footer-menu">
            <h4 class="footer-title"><?php esc_html_e('Find Out More', 'natale'); ?></h4>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer_more',
                    'container'      => false,
                    'menu_class'     => 'footer-links',
                    'fallback_cb'    => false,
                )
            );
            ?>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container footer-bottom-inner">
            <div class="footer-copy">&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?></div>
            <nav class="footer-bottom-nav" aria-label="Footer Bottom">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer_bottom',
                        'container'      => false,
                        'menu_class'     => 'footer-inline-links',
                        'fallback_cb'    => false,
                    )
                );
                ?>
            </nav>
            <div class="footer-powered"><?php esc_html_e('Powered by Enrich', 'natale'); ?></div>
        </div>
    </div>

    <?php wp_footer(); ?>
</footer>

</body>
</html>

