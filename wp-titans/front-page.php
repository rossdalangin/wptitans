<?php
/**
 * Template Name: Front Page
 */
get_header(); ?>

<!-- 1. HERO SECTION -->
<section id="hero" class="hero">
    <div class="reveal">
        <h1><?php echo esc_html(get_theme_mod('wp_titans_hero_title', 'High-Performance WordPress Websites Designed to Win Trust and Generate Leads')); ?></h1>
        <p><?php echo esc_html(get_theme_mod('wp_titans_hero_subtitle', 'We help serious businesses turn their website into a revenue-generating asset — not just an online brochure.')); ?></p>
        <div class="hero-btns">
            <a href="<?php echo esc_attr(get_theme_mod('wp_titans_hero_btn1_url', '#services')); ?>" class="btn btn-primary"><?php echo esc_html(get_theme_mod('wp_titans_hero_btn1_text', 'Our Solutions')); ?></a>
            <a href="<?php echo esc_attr(get_theme_mod('wp_titans_hero_btn2_url', '#contact')); ?>" class="btn btn-outline"><?php echo esc_html(get_theme_mod('wp_titans_hero_btn2_text', 'Schedule a Call')); ?></a>
        </div>
    </div>
</section>

<!-- 2. WHO WE WORK WITH -->
<section id="who-we-work-with" style="background: #050505;">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <span class="tagline"><?php echo esc_html(get_theme_mod('wp_titans_target_tagline', 'Who We Work With')); ?></span>
        <h2><?php echo esc_html(get_theme_mod('wp_titans_target_main_title', 'Built for Experts')); ?></h2>
    </div>
    <div class="grid-cards">
        <?php for ($i = 1; $i <= 3; $i++) :
            $icon = get_theme_mod("wp_titans_target_icon_$i");
            $title = get_theme_mod("wp_titans_target_title_$i");
            $desc = get_theme_mod("wp_titans_target_desc_$i");
            if (!$title) continue;
        ?>
        <div class="card reveal">
            <i class="fas <?php echo esc_attr($icon); ?>"></i>
            <h3><?php echo esc_html($title); ?></h3>
            <p><?php echo esc_html($desc); ?></p>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- 3. ABOUT SECTION -->
<section id="about">
    <div class="grid-2">
        <div class="reveal">
            <span class="tagline"><?php echo esc_html(get_theme_mod('wp_titans_about_tagline', 'THE AUTHORITY SYSTEM™')); ?></span>
            <h2><?php echo esc_html(get_theme_mod('wp_titans_about_title', 'Imagine a Website That Works Like Your Best Salesperson')); ?></h2>
            <p><?php echo nl2br(esc_html(get_theme_mod('wp_titans_about_content', 'A modern authority website builds trust, converts leads, and grows your business—automatically. We design for business outcomes, not trends.'))); ?></p>
            <a href="<?php echo esc_attr(get_theme_mod('wp_titans_about_btn_url', '#contact')); ?>" class="btn btn-outline" style="margin-top: 2rem;"><?php echo esc_html(get_theme_mod('wp_titans_about_btn_text', 'Read More')); ?></a>
        </div>
        <div class="reveal">
            <img src="<?php echo esc_url(get_theme_mod('wp_titans_about_image', 'https://wordpresstitans.com/wp-content/uploads/2025/12/Screenshot-2025-12-06-001551.webp')); ?>" alt="About Titans" style="border-radius: 8px; box-shadow: 0 20px 40px rgba(0,0,0,0.5);">
        </div>
    </div>
</section>

<!-- 4. SERVICES SECTION -->
<section id="services" style="background: #080808;">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <span class="tagline"><?php echo esc_html(get_theme_mod('wp_titans_services_tagline', 'Our Core Services')); ?></span>
        <h2><?php echo esc_html(get_theme_mod('wp_titans_services_main_title', 'High-Converting Solutions')); ?></h2>
    </div>
    <div class="grid-cards">
        <?php for ($i = 1; $i <= 6; $i++) :
            $icon = get_theme_mod("wp_titans_service_icon_$i");
            $title = get_theme_mod("wp_titans_service_title_$i");
            $desc = get_theme_mod("wp_titans_service_desc_$i");
            if (!$title) continue;
        ?>
        <div class="card reveal">
            <i class="fas <?php echo esc_attr($icon); ?>"></i>
            <h3><?php echo esc_html($title); ?></h3>
            <p><?php echo esc_html($desc); ?></p>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- 5. PROCESS SECTION -->
<section id="process">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <span class="tagline"><?php echo esc_html(get_theme_mod('wp_titans_process_tagline', 'The Authority System™')); ?></span>
        <h2><?php echo esc_html(get_theme_mod('wp_titans_process_main_title', 'Our 4-Step Process')); ?></h2>
    </div>
    <div class="grid-cards">
        <?php for ($i = 1; $i <= 4; $i++) :
            $title = get_theme_mod("wp_titans_process_title_$i");
            $desc = get_theme_mod("wp_titans_process_desc_$i");
            if (!$title) continue;
        ?>
        <div class="card reveal" style="border-left: 3px solid var(--primary);">
            <div style="font-weight: 900; color: var(--primary); font-size: 1.2rem; margin-bottom: 1rem;">STEP 0<?php echo $i; ?></div>
            <h3><?php echo esc_html($title); ?></h3>
            <p><?php echo esc_html($desc); ?></p>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- 6. STATS BAR -->
