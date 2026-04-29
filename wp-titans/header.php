<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo esc_attr(wp_titans_get_mod("wp_titans_seo_desc")); ?>">
    <?php wp_head(); ?>

    <!-- Open Graph Metadata -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php wp_title(""); ?>">
    <meta property="og:description" content="<?php bloginfo("description"); ?>">
    <?php if (wp_titans_get_mod("wp_titans_og_image")) : ?>
        <meta property="og:image" content="<?php echo esc_url(wp_titans_get_mod("wp_titans_og_image")); ?>">
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

<div id="preloader">
    <div class="loader-content">
        <i class="fas <?php echo esc_attr(wp_titans_get_mod("wp_titans_logo_icon")); ?>"></i>
        <div class="loader-bar"></div>
    </div>
</div>

<nav id="navbar" class="<?php echo wp_titans_get_mod("wp_titans_sticky_header") ? "sticky" : ""; ?>">
    <div class="logo">
        <?php
        $logo_img = wp_titans_get_mod("wp_titans_logo_image");
        $logo_icon = wp_titans_get_mod("wp_titans_logo_icon");
        $logo_text = wp_titans_get_mod("wp_titans_logo_text");

        if ( $logo_img ) : ?>
            <img src="<?php echo esc_url($logo_img); ?>" alt="<?php echo esc_attr($logo_text); ?>" style="height: 40px; width: auto;">
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
