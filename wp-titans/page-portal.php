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
                <select id="status-selector" style="background: #111; padding: 0.5rem 1.5rem; border-radius: 50px; border: 1px solid var(--primary); color: white; font-size: 0.8rem; font-weight: 800; cursor: pointer; appearance: none; text-align: center;">
                    <option value="25">STRATEGY PHASE (25%)</option>
                    <option value="50">CONTENT & DESIGN (50%)</option>
                    <option value="75">DEVELOPMENT (75%)</option>
                    <option value="100">LAUNCH READY (100%)</option>
                </select>
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
                        <span style="font-size: 0.8rem; font-weight: 700; color: var(--primary);" id="progress-val">25%</span>
                    </div>
                    <div style="width: 100%; height: 6px; background: #000; border-radius: 10px; overflow: hidden; margin-bottom: 3rem;">
                        <div id="progress-bar" style="width: 25%; height: 100%; background: var(--primary); box-shadow: 0 0 10px var(--primary); transition: width 0.8s cubic-bezier(0.16, 1, 0.3, 1);"></div>
                    </div>

                    <ul id="milestone-list" style="font-size: 0.9rem; color: var(--text-dim);">
                        <li class="milestone active" data-val="25" style="margin-bottom: 1.5rem; transition: var(--transition);"><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Phase 01: Strategy & Blueprint</li>
                        <li class="milestone" data-val="50" style="margin-bottom: 1.5rem; transition: var(--transition); opacity: 0.4;"><i class="far fa-circle" style="margin-right: 10px;"></i> Phase 02: Copywriting & Content</li>
                        <li class="milestone" data-val="75" style="margin-bottom: 1.5rem; transition: var(--transition); opacity: 0.4;"><i class="far fa-circle" style="margin-right: 10px;"></i> Phase 03: Design & Implementation</li>
                        <li class="milestone" data-val="100" style="margin-bottom: 1.5rem; transition: var(--transition); opacity: 0.4;"><i class="far fa-circle" style="margin-right: 10px;"></i> Phase 04: Development & Launch</li>
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

    <section id="portal-tasks" style="background: #080808; border-top: 1px solid var(--border-glass); padding: 8rem 10%;">
        <div class="reveal">
            <h2 style="margin-bottom: 3rem;">Client Tasks</h2>
            <div style="background: #111; padding: 3rem; border-radius: 12px; border: 1px solid #222;">
                <div class="task-item" style="display: flex; align-items: center; gap: 2rem; padding: 1.5rem 0; border-bottom: 1px solid #222;">
                    <input type="checkbox" checked style="width: 25px; height: 25px; accent-color: var(--primary);">
                    <span style="flex: 1; font-weight: 700;">Complete Strategic Onboarding Questionnaire</span>
                    <span style="background: rgba(46, 204, 113, 0.1); color: #2ecc71; font-size: 0.7rem; padding: 0.4rem 1rem; border-radius: 50px; font-weight: 800;">COMPLETED</span>
                </div>
                <div class="task-item" style="display: flex; align-items: center; gap: 2rem; padding: 1.5rem 0; border-bottom: 1px solid #222;">
                    <input type="checkbox" style="width: 25px; height: 25px; accent-color: var(--primary);">
                    <span style="flex: 1; font-weight: 700;">Upload High-Resolution Assets to Shared Drive</span>
                    <span style="background: rgba(212, 175, 55, 0.1); color: var(--primary); font-size: 0.7rem; padding: 0.4rem 1rem; border-radius: 50px; font-weight: 800;">ACTION REQUIRED</span>
                </div>
                <div class="task-item" style="display: flex; align-items: center; gap: 2rem; padding: 1.5rem 0;">
                    <input type="checkbox" style="width: 25px; height: 25px; accent-color: var(--primary);">
                    <span style="flex: 1; font-weight: 700;">Approve Core Messaging Blueprint</span>
                    <span style="background: rgba(212, 175, 55, 0.1); color: var(--primary); font-size: 0.7rem; padding: 0.4rem 1rem; border-radius: 50px; font-weight: 800;">ACTION REQUIRED</span>
                </div>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const selector = document.getElementById('status-selector');
        const bar = document.getElementById('progress-bar');
        const valText = document.getElementById('progress-val');
        const milestones = document.querySelectorAll('.milestone');

        selector.addEventListener('change', (e) => {
            const val = e.target.value;
            bar.style.width = val + '%';
            valText.innerText = val + '%';

            milestones.forEach(m => {
                const mVal = m.getAttribute('data-val');
                const icon = m.querySelector('i');
                if (parseInt(mVal) <= parseInt(val)) {
                    m.style.opacity = '1';
                    m.style.color = 'white';
                    icon.className = 'fas fa-check-circle';
                    icon.style.color = 'var(--primary)';
                } else {
                    m.style.opacity = '0.4';
                    m.style.color = 'var(--text-dim)';
                    icon.className = 'far fa-circle';
                    icon.style.color = 'inherit';
                }
            });
        });
    });
    </script>

    <section id="portal-cta" style="background: #000; text-align: center; border-top: 1px solid var(--border-glass);">
        <div class="reveal">
            <h2 style="font-size: 2rem;">Need to Book an Urgent Sync?</h2>
            <p style="color: var(--text-dim); margin-bottom: 3rem; margin-top: 1.5rem;">As an active Titan client, you have priority access to our strategy team.</p>
            <a href="<?php echo get_permalink(get_page_by_path('book-a-strategy-call')); ?>" class="btn btn-primary">Book Client Priority Call</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
