<?php
/**
 * Template Name: Client Portal
 */
get_header(); ?>

<main style="padding-top: 10rem; background: #000; min-height: 100vh;">
    <section id="portal-header" style="padding-left: 10%; padding-right: 10%; margin-bottom: 5rem;">
        <div class="reveal" style="display: flex; justify-content: space-between; align-items: flex-end;">
            <div>
                <span class="tagline">Welcome Back, Titan</span>
                <h1 style="font-size: 3.5rem; margin-top: 1rem;">Client Command Center</h1>
            </div>
            <div style="text-align: right;">
                <p style="color: var(--primary); font-weight: 700; font-family: 'Syne';">PROJECT STATUS</p>
                <div style="background: #111; padding: 0.5rem 1.5rem; border-radius: 50px; border: 1px solid var(--primary); display: inline-block; margin-top: 0.5rem;">
                    <span style="font-size: 0.8rem; font-weight: 800; color: white;">IN STRATEGY PHASE</span>
                </div>
            </div>
        </div>
    </section>

    <section id="portal-grid" style="background: #050505; border-top: 1px solid var(--border-glass); padding: 8rem 10%;">
        <div class="grid-cards" style="grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));">
            <!-- Project Links -->
            <div class="card reveal" style="background: #111;">
                <i class="fas fa-link" style="font-size: 1.5rem; margin-bottom: 2rem;"></i>
                <h3 style="font-size: 1.5rem;">Quick Links</h3>
                <ul style="color: var(--text-dim); line-height: 2.5; margin-top: 2rem;">
                    <li><a href="#" style="color: white; font-weight: 700;"><i class="fas fa-file-contract" style="color: var(--primary); margin-right: 10px;"></i> Master Services Agreement</a></li>
                    <li><a href="#" style="color: white; font-weight: 700;"><i class="fas fa-map" style="color: var(--primary); margin-right: 10px;"></i> Strategic Roadmap</a></li>
                    <li><a href="#" style="color: white; font-weight: 700;"><i class="fas fa-folder-open" style="color: var(--primary); margin-right: 10px;"></i> Shared Google Drive</a></li>
                    <li><a href="#" style="color: white; font-weight: 700;"><i class="fas fa-video" style="color: var(--primary); margin-right: 10px;"></i> Strategy Call Recordings</a></li>
                </ul>
            </div>

            <!-- Milestone Tracker -->
            <div class="card reveal" style="background: #111; border-color: var(--primary);">
                <i class="fas fa-tasks" style="font-size: 1.5rem; margin-bottom: 2rem;"></i>
                <h3 style="font-size: 1.5rem;">The 14-Day Velocity</h3>
                <div style="margin-top: 3rem;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                        <span style="font-size: 0.8rem; font-weight: 700;">Overall Progress</span>
                        <span style="font-size: 0.8rem; font-weight: 700; color: var(--primary);">25%</span>
                    </div>
                    <div style="width: 100%; height: 6px; background: #000; border-radius: 10px; overflow: hidden; margin-bottom: 3rem;">
                        <div style="width: 25%; height: 100%; background: var(--primary); box-shadow: 0 0 10px var(--primary);"></div>
                    </div>

                    <ul style="font-size: 0.9rem; color: var(--text-dim);">
                        <li style="margin-bottom: 1.5rem; color: white;"><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Phase 01: Strategy & Blueprint</li>
                        <li style="margin-bottom: 1.5rem; opacity: 0.4;"><i class="far fa-circle" style="margin-right: 10px;"></i> Phase 02: Copywriting & Content</li>
                        <li style="margin-bottom: 1.5rem; opacity: 0.4;"><i class="far fa-circle" style="margin-right: 10px;"></i> Phase 03: Design & Implementation</li>
                        <li style="margin-bottom: 1.5rem; opacity: 0.4;"><i class="far fa-circle" style="margin-right: 10px;"></i> Phase 04: Development & Launch</li>
                    </ul>
                </div>
            </div>

            <!-- Support & Communication -->
            <div class="card reveal" style="background: #111;">
                <i class="fas fa-headset" style="font-size: 1.5rem; margin-bottom: 2rem;"></i>
                <h3 style="font-size: 1.5rem;">Agency Support</h3>
                <p style="margin-top: 1.5rem; font-size: 0.95rem;">Have questions? Reach out directly to your lead strategist via Slack or Email.</p>
                <div style="margin-top: 3rem; display: flex; flex-direction: column; gap: 1rem;">
                    <a href="https://slack.com" class="btn btn-outline" style="width: 100%; padding: 1rem;"><i class="fab fa-slack"></i> Open Agency Slack</a>
                    <a href="mailto:support@wordpresstitans.com" class="btn btn-outline" style="width: 100%; padding: 1rem;"><i class="fas fa-envelope"></i> Email Support</a>
                </div>
            </div>
        </div>
    </section>

    <section id="portal-cta" style="background: #000; text-align: center; border-top: 1px solid var(--border-glass);">
        <div class="reveal">
            <h2 style="font-size: 2rem;">Need to Book an Urgent Sync?</h2>
            <p style="color: var(--text-dim); margin-bottom: 3rem; margin-top: 1.5rem;">As an active Titan client, you have priority access to our strategy team.</p>
            <a href="<?php echo get_permalink(get_page_by_path('book-a-strategy-call')); ?>" class="btn btn-primary">Book Client Priority Call</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
