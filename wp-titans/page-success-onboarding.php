<?php
/**
 * Template Name: Onboarding Success Page
 */
get_header(); ?>

<main style="padding-top: 15rem; background: #000; min-height: 100vh; text-align: center;">
    <section class="reveal">
        <div style="background: var(--primary); color: black; width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 3rem; font-size: 2rem;">
            <i class="fas fa-rocket"></i>
        </div>
        <span class="tagline">Mission Initialized</span>
        <h1 style="margin-bottom: 2rem;">Welcome to the Arsenal.</h1>
        <p style="max-width: 700px; margin: 0 auto 4rem; color: var(--text-dim); font-size: 1.25rem;">
            The 14-Day Velocity Sprint for your project has officially begun. We are moving from "Commodity" to "Dominance."
        </p>

        <div style="max-width: 1000px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; text-align: left;">
            <div style="background: #111; padding: 3rem; border-left: 4px solid var(--primary); border-radius: 8px;">
                <h3 style="font-size: 1.2rem; margin-bottom: 1rem; color: white;">Your Command Center</h3>
                <p style="font-size: 0.9rem; color: #888; margin-bottom: 2rem;">This is where you will track every milestone, download assets, and communicate with the team.</p>
                <a href="<?php echo get_permalink(get_page_by_path('client-portal')); ?>" class="btn btn-primary" style="width: 100%; padding: 1rem;">Access Client Portal</a>
            </div>
            <div style="background: #111; padding: 3rem; border-left: 4px solid #333; border-radius: 8px;">
                <h3 style="font-size: 1.2rem; margin-bottom: 1rem; color: white;">The Strategic Sitemap</h3>
                <p style="font-size: 0.9rem; color: #888; margin-bottom: 2rem;">Review the architecture we've proposed for your 5-page Authority Build.</p>
                <a href="#" class="btn btn-outline" style="width: 100%; padding: 1rem;">View Proposed Sitemap</a>
            </div>
        </div>

        <div style="margin-top: 6rem; background: #050505; padding: 4rem; border-radius: 12px; max-width: 800px; margin-left: auto; margin-right: auto; border: 1px solid #111;">
            <h4 style="color: var(--primary); margin-bottom: 1.5rem;">The Next 24 Hours</h4>
            <ul style="list-style: none; padding: 0; display: inline-block; text-align: left; color: var(--text-dim);">
                <li style="margin-bottom: 1rem;"><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Team assigned to your project.</li>
                <li style="margin-bottom: 1rem;"><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Shared Google Drive initialized.</li>
                <li style="margin-bottom: 1rem;"><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Project Kickoff Meeting link sent to [Client Email].</li>
            </ul>
        </div>
    </section>
</main>

<?php get_footer(); ?>
