<?php
/**
 * Template Name: Free Audit Page
 */
get_header(); ?>

<main style="padding-top: 10rem; background: #000; min-height: 100vh;">
    <section id="audit-header" style="text-align: center; padding-bottom: 5rem;">
        <div class="reveal">
            <span class="tagline">Authority Scan</span>
            <h1 style="font-size: clamp(3rem, 8vw, 5rem); margin-bottom: 2rem;">Free Website Authority Audit</h1>
            <p style="max-width: 800px; margin: 0 auto; color: var(--text-dim); font-size: 1.25rem;">Is your current website costing you leads? Get a 100% manual review by our agency strategists focused on positioning, speed, and conversion.</p>
        </div>
    </section>

    <section id="audit-form-section" style="background: #050505; border-top: 1px solid var(--border-glass); padding: 8rem 5%;">
        <div class="grid-2" style="max-width: 1200px; margin: 0 auto; align-items: flex-start;">
            <div class="reveal">
                <h2 style="font-size: 2.5rem; margin-bottom: 2.5rem;">What we'll analyze:</h2>
                <ul style="color: var(--text-dim); line-height: 2.5; font-size: 1.1rem;">
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 15px;"></i> **Conversion Friction**: Identifying why users aren't converting.</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 15px;"></i> **Authority Positioning**: Analyzing your brand's expert status.</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 15px;"></i> **Technical Performance**: Core Web Vitals and speed scan.</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 15px;"></i> **Strategic Gap Analysis**: What your competitors are doing better.</li>
                </ul>
                <div style="margin-top: 4rem; padding: 3rem; background: #111; border-radius: 12px; border: 1px solid var(--primary);">
                    <p style="margin: 0; font-style: italic; color: #eee;">"The audit Ross sent over was the catalyst for our 140% growth. He identified three 'leaks' in our funnel we had no idea existed."</p>
                    <p style="margin-top: 1.5rem; font-weight: 700; color: var(--primary);">— Mark T., SaaS Founder</p>
                </div>
            </div>

            <div class="reveal">
                <div style="background: #111; padding: 5rem; border-radius: 12px; border: 1px solid var(--border-glass);">
                    <?php
                    $cf7 = wp_titans_get_mod("wp_titans_cf7_shortcode");
                    if ($cf7) :
                        echo do_shortcode($cf7);
                    else : ?>
                    <form id="audit-request-form">
                        <div style="margin-bottom: 2rem;">
                            <label style="color: var(--primary); text-transform: uppercase; font-size: 0.75rem; letter-spacing: 2px; font-weight: 700;">Website URL *</label>
                            <input type="url" placeholder="https://yourwebsite.com" required style="width: 100%; padding: 1.2rem; background: #000; border: 1px solid #333; color: white; border-radius: 4px; margin-top: 0.5rem;">
                        </div>
                        <div style="margin-bottom: 2rem;">
                            <label style="color: var(--primary); text-transform: uppercase; font-size: 0.75rem; letter-spacing: 2px; font-weight: 700;">Work Email *</label>
                            <input type="email" placeholder="you@company.com" required style="width: 100%; padding: 1.2rem; background: #000; border: 1px solid #333; color: white; border-radius: 4px; margin-top: 0.5rem;">
                        </div>
                        <div style="margin-bottom: 2rem;">
                            <label style="color: var(--primary); text-transform: uppercase; font-size: 0.75rem; letter-spacing: 2px; font-weight: 700;">Primary Goal</label>
                            <select style="width: 100%; padding: 1.2rem; background: #000; border: 1px solid #333; color: white; border-radius: 4px; margin-top: 0.5rem;">
                                <option>More Leads</option>
                                <option>Better Branding</option>
                                <option>Faster Loading</option>
                                <option>All of the above</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%; font-size: 1.1rem; padding: 1.5rem;">Request Manual Audit</button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
