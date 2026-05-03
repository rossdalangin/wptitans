<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $seo_desc = wp_titans_get_mod("wp_titans_seo_desc");
    if (is_singular()) {
        $post_desc = get_the_excerpt();
        if ($post_desc) $seo_desc = $post_desc;
    }
    ?>
    <meta name="description" content="<?php echo esc_attr($seo_desc); ?>">
    <?php wp_head(); ?>

    <!-- Open Graph Metadata -->
    <meta property="og:type" content="<?php echo is_singular() ? 'article' : 'website'; ?>">
    <meta property="og:title" content="<?php wp_title(""); ?>">
    <meta property="og:description" content="<?php echo esc_attr($seo_desc); ?>">
    <?php
    $og_img = wp_titans_get_mod("wp_titans_og_image");
    if (is_singular() && has_post_thumbnail()) {
        $og_img = get_the_post_thumbnail_url(get_the_ID(), 'large');
    }
    if ($og_img) : ?>
        <meta property="og:image" content="<?php echo esc_url($og_img); ?>">
    <?php endif; ?>

    <?php echo wp_titans_get_mod("wp_titans_header_scripts"); ?>

    <!-- Schema Markup -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "name": "<?php bloginfo("name"); ?>",
      "url": "<?php echo esc_url(home_url("/")); ?>",
      "logo": "<?php echo esc_url(wp_titans_get_mod("wp_titans_logo_image")); ?>",
      "description": "<?php bloginfo("description"); ?>",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "<?php echo esc_html(wp_titans_get_mod("wp_titans_contact_location")); ?>"
      },
      "telephone": "<?php echo esc_html(wp_titans_get_mod("wp_titans_contact_phone")); ?>",
      "priceRange": "$$"
    }
    </script>

    <?php if (is_page_template('page-service-single.php')) : ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Service",
      "serviceType": "<?php the_title(); ?>",
      "provider": {
        "@type": "LocalBusiness",
        "name": "<?php bloginfo("name"); ?>"
      },
      "description": "<?php echo esc_js(get_the_excerpt()); ?>"
    }
    </script>
    <?php endif; ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if (wp_titans_get_mod("wp_titans_mouse_glow")) : ?>
    <div id="mouse-glow" style="position: fixed; top: 0; left: 0; width: 600px; height: 600px; background: radial-gradient(circle, var(--accent-glow) 0%, transparent 70%); border-radius: 50%; pointer-events: none; z-index: 0; transform: translate(-50%, -50%); opacity: 0; transition: opacity 1s;"></div>
<?php endif; ?>

<?php if (wp_titans_get_mod("wp_titans_noise_overlay")) : ?>
<div id="noise-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; pointer-events: none; opacity: 0.05; background-image: url('data:image/svg+xml,%3Csvg viewBox=%220 0 200 200%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22noiseFilter%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.65%22 numOctaves=%223%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23noiseFilter)%22/%3E%3C/svg%3E');"></div>
<?php endif; ?>

<?php
$texture = wp_titans_get_mod('wp_titans_texture_overlay');
if ($texture !== 'none') :
    $img_url = '';
    if ($texture === 'dots') $img_url = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAFklEQVQoU2NkYGD4z8DAwMgwYhAKDAwAJ20B9XfS124AAAAASUVORK5CYII=';
    if ($texture === 'grid') $img_url = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAFElEQVQ4T2NkYGD4z0AAMDAwYIQCABNfAQF9OunvAAAAAElFTkSuQmCC';
    if ($texture === 'lines') $img_url = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAFElEQVQYV2NkYGD4z4AEMDAwYAgAALf6AgG98L1PAAAAAElFTkSuQmCC';
?>
<div id="texture-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9998; pointer-events: none; opacity: 0.03; background-image: url('<?php echo $img_url; ?>'); background-repeat: repeat;"></div>
<?php endif; ?>

