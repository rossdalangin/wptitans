<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <?php echo get_theme_mod('wp_titans_header_scripts'); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav id="navbar" class="<?php echo get_theme_mod('wp_titans_sticky_header', true) ? 'sticky' : ''; ?>">
    <div class="logo">
        <?php
        $logo_img = get_theme_mod('wp_titans_logo_image', 'https://wordpresstitans.com/wp-content/uploads/2025/12/logogold.png');
        $logo_icon = get_theme_mod('wp_titans_logo_icon', 'fa-crown');
        $logo_text = get_theme_mod('wp_titans_logo_text', 'TITANS');

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
    <a href="<?php echo esc_url(get_theme_mod('wp_titans_hero_btn2_url', '#contact')); ?>" class="btn btn-primary" style="padding: 0.7rem 1.5rem; font-size: 0.85rem;"><?php echo esc_html(get_theme_mod('wp_titans_hero_btn2_text', 'Schedule a Call')); ?></a>
</nav>
