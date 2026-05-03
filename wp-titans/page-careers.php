<?php
/**
 * Template Name: Careers / Join the Arsenal
 */
get_header(); ?>

<section id="careers-hero" style="background: #000; padding: 12rem 10% 8rem;">
    <div class="reveal">
        <span class="tagline">Scale Your Impact</span>
        <h1 style="font-size: clamp(3rem, 10vw, 6rem); margin-bottom: 2rem;">Join the Arsenal.</h1>
        <p style="font-size: 1.4rem; color: #ccc; max-width: 800px; line-height: 1.6;">We are looking for elite designers, developers, and strategists who are obsessed with velocity and authority. No fluff. No commodities. Just world-class outcomes.</p>
    </div>
</section>

<section id="why-titans" style="background: #050505; border-top: 1px solid var(--border-glass);">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <h2>The Titan Standard</h2>
    </div>
    <div class="grid-cards">
        <div class="card reveal">
            <i class="fas fa-rocket"></i>
            <h3>High Velocity</h3>
            <p>We don't do "scope creep." We ship elite systems in 14 days. You'll work in a fast-paced environment that values output over hours.</p>
        </div>
        <div class="card reveal">
            <i class="fas fa-crown"></i>
            <h3>Authority Culture</h3>
            <p>You'll be positioned as an expert from day one. We value individual mastery and deep philosophical alignment with our "Authority-First" mission.</p>
        </div>
        <div class="card reveal">
            <i class="fas fa-globe"></i>
            <h3>Remote Freedom</h3>
            <p>Our arsenal is global. Work from anywhere, as long as you can meet the Titan standard of excellence and delivery.</p>
        </div>
    </div>
</section>

<section id="open-positions" style="background: #000;">
    <div class="reveal" style="margin-bottom: 4rem;">
        <h2 style="margin-bottom: 1rem;">Active Deployments</h2>
        <p style="color: #888;">Select a role to see the requirements and initiate your application.</p>
    </div>
    <div style="display: flex; flex-direction: column; gap: 1rem;">
        <div class="reveal position-item" style="background: #080808; padding: 2.5rem; border: 1px solid #111; border-radius: 8px; display: flex; justify-content: space-between; align-items: center; transition: var(--transition); cursor: pointer;">
            <div>
                <h3 style="margin-bottom: 0.5rem; font-size: 1.4rem;">Senior WordPress Architect</h3>
                <span style="font-size: 0.75rem; color: var(--primary); text-transform: uppercase; letter-spacing: 2px; font-weight: 800;">Engineering • Remote</span>
            </div>
            <i class="fas fa-arrow-right" style="color: #444;"></i>
        </div>
        <div class="reveal position-item" style="background: #080808; padding: 2.5rem; border: 1px solid #111; border-radius: 8px; display: flex; justify-content: space-between; align-items: center; transition: var(--transition); cursor: pointer;">
            <div>
                <h3 style="margin-bottom: 0.5rem; font-size: 1.4rem;">Luxury UI/UX Designer</h3>
                <span style="font-size: 0.75rem; color: var(--primary); text-transform: uppercase; letter-spacing: 2px; font-weight: 800;">Creative • Remote</span>
            </div>
            <i class="fas fa-arrow-right" style="color: #444;"></i>
        </div>
        <div class="reveal position-item" style="background: #080808; padding: 2.5rem; border: 1px solid #111; border-radius: 8px; display: flex; justify-content: space-between; align-items: center; transition: var(--transition); cursor: pointer;">
            <div>
                <h3 style="margin-bottom: 0.5rem; font-size: 1.4rem;">Authority Copywriter</h3>
                <span style="font-size: 0.75rem; color: var(--primary); text-transform: uppercase; letter-spacing: 2px; font-weight: 800;">Strategy • Remote</span>
            </div>
            <i class="fas fa-arrow-right" style="color: #444;"></i>
        </div>
    </div>
    <style>
        .position-item:hover { border-color: var(--primary); transform: translateX(10px); background: #0c0c0c !important; }
        .position-item:hover i { color: var(--primary); transform: translateX(5px); }
    </style>
</section>

<section id="apply" style="background: #050505; text-align: center;">
    <div class="reveal" style="max-width: 600px; margin: 0 auto;">
        <h2 style="margin-bottom: 2rem;">Don't see your role?</h2>
        <p style="color: #ccc; margin-bottom: 3rem;">We are always looking for "Titan" caliber talent. Send us your portfolio and a brief pitch on why you belong in the arsenal.</p>
        <a href="mailto:careers@wordpresstitans.com" class="btn btn-outline">Spontaneous Application</a>
    </div>
</section>

<?php get_footer(); ?>