<?php if (wp_titans_get_mod("wp_titans_top_bar_show")) : ?>
<div id="top-announcement-bar" style="background: var(--primary); color: black; padding: 0.6rem 10%; text-align: center; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; position: relative; z-index: 2001; font-family: 'Syne';">
    <a href="<?php echo esc_url(wp_titans_get_mod("wp_titans_top_bar_url")); ?>" style="text-decoration: none;">
        <?php echo esc_html(wp_titans_get_mod("wp_titans_top_bar_text")); ?>
        <i class="fas fa-arrow-right" style="margin-left: 10px;"></i>
    </a>
</div>
<?php endif; ?>

<?php if (wp_titans_get_mod("wp_titans_custom_cursor")) : ?>
    <div id="custom-cursor" style="position: fixed; width: 30px; height: 30px; border: 2px solid var(--primary); border-radius: 50%; pointer-events: none; z-index: 100000; transform: translate(-50%, -50%); transition: width 0.3s, height 0.3s, background 0.3s; display: flex; align-items: center; justify-content: center; overflow: hidden;">
        <span id="cursor-text" style="font-size: 0.6rem; font-weight: 900; color: black; font-family: 'Syne'; text-transform: uppercase; letter-spacing: 1px; opacity: 0; transition: opacity 0.3s;"></span>
    </div>
<?php endif; ?>

<!-- Floating Authority Widget -->
<?php if (wp_titans_get_mod('wp_titans_fab_show', true)) : ?>
<div id="authority-floating-widget" style="position: fixed; bottom: 30px; right: 30px; z-index: 10000; display: flex; flex-direction: column; align-items: flex-end; gap: 1rem;">
    <div id="fab-menu" style="display: none; flex-direction: column; gap: 0.5rem; margin-bottom: 1rem; transform: translateY(20px); opacity: 0; transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);">
        <a href="<?php echo get_permalink(get_page_by_path('book-a-strategy-call')); ?>" style="background: #111; color: white; padding: 0.8rem 1.5rem; border-radius: 4px; font-size: 0.75rem; font-weight: 800; font-family: 'Syne'; text-transform: uppercase; letter-spacing: 1px; border: 1px solid var(--primary); text-decoration: none; white-space: nowrap;">
            <i class="fas fa-calendar-alt" style="margin-right: 10px; color: var(--primary);"></i> <?php _e('Book Strategy Call', 'wp-titans'); ?>
        </a>
        <a href="<?php echo get_permalink(get_page_by_path('free-authority-audit')); ?>" style="background: #111; color: white; padding: 0.8rem 1.5rem; border-radius: 4px; font-size: 0.75rem; font-weight: 800; font-family: 'Syne'; text-transform: uppercase; letter-spacing: 1px; border: 1px solid var(--primary); text-decoration: none; white-space: nowrap;">
            <i class="fas fa-search" style="margin-right: 10px; color: var(--primary);"></i> <?php _e('Free Authority Audit', 'wp-titans'); ?>
        </a>
    </div>
    <button id="fab-trigger" style="width: 60px; height: 60px; background: var(--primary); border: none; border-radius: 50%; color: black; font-size: 1.5rem; cursor: pointer; box-shadow: 0 10px 30px rgba(var(--primary-rgb), 0.3); transition: transform 0.3s;" aria-label="<?php _e('Conversion Options', 'wp-titans'); ?>">
        <i class="fas fa-comment-dots"></i>
    </button>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const trigger = document.getElementById('fab-trigger');
    const menu = document.getElementById('fab-menu');
    let isOpen = false;

    trigger.addEventListener('click', () => {
        isOpen = !isOpen;
        if (isOpen) {
            menu.style.display = 'flex';
            setTimeout(() => {
                menu.style.transform = 'translateY(0)';
                menu.style.opacity = '1';
                trigger.style.transform = 'rotate(90deg)';
                trigger.innerHTML = '<i class="fas fa-times"></i>';
            }, 10);
        } else {
            menu.style.transform = 'translateY(20px)';
            menu.style.opacity = '0';
            trigger.style.transform = 'rotate(0)';
            trigger.innerHTML = '<i class="fas fa-comment-dots"></i>';
            setTimeout(() => { menu.style.display = 'none'; }, 400);
        }
    });
});
</script>
<?php endif; ?>

