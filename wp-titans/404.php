<?php get_header(); ?>

<section class="error-404" style="height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
    <h1 style="font-size: 8rem; color: var(--primary);">404</h1>
    <h2><?php echo esc_html(wp_titans_get_mod("wp_titans_404_title")); ?></h2>
    <p style="margin: 2rem 0; color: var(--text-dim);"><?php echo esc_html(wp_titans_get_mod("wp_titans_404_text")); ?></p>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Return to Base</a>
</section>

<?php get_footer(); ?>
