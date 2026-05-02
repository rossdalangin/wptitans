<?php
/**
 * Template Name: Resource Center
 */
get_header(); ?>

<main style="padding-top: 10rem; background: #000; min-height: 100vh;">
    <section id="resources-header" style="text-align: center; padding-bottom: 8rem;">
        <div class="reveal">
            <span class="tagline">The Knowledge Vault</span>
            <h1 style="font-size: clamp(3rem, 8vw, 5rem); margin-bottom: 2rem;">Agency Resources</h1>
            <p style="max-width: 800px; margin: 0 auto; color: var(--text-dim); font-size: 1.25rem;">Free tools, guides, and blueprints designed to help you build digital authority and scale your business.</p>
        </div>
    </section>

    <section id="resources-grid" style="background: #050505; border-top: 1px solid var(--border-glass); padding: 8rem 5%;">
        <div class="grid-cards" style="grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));">
            <?php
            $res_query = new WP_Query(array('post_type' => 'resource', 'posts_per_page' => 12));
            if ($res_query->have_posts()) : while ($res_query->have_posts()) : $res_query->the_post();
            ?>
            <div class="card reveal" style="padding: 0; overflow: hidden; border-radius: 8px;">
                <?php if (has_post_thumbnail()) : the_post_thumbnail('large', array('style' => 'width: 100%; height: 250px; object-fit: cover;')); else : ?>
                    <div style="height: 250px; background: #111; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-file-pdf" style="font-size: 4rem; color: var(--primary); opacity: 0.2;"></i>
                    </div>
                <?php endif; ?>
                <div style="padding: 3rem;">
                    <span style="color: var(--primary); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px; font-weight: 700;">FREE DOWNLOAD</span>
                    <h3 style="font-size: 1.8rem; margin: 1.5rem 0;"><?php the_title(); ?></h3>
                    <p style="color: var(--text-dim); margin-bottom: 2.5rem;"><?php echo get_the_excerpt(); ?></p>
                    <?php
                    $file_url = get_post_meta(get_the_ID(), 'resource_file_url', true);
                    if ($file_url) : ?>
                        <a href="<?php echo esc_url($file_url); ?>" download class="btn btn-primary" style="width: 100%;">Download Blueprint</a>
                    <?php else : ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="width: 100%;">Get the Guide</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); else : ?>
                <div class="reveal" style="text-align: center; grid-column: 1 / -1; padding: 5rem 0;">
                    <i class="fas fa-file-pdf" style="font-size: 4rem; color: #222; margin-bottom: 2rem;"></i>
                    <h2>Vault currently locked.</h2>
                    <p style="color: var(--text-dim);">We are finalizing our latest blueprints. Check back soon!</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
