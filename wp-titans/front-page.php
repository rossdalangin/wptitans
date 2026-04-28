<?php
/**
 * Template Name: Front Page
 */
get_header(); ?>

<!-- 1. HERO SECTION -->
<section id="hero" class="hero">
    <div class="reveal">
        <h1><?php echo esc_html(get_theme_mod('wp_titans_hero_title', 'SUCCESS THROUGH DESIGN')); ?></h1>
        <p><?php echo esc_html(get_theme_mod('wp_titans_hero_subtitle', 'The Apex Agency of the Digital Frontier.')); ?></p>
        <div class="hero-btns">
            <a href="#services" class="btn btn-primary">Our Solutions</a>
            <a href="#contact" class="btn btn-outline">Consult Our Units</a>
        </div>
    </div>
</section>

<!-- 2. ABOUT SECTION (Philosophy) -->
<section id="about">
    <div class="grid-about">
        <div class="reveal">
            <span class="tagline"><?php echo esc_html(get_theme_mod('wp_titans_about_tagline', 'DIGITAL EXCELLENCE ENGINEERED')); ?></span>
            <h2><?php echo esc_html(get_theme_mod('wp_titans_about_title', 'Sovereign Digital Identity')); ?></h2>
            <p><?php echo nl2br(esc_html(get_theme_mod('wp_titans_about_content', 'WordPress Titans was born from the intersection of high-end aesthetics and technical dominance.'))); ?></p>
        </div>
        <div class="reveal">
            <img src="<?php echo esc_url(get_theme_mod('wp_titans_about_image', 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=800')); ?>" alt="Agency Ops" style="box-shadow: 20px 20px 0 var(--primary);">
        </div>
    </div>
</section>

<!-- 3. SERVICES SECTION -->
<section id="services" style="background: #080808;">
    <span class="tagline">Service Units</span>
    <h2 style="font-size: 3rem;">Specialized Solutions</h2>
    <div class="services-grid">
        <?php for ($i = 1; $i <= 6; $i++) :
            $icon = get_theme_mod("wp_titans_service_icon_$i");
            $title = get_theme_mod("wp_titans_service_title_$i");
            $desc = get_theme_mod("wp_titans_service_desc_$i");
            if (!$title) continue;
        ?>
        <div class="service-card reveal">
            <i class="fas <?php echo esc_attr($icon); ?>"></i>
            <h3><?php echo esc_html($title); ?></h3>
            <p><?php echo esc_html($desc); ?></p>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- 4. STATS BAR -->
<div id="stats" class="stats-bar">
    <?php for ($i = 1; $i <= 4; $i++) :
        $num = get_theme_mod("wp_titans_stat_num_$i");
        $label = get_theme_mod("wp_titans_stat_label_$i");
        if (!$num) continue;
    ?>
    <div class="stat-item">
        <h3 data-target="<?php echo esc_attr($num); ?>">0</h3>
        <p><?php echo esc_html($label); ?></p>
    </div>
    <?php endfor; ?>
</div>

<!-- 5. NEWS/PORTFOLIO -->
<section id="news">
    <h2>Intelligence Briefing</h2>
    <div class="news-grid">
        <?php for ($i = 1; $i <= 3; $i++) :
            $img = get_theme_mod("wp_titans_portfolio_img_$i");
            $title = get_theme_mod("wp_titans_portfolio_title_$i");
            if (!$title) continue;
        ?>
        <div class="news-card reveal">
            <img src="<?php echo esc_url($img); ?>" class="news-img" alt="Case <?php echo $i; ?>">
            <div class="news-content">
                <small style="color: var(--primary);">CASE STUDY 0<?php echo $i; ?></small>
                <h3 style="margin: 10px 0;"><?php echo esc_html($title); ?></h3>
                <p>Strategic digital implementation for industry-leading performance.</p>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- 6. FAQ -->
<section id="faq" class="reveal">
    <h2 style="text-align: center;">Operational FAQ</h2>
    <div class="faq-wrap">
        <?php for ($i = 1; $i <= 4; $i++) :
            $q = get_theme_mod("wp_titans_faq_q_$i");
            $a = get_theme_mod("wp_titans_faq_a_$i");
            if (!$q) continue;
        ?>
        <div class="faq-item">
            <div class="faq-head"><?php echo esc_html($q); ?> <i class="fas fa-plus"></i></div>
            <div class="faq-body"><?php echo esc_html($a); ?></div>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- 7. CONTACT -->
<section id="contact" class="reveal">
    <div class="grid-about">
        <div>
            <h2>Request a Strategy Session</h2>
            <p>Don't wait for your competitors to take the lead. Contact our elite units today for a discreet evaluation of your digital presence.</p>
            <div style="margin-top: 2rem;">
                <p><i class="fas fa-at"></i> ops@wordpresstitans.com</p>
                <p><i class="fas fa-phone"></i> +1 (800) TITANS-1</p>
            </div>
        </div>
        <form style="background: #111; padding: 3rem; border: 1px solid #222;">
            <input type="text" placeholder="Your Name" style="width: 100%; padding: 1rem; margin-bottom: 1rem; background: #000; border: 1px solid #333; color: white;">
            <input type="email" placeholder="Corporate Email" style="width: 100%; padding: 1rem; margin-bottom: 1rem; background: #000; border: 1px solid #333; color: white;">
            <textarea rows="4" placeholder="Mission Requirements" style="width: 100%; padding: 1rem; margin-bottom: 1rem; background: #000; border: 1px solid #333; color: white;"></textarea>
            <button class="btn btn-primary" style="width: 100%;">Initialize Secure Line</button>
        </form>
    </div>
</section>

<?php get_footer(); ?>
