<?php
/**
 * Template Name: Front Page
 */
get_header(); ?>

<!-- 1. HERO SECTION -->
<section id="hero" class="hero">
    <div class="reveal">
        <h1><?php echo esc_html(get_theme_mod('wp_titans_hero_title', 'High-Performance WordPress Websites Designed to Win Trust and Generate Leads')); ?></h1>
        <p><?php echo esc_html(get_theme_mod('wp_titans_hero_subtitle', 'We build Authority Websites for consultants, coaches, and service providers that position you as the expert and turn visitors into clients.')); ?></p>
        <div class="hero-btns">
            <a href="#services" class="btn btn-primary">Our Solutions</a>
            <a href="#contact" class="btn btn-outline">Schedule a Call</a>
        </div>
    </div>
</section>

<!-- 2. WHO WE WORK WITH -->
<section id="who-we-work-with" style="background: #050505;">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <span class="tagline">Who We Work With</span>
        <h2>Built for Experts</h2>
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
            <span class="tagline"><?php echo esc_html(get_theme_mod('wp_titans_about_tagline', 'OUR STORY')); ?></span>
            <h2><?php echo esc_html(get_theme_mod('wp_titans_about_title', 'We help experts build websites that truly reflect their value.')); ?></h2>
            <p><?php echo nl2br(esc_html(get_theme_mod('wp_titans_about_content', 'WordPress Titans began with one mission: to help experts build websites that truly reflect their value.'))); ?></p>
            <a href="#contact" class="btn btn-outline" style="margin-top: 2rem;">Read More</a>
        </div>
        <div class="reveal">
            <img src="<?php echo esc_url(get_theme_mod('wp_titans_about_image', 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=800')); ?>" alt="About Titans" style="border-radius: 8px; box-shadow: 0 20px 40px rgba(0,0,0,0.5);">
        </div>
    </div>
</section>

<!-- 4. SERVICES SECTION -->
<section id="services" style="background: #080808;">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <span class="tagline">Our Core Services</span>
        <h2>High-Converting Solutions</h2>
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
        <span class="tagline">The Authority System™</span>
        <h2>Our 4-Step Process</h2>
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
        <span class="tagline">Trusted by Experts</span>
        <h2>Client Results</h2>
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
        <h2>Common Questions</h2>
    </div>
    <div style="max-width: 800px; margin: 0 auto;">
        <?php for ($i = 1; $i <= 4; $i++) :
            $q = get_theme_mod("wp_titans_faq_q_$i");
            $a = get_theme_mod("wp_titans_faq_a_$i");
            if (!$q) continue;
        ?>
        <div class="reveal" style="margin-bottom: 2rem; border-bottom: 1px solid var(--border-glass); padding-bottom: 1.5rem;">
            <h4 style="color: var(--primary); margin-bottom: 0.5rem;"><?php echo esc_html($q); ?></h4>
            <p><?php echo esc_html($a); ?></p>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- 9. CONTACT -->
<section id="contact" style="background: #080808;">
    <div class="grid-2">
        <div class="reveal">
            <h2>Ready to Build Your Authority Website?</h2>
            <p>Let’s create a website that showcases your expertise and helps attract your ideal clients.</p>
            <div style="margin-top: 3rem;">
                <p><i class="fas fa-envelope" style="color: var(--primary); margin-right: 10px;"></i> hello@wordpresstitans.com</p>
                <p><i class="fas fa-calendar-check" style="color: var(--primary); margin-right: 10px;"></i> 14-Day Delivery Guaranteed</p>
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
                <button class="btn btn-primary" style="width: 100%;">Book a Strategy Call</button>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?>
