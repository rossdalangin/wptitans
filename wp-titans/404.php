<?php get_header(); ?>

<section class="error-404" style="height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
    <h1 style="font-size: 8rem; color: var(--primary);">404</h1>
    <h2><?php echo esc_html(wp_titans_get_mod("wp_titans_404_title")); ?></h2>
    <p style="margin: 2rem 0; color: var(--text-dim);"><?php echo esc_html(wp_titans_get_mod("wp_titans_404_text")); ?></p>

    <div style="max-width: 600px; width: 100%; margin: 3rem 0; background: #050505; padding: 4rem; border-radius: 8px; border: 1px solid var(--border-glass);">
        <h3 style="font-size: 1.2rem; margin-bottom: 2rem; color: white;">While you're here, let's find what you need:</h3>
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" style="display: flex; gap: 1rem; margin-bottom: 3rem;">
            <input type="search" placeholder="Search Insights..." name="s" style="flex: 1; padding: 1.2rem; background: #000; border: 1px solid #222; color: white; border-radius: 4px;">
            <button type="submit" class="btn btn-primary" style="padding: 1rem 2rem;">Search</button>
        </form>

        <div style="border-top: 1px solid #111; padding-top: 3rem;">
            <p style="color: var(--primary); font-weight: 700; margin-bottom: 1rem;">OR ESTABLISH AUTHORITY:</p>
            <a href="<?php echo get_permalink(get_page_by_path('free-authority-audit')); ?>" class="btn btn-outline" style="width: 100%;">Claim Your Free Website Audit</a>
        </div>
    </div>

    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: #444; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 2px; text-decoration: none;">&larr; Back to Mission Control</a>
</section>

<?php get_footer(); ?>
