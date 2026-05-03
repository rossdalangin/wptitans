<?php
/**
 * Template Name: Referral & Partner Protocol
 */
get_header(); ?>

<section id="partner-hero" style="background: #000; padding: 12rem 10% 8rem; position: relative; overflow: hidden;">
    <div class="reveal">
        <span class="tagline">Strategic Alliances</span>
        <h1 style="font-size: clamp(3rem, 10vw, 6rem); margin-bottom: 2rem;">Scaling Through Synergy.</h1>
        <p style="font-size: 1.4rem; color: #ccc; max-width: 800px; line-height: 1.6;">We partner with elite agencies, consultants, and industry leaders to deliver world-class WordPress authority platforms to their networks.</p>
    </div>
</section>

<section id="partner-models" style="background: #050505; border-top: 1px solid var(--border-glass);">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <h2>Partnership Architectures</h2>
    </div>
    <div class="grid-cards">
        <div class="card reveal">
            <i class="fas fa-handshake"></i>
            <h3>Referral Protocol</h3>
            <p>Introduce high-value clients to our 14-Day Velocity System and receive a 10% referral fee upon successful engagement.</p>
            <div style="margin-top: 2rem; color: var(--primary); font-weight: 800; font-size: 0.8rem;">RECURRING AVAILABLE</div>
        </div>
        <div class="card reveal">
            <i class="fas fa-user-ninja"></i>
            <h3>White-Label Arsenal</h3>
            <p>Our team acts as your internal development department. We deliver under your brand, maintaining the Titan standard of excellence.</p>
            <div style="margin-top: 2rem; color: var(--primary); font-weight: 800; font-size: 0.8rem;">VOLUME DISCOUNTS</div>
        </div>
        <div class="card reveal">
            <i class="fas fa-project-diagram"></i>
            <h3>Strategic Integration</h3>
            <p>Collaborative builds for complex projects requiring custom plugin development or high-performance infrastructure.</p>
            <div style="margin-top: 2rem; color: var(--primary); font-weight: 800; font-size: 0.8rem;">CUSTOM QUOTES</div>
        </div>
    </div>
</section>

<section id="partner-apply" style="background: #080808; text-align: center;">
    <div class="reveal" style="max-width: 600px; margin: 0 auto; background: #111; padding: 5rem; border-radius: 12px; border: 2px solid var(--primary);">
        <h2 style="margin-bottom: 2rem;">Initiate Alliance</h2>
        <p style="color: #888; margin-bottom: 3rem;">Ready to expand your arsenal? Apply to become an official Titan Partner.</p>
        <form style="display: flex; flex-direction: column; gap: 1.5rem;">
            <input type="text" placeholder="Company / Individual Name" required style="padding: 1.2rem; background: #000; border: 1px solid #333; color: white;">
            <input type="email" placeholder="Professional Email" required style="padding: 1.2rem; background: #000; border: 1px solid #333; color: white;">
            <select style="padding: 1.2rem; background: #000; border: 1px solid #333; color: white;">
                <option>Select Protocol</option>
                <option>Referral Partnership</option>
                <option>White-Label Support</option>
                <option>Strategic Integration</option>
            </select>
            <button type="submit" class="btn btn-primary">Submit Credentials</button>
        </form>
    </div>
</section>

<?php get_footer(); ?>
