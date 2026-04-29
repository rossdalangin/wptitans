<?php
/**
 * WP Titans Customizer settings
 */
function wp_titans_customize_register( $wp_customize ) {

    // --- Branding Section ---
    $wp_customize->add_section( 'wp_titans_branding', array(
        'title'    => __( 'Branding', 'wp-titans' ),
        'priority' => 30,
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
        'title'    => __( 'Colors & Typography', 'wp-titans' ),
        'priority' => 20,
    ) );

    $wp_customize->add_setting( 'wp_titans_primary_color', array( 'default' => wp_titans_get_default('wp_titans_primary_color'), 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_titans_primary_color', array( 'label' => __( 'Primary Color (Gold)', 'wp-titans' ), 'section' => 'wp_titans_design' ) ) );

    $wp_customize->add_setting( 'wp_titans_heading_font', array( 'default' => wp_titans_get_default('wp_titans_heading_font'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_heading_font', array( 'label' => __( 'Heading Font (Google Font Name)', 'wp-titans' ), 'section' => 'wp_titans_design', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_body_font', array( 'default' => wp_titans_get_default('wp_titans_body_font'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_body_font', array( 'label' => __( 'Body Font (Google Font Name)', 'wp-titans' ), 'section' => 'wp_titans_design', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_card_bg', array( 'default' => '#0a0a0a', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_titans_card_bg', array( 'label' => __( 'Card Background Color', 'wp-titans' ), 'section' => 'wp_titans_design' ) ) );

    $wp_customize->add_setting( 'wp_titans_border_radius', array( 'default' => '8px', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_border_radius', array( 'label' => __( 'Global Border Radius', 'wp-titans' ), 'section' => 'wp_titans_design' ) );

    $wp_customize->add_setting( 'wp_titans_hero_opacity', array( 'default' => 0.8, 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_hero_opacity', array( 'label' => __( 'Hero Overlay Opacity (0-1)', 'wp-titans' ), 'section' => 'wp_titans_hero', 'type' => 'number', 'input_attrs' => array('step' => 0.1, 'min' => 0, 'max' => 1) ) );

    // --- Hero Section ---
    $wp_customize->add_section( 'wp_titans_hero', array(
        'title'    => __( 'Hero Section', 'wp-titans' ),
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'wp_titans_hero_title', array( 'default' => wp_titans_get_default('wp_titans_hero_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_hero_title', array( 'label' => __( 'Hero Title', 'wp-titans' ), 'section' => 'wp_titans_hero', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_hero_subtitle', array( 'default' => wp_titans_get_default('wp_titans_hero_subtitle'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_hero_subtitle', array( 'label' => __( 'Hero Subtitle', 'wp-titans' ), 'section' => 'wp_titans_hero', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_hero_bg', array( 'default' => wp_titans_get_default('wp_titans_hero_bg'), 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_titans_hero_bg', array( 'label' => __( 'Hero Background Image', 'wp-titans' ), 'section' => 'wp_titans_hero' ) ) );

    $wp_customize->add_setting( 'wp_titans_hero_video', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'wp_titans_hero_video', array( 'label' => __( 'Hero Background Video URL (Direct MP4 link)', 'wp-titans' ), 'section' => 'wp_titans_hero', 'type' => 'text' ) );

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
        'title'    => __( 'Who We Work With', 'wp-titans' ),
        'priority' => 45,
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

    // --- About Section ---
    $wp_customize->add_section( 'wp_titans_about', array(
        'title'    => __( 'About Section', 'wp-titans' ),
        'priority' => 50,
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
        $wp_customize->add_control( "wp_titans_pricing_val_$i", array( 'label' => "Package $i Price", 'section' => 'wp_titans_pricing' ) );

        $wp_customize->add_setting( "wp_titans_pricing_desc_$i", array( 'default' => wp_titans_get_default("wp_titans_pricing_desc_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_pricing_desc_$i", array( 'label' => "Package $i Subtitle", 'section' => 'wp_titans_pricing' ) );

        $wp_customize->add_setting( "wp_titans_pricing_features_$i", array( 'default' => wp_titans_get_default("wp_titans_pricing_features_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_pricing_features_$i", array( 'label' => "Package $i Features", 'section' => 'wp_titans_pricing', 'type' => 'textarea' ) );
    }

    // --- Services Section ---
    $wp_customize->add_section( 'wp_titans_services', array(
        'title'    => __( 'Services Section', 'wp-titans' ),
        'priority' => 60,
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
    }

    // --- Client Logos Section ---
    $wp_customize->add_section( 'wp_titans_logos', array(
        'title'    => __( 'Client Logos / Trust Bar', 'wp-titans' ),
        'priority' => 42,
    ) );

    $wp_customize->add_setting( 'wp_titans_logos_title', array( 'default' => wp_titans_get_default('wp_titans_logos_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_logos_title', array( 'label' => __( 'Logos Title', 'wp-titans' ), 'section' => 'wp_titans_logos' ) );

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting( "wp_titans_client_logo_$i", array( 'default' => wp_titans_get_default("wp_titans_client_logo_$i"), 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_client_logo_$i", array( 'label' => "Client Logo $i", 'section' => 'wp_titans_logos' ) ) );
    }

    // --- Stats Section ---
    $wp_customize->add_section( 'wp_titans_stats', array(
        'title'    => __( 'Stats Section', 'wp-titans' ),
        'priority' => 70,
    ) );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "wp_titans_stat_num_$i", array( 'default' => wp_titans_get_default("wp_titans_stat_num_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_stat_num_$i", array( 'label' => "Stat $i Number", 'section' => 'wp_titans_stats' ) );

        $wp_customize->add_setting( "wp_titans_stat_label_$i", array( 'default' => wp_titans_get_default("wp_titans_stat_label_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_stat_label_$i", array( 'label' => "Stat $i Label", 'section' => 'wp_titans_stats' ) );
    }

    // --- Process Section ---
    $wp_customize->add_section( 'wp_titans_process', array(
        'title'    => __( 'Process Section', 'wp-titans' ),
        'priority' => 75,
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
        'title'    => __( 'Testimonials Section', 'wp-titans' ),
        'priority' => 78,
    ) );

    $wp_customize->add_setting( 'wp_titans_testi_tagline', array( 'default' => wp_titans_get_default('wp_titans_testi_tagline'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_testi_tagline', array( 'label' => __( 'Section Tagline', 'wp-titans' ), 'section' => 'wp_titans_testimonials' ) );

    $wp_customize->add_setting( 'wp_titans_testi_main_title', array( 'default' => wp_titans_get_default('wp_titans_testi_main_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_testi_main_title', array( 'label' => __( 'Section Title', 'wp-titans' ), 'section' => 'wp_titans_testimonials' ) );

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
        'title'    => __( 'Portfolio Section', 'wp-titans' ),
        'priority' => 80,
    ) );

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting( "wp_titans_portfolio_img_$i", array( 'default' => wp_titans_get_default("wp_titans_portfolio_img_$i"), 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_portfolio_img_$i", array( 'label' => "Portfolio $i Image", 'section' => 'wp_titans_portfolio' ) ) );

        $wp_customize->add_setting( "wp_titans_portfolio_title_$i", array( 'default' => wp_titans_get_default("wp_titans_portfolio_title_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_portfolio_title_$i", array( 'label' => "Portfolio $i Title", 'section' => 'wp_titans_portfolio' ) );

        $wp_customize->add_setting( "wp_titans_portfolio_cat_$i", array( 'default' => wp_titans_get_default("wp_titans_portfolio_cat_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_portfolio_cat_$i", array( 'label' => "Portfolio $i Category", 'section' => 'wp_titans_portfolio' ) );
    }

    // --- FAQ Section ---
    $wp_customize->add_section( 'wp_titans_faq', array(
        'title'    => __( 'FAQ Section', 'wp-titans' ),
        'priority' => 90,
    ) );

    $wp_customize->add_setting( 'wp_titans_faq_main_title', array( 'default' => wp_titans_get_default('wp_titans_faq_main_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_faq_main_title', array( 'label' => __( 'Section Title', 'wp-titans' ), 'section' => 'wp_titans_faq' ) ) ;

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "wp_titans_faq_q_$i", array( 'default' => wp_titans_get_default("wp_titans_faq_q_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_faq_q_$i", array( 'label' => "FAQ $i Question", 'section' => 'wp_titans_faq' ) );

        $wp_customize->add_setting( "wp_titans_faq_a_$i", array( 'default' => wp_titans_get_default("wp_titans_faq_a_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_faq_a_$i", array( 'label' => "FAQ $i Answer", 'section' => 'wp_titans_faq', 'type' => 'textarea' ) );
    }

    // --- Page Headers ---
    $wp_customize->add_section( 'wp_titans_page_headers', array(
        'title'    => __( 'Internal Page Headers', 'wp-titans' ),
        'priority' => 85,
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
        'priority' => 52,
    ) );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "wp_titans_team_name_$i", array( 'default' => wp_titans_get_default("wp_titans_team_name_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_team_name_$i", array( 'label' => "Member $i Name", 'section' => 'wp_titans_team' ) );

        $wp_customize->add_setting( "wp_titans_team_role_$i", array( 'default' => wp_titans_get_default("wp_titans_team_role_$i"), 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_team_role_$i", array( 'label' => "Member $i Role", 'section' => 'wp_titans_team' ) );

        $wp_customize->add_setting( "wp_titans_team_img_$i", array( 'default' => wp_titans_get_default("wp_titans_team_img_$i"), 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_team_img_$i", array( 'label' => "Member $i Photo", 'section' => 'wp_titans_team' ) ) );
    }

    $wp_customize->add_section( 'wp_titans_founder', array(
        'title'    => __( 'About: Founder Details', 'wp-titans' ),
        'priority' => 55,
    ) );

    $wp_customize->add_setting( 'wp_titans_founder_image', array( 'default' => wp_titans_get_default('wp_titans_founder_image'), 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_titans_founder_image', array( 'label' => __( 'Founder Image', 'wp-titans' ), 'section' => 'wp_titans_founder' ) ) );

    $wp_customize->add_setting( 'wp_titans_founder_name', array( 'default' => wp_titans_get_default('wp_titans_founder_name'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_founder_name', array( 'label' => __( 'Founder Name', 'wp-titans' ), 'section' => 'wp_titans_founder' ) );

    $wp_customize->add_setting( 'wp_titans_founder_bio', array( 'default' => wp_titans_get_default('wp_titans_founder_bio'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_founder_bio', array( 'label' => __( 'Founder Bio', 'wp-titans' ), 'section' => 'wp_titans_founder', 'type' => 'textarea' ) );

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
        'priority' => 82,
    ) );

    $wp_customize->add_setting( 'wp_titans_auth_title', array( 'default' => wp_titans_get_default('wp_titans_auth_title'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_auth_title', array( 'label' => __( 'Authority Title', 'wp-titans' ), 'section' => 'wp_titans_authority_page' ) );

    $wp_customize->add_setting( 'wp_titans_auth_subtitle', array( 'default' => wp_titans_get_default('wp_titans_auth_subtitle'), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_auth_subtitle', array( 'label' => __( 'Authority Subtitle', 'wp-titans' ), 'section' => 'wp_titans_authority_page', 'type' => 'textarea' ) );

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
        'title'    => __( 'Contact Section', 'wp-titans' ),
        'priority' => 95,
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

    $wp_customize->add_setting( 'wp_titans_sticky_header', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_sticky_header', array( 'label' => __( 'Sticky Header', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_back_to_top', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_back_to_top', array( 'label' => __( 'Show Back to Top Button', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

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

}
add_action( 'customize_register', 'wp_titans_customize_register' );

/**
 * Output Customizer CSS
 */
function wp_titans_customizer_css() {
    $heading_font = wp_titans_get_mod("wp_titans_heading_font");
    $body_font = wp_titans_get_mod("wp_titans_body_font");
    ?>
    <style type="text/css">
        :root {
            --primary: <?php echo wp_titans_get_mod("wp_titans_primary_color"); ?>;
            --accent-glow: <?php
                $primary = wp_titans_get_mod("wp_titans_primary_color");
                list($r, $g, $b) = sscanf($primary, "#%02x%02x%02x");
                echo "rgba($r, $g, $b, 0.15)";
            ?>;
        }
        body { font-family: '<?php echo esc_attr($body_font); ?>', sans-serif; }
        h1, h2, h3, h4, .btn, .nav-links a { font-family: '<?php echo esc_attr($heading_font); ?>', sans-serif; }

        .hero {
            background-image: linear-gradient(rgba(0,0,0,<?php echo wp_titans_get_mod("wp_titans_hero_opacity"); ?>), rgba(0,0,0,<?php echo wp_titans_get_mod("wp_titans_hero_opacity"); ?>)), url('<?php echo wp_titans_get_mod("wp_titans_hero_bg"); ?>');
        }
        :root {
            --bg-card: <?php echo wp_titans_get_mod("wp_titans_card_bg"); ?>;
            --radius: <?php echo wp_titans_get_mod("wp_titans_border_radius"); ?>;
        }
        .card, .btn, #planner-container, .option-content, img, .ba-container { border-radius: var(--radius) !important; }
        #free-audit { background-color: var(--primary) !important; }
        .testimonial-card, .btn-outline { border-color: var(--primary) !important; }
        .stat-item h3, .tagline, .btn-outline { color: var(--primary) !important; }
    </style>
    <?php
}
add_action( 'wp_head', 'wp_titans_customizer_css' );
