<?php
/**
 * Template Name: Titan Lab Page
 */
get_header(); ?>

<main style="padding-top: 10rem; background: #000; min-height: 100vh;">
    <section id="lab-hero" style="text-align: center; padding-bottom: 5rem;">
        <div class="reveal">
            <span class="tagline">Inside the Protocol</span>
            <h1 style="font-size: clamp(3rem, 8vw, 5rem); margin-bottom: 2rem;">The Titan Lab</h1>
            <p style="max-width: 800px; margin: 0 auto; color: var(--text-dim); font-size: 1.25rem;">Explore the methodology, toolset, and authority culture that powers our 14-day velocity sprints.</p>
        </div>
    </section>

    <section id="lab-grid" style="background: #050505; border-top: 1px solid var(--border-glass); padding: 8rem 10%;">
        <div class="grid-2">
            <div class="reveal">
                <h2 style="margin-bottom: 2rem;">The Authority Tech Stack</h2>
                <p style="color: var(--text-dim); margin-bottom: 3rem;">We don't use generic tools. We use a curated arsenal designed for performance, security, and elite conversion.</p>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <div style="background: #111; padding: 2rem; border-radius: 8px; border: 1px solid #222;">
                        <h4 style="color: var(--primary); font-size: 0.8rem; margin-bottom: 1rem;">ENGINEERING</h4>
                        <p style="font-size: 0.9rem; color: white;">Clean-code WordPress Core with Headless architecture options.</p>
                    </div>
                    <div style="background: #111; padding: 2rem; border-radius: 8px; border: 1px solid #222;">
                        <h4 style="color: var(--primary); font-size: 0.8rem; margin-bottom: 1rem;">VELOCITY</h4>
                        <p style="font-size: 0.9rem; color: white;">Proprietary 14-Day Sprint framework for rapid delivery.</p>
                    </div>
                </div>
            </div>
            <div class="reveal">
                <div style="aspect-ratio: 16/10; background: #000; border: 1px solid var(--border-glass); border-radius: 12px; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                    <i class="fas fa-microscope" style="font-size: 8rem; color: var(--primary); opacity: 0.1;"></i>
                    <div style="position: absolute; bottom: 2rem; left: 2rem; right: 2rem; text-align: left;">
                        <span style="font-size: 0.6rem; text-transform: uppercase; color: var(--primary); letter-spacing: 2px;">LIVE STATUS</span>
                        <h4 style="color: white; margin-top: 0.5rem;">Optimizing Authority Engine v2.4</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="lab-methodology" style="background: #000; padding: 8rem 10%;">
        <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
            <span class="tagline">Our Pillars</span>
            <h2>How We Think</h2>
        </div>
        <div class="grid-cards">
            <div class="card reveal" style="background: #050505;">
                <i class="fas fa-vial"></i>
                <h3>Rapid Prototyping</h3>
                <p>We move from wireframe to cinematic high-fidelity in 72 hours.</p>
            </div>
            <div class="card reveal" style="background: #050505;">
                <i class="fas fa-brain"></i>
                <h3>Cognitive Design</h3>
                <p>Applying psychological triggers to guide high-ticket prospects to conversion.</p>
            </div>
            <div class="card reveal" style="background: #050505;">
                <i class="fas fa-shield-virus"></i>
                <h3>Security Hardening</h3>
                <p>Enterprise-grade protocols to protect your digital authority.</p>
            </div>
        </div>
    </section>

    <section id="lab-call-to-action" style="background: #D4AF37; color: black; text-align: center; padding: 6rem 10%;">
        <div class="reveal">
            <h2 style="color: black; margin-bottom: 2rem;">Ready to See Your Brand in the Lab?</h2>
            <a href="<?php echo get_permalink(get_page_by_path('free-authority-audit')); ?>" class="btn btn-audit-cta">Initialize My Authority Scan</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
