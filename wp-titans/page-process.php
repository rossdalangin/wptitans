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

<section id="process-timeline" style="background: #050505; padding: 12rem 10%; position: relative;">
    <div class="timeline-line" style="position: absolute; left: 50%; top: 15rem; bottom: 12rem; width: 2px; background: rgba(212, 175, 55, 0.1); transform: translateX(-50%);">
        <div id="timeline-progress" style="width: 100%; height: 0%; background: var(--primary); box-shadow: 0 0 15px var(--primary); transition: height 0.1s ease;"></div>
    </div>

    <?php for ($i = 1; $i <= 5; $i++) :
        $title = wp_titans_get_mod("wp_titans_process_page_step_title_$i");
        $desc = wp_titans_get_mod("wp_titans_process_page_step_desc_$i");
        $icon = wp_titans_get_mod("wp_titans_process_page_step_icon_$i");
        if (!$title) continue;
        $is_even = ($i % 2 === 0);
    ?>
    <div class="reveal timeline-item" style="display: flex; gap: 4rem; margin-bottom: 12rem; align-items: center; position: relative; flex-direction: <?php echo $is_even ? 'row-reverse' : 'row'; ?>;">
        <div style="flex: 1; text-align: <?php echo $is_even ? 'left' : 'right'; ?>;">
            <h3 style="font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 1.5rem; color: var(--primary);"><?php echo esc_html($title); ?></h3>
            <p style="font-size: 1.25rem; color: var(--text-dim); line-height: 1.8;"><?php echo esc_html($desc); ?></p>
        </div>
        <div class="timeline-dot" style="background: #000; border: 3px solid var(--primary); min-width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 900; z-index: 10; box-shadow: 0 0 20px rgba(212, 175, 55, 0.2);">
            <?php echo $i; ?>
        </div>
        <div style="flex: 1;"></div>
    </div>
    <?php endfor; ?>
</section>

<script>
window.addEventListener('scroll', () => {
    const timeline = document.getElementById('process-timeline');
    const progress = document.getElementById('timeline-progress');
    if (!timeline || !progress) return;

    const rect = timeline.getBoundingClientRect();
    const scrollPos = window.innerHeight / 2;

    if (rect.top < scrollPos) {
        let percent = ((scrollPos - rect.top) / rect.height) * 100;
        if (percent > 100) percent = 100;
        if (percent < 0) percent = 0;
        progress.style.height = percent + '%';
    }
});
</script>

<style>
@media (max-width: 768px) {
    .timeline-line { left: 30px !important; }
    .timeline-item { flex-direction: row !important; gap: 2rem !important; }
    .timeline-item div { text-align: left !important; }
    .timeline-dot { min-width: 40px !important; height: 40px !important; font-size: 0.8rem; }
}
</style>

<?php get_footer(); ?>
