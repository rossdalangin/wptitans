<?php
/**
 * Template Name: Strategic Growth Roadmap
 */
get_header(); ?>

<section id="roadmap-hero" style="background: #000; padding: 12rem 10% 8rem;">
    <div class="reveal">
        <span class="tagline">The Path to Dominance</span>
        <h1 style="font-size: clamp(3rem, 10vw, 6rem); margin-bottom: 2rem;">Your Growth Roadmap.</h1>
        <p style="font-size: 1.4rem; color: #ccc; max-width: 800px; line-height: 1.6;">We don't just build websites; we engineer the multi-phase journey to market authority and seven-figure scale.</p>
    </div>
</section>

<section id="roadmap-interactive" style="background: #050505; border-top: 1px solid var(--border-glass); padding: 8rem 10%;">
    <div class="reveal" style="max-width: 1000px; margin: 0 auto;">
        <div class="roadmap-timeline" style="position: relative; padding-left: 5rem; border-left: 2px solid #222;">

            <div class="roadmap-item reveal" style="margin-bottom: 8rem; position: relative;">
                <div style="position: absolute; left: -6.1rem; top: 0; width: 30px; height: 30px; background: var(--primary); border-radius: 50%; box-shadow: 0 0 20px var(--accent-glow);"></div>
                <span style="color: var(--primary); font-weight: 800; font-family: 'Syne'; text-transform: uppercase; letter-spacing: 2px;">Phase 01: The Authority Launch (Days 1-14)</span>
                <h2 style="margin-top: 1rem; font-size: 2.5rem;">Foundation & Velocity</h2>
                <p style="color: #888; margin-top: 1.5rem; font-size: 1.1rem; max-width: 700px;">Deploying your high-performance Authority Website System™. We strip away the "Commodity" look and replace it with elite, cinematic positioning and conversion-ready copy.</p>
                <div style="margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap;">
                    <span style="background: #111; padding: 0.5rem 1.2rem; border-radius: 4px; font-size: 0.75rem; font-weight: 700;">Strategic Blueprint</span>
                    <span style="background: #111; padding: 0.5rem 1.2rem; border-radius: 4px; font-size: 0.75rem; font-weight: 700;">Authority Copy</span>
                    <span style="background: #111; padding: 0.5rem 1.2rem; border-radius: 4px; font-size: 0.75rem; font-weight: 700;">Core Vitals Audit</span>
                </div>
            </div>

            <div class="roadmap-item reveal" style="margin-bottom: 8rem; position: relative;">
                <div style="position: absolute; left: -6.1rem; top: 0; width: 30px; height: 30px; background: #222; border: 2px solid var(--primary); border-radius: 50%;"></div>
                <span style="color: var(--primary); font-weight: 800; font-family: 'Syne'; text-transform: uppercase; letter-spacing: 2px;">Phase 02: The Lead Engine (Months 1-3)</span>
                <h2 style="margin-top: 1rem; font-size: 2.5rem;">Traffic & Conversion</h2>
                <p style="color: #888; margin-top: 1.5rem; font-size: 1.1rem; max-width: 700px;">Implementing advanced lead-capture protocols. We build out your Knowledge Vault (Resource Center) and automate the journey from stranger to discovery call.</p>
                <div style="margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap;">
                    <span style="background: #111; padding: 0.5rem 1.2rem; border-radius: 4px; font-size: 0.75rem; font-weight: 700;">Lead Magnets</span>
                    <span style="background: #111; padding: 0.5rem 1.2rem; border-radius: 4px; font-size: 0.75rem; font-weight: 700;">Email Nurture</span>
                    <span style="background: #111; padding: 0.5rem 1.2rem; border-radius: 4px; font-size: 0.75rem; font-weight: 700;">SEO Domination</span>
                </div>
            </div>

            <div class="roadmap-item reveal" style="position: relative;">
                <div style="position: absolute; left: -6.1rem; top: 0; width: 30px; height: 30px; background: #222; border: 2px solid var(--primary); border-radius: 50%;"></div>
                <span style="color: var(--primary); font-weight: 800; font-family: 'Syne'; text-transform: uppercase; letter-spacing: 2px;">Phase 03: The Scale Protocol (Month 6+)</span>
                <h2 style="margin-top: 1rem; font-size: 2.5rem;">Authority Leverage</h2>
                <p style="color: #888; margin-top: 1.5rem; font-size: 1.1rem; max-width: 700px;">Weaponizing your established authority to dominate new markets. Custom tool builds, high-ticket workshops, and multi-channel content ecosystems.</p>
                <div style="margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap;">
                    <span style="background: #111; padding: 0.5rem 1.2rem; border-radius: 4px; font-size: 0.75rem; font-weight: 700;">Headless Scaling</span>
                    <span style="background: #111; padding: 0.5rem 1.2rem; border-radius: 4px; font-size: 0.75rem; font-weight: 700;">Custom Plugins</span>
                    <span style="background: #111; padding: 0.5rem 1.2rem; border-radius: 4px; font-size: 0.75rem; font-weight: 700;">Omni-Channel Content</span>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="roadmap-cta" style="background: #000; text-align: center; padding: 10rem 10%;">
    <div class="reveal">
        <h2 style="font-size: 3rem; margin-bottom: 2rem;">Ready to initiate your roadmap?</h2>
        <p style="color: #ccc; margin-bottom: 4rem;">The first step is a 15-minute Strategy Call to bridge your current Authority Gap.</p>
        <a href="<?php echo get_permalink(get_page_by_path('book-a-strategy-call')); ?>" class="btn btn-primary" style="padding: 1.5rem 4rem;">Claim Your Roadmap Call</a>
    </div>
</section>

<?php get_footer(); ?>
