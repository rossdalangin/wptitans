<?php
/**
 * Template Name: Long-Form Sales Letter
 */
get_header(); ?>

<main style="padding-top: 15rem; background: #000; min-height: 100vh;">
    <article class="reveal" style="max-width: 900px; margin: 0 auto; padding-bottom: 10rem;">

        <!-- HOOK SECTION -->
        <header id="sales-hook" style="text-align: center; margin-bottom: 8rem;">
            <div style="background: rgba(212,175,55,0.05); padding: 1rem 2rem; border-radius: 50px; display: inline-block; border: 1px solid rgba(212,175,55,0.1); margin-bottom: 3rem;">
                <span style="font-size: 0.8rem; font-weight: 900; color: var(--primary); text-transform: uppercase; letter-spacing: 3px;">Executive Briefing</span>
            </div>
            <h1 style="font-size: clamp(2.5rem, 5vw, 4.5rem); line-height: 1.1; margin-bottom: 2rem;">
                <?php
                $content = get_the_content();
                $sections = explode('[STORY]', $content);
                echo wp_kses_post($sections[0]);
                ?>
            </h1>
        </header>

        <!-- STORY SECTION -->
        <section id="sales-story" style="font-size: 1.4rem; line-height: 1.8; color: #eee; border-top: 1px solid #111; padding-top: 8rem; margin-bottom: 8rem;">
            <?php
            if (isset($sections[1])) {
                $story_offer = explode('[OFFER]', $sections[1]);
                echo wp_kses_post(wpautop($story_offer[0]));
            }
            ?>
        </section>

        <!-- OFFER SECTION -->
        <section id="sales-offer" style="background: #050505; padding: 6rem; border-radius: 12px; border: 1px solid var(--border-glass); margin-bottom: 8rem;">
            <span class="tagline" style="text-align: center; margin-bottom: 3rem;">THE TITAN SOLUTION</span>
            <div style="font-size: 1.1rem; color: #ccc;">
                <?php
                if (isset($story_offer[1])) {
                    $offer_close = explode('[CLOSE]', $story_offer[1]);
                    echo wp_kses_post(wpautop($offer_close[0]));
                }
                ?>
            </div>
        </section>

        <!-- CLOSE SECTION -->
        <section id="sales-close" style="text-align: center; padding-top: 5rem;">
            <div style="font-size: 1.5rem; font-weight: 700; color: white; margin-bottom: 4rem;">
                <?php
                if (isset($offer_close[1])) {
                    echo wp_kses_post(wpautop($offer_close[1]));
                }
                ?>
            </div>

            <div style="margin-top: 5rem;">
                <a href="<?php echo get_permalink(get_page_by_path('free-authority-audit')); ?>" class="btn btn-primary" style="padding: 1.8rem 4rem; font-size: 1.2rem;">Initialize My Authority Scan</a>
                <p style="margin-top: 2rem; font-size: 0.8rem; color: #444; text-transform: uppercase; letter-spacing: 2px;">
                    <i class="fas fa-lock" style="margin-right: 10px;"></i> 100% Confidential . Secure Deployment
                </p>
            </div>
        </section>

    </article>
</main>

<style>
#sales-story p { margin-bottom: 2.5rem; }
#sales-story strong { color: var(--primary); }
#sales-offer ul { list-style: none; padding: 0; display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 3rem; }
#sales-offer li { background: #000; padding: 2rem; border-radius: 8px; border-left: 3px solid var(--primary); }
@media (max-width: 768px) {
    #sales-offer ul { grid-template-columns: 1fr; }
}
</style>

<?php get_footer(); ?>
