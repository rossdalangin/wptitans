<?php get_header(); ?>

<section class="error-404" style="height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
    <h1 style="font-size: 8rem; color: var(--primary);">404</h1>
    <h2>Mission Compromised</h2>
    <p style="margin: 2rem 0; color: var(--text-dim);">The page you are looking for has been moved or deleted.</p>
    <a href="<?php echo home_url(); ?>" class="btn btn-primary">Return to Base</a>
</section>

<?php get_footer(); ?>