<?php if (wp_titans_get_mod("wp_titans_preloader_show")) : ?>
<div id="preloader">
    <div class="loader-content">
        <i class="fas <?php echo esc_attr(wp_titans_get_mod("wp_titans_logo_icon")); ?>"></i>
        <div class="loader-bar"></div>
    </div>
</div>
<?php endif; ?>

<?php if (wp_titans_get_mod("wp_titans_progress_bar")) : ?>
<div id="reading-progress"></div>
<?php endif; ?>

<nav id="navbar" class="<?php echo wp_titans_get_mod("wp_titans_sticky_header") ? "sticky" : ""; ?>">
    <div class="logo">
        <?php
        $logo_img = wp_titans_get_mod("wp_titans_logo_image");
        $logo_icon = wp_titans_get_mod("wp_titans_logo_icon");
        $logo_text = wp_titans_get_mod("wp_titans_logo_text");

        if ( $logo_img ) : ?>
            <img loading="lazy" src="<?php echo esc_url($logo_img); ?>" alt="<?php echo esc_attr($logo_text); ?>" style="height: 40px; width: auto;">
        <?php else : ?>
            <i class="fas <?php echo esc_attr($logo_icon); ?>"></i> <?php echo esc_html($logo_text); ?>
        <?php endif; ?>
    </div>
    <div class="nav-links">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
            'container'      => false,
            'fallback_cb'    => 'wp_titans_default_menu_callback',
            'items_wrap'     => '%3$s',
        ) );
        ?>
    </div>
    <div style="display: flex; align-items: center; gap: 2rem;">
        <a href="<?php echo esc_url(wp_titans_get_mod("wp_titans_hero_btn2_url")); ?>" class="btn btn-primary nav-cta" style="padding: 0.7rem 1.5rem; font-size: 0.85rem;"><?php echo esc_html(wp_titans_get_mod("wp_titans_hero_btn2_text")); ?></a>
        <button id="search-toggle" style="background:none; border:none; cursor: pointer; font-size: 1.1rem; color: var(--primary);" aria-label="Search">
            <i class="fas fa-search"></i>
        </button>
        <?php if (wp_titans_get_mod("wp_titans_mode_toggle")) : ?>
            <button id="theme-switch" style="background:none; border:none; cursor: pointer; font-size: 1.2rem; color: var(--primary);" aria-label="Toggle Dark Mode">
                <i class="fas fa-moon"></i>
            </button>
        <?php endif; ?>
        <button id="mobile-toggle" style="display: none; background:none; border:none; cursor: pointer; font-size: 1.5rem; color: var(--primary);" aria-label="Open Menu">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</nav>

<?php wp_titans_breadcrumbs(); ?>

<div id="search-overlay">
    <div id="search-close"><i class="fas fa-times"></i></div>
    <div class="search-container">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" id="ajax-search-form">
            <input type="search" placeholder="Search the Arsenal..." value="<?php echo get_search_query(); ?>" name="s" id="search-input" autocomplete="off">
            <button type="submit"><i class="fas fa-arrow-right"></i></button>
        </form>
        <div id="search-results-live" style="margin-top: 3rem; text-align: left; max-width: 600px; margin-left: auto; margin-right: auto;"></div>
        <p style="margin-top: 2rem; color: #444; font-family: 'Syne'; text-transform: uppercase; letter-spacing: 2px;"><?php _e('Start typing to see live results', 'wp-titans'); ?></p>
    </div>
</div>

<div id="mobile-menu-overlay">
    <div id="mobile-close"><i class="fas fa-times"></i></div>
    <div class="mobile-nav-links">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'container'      => false,
            'fallback_cb'    => 'wp_titans_default_menu_callback',
            'items_wrap'     => '%3$s',
        ) );
        ?>
    </div>
</div>
