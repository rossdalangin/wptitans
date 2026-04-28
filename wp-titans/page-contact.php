<?php
/**
 * Template Name: Contact Page
 */
get_header(); ?>

<section class="page-header hero" style="min-height: 50vh;">
    <div class="reveal">
        <span class="tagline"><?php echo esc_html(get_theme_mod('wp_titans_contact_page_tagline', 'Get in Touch')); ?></span>
        <h1><?php echo esc_html(get_theme_mod('wp_titans_contact_page_title', 'Let’s Build Your Authority Website')); ?></h1>
        <p><?php echo esc_html(get_theme_mod('wp_titans_contact_page_subtitle', 'Whether you need a new website, a redesign, or want to grow your authority online — let’s talk.')); ?></p>
    </div>
</section>

<section id="contact-info" style="background: #050505;">
    <div class="grid-cards" style="margin-bottom: 5rem;">
        <div class="card reveal" style="text-align: center;">
            <i class="fas fa-phone"></i>
            <h3>Phone</h3>
            <p><?php echo esc_html(get_theme_mod('wp_titans_contact_phone', '+63 918 418 6025')); ?></p>
        </div>
        <div class="card reveal" style="text-align: center;">
            <i class="fas fa-envelope"></i>
            <h3>Email</h3>
            <p><?php echo esc_html(get_theme_mod('wp_titans_contact_email', 'hello@wordpresstitans.com')); ?></p>
        </div>
        <div class="card reveal" style="text-align: center;">
            <i class="fas fa-location-dot"></i>
            <h3>Location</h3>
            <p><?php echo esc_html(get_theme_mod('wp_titans_contact_location', 'Paete, Laguna, Philippines')); ?></p>
        </div>
    </div>

    <div class="reveal" style="max-width: 1000px; margin: 0 auto; background: #111; padding: 5rem; border-radius: 12px; border: 1px solid var(--border-glass);">
        <h2 style="text-align: center; margin-bottom: 3rem;">Send Us a Message</h2>
        <form class="contact-form-full">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                <input type="text" placeholder="Your Name *" required style="width: 100%; padding: 1.2rem; background: #000; border: 1px solid #333; color: white;">
                <input type="text" placeholder="Business Name *" required style="width: 100%; padding: 1.2rem; background: #000; border: 1px solid #333; color: white;">
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                <input type="email" placeholder="Email Address *" required style="width: 100%; padding: 1.2rem; background: #000; border: 1px solid #333; color: white;">
                <input type="tel" placeholder="Phone Number" style="width: 100%; padding: 1.2rem; background: #000; border: 1px solid #333; color: white;">
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                <select style="width: 100%; padding: 1.2rem; background: #000; border: 1px solid #333; color: white;">
                    <option value="">Select your industry...</option>
                    <option>Consulting</option>
                    <option>Coaching</option>
                    <option>Legal</option>
                    <option>Healthcare</option>
                    <option>Other</option>
                </select>
                <select style="width: 100%; padding: 1.2rem; background: #000; border: 1px solid #333; color: white;">
                    <option value="">Desired Timeline...</option>
                    <option>Immediate</option>
                    <option>1-2 Months</option>
                    <option>Planning Phase</option>
                </select>
            </div>
            <textarea rows="6" placeholder="Tell us about your project details..." style="width: 100%; padding: 1.2rem; background: #000; border: 1px solid #333; color: white; margin-bottom: 2rem;"></textarea>

            <div style="margin-bottom: 3rem;">
                <label style="display: flex; align-items: center; gap: 1rem; cursor: pointer; color: var(--text-dim);">
                    <input type="checkbox" required style="width: 20px; height: 20px;">
                    I agree to the privacy policy and understand my data will be processed to respond to my inquiry.
                </label>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; font-size: 1.2rem;">Get Your Free Consultation</button>
        </form>
    </div>
</section>

<?php get_footer(); ?>
