<?php
/**
 * Template Name: Services Page
 */
get_header(); ?>

<section class="page-header hero" style="min-height: 50vh;">
    <div class="reveal">
        <span class="tagline"><?php echo esc_html(get_theme_mod('wp_titans_services_page_tagline', 'Our Expertise')); ?></span>
        <h1><?php echo esc_html(get_theme_mod('wp_titans_services_page_title', 'Done-for-you website solutions built for consultants, coaches, and service providers.')); ?></h1>
        <p><?php echo esc_html(get_theme_mod('wp_titans_services_page_subtitle', 'Designed to convert, impress, and elevate your authority.')); ?></p>
    </div>
</section>

<section id="all-services" style="background: #050505;">
    <div class="grid-cards">
        <?php for ($i = 1; $i <= 6; $i++) :
            $icon = get_theme_mod("wp_titans_service_icon_$i");
            $title = get_theme_mod("wp_titans_service_title_$i");
            $desc = get_theme_mod("wp_titans_service_desc_$i");
            if (!$title) continue;
        ?>
        <div class="card reveal" style="padding: 4rem;">
            <i class="fas <?php echo esc_attr($icon); ?>"></i>
            <h3 style="font-size: 2rem; margin-bottom: 1.5rem;"><?php echo esc_html($title); ?></h3>
            <p style="font-size: 1.1rem; color: var(--text-dim); margin-bottom: 2rem;"><?php echo esc_html($desc); ?></p>
            <ul style="color: var(--text-dim); text-align: left; margin-bottom: 2rem;">
                <?php
                $points = get_theme_mod("wp_titans_service_points_$i", "✓ Custom design\n✓ SEO setup\n✓ Fast performance");
                $points_arr = explode("\n", $points);
                foreach($points_arr as $point) {
                    if(trim($point)) echo '<li style="margin-bottom: 0.5rem;"><i class="fas fa-check" style="color: var(--primary); margin-right: 10px;"></i> ' . esc_html(trim($point)) . '</li>';
                }
                ?>
            </ul>
            <a href="#contact" class="btn btn-outline">Enquire Now</a>
        </div>
        <?php endfor; ?>
    </div>
</section>

<section id="cta-services" style="text-align: center; background: #000;">
    <div class="reveal">
        <h2>Ready to Build a High-Converting Website?</h2>
        <p style="margin-bottom: 3rem; max-width: 700px; margin-left: auto; margin-right: auto;">Let’s elevate your expertise with a professional website your clients will trust.</p>
        <a href="<?php echo esc_url(get_theme_mod('wp_titans_contact_btn_url', '#contact')); ?>" class="btn btn-primary"><?php echo esc_html(get_theme_mod('wp_titans_contact_btn_text', 'Book a Strategy Call')); ?></a>
    </div>
</section>

<?php get_footer(); ?>
