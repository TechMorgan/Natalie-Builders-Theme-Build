<?php
/**
 * Index fallback template. Used for archives and posts when a more specific
 * template is not available.
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="container section">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
                <header class="entry-header">
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </header>
                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div>
            </article>
        <?php endwhile; ?>

        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p><?php esc_html_e('No posts found.', 'natale'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>


