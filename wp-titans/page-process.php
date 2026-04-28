<?php
/**
 * Template Name: Process Page
 */
get_header(); ?>

<section class="page-header hero" style="min-height: 50vh;">
    <div class="reveal">
        <span class="tagline"><?php echo esc_html(get_theme_mod('wp_titans_process_page_tagline', 'Our Methodology')); ?></span>
        <h1><?php echo esc_html(get_theme_mod('wp_titans_process_page_title', 'Our proven 14-day Authority Website System™')); ?></h1>
        <p><?php echo esc_html(get_theme_mod('wp_titans_process_page_subtitle', 'We give you clarity, high-converting design, and systems that help you attract more clients effortlessly.')); ?></p>
    </div>
</section>

<section id="process-timeline" style="background: #050505; padding: 8rem 20%;">
    <?php for ($i = 1; $i <= 5; $i++) :
        $title = get_theme_mod("wp_titans_process_page_step_title_$i");
        $desc = get_theme_mod("wp_titans_process_page_step_desc_$i");
        $icon = get_theme_mod("wp_titans_process_page_step_icon_$i", "fa-circle");
        if (!$title && $i > 4) continue; // Default to 4 steps if not set, but allow 5

        // Fallbacks for the first 4 if not set in customizer
        if (!$title) {
            $defaults = [
                1 => ['t' => 'Strategy Call & Positioning', 'd' => 'We begin by understanding your business, ideal clients, strengths, and unique value.'],
                2 => ['t' => 'Copywriting & Messaging Blueprint', 'd' => 'Our team writes compelling, conversion-focused content tailored to your audience.'],
                3 => ['t' => 'Website Design & Layout', 'd' => 'We transform your messaging into a clean, modern, strategic design built to position you as the expert.'],
                4 => ['t' => 'Development & Launch', 'd' => 'Your website becomes a fully functional, fast, SEO-ready system. We support you for 30 days post-launch.']
            ];
            $title = $defaults[$i]['t'];
            $desc = $defaults[$i]['d'];
        }
    ?>
    <div class="reveal" style="display: flex; gap: 3rem; margin-bottom: 6rem; align-items: flex-start;">
        <div style="background: var(--primary); color: black; min-width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 1.5rem; font-family: 'Syne';">
            <?php echo $i; ?>
        </div>
        <div>
            <h3 style="font-size: 2.2rem; margin-bottom: 1rem; color: var(--primary);"><?php echo esc_html($title); ?></h3>
            <p style="font-size: 1.2rem; color: var(--text-dim); line-height: 1.8;"><?php echo esc_html($desc); ?></p>
        </div>
    </div>
    <?php endfor; ?>
</section>

<section id="cta-process" style="text-align: center; background: #000;">
    <div class="reveal">
        <h2>Ready to Start Your Authority Website?</h2>
        <p style="margin-bottom: 3rem; max-width: 700px; margin-left: auto; margin-right: auto;">Let’s work together to build a website that elevates your expertise and brings clients to you consistently.</p>
        <a href="<?php echo esc_url(get_theme_mod('wp_titans_contact_btn_url', '#contact')); ?>" class="btn btn-primary"><?php echo esc_html(get_theme_mod('wp_titans_contact_btn_text', 'Book a Strategy Call')); ?></a>
    </div>
</section>

<?php get_footer(); ?>
