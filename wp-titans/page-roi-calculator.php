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

                    <!-- ROI Visual Chart -->
                    <div id="roi-chart-container" style="margin: 3rem 0; height: 100px; display: flex; align-items: flex-end; gap: 1.5rem; justify-content: center;">
                        <div style="text-align: center; flex: 1;">
                            <div id="bar-current" style="width: 100%; height: 20%; background: #222; border-radius: 4px; transition: height 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
                            <span style="font-size: 0.6rem; color: #555; text-transform: uppercase; margin-top: 10px; display: block;">Current</span>
                        </div>
                        <div style="text-align: center; flex: 1;">
                            <div id="bar-titan" style="width: 100%; height: 20%; background: var(--primary); border-radius: 4px; transition: height 0.8s cubic-bezier(0.16, 1, 0.3, 1); box-shadow: 0 0 20px rgba(var(--primary-rgb), 0.3);"></div>
                            <span style="font-size: 0.6rem; color: var(--primary); text-transform: uppercase; margin-top: 10px; display: block;">Titan Lift</span>
                        </div>
                    </div>

                    <hr style="margin: 3rem 0; border: 0; border-top: 1px solid #222;">

                    <p style="color: var(--text-dim); margin-bottom: 2rem;" id="roi-leads-container">By increasing your conversion rate to <strong id="roi-target-label">3.5%</strong> (our system average), you could secure an extra <span id="roi-leads" style="color:white; font-weight: 700;">0</span> leads per month.</p>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 3rem;">
                        <div style="background: #000; padding: 1.5rem; border-radius: 8px;">
                            <div style="font-size: 0.6rem; text-transform: uppercase; letter-spacing: 2px; color: var(--text-dim); margin-bottom: 0.5rem;">Yearly Lift</div>
                            <div style="font-size: 1.5rem; font-weight: 800; color: white;" id="roi-yearly">$0</div>
                        </div>
                        <div style="background: #000; padding: 1.5rem; border-radius: 8px; border: 1px solid var(--primary);">
                            <div style="font-size: 0.6rem; text-transform: uppercase; letter-spacing: 2px; color: var(--primary); margin-bottom: 0.5rem;">Annual ROI</div>
                            <div style="font-size: 1.5rem; font-weight: 800; color: var(--primary);" id="roi-percentage">0%</div>
                        </div>
                    </div>

                    <a href="#contact" class="btn btn-primary" style="width: 100%; padding: 1.5rem;">Capture This ROI</a>
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
    const yearlyDisplay = document.getElementById('roi-yearly');
    const roiPercDisplay = document.getElementById('roi-percentage');
    const targetLabel = document.getElementById('roi-target-label');
    const explanation = document.getElementById('roi-explanation');

    const calculate = () => {
        const traffic = parseFloat(trafficInput.value) || 0;
        const currentConv = parseFloat(convInput.value) || 0;
        const value = parseFloat(valueInput.value) || 0;

        const barCurrent = document.getElementById('bar-current');
        const barTitan = document.getElementById('bar-titan');

        // Try to get price from PHP/Customizer, fallback to 4500
        let invStr = "<?php echo esc_js(wp_titans_get_mod('wp_titans_pricing_val_2')); ?>";
        let investment = parseFloat(invStr.replace(/[^0-9.]/g, '')) || 4500;

        // Dynamic target: always aim for at least 1.5x current or a minimum of 3.5%
        let titanConv = Math.max(3.5, currentConv * 1.5);
        if (currentConv >= 5) titanConv = currentConv + 1;

        targetLabel.innerText = titanConv.toFixed(1) + '%';

        const currentRev = (traffic * (currentConv / 100)) * value;
        const titanRev = (traffic * (titanConv / 100)) * value;

        const lift = titanRev - currentRev;
        const annualLift = lift * 12;
        const extraLeads = Math.round((traffic * (titanConv / 100)) - (traffic * (currentConv / 100)));

        // ROI % = (Gain - Investment) / Investment * 100
        const roiPercentage = investment > 0 ? ((annualLift - investment) / investment) * 100 : 0;

        resultDisplay.innerText = '$' + Math.round(lift).toLocaleString();
        yearlyDisplay.innerText = '$' + Math.round(annualLift).toLocaleString();
        roiPercDisplay.innerText = (roiPercentage > 0 ? Math.round(roiPercentage).toLocaleString() : 0) + '%';
        leadsDisplay.innerText = extraLeads > 0 ? extraLeads : 0;

        // Update Visual Chart
        const totalRev = currentRev + lift;
        if (totalRev > 0) {
            const curH = (currentRev / totalRev) * 100;
            barCurrent.style.height = Math.max(10, curH) + '%';
            barTitan.style.height = '100%';
        }

        if (lift <= 0) {
            explanation.innerText = "You're already performing at a Titan level!";
            resultDisplay.style.color = "#2ecc71";
        } else {
            explanation.innerText = "Additional Monthly Revenue with a Titan System™";
            resultDisplay.style.color = "var(--primary)";
        }
    };

    [trafficInput, convInput, valueInput].forEach(el => el.addEventListener('input', calculate));
    calculate();
});
</script>

<?php get_footer(); ?>
