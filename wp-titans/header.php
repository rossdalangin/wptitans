<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav id="navbar">
    <div class="logo">
        <?php
        $logo_icon = get_theme_mod('wp_titans_logo_icon', 'fa-bolt');
        $logo_text = get_theme_mod('wp_titans_logo_text', 'TITANS');
        ?>
        <i class="fas <?php echo esc_attr($logo_icon); ?>"></i> <?php echo esc_html($logo_text); ?>
    </div>
    <div class="nav-links">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'container'      => false,
            'fallback_cb'    => 'wp_titans_default_menu',
        ) );
        ?>
    </div>
    <a href="#contact" class="btn btn-primary" style="padding: 0.8rem 1.5rem; font-size: 0.8rem;">Get Started</a>
</nav>
