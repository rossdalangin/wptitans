<?php
/**
 * Template Name: Service Detail Page
 */
get_header(); ?>

<main style="padding-top: 15vh; background: #000;">
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
                <h2 style="font-size: 3rem; margin-bottom: 2rem;">Why This Matters</h2>
                <p style="color: var(--text-dim); font-size: 1.1rem; margin-bottom: 3rem;">We don't just provide a service; we provide a business outcome. Our approach ensures that every technical decision supports your authority and growth.</p>
                <ul style="color: var(--text-dim); line-height: 2.2; font-size: 1.1rem;">
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 15px;"></i> Strategic alignment with your business goals.</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 15px;"></i> Built for high-performance and zero friction.</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 15px;"></i> Continuous optimization for elite results.</li>
                </ul>
            </div>
            <div class="reveal">
                <div style="background: #111; padding: 4rem; border-radius: 12px; border: 1px solid var(--border-glass);">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; border-radius: 8px; margin-bottom: 2rem;')); ?>
                    <?php endif; ?>
                    <div class="post-content" style="color: #eee;">
                        <?php the_content(); ?>
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
</main>

<?php get_footer(); ?>
