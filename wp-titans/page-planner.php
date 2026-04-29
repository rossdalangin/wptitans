<?php
/**
 * Template Name: Project Planner
 */
get_header(); ?>

<main style="padding-top: 15vh; background: #000; min-height: 100vh;">
    <section id="planner-header" style="text-align: center; padding-bottom: 5rem;">
        <div class="reveal">
            <span class="tagline">Discovery Session</span>
            <h1 style="font-size: clamp(3rem, 8vw, 5rem); margin-bottom: 2rem;">Plan Your Authority Website</h1>
            <p style="max-width: 800px; margin: 0 auto; color: var(--text-dim); font-size: 1.25rem;">Answer a few questions to help us understand your vision and goals. This takes about 2 minutes.</p>
        </div>
    </section>

    <section id="planner-interface" style="background: #050505; border-top: 1px solid var(--border-glass); padding: 8rem 5%;">
        <div class="reveal" style="max-width: 800px; margin: 0 auto;">
            <div id="planner-container" style="background: #111; padding: 5rem; border-radius: 12px; border: 1px solid var(--border-glass); position: relative;">

                <div class="planner-progress" style="position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: #222; border-top-left-radius: 12px; border-top-right-radius: 12px; overflow: hidden;">
                    <div id="progress-fill" style="width: 25%; height: 100%; background: var(--primary); transition: width 0.4s ease;"></div>
                </div>

                <form id="multi-step-planner">
                    <!-- Step 1: Project Type -->
                    <div class="planner-step active" data-step="1">
                        <h2 style="font-size: 2rem; margin-bottom: 3rem;">What type of project is this?</h2>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                            <label class="option-card">
                                <input type="radio" name="project_type" value="new" checked>
                                <div class="option-content">
                                    <i class="fas fa-plus-circle"></i>
                                    <span>New Authority Site</span>
                                </div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="project_type" value="redesign">
                                <div class="option-content">
                                    <i class="fas fa-arrows-rotate"></i>
                                    <span>Website Redesign</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Step 2: Budget Range -->
                    <div class="planner-step" data-step="2" style="display: none;">
                        <h2 style="font-size: 2rem; margin-bottom: 3rem;">Estimated investment budget?</h2>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                            <label class="option-card">
                                <input type="radio" name="budget" value="2500-5000">
                                <div class="option-content"><span>$2.5k - $5k</span></div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="budget" value="5000-10000" checked>
                                <div class="option-content"><span>$5k - $10k</span></div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="budget" value="10000-20000">
                                <div class="option-content"><span>$10k - $20k</span></div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="budget" value="20000+">
                                <div class="option-content"><span>$20k+ (Enterprise)</span></div>
                            </label>
                        </div>
                    </div>

                    <!-- Step 3: Timeline -->
                    <div class="planner-step" data-step="3" style="display: none;">
                        <h2 style="font-size: 2rem; margin-bottom: 3rem;">How soon do you need to launch?</h2>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                            <label class="option-card">
                                <input type="radio" name="timeline" value="immediate" checked>
                                <div class="option-content"><span>ASAP (Elite 14-Day)</span></div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="timeline" value="1month">
                                <div class="option-content"><span>Within 30 Days</span></div>
                            </label>
                        </div>
                    </div>

                    <!-- Step 4: Contact Info -->
                    <div class="planner-step" data-step="4" style="display: none;">
                        <h2 style="font-size: 2rem; margin-bottom: 3rem;">Where should we send your proposal?</h2>
                        <div style="display: flex; flex-direction: column; gap: 2rem;">
                            <input type="text" placeholder="Your Name" required style="width: 100%; padding: 1.5rem; background: #000; border: 1px solid #333; color: white; border-radius: 8px;">
                            <input type="email" placeholder="Work Email" required style="width: 100%; padding: 1.5rem; background: #000; border: 1px solid #333; color: white; border-radius: 8px;">
                            <textarea rows="4" placeholder="Briefly describe your business goals..." style="width: 100%; padding: 1.5rem; background: #000; border: 1px solid #333; color: white; border-radius: 8px;"></textarea>
                        </div>
                    </div>

                    <div id="planner-nav" style="margin-top: 5rem; display: flex; justify-content: space-between; align-items: center;">
                        <button type="button" id="prev-step" class="btn btn-outline" style="visibility: hidden;">Back</button>
                        <button type="button" id="next-step" class="btn btn-primary" style="padding: 1.5rem 4rem;">Next Step</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<style>
.option-card { cursor: pointer; position: relative; }
.option-card input { position: absolute; opacity: 0; }
.option-content {
    background: #000;
    border: 1px solid #333;
    padding: 3rem 2rem;
    border-radius: 12px;
    text-align: center;
    transition: var(--transition);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
}
.option-content i { font-size: 2rem; color: #444; transition: var(--transition); }
.option-card input:checked + .option-content {
    border-color: var(--primary);
    background: rgba(212, 175, 55, 0.05);
}
.option-card input:checked + .option-content i { color: var(--primary); }
.option-card input:checked + .option-content span { color: white; font-weight: 700; }
.option-content span { color: var(--text-dim); }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let currentStep = 1;
    const totalSteps = 4;
    const nextBtn = document.getElementById('next-step');
    const prevBtn = document.getElementById('prev-step');
    const progress = document.getElementById('progress-fill');
    const form = document.getElementById('multi-step-planner');

    const updateStep = () => {
        document.querySelectorAll('.planner-step').forEach(el => el.style.display = 'none');
        document.querySelector(`.planner-step[data-step="${currentStep}"]`).style.display = 'block';

        progress.style.width = `${(currentStep / totalSteps) * 100}%`;

        prevBtn.style.visibility = currentStep === 1 ? 'hidden' : 'visible';
        nextBtn.innerText = currentStep === totalSteps ? 'Submit Plan' : 'Next Step';
    };

    nextBtn.addEventListener('click', () => {
        if (currentStep < totalSteps) {
            currentStep++;
            updateStep();
        } else {
            // Final submission
            form.innerHTML = `<div style="text-align: center; padding: 4rem 0;">
                <i class="fas fa-check-circle" style="font-size: 5rem; color: var(--primary); margin-bottom: 2rem;"></i>
                <h2 style="font-size: 2.5rem; color: white;">Plan Received!</h2>
                <p style="color: var(--text-dim); font-size: 1.2rem; margin-top: 1.5rem;">One of our strategists will review your goals and reach out within 24 hours.</p>
            </div>`;
            document.getElementById('planner-nav').style.display = 'none';
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentStep > 1) {
            currentStep--;
            updateStep();
        }
    });
});
</script>

<?php get_footer(); ?>
