<?php
/**
 * Template Name: Titan Lab Page
 */
get_header(); ?>

<main style="padding-top: 10rem; background: #000; min-height: 100vh;">
    <section id="lab-hero" style="text-align: center; padding-bottom: 5rem;">
        <div class="reveal">
            <div style="display: flex; justify-content: center; gap: 1rem; margin-bottom: 3rem; opacity: 0.5;">
                <div style="width: 2px; height: 30px; background: var(--primary);"></div>
                <div style="width: 2px; height: 50px; background: var(--primary);"></div>
                <div style="width: 2px; height: 30px; background: var(--primary);"></div>
            </div>
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
                <div style="aspect-ratio: 16/10; background: #000; border: 1px solid var(--border-glass); border-radius: 12px; position: relative; overflow: hidden; display: flex; flex-direction: column;">
                    <div style="flex: 1; padding: 3rem; display: flex; flex-direction: column; justify-content: center;">
                        <div style="display: flex; gap: 2rem; align-items: flex-end; height: 100px;">
                            <?php for($i=1; $i<=20; $i++): $h = rand(20, 90); ?>
                                <div style="flex: 1; height: <?php echo $h; ?>%; background: var(--primary); opacity: <?php echo $h/100; ?>;"></div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div style="padding: 2rem; background: #080808; border-top: 1px solid #111;">
                        <span style="font-size: 0.6rem; text-transform: uppercase; color: var(--primary); letter-spacing: 2px;">AUTHORITY ENGINE v2.4</span>
                        <h4 style="color: white; margin-top: 0.5rem;">Live Performance Benchmarking</h4>
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
                <p>We move from wireframe to cinematic high-fidelity in 72 hours. Speed is our primary design constraint.</p>
            </div>
            <div class="card reveal" style="background: #050505;">
                <i class="fas fa-brain"></i>
                <h3>Cognitive UX</h3>
                <p>Applying contrast bias and authority anchors to guide high-ticket prospects toward the primary conversion point.</p>
            </div>
            <div class="card reveal" style="background: #050505;">
                <i class="fas fa-shield-virus"></i>
                <h3>Security Hardening</h3>
                <p>Enterprise-grade protocols to protect your digital authority from performance degradation and technical threats.</p>
            </div>
        </div>
    </section>

    <section id="lab-toolset" style="background: #050505; border-top: 1px solid var(--border-glass);">
        <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
            <span class="tagline">The Arsenal</span>
            <h2>Titan Tech Stack</h2>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
            <?php
            $tools = [
                ['n' => 'Figma', 'd' => 'High-Fidelity Design'],
                ['n' => 'Loom', 'd' => 'Authority Audits'],
                ['n' => 'Cloudflare', 'd' => 'WAF & Security'],
                ['n' => 'Slack', 'd' => 'Sync Comms'],
                ['n' => 'Stripe', 'd' => 'Global Payments'],
                ['n' => 'WP Engine', 'd' => 'Elite Hosting'],
            ];
            foreach($tools as $tool) : ?>
            <div class="reveal" style="background: #000; padding: 2.5rem; border: 1px solid #111; border-radius: 8px; text-align: center;">
                <h4 style="color: var(--primary); font-size: 1rem; margin-bottom: 0.5rem;"><?php echo $tool['n']; ?></h4>
                <p style="font-size: 0.7rem; color: #555; text-transform: uppercase; letter-spacing: 1px;"><?php echo $tool['d']; ?></p>
            </div>
            <?php endforeach; ?>
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
