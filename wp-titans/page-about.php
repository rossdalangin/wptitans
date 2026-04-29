<?php
/**
 * Template Name: About Page
 */
get_header(); ?>

<section class="page-header hero" style="min-height: 50vh;">
    <div class="reveal">
        <span class="tagline"><?php echo esc_html(get_theme_mod('wp_titans_about_page_tagline', 'About WordPress Titans')); ?></span>
        <h1><?php echo esc_html(get_theme_mod('wp_titans_about_page_title', 'We help experts build websites that truly reflect their value.')); ?></h1>
        <p><?php echo esc_html(get_theme_mod('wp_titans_about_page_subtitle', 'Design for business outcomes, not just trends.')); ?></p>
    </div>
</section>

<section id="our-story-page" style="background: #050505;">
    <div class="grid-2">
        <div class="reveal">
            <span class="tagline">OUR STORY</span>
            <h2 style="font-size: 3rem;"><?php echo esc_html(get_theme_mod('wp_titans_about_story_title', 'Built on 20+ Years of Experience')); ?></h2>
            <div style="font-size: 1.1rem; color: var(--text-dim);">
                <?php echo wp_kses_post(wpautop(get_theme_mod('wp_titans_about_story_content', "WordPress Titans began with one mission: to help experts build websites that truly reflect their value.\n\nAfter 20+ years of building websites for all kinds of businesses, one thing became clear — most websites fail not because of design, but because they lack clarity, strategy, and authority positioning."))); ?>
            </div>
        </div>
        <div class="reveal">
            <img src="<?php echo esc_url(get_theme_mod('wp_titans_about_page_image', 'https://wordpresstitans.com/wp-content/uploads/2025/12/Screenshot-2025-12-06-001551.webp')); ?>" alt="Our Story" style="border-radius: 8px; box-shadow: 0 30px 60px rgba(212, 175, 55, 0.1);">
        </div>
    </div>
</section>

<section id="values" style="background: #000;">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <span class="tagline">Our Pillars</span>
        <h2>Our Core Values</h2>
    </div>
    <div class="grid-cards">
        <?php
        for ($i = 1; $i <= 4; $i++) :
            $v_title = get_theme_mod("wp_titans_about_pillar_title_$i");
            $v_desc = get_theme_mod("wp_titans_about_pillar_desc_$i");
            if (!$v_title) continue;
        ?>
        <div class="card reveal" style="border: 1px solid var(--border-glass);">
            <h3 style="color: var(--primary);"><?php echo esc_html($v_title); ?></h3>
            <p><?php echo esc_html($v_desc); ?></p>
        </div>
        <?php endfor; ?>
    </div>
</section>

<section id="agency-team" style="background: #000; border-top: 1px solid var(--border-glass);">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <span class="tagline">The Titans</span>
        <h2>Our Core Team</h2>
    </div>
    <div class="grid-cards">
        <?php for ($i = 1; $i <= 3; $i++) :
            $name = get_theme_mod("wp_titans_team_name_$i");
            $role = get_theme_mod("wp_titans_team_role_$i");
            $img = get_theme_mod("wp_titans_team_img_$i");
            if (!$name) continue;
        ?>
        <div class="card reveal" style="padding: 0; background: #050505; text-align: center; overflow: hidden; border: 1px solid var(--border-glass);">
            <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>" style="width: 100%; height: 300px; object-fit: cover;">
            <div style="padding: 2.5rem;">
                <h3 style="margin-bottom: 0.5rem; color: var(--primary);"><?php echo esc_html($name); ?></h3>
                <p style="text-transform: uppercase; font-size: 0.8rem; letter-spacing: 2px; color: var(--text-dim);"><?php echo esc_html($role); ?></p>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</section>

<section id="founder" style="background: #050505;">
    <div class="grid-2">
        <div class="reveal" style="text-align: center;">
            <img src="<?php echo esc_url(get_theme_mod('wp_titans_founder_image', 'https://wordpresstitans.com/wp-content/uploads/2025/07/pic-ross-dalangin.jpg')); ?>" alt="Founder" style="width: 400px; height: 400px; object-fit: cover; border-radius: 50%; margin: 0 auto; border: 5px solid var(--primary);">
        </div>
        <div class="reveal">
            <span class="tagline">Meet the Founder</span>
            <h2 style="font-size: 3rem;"><?php echo esc_html(get_theme_mod('wp_titans_founder_name', 'Ross Dalangin')); ?></h2>
            <div style="font-size: 1.1rem; color: var(--text-dim);">
                <?php echo wp_kses_post(wpautop(get_theme_mod('wp_titans_founder_bio', 'I’m Ross Dalangin — a web developer with over two decades of experience in WordPress, theme development, and business-focused design systems.'))); ?>
            </div>
            <a href="#contact" class="btn btn-primary" style="margin-top: 2rem;">Work With Ross</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
