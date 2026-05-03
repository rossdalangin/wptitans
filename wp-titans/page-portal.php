<?php
/**
 * Template Name: Client Portal
 */
get_header(); ?>

<main style="padding-top: 10rem; background: #000; min-height: 100vh; position: relative;">
    <!-- Simulated Login Overlay -->
    <div id="portal-login" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: #000; z-index: 2000; display: flex; align-items: center; justify-content: center; padding: 2rem;">
        <div class="reveal visible" style="max-width: 450px; width: 100%; background: #111; padding: 4rem; border-radius: 12px; border: 1px solid var(--primary); text-align: center;">
            <i class="fas fa-lock" style="font-size: 3rem; color: var(--primary); margin-bottom: 2rem;"></i>
            <h2 style="margin-bottom: 1rem;">Titan Access</h2>
            <p style="color: var(--text-dim); margin-bottom: 3rem;">Enter your project ID to access your Command Center.</p>
            <form id="login-sim">
                <input type="text" placeholder="Project ID (e.g. TITAN-2026)" required style="width: 100%; padding: 1.2rem; background: #000; border: 1px solid #333; color: white; border-radius: 4px; margin-bottom: 1.5rem; text-align: center; letter-spacing: 2px;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Initialize Connection</button>
            </form>
            <p style="margin-top: 2rem; font-size: 0.8rem; color: #444;">Lost your ID? Contact your lead strategist.</p>
        </div>
    </div>

    <section id="portal-header" style="padding-left: 10%; padding-right: 10%; margin-bottom: 5rem;">
        <div class="reveal" style="display: flex; justify-content: space-between; align-items: flex-end;">
            <div>
                <span class="tagline">Welcome Back, Titan</span>
                <h1 style="font-size: 3.5rem; margin-top: 1rem;"><?php echo esc_html(wp_titans_get_mod('wp_titans_portal_title')); ?></h1>
            </div>
            <div style="text-align: right;">
                <p style="color: var(--primary); font-weight: 700; font-family: 'Syne';">PROJECT STATUS</p>
                <?php $default_status = wp_titans_get_mod('wp_titans_portal_status'); ?>
                <select id="status-selector" style="background: #111; padding: 0.5rem 1.5rem; border-radius: 50px; border: 1px solid var(--primary); color: white; font-size: 0.8rem; font-weight: 800; cursor: pointer; appearance: none; text-align: center;">
                    <option value="25" <?php selected($default_status, '25'); ?>>STRATEGY PHASE (25%)</option>
                    <option value="50" <?php selected($default_status, '50'); ?>>CONTENT & DESIGN (50%)</option>
                    <option value="75" <?php selected($default_status, '75'); ?>>DEVELOPMENT (75%)</option>
                    <option value="100" <?php selected($default_status, '100'); ?>>LAUNCH READY (100%)</option>
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
                    <li><a href="<?php echo esc_url(wp_titans_get_mod('wp_titans_portal_link_msa')); ?>" style="color: white; font-weight: 700;"><i class="fas fa-file-contract" style="color: var(--primary); margin-right: 10px;"></i> Master Services Agreement</a></li>
                    <li><a href="<?php echo esc_url(wp_titans_get_mod('wp_titans_portal_link_roadmap')); ?>" style="color: white; font-weight: 700;"><i class="fas fa-map" style="color: var(--primary); margin-right: 10px;"></i> Strategic Roadmap</a></li>
                    <li><a href="<?php echo esc_url(wp_titans_get_mod('wp_titans_portal_link_drive')); ?>" style="color: white; font-weight: 700;"><i class="fas fa-folder-open" style="color: var(--primary); margin-right: 10px;"></i> Shared Google Drive</a></li>
                    <li><a href="<?php echo esc_url(wp_titans_get_mod('wp_titans_portal_link_recordings')); ?>" style="color: white; font-weight: 700;"><i class="fas fa-video" style="color: var(--primary); margin-right: 10px;"></i> Strategy Call Recordings</a></li>
                </ul>
            </div>

            <!-- Milestone Tracker -->
            <div class="card reveal" style="background: #111; border-color: var(--primary);">
                <div id="velocity-chart" style="width: 100%; height: 60px; margin-bottom: 1.5rem; display: flex; align-items: flex-end; gap: 4px; opacity: 0.3;">
                    <div style="flex: 1; height: 30%; background: var(--primary);"></div>
                    <div style="flex: 1; height: 45%; background: var(--primary);"></div>
                    <div style="flex: 1; height: 60%; background: var(--primary);"></div>
                    <div style="flex: 1; height: 55%; background: var(--primary);"></div>
                    <div style="flex: 1; height: 80%; background: var(--primary);"></div>
                    <div style="flex: 1; height: 95%; background: var(--primary);"></div>
                    <div style="flex: 1; height: 100%; background: var(--primary);"></div>
                </div>
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

    <section id="portal-activity" style="background: #080808; border-top: 1px solid var(--border-glass); padding: 8rem 10%;">
        <div class="grid-2" style="align-items: flex-start;">
            <div class="reveal">
                <h2 style="margin-bottom: 3rem;">Project Tasks</h2>
                <div style="background: #111; padding: 3rem; border-radius: 12px; border: 1px solid #222;">
                    <div class="task-item" style="display: flex; align-items: center; gap: 2rem; padding: 1.5rem 0; border-bottom: 1px solid #222;">
                        <input type="checkbox" checked style="width: 25px; height: 25px; accent-color: var(--primary);">
                        <span style="flex: 1; font-weight: 700;">Complete Strategic Onboarding Questionnaire</span>
                        <span class="task-badge" style="background: rgba(46, 204, 113, 0.1); color: #2ecc71; font-size: 0.7rem; padding: 0.4rem 1rem; border-radius: 50px; font-weight: 800;">COMPLETED</span>
                    </div>
                    <div class="task-item" style="display: flex; align-items: center; gap: 2rem; padding: 1.5rem 0; border-bottom: 1px solid #222;">
                        <input type="checkbox" style="width: 25px; height: 25px; accent-color: var(--primary);">
                        <span style="flex: 1; font-weight: 700;">Upload High-Resolution Assets to Shared Drive</span>
                        <span class="task-badge" style="background: rgba(212, 175, 55, 0.1); color: var(--primary); font-size: 0.7rem; padding: 0.4rem 1rem; border-radius: 50px; font-weight: 800;">ACTION REQUIRED</span>
                    </div>
                    <div class="task-item" style="display: flex; align-items: center; gap: 2rem; padding: 1.5rem 0;">
                        <input type="checkbox" style="width: 25px; height: 25px; accent-color: var(--primary);">
                        <span style="flex: 1; font-weight: 700;">Approve Core Messaging Blueprint</span>
                        <span class="task-badge" style="background: rgba(212, 175, 55, 0.1); color: var(--primary); font-size: 0.7rem; padding: 0.4rem 1rem; border-radius: 50px; font-weight: 800;">ACTION REQUIRED</span>
                    </div>
                </div>
            </div>

            <div class="reveal">
                <h2 style="margin-bottom: 3rem;">Recent Messages</h2>
                <div id="message-board" style="background: #111; padding: 3rem; border-radius: 12px; border: 1px solid #222; max-height: 400px; overflow-y: auto;">
                    <div class="message" style="margin-bottom: 2rem; border-left: 2px solid var(--primary); padding-left: 1.5rem;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                            <strong style="color: var(--primary);">Ross Dalangin</strong>
                            <small style="color: #444;">Today, 10:15 AM</small>
                        </div>
                        <p style="font-size: 0.9rem; color: #ccc;">Welcome to your Command Center! I've just uploaded the initial site architecture. Please review the 'Sitemap' link in your Quick Links section.</p>
                    </div>
                    <div class="message" style="opacity: 0.5;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                            <strong style="color: white;">System Notification</strong>
                            <small style="color: #444;">Yesterday</small>
                        </div>
                        <p style="font-size: 0.9rem; color: #ccc;">Onboarding questionnaire received. Strategy session scheduled for tomorrow.</p>
                    </div>
                </div>
                <div style="margin-top: 1.5rem; display: flex; gap: 1rem;">
                    <input type="text" id="portal-msg-input" placeholder="Type a message to the team..." style="flex: 1; background: #000; border: 1px solid #222; color: white; padding: 1rem; border-radius: 4px;">
                    <button id="portal-msg-send" class="btn btn-primary" style="padding: 1rem 2rem;">Send</button>
                </div>
            </div>
        </div>
    </section>

    <section id="portal-health" style="background: #000; border-top: 1px solid var(--border-glass); padding: 8rem 10%;">
        <div class="reveal">
            <h2 style="margin-bottom: 3rem;">Site Health & Performance</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                <div style="background: #050505; padding: 2.5rem; border: 1px solid #111; border-radius: 8px; text-align: center;">
                    <div style="font-size: 3rem; color: #2ecc71; font-weight: 900; font-family: 'Syne';">98</div>
                    <p style="font-size: 0.7rem; text-transform: uppercase; color: #555; letter-spacing: 2px; margin-top: 1rem;">Core Web Vitals</p>
                </div>
                <div style="background: #050505; padding: 2.5rem; border: 1px solid #111; border-radius: 8px; text-align: center;">
                    <div style="font-size: 3rem; color: var(--primary); font-weight: 900; font-family: 'Syne';">SSL</div>
                    <p style="font-size: 0.7rem; text-transform: uppercase; color: #555; letter-spacing: 2px; margin-top: 1rem;">Security Protocol</p>
                </div>
                <div style="background: #050505; padding: 2.5rem; border: 1px solid #111; border-radius: 8px; text-align: center;">
                    <div style="font-size: 3rem; color: var(--primary); font-weight: 900; font-family: 'Syne';">A+</div>
                    <p style="font-size: 0.7rem; text-transform: uppercase; color: #555; letter-spacing: 2px; margin-top: 1rem;">Authority Grade</p>
                </div>
            </div>
        </div>
    </section>

    <section id="portal-files" style="background: #050505; border-top: 1px solid var(--border-glass); padding: 8rem 10%;">
        <div class="reveal">
            <h2 style="margin-bottom: 3rem;">Secure File Drop</h2>
            <div id="file-drop-zone" style="border: 2px dashed #222; padding: 5rem; border-radius: 12px; text-align: center; transition: var(--transition); cursor: pointer;">
                <i class="fas fa-cloud-upload-alt" style="font-size: 3rem; color: #444; margin-bottom: 2rem;"></i>
                <p style="color: var(--text-dim);">Drag and drop project assets here (Logos, Images, Branding Docs)</p>
                <p style="font-size: 0.8rem; color: #444; margin-top: 1rem;">Max file size: 50MB. All transfers are SSL encrypted.</p>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Login Simulation
        const loginOverlay = document.getElementById('portal-login');
        const loginForm = document.getElementById('login-sim');

        if (sessionStorage.getItem('titan_auth')) {
            loginOverlay.style.display = 'none';
        }

        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = loginForm.querySelector('button');
            btn.innerText = 'Verifying...';
            setTimeout(() => {
                loginOverlay.style.opacity = '0';
                setTimeout(() => loginOverlay.style.display = 'none', 500);
                sessionStorage.setItem('titan_auth', 'true');
            }, 1200);
        });

        const selector = document.getElementById('status-selector');
        const bar = document.getElementById('progress-bar');
        const valText = document.getElementById('progress-val');
        const milestones = document.querySelectorAll('.milestone');
        const taskChecks = document.querySelectorAll('#portal-activity input[type="checkbox"]');

        const updateUI = (val) => {
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
        };

        selector.addEventListener('change', (e) => updateUI(e.target.value));

        taskChecks.forEach(check => {
            check.addEventListener('change', () => {
                const checkedCount = document.querySelectorAll('#portal-activity input[type="checkbox"]:checked').length;
                const totalCount = taskChecks.length;
                const taskProgress = (checkedCount / totalCount) * 10;

                const baseVal = parseInt(selector.value);
                updateUI(Math.min(100, baseVal + taskProgress));

                const statusSpan = check.parentElement.querySelector('.task-badge');
                if (check.checked) {
                    statusSpan.innerText = 'COMPLETED';
                    statusSpan.style.background = 'rgba(46, 204, 113, 0.1)';
                    statusSpan.style.color = '#2ecc71';
                } else {
                    statusSpan.innerText = 'ACTION REQUIRED';
                    statusSpan.style.background = 'rgba(212, 175, 55, 0.1)';
                    statusSpan.style.color = 'var(--primary)';
                }
            });
        });

        // Velocity Chart Hover
        const chart = document.getElementById('velocity-chart');
        chart.addEventListener('mouseenter', () => chart.style.opacity = '1');
        chart.addEventListener('mouseleave', () => chart.style.opacity = '0.3');

        // Message Simulation
        const msgBtn = document.getElementById('portal-msg-send');
        const msgInput = document.getElementById('portal-msg-input');
        const board = document.getElementById('message-board');

        msgBtn.addEventListener('click', () => {
            if (!msgInput.value) return;
            const newMsg = document.createElement('div');
            newMsg.className = 'message';
            newMsg.style.cssText = 'margin-bottom: 2rem; border-left: 2px solid #555; padding-left: 1.5rem; animation: reveal 0.5s ease;';
            newMsg.innerHTML = `<div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                <strong>You</strong>
                <small style="color: #444;">Just now</small>
            </div>
            <p style="font-size: 0.9rem; color: #ccc;">${msgInput.value}</p>`;
            board.prepend(newMsg);
            msgInput.value = '';
        });

        // File Drop Simulation
        const dropZone = document.getElementById('file-drop-zone');
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.style.borderColor = 'var(--primary)';
            dropZone.style.background = 'rgba(212, 175, 55, 0.05)';
        });
        dropZone.addEventListener('dragleave', () => {
            dropZone.style.borderColor = '#222';
            dropZone.style.background = 'transparent';
        });
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.innerHTML = `<i class="fas fa-check-circle" style="font-size: 3rem; color: #2ecc71; margin-bottom: 2rem;"></i>
            <p style="color: white; font-weight: 700;">Files Uploaded Successfully!</p>
            <p style="font-size: 0.8rem; color: #444; margin-top: 1rem;">The team has been notified.</p>`;
            dropZone.style.borderColor = '#2ecc71';
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
