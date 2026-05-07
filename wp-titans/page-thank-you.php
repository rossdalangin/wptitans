<?php
/**
 * Template Name: Strategic Thank You Page
 */
get_header(); ?>

<main style="padding-top: 15rem; background: #000; min-height: 100vh; text-align: center;">
    <section class="reveal">
        <div style="background: var(--primary); color: black; width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 3rem; font-size: 2rem;">
            <i class="fas fa-check"></i>
        </div>
        <span class="tagline">Initialization Confirmed</span>
        <h1 style="margin-bottom: 2rem;">You're on the Roadmap.</h1>
        <p style="max-width: 700px; margin: 0 auto 4rem; color: var(--text-dim); font-size: 1.25rem;">
            Your request has been prioritized. Our strategists are currently reviewing your digital footprint to identify the Authority Gaps.
        </p>

        <div style="max-width: 900px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
            <div class="card" style="padding: 2.5rem; text-align: left; background: #050505;">
                <h4 style="color: var(--primary); margin-bottom: 1rem;">1. Check Your Inbox</h4>
                <p style="font-size: 0.9rem;">We've sent the "Pre-Call Authority Pack." Reviewing this will put you 10 steps ahead of your competition.</p>
            </div>
            <div class="card" style="padding: 2.5rem; text-align: left; background: #050505;">
                <h4 style="color: var(--primary); margin-bottom: 1rem;">2. Prepare Metrics</h4>
                <p style="font-size: 0.9rem;">Have your current traffic and conversion data ready for our Gap Analysis session.</p>
            </div>
            <div class="card" style="padding: 2.5rem; text-align: left; background: #050505;">
                <h4 style="color: var(--primary); margin-bottom: 1rem;">3. Join the Vault</h4>
                <p style="font-size: 0.9rem;">While you wait, explore our Resource Center to see the logic behind high-ticket builds.</p>
                <a href="<?php echo get_permalink(get_page_by_path('resource-center')); ?>" style="color: var(--primary); font-weight: 700; font-size: 0.8rem; margin-top: 1rem; display: block;">Enter The Vault <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div style="margin-top: 6rem;">
            <p style="font-family: 'Syne'; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; font-size: 0.7rem; color: #444;">Follow the Sprint on LinkedIn</p>
            <div style="display: flex; justify-content: center; gap: 2rem; margin-top: 1.5rem; opacity: 0.5;">
                <a href="<?php echo esc_url(wp_titans_get_mod('wp_titans_social_linkedin')); ?>" target="_blank" style="font-size: 1.5rem;"><i class="fab fa-linkedin"></i></a>
                <a href="<?php echo esc_url(wp_titans_get_mod('wp_titans_social_twitter')); ?>" target="_blank" style="font-size: 1.5rem;"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
