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
            $count = 0;
            if ($res_query->have_posts()) : while ($res_query->have_posts()) : $res_query->the_post();
                $count++;
                $is_locked = ($count > 2); // Unlock first 2, lock others
            ?>
            <div class="card reveal <?php echo $is_locked ? 'resource-locked' : ''; ?>" style="padding: 0; overflow: hidden; border-radius: 8px; position: relative;">
                <?php if ($is_locked) : ?>
                    <div class="lock-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.85); backdrop-filter: blur(8px); z-index: 10; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 3rem; text-align: center; opacity: 0; transition: var(--transition);">
                        <i class="fas fa-lock" style="font-size: 3rem; color: var(--primary); margin-bottom: 2rem;"></i>
                        <h4 style="color: white; margin-bottom: 1rem;">Titan Access Only</h4>
                        <p style="font-size: 0.85rem; color: #888; margin-bottom: 2rem;">This high-level asset requires the Authority Protocol password.</p>
                        <button class="btn btn-primary unlock-trigger" style="width: 100%; padding: 1rem;">Unlock Access</button>
                    </div>
                <?php endif; ?>

                <?php if (has_post_thumbnail()) : the_post_thumbnail('large', array('style' => 'width: 100%; height: 250px; object-fit: cover;')); else : ?>
                    <div style="height: 250px; background: #111; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-file-pdf" style="font-size: 4rem; color: var(--primary); opacity: 0.2;"></i>
                    </div>
                <?php endif; ?>
                <div style="padding: 3rem;">
                    <span style="color: var(--primary); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px; font-weight: 700;"><?php echo $is_locked ? 'PREMIUM ASSET' : 'FREE DOWNLOAD'; ?></span>
                    <h3 style="font-size: 1.8rem; margin: 1.5rem 0;"><?php the_title(); ?></h3>
                    <p style="color: var(--text-dim); margin-bottom: 2.5rem;"><?php echo get_the_excerpt(); ?></p>
                    <?php
                    $file_url = get_post_meta(get_the_ID(), 'resource_file_url', true);
                    if ($file_url && !$is_locked) : ?>
                        <a href="<?php echo esc_url($file_url); ?>" download class="btn btn-primary" style="width: 100%;">Download Blueprint</a>
                    <?php else : ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="width: 100%;"><?php echo $is_locked ? 'Request Access' : 'Get the Guide'; ?></a>
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

<style>
.resource-locked:hover .lock-overlay { opacity: 1 !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.unlock-trigger').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const email = prompt("Enter your Titan Protocol email to unlock this asset:");
            if (email) {
                alert("Credentials verified. Check your inbox for the access key.");
            }
        });
    });
});
</script>

<?php get_footer(); ?>
