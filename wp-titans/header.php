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
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if (wp_titans_get_mod("wp_titans_top_bar_show")) : ?>
<div id="top-announcement-bar" style="background: var(--primary); color: black; padding: 0.6rem 10%; text-align: center; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; position: relative; z-index: 2001; font-family: 'Syne';">
    <a href="<?php echo esc_url(wp_titans_get_mod("wp_titans_top_bar_url")); ?>" style="text-decoration: none;">
        <?php echo esc_html(wp_titans_get_mod("wp_titans_top_bar_text")); ?>
        <i class="fas fa-arrow-right" style="margin-left: 10px;"></i>
    </a>
</div>
<?php endif; ?>

<?php if (wp_titans_get_mod("wp_titans_custom_cursor")) : ?>
    <div id="custom-cursor" style="position: fixed; width: 30px; height: 30px; border: 2px solid var(--primary); border-radius: 50%; pointer-events: none; z-index: 100000; transform: translate(-50%, -50%); transition: width 0.3s, height 0.3s, background 0.3s; display: none;"></div>
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
        <div id="search-toggle" style="cursor: pointer; font-size: 1.1rem; color: var(--primary);">
            <i class="fas fa-search"></i>
        </div>
        <?php if (wp_titans_get_mod("wp_titans_mode_toggle")) : ?>
            <div id="theme-switch" style="cursor: pointer; font-size: 1.2rem; color: var(--primary);">
                <i class="fas fa-moon"></i>
            </div>
        <?php endif; ?>
        <div id="mobile-toggle" style="display: none; cursor: pointer; font-size: 1.5rem; color: var(--primary);">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</nav>

<?php wp_titans_breadcrumbs(); ?>

<div id="search-overlay">
    <div id="search-close"><i class="fas fa-times"></i></div>
    <div class="search-container">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="search" placeholder="Type to search insights..." value="<?php echo get_search_query(); ?>" name="s" id="search-input">
            <button type="submit"><i class="fas fa-arrow-right"></i></button>
        </form>
        <p style="margin-top: 2rem; color: #444; font-family: 'Syne'; text-transform: uppercase; letter-spacing: 2px;">Press Enter to search</p>
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
