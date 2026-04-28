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

    $wp_customize->add_setting( 'wp_titans_logo_icon', array( 'default' => 'fa-bolt', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_logo_icon', array( 'label' => __( 'Logo Icon (FontAwesome class)', 'wp-titans' ), 'section' => 'wp_titans_branding', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_logo_text', array( 'default' => 'TITANS', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_logo_text', array( 'label' => __( 'Logo Text', 'wp-titans' ), 'section' => 'wp_titans_branding', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_footer_desc', array( 'default' => 'Architecting the digital excellence of tomorrow. Creative, efficient, and unbeatable.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_footer_desc', array( 'label' => __( 'Footer Description', 'wp-titans' ), 'section' => 'wp_titans_branding', 'type' => 'textarea' ) );

    // --- Colors & Typography ---
    $wp_customize->add_section( 'wp_titans_design', array(
        'title'    => __( 'Colors & Typography', 'wp-titans' ),
        'priority' => 20,
    ) );

    $wp_customize->add_setting( 'wp_titans_primary_color', array( 'default' => '#ff3e3e', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_titans_primary_color', array( 'label' => __( 'Primary Color', 'wp-titans' ), 'section' => 'wp_titans_design' ) ) );

    $wp_customize->add_setting( 'wp_titans_heading_font', array( 'default' => 'Syne', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_heading_font', array( 'label' => __( 'Heading Font (Google Font Name)', 'wp-titans' ), 'section' => 'wp_titans_design', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_body_font', array( 'default' => 'Space Grotesk', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_body_font', array( 'label' => __( 'Body Font (Google Font Name)', 'wp-titans' ), 'section' => 'wp_titans_design', 'type' => 'text' ) );

    // --- Hero Section ---
    $wp_customize->add_section( 'wp_titans_hero', array(
        'title'    => __( 'Hero Section', 'wp-titans' ),
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'wp_titans_hero_title', array( 'default' => 'SUCCESS THROUGH DESIGN', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_hero_title', array( 'label' => __( 'Hero Title', 'wp-titans' ), 'section' => 'wp_titans_hero', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_hero_subtitle', array( 'default' => 'The Apex Agency of the Digital Frontier. We engineer high-converting digital experiences for global brands.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_hero_subtitle', array( 'label' => __( 'Hero Subtitle', 'wp-titans' ), 'section' => 'wp_titans_hero', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_hero_bg', array( 'default' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&w=1920', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_titans_hero_bg', array( 'label' => __( 'Hero Background Image', 'wp-titans' ), 'section' => 'wp_titans_hero' ) ) );

    // --- About Section ---
    $wp_customize->add_section( 'wp_titans_about', array(
        'title'    => __( 'About Section', 'wp-titans' ),
        'priority' => 50,
    ) );

    $wp_customize->add_setting( 'wp_titans_about_tagline', array( 'default' => 'DIGITAL EXCELLENCE ENGINEERED', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_about_tagline', array( 'label' => __( 'About Tagline', 'wp-titans' ), 'section' => 'wp_titans_about', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_about_title', array( 'default' => 'Sovereign Digital Identity', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'wp_titans_about_title', array( 'label' => __( 'About Title', 'wp-titans' ), 'section' => 'wp_titans_about', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_titans_about_content', array( 'default' => 'WordPress Titans was born from the intersection of high-end aesthetics and technical dominance.', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'wp_titans_about_content', array( 'label' => __( 'About Content', 'wp-titans' ), 'section' => 'wp_titans_about', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'wp_titans_about_image', array( 'default' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=800', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_titans_about_image', array( 'label' => __( 'About Image', 'wp-titans' ), 'section' => 'wp_titans_about' ) ) );

    // --- Services Section ---
    $wp_customize->add_section( 'wp_titans_services', array(
        'title'    => __( 'Services Section', 'wp-titans' ),
        'priority' => 60,
    ) );

    $services_defaults = [
        ['icon' => 'fa-code', 'title' => 'Custom Development', 'desc' => 'We build robust, scalable WordPress architectures that perform under pressure.'],
        ['icon' => 'fa-paint-brush', 'title' => 'UX/UI Design', 'desc' => 'Creative interfaces designed to convert. We attack user friction first.'],
        ['icon' => 'fa-rocket', 'title' => 'Performance Tuning', 'desc' => 'Continuous monitoring and optimization to ensure your environment stays fast.'],
        ['icon' => 'fa-shield-alt', 'title' => 'Digital Hardening', 'desc' => 'Securing the physical-digital bridge. We protect your brand infrastructure.'],
        ['icon' => 'fa-chart-line', 'title' => 'Growth Metrics', 'desc' => 'Utilizing proprietary analysis to predict emerging market trends.'],
        ['icon' => 'fa-brain', 'title' => 'AI Integration', 'desc' => 'Empowering your workflow with neural networks and automation.'],
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
        ['num' => '250', 'label' => 'Projects Delivered'],
        ['num' => '99', 'label' => 'Performance Score'],
        ['num' => '50', 'label' => 'Global Clients'],
        ['num' => '15', 'label' => 'Industry Awards'],
    ];

    for ($i = 0; $i < 4; $i++) {
        $n = $i + 1;
        $wp_customize->add_setting( "wp_titans_stat_num_$n", array( 'default' => $stats_defaults[$i]['num'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_stat_num_$n", array( 'label' => "Stat $n Number", 'section' => 'wp_titans_stats' ) );

        $wp_customize->add_setting( "wp_titans_stat_label_$n", array( 'default' => $stats_defaults[$i]['label'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "wp_titans_stat_label_$n", array( 'label' => "Stat $n Label", 'section' => 'wp_titans_stats' ) );
    }

    // --- News/Portfolio Section ---
    $wp_customize->add_section( 'wp_titans_portfolio', array(
        'title'    => __( 'Portfolio Section', 'wp-titans' ),
        'priority' => 80,
    ) );

    $portfolio_defaults = [
        ['img' => 'https://images.unsplash.com/photo-1510511459019-5dee997ddfdf?auto=format&fit=crop&w=600', 'title' => 'The Future of Headless WP'],
        ['img' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=600', 'title' => 'Quantum Web Performance'],
        ['img' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600', 'title' => 'Securing User Experiences'],
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

    $faq_defaults = [
        ['q' => 'What makes Titans different?', 'a' => 'Most agencies focus on aesthetics. Titans focus on dominance.'],
        ['q' => 'Is custom development worth it?', 'a' => 'Yes. Off-the-shelf solutions are cracks in your armor.'],
        ['q' => 'How long does a project take?', 'a' => 'Typically between 4 to 12 weeks.'],
        ['q' => 'Do you provide ongoing support?', 'a' => 'Our Global Operations Center is active 24/7/365.'],
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

    $socials = ['github', 'linkedin', 'twitter'];
    foreach ($socials as $social) {
        $wp_customize->add_setting( "wp_titans_social_$social", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( "wp_titans_social_$social", array( 'label' => ucfirst($social) . " URL", 'section' => 'wp_titans_social' ) );
    }

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
            --primary: <?php echo get_theme_mod( 'wp_titans_primary_color', '#ff3e3e' ); ?>;
            --accent-glow: <?php
                $primary = get_theme_mod( 'wp_titans_primary_color', '#ff3e3e' );
                list($r, $g, $b) = sscanf($primary, "#%02x%02x%02x");
                echo "rgba($r, $g, $b, 0.15)";
            ?>;
        }
        body { font-family: '<?php echo esc_attr($body_font); ?>', sans-serif; }
        h1, h2, h3, h4, .btn, .nav-links a { font-family: '<?php echo esc_attr($heading_font); ?>', sans-serif; }

        .hero {
            background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php echo get_theme_mod( 'wp_titans_hero_bg', 'https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&w=1920' ); ?>');
        }
    </style>
    <?php
}
add_action( 'wp_head', 'wp_titans_customizer_css' );
