<?php
/**
 * Template Name: Workshop Landing Page
 */
get_header(); ?>

<main style="padding-top: 10rem; background: #000; min-height: 100vh;">
    <section id="workshop-hero" style="text-align: center; padding-bottom: 8rem;">
        <div class="reveal">
            <div style="background: rgba(212, 175, 55, 0.1); color: var(--primary); padding: 0.5rem 1.5rem; border-radius: 50px; display: inline-block; font-weight: 800; font-size: 0.75rem; letter-spacing: 2px; margin-bottom: 2rem; border: 1px solid var(--primary);">EXCLUSIVE LIVE TRAINING</div>
            <h1 style="font-size: clamp(3rem, 8vw, 5.5rem); margin-bottom: 2rem;">The $100k Authority Rebrand</h1>
            <p style="max-width: 800px; margin: 0 auto; color: var(--text-dim); font-size: 1.4rem; line-height: 1.6;">How to weaponize your expertise into a cinematic digital platform that closes $10k+ deals in 14 days.</p>

            <div style="margin-top: 4rem; display: flex; justify-content: center; gap: 3rem; flex-wrap: wrap;">
                <div style="text-align: center;">
                    <i class="fas fa-calendar-day" style="color: var(--primary); font-size: 1.5rem; margin-bottom: 0.5rem;"></i>
                    <p style="color: white; font-weight: 700; margin: 0;">Date: [Date]</p>
                </div>
                <div style="text-align: center;">
                    <i class="fas fa-clock" style="color: var(--primary); font-size: 1.5rem; margin-bottom: 0.5rem;"></i>
                    <p style="color: white; font-weight: 700; margin: 0;">Time: [Time]</p>
                </div>
                <div style="text-align: center;">
                    <i class="fas fa-video" style="color: var(--primary); font-size: 1.5rem; margin-bottom: 0.5rem;"></i>
                    <p style="color: white; font-weight: 700; margin: 0;">Location: Zoom Live</p>
                </div>
            </div>

            <div style="margin-top: 5rem;">
                <a href="#register" class="btn btn-primary" style="padding: 1.5rem 4rem; font-size: 1.2rem;">Secure Your Seat (Free)</a>
                <p style="margin-top: 1.5rem; color: #444; font-size: 0.85rem;">* Limited to 20 high-ticket experts per session.</p>
            </div>
        </div>
    </section>

    <section id="workshop-outcomes" style="background: #050505; border-top: 1px solid var(--border-glass); padding: 8rem 5%;">
        <div class="grid-2" style="max-width: 1200px; margin: 0 auto;">
            <div class="reveal">
                <h2 style="font-size: 2.5rem; margin-bottom: 3rem;">What You'll Master:</h2>
                <div style="display: grid; grid-template-columns: 1fr; gap: 2.5rem;">
                    <div style="display: flex; gap: 1.5rem;">
                        <div style="min-width: 40px; height: 40px; background: var(--primary); color: black; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 900;">1</div>
                        <div>
                            <h4 style="color: white; margin-bottom: 0.5rem;">The Authority Gap Diagnosis</h4>
                            <p style="color: var(--text-dim); font-size: 0.95rem;">Identify the exact elements on your current site that are scaring away $10k+ clients.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 1.5rem;">
                        <div style="min-width: 40px; height: 40px; background: var(--primary); color: black; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 900;">2</div>
                        <div>
                            <h4 style="color: white; margin-bottom: 0.5rem;">Cinematic Positioning Secrets</h4>
                            <p style="color: var(--text-dim); font-size: 0.95rem;">How to use high-contrast UI and motion to command immediate respect from visitors.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 1.5rem;">
                        <div style="min-width: 40px; height: 40px; background: var(--primary); color: black; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 900;">3</div>
                        <div>
                            <h4 style="color: white; margin-bottom: 0.5rem;">The 14-Day Velocity System</h4>
                            <p style="color: var(--text-dim); font-size: 0.95rem;">A breakdown of our proprietary sprint that compresses 6 months of agency work into 2 weeks.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="reveal">
                <div style="background: #111; padding: 4rem; border-radius: 12px; border: 1px solid var(--border-glass); text-align: center;">
                    <img loading="lazy" src="<?php echo esc_url(wp_titans_get_mod("wp_titans_founder_image")); ?>" alt="Founder" style="width: 120px; height: 120px; border-radius: 50%; margin: 0 auto 2rem; border: 3px solid var(--primary);">
                    <h3>Hosted by Ross Dalangin</h3>
                    <p style="color: var(--text-dim); margin-top: 1rem; font-size: 1rem;">20+ year agency veteran and lead strategist at WordPress Titans. Dedicated to helping world-class experts look as good as they actually are.</p>
                    <hr style="margin: 2.5rem 0; border: 0; border-top: 1px solid #222;">
                    <p style="font-style: italic; color: #eee; font-size: 1.1rem;">"The training was the pivot point for my consulting firm. We went from ghosted to booked out in 3 weeks."</p>
                </div>
            </div>
        </div>
    </section>

    <section id="register" style="background: #000; text-align: center; border-top: 1px solid var(--border-glass);">
        <div class="reveal" style="max-width: 600px; margin: 0 auto;">
            <h2 style="font-size: 2.5rem; margin-bottom: 2rem;">Claim Your Invite</h2>
            <p style="color: var(--text-dim); margin-bottom: 3.5rem;">Enter your work email below to receive the Zoom invite and the **Pre-Workshop Authority Audit** checklist.</p>
            <form id="workshop-form" style="display: flex; flex-direction: column; gap: 1.5rem;">
                <input type="text" placeholder="Full Name" required style="padding: 1.2rem; background: #080808; border: 1px solid #222; color: white; border-radius: 4px;">
                <input type="email" placeholder="Work Email" required style="padding: 1.2rem; background: #080808; border: 1px solid #222; color: white; border-radius: 4px;">
                <button type="submit" class="btn btn-primary" style="padding: 1.5rem;">Register for the Workshop</button>
            </form>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('workshop-form');
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            form.innerHTML = `<div style="padding: 4rem 0;">
                <i class="fas fa-check-circle" style="font-size: 4rem; color: #2ecc71; margin-bottom: 2rem;"></i>
                <h3 style="color:white;">Invite Secured!</h3>
                <p style="color:var(--text-dim); margin-top: 1rem;">Check your inbox for the Zoom link and your Authority Checklist.</p>
            </div>`;
        });
    }
});
</script>

<?php get_footer(); ?>
