<?php
/**
 * Template Name: Client Onboarding Protocol
 */
get_header(); ?>

<section id="onboarding-hero" style="background: #000; padding: 12rem 10% 8rem; text-align: center;">
    <div class="reveal">
        <i class="fas fa-rocket" style="font-size: 4rem; color: var(--primary); margin-bottom: 2rem;"></i>
        <h1 style="font-size: clamp(2.5rem, 8vw, 5rem); margin-bottom: 2rem;">Welcome to the Arsenal.</h1>
        <p style="font-size: 1.4rem; color: #ccc; max-width: 800px; margin: 0 auto 4rem;">The countdown to your authority launch begins now. Follow the protocols below to initialize your project.</p>
    </div>
</section>

<section id="onboarding-steps" style="background: #050505; border-top: 1px solid var(--border-glass);">
    <div class="reveal" style="max-width: 800px; margin: 0 auto;">
        <div class="onboarding-step" style="display: flex; gap: 3rem; margin-bottom: 5rem;">
            <div style="flex-shrink: 0; width: 60px; height: 60px; background: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: black; font-weight: 900; font-size: 1.5rem;">01</div>
            <div>
                <h3 style="margin-bottom: 1rem;">Execute Service Agreement</h3>
                <p style="color: #888; margin-bottom: 2rem;">Review and sign your Master Services Agreement (MSA) sent via DocuSign to formalize our engagement.</p>
                <a href="#" class="btn btn-outline" style="padding: 0.8rem 2rem; font-size: 0.8rem;">Access Agreement Portal</a>
            </div>
        </div>
        <div class="onboarding-step" style="display: flex; gap: 3rem; margin-bottom: 5rem;">
            <div style="flex-shrink: 0; width: 60px; height: 60px; background: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: black; font-weight: 900; font-size: 1.5rem;">02</div>
            <div>
                <h3 style="margin-bottom: 1rem;">Strategy Intelligence Brief</h3>
                <p style="color: #888; margin-bottom: 2rem;">Complete our deep-dive questionnaire. This provides the intelligence required to bridge your Authority Gap.</p>
                <a href="#" class="btn btn-outline" style="padding: 0.8rem 2rem; font-size: 0.8rem;">Launch Questionnaire</a>
            </div>
        </div>
        <div class="onboarding-step" style="display: flex; gap: 3rem; margin-bottom: 5rem;">
            <div style="flex-shrink: 0; width: 60px; height: 60px; background: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: black; font-weight: 900; font-size: 1.5rem;">03</div>
            <div>
                <h3 style="margin-bottom: 1rem;">Asset Deployment</h3>
                <p style="color: #888; margin-bottom: 2rem;">Upload your logos, existing content, and branding guidelines to our secure shared drive.</p>
                <a href="#" class="btn btn-outline" style="padding: 0.8rem 2rem; font-size: 0.8rem;">Open Secure Drive</a>
            </div>
        </div>
    </div>
</section>

<section id="onboarding-footer" style="background: #000; text-align: center; padding: 6rem 10%;">
    <div class="reveal">
        <h2 style="margin-bottom: 2rem;">Need Assistance?</h2>
        <p style="color: #888; margin-bottom: 3rem;">Your dedicated success manager is standing by.</p>
        <a href="mailto:success@wordpresstitans.com" class="btn btn-primary">Contact Success Team</a>
    </div>
</section>

<?php get_footer(); ?>
