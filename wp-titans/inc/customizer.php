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

    $wp_customize->add_setting( 'wp_titans_logo_image', array( 'default' => 'https://wordpresstitans.com/wp-content/uploads/2025/12/logogold.png', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_titans_logo_image', array( 'label' => __( 'Logo Image', 'wp-titans' ), 'section' => 'wp_titans_branding' ) ) );

    $wp_customize->add_setting( 'wp_titans_logo_icon', array( 'default' => 'fa-crown', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_logo_icon', array( 'label' => __( 'Logo Icon (used if no image)', 'wp-titans' ), 'section' => 'wp_titans_branding', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_logo_text', array( 'default' => 'TITANS', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_logo_text', array( 'label' => __( 'Logo Text', 'wp-titans' ), 'section' => 'wp_titans_branding', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_footer_desc', array( 'default' => 'We help serious businesses turn their website into a revenue-generating asset — not just an online brochure.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_footer_desc', array( 'label' => __( 'Footer Description', 'wp-titans' ), 'section' => 'wp_titans_branding', 'type' => 'textarea' ) );

    // --- Colors & Typography ---
    $wp_customize->add_section( 'wp_titans_design', array(
        'title'    => __( 'Colors & Typography', 'wp-titans' ),
        'priority' => 20,
    ) );

    $wp_customize->add_setting( 'wp_titans_primary_color', array( 'default' => '#D4AF37', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_titans_primary_color', array( 'label' => __( 'Primary Color (Gold)', 'wp-titans' ), 'section' => 'wp_titans_design' ) ) );

    $wp_customize->add_setting( 'wp_titans_heading_font', array( 'default' => 'Syne', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_heading_font', array( 'label' => __( 'Heading Font (Google Font Name)', 'wp-titans' ), 'section' => 'wp_titans_design', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_body_font', array( 'default' => 'Space Grotesk', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_body_font', array( 'label' => __( 'Body Font (Google Font Name)', 'wp-titans' ), 'section' => 'wp_titans_design', 'type' => 'text' ) );

    // --- Hero Section ---
    $wp_customize->add_section( 'wp_titans_hero', array(
        'title'    => __( 'Hero Section', 'wp-titans' ),
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'wp_titans_hero_title', array( 'default' => 'High-Performance WordPress Websites Designed to Win Trust and Generate Leads', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_hero_title', array( 'label' => __( 'Hero Title', 'wp-titans' ), 'section' => 'wp_titans_hero', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_hero_subtitle', array( 'default' => 'We help serious businesses turn their website into a revenue-generating asset — not just an online brochure.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_hero_subtitle', array( 'label' => __( 'Hero Subtitle', 'wp-titans' ), 'section' => 'wp_titans_hero', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_hero_bg', array( 'default' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1920', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_titans_hero_bg', array( 'label' => __( 'Hero Background Image', 'wp-titans' ), 'section' => 'wp_titans_hero' ) ) );

    $wp_customize->add_setting( 'wp_titans_hero_btn1_text', array( 'default' => 'Our Solutions', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_hero_btn1_text', array( 'label' => __( 'Hero Button 1 Text', 'wp-titans' ), 'section' => 'wp_titans_hero' ) );

    $wp_customize->add_setting( 'wp_titans_hero_btn1_url', array( 'default' => '#services', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_hero_btn1_url', array( 'label' => __( 'Hero Button 1 URL', 'wp-titans' ), 'section' => 'wp_titans_hero' ) );

    $wp_customize->add_setting( 'wp_titans_hero_btn2_text', array( 'default' => 'Schedule a Call', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_hero_btn2_text', array( 'label' => __( 'Hero Button 2 Text', 'wp-titans' ), 'section' => 'wp_titans_hero' ) );

    $wp_customize->add_setting( 'wp_titans_hero_btn2_url', array( 'default' => '#contact', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_hero_btn2_url', array( 'label' => __( 'Hero Button 2 URL', 'wp-titans' ), 'section' => 'wp_titans_hero' ) );

    // --- Who We Work With Section ---
    $wp_customize->add_section( 'wp_titans_target', array(
        'title'    => __( 'Who We Work With', 'wp-titans' ),
        'priority' => 45,
    ) );

    $wp_customize->add_setting( 'wp_titans_target_tagline', array( 'default' => 'Who We Work With', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_target_tagline', array( 'label' => __( 'Section Tagline', 'wp-titans' ), 'section' => 'wp_titans_target' ) );

    $wp_customize->add_setting( 'wp_titans_target_main_title', array( 'default' => 'Built for Experts', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_target_main_title', array( 'label' => __( 'Section Title', 'wp-titans' ), 'section' => 'wp_titans_target' ) );

    $target_defaults = [
        ['icon' => 'fa-building', 'title' => 'Local Businesses', 'desc' => 'Helping local service providers dominate their market and capture high-intent leads.'],
        ['icon' => 'fa-user-tie', 'title' => 'Coaches & Consultants', 'desc' => 'Building authority-driven platforms that showcase your expertise and value.'],
        ['icon' => 'fa-gavel', 'title' => 'Law Firms & Professional Services', 'desc' => 'Professional, high-trust designs built to convert high-value clients.'],
    ];

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "wp_titans_target_icon_$i", array( 'default' => $target_defaults[$i-1]['icon'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_target_icon_$i", array( 'label' => "Target $i Icon", 'section' => 'wp_titans_target' ) );

        $wp_customize->add_setting( "wp_titans_target_title_$i", array( 'default' => $target_defaults[$i-1]['title'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_target_title_$i", array( 'label' => "Target $i Title", 'section' => 'wp_titans_target' ) );

        $wp_customize->add_setting( "wp_titans_target_desc_$i", array( 'default' => $target_defaults[$i-1]['desc'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_target_desc_$i", array( 'label' => "Target $i Desc", 'section' => 'wp_titans_target', 'type' => 'textarea' ) );
    }

    // --- About Section ---
    $wp_customize->add_section( 'wp_titans_about', array(
        'title'    => __( 'About Section', 'wp-titans' ),
        'priority' => 50,
    ) );

    $wp_customize->add_setting( 'wp_titans_about_tagline', array( 'default' => 'THE AUTHORITY SYSTEM™', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_about_tagline', array( 'label' => __( 'About Tagline', 'wp-titans' ), 'section' => 'wp_titans_about', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_about_title', array( 'default' => 'Imagine a Website That Works Like Your Best Salesperson', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_about_title', array( 'label' => __( 'About Title', 'wp-titans' ), 'section' => 'wp_titans_about', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_about_content', array( 'default' => 'A modern authority website builds trust, converts leads, and grows your business—automatically. We design for business outcomes, not trends.', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_about_content', array( 'label' => __( 'About Content', 'wp-titans' ), 'section' => 'wp_titans_about', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_about_image', array( 'default' => 'https://wordpresstitans.com/wp-content/uploads/2025/12/Screenshot-2025-12-06-001551.webp', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_titans_about_image', array( 'label' => __( 'About Image', 'wp-titans' ), 'section' => 'wp_titans_about' ) ) );

    $wp_customize->add_setting( 'wp_titans_about_btn_text', array( 'default' => 'Read More', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_about_btn_text', array( 'label' => __( 'About Button Text', 'wp-titans' ), 'section' => 'wp_titans_about' ) );

    $wp_customize->add_setting( 'wp_titans_about_btn_url', array( 'default' => '#contact', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_about_btn_url', array( 'label' => __( 'About Button URL', 'wp-titans' ), 'section' => 'wp_titans_about' ) );

    // --- Services Section ---
    $wp_customize->add_section( 'wp_titans_services', array(
        'title'    => __( 'Services Section', 'wp-titans' ),
        'priority' => 60,
    ) );

    $wp_customize->add_setting( 'wp_titans_services_tagline', array( 'default' => 'Our Core Services', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_services_tagline', array( 'label' => __( 'Section Tagline', 'wp-titans' ), 'section' => 'wp_titans_services' ) );

    $wp_customize->add_setting( 'wp_titans_services_main_title', array( 'default' => 'High-Converting Solutions', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_services_main_title', array( 'label' => __( 'Section Title', 'wp-titans' ), 'section' => 'wp_titans_services' ) );

    $services_defaults = [
        ['icon' => 'fa-briefcase', 'title' => 'Authority Website System™', 'desc' => 'A complete, conversion-focused website package designed to position you as the trusted authority.'],
        ['icon' => 'fa-pen-fancy', 'title' => 'Website Copywriting', 'desc' => 'Strategic messaging crafted to connect with your ideal clients and drive conversions.'],
        ['icon' => 'fa-cog', 'title' => 'Custom WordPress Development', 'desc' => 'Custom themes, tools, and systems tailored to your business model and scaling needs.'],
        ['icon' => 'fa-rocket', 'title' => 'SEO & Optimization', 'desc' => 'Increase visibility, improve ranking, and generate organic leads with strategic SEO implementation.'],
        ['icon' => 'fa-tools', 'title' => 'Website Maintenance', 'desc' => 'Reliable ongoing support to keep your site secure, updated, and performing at its best.'],
        ['icon' => 'fa-chart-line', 'title' => 'Funnel & Lead Gen Setup', 'desc' => 'Automate your client acquisition with modern funnel systems designed for consultants.'],
    ];

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting( "wp_titans_service_icon_$i", array( 'default' => $services_defaults[$i-1]['icon'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_service_icon_$i", array( 'label' => "Service $i Icon", 'section' => 'wp_titans_services' ) );

        $wp_customize->add_setting( "wp_titans_service_title_$i", array( 'default' => $services_defaults[$i-1]['title'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_service_title_$i", array( 'label' => "Service $i Title", 'section' => 'wp_titans_services' ) );

        $wp_customize->add_setting( "wp_titans_service_desc_$i", array( 'default' => $services_defaults[$i-1]['desc'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_service_desc_$i", array( 'label' => "Service $i Desc", 'section' => 'wp_titans_services', 'type' => 'textarea' ) );
    }

    // --- Stats Section ---
    $wp_customize->add_section( 'wp_titans_stats', array(
        'title'    => __( 'Stats Section', 'wp-titans' ),
        'priority' => 70,
    ) );

    $stats_defaults = [
        ['num' => '20+', 'label' => 'Years Experience'],
        ['num' => '500+', 'label' => 'Websites Built'],
        ['num' => '100%', 'label' => 'Client Satisfaction'],
        ['num' => '14', 'label' => 'Day Delivery'],
    ];

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "wp_titans_stat_num_$i", array( 'default' => $stats_defaults[$i-1]['num'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_stat_num_$i", array( 'label' => "Stat $i Number", 'section' => 'wp_titans_stats' ) );

        $wp_customize->add_setting( "wp_titans_stat_label_$i", array( 'default' => $stats_defaults[$i-1]['label'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_stat_label_$i", array( 'label' => "Stat $i Label", 'section' => 'wp_titans_stats' ) );
    }

    // --- Process Section ---
    $wp_customize->add_section( 'wp_titans_process', array(
        'title'    => __( 'Process Section', 'wp-titans' ),
        'priority' => 75,
    ) );

    $wp_customize->add_setting( 'wp_titans_process_tagline', array( 'default' => 'The Authority System™', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_process_tagline', array( 'label' => __( 'Section Tagline', 'wp-titans' ), 'section' => 'wp_titans_process' ) );

    $wp_customize->add_setting( 'wp_titans_process_main_title', array( 'default' => 'Our 4-Step Process', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_process_main_title', array( 'label' => __( 'Section Title', 'wp-titans' ), 'section' => 'wp_titans_process' ) );

    $process_defaults = [
        ['title' => 'Strategy & Positioning', 'desc' => 'We clarify your message, target audience, and offer — the foundation of authority.'],
        ['title' => 'Copywriting & Messaging', 'desc' => 'We craft high-converting content that communicates value and builds trust.'],
        ['title' => 'Design & Development', 'desc' => 'A clean, modern, mobile-ready, SEO-optimized website built fast.'],
        ['title' => 'Launch & Optimization', 'desc' => 'We support you for 30 days to refine and elevate your website’s performance.']
    ];

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "wp_titans_process_title_$i", array( 'default' => $process_defaults[$i-1]['title'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_process_title_$i", array( 'label' => "Step $i Title", 'section' => 'wp_titans_process' ) );

        $wp_customize->add_setting( "wp_titans_process_desc_$i", array( 'default' => $process_defaults[$i-1]['desc'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_process_desc_$i", array( 'label' => "Step $i Description", 'section' => 'wp_titans_process', 'type' => 'textarea' ) );
    }

    // --- Testimonials Section ---
    $wp_customize->add_section( 'wp_titans_testimonials', array(
        'title'    => __( 'Testimonials Section', 'wp-titans' ),
        'priority' => 78,
    ) );

    $wp_customize->add_setting( 'wp_titans_testi_tagline', array( 'default' => 'Trusted by Experts', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_testi_tagline', array( 'label' => __( 'Section Tagline', 'wp-titans' ), 'section' => 'wp_titans_testimonials' ) );

    $wp_customize->add_setting( 'wp_titans_testi_main_title', array( 'default' => 'Client Results', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_testi_main_title', array( 'label' => __( 'Section Title', 'wp-titans' ), 'section' => 'wp_titans_testimonials' ) );

    $testimonial_defaults = [
        ['quote' => 'Booked 12 new consultations in the first month after launching my new website. Clients now see me as a real authority.', 'author' => 'Anna R.', 'role' => 'Business Consultant', 'img' => 'https://wordpresstitans.com/wp-content/uploads/2025/12/Screenshot-2025-12-06-003203.webp'],
        ['quote' => 'My site finally communicates my value. I now feel confident sending prospects to it — and they convert!', 'author' => 'Michael D.', 'role' => 'Leadership Coach', 'img' => 'https://wordpresstitans.com/wp-content/uploads/2025/12/Screenshot-2025-12-06-003923.webp'],
        ['quote' => 'I’ve tried so many developers before, but this is the first time someone built a site that truly represents my expertise.', 'author' => 'Atty. Clarisse P.', 'role' => 'Legal Consultant', 'img' => 'https://wordpresstitans.com/wp-content/uploads/2025/12/Screenshot-2025-12-06-003518.webp']
    ];

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "wp_titans_testi_img_$i", array( 'default' => $testimonial_defaults[$i-1]['img'], 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_testi_img_$i", array( 'label' => "Testimonial $i Image", 'section' => 'wp_titans_testimonials' ) ) );

        $wp_customize->add_setting( "wp_titans_testi_quote_$i", array( 'default' => $testimonial_defaults[$i-1]['quote'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_testi_quote_$i", array( 'label' => "Testimonial $i Quote", 'section' => 'wp_titans_testimonials', 'type' => 'textarea' ) );

        $wp_customize->add_setting( "wp_titans_testi_author_$i", array( 'default' => $testimonial_defaults[$i-1]['author'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_testi_author_$i", array( 'label' => "Testimonial $i Author", 'section' => 'wp_titans_testimonials' ) );

        $wp_customize->add_setting( "wp_titans_testi_role_$i", array( 'default' => $testimonial_defaults[$i-1]['role'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_testi_role_$i", array( 'label' => "Testimonial $i Role", 'section' => 'wp_titans_testimonials' ) );
    }

    // --- News/Portfolio Section ---
    $wp_customize->add_section( 'wp_titans_portfolio', array(
        'title'    => __( 'Portfolio Section', 'wp-titans' ),
        'priority' => 80,
    ) );

    $portfolio_defaults = [
        ['img' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=600', 'title' => 'Authority Website Case Study', 'cat' => 'Consulting'],
        ['img' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=600', 'title' => 'Consultant Brand Platform', 'cat' => 'Coaching'],
        ['img' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=600', 'title' => 'High-Performance Landing Page', 'cat' => 'SaaS'],
        ['img' => 'https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?auto=format&fit=crop&w=600', 'title' => 'Expert Authority Funnel', 'cat' => 'Marketing'],
        ['img' => 'https://images.unsplash.com/photo-1557838923-2985c318be48?auto=format&fit=crop&w=600', 'title' => 'Professional Law Portfolio', 'cat' => 'Legal'],
        ['img' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=600', 'title' => 'Medical Practice System', 'cat' => 'Healthcare'],
    ];

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting( "wp_titans_portfolio_img_$i", array( 'default' => $portfolio_defaults[$i-1]['img'], 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_portfolio_img_$i", array( 'label' => "Portfolio $i Image", 'section' => 'wp_titans_portfolio' ) ) );

        $wp_customize->add_setting( "wp_titans_portfolio_title_$i", array( 'default' => $portfolio_defaults[$i-1]['title'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_portfolio_title_$i", array( 'label' => "Portfolio $i Title", 'section' => 'wp_titans_portfolio' ) );

        $wp_customize->add_setting( "wp_titans_portfolio_cat_$i", array( 'default' => $portfolio_defaults[$i-1]['cat'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_portfolio_cat_$i", array( 'label' => "Portfolio $i Category", 'section' => 'wp_titans_portfolio' ) );
    }

    $wp_customize->add_setting( 'wp_titans_portfolio_page_tagline', array( 'default' => 'Our Portfolio', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_portfolio_page_tagline', array( 'label' => __( 'Portfolio Page Tagline', 'wp-titans' ), 'section' => 'wp_titans_page_headers' ) );

    $wp_customize->add_setting( 'wp_titans_portfolio_page_title', array( 'default' => 'Success stories from the experts we work with.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_portfolio_page_title', array( 'label' => __( 'Portfolio Page Title', 'wp-titans' ), 'section' => 'wp_titans_page_headers', 'type' => 'textarea' ) );

    // --- FAQ Section ---
    $wp_customize->add_section( 'wp_titans_faq', array(
        'title'    => __( 'FAQ Section', 'wp-titans' ),
        'priority' => 90,
    ) );

    $wp_customize->add_setting( 'wp_titans_faq_main_title', array( 'default' => 'Common Questions', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_faq_main_title', array( 'label' => __( 'Section Title', 'wp-titans' ), 'section' => 'wp_titans_faq' ) ) ;

    $faq_defaults = [
        ['q' => 'What is an Authority Website?', 'a' => 'An Authority Website is a strategic platform designed to position you as an expert and build immediate trust with your ideal clients.'],
        ['q' => 'How long does the process take?', 'a' => 'Our Authority Website System™ is a proven 14-day process from strategy to launch.'],
        ['q' => 'Do I need to provide the copy?', 'a' => 'No, we include professional copywriting as part of our Authority Website System™.'],
        ['q' => 'Is the website mobile-friendly?', 'a' => 'Yes, every website we build is fully responsive and optimized for all devices.'],
    ];

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "wp_titans_faq_q_$i", array( 'default' => $faq_defaults[$i-1]['q'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_faq_q_$i", array( 'label' => "FAQ $i Question", 'section' => 'wp_titans_faq' ) );

        $wp_customize->add_setting( "wp_titans_faq_a_$i", array( 'default' => $faq_defaults[$i-1]['a'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_faq_a_$i", array( 'label' => "FAQ $i Answer", 'section' => 'wp_titans_faq', 'type' => 'textarea' ) );
    }

    // --- Page Headers ---
    $wp_customize->add_section( 'wp_titans_page_headers', array(
        'title'    => __( 'Internal Page Headers', 'wp-titans' ),
        'priority' => 85,
    ) );

    // Services Page
    $wp_customize->add_setting( 'wp_titans_services_page_tagline', array( 'default' => 'Our Expertise', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_services_page_tagline', array( 'label' => __( 'Services Page Tagline', 'wp-titans' ), 'section' => 'wp_titans_page_headers' ) );

    $wp_customize->add_setting( 'wp_titans_services_page_title', array( 'default' => 'Done-for-you website solutions built for consultants, coaches, and service providers.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_services_page_title', array( 'label' => __( 'Services Page Title', 'wp-titans' ), 'section' => 'wp_titans_page_headers', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_services_page_subtitle', array( 'default' => 'Designed to convert, impress, and elevate your authority.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_services_page_subtitle', array( 'label' => __( 'Services Page Subtitle', 'wp-titans' ), 'section' => 'wp_titans_page_headers', 'type' => 'textarea' ) );

    $service_points_defaults = [
        1 => "✓ Custom Authority Design\n✓ Strategic Messaging Blueprint\n✓ Professional Copywriting\n✓ Mobile & Desktop Optimized\n✓ Lead Gen Form Integration",
        2 => "✓ Targeted Sales Copy\n✓ Authority Positioning\n✓ Tone of Voice Development\n✓ Multi-Page Messaging\n✓ Conversion Focus",
        3 => "✓ Custom Theme Development\n✓ Advanced Functionality\n✓ CRM & API Integrations\n✓ E-commerce Solutions\n✓ Site Performance Tuning",
        4 => "✓ Keyword Research\n✓ On-Page Optimization\n✓ Content Strategy\n✓ Technical SEO Audit\n✓ Backlink Guidance",
        5 => "✓ Security Monitoring\n✓ Regular Updates\n✓ Performance Audits\n✓ Priority Support\n✓ Daily Backups",
        6 => "✓ Landing Page Design\n✓ Email List Integration\n✓ Automation Setup\n✓ Analytics Tracking\n✓ A/B Testing Strategy"
    ];

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting( "wp_titans_service_points_$i", array( 'default' => $service_points_defaults[$i], 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "wp_titans_service_points_$i", array( 'label' => "Service $i Features (Line by line)", 'section' => 'wp_titans_services', 'type' => 'textarea' ) );
    }

    // Process Page
    $wp_customize->add_setting( 'wp_titans_process_page_tagline', array( 'default' => 'Our Methodology', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_process_page_tagline', array( 'label' => __( 'Process Page Tagline', 'wp-titans' ), 'section' => 'wp_titans_page_headers' ) );

    $wp_customize->add_setting( 'wp_titans_process_page_title', array( 'default' => 'Our proven 14-day Authority Website System™', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_process_page_title', array( 'label' => __( 'Process Page Title', 'wp-titans' ), 'section' => 'wp_titans_page_headers', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_process_page_subtitle', array( 'default' => 'A strategic, high-speed methodology to get your authority platform live.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_process_page_subtitle', array( 'label' => __( 'Process Page Subtitle', 'wp-titans' ), 'section' => 'wp_titans_page_headers', 'type' => 'textarea' ) );

    $process_page_defaults = [
        1 => ['t' => 'Strategy Call & Positioning', 'd' => 'We begin by understanding your business, ideal clients, strengths, and unique value.', 'i' => 'fa-comments'],
        2 => ['t' => 'Copywriting & Messaging Blueprint', 'd' => 'Our team writes compelling, conversion-focused content tailored to your audience.', 'i' => 'fa-pen-nib'],
        3 => ['t' => 'Website Design & Layout', 'd' => 'We transform your messaging into a clean, modern, strategic design built to position you as the expert.', 'i' => 'fa-drafting-pencil'],
        4 => ['t' => 'Development & Launch', 'd' => 'Your website becomes a fully functional, fast, SEO-ready system. We support you for 30 days post-launch.', 'i' => 'fa-rocket'],
        5 => ['t' => 'Refinement & Growth', 'd' => 'Ongoing support to ensure your site continues to perform and grow with your business.', 'i' => 'fa-chart-line']
    ];

    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting( "wp_titans_process_page_step_icon_$i", array( 'default' => $process_page_defaults[$i]['i'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_process_page_step_icon_$i", array( 'label' => "Process Step $i Icon", 'section' => 'wp_titans_process' ) );

        $wp_customize->add_setting( "wp_titans_process_page_step_title_$i", array( 'default' => $process_page_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_process_page_step_title_$i", array( 'label' => "Process Step $i Title", 'section' => 'wp_titans_process' ) );

        $wp_customize->add_setting( "wp_titans_process_page_step_desc_$i", array( 'default' => $process_page_defaults[$i]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_process_page_step_desc_$i", array( 'label' => "Process Step $i Description", 'section' => 'wp_titans_process', 'type' => 'textarea' ) );
    }

    // About Page
    $wp_customize->add_setting( 'wp_titans_about_page_tagline', array( 'default' => 'About WordPress Titans', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_about_page_tagline', array( 'label' => __( 'About Page Tagline', 'wp-titans' ), 'section' => 'wp_titans_page_headers' ) );

    $wp_customize->add_setting( 'wp_titans_about_page_title', array( 'default' => 'We help experts build websites that truly reflect their value.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_about_page_title', array( 'label' => __( 'About Page Title', 'wp-titans' ), 'section' => 'wp_titans_page_headers', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_about_page_subtitle', array( 'default' => 'Design for business outcomes, not just trends.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_about_page_subtitle', array( 'label' => __( 'About Page Subtitle', 'wp-titans' ), 'section' => 'wp_titans_page_headers', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_about_page_image', array( 'default' => 'https://wordpresstitans.com/wp-content/uploads/2025/12/Screenshot-2025-12-06-001551.webp', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_titans_about_page_image', array( 'label' => __( 'About Page Hero Image', 'wp-titans' ), 'section' => 'wp_titans_page_headers' ) ) );

    // About Page Pillars
    $pillar_defaults = [
        ['t' => 'Clarity First', 'd' => 'We believe clarity drives conversions. Every website begins with a clear message that resonates.'],
        ['t' => 'Design With Purpose', 'd' => 'We don’t design just to look good. We design to guide users toward trust and action.'],
        ['t' => 'Simplicity Wins', 'd' => 'We eliminate the noise. No clutter. Just clean, strategic communication that gets results.'],
        ['t' => 'Results Matter', 'd' => 'Everything we build supports trust, authority, and lead generation for your growth.']
    ];

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "wp_titans_about_pillar_title_$i", array( 'default' => $pillar_defaults[$i-1]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_about_pillar_title_$i", array( 'label' => "About Pillar $i Title", 'section' => 'wp_titans_about' ) );

        $wp_customize->add_setting( "wp_titans_about_pillar_desc_$i", array( 'default' => $pillar_defaults[$i-1]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_about_pillar_desc_$i", array( 'label' => "About Pillar $i Desc", 'section' => 'wp_titans_about', 'type' => 'textarea' ) );
    }

    // --- About Story ---
    $wp_customize->add_setting( 'wp_titans_about_story_title', array( 'default' => 'Built on 20+ Years of Experience', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_about_story_title', array( 'label' => __( 'About Story Title', 'wp-titans' ), 'section' => 'wp_titans_about' ) );

    $wp_customize->add_setting( 'wp_titans_about_story_content', array( 'default' => "WordPress Titans began with one mission: to help experts build websites that truly reflect their value.\n\nAfter 20+ years of building websites for all kinds of businesses, one thing became clear — most websites fail not because of design, but because they lack clarity, strategy, and authority positioning.", 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_about_story_content', array( 'label' => __( 'About Story Content', 'wp-titans' ), 'section' => 'wp_titans_about', 'type' => 'textarea' ) );

    // --- Founder Section (About Page) ---
    $wp_customize->add_section( 'wp_titans_founder', array(
        'title'    => __( 'About: Founder Details', 'wp-titans' ),
        'priority' => 55,
    ) );

    $wp_customize->add_setting( 'wp_titans_founder_image', array( 'default' => 'https://wordpresstitans.com/wp-content/uploads/2025/07/pic-ross-dalangin.jpg', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_titans_founder_image', array( 'label' => __( 'Founder Image', 'wp-titans' ), 'section' => 'wp_titans_founder' ) ) );

    $wp_customize->add_setting( 'wp_titans_founder_name', array( 'default' => 'Ross Dalangin', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_founder_name', array( 'label' => __( 'Founder Name', 'wp-titans' ), 'section' => 'wp_titans_founder' ) );

    $wp_customize->add_setting( 'wp_titans_founder_bio', array( 'default' => 'I’m Ross Dalangin — a web developer with over two decades of experience in WordPress, theme development, and business-focused design systems.', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_founder_bio', array( 'label' => __( 'Founder Bio', 'wp-titans' ), 'section' => 'wp_titans_founder', 'type' => 'textarea' ) );

    // --- Contact Page ---
    $wp_customize->add_setting( 'wp_titans_contact_page_tagline', array( 'default' => 'Get in Touch', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_contact_page_tagline', array( 'label' => __( 'Contact Page Tagline', 'wp-titans' ), 'section' => 'wp_titans_page_headers' ) );

    $wp_customize->add_setting( 'wp_titans_contact_page_title', array( 'default' => 'Let’s Build Your Authority Website', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_contact_page_title', array( 'label' => __( 'Contact Page Title', 'wp-titans' ), 'section' => 'wp_titans_page_headers' ) );

    $wp_customize->add_setting( 'wp_titans_contact_page_subtitle', array( 'default' => 'Whether you need a new website, a redesign, or want to grow your authority online — let’s talk.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_contact_page_subtitle', array( 'label' => __( 'Contact Page Subtitle', 'wp-titans' ), 'section' => 'wp_titans_page_headers' ) );

    $wp_customize->add_setting( 'wp_titans_contact_phone', array( 'default' => '+63 918 418 6025', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_contact_phone', array( 'label' => __( 'Contact Phone', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    $wp_customize->add_setting( 'wp_titans_contact_location', array( 'default' => 'Paete, Laguna, Philippines', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_contact_location', array( 'label' => __( 'Contact Location', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    // --- Authority Landing Page ---
    $wp_customize->add_section( 'wp_titans_authority_page', array(
        'title'    => __( 'Authority Landing Page', 'wp-titans' ),
        'priority' => 82,
    ) );

    $wp_customize->add_setting( 'wp_titans_auth_title', array( 'default' => 'Authority Website System™', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_auth_title', array( 'label' => __( 'Authority Title', 'wp-titans' ), 'section' => 'wp_titans_authority_page' ) );

    $wp_customize->add_setting( 'wp_titans_auth_subtitle', array( 'default' => 'A complete, conversion-focused website package designed to position you as the trusted expert in your field.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_auth_subtitle', array( 'label' => __( 'Authority Subtitle', 'wp-titans' ), 'section' => 'wp_titans_authority_page', 'type' => 'textarea' ) );

    $auth_features_defaults = [
        ['i' => 'fa-pen-nib', 't' => 'High-Converting Copywriting', 'd' => 'We write your homepage, about page, and service pages for maximum impact.'],
        ['i' => 'fa-wand-magic-sparkles', 't' => 'Custom 5-Page Design', 'd' => 'Unique, modern design that sets you apart from generic templates.'],
        ['i' => 'fa-magnifying-glass-chart', 't' => 'On-Page SEO Setup', 'd' => 'We optimize your site so your ideal clients can actually find you on Google.'],
        ['i' => 'fa-bolt', 't' => 'Lightning Fast Performance', 'd' => 'Technical optimization for near-instant load times on all devices.'],
        ['i' => 'fa-shield-halved', 't' => 'Security & SSL', 'd' => 'Full security lockdown and SSL certificate installation for trust.'],
        ['i' => 'fa-arrows-to-eye', 't' => 'Lead Capture System', 'd' => 'Strategic forms and lead magnets to build your email list automatically.']
    ];

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting( "wp_titans_auth_feature_icon_$i", array( 'default' => $auth_features_defaults[$i-1]['i'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_auth_feature_icon_$i", array( 'label' => "Auth Feature $i Icon", 'section' => 'wp_titans_authority_page' ) );

        $wp_customize->add_setting( "wp_titans_auth_feature_title_$i", array( 'default' => $auth_features_defaults[$i-1]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_auth_feature_title_$i", array( 'label' => "Auth Feature $i Title", 'section' => 'wp_titans_authority_page' ) );

        $wp_customize->add_setting( "wp_titans_auth_feature_desc_$i", array( 'default' => $auth_features_defaults[$i-1]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_auth_feature_desc_$i", array( 'label' => "Auth Feature $i Desc", 'section' => 'wp_titans_authority_page', 'type' => 'textarea' ) );
    }

    $wp_customize->add_setting( 'wp_titans_auth_cta_title', array( 'default' => 'Ready to Stop Losing Clients to a Weak Website?', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_auth_cta_title', array( 'label' => __( 'Auth CTA Title', 'wp-titans' ), 'section' => 'wp_titans_authority_page' ) );

    $wp_customize->add_setting( 'wp_titans_auth_cta_desc', array( 'default' => 'Our Authority Website System™ is the fastest way to upgrade your professional image and start generating leads.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_auth_cta_desc', array( 'label' => __( 'Auth CTA Desc', 'wp-titans' ), 'section' => 'wp_titans_authority_page', 'type' => 'textarea' ) );

    // --- Theme Setup ---
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

    // --- Social Links ---
    $wp_customize->add_section( 'wp_titans_social', array(
        'title'    => __( 'Social Links', 'wp-titans' ),
        'priority' => 100,
    ) );

    $socials = ['facebook', 'linkedin', 'twitter', 'instagram'];
    foreach ($socials as $social) {
        $wp_customize->add_setting( "wp_titans_social_$social", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( "wp_titans_social_$social", array( 'label' => ucfirst($social) . " URL", 'section' => 'wp_titans_social' ) );
    }

    // --- Contact Section ---
    $wp_customize->add_section( 'wp_titans_contact', array(
        'title'    => __( 'Contact Section', 'wp-titans' ),
        'priority' => 95,
    ) );

    $wp_customize->add_setting( 'wp_titans_contact_title', array( 'default' => 'Ready to Build Your Authority Website?', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_contact_title', array( 'label' => __( 'Contact Title', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    $wp_customize->add_setting( 'wp_titans_contact_desc', array( 'default' => 'Let’s create a website that showcases your expertise and helps attract your ideal clients.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_contact_desc', array( 'label' => __( 'Contact Description', 'wp-titans' ), 'section' => 'wp_titans_contact', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_contact_email', array( 'default' => 'hello@wordpresstitans.com', 'sanitize_callback' => 'sanitize_email' ) );
    $wp_customize->add_control( 'wp_titans_contact_email', array( 'label' => __( 'Contact Email', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    $wp_customize->add_setting( 'wp_titans_contact_guarantee', array( 'default' => '14-Day Delivery Guaranteed', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_contact_guarantee', array( 'label' => __( 'Guarantee Text', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    $wp_customize->add_setting( 'wp_titans_contact_btn_text', array( 'default' => 'Book a Strategy Call', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_contact_btn_text', array( 'label' => __( 'Submit Button Text', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    $wp_customize->add_setting( 'wp_titans_contact_btn_url', array( 'default' => '#contact', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_contact_btn_url', array( 'label' => __( 'Submit Button URL (if not using form)', 'wp-titans' ), 'section' => 'wp_titans_contact' ) );

    // --- Audit Section (Lead Magnet) ---
    $wp_customize->add_section( 'wp_titans_audit', array(
        'title'    => __( 'Audit Section (Lead Magnet)', 'wp-titans' ),
        'priority' => 98,
    ) );

    $wp_customize->add_setting( 'wp_titans_audit_show', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_audit_show', array( 'label' => __( 'Show Audit Section', 'wp-titans' ), 'section' => 'wp_titans_audit', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_audit_title', array( 'default' => 'Get a Free Website Authority Audit', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_audit_title', array( 'label' => __( 'Audit Title', 'wp-titans' ), 'section' => 'wp_titans_audit' ) );

    $wp_customize->add_setting( 'wp_titans_audit_desc', array( 'default' => 'We will manually review your current website and give you 3 actionable steps to increase your authority and conversions.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_audit_desc', array( 'label' => __( 'Audit Description', 'wp-titans' ), 'section' => 'wp_titans_audit', 'type' => 'textarea' ) );

    // --- Layout & UX ---
    $wp_customize->add_section( 'wp_titans_ux', array(
        'title'    => __( 'Layout & UX', 'wp-titans' ),
        'priority' => 25,
    ) );

    $wp_customize->add_setting( 'wp_titans_sticky_header', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_sticky_header', array( 'label' => __( 'Sticky Header', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'wp_titans_back_to_top', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'wp_titans_back_to_top', array( 'label' => __( 'Show Back to Top Button', 'wp-titans' ), 'section' => 'wp_titans_ux', 'type' => 'checkbox' ) );

    // --- Scripts & Analytics ---
    $wp_customize->add_section( 'wp_titans_scripts', array(
        'title'    => __( 'Scripts & Analytics', 'wp-titans' ),
        'priority' => 110,
    ) );

    $wp_customize->add_setting( 'wp_titans_header_scripts', array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_header_scripts', array( 'label' => __( 'Header Scripts', 'wp-titans' ), 'description' => __( 'Add Google Analytics or FB Pixel code here.', 'wp-titans' ), 'section' => 'wp_titans_scripts', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_footer_scripts', array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_footer_scripts', array( 'label' => __( 'Footer Scripts', 'wp-titans' ), 'description' => __( 'Add tracking scripts or chat widgets here.', 'wp-titans' ), 'section' => 'wp_titans_scripts', 'type' => 'textarea' ) );

}
add_action( 'customize_register', 'wp_titans_customize_register' );

/**
 * Output Customizer CSS
 */
function wp_titans_customizer_css() {
    $heading_font = get_theme_mod('wp_titans_heading_font', 'Syne');
    $body_font = get_theme_mod('wp_titans_body_font', 'Space Grotesk');
    ?>
    <style type="text/css">
        :root {
            --primary: <?php echo get_theme_mod( 'wp_titans_primary_color', '#D4AF37' ); ?>;
            --accent-glow: <?php
                $primary = get_theme_mod( 'wp_titans_primary_color', '#D4AF37' );
                list($r, $g, $b) = sscanf($primary, "#%02x%02x%02x");
                echo "rgba($r, $g, $b, 0.15)";
            ?>;
        }
        body { font-family: '<?php echo esc_attr($body_font); ?>', sans-serif; }
        h1, h2, h3, h4, .btn, .nav-links a { font-family: '<?php echo esc_attr($heading_font); ?>', sans-serif; }

        .hero {
            background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url('<?php echo get_theme_mod( 'wp_titans_hero_bg', 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1920' ); ?>');
        }
    </style>
    <?php
}
add_action( 'wp_head', 'wp_titans_customizer_css' );
