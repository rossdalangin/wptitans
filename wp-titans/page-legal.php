<?php
/**
 * Template Name: Legal Protocol Page
 */
get_header(); ?>

<section id="legal-header" style="background: #000; padding: 10rem 10% 5rem; border-bottom: 1px solid var(--border-glass);">
    <div class="reveal">
        <span class="tagline">Governance & Trust</span>
        <h1 style="font-size: 3.5rem;"><?php the_title(); ?></h1>
    </div>
</section>

<section id="legal-content" style="background: #000; padding: 6rem 10% 10rem;">
    <div class="reveal" style="max-width: 900px; margin: 0 auto; color: #ccc; line-height: 2;">
        <div class="legal-text" style="background: #050505; padding: 5rem; border-radius: 8px; border: 1px solid #111;">
            <?php the_content(); ?>
        </div>
    </div>
</section>

<style>
    .legal-text h2 { font-size: 1.5rem; color: #fff; margin: 3rem 0 1.5rem; font-family: 'Syne'; text-transform: uppercase; letter-spacing: 1px; }
    .legal-text p { margin-bottom: 1.5rem; }
    .legal-text ul { list-style: disc; margin-left: 2rem; margin-bottom: 1.5rem; }
    .legal-text li { margin-bottom: 0.5rem; }
</style>

<?php get_footer(); ?>
