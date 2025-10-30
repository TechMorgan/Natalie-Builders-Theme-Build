<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<?php
// If page is built with Elementor (or in editor), let Elementor render the content.
if (class_exists('\\Elementor\\Plugin')) {
    $is_editor = \Elementor\Plugin::$instance->editor->is_edit_mode();
    $is_built  = \Elementor\Plugin::$instance->db->is_built_with_elementor(get_queried_object_id());
    if ($is_editor || $is_built) {
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_content();
            }
        }
        get_footer();
        return;
    }
}
?>

<!-- Hero -->
<?php
$hero_image = get_the_post_thumbnail_url(get_queried_object_id(), 'full');
$hero_style = $hero_image ? ' style="--hero-image:url(' . esc_url($hero_image) . ')"' : '';
?>
<section class="hero" role="banner" aria-label="Hero"<?php echo $hero_style; ?>>
    <div class="hero-content container">
        <h1>Natale Builders</h1>
        <p>Custom Homes · Neighborhood Homes · Patio Homes</p>
        <p>
            <a class="button" href="#featured">Browse Our Homes</a>
        </p>
    </div>
    <!-- Tip: Set a background image from the Customizer with Additional CSS
         or replace this section with a slider plugin and output shortcode. -->
</section>

<!-- Featured Homes / Cards -->
<section id="featured" class="section">
    <div class="container">
        <h2>Featured Homes</h2>
        <div class="cards">
            <?php
            // Example: show latest 6 posts as placeholders for homes.
            $homes_query = new WP_Query(
                array(
                    'post_type'      => 'post',
                    'posts_per_page' => 6,
                )
            );

            if ($homes_query->have_posts()) :
                while ($homes_query->have_posts()) :
                    $homes_query->the_post();
                    ?>
                    <article class="card">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        <?php endif; ?>
                        <div class="card-body">
                            <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="card-text"><?php the_excerpt(); ?></div>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Static placeholders when there are no posts yet.
                for ($i = 1; $i <= 6; $i++) :
                    ?>
                    <article class="card">
                        <div class="card-body">
                            <h3 class="card-title">Model Home <?php echo (int) $i; ?></h3>
                            <div class="card-text">Add your home content here.</div>
                        </div>
                    </article>
                    <?php
                endfor;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Explore Section -->
<section class="section" aria-label="Explore Our Homes">
    <div class="container">
        <h2>Explore Our Homes</h2>
        <p>Use this section for a large callout image and CTA linking to your inventory, models, or neighborhoods.</p>
        <p><a class="button" href="#contact">Talk to Sales</a></p>
    </div>
</section>

<!-- Map Placeholder -->
<section class="section" aria-label="Neighborhood Map">
    <div class="container">
        <h2>See Where Our Neighborhoods Are Located</h2>
        <div style="background:#e5e7eb;height:300px;border-radius:6px;display:grid;place-items:center;">
            <p>Embed a map here (e.g., Google Maps, Mapbox, or a plugin shortcode).</p>
        </div>
    </div>
</section>

<!-- Blog -->
<section class="section" aria-label="Natale Blog">
    <div class="container">
        <h2>Natale Blog</h2>
        <div class="cards">
            <?php
            $blog_query = new WP_Query(
                array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                )
            );
            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) :
                    $blog_query->the_post();
                    ?>
                    <article class="card">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
                        <?php endif; ?>
                        <div class="card-body">
                            <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="card-text"><?php the_excerpt(); ?></div>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>' . esc_html__('No blog posts yet.', 'natale') . '</p>';
            endif;
            ?>
        </div>
    </div>
></section>

<!-- Testimonial Placeholder -->
<section class="section" aria-label="Testimonial">
    <div class="container">
        <blockquote>
            <p>“We are appreciative of Natale Builders for building our family a beautiful home.”</p>
            <cite>— Happy Customer</cite>
        </blockquote>
    </div>
></section>

<!-- Contact / Request Info -->
<section id="contact" class="section" aria-label="Request More Info">
    <div class="container">
        <h2>Request more info</h2>
        <?php
        // If using a forms plugin, replace with a shortcode like:
        // echo do_shortcode('[contact-form-7 id="123" title="Contact" ]');
        ?>
        <form class="contact-form" method="post" action="#">
            <div style="display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:12px;">
                <input type="text" name="first_name" placeholder="First Name" />
                <input type="text" name="last_name" placeholder="Last Name" />
                <input type="email" name="email" placeholder="Your Email" />
            </div>
            <div style="margin-top:12px;display:grid;grid-template-columns:1fr;">
                <textarea rows="5" name="message" placeholder="Message"></textarea>
            </div>
            <p style="margin-top:12px;">
                <button type="submit">Send Request</button>
            </p>
        </form>
    </div>
></section>

<!-- Partners Placeholder -->
<section class="section" aria-label="Partners">
    <div class="container">
        <h2>Partners</h2>
        <p>Add your partner logos here.</p>
    </div>
></section>

<?php get_footer(); ?>


