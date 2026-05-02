<?php
/**
 * Template Name: Service Detail Page
 */
get_header(); ?>

<main style="padding-top: 10rem; background: #000;">
    <section id="service-hero" style="min-height: 50vh; text-align: left; padding-bottom: 5rem;">
        <div class="reveal">
            <span class="tagline">Service Details</span>
            <h1 style="font-size: clamp(3rem, 8vw, 5.5rem); margin-bottom: 2rem;"><?php the_title(); ?></h1>
            <div style="max-width: 800px; color: var(--text-dim); font-size: 1.4rem; line-height: 1.6;">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </section>

    <section id="service-benefits" style="background: #050505; border-top: 1px solid var(--border-glass);">
        <div class="grid-2">
            <div class="reveal">
                <h2 style="font-size: 3rem; margin-bottom: 2rem;">The Business Outcome</h2>
                <p style="color: var(--text-dim); font-size: 1.1rem; margin-bottom: 3rem;">We don't just provide a service; we deploy a strategic asset. Most agencies sell 'time' or 'designs'—we sell authority and conversion. Our approach ensures that every technical decision supports your market dominance.</p>

                <div style="display: grid; grid-template-columns: 1fr; gap: 2rem; margin-bottom: 3rem;">
                    <div style="background: #111; padding: 2rem; border-radius: 8px; border-left: 4px solid var(--primary);">
                        <h4 style="font-size: 1.1rem; color: white; margin-bottom: 0.5rem;">Authority Alignment</h4>
                        <p style="font-size: 0.9rem; color: #888;">Every pixel and paragraph is engineered to position you as the definitive expert in your niche.</p>
                    </div>
                    <div style="background: #111; padding: 2rem; border-radius: 8px; border-left: 4px solid var(--primary);">
                        <h4 style="font-size: 1.1rem; color: white; margin-bottom: 0.5rem;">Frictionless Conversion</h4>
                        <p style="font-size: 0.9rem; color: #888;">We strip away the noise and focus on the singular path that turns a visitor into a high-value lead.</p>
                    </div>
                    <div style="background: #111; padding: 2rem; border-radius: 8px; border-left: 4px solid var(--primary);">
                        <h4 style="font-size: 1.1rem; color: white; margin-bottom: 0.5rem;">Scalable Foundation</h4>
                        <p style="font-size: 0.9rem; color: #888;">Built on a high-performance WordPress architecture that grows with your team and your traffic.</p>
                    </div>
                </div>
            </div>
            <div class="reveal">
                <div style="background: #111; padding: 5rem; border-radius: 12px; border: 1px solid var(--border-glass); position: relative;">
                    <div style="position: absolute; top: -20px; right: -20px; background: var(--primary); color: black; font-weight: 900; padding: 1rem 2rem; border-radius: 4px; font-size: 0.8rem; transform: rotate(5deg); box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);">ELITE SERVICE</div>
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; border-radius: 8px; margin-bottom: 3rem;')); ?>
                    <?php endif; ?>
                    <div class="post-content" style="color: #eee; font-size: 1.1rem;">
                        <?php the_content(); ?>
                    </div>
                    <div style="margin-top: 4rem; padding-top: 3rem; border-top: 1px solid #222; display: flex; align-items: center; gap: 2rem;">
                        <div style="flex: 1;">
                            <p style="color: white; font-weight: 700; margin: 0;">Start with an Audit</p>
                            <small style="color: #666;">Get clarity on your current gaps before we build.</small>
                        </div>
                        <a href="<?php echo get_permalink(get_page_by_path('free-authority-audit')); ?>" class="btn btn-primary" style="padding: 0.8rem 1.5rem; font-size: 0.8rem;">Claim Free Audit</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="service-process" style="background: #000; border-top: 1px solid var(--border-glass);">
        <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
            <span class="tagline">The Workflow</span>
            <h2>Our 3-Phase Delivery</h2>
        </div>
        <div class="grid-cards">
            <div class="card reveal" style="border-top: 3px solid var(--primary);">
                <div style="font-weight: 900; color: var(--primary); font-size: 1.2rem; margin-bottom: 1.5rem;">01. STRATEGY</div>
                <h3>Discovery & Audit</h3>
                <p>We analyze your current positioning and identify the highest leverage opportunities for growth.</p>
            </div>
            <div class="card reveal" style="border-top: 3px solid var(--primary);">
                <div style="font-weight: 900; color: var(--primary); font-size: 1.2rem; margin-bottom: 1.5rem;">02. EXECUTION</div>
                <h3>Rapid Development</h3>
                <p>Our team works with elite precision to build your solution within our 14-day framework.</p>
            </div>
            <div class="card reveal" style="border-top: 3px solid var(--primary);">
                <div style="font-weight: 900; color: var(--primary); font-size: 1.2rem; margin-bottom: 1.5rem;">03. GROWTH</div>
                <h3>Launch & Support</h3>
                <p>We deploy your new asset and provide the strategic support needed to scale your authority.</p>
            </div>
        </div>
    </section>

    <section id="service-guarantee" style="background: #050505; text-align: center; border-top: 1px solid var(--border-glass);">
        <div class="reveal" style="max-width: 800px; margin: 0 auto; background: #111; padding: 4rem; border-radius: 12px; border: 1px solid var(--primary);">
            <i class="fas fa-hand-holding-heart" style="font-size: 3.5rem; color: var(--primary); margin-bottom: 2rem;"></i>
            <h2 style="font-size: 2.5rem; margin-bottom: 1.5rem;">The Titans Commitment</h2>
            <p style="font-size: 1.25rem; color: var(--text-dim); line-height: 1.6;">We stand by the quality and strategic impact of our work. If this service doesn't meet the authority standards we've set for your brand, we'll iterate until it's perfect. No questions asked.</p>
        </div>
    </section>
</main>

<?php get_footer(); ?>
