<?php
/**
 * Template Name: Brand Style Guide
 */
get_header(); ?>

<section id="sg-hero" style="background: #000; padding: 12rem 10% 6rem;">
    <div class="reveal">
        <span class="tagline">The Titan Blueprint</span>
        <h1 style="font-size: 3.5rem;">Visual & Verbal Standards</h1>
        <p style="color: #ccc; margin-top: 2rem;">A comprehensive guide to the WordPress Titans brand identity.</p>
    </div>
</section>

<section id="sg-colors" style="background: #050505; border-top: 1px solid var(--border-glass);">
    <div class="reveal">
        <h2 style="margin-bottom: 4rem;">Color Protocol</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem;">
            <div>
                <div style="height: 150px; background: #D4AF37; border-radius: 8px; margin-bottom: 1rem;"></div>
                <strong>Titan Gold</strong>
                <p style="color: #888; font-size: 0.8rem;">HEX: #D4AF37</p>
            </div>
            <div>
                <div style="height: 150px; background: #000000; border: 1px solid #222; border-radius: 8px; margin-bottom: 1rem;"></div>
                <strong>Obsidian Black</strong>
                <p style="color: #888; font-size: 0.8rem;">HEX: #000000</p>
            </div>
            <div>
                <div style="height: 150px; background: #0a0a0a; border-radius: 8px; margin-bottom: 1rem;"></div>
                <strong>Stone Grey</strong>
                <p style="color: #888; font-size: 0.8rem;">HEX: #0A0A0A</p>
            </div>
        </div>
    </div>
</section>

<section id="sg-typography" style="background: #000; border-top: 1px solid var(--border-glass);">
    <div class="reveal">
        <h2 style="margin-bottom: 4rem;">Typography Standards</h2>
        <div style="margin-bottom: 4rem;">
            <span class="tagline">Primary Heading</span>
            <h1 style="font-family: 'Syne'; font-size: 4rem; margin-top: 1rem;">Syne Extra Bold</h1>
            <p style="color: #888;">Used for high-impact headlines and authority statements.</p>
        </div>
        <div>
            <span class="tagline">Body Copy</span>
            <p style="font-family: 'Space Grotesk'; font-size: 1.5rem; margin-top: 1rem; line-height: 1.6;">Space Grotesk Light/Regular</p>
            <p style="color: #888;">Used for all long-form content, ensuring maximum legibility and modern aesthetic.</p>
        </div>
    </div>
</section>

<section id="sg-components" style="background: #050505; border-top: 1px solid var(--border-glass);">
    <div class="reveal">
        <h2 style="margin-bottom: 4rem;">Component Library</h2>
        <div style="display: flex; flex-direction: column; gap: 3rem;">
            <div>
                <span class="tagline">Primary Action</span>
                <div style="margin-top: 1rem;"><button class="btn btn-primary">Initialize Access</button></div>
            </div>
            <div>
                <span class="tagline">Secondary Action</span>
                <div style="margin-top: 1rem;"><button class="btn btn-outline">Explore Solutions</button></div>
            </div>
            <div>
                <span class="tagline">Informational Card</span>
                <div class="card" style="max-width: 400px; margin-top: 1rem;">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Secure Protocol</h3>
                    <p>Sample description for brand consistency across all card-based layouts.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="sg-voice" style="background: #000; border-top: 1px solid var(--border-glass);">
    <div class="reveal">
        <h2 style="margin-bottom: 4rem;">Tone of Voice</h2>
        <div class="grid-2">
            <div>
                <h3 style="color: var(--primary); margin-bottom: 1rem;">Authoritative</h3>
                <p style="color: #ccc;">We speak with the confidence of market leaders. We don't guess; we deploy proven systems.</p>
            </div>
            <div>
                <h3 style="color: var(--primary); margin-bottom: 1rem;">Direct</h3>
                <p style="color: #ccc;">We value clarity over cleverness. Every word serves a strategic purpose.</p>
            </div>
            <div>
                <h3 style="color: var(--primary); margin-bottom: 1rem;">Elite</h3>
                <p style="color: #ccc;">Our language reflects a high-stakes, high-output environment.</p>
            </div>
            <div>
                <h3 style="color: var(--primary); margin-bottom: 1rem;">Visionary</h3>
                <p style="color: #ccc;">We focus on outcomes and the long-term impact of our digital builds.</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
