<?php
/**
 * Template Name: Authority Landing Page
 */
get_header(); ?>

<section id="authority-hero" class="hero" style="min-height: 80vh; text-align: left; padding-left: 10%; padding-right: 10%;">
    <div class="reveal">
        <span class="tagline">The Flagship Solution</span>
        <h1 style="font-size: 5.5rem; line-height: 1;"><?php echo esc_html(get_theme_mod('wp_titans_auth_title', 'Authority Website System™')); ?></h1>
        <p style="font-size: 1.5rem; max-width: 800px; margin-top: 2rem;"><?php echo esc_html(get_theme_mod('wp_titans_auth_subtitle', 'A complete, conversion-focused website package designed to position you as the trusted expert in your field.')); ?></p>
        <div class="hero-btns" style="justify-content: flex-start; margin-top: 3rem;">
            <a href="<?php echo esc_url(get_theme_mod('wp_titans_contact_btn_url', '#contact')); ?>" class="btn btn-primary"><?php echo esc_html(get_theme_mod('wp_titans_contact_btn_text', 'Book a Strategy Call')); ?></a>
            <a href="#features" class="btn btn-outline">See What's Included</a>
        </div>
    </div>
</section>

<section id="features" style="background: #080808;">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <span class="tagline">What's Included</span>
        <h2>Everything You Need for Authority</h2>
    </div>
    <div class="grid-cards">
        <?php
        for ($i = 1; $i <= 6; $i++) :
            $f_icon = get_theme_mod("wp_titans_auth_feature_icon_$i");
            $f_title = get_theme_mod("wp_titans_auth_feature_title_$i");
            $f_desc = get_theme_mod("wp_titans_auth_feature_desc_$i");
            if (!$f_title) continue;
        ?>
        <div class="card reveal" style="background: #000; border: 1px solid var(--border-glass);">
            <i class="fas <?php echo esc_attr($f_icon); ?>" style="font-size: 2.5rem; color: var(--primary);"></i>
            <h3><?php echo esc_html($f_title); ?></h3>
            <p><?php echo esc_html($f_desc); ?></p>
        </div>
        <?php endfor; ?>
    </div>
</section>

<section id="auth-cta" style="background: linear-gradient(to bottom, #000, #050505); text-align: center;">
    <div class="reveal">
        <h2 style="font-size: 4rem;"><?php echo esc_html(get_theme_mod('wp_titans_auth_cta_title', 'Ready to Stop Losing Clients to a Weak Website?')); ?></h2>
        <p style="font-size: 1.3rem; margin-bottom: 4rem; max-width: 800px; margin-left: auto; margin-right: auto;"><?php echo esc_html(get_theme_mod('wp_titans_auth_cta_desc', 'Our Authority Website System™ is the fastest way to upgrade your professional image and start generating leads.')); ?></p>
        <a href="<?php echo esc_url(get_theme_mod('wp_titans_contact_btn_url', '#contact')); ?>" class="btn btn-primary" style="padding: 2rem 4rem; font-size: 1.2rem;"><?php echo esc_html(get_theme_mod('wp_titans_contact_btn_text', 'Book a Strategy Call')); ?></a>
    </div>
</section>

<?php get_footer(); ?>
