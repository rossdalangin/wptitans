<?php
/**
 * WP Titans Customizer settings
 */
function wp_titans_customize_register( $wp_customize ) {

    // --- PANELS ---
    $wp_customize->add_panel( 'wp_titans_global_panel', array(
        'title'    => __( 'Titan: Global Branding', 'wp-titans' ),
        'priority' => 10,
    ) );

    $wp_customize->add_panel( 'wp_titans_sections_panel', array(
        'title'    => __( 'Titan: Homepage Sections', 'wp-titans' ),
        'priority' => 20,
    ) );

    $wp_customize->add_panel( 'wp_titans_pages_panel', array(
        'title'    => __( 'Titan: Specialized Pages', 'wp-titans' ),
        'priority' => 30,
    ) );

    // --- Branding Section ---
    $wp_customize->add_section( 'wp_titans_branding', array(
        'title'    => __( 'Identity & Logo', 'wp-titans' ),
        'panel'    => 'wp_titans_global_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_logo_image', array( 'default' => wp_titans_get_default('wp_titans_logo_image'), 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_titans_logo_image', array( 'label' => __( 'Logo Image', 'wp-titans' ), 'section' => 'wp_titans_branding' ) ) );

    $wp_customize->add_setting( 'wp_titans_logo_icon', array( 'default' => wp_titans_get_default('wp_titans_logo_icon'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_logo_icon', array( 'label' => __( 'Logo Icon (used if no image)', 'wp-titans' ), 'section' => 'wp_titans_branding', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_logo_text', array( 'default' => wp_titans_get_default('wp_titans_logo_text'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_logo_text', array( 'label' => __( 'Logo Text', 'wp-titans' ), 'section' => 'wp_titans_branding', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_footer_desc', array( 'default' => wp_titans_get_default('wp_titans_footer_desc'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_footer_desc', array( 'label' => __( 'Footer Description', 'wp-titans' ), 'section' => 'wp_titans_branding', 'type' => 'textarea' ) );

    // --- Colors & Typography ---
    $wp_customize->add_section( 'wp_titans_design', array(
        'title'    => __( 'Visual Style', 'wp-titans' ),
        'panel'    => 'wp_titans_global_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_design_preset', array( 'default' => 'gold', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_design_preset', array(
        'label' => __( 'Luxury Design Preset', 'wp-titans' ),
        'description' => __( 'Changing this will update global colors instantly.', 'wp-titans' ),
        'section' => 'wp_titans_design',
        'type' => 'select',
        'choices' => array( 'gold' => 'Titan Gold (Default)', 'sapphire' => 'Midnight Sapphire', 'emerald' => 'Emerald Luxury' )
    ) );

    $wp_customize->add_setting( 'wp_titans_primary_color', array( 'default' => wp_titans_get_default('wp_titans_primary_color'), 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_titans_primary_color', array( 'label' => __( 'Primary Color (Manual Override)', 'wp-titans' ), 'section' => 'wp_titans_design' ) ) );

    $wp_customize->add_setting( 'wp_titans_secondary_color', array( 'default' => '#B8860B', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_titans_secondary_color', array( 'label' => __( 'Secondary Accent', 'wp-titans' ), 'section' => 'wp_titans_design' ) ) );

    $wp_customize->add_setting( 'wp_titans_heading_font', array( 'default' => wp_titans_get_default('wp_titans_heading_font'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_heading_font', array( 'label' => __( 'Heading Font (Google Font Name)', 'wp-titans' ), 'section' => 'wp_titans_design', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_body_font', array( 'default' => wp_titans_get_default('wp_titans_body_font'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_body_font', array( 'label' => __( 'Body Font (Google Font Name)', 'wp-titans' ), 'section' => 'wp_titans_design', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_adobe_fonts_id', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_adobe_fonts_id', array(
        'label' => __( 'Adobe Fonts (Typekit) Project ID', 'wp-titans' ),
        'description' => __( 'Enter your Project ID to load premium fonts.', 'wp-titans' ),
        'section' => 'wp_titans_design',
        'type' => 'text'
    ) );

    $wp_customize->add_setting( 'wp_titans_line_height', array( 'default' => '1.8', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_line_height', array( 'label' => __( 'Body Line Height', 'wp-titans' ), 'section' => 'wp_titans_design' ) );

    $wp_customize->add_setting( 'wp_titans_letter_spacing', array( 'default' => '0', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_letter_spacing', array( 'label' => __( 'Heading Letter Spacing (em)', 'wp-titans' ), 'section' => 'wp_titans_design' ) );

    $wp_customize->add_setting( 'wp_titans_h_uppercase', array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_h_uppercase', array( 'label' => __( 'Force Uppercase Headings', 'wp-titans' ), 'section' => 'wp_titans_design', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_card_bg', array( 'default' => '#0a0a0a', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_titans_card_bg', array( 'label' => __( 'Card Background Color', 'wp-titans' ), 'section' => 'wp_titans_design' ) ) );

    $wp_customize->add_setting( 'wp_titans_border_radius', array( 'default' => '8px', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_border_radius', array( 'label' => __( 'Global Border Radius', 'wp-titans' ), 'section' => 'wp_titans_design' ) );

    $wp_customize->add_setting( 'wp_titans_hero_opacity', array( 'default' => 0.8, 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_hero_opacity', array( 'label' => __( 'Hero Overlay Opacity (0-1)', 'wp-titans' ), 'section' => 'wp_titans_hero', 'type' => 'number', 'input_attrs' => array('step' => 0.1, 'min' => 0, 'max' => 1) ) );

    // --- Hero Section ---
    $wp_customize->add_section( 'wp_titans_hero', array(
        'title'    => __( '01. Hero & Ticker', 'wp-titans' ),
        'panel'    => 'wp_titans_sections_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_hero_title', array( 'default' => wp_titans_get_default('wp_titans_hero_title'), 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'wp_titans_hero_title', array( 'label' => __( 'Hero Title', 'wp-titans' ), 'section' => 'wp_titans_hero', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_hero_subtitle', array( 'default' => wp_titans_get_default('wp_titans_hero_subtitle'), 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'wp_titans_hero_subtitle', array( 'label' => __( 'Hero Subtitle', 'wp-titans' ), 'section' => 'wp_titans_hero', 'type' => 'textarea' ) );

    // Enable Selective Refresh for non-JS fields
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'wp_titans_hero_title', array( 'selector' => '#hero h1', 'render_callback' => function() { return wp_titans_get_mod('wp_titans_hero_title'); } ) );
        $wp_customize->selective_refresh->add_partial( 'wp_titans_hero_subtitle', array( 'selector' => '#hero p', 'render_callback' => function() { return wp_titans_get_mod('wp_titans_hero_subtitle'); } ) );
        $wp_customize->selective_refresh->add_partial( 'wp_titans_about_title', array( 'selector' => '#about h2', 'render_callback' => function() { return wp_titans_get_mod('wp_titans_about_title'); } ) );
        $wp_customize->selective_refresh->add_partial( 'wp_titans_services_main_title', array( 'selector' => '#services h2', 'render_callback' => function() { return wp_titans_get_mod('wp_titans_services_main_title'); } ) );
        $wp_customize->selective_refresh->add_partial( 'wp_titans_process_main_title', array( 'selector' => '#process h2', 'render_callback' => function() { return wp_titans_get_mod('wp_titans_process_main_title'); } ) );
        $wp_customize->selective_refresh->add_partial( 'wp_titans_logo_text', array( 'selector' => '.logo', 'render_callback' => function() { return wp_titans_get_mod('wp_titans_logo_text'); } ) );
        $wp_customize->selective_refresh->add_partial( 'wp_titans_portfolio_title', array( 'selector' => '#portfolio h2', 'render_callback' => function() { return wp_titans_get_mod('wp_titans_portfolio_title'); } ) );
        $wp_customize->selective_refresh->add_partial( 'wp_titans_comparison_title', array( 'selector' => '#comparison h2', 'render_callback' => function() { return wp_titans_get_mod('wp_titans_comparison_title'); } ) );
    }

    $wp_customize->add_setting( 'wp_titans_hero_bg', array( 'default' => wp_titans_get_default('wp_titans_hero_bg'), 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_titans_hero_bg', array( 'label' => __( 'Hero Background Image', 'wp-titans' ), 'section' => 'wp_titans_hero' ) ) );

    $wp_customize->add_setting( 'wp_titans_hero_video', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'wp_titans_hero_video', array( 'label' => __( 'Hero Background Video URL (Direct MP4 link)', 'wp-titans' ), 'section' => 'wp_titans_hero', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_hero_lava', array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_hero_lava', array( 'label' => __( 'Enable Lava Lamp Animation in Hero', 'wp-titans' ), 'section' => 'wp_titans_hero', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_target_lava', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_target_lava', array( 'label' => __( 'Enable Lava Lamp in Qualifying Section', 'wp-titans' ), 'section' => 'wp_titans_target', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_hero_align', array( 'default' => 'center', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_hero_align', array(
        'label' => __( 'Hero Alignment', 'wp-titans' ),
        'section' => 'wp_titans_hero',
        'type' => 'select',
        'choices' => array( 'center' => 'Center', 'left' => 'Left' )
    ) );

    $wp_customize->add_setting( 'wp_titans_hero_ticker', array( 'default' => 'Recent Results: $12k Lead Gen Funnel • 14-Day Authority Site Launch • Expert Brand Platform', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_hero_ticker', array( 'label' => __( 'Hero Ticker Capsule Text', 'wp-titans' ), 'section' => 'wp_titans_hero' ) );

    $wp_customize->add_setting( 'wp_titans_scrolling_ticker', array( 'default' => 'ROI-Driven Systems • $1.2M+ Client Revenue Generated • Elite 14-Day Launch • High-Performance WordPress • Strategic SEO Mastery • Conversion Optimized UI/UX • World-Class Authority Branding', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_scrolling_ticker', array( 'label' => __( 'Full-Width Scrolling Ticker Content', 'wp-titans' ), 'description' => __( 'Use bullets (•) to separate items.', 'wp-titans' ), 'section' => 'wp_titans_hero' ) );

    $wp_customize->add_setting( 'wp_titans_hero_btn1_text', array( 'default' => wp_titans_get_default('wp_titans_hero_btn1_text'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_hero_btn1_text', array( 'label' => __( 'Hero Button 1 Text', 'wp-titans' ), 'section' => 'wp_titans_hero' ) );

    $wp_customize->add_setting( 'wp_titans_hero_btn1_url', array( 'default' => wp_titans_get_default('wp_titans_hero_btn1_url'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_hero_btn1_url', array( 'label' => __( 'Hero Button 1 URL', 'wp-titans' ), 'section' => 'wp_titans_hero' ) );

    $wp_customize->add_setting( 'wp_titans_hero_btn2_text', array( 'default' => wp_titans_get_default('wp_titans_hero_btn2_text'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_hero_btn2_text', array( 'label' => __( 'Hero Button 2 Text', 'wp-titans' ), 'section' => 'wp_titans_hero' ) );

    $wp_customize->add_setting( 'wp_titans_hero_btn2_url', array( 'default' => wp_titans_get_default('wp_titans_hero_btn2_url'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_hero_btn2_url', array( 'label' => __( 'Hero Button 2 URL', 'wp-titans' ), 'section' => 'wp_titans_hero' ) );

    // --- Who We Work With Section ---
    $wp_customize->add_section( 'wp_titans_target', array(
        'title'    => __( '04. Qualifying (Ideal Client)', 'wp-titans' ),
        'panel'    => 'wp_titans_sections_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_target_tagline', array( 'default' => wp_titans_get_default('wp_titans_target_tagline'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_target_tagline', array( 'label' => __( 'Section Tagline', 'wp-titans' ), 'section' => 'wp_titans_target' ) );

    $wp_customize->add_setting( 'wp_titans_target_main_title', array( 'default' => wp_titans_get_default('wp_titans_target_main_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_target_main_title', array( 'label' => __( 'Section Title', 'wp-titans' ), 'section' => 'wp_titans_target' ) );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "wp_titans_target_icon_$i", array( 'default' => wp_titans_get_default("wp_titans_target_icon_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_target_icon_$i", array( 'label' => "Target $i Icon", 'section' => 'wp_titans_target' ) );

        $wp_customize->add_setting( "wp_titans_target_title_$i", array( 'default' => wp_titans_get_default("wp_titans_target_title_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_target_title_$i", array( 'label' => "Target $i Title", 'section' => 'wp_titans_target' ) );

        $wp_customize->add_setting( "wp_titans_target_desc_$i", array( 'default' => wp_titans_get_default("wp_titans_target_desc_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_target_desc_$i", array( 'label' => "Target $i Desc", 'section' => 'wp_titans_target', 'type' => 'textarea' ) );
    }

    // --- 404 Page ---
    $wp_customize->add_section( 'wp_titans_404_sec', array(
        'title'    => __( '404 Page', 'wp-titans' ),
        'priority' => 120,
    ) );

    $wp_customize->add_setting( 'wp_titans_404_title', array( 'default' => wp_titans_get_default('wp_titans_404_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_404_title', array( 'label' => __( '404 Title', 'wp-titans' ), 'section' => 'wp_titans_404_sec' ) );

    $wp_customize->add_setting( 'wp_titans_404_text', array( 'default' => wp_titans_get_default('wp_titans_404_text'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_404_text', array( 'label' => __( '404 Message', 'wp-titans' ), 'section' => 'wp_titans_404_sec', 'type' => 'textarea' ) );

    // --- About Section ---
    $wp_customize->add_section( 'wp_titans_about', array(
        'title'    => __( '05. About Agency', 'wp-titans' ),
        'panel'    => 'wp_titans_sections_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_about_tagline', array( 'default' => wp_titans_get_default('wp_titans_about_tagline'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_about_tagline', array( 'label' => __( 'About Tagline', 'wp-titans' ), 'section' => 'wp_titans_about', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_about_title', array( 'default' => wp_titans_get_default('wp_titans_about_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_about_title', array( 'label' => __( 'About Title', 'wp-titans' ), 'section' => 'wp_titans_about', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_about_content', array( 'default' => wp_titans_get_default('wp_titans_about_content'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_about_content', array( 'label' => __( 'About Content', 'wp-titans' ), 'section' => 'wp_titans_about', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_about_image', array( 'default' => wp_titans_get_default('wp_titans_about_image'), 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_titans_about_image', array( 'label' => __( 'About Image', 'wp-titans' ), 'section' => 'wp_titans_about' ) ) );

    $wp_customize->add_setting( 'wp_titans_about_btn_text', array( 'default' => wp_titans_get_default('wp_titans_about_btn_text'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_about_btn_text', array( 'label' => __( 'About Button Text', 'wp-titans' ), 'section' => 'wp_titans_about' ) );

    $wp_customize->add_setting( 'wp_titans_about_btn_url', array( 'default' => wp_titans_get_default('wp_titans_about_btn_url'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_about_btn_url', array( 'label' => __( 'About Button URL', 'wp-titans' ), 'section' => 'wp_titans_about' ) );

    // --- Pricing Section ---
    $wp_customize->add_section( 'wp_titans_pricing', array(
        'title'    => __( 'Pricing & Packages', 'wp-titans' ),
        'priority' => 65,
    ) );

    $wp_customize->add_setting( 'wp_titans_pricing_show', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_pricing_show', array( 'label' => __( 'Show Pricing Table', 'wp-titans' ), 'section' => 'wp_titans_pricing', 'type' => 'checkbox' ) );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "wp_titans_pricing_name_$i", array( 'default' => wp_titans_get_default("wp_titans_pricing_name_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_pricing_name_$i", array( 'label' => "Package $i Name", 'section' => 'wp_titans_pricing' ) );

        $wp_customize->add_setting( "wp_titans_pricing_val_$i", array( 'default' => wp_titans_get_default("wp_titans_pricing_val_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_pricing_val_$i", array( 'label' => "Package $i One-Time Price", 'section' => 'wp_titans_pricing' ) );

        $wp_customize->add_setting( "wp_titans_pricing_monthly_$i", array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_pricing_monthly_$i", array( 'label' => "Package $i Monthly Price", 'section' => 'wp_titans_pricing' ) );

        $wp_customize->add_setting( "wp_titans_pricing_desc_$i", array( 'default' => wp_titans_get_default("wp_titans_pricing_desc_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_pricing_desc_$i", array( 'label' => "Package $i Subtitle", 'section' => 'wp_titans_pricing' ) );

        $wp_customize->add_setting( "wp_titans_pricing_features_$i", array( 'default' => wp_titans_get_default("wp_titans_pricing_features_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_pricing_features_$i", array( 'label' => "Package $i Features", 'section' => 'wp_titans_pricing', 'type' => 'textarea' ) );
    }

    // --- Services Section ---
    $wp_customize->add_section( 'wp_titans_services', array(
        'title'    => __( '06. Services Overview', 'wp-titans' ),
        'panel'    => 'wp_titans_sections_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_services_tagline', array( 'default' => wp_titans_get_default('wp_titans_services_tagline'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_services_tagline', array( 'label' => __( 'Section Tagline', 'wp-titans' ), 'section' => 'wp_titans_services' ) );

    $wp_customize->add_setting( 'wp_titans_services_main_title', array( 'default' => wp_titans_get_default('wp_titans_services_main_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_services_main_title', array( 'label' => __( 'Section Title', 'wp-titans' ), 'section' => 'wp_titans_services' ) );

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting( "wp_titans_service_icon_$i", array( 'default' => wp_titans_get_default("wp_titans_service_icon_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_service_icon_$i", array( 'label' => "Service $i Icon", 'section' => 'wp_titans_services' ) );

        $wp_customize->add_setting( "wp_titans_service_title_$i", array( 'default' => wp_titans_get_default("wp_titans_service_title_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_service_title_$i", array( 'label' => "Service $i Title", 'section' => 'wp_titans_services' ) );

        $wp_customize->add_setting( "wp_titans_service_desc_$i", array( 'default' => wp_titans_get_default("wp_titans_service_desc_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_service_desc_$i", array( 'label' => "Service $i Desc", 'section' => 'wp_titans_services', 'type' => 'textarea' ) );

        $wp_customize->add_setting( "wp_titans_service_badge_$i", array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_service_badge_$i", array( 'label' => "Service $i Badge (e.g. Hot, New)", 'section' => 'wp_titans_services' ) );
    }

    // --- Client Logos Section ---
    $wp_customize->add_section( 'wp_titans_logos', array(
        'title'    => __( '03. Trust: Client Logos', 'wp-titans' ),
        'panel'    => 'wp_titans_sections_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_logos_title', array( 'default' => wp_titans_get_default('wp_titans_logos_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_logos_title', array( 'label' => __( 'Logos Title', 'wp-titans' ), 'section' => 'wp_titans_logos' ) );

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting( "wp_titans_client_logo_$i", array( 'default' => wp_titans_get_default("wp_titans_client_logo_$i"), 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_client_logo_$i", array( 'label' => "Client Logo $i", 'section' => 'wp_titans_logos' ) ) );
    }

    // --- Awards Section ---
    $wp_customize->add_section( 'wp_titans_awards', array(
        'title'    => __( '02. Trust: Award Badges', 'wp-titans' ),
        'panel'    => 'wp_titans_sections_panel',
    ) );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "wp_titans_award_img_$i", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_award_img_$i", array( 'label' => "Award Badge $i", 'section' => 'wp_titans_awards' ) ) );
    }

    // --- Media Section ---
    $wp_customize->add_section( 'wp_titans_media', array(
        'title'    => __( 'Media / Featured In Bar', 'wp-titans' ),
        'priority' => 44,
    ) );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "wp_titans_media_logo_$i", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_media_logo_$i", array( 'label' => "Media Logo $i", 'section' => 'wp_titans_media' ) ) );
    }

    // --- Stats Section ---
    $wp_customize->add_section( 'wp_titans_stats', array(
        'title'    => __( '10. Performance Stats', 'wp-titans' ),
        'panel'    => 'wp_titans_sections_panel',
    ) );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "wp_titans_stat_num_$i", array( 'default' => wp_titans_get_default("wp_titans_stat_num_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_stat_num_$i", array( 'label' => "Stat $i Number", 'section' => 'wp_titans_stats' ) );

        $wp_customize->add_setting( "wp_titans_stat_label_$i", array( 'default' => wp_titans_get_default("wp_titans_stat_label_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_stat_label_$i", array( 'label' => "Stat $i Label", 'section' => 'wp_titans_stats' ) );
    }

    // --- Process Section ---
    $wp_customize->add_section( 'wp_titans_process', array(
        'title'    => __( '07. Agency Workflow', 'wp-titans' ),
        'panel'    => 'wp_titans_sections_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_process_tagline', array( 'default' => wp_titans_get_default('wp_titans_process_tagline'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_process_tagline', array( 'label' => __( 'Section Tagline', 'wp-titans' ), 'section' => 'wp_titans_process' ) );

    $wp_customize->add_setting( 'wp_titans_process_main_title', array( 'default' => wp_titans_get_default('wp_titans_process_main_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_process_main_title', array( 'label' => __( 'Section Title', 'wp-titans' ), 'section' => 'wp_titans_process' ) );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "wp_titans_process_title_$i", array( 'default' => wp_titans_get_default("wp_titans_process_title_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_process_title_$i", array( 'label' => "Step $i Title", 'section' => 'wp_titans_process' ) );

        $wp_customize->add_setting( "wp_titans_process_desc_$i", array( 'default' => wp_titans_get_default("wp_titans_process_desc_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_process_desc_$i", array( 'label' => "Step $i Description", 'section' => 'wp_titans_process', 'type' => 'textarea' ) );
    }

    // --- Testimonials Section ---
    $wp_customize->add_section( 'wp_titans_testimonials', array(
        'title'    => __( '13. Proof: Testimonials', 'wp-titans' ),
        'panel'    => 'wp_titans_sections_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_testi_tagline', array( 'default' => wp_titans_get_default('wp_titans_testi_tagline'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_testi_tagline', array( 'label' => __( 'Section Tagline', 'wp-titans' ), 'section' => 'wp_titans_testimonials' ) );

    $wp_customize->add_setting( 'wp_titans_testi_main_title', array( 'default' => wp_titans_get_default('wp_titans_testi_main_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_testi_main_title', array( 'label' => __( 'Section Title', 'wp-titans' ), 'section' => 'wp_titans_testimonials' ) );

    $wp_customize->add_setting( 'wp_titans_testi_layout', array( 'default' => 'grid', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_testi_layout', array(
        'label' => __( 'Testimonials Layout', 'wp-titans' ),
        'section' => 'wp_titans_testimonials',
        'type' => 'select',
        'choices' => array( 'grid' => 'Grid', 'slider' => 'Slider' )
    ) );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "wp_titans_testi_img_$i", array( 'default' => wp_titans_get_default("wp_titans_testi_img_$i"), 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_testi_img_$i", array( 'label' => "Testimonial $i Image", 'section' => 'wp_titans_testimonials' ) ) );

        $wp_customize->add_setting( "wp_titans_testi_quote_$i", array( 'default' => wp_titans_get_default("wp_titans_testi_quote_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_testi_quote_$i", array( 'label' => "Testimonial $i Quote", 'section' => 'wp_titans_testimonials', 'type' => 'textarea' ) );

        $wp_customize->add_setting( "wp_titans_testi_author_$i", array( 'default' => wp_titans_get_default("wp_titans_testi_author_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_testi_author_$i", array( 'label' => "Testimonial $i Author", 'section' => 'wp_titans_testimonials' ) );

        $wp_customize->add_setting( "wp_titans_testi_role_$i", array( 'default' => wp_titans_get_default("wp_titans_testi_role_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_testi_role_$i", array( 'label' => "Testimonial $i Role", 'section' => 'wp_titans_testimonials' ) );
    }

    // --- News/Portfolio Section ---
    $wp_customize->add_section( 'wp_titans_portfolio', array(
        'title'    => __( '08. Proof: Portfolio', 'wp-titans' ),
        'panel'    => 'wp_titans_sections_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_portfolio_layout', array( 'default' => 'grid', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_portfolio_layout', array(
        'label' => __( 'Portfolio Layout', 'wp-titans' ),
        'section' => 'wp_titans_portfolio',
        'type' => 'select',
        'choices' => array( 'grid' => 'Standard Grid', 'masonry' => 'Masonry' )
    ) );

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting( "wp_titans_portfolio_img_$i", array( 'default' => wp_titans_get_default("wp_titans_portfolio_img_$i"), 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_portfolio_img_$i", array( 'label' => "Portfolio $i Image", 'section' => 'wp_titans_portfolio' ) ) );

        $wp_customize->add_setting( "wp_titans_portfolio_title_$i", array( 'default' => wp_titans_get_default("wp_titans_portfolio_title_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_portfolio_title_$i", array( 'label' => "Portfolio $i Title", 'section' => 'wp_titans_portfolio' ) );

        $wp_customize->add_setting( "wp_titans_portfolio_cat_$i", array( 'default' => wp_titans_get_default("wp_titans_portfolio_cat_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_portfolio_cat_$i", array( 'label' => "Portfolio $i Category", 'section' => 'wp_titans_portfolio' ) );

        $wp_customize->add_setting( "wp_titans_portfolio_badge_$i", array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_portfolio_badge_$i", array( 'label' => "Portfolio $i Badge (e.g. Featured)", 'section' => 'wp_titans_portfolio' ) );
    }

    // --- Blog Section ---
    $wp_customize->add_section( 'wp_titans_blog_sec', array(
        'title'    => __( 'Front Page: Recent Insights', 'wp-titans' ),
        'priority' => 88,
    ) );

    $wp_customize->add_setting( 'wp_titans_blog_show', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_blog_show', array( 'label' => __( 'Show Blog Section on Front Page', 'wp-titans' ), 'section' => 'wp_titans_blog_sec', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_blog_title', array( 'default' => 'Agency Insights', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_blog_title', array( 'label' => __( 'Blog Section Title', 'wp-titans' ), 'section' => 'wp_titans_blog_sec' ) );

    $wp_customize->add_setting( 'wp_titans_portfolio_title', array( 'default' => 'Case Studies & Results', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_portfolio_title', array( 'label' => __( 'Portfolio Section Title', 'wp-titans' ), 'section' => 'wp_titans_portfolio' ) );

    $wp_customize->add_setting( 'wp_titans_comparison_title', array( 'default' => 'Website Evolution', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_comparison_title', array( 'label' => __( 'Comparison Section Title', 'wp-titans' ), 'section' => 'wp_titans_comparison' ) );

    $wp_customize->add_setting( 'wp_titans_social_feed_title', array( 'default' => 'Inside the Titan Lab', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_social_feed_title', array( 'label' => __( 'Social Feed Title', 'wp-titans' ), 'section' => 'wp_titans_social_feed' ) );

    // --- FAQ Section ---
    $wp_customize->add_section( 'wp_titans_faq', array(
        'title'    => __( '16. FAQ Accordion', 'wp-titans' ),
        'panel'    => 'wp_titans_sections_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_faq_main_title', array( 'default' => wp_titans_get_default('wp_titans_faq_main_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_faq_main_title', array( 'label' => __( 'Section Title', 'wp-titans' ), 'section' => 'wp_titans_faq' ) ) ;

    for ($i = 1; $i <= 8; $i++) {
        $wp_customize->add_setting( "wp_titans_faq_q_$i", array( 'default' => wp_titans_get_default("wp_titans_faq_q_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_faq_q_$i", array( 'label' => "FAQ $i Question", 'section' => 'wp_titans_faq' ) );

        $wp_customize->add_setting( "wp_titans_faq_a_$i", array( 'default' => wp_titans_get_default("wp_titans_faq_a_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_faq_a_$i", array( 'label' => "FAQ $i Answer", 'section' => 'wp_titans_faq', 'type' => 'textarea' ) );
    }

    // --- Page Headers ---
    $wp_customize->add_section( 'wp_titans_page_headers', array(
        'title'    => __( 'Global Page Headers', 'wp-titans' ),
        'panel'    => 'wp_titans_pages_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_services_page_tagline', array( 'default' => wp_titans_get_default('wp_titans_services_page_tagline'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_services_page_tagline', array( 'label' => __( 'Services Page Tagline', 'wp-titans' ), 'section' => 'wp_titans_page_headers' ) );

    $wp_customize->add_setting( 'wp_titans_services_page_title', array( 'default' => wp_titans_get_default('wp_titans_services_page_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_services_page_title', array( 'label' => __( 'Services Page Title', 'wp-titans' ), 'section' => 'wp_titans_page_headers', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_services_page_subtitle', array( 'default' => wp_titans_get_default('wp_titans_services_page_subtitle'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_services_page_subtitle', array( 'label' => __( 'Services Page Subtitle', 'wp-titans' ), 'section' => 'wp_titans_page_headers', 'type' => 'textarea' ) );

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting( "wp_titans_service_points_$i", array( 'default' => wp_titans_get_default("wp_titans_service_points_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_service_points_$i", array( 'label' => "Service $i Features (Line by line)", 'section' => 'wp_titans_services', 'type' => 'textarea' ) );
    }

    // Services Matrix
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting( "wp_titans_matrix_feat_$i", array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_matrix_feat_$i", array( 'label' => "Matrix Row $i: Feature Name", 'section' => 'wp_titans_services' ) );

        $wp_customize->add_setting( "wp_titans_matrix_p1_$i", array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
        $wp_customize->add_control( "wp_titans_matrix_p1_$i", array( 'label' => "Row $i: In Launchpad?", 'section' => 'wp_titans_services', 'type' => 'checkbox' ) );

        $wp_customize->add_setting( "wp_titans_matrix_p2_$i", array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
        $wp_customize->add_control( "wp_titans_matrix_p2_$i", array( 'label' => "Row $i: In Authority?", 'section' => 'wp_titans_services', 'type' => 'checkbox' ) );

        $wp_customize->add_setting( "wp_titans_matrix_p3_$i", array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
        $wp_customize->add_control( "wp_titans_matrix_p3_$i", array( 'label' => "Row $i: In Enterprise?", 'section' => 'wp_titans_services', 'type' => 'checkbox' ) );
    }

    $wp_customize->add_setting( 'wp_titans_process_page_tagline', array( 'default' => wp_titans_get_default('wp_titans_process_page_tagline'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_process_page_tagline', array( 'label' => __( 'Process Page Tagline', 'wp-titans' ), 'section' => 'wp_titans_page_headers' ) );

    $wp_customize->add_setting( 'wp_titans_process_page_title', array( 'default' => wp_titans_get_default('wp_titans_process_page_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_process_page_title', array( 'label' => __( 'Process Page Title', 'wp-titans' ), 'section' => 'wp_titans_page_headers', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_process_page_subtitle', array( 'default' => wp_titans_get_default('wp_titans_process_page_subtitle'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_process_page_subtitle', array( 'label' => __( 'Process Page Subtitle', 'wp-titans' ), 'section' => 'wp_titans_page_headers', 'type' => 'textarea' ) );

    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting( "wp_titans_process_page_step_icon_$i", array( 'default' => wp_titans_get_default("wp_titans_process_page_step_icon_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_process_page_step_icon_$i", array( 'label' => "Process Step $i Icon", 'section' => 'wp_titans_process' ) );

        $wp_customize->add_setting( "wp_titans_process_page_step_title_$i", array( 'default' => wp_titans_get_default("wp_titans_process_page_step_title_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_process_page_step_title_$i", array( 'label' => "Process Step $i Title", 'section' => 'wp_titans_process' ) );

        $wp_customize->add_setting( "wp_titans_process_page_step_desc_$i", array( 'default' => wp_titans_get_default("wp_titans_process_page_step_desc_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_process_page_step_desc_$i", array( 'label' => "Process Step $i Description", 'section' => 'wp_titans_process', 'type' => 'textarea' ) );
    }

    $wp_customize->add_setting( 'wp_titans_about_page_tagline', array( 'default' => wp_titans_get_default('wp_titans_about_page_tagline'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_about_page_tagline', array( 'label' => __( 'About Page Tagline', 'wp-titans' ), 'section' => 'wp_titans_page_headers' ) );

    $wp_customize->add_setting( 'wp_titans_about_page_title', array( 'default' => wp_titans_get_default('wp_titans_about_page_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_about_page_title', array( 'label' => __( 'About Page Title', 'wp-titans' ), 'section' => 'wp_titans_page_headers', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_about_page_subtitle', array( 'default' => wp_titans_get_default('wp_titans_about_page_subtitle'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_about_page_subtitle', array( 'label' => __( 'About Page Subtitle', 'wp-titans' ), 'section' => 'wp_titans_page_headers', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_about_page_image', array( 'default' => wp_titans_get_default('wp_titans_about_page_image'), 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_titans_about_page_image', array( 'label' => __( 'About Page Hero Image', 'wp-titans' ), 'section' => 'wp_titans_page_headers' ) ) );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "wp_titans_about_pillar_title_$i", array( 'default' => wp_titans_get_default("wp_titans_about_pillar_title_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_about_pillar_title_$i", array( 'label' => "About Pillar $i Title", 'section' => 'wp_titans_about' ) );

        $wp_customize->add_setting( "wp_titans_about_pillar_desc_$i", array( 'default' => wp_titans_get_default("wp_titans_about_pillar_desc_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_about_pillar_desc_$i", array( 'label' => "About Pillar $i Desc", 'section' => 'wp_titans_about', 'type' => 'textarea' ) );
    }

    $wp_customize->add_setting( 'wp_titans_about_story_title', array( 'default' => wp_titans_get_default('wp_titans_about_story_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_about_story_title', array( 'label' => __( 'About Story Title', 'wp-titans' ), 'section' => 'wp_titans_about' ) );

    $wp_customize->add_setting( 'wp_titans_about_story_content', array( 'default' => wp_titans_get_default('wp_titans_about_story_content'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_about_story_content', array( 'label' => __( 'About Story Content', 'wp-titans' ), 'section' => 'wp_titans_about', 'type' => 'textarea' ) );

    $wp_customize->add_section( 'wp_titans_team', array(
        'title'    => __( 'About: Agency Team', 'wp-titans' ),
        'panel'    => 'wp_titans_pages_panel',
    ) );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "wp_titans_team_name_$i", array( 'default' => wp_titans_get_default("wp_titans_team_name_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_team_name_$i", array( 'label' => "Member $i Name", 'section' => 'wp_titans_team' ) );

        $wp_customize->add_setting( "wp_titans_team_role_$i", array( 'default' => wp_titans_get_default("wp_titans_team_role_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_team_role_$i", array( 'label' => "Member $i Role", 'section' => 'wp_titans_team' ) );

        $wp_customize->add_setting( "wp_titans_team_img_$i", array( 'default' => wp_titans_get_default("wp_titans_team_img_$i"), 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_team_img_$i", array( 'label' => "Member $i Photo", 'section' => 'wp_titans_team' ) ) );

        $wp_customize->add_setting( "wp_titans_team_li_$i", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( "wp_titans_team_li_$i", array( 'label' => "Member $i LinkedIn URL", 'section' => 'wp_titans_team' ) );
    }

    $wp_customize->add_section( 'wp_titans_founder', array(
        'title'    => __( 'About: Founder Details', 'wp-titans' ),
        'panel'    => 'wp_titans_pages_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_founder_image', array( 'default' => wp_titans_get_default('wp_titans_founder_image'), 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_titans_founder_image', array( 'label' => __( 'Founder Image', 'wp-titans' ), 'section' => 'wp_titans_founder' ) ) );

    $wp_customize->add_setting( 'wp_titans_founder_name', array( 'default' => wp_titans_get_default('wp_titans_founder_name'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_founder_name', array( 'label' => __( 'Founder Name', 'wp-titans' ), 'section' => 'wp_titans_founder' ) );

    $wp_customize->add_setting( 'wp_titans_founder_bio', array( 'default' => wp_titans_get_default('wp_titans_founder_bio'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_founder_bio', array( 'label' => __( 'Founder Bio', 'wp-titans' ), 'section' => 'wp_titans_founder', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_founder_linkedin', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'wp_titans_founder_linkedin', array( 'label' => __( 'Founder LinkedIn URL', 'wp-titans' ), 'section' => 'wp_titans_founder' ) );

    $wp_customize->add_setting( 'wp_titans_contact_page_tagline', array( 'default' => wp_titans_get_default('wp_titans_contact_page_tagline'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_contact_page_tagline', array( 'label' => __( 'Contact Page Tagline', 'wp-titans' ), 'section' => 'wp_titans_page_headers' ) );

    $wp_customize->add_setting( 'wp_titans_contact_page_title', array( 'default' => wp_titans_get_default('wp_titans_contact_page_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_contact_page_title', array( 'label' => __( 'Contact Page Title', 'wp-titans' ), 'section' => 'wp_titans_page_headers' ) );

    $wp_customize->add_setting( 'wp_titans_contact_page_subtitle', array( 'default' => wp_titans_get_default('wp_titans_contact_page_subtitle'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_contact_page_subtitle', array( 'label' => __( 'Contact Page Subtitle', 'wp-titans' ), 'section' => 'wp_titans_page_headers' ) );

    $wp_customize->add_setting( 'wp_titans_contact_phone', array( 'default' => wp_titans_get_default('wp_titans_contact_phone'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_contact_phone', array( 'label' => __( 'Contact Phone', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    $wp_customize->add_setting( 'wp_titans_contact_location', array( 'default' => wp_titans_get_default('wp_titans_contact_location'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_contact_location', array( 'label' => __( 'Contact Location', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    $wp_customize->add_section( 'wp_titans_authority_page', array(
        'title'    => __( 'Authority Landing Page', 'wp-titans' ),
        'panel'    => 'wp_titans_pages_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_auth_title', array( 'default' => wp_titans_get_default('wp_titans_auth_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_auth_title', array( 'label' => __( 'Authority Title', 'wp-titans' ), 'section' => 'wp_titans_authority_page' ) );

    $wp_customize->add_setting( 'wp_titans_auth_subtitle', array( 'default' => wp_titans_get_default('wp_titans_auth_subtitle'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_auth_subtitle', array( 'label' => __( 'Authority Subtitle', 'wp-titans' ), 'section' => 'wp_titans_authority_page', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_auth_comp_title', array( 'default' => 'System vs. Standard', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_auth_comp_title', array( 'label' => __( 'Comparison Section Title', 'wp-titans' ), 'section' => 'wp_titans_authority_page' ) );

    $wp_customize->add_setting( 'wp_titans_auth_feats_title', array( 'default' => 'Everything You Need for Authority', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_auth_feats_title', array( 'label' => __( 'Features Section Title', 'wp-titans' ), 'section' => 'wp_titans_authority_page' ) );

    $wp_customize->add_setting( 'wp_titans_auth_guarantee_title', array( 'default' => 'The 14-Day Delivery Guarantee', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_auth_guarantee_title', array( 'label' => __( 'Guarantee Title', 'wp-titans' ), 'section' => 'wp_titans_authority_page' ) );

    $wp_customize->add_setting( 'wp_titans_auth_guarantee_text', array( 'default' => 'If we don\'t have your initial website draft ready for review within 14 days of receiving your content, we\'ll give you a 50% discount on the total project cost. No excuses, just results.', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_auth_guarantee_text', array( 'label' => __( 'Guarantee Description', 'wp-titans' ), 'section' => 'wp_titans_authority_page', 'type' => 'textarea' ) );

    // Ideal Client Lists
    $wp_customize->add_setting( 'wp_titans_auth_for_who', array( 'default' => "You are an expert with a high-value offer.\nYou have an outdated website.\nYou want professional positioning.\nYou value speed and 14-day launch.", 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_auth_for_who', array( 'label' => __( 'This is FOR you if... (Line by line)', 'wp-titans' ), 'section' => 'wp_titans_authority_page', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_auth_not_for_who', array( 'default' => "You want the cheapest possible option.\nYou don't have a clear offer.\nYou want a 100-page complex app.\nYou aren't willing to invest in authority.", 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_auth_not_for_who', array( 'label' => __( 'This is NOT for you if... (Line by line)', 'wp-titans' ), 'section' => 'wp_titans_authority_page', 'type' => 'textarea' ) );

    // Comparison Table (System vs Standard)
    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting( "wp_titans_auth_comp_feat_$i", array( 'default' => wp_titans_get_default("wp_titans_auth_comp_feat_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_auth_comp_feat_$i", array( 'label' => "Comparison Row $i: Feature", 'section' => 'wp_titans_authority_page' ) );

        $wp_customize->add_setting( "wp_titans_auth_comp_titan_$i", array( 'default' => wp_titans_get_default("wp_titans_auth_comp_titan_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_auth_comp_titan_$i", array( 'label' => "Comparison Row $i: Titan Value", 'section' => 'wp_titans_authority_page' ) );

        $wp_customize->add_setting( "wp_titans_auth_comp_std_$i", array( 'default' => wp_titans_get_default("wp_titans_auth_comp_std_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_auth_comp_std_$i", array( 'label' => "Comparison Row $i: Standard Value", 'section' => 'wp_titans_authority_page' ) );
    }

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting( "wp_titans_auth_feature_icon_$i", array( 'default' => wp_titans_get_default("wp_titans_auth_feature_icon_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_auth_feature_icon_$i", array( 'label' => "Auth Feature $i Icon", 'section' => 'wp_titans_authority_page' ) );

        $wp_customize->add_setting( "wp_titans_auth_feature_title_$i", array( 'default' => wp_titans_get_default("wp_titans_auth_feature_title_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_auth_feature_title_$i", array( 'label' => "Auth Feature $i Title", 'section' => 'wp_titans_authority_page' ) );

        $wp_customize->add_setting( "wp_titans_auth_feature_desc_$i", array( 'default' => wp_titans_get_default("wp_titans_auth_feature_desc_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_auth_feature_desc_$i", array( 'label' => "Auth Feature $i Desc", 'section' => 'wp_titans_authority_page', 'type' => 'textarea' ) );
    }

    $wp_customize->add_setting( 'wp_titans_auth_cta_title', array( 'default' => wp_titans_get_default('wp_titans_auth_cta_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_auth_cta_title', array( 'label' => __( 'Auth CTA Title', 'wp-titans' ), 'section' => 'wp_titans_authority_page' ) );

    $wp_customize->add_setting( 'wp_titans_auth_cta_desc', array( 'default' => wp_titans_get_default('wp_titans_auth_cta_desc'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_auth_cta_desc', array( 'label' => __( 'Auth CTA Desc', 'wp-titans' ), 'section' => 'wp_titans_authority_page', 'type' => 'textarea' ) );

    $wp_customize->add_section( 'wp_titans_setup', array(
        'title'    => __( 'Theme Setup', 'wp-titans' ),
        'priority' => 10,
    ) );

    $wp_customize->add_setting( 'wp_titans_generate_pages', array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_generate_pages', array(
        'label' => __( 'Generate Essential Pages', 'wp-titans' ),
        'description' => __( 'Check this and Save to automatically create Home, Services, About, etc. with correct templates.', 'wp-titans' ),
        'section' => 'wp_titans_setup',
        'type' => 'checkbox'
    ) );

    $wp_customize->add_setting( 'wp_titans_reset_all', array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_reset_all', array(
        'label' => __( 'Reset All Settings', 'wp-titans' ),
        'description' => __( 'Check this and Save to restore theme to original Titan defaults. Warning: This cannot be undone.', 'wp-titans' ),
        'section' => 'wp_titans_setup',
        'type' => 'checkbox'
    ) );

    $wp_customize->add_section( 'wp_titans_social', array(
        'title'    => __( 'Social Links', 'wp-titans' ),
        'priority' => 100,
    ) );

    $socials = ['facebook', 'linkedin', 'twitter', 'instagram'];
    foreach ($socials as $social) {
        $wp_customize->add_setting( "wp_titans_social_$social", array( 'default' => wp_titans_get_default("wp_titans_social_$social"), 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( "wp_titans_social_$social", array( 'label' => ucfirst($social) . " URL", 'section' => 'wp_titans_social' ) );
    }

    $wp_customize->add_setting( 'wp_titans_og_image', array( 'default' => wp_titans_get_default('wp_titans_og_image'), 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_titans_og_image', array( 'label' => __( 'Social Share Image (OG)', 'wp-titans' ), 'description' => __( 'Default image when sharing on social media.', 'wp-titans' ), 'section' => 'wp_titans_social' ) ) );

    $wp_customize->add_section( 'wp_titans_contact', array(
        'title'    => __( '17. Contact Strategy', 'wp-titans' ),
        'panel'    => 'wp_titans_sections_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_contact_title', array( 'default' => wp_titans_get_default('wp_titans_contact_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_contact_title', array( 'label' => __( 'Contact Title', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    $wp_customize->add_setting( 'wp_titans_contact_desc', array( 'default' => wp_titans_get_default('wp_titans_contact_desc'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_contact_desc', array( 'label' => __( 'Contact Description', 'wp-titans' ), 'section' => 'wp_titans_contact', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_contact_email', array( 'default' => wp_titans_get_default('wp_titans_contact_email'), 'sanitize_callback' => 'sanitize_email' ) );
    $wp_customize->add_control( 'wp_titans_contact_email', array( 'label' => __( 'Contact Email', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    $wp_customize->add_setting( 'wp_titans_contact_guarantee', array( 'default' => wp_titans_get_default('wp_titans_contact_guarantee'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_contact_guarantee', array( 'label' => __( 'Guarantee Text', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    $wp_customize->add_setting( 'wp_titans_contact_btn_text', array( 'default' => wp_titans_get_default('wp_titans_contact_btn_text'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_contact_btn_text', array( 'label' => __( 'Submit Button Text', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    $wp_customize->add_setting( 'wp_titans_contact_btn_url', array( 'default' => wp_titans_get_default('wp_titans_contact_btn_url'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_contact_btn_url', array( 'label' => __( 'Submit Button URL (if not using form)', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    $wp_customize->add_setting( 'wp_titans_cf7_shortcode', array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_cf7_shortcode', array( 'label' => __( 'Contact Form 7 Shortcode', 'wp-titans' ), 'description' => __( 'Paste your CF7 shortcode here (e.g. [contact-form-7 id="123"])', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    $wp_customize->add_setting( 'wp_titans_high_value_redirect', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'wp_titans_high_value_redirect', array(
        'label' => __( 'High-Value Lead Redirect URL', 'wp-titans' ),
        'description' => __( 'Redirect "Titan" leads (high budget) directly to this URL (e.g. Book a Call).', 'wp-titans' ),
        'section' => 'wp_titans_contact'
    ) );

    $wp_customize->add_setting( 'wp_titans_contact_form_action', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'wp_titans_contact_form_action', array( 'label' => __( 'Custom Form Action URL', 'wp-titans' ), 'description' => __( 'Used if CF7 shortcode is empty.', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    $wp_customize->add_setting( 'wp_titans_contact_form_method', array( 'default' => 'POST', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_contact_form_method', array( 'label' => __( 'Custom Form Method', 'wp-titans' ), 'section' => 'wp_titans_contact', 'type' => 'select', 'choices' => array('POST' => 'POST', 'GET' => 'GET') ) );

    $wp_customize->add_section( 'wp_titans_social_feed', array(
        'title'    => __( 'Front Page: Social Feed', 'wp-titans' ),
        'priority' => 89,
    ) );

    // --- Package Matrix ---
    $wp_customize->add_section( 'wp_titans_package_matrix', array(
        'title'    => __( 'Central Package Matrix', 'wp-titans' ),
        'priority' => 64,
    ) );

    for ($i = 1; $i <= 8; $i++) {
        $wp_customize->add_setting( "wp_titans_matrix_label_$i", array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_matrix_label_$i", array( 'label' => "Feature $i Name", 'section' => 'wp_titans_package_matrix' ) );

        $wp_customize->add_setting( "wp_titans_matrix_tier1_$i", array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
        $wp_customize->add_control( "wp_titans_matrix_tier1_$i", array( 'label' => "In Tier 1?", 'section' => 'wp_titans_package_matrix', 'type' => 'checkbox' ) );

        $wp_customize->add_setting( "wp_titans_matrix_tier2_$i", array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
        $wp_customize->add_control( "wp_titans_matrix_tier2_$i", array( 'label' => "In Tier 2?", 'section' => 'wp_titans_package_matrix', 'type' => 'checkbox' ) );

        $wp_customize->add_setting( "wp_titans_matrix_tier3_$i", array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
        $wp_customize->add_control( "wp_titans_matrix_tier3_$i", array( 'label' => "In Tier 3?", 'section' => 'wp_titans_package_matrix', 'type' => 'checkbox' ) );
    }

    // --- Partners Section ---
    $wp_customize->add_section( 'wp_titans_partners_sec', array(
        'title'    => __( 'Partnership Protocols', 'wp-titans' ),
        'panel'    => 'wp_titans_pages_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_partner_fee', array( 'default' => '10%', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_partner_fee', array( 'label' => __( 'Referral Fee Percentage', 'wp-titans' ), 'section' => 'wp_titans_partners_sec' ) );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "wp_titans_social_img_$i", array( 'default' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=400', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_social_img_$i", array( 'label' => "Social Image $i", 'section' => 'wp_titans_social_feed' ) ) );

        $wp_customize->add_setting( "wp_titans_social_url_$i", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( "wp_titans_social_url_$i", array( 'label' => "Social Image $i Link", 'section' => 'wp_titans_social_feed' ) );
    }

    $wp_customize->add_section( 'wp_titans_portal_sec', array(
        'title'    => __( 'Client Portal Settings', 'wp-titans' ),
        'panel'    => 'wp_titans_pages_panel',
    ) );

    $wp_customize->add_setting( 'wp_titans_portal_title', array( 'default' => 'Client Command Center', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_portal_title', array( 'label' => __( 'Portal Title', 'wp-titans' ), 'section' => 'wp_titans_portal_sec' ) );

    $wp_customize->add_setting( 'wp_titans_portal_status', array( 'default' => '25', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_portal_status', array(
        'label' => __( 'Default Project Progress (%)', 'wp-titans' ),
        'section' => 'wp_titans_portal_sec',
        'type' => 'select',
        'choices' => array('25' => 'Strategy (25%)', '50' => 'Content (50%)', '75' => 'Development (75%)', '100' => 'Launch (100%)')
    ) );

    $portal_links = array(
        'msa' => 'Master Services Agreement',
        'roadmap' => 'Strategic Roadmap',
        'drive' => 'Shared Google Drive',
        'recordings' => 'Strategy Call Recordings'
    );

    foreach ($portal_links as $key => $label) {
        $wp_customize->add_setting( "wp_titans_portal_link_$key", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( "wp_titans_portal_link_$key", array( 'label' => "$label URL", 'section' => 'wp_titans_portal_sec' ) );
    }

    $wp_customize->add_section( 'wp_titans_audit', array(
        'title'    => __( 'Audit Section (Lead Magnet)', 'wp-titans' ),
        'priority' => 98,
    ) );

    $wp_customize->add_setting( 'wp_titans_audit_show', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_audit_show', array( 'label' => __( 'Show Audit Section', 'wp-titans' ), 'section' => 'wp_titans_audit', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_audit_title', array( 'default' => wp_titans_get_default('wp_titans_audit_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_audit_title', array( 'label' => __( 'Audit Title', 'wp-titans' ), 'section' => 'wp_titans_audit' ) );

    $wp_customize->add_setting( 'wp_titans_audit_desc', array( 'default' => wp_titans_get_default('wp_titans_audit_desc'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_audit_desc', array( 'label' => __( 'Audit Description', 'wp-titans' ), 'section' => 'wp_titans_audit', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_audit_testi_quote', array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_audit_testi_quote', array( 'label' => __( 'Audit Testimonial Quote', 'wp-titans' ), 'section' => 'wp_titans_audit', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_audit_testi_author', array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_audit_testi_author', array( 'label' => __( 'Audit Testimonial Author', 'wp-titans' ), 'section' => 'wp_titans_audit' ) );

    $wp_customize->add_setting( 'wp_titans_audit_redirect', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'wp_titans_audit_redirect', array( 'label' => __( 'Audit Success Redirect URL', 'wp-titans' ), 'description' => __( 'Redirect here after audit request (e.g. Thank You page).', 'wp-titans' ), 'section' => 'wp_titans_audit' ) );

    // --- Guarantee Section ---
    $wp_customize->add_section( 'wp_titans_guarantee_sec', array(
        'title'    => __( 'Success Guarantee', 'wp-titans' ),
        'priority' => 97,
    ) );

    $wp_customize->add_setting( 'wp_titans_guarantee_title', array( 'default' => 'The Titans Promise', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_guarantee_title', array( 'label' => __( 'Guarantee Title', 'wp-titans' ), 'section' => 'wp_titans_guarantee_sec' ) );

    $wp_customize->add_setting( 'wp_titans_guarantee_text', array( 'default' => 'We don’t just build websites. We build your authority. If you aren’t 100% confident in your new professional image, we’ll work until you are.', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_guarantee_text', array( 'label' => __( 'Guarantee Text', 'wp-titans' ), 'section' => 'wp_titans_guarantee_sec', 'type' => 'textarea' ) );

    $wp_customize->add_section( 'wp_titans_ux', array(
        'title'    => __( 'Layout & UX', 'wp-titans' ),
        'priority' => 25,
    ) );

    $wp_customize->add_setting( 'wp_titans_cookie_consent', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_cookie_consent', array( 'label' => __( 'Enable Cookie Consent Banner', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_cookie_text', array( 'default' => 'We use cookies to analyze authority metrics and optimize your experience.', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_cookie_text', array( 'label' => __( 'Cookie Banner Text', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_sticky_header', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_sticky_header', array( 'label' => __( 'Sticky Header', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_back_to_top', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_back_to_top', array( 'label' => __( 'Show Back to Top Button', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_fab_show', array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_fab_show', array( 'label' => __( 'Enable Floating Action Button (FAB)', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_fab_text', array( 'default' => 'Get a Quote', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_fab_text', array( 'label' => __( 'FAB Label Text', 'wp-titans' ), 'section' => 'wp_titans_ux' ) );

    $wp_customize->add_setting( 'wp_titans_fab_url', array( 'default' => '#contact', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'wp_titans_fab_url', array( 'label' => __( 'FAB Target URL', 'wp-titans' ), 'section' => 'wp_titans_ux' ) );

    $wp_customize->add_setting( 'wp_titans_fab_icon', array( 'default' => 'fa-comment-dots', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_fab_icon', array( 'label' => __( 'FAB Icon (FontAwesome)', 'wp-titans' ), 'section' => 'wp_titans_ux' ) );

    $wp_customize->add_setting( 'wp_titans_top_bar_show', array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_top_bar_show', array( 'label' => __( 'Show Strategic Top Bar', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_top_bar_text', array( 'default' => 'Join our elite 14-day launch workshop - Limited spots available', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_top_bar_text', array( 'label' => __( 'Top Bar Text', 'wp-titans' ), 'section' => 'wp_titans_ux' ) );

    $wp_customize->add_setting( 'wp_titans_top_bar_url', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'wp_titans_top_bar_url', array( 'label' => __( 'Top Bar URL', 'wp-titans' ), 'section' => 'wp_titans_ux' ) );

    // --- Global CTA ---
    $wp_customize->add_section( 'wp_titans_global_cta', array(
        'title'    => __( 'Global Call to Action', 'wp-titans' ),
        'priority' => 105,
    ) );

    $wp_customize->add_setting( 'wp_titans_gcta_show', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_gcta_show', array( 'label' => __( 'Show Global CTA above Footer', 'wp-titans' ), 'section' => 'wp_titans_global_cta', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_gcta_title', array( 'default' => 'Ready to build your authority?', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_gcta_title', array( 'label' => __( 'CTA Title', 'wp-titans' ), 'section' => 'wp_titans_global_cta' ) );

    $wp_customize->add_setting( 'wp_titans_gcta_btn_text', array( 'default' => 'Schedule a Strategy Call', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_gcta_btn_text', array( 'label' => __( 'Button Text', 'wp-titans' ), 'section' => 'wp_titans_global_cta' ) );

    $wp_customize->add_setting( 'wp_titans_gcta_btn_url', array( 'default' => '#contact', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_gcta_btn_url', array( 'label' => __( 'Button URL', 'wp-titans' ), 'section' => 'wp_titans_global_cta' ) );

    // --- Before/After Section ---
    $wp_customize->add_section( 'wp_titans_comparison', array(
        'title'    => __( 'Before & After Comparison', 'wp-titans' ),
        'priority' => 81,
    ) );

    $wp_customize->add_setting( 'wp_titans_comparison_show', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_comparison_show', array( 'label' => __( 'Show Comparison Section', 'wp-titans' ), 'section' => 'wp_titans_comparison', 'type' => 'checkbox' ) );

    for ($i = 1; $i <= 2; $i++) {
        $wp_customize->add_setting( "wp_titans_compare_before_$i", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_compare_before_$i", array( 'label' => "Pair $i: BEFORE Image", 'section' => 'wp_titans_comparison' ) ) );

        $wp_customize->add_setting( "wp_titans_compare_after_$i", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_compare_after_$i", array( 'label' => "Pair $i: AFTER Image", 'section' => 'wp_titans_comparison' ) ) );

        $wp_customize->add_setting( "wp_titans_compare_title_$i", array( 'default' => 'Project Transformation', 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_compare_title_$i", array( 'label' => "Pair $i Title", 'section' => 'wp_titans_comparison' ) );
    }

    $wp_customize->add_setting( 'wp_titans_mobile_cta', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_mobile_cta', array( 'label' => __( 'Show Floating Mobile CTA', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_mode_toggle', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_mode_toggle', array( 'label' => __( 'Enable Dark/Light Mode Toggle', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_preloader_show', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_preloader_show', array( 'label' => __( 'Show Cinematic Preloader', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_progress_bar', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_progress_bar', array( 'label' => __( 'Show Reading Progress Bar', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_custom_cursor', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_custom_cursor', array( 'label' => __( 'Enable Elite Custom Cursor', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_noise_overlay', array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_noise_overlay', array( 'label' => __( 'Enable Luxury Noise Overlay', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_texture_overlay', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_texture_overlay', array(
        'label' => __( 'Subtle Pattern Overlay', 'wp-titans' ),
        'section' => 'wp_titans_ux',
        'type' => 'select',
        'choices' => array('none' => 'None', 'dots' => 'Titan Dots', 'grid' => 'Titan Grid', 'lines' => 'Titan Lines')
    ) );

    $wp_customize->add_setting( 'wp_titans_mouse_glow', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_mouse_glow', array( 'label' => __( 'Enable Mouse-Follow Glow', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_design_mode', array( 'default' => 'solid', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_design_mode', array(
        'label' => __( 'Container Design Mode', 'wp-titans' ),
        'section' => 'wp_titans_design',
        'type' => 'select',
        'choices' => array( 'solid' => 'Solid Luxury', 'glass' => 'Glass Luxury (Frosted)' )
    ) );

    $wp_customize->add_setting( 'wp_titans_glass_intensity', array( 'default' => 15, 'sanitize_callback' => 'absint' ) );
    $wp_customize->add_control( 'wp_titans_glass_intensity', array(
        'label' => __( 'Glass Blur Intensity (px)', 'wp-titans' ),
        'section' => 'wp_titans_design',
        'type' => 'number',
        'input_attrs' => array('min' => 0, 'max' => 50)
    ) );

    $wp_customize->add_setting( 'wp_titans_header_btn_text', array( 'default' => 'Strategy Call', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_header_btn_text', array( 'label' => __( 'Header Button Text', 'wp-titans' ), 'section' => 'wp_titans_branding' ) );

    $wp_customize->add_setting( 'wp_titans_header_btn_url', array( 'default' => '#contact', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_header_btn_url', array( 'label' => __( 'Header Button URL', 'wp-titans' ), 'section' => 'wp_titans_branding' ) );

    $wp_customize->add_section( 'wp_titans_scripts', array(
        'title'    => __( 'Scripts & Analytics', 'wp-titans' ),
        'priority' => 110,
    ) );

    $wp_customize->add_setting( 'wp_titans_header_scripts', array( 'default' => wp_titans_get_default('wp_titans_header_scripts'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_header_scripts', array( 'label' => __( 'Header Scripts', 'wp-titans' ), 'description' => __( 'Add Google Analytics or FB Pixel code here.', 'wp-titans' ), 'section' => 'wp_titans_scripts', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_footer_scripts', array( 'default' => wp_titans_get_default('wp_titans_footer_scripts'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_footer_scripts', array( 'label' => __( 'Footer Scripts', 'wp-titans' ), 'description' => __( 'Add tracking scripts or chat widgets here.', 'wp-titans' ), 'section' => 'wp_titans_scripts', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_seo_desc', array( 'default' => 'High-performance WordPress agency helping experts build authority and generate leads.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_seo_desc', array( 'label' => __( 'Meta Description', 'wp-titans' ), 'description' => __( 'Fallback SEO description for the homepage.', 'wp-titans' ), 'section' => 'wp_titans_scripts', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_custom_css', array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_custom_css', array( 'label' => __( 'Custom CSS', 'wp-titans' ), 'description' => __( 'Add custom CSS overrides here.', 'wp-titans' ), 'section' => 'wp_titans_design', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_section_dividers', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_section_dividers', array(
        'label' => __( 'Section Divider Style', 'wp-titans' ),
        'section' => 'wp_titans_design',
        'type' => 'select',
        'choices' => array( 'none' => 'None', 'wave' => 'Wave', 'slant' => 'Slant' )
    ) );

    // --- Lead Capture Section ---
    $wp_customize->add_section( 'wp_titans_leads', array(
        'title'    => __( 'Lead Generation & Modals', 'wp-titans' ),
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'wp_titans_newsletter_show', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_newsletter_show', array( 'label' => __( 'Show Newsletter Section', 'wp-titans' ), 'section' => 'wp_titans_leads', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_newsletter_title', array( 'default' => 'Join the Titan Circle', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_newsletter_title', array( 'label' => __( 'Newsletter Title', 'wp-titans' ), 'section' => 'wp_titans_leads' ) );

    $wp_customize->add_setting( 'wp_titans_newsletter_desc', array( 'default' => 'Weekly insights on authority branding and high-performance WordPress systems.', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_newsletter_desc', array( 'label' => __( 'Newsletter Description', 'wp-titans' ), 'section' => 'wp_titans_leads', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_exit_intent_show', array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_exit_intent_show', array( 'label' => __( 'Enable Exit-Intent Modal', 'wp-titans' ), 'section' => 'wp_titans_leads', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_exit_title', array( 'default' => 'Wait! Don’t Leave Your Authority Behind.', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_exit_title', array( 'label' => __( 'Modal Title', 'wp-titans' ), 'section' => 'wp_titans_leads' ) );

    $wp_customize->add_setting( 'wp_titans_exit_desc', array( 'default' => 'Get our elite 14-day launch checklist before you go.', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_exit_desc', array( 'label' => __( 'Modal Description', 'wp-titans' ), 'section' => 'wp_titans_leads', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_exit_cf7_shortcode', array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_exit_cf7_shortcode', array( 'label' => __( 'Exit Intent CF7 Shortcode', 'wp-titans' ), 'section' => 'wp_titans_leads' ) );

    $wp_customize->add_setting( 'wp_titans_downsell_show', array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_downsell_show', array( 'label' => __( 'Enable Downsell/Tripwire Offer', 'wp-titans' ), 'description' => __( 'Adds a secondary offer button to the exit modal.', 'wp-titans' ), 'section' => 'wp_titans_leads', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_downsell_text', array( 'default' => 'Just want the 14-day checklist? (Free)', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_downsell_text', array( 'label' => __( 'Downsell Button Text', 'wp-titans' ), 'section' => 'wp_titans_leads' ) );

    $wp_customize->add_setting( 'wp_titans_downsell_url', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'wp_titans_downsell_url', array( 'label' => __( 'Downsell URL', 'wp-titans' ), 'section' => 'wp_titans_leads' ) );

    $wp_customize->add_setting( 'wp_titans_show_auth_notif', array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_show_auth_notif', array( 'label' => __( 'Show Agency Authority Notifications', 'wp-titans' ), 'description' => __( 'Shows a periodic popup of recent completions and wins.', 'wp-titans' ), 'section' => 'wp_titans_leads', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_exit_form_action', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'wp_titans_exit_form_action', array( 'label' => __( 'Exit Form Action URL', 'wp-titans' ), 'section' => 'wp_titans_leads' ) );

    $wp_customize->add_setting( 'wp_titans_exit_form_method', array( 'default' => 'POST', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_exit_form_method', array( 'label' => __( 'Exit Form Method', 'wp-titans' ), 'section' => 'wp_titans_leads', 'type' => 'select', 'choices' => array('POST' => 'POST', 'GET' => 'GET') ) );

    $wp_customize->add_setting( 'wp_titans_exit_redirect', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'wp_titans_exit_redirect', array( 'label' => __( 'Exit Intent Success Redirect URL', 'wp-titans' ), 'section' => 'wp_titans_leads' ) );

    $wp_customize->add_setting( 'wp_titans_contact_redirect', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'wp_titans_contact_redirect', array( 'label' => __( 'Contact Form Success Redirect URL', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

}
add_action( 'customize_register', 'wp_titans_customize_register' );

/**
 * Output Customizer CSS
 */
function wp_titans_customizer_css() {
    $heading_font = wp_titans_get_mod("wp_titans_heading_font");
    $body_font = wp_titans_get_mod("wp_titans_body_font");
    $preset = wp_titans_get_mod("wp_titans_design_preset");
    $primary = wp_titans_get_mod("wp_titans_primary_color");

    if ($preset === 'sapphire') {
        $primary = '#3498db';
    } elseif ($preset === 'emerald') {
        $primary = '#2ecc71';
    }

    ?>
    <style type="text/css">
        :root {
            --primary: <?php echo $primary; ?>;
            --secondary: <?php echo wp_titans_get_mod('wp_titans_secondary_color'); ?>;
            --accent-glow: <?php
                $primary = wp_titans_get_mod("wp_titans_primary_color");
                list($r, $g, $b) = sscanf($primary, "#%02x%02x%02x");
                echo "rgba($r, $g, $b, 0.15)";
            ?>;
        }
        body {
            font-family: '<?php echo esc_attr($body_font); ?>', sans-serif;
            line-height: <?php echo wp_titans_get_mod("wp_titans_line_height"); ?>;
        }
        h1, h2, h3, h4, .btn, .nav-links a {
            font-family: '<?php echo esc_attr($heading_font); ?>', sans-serif;
            letter-spacing: <?php echo wp_titans_get_mod("wp_titans_letter_spacing"); ?>em;
            <?php if (wp_titans_get_mod("wp_titans_h_uppercase")) : ?>
                text-transform: uppercase !important;
            <?php endif; ?>
        }

        .hero {
            background-image: linear-gradient(rgba(0,0,0,<?php echo wp_titans_get_mod("wp_titans_hero_opacity"); ?>), rgba(0,0,0,<?php echo wp_titans_get_mod("wp_titans_hero_opacity"); ?>)), url('<?php echo wp_titans_get_mod("wp_titans_hero_bg"); ?>');
        }
        :root {
            --bg-card: <?php echo wp_titans_get_mod("wp_titans_card_bg"); ?>;
            --radius: <?php echo wp_titans_get_mod("wp_titans_border_radius"); ?>;
        }
        <?php if (wp_titans_get_mod("wp_titans_design_mode") === 'glass') :
            $blur = wp_titans_get_mod("wp_titans_glass_intensity");
        ?>
        .card, #navbar.scrolled, #planner-container, .option-content {
            background: var(--bg-glass) !important;
            backdrop-filter: blur(<?php echo $blur; ?>px) !important;
            -webkit-backdrop-filter: blur(<?php echo $blur; ?>px) !important;
            border: 1px solid rgba(255,255,255,0.1) !important;
        }
        <?php endif; ?>
        .card, .btn, #planner-container, .option-content, img, .ba-container { border-radius: var(--radius) !important; }
        #free-audit { background-color: var(--primary) !important; }
        .testimonial-card, .btn-outline { border-color: var(--primary) !important; }
        .stat-item h3, .tagline, .btn-outline { color: var(--primary) !important; }
        <?php echo wp_titans_get_mod("wp_titans_custom_css"); ?>
    </style>
    <?php
}
add_action( 'wp_head', 'wp_titans_customizer_css' );
