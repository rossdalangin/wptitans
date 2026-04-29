<?php
/**
 * Template Name: Portfolio Page
 */
get_header(); ?>

<section class="page-header hero" style="min-height: 50vh;">
    <div class="reveal">
        <span class="tagline"><?php echo esc_html(wp_titans_get_mod("wp_titans_portfolio_page_tagline")); ?></span>
        <h1><?php echo esc_html(wp_titans_get_mod("wp_titans_portfolio_page_title")); ?></h1>
    </div>
</section>

<section id="portfolio-grid" style="background: #050505;">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <div id="portfolio-filters" style="display: flex; justify-content: center; gap: 1.5rem; flex-wrap: wrap;">
            <button class="btn btn-outline filter-btn active" data-filter="all" style="padding: 0.8rem 2rem; font-size: 0.8rem;">All Work</button>
            <?php
            $cats = [];
            for ($i = 1; $i <= 6; $i++) {
                $c = wp_titans_get_mod("wp_titans_portfolio_cat_$i");
                if ($c && !in_array($c, $cats)) $cats[] = $c;
            }
            foreach ($cats as $cat_name) : ?>
                <button class="btn btn-outline filter-btn" data-filter="<?php echo esc_attr(strtolower(str_replace(' ', '-', $cat_name))); ?>" style="padding: 0.8rem 2rem; font-size: 0.8rem;"><?php echo esc_html($cat_name); ?></button>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="grid-cards" id="portfolio-items" style="grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));">
        <?php for ($i = 1; $i <= 6; $i++) :
            $img = wp_titans_get_mod("wp_titans_portfolio_img_$i");
            $title = wp_titans_get_mod("wp_titans_portfolio_title_$i");
            $cat = wp_titans_get_mod("wp_titans_portfolio_cat_$i");
            if (!$title) continue;
            $cat_slug = strtolower(str_replace(' ', '-', $cat));
        ?>
        <div class="card reveal portfolio-item" data-category="<?php echo esc_attr($cat_slug); ?>" style="padding: 0; overflow: hidden; border: none; background: transparent;">
            <div style="position: relative; overflow: hidden; border-radius: 12px; aspect-ratio: 16/10;">
                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);">
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to top, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.4) 50%, transparent 100%); display: flex; flex-direction: column; justify-content: flex-end; padding: 3rem; opacity: 1;">
                    <span style="color: var(--primary); font-size: 0.8rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 0.5rem;"><?php echo esc_html($cat); ?></span>
                    <h3 style="font-size: 1.8rem; margin: 0; color: white;"><?php echo esc_html($title); ?></h3>
                    <a href="#contact" class="btn btn-outline" style="margin-top: 1.5rem; padding: 0.8rem 1.5rem; font-size: 0.8rem; border-color: rgba(255,255,255,0.2); color: white;">View Case Study</a>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</section>

<section id="portfolio-cta" style="text-align: center; background: #000; border-top: 1px solid var(--border-glass);">
    <div class="reveal">
        <h2>Ready to Become Our Next Success Story?</h2>
        <p style="margin-bottom: 3rem; max-width: 700px; margin-left: auto; margin-right: auto; color: var(--text-dim);">We don"t just build websites. We build authority brands that command attention and drive revenue.</p>
        <a href="<?php echo esc_url(wp_titans_get_mod("wp_titans_contact_btn_url")); ?>" class="btn btn-primary"><?php echo esc_html(wp_titans_get_mod("wp_titans_contact_btn_text")); ?></a>
    </div>
</section>

<style>
.card:hover img { transform: scale(1.1); }
</style>

<?php get_footer(); ?>
