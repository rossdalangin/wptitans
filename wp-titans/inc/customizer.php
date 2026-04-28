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

    $wp_customize->add_setting( 'wp_titans_hero_bg', array( 'default' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1920', 'sanitize_callback' => 'esc_url_raw' ) );
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

    for ($i = 0; $i < 3; $i++) {
        $n = $i + 1;
        $wp_customize->add_setting( "wp_titans_target_icon_$n", array( 'default' => $target_defaults[$i]['icon'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_target_icon_$n", array( 'label' => "Target $n Icon", 'section' => 'wp_titans_target' ) );

        $wp_customize->add_setting( "wp_titans_target_title_$n", array( 'default' => $target_defaults[$i]['title'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_target_title_$n", array( 'label' => "Target $n Title", 'section' => 'wp_titans_target' ) );

        $wp_customize->add_setting( "wp_titans_target_desc_$n", array( 'default' => $target_defaults[$i]['desc'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_target_desc_$n", array( 'label' => "Target $n Desc", 'section' => 'wp_titans_target', 'type' => 'textarea' ) );
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

    for ($i = 0; $i < 6; $i++) {
        $n = $i + 1;
        $wp_customize->add_setting( "wp_titans_service_icon_$n", array( 'default' => $services_defaults[$i]['icon'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_service_icon_$n", array( 'label' => "Service $n Icon", 'section' => 'wp_titans_services' ) );

        $wp_customize->add_setting( "wp_titans_service_title_$n", array( 'default' => $services_defaults[$i]['title'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_service_title_$n", array( 'label' => "Service $n Title", 'section' => 'wp_titans_services' ) );

        $wp_customize->add_setting( "wp_titans_service_desc_$n", array( 'default' => $services_defaults[$i]['desc'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_service_desc_$n", array( 'label' => "Service $n Desc", 'section' => 'wp_titans_services', 'type' => 'textarea' ) );
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

    for ($i = 0; $i < 4; $i++) {
        $n = $i + 1;
        $wp_customize->add_setting( "wp_titans_stat_num_$n", array( 'default' => $stats_defaults[$i]['num'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_stat_num_$n", array( 'label' => "Stat $n Number", 'section' => 'wp_titans_stats' ) );

        $wp_customize->add_setting( "wp_titans_stat_label_$n", array( 'default' => $stats_defaults[$i]['label'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_stat_label_$n", array( 'label' => "Stat $n Label", 'section' => 'wp_titans_stats' ) );
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

    for ($i = 0; $i < 4; $i++) {
        $n = $i + 1;
        $wp_customize->add_setting( "wp_titans_process_title_$n", array( 'default' => $process_defaults[$i]['title'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_process_title_$n", array( 'label' => "Step $n Title", 'section' => 'wp_titans_process' ) );

        $wp_customize->add_setting( "wp_titans_process_desc_$n", array( 'default' => $process_defaults[$i]['desc'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_process_desc_$n", array( 'label' => "Step $n Description", 'section' => 'wp_titans_process', 'type' => 'textarea' ) );
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

    for ($i = 0; $i < 3; $i++) {
        $n = $i + 1;
        $wp_customize->add_setting( "wp_titans_testi_img_$n", array( 'default' => $testimonial_defaults[$i]['img'], 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_testi_img_$n", array( 'label' => "Testimonial $n Image", 'section' => 'wp_titans_testimonials' ) ) );

        $wp_customize->add_setting( "wp_titans_testi_quote_$n", array( 'default' => $testimonial_defaults[$i]['quote'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_testi_quote_$n", array( 'label' => "Testimonial $n Quote", 'section' => 'wp_titans_testimonials', 'type' => 'textarea' ) );

        $wp_customize->add_setting( "wp_titans_testi_author_$n", array( 'default' => $testimonial_defaults[$i]['author'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_testi_author_$n", array( 'label' => "Testimonial $n Author", 'section' => 'wp_titans_testimonials' ) );

        $wp_customize->add_setting( "wp_titans_testi_role_$n", array( 'default' => $testimonial_defaults[$i]['role'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_testi_role_$n", array( 'label' => "Testimonial $n Role", 'section' => 'wp_titans_testimonials' ) );
    }

    // --- News/Portfolio Section ---
    $wp_customize->add_section( 'wp_titans_portfolio', array(
        'title'    => __( 'Portfolio Section', 'wp-titans' ),
        'priority' => 80,
    ) );

    $portfolio_defaults = [
        ['img' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=600', 'title' => 'Authority Website Case Study'],
        ['img' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=600', 'title' => 'Consultant Brand Platform'],
        ['img' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=600', 'title' => 'High-Performance Landing Page'],
    ];

    for ($i = 0; $i < 3; $i++) {
        $n = $i + 1;
        $wp_customize->add_setting( "wp_titans_portfolio_img_$n", array( 'default' => $portfolio_defaults[$i]['img'], 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wp_titans_portfolio_img_$n", array( 'label' => "Portfolio $n Image", 'section' => 'wp_titans_portfolio' ) ) );

        $wp_customize->add_setting( "wp_titans_portfolio_title_$n", array( 'default' => $portfolio_defaults[$i]['title'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_portfolio_title_$n", array( 'label' => "Portfolio $n Title", 'section' => 'wp_titans_portfolio' ) );
    }

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

    for ($i = 0; $i < 4; $i++) {
        $n = $i + 1;
        $wp_customize->add_setting( "wp_titans_faq_q_$n", array( 'default' => $faq_defaults[$i]['q'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_faq_q_$n", array( 'label' => "FAQ $n Question", 'section' => 'wp_titans_faq' ) );

        $wp_customize->add_setting( "wp_titans_faq_a_$n", array( 'default' => $faq_defaults[$i]['a'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_faq_a_$n", array( 'label' => "FAQ $n Answer", 'section' => 'wp_titans_faq', 'type' => 'textarea' ) );
    }

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
