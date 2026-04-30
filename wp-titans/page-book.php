<?php
/**
 * Template Name: Book a Call
 */
get_header(); ?>

<main style="padding-top: 10rem; background: #000;">
    <section id="booking-hero" style="text-align: center; padding-bottom: 5rem;">
        <div class="reveal">
            <span class="tagline">Final Step</span>
            <h1 style="font-size: clamp(3rem, 8vw, 5rem); margin-bottom: 2rem;">Let's Build Your Authority</h1>
            <p style="max-width: 700px; margin: 0 auto; color: var(--text-dim); font-size: 1.25rem;">Select a time below for your 15-minute strategy call. We'll discuss your goals and see if we're the right fit for your project.</p>
        </div>
    </section>

    <section id="booking-interface" style="background: #050505; border-top: 1px solid var(--border-glass);">
        <div class="grid-2">
            <div class="reveal">
                <div style="background: #111; padding: 4rem; border-radius: 12px; border: 1px solid var(--border-glass);">
                    <h2 style="font-size: 2.5rem; margin-bottom: 2rem;">What to Expect</h2>
                    <ul style="color: var(--text-dim); line-height: 2; font-size: 1.1rem;">
                        <li><i class="fas fa-check" style="color: var(--primary); margin-right: 15px;"></i> A deep dive into your current website challenges.</li>
                        <li><i class="fas fa-check" style="color: var(--primary); margin-right: 15px;"></i> Clarity on your authority positioning and ideal client.</li>
                        <li><i class="fas fa-check" style="color: var(--primary); margin-right: 15px;"></i> A breakdown of our 14-day Authority System™ process.</li>
                        <li><i class="fas fa-check" style="color: var(--primary); margin-right: 15px;"></i> No high-pressure sales — just strategy and value.</li>
                    </ul>

                    <div style="margin-top: 4rem; padding-top: 3rem; border-top: 1px solid #222; display: flex; align-items: center; gap: 2rem;">
                        <img loading="lazy" src="<?php echo esc_url(wp_titans_get_mod("wp_titans_founder_image")); ?>" alt="Ross" style="width: 80px; height: 80px; border-radius: 50%; border: 2px solid var(--primary);">
                        <div>
                            <p style="margin: 0; font-weight: 700; color: white;"> Ross Dalangin</p>
                            <small style="color: var(--text-dim);">Founder, WordPress Titans</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="reveal">
                <!-- Placeholder for Calendly or other booking widget -->
                <div style="background: #111; min-height: 600px; border-radius: 12px; border: 1px solid var(--primary); display: flex; align-items: center; justify-content: center; text-align: center; padding: 3rem;">
                    <div>
                        <i class="fas fa-calendar-alt" style="font-size: 4rem; color: var(--primary); margin-bottom: 2rem;"></i>
                        <h3>Booking Widget Placeholder</h3>
                        <p style="color: var(--text-dim); margin-top: 1rem;">Paste your Calendly or booking embed code here in the template file or via Customizer (Header/Footer scripts).</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="booking-trust" style="background: #000; text-align: center; padding-top: 0;">
        <div class="reveal" style="max-width: 900px; margin: 0 auto; border-top: 1px solid #222; padding-top: 6rem;">
            <p style="font-size: 1.5rem; font-style: italic; color: var(--text-main);">"The strategy call was the most valuable 15 minutes I've spent on my business this year. Ross immediately saw what was missing from my message."</p>
            <p style="margin-top: 2rem; font-weight: 700; color: var(--primary);">— David H., Executive Coach</p>
        </div>
    </section>
</main>

<?php get_footer(); ?>
