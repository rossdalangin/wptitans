<?php
/**
 * Template Name: ROI Calculator
 */
get_header(); ?>

<main style="padding-top: 10rem; background: #000; min-height: 100vh;">
    <section id="roi-header" style="text-align: center; padding-bottom: 5rem;">
        <div class="reveal">
            <span class="tagline">The Financial Impact</span>
            <h1 style="font-size: clamp(3rem, 8vw, 5rem); margin-bottom: 2rem;">Authority ROI Calculator</h1>
            <p style="max-width: 800px; margin: 0 auto; color: var(--text-dim); font-size: 1.25rem;">Calculate how much revenue you are currently leaving on the table with a non-optimized website.</p>
        </div>
    </section>

    <section id="calculator-interface" style="background: #050505; border-top: 1px solid var(--border-glass); padding: 8rem 5%;">
        <div class="grid-2" style="max-width: 1200px; margin: 0 auto; align-items: flex-start;">
            <div class="reveal">
                <div style="background: #111; padding: 4rem; border-radius: 12px; border: 1px solid var(--border-glass);">
                    <div style="margin-bottom: 3rem;">
                        <label style="color: var(--primary); text-transform: uppercase; font-size: 0.75rem; letter-spacing: 2px; font-weight: 700;">Monthly Website Visitors</label>
                        <input type="number" id="roi-traffic" value="1000" style="width: 100%; padding: 1.2rem; background: #000; border: 1px solid #333; color: white; border-radius: 4px; margin-top: 0.5rem; font-size: 1.5rem;">
                    </div>
                    <div style="margin-bottom: 3rem;">
                        <label style="color: var(--primary); text-transform: uppercase; font-size: 0.75rem; letter-spacing: 2px; font-weight: 700;">Current Conversion Rate (%)</label>
                        <input type="number" id="roi-conv" value="1" step="0.1" style="width: 100%; padding: 1.2rem; background: #000; border: 1px solid #333; color: white; border-radius: 4px; margin-top: 0.5rem; font-size: 1.5rem;">
                    </div>
                    <div style="margin-bottom: 3rem;">
                        <label style="color: var(--primary); text-transform: uppercase; font-size: 0.75rem; letter-spacing: 2px; font-weight: 700;">Average Customer Value ($)</label>
                        <input type="number" id="roi-value" value="2000" style="width: 100%; padding: 1.2rem; background: #000; border: 1px solid #333; color: white; border-radius: 4px; margin-top: 0.5rem; font-size: 1.5rem;">
                    </div>
                </div>
            </div>

            <div class="reveal">
                <div style="background: #111; padding: 5rem; border-radius: 12px; border: 2px solid var(--primary); text-align: center;">
                    <h3 style="font-size: 1.2rem; text-transform: uppercase; letter-spacing: 3px; margin-bottom: 2rem; color: var(--text-dim);">Estimated Authority Lift</h3>
                    <div style="font-size: 5rem; font-weight: 900; color: var(--primary); margin-bottom: 1rem;" id="roi-result">$0</div>
                    <p style="color: #eee; font-size: 1.1rem;" id="roi-explanation">Additional Monthly Revenue with a Titan System™</p>

                    <hr style="margin: 3rem 0; border: 0; border-top: 1px solid #222;">

                    <p style="color: var(--text-dim); margin-bottom: 3rem;">By increasing your conversion rate to **3.5%** (our system average), you could secure an extra <span id="roi-leads" style="color:white; font-weight: 700;">0</span> leads per month.</p>
                    <a href="#contact" class="btn btn-primary" style="width: 100%; padding: 1.5rem;">Secure This Revenue</a>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const trafficInput = document.getElementById('roi-traffic');
    const convInput = document.getElementById('roi-conv');
    const valueInput = document.getElementById('roi-value');
    const resultDisplay = document.getElementById('roi-result');
    const leadsDisplay = document.getElementById('roi-leads');

    const calculate = () => {
        const traffic = parseFloat(trafficInput.value) || 0;
        const currentConv = parseFloat(convInput.value) || 0;
        const value = parseFloat(valueInput.value) || 0;

        const titanConv = 3.5; // Benchmark

        const currentRev = (traffic * (currentConv / 100)) * value;
        const titanRev = (traffic * (titanConv / 100)) * value;

        const lift = titanRev - currentRev;
        const extraLeads = Math.round((traffic * (titanConv / 100)) - (traffic * (currentConv / 100)));

        resultDisplay.innerText = '$' + Math.round(lift).toLocaleString();
        leadsDisplay.innerText = extraLeads > 0 ? extraLeads : 0;
    };

    [trafficInput, convInput, valueInput].forEach(el => el.addEventListener('input', calculate));
    calculate();
});
</script>

<?php get_footer(); ?>
