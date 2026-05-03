<?php
/**
 * Template Name: Workshop Landing Page
 */
get_header(); ?>

<section id="workshop-hero" class="hero" style="background-image: linear-gradient(rgba(0,0,0,0.85), rgba(0,0,0,0.85)), url('<?php echo esc_url(wp_titans_get_mod("wp_titans_hero_bg")); ?>');">
    <div class="reveal">
        <div class="hero-ticker" style="margin-bottom: 2rem; background: var(--primary); color: black; padding: 0.8rem 2rem; border-radius: 50px; display: inline-block;">
            <p style="margin: 0; font-size: 0.85rem; letter-spacing: 1px; font-weight: 800; text-transform: uppercase;">
                <i class="fas fa-calendar-alt" style="margin-right: 10px;"></i>
                Limited Capacity: Only 12 Spots Remaining
            </p>
        </div>
        <h1 style="font-size: clamp(3rem, 8vw, 5rem);"><?php echo get_the_title(); ?></h1>
        <p style="font-size: 1.5rem; color: #ccc; max-width: 800px; margin: 0 auto 3rem;">
            The 14-Day Velocity System: A Masterclass in High-Performance Agency Operations and Authority Positioning.
        </p>
        <div class="hero-btns" style="justify-content: center;">
            <a href="#register" class="btn btn-primary" style="padding: 1.5rem 4rem;">Secure Your Spot Now</a>
        </div>
    </div>
</section>

<section id="workshop-outcomes" style="background: #050505;">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <span class="tagline">What You'll Master</span>
        <h2>The Titan Curriculum</h2>
    </div>
    <div class="grid-cards">
        <div class="card reveal">
            <i class="fas fa-bolt"></i>
            <h3>Velocity Delivery</h3>
            <p>How to compress 3-month projects into 14 days without sacrificing quality or burning out.</p>
        </div>
        <div class="card reveal">
            <i class="fas fa-shield-alt"></i>
            <h3>Authority Locking</h3>
            <p>The psychological triggers that move you from "Commodity Vendor" to "Trusted Advisor" instantly.</p>
        </div>
        <div class="card reveal">
            <i class="fas fa-chart-line"></i>
            <h3>High-Ticket Sales</h3>
            <p>Our exact script and framework for closing 0k+ projects on the first discovery call.</p>
        </div>
    </div>
</section>

<section id="workshop-content" style="background: #000;">
    <div class="grid-2">
        <div class="reveal">
            <span class="tagline">The Deep Dive</span>
            <h2>Why This Isn't Just Another Webinar</h2>
            <p>Most workshops teach you theory. We give you the raw SOPs, the templates, and the internal systems we use at WordPress Titans to dominate the market.</p>
            <ul style="margin-top: 2rem; color: #ccc;">
                <li style="margin-bottom: 1rem;"><i class="fas fa-check" style="color: var(--primary); margin-right: 10px;"></i> Full access to our Internal Project Management Templates.</li>
                <li style="margin-bottom: 1rem;"><i class="fas fa-check" style="color: var(--primary); margin-right: 10px;"></i> The "Authority Copy" Framework for Expert Positioning.</li>
                <li style="margin-bottom: 1rem;"><i class="fas fa-check" style="color: var(--primary); margin-right: 10px;"></i> Live Q&A and Site Audits for all attendees.</li>
            </ul>
        </div>
        <div class="img-reveal">
            <img src="https://images.unsplash.com/photo-1540317580384-e5d43616b9aa?auto=format&fit=crop&w=800" alt="Workshop" style="border-radius: 8px;">
        </div>
    </div>
</section>

<section id="register" style="background: #080808; text-align: center;">
    <div class="reveal" style="max-width: 600px; margin: 0 auto; background: #111; padding: 5rem; border-radius: 12px; border: 2px solid var(--primary);">
        <h2 style="margin-bottom: 2rem;">Apply for Admission</h2>
        <p style="color: #888; margin-bottom: 3rem;">We vet every attendee to ensure a high-level environment. Please fill out the form below to begin your application.</p>
        <form style="display: flex; flex-direction: column; gap: 1.5rem;">
            <input type="text" placeholder="Full Name" required style="padding: 1.2rem; background: #000; border: 1px solid #333; color: white;">
            <input type="email" placeholder="Agency Email" required style="padding: 1.2rem; background: #000; border: 1px solid #333; color: white;">
            <input type="url" placeholder="Current Website URL" style="padding: 1.2rem; background: #000; border: 1px solid #333; color: white;">
            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
    </div>
</section>

<?php get_footer(); ?>
