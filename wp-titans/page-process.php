<?php
/**
 * Template Name: Process Page
 */
get_header(); ?>

<section class="page-header hero" style="min-height: 50vh;">
    <div class="reveal">
        <span class="tagline"><?php echo esc_html(wp_titans_get_mod("wp_titans_process_page_tagline")); ?></span>
        <h1><?php echo esc_html(wp_titans_get_mod("wp_titans_process_page_title")); ?></h1>
        <p><?php echo esc_html(wp_titans_get_mod("wp_titans_process_page_subtitle")); ?></p>
    </div>
</section>

<section id="process-timeline" style="background: #050505; padding: 8rem 20%;">
    <?php for ($i = 1; $i <= 5; $i++) :
        $title = wp_titans_get_mod("wp_titans_process_page_step_title_$i");
        $desc = wp_titans_get_mod("wp_titans_process_page_step_desc_$i");
        $icon = wp_titans_get_mod("wp_titans_process_page_step_icon_$i");
        if (!$title) continue;
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

<?php get_footer(); ?>