<div id="stats" class="stats-bar">
    <?php for ($i = 1; $i <= 4; $i++) :
        $num = get_theme_mod("wp_titans_stat_num_$i");
        $label = get_theme_mod("wp_titans_stat_label_$i");
        if (!$num) continue;
    ?>
    <div class="stat-item">
        <h3 data-target="<?php echo esc_attr($num); ?>"><?php echo esc_html($num); ?></h3>
        <p><?php echo esc_html($label); ?></p>
    </div>
    <?php endfor; ?>
</div>

<!-- 7. TESTIMONIALS -->
<section id="testimonials" style="background: #050505;">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <span class="tagline"><?php echo esc_html(get_theme_mod('wp_titans_testi_tagline', 'Trusted by Experts')); ?></span>
        <h2><?php echo esc_html(get_theme_mod('wp_titans_testi_main_title', 'Client Results')); ?></h2>
    </div>
    <div class="grid-cards">
        <?php for ($i = 1; $i <= 3; $i++) :
            $img = get_theme_mod("wp_titans_testi_img_$i");
            $quote = get_theme_mod("wp_titans_testi_quote_$i");
            $author = get_theme_mod("wp_titans_testi_author_$i");
            $role = get_theme_mod("wp_titans_testi_role_$i");
            if (!$quote) continue;
        ?>
        <div class="testimonial-card reveal">
            <?php if ($img) : ?>
                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($author); ?>" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; margin-bottom: 1.5rem; border: 2px solid var(--primary);">
            <?php endif; ?>
            <blockquote>"<?php echo esc_html($quote); ?>"</blockquote>
            <div class="testimonial-author"><?php echo esc_html($author); ?></div>
            <small style="color: var(--text-dim);"><?php echo esc_html($role); ?></small>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- 8. FAQ -->
<section id="faq">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <h2><?php echo esc_html(get_theme_mod('wp_titans_faq_main_title', 'Common Questions')); ?></h2>
    </div>
    <div style="max-width: 800px; margin: 0 auto;">
        <?php for ($i = 1; $i <= 4; $i++) :
            $q = get_theme_mod("wp_titans_faq_q_$i");
            $a = get_theme_mod("wp_titans_faq_a_$i");
            if (!$q) continue;
        ?>
        <div class="reveal faq-item" style="margin-bottom: 1.5rem; border-bottom: 1px solid var(--border-glass); padding-bottom: 1rem;">
            <div class="faq-head" style="cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="color: var(--primary); margin: 0; font-size: 1.2rem;"><?php echo esc_html($q); ?></h4>
                <i class="fas fa-plus" style="font-size: 0.8rem; color: var(--primary); transition: transform 0.3s;"></i>
            </div>
            <div class="faq-body" style="max-height: 0; overflow: hidden; transition: all 0.4s ease-out; opacity: 0;">
                <p style="padding-top: 1rem; margin: 0; color: var(--text-dim);"><?php echo esc_html($a); ?></p>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- 9. CONTACT -->
<section id="contact" style="background: #080808;">
    <div class="grid-2">
        <div class="reveal">
            <h2><?php echo esc_html(get_theme_mod('wp_titans_contact_title', 'Ready to Build Your Authority Website?')); ?></h2>
            <p><?php echo esc_html(get_theme_mod('wp_titans_contact_desc', 'Let’s create a website that showcases your expertise and helps attract your ideal clients.')); ?></p>
            <div style="margin-top: 3rem;">
                <p><i class="fas fa-envelope" style="color: var(--primary); margin-right: 10px;"></i> <?php echo esc_html(get_theme_mod('wp_titans_contact_email', 'hello@wordpresstitans.com')); ?></p>
                <p><i class="fas fa-calendar-check" style="color: var(--primary); margin-right: 10px;"></i> <?php echo esc_html(get_theme_mod('wp_titans_contact_guarantee', '14-Day Delivery Guaranteed')); ?></p>
            </div>
        </div>
        <div class="reveal">
            <form style="background: #111; padding: 3rem; border-radius: 8px; border: 1px solid var(--border-glass);">
                <div style="margin-bottom: 1.5rem;">
                    <input type="text" placeholder="Full Name" style="width: 100%; padding: 1rem; background: #000; border: 1px solid #333; color: white;">
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <input type="email" placeholder="Email Address" style="width: 100%; padding: 1rem; background: #000; border: 1px solid #333; color: white;">
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <textarea rows="4" placeholder="Tell us about your business" style="width: 100%; padding: 1rem; background: #000; border: 1px solid #333; color: white;"></textarea>
                </div>
                <button class="btn btn-primary" style="width: 100%;"><?php echo esc_html(get_theme_mod('wp_titans_contact_btn_text', 'Book a Strategy Call')); ?></button>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?>
