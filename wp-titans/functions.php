<?php
/**
 * WP Titans functions and definitions
 */

require get_template_directory() . '/inc/defaults.php';

if ( ! function_exists( 'wp_titans_setup' ) ) :
    function wp_titans_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'customize-selective-refresh-widgets' );

        register_nav_menus( array(
            'menu-1'   => esc_html__( 'Primary', 'wp-titans' ),
            'footer-1' => esc_html__( 'Footer Services', 'wp-titans' ),
            'footer-2' => esc_html__( 'Footer Company', 'wp-titans' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'wp_titans_setup' );

/**
 * Enqueue scripts and styles.
 */
function wp_titans_scripts() {
    wp_enqueue_style( 'wp-titans-style', get_stylesheet_uri(), array(), '1.2.0' );

    $heading_font = wp_titans_get_mod("wp_titans_heading_font");
    $body_font = wp_titans_get_mod("wp_titans_body_font");

    $font_url = "https://fonts.googleapis.com/css2?family=" . str_replace(' ', '+', $body_font) . ":wght@300;500;700&family=" . str_replace(' ', '+', $heading_font) . ":wght@400;700;800&display=swap";

    wp_enqueue_style( 'wp-titans-google-fonts', $font_url, array(), null );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

    wp_enqueue_script( 'wp-titans-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.2.0', true );
}

/**
 * Enqueue Customizer live preview scripts
 */
function wp_titans_customize_preview_js() {
    wp_enqueue_script( 'wp-titans-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'wp_titans_customize_preview_js' );
add_action( 'wp_enqueue_scripts', 'wp_titans_scripts' );

/**
 * Default Menu Fallback
 */
function wp_titans_default_menu_callback() {
    echo '<a href="#hero">Home</a>';
    echo '<a href="#about">About</a>';
    echo '<a href="#services">Services</a>';
    echo '<a href="#process">Process</a>';
    echo '<a href="#contact">Contact</a>';
}

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * SVG Section Dividers
 */
function wp_titans_divider() {
    $style = wp_titans_get_mod("wp_titans_section_dividers");
    if ($style === 'none') return;

    echo '<div class="section-divider" style="position: absolute; bottom: 0; left: 0; width: 100%; overflow: hidden; line-height: 0; transform: rotate(180deg);">';
    if ($style === 'wave') {
        echo '<svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="position: relative; display: block; width: calc(100% + 1.3px); height: 80px;">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" style="fill: var(--bg-dark); opacity: 0.1;"></path>
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" style="fill: var(--primary); opacity: 0.05; transform: scaleX(-1);"></path>
        </svg>';
    } elseif ($style === 'slant') {
        echo '<svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="position: relative; display: block; width: calc(100% + 1.3px); height: 100px;">
            <path d="M1200 120L0 16.48V0h1200v120z" style="fill: var(--bg-dark); opacity: 0.1;"></path>
        </svg>';
    }
    echo '</div>';
}

/**
 * Simple Breadcrumbs
 */
function wp_titans_breadcrumbs() {
    if ( is_front_page() ) return;

    echo '<nav class="breadcrumbs" style="padding: 2rem 10% 0; font-size: 0.85rem; color: #555; font-family: \'Syne\'; text-transform: uppercase; letter-spacing: 1px;">';
    echo '<a href="' . home_url() . '" style="color: var(--primary);">Home</a>';

    if ( is_page() ) {
        echo ' <span style="margin: 0 10px;">/</span> ' . get_the_title();
    } elseif ( is_single() ) {
        echo ' <span style="margin: 0 10px;">/</span> <a href="' . get_permalink(get_option('page_for_posts')) . '" style="color: var(--primary);">Insights</a>';
        echo ' <span style="margin: 0 10px;">/</span> ' . get_the_title();
    }
    echo '</nav>';
}

/**
 * Register Custom Post Types
 */
function wp_titans_register_cpts() {
    // Portfolio
    register_post_type( 'portfolio', array(
        'labels'      => array( 'name' => 'Portfolio', 'singular_name' => 'Portfolio Item' ),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-portfolio',
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest' => true,
    ) );
    register_taxonomy( 'portfolio_cat', 'portfolio', array( 'label' => 'Categories', 'hierarchical' => true, 'show_in_rest' => true ) );

    // Services
    register_post_type( 'service', array(
        'labels'      => array( 'name' => 'Services', 'singular_name' => 'Service' ),
        'public'      => true,
        'menu_icon'   => 'dashicons-admin-tools',
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest' => true,
    ) );

    // Team
    register_post_type( 'team', array(
        'labels'      => array( 'name' => 'Team', 'singular_name' => 'Team Member' ),
        'public'      => true,
        'menu_icon'   => 'dashicons-groups',
        'supports'    => array( 'title', 'thumbnail', 'excerpt' ),
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'wp_titans_register_cpts' );

/**
 * Handle Theme Auto-Setup from Customizer
 */
function wp_titans_handle_setup() {
    if ( get_theme_mod( 'wp_titans_generate_pages', false ) ) {

        $pages = array(
            'Home' => array(
                'template' => 'front-page.php',
                'is_front' => true
            ),
            'Services' => array(
                'template' => 'page-services.php'
            ),
            'The Process' => array(
                'template' => 'page-process.php'
            ),
            'About Us' => array(
                'template' => 'page-about.php'
            ),
            'Contact Us' => array(
                'template' => 'page-contact.php'
            ),
            'Portfolio' => array(
                'template' => 'page-portfolio.php'
            ),
            'Book a Strategy Call' => array(
                'template' => 'page-book.php'
            ),
            'Project Planner' => array(
                'template' => 'page-planner.php'
            ),
            'Authority Website System' => array(
                'template' => 'page-authority.php'
            ),
            'Privacy Policy' => array(
                'template' => 'page.php',
                'content'  => 'Your privacy is important to us. This policy explains how we collect and use your data.'
            ),
            'Terms & Conditions' => array(
                'template' => 'page.php',
                'content'  => 'By using our services, you agree to the following terms...'
            ),
            'Web Design Strategy' => array(
                'template' => 'page-service-single.php',
                'content'  => 'Our comprehensive web design strategy focuses on conversion and authority.'
            ),
            'Conversion Case Study' => array(
                'template' => 'page-case-study.php',
                'content'  => 'This case study outlines how we helped a client grow by 140%.'
            )
        );

        $created_page_ids = array();

        foreach ( $pages as $title => $data ) {
            $existing = get_page_by_title( $title );
            if ( ! $existing ) {
                $page_id = wp_insert_post( array(
                    'post_title'   => $title,
                    'post_content' => isset($data['content']) ? $data['content'] : '',
                    'post_status'  => 'publish',
                    'post_type'    => 'page',
                ) );

                if ( $page_id ) {
                    update_post_meta( $page_id, '_wp_page_template', $data['template'] );
                    $created_page_ids[$title] = $page_id;

                    if ( isset( $data['is_front'] ) && $data['is_front'] ) {
                        update_option( 'show_on_front', 'page' );
                        update_option( 'page_on_front', $page_id );
                    }
                }
            } else {
                $created_page_ids[$title] = $existing->ID;
            }
        }

        // Setup Primary Menu automatically
        $menu_name = 'Main Menu';
        $menu_exists = wp_get_nav_menu_object( $menu_name );
        if ( ! $menu_exists ) {
            $menu_id = wp_create_nav_menu( $menu_name );
            foreach ( $created_page_ids as $title => $id ) {
                if ( in_array($title, array('Home', 'Services', 'The Process', 'About Us', 'Contact Us', 'Book a Strategy Call', 'Project Planner')) ) {
                    wp_update_nav_menu_item( $menu_id, 0, array(
                        'menu-item-title'     => $title,
                        'menu-item-object'    => 'page',
                        'menu-item-object-id' => $id,
                        'menu-item-type'      => 'post_type',
                        'menu-item-status'    => 'publish',
                    ) );
                }
            }
            $locations = get_theme_mod( 'nav_menu_locations' );
            $locations['menu-1'] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }

        // Reset the setting so it doesn't run every time
        set_theme_mod( 'wp_titans_generate_pages', false );
    }
}
add_action( 'customize_save_after', 'wp_titans_handle_setup' );
