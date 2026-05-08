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
            'footer-1' => esc_html__( 'Footer Arsenal', 'wp-titans' ),
            'footer-2' => esc_html__( 'Footer Transformation', 'wp-titans' ),
            'footer-3' => esc_html__( 'Footer Agency', 'wp-titans' ),
            'footer-4' => esc_html__( 'Footer Control', 'wp-titans' ),
            'footer-5' => esc_html__( 'Footer Legal', 'wp-titans' ),
        ) );

        add_image_size( 'titan-portfolio', 800, 500, true );
        add_image_size( 'titan-team', 400, 500, true );
        add_image_size( 'titan-testimonial', 150, 150, true );

        load_theme_textdomain( 'wp-titans', get_template_directory() . '/languages' );
    }
endif;

/**
 * Calculate Reading Time
 */
function titan_reading_time() {
    $content = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $readingtime = ceil($word_count / 200);
    return $readingtime . ' MIN';
}
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

    $adobe_id = wp_titans_get_mod("wp_titans_adobe_fonts_id");
    if ($adobe_id) {
        wp_enqueue_style( 'wp-titans-adobe-fonts', "https://use.typekit.net/{$adobe_id}.css", array(), null );
    }

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
 * Titan Power Widgets
 */
function wp_titans_authority_badge() {
    ?>
    <div class="titan-authority-badge" style="background: #111; border: 1px solid var(--primary); padding: 1rem 2rem; border-radius: 50px; display: inline-flex; align-items: center; gap: 1rem; box-shadow: 0 10px 30px rgba(var(--primary-rgb), 0.2);">
        <i class="fas fa-shield-check" style="color: var(--primary); font-size: 1.2rem;"></i>
        <span style="font-size: 0.65rem; font-weight: 900; text-transform: uppercase; letter-spacing: 2px; color: white;">AUTHORITY VERIFIED</span>
    </div>
    <?php
}

function wp_titans_pipeline_widget() {
    ?>
    <div class="titan-pipeline-widget" style="background: #050505; border: 1px solid var(--border-glass); padding: 2rem; border-radius: 8px;">
        <h4 style="font-size: 0.7rem; color: #555; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1.5rem;">REAL-TIME PIPELINE STATUS</h4>
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.75rem;">
                    <span>Active Authority Builds</span>
                    <span style="color: var(--primary);">03</span>
                </div>
                <div style="height: 4px; background: #111; border-radius: 10px; overflow: hidden;">
                    <div style="width: 75%; height: 100%; background: var(--primary);"></div>
                </div>
            </div>
            <div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.75rem;">
                    <span>Next Available Sprint Slot</span>
                    <span style="color: #2ecc71;">14 Days</span>
                </div>
            </div>
        </div>
    </div>
    <?php
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
        'rewrite'     => array('slug' => 'the-titans'),
    ) );

    // Resources
    register_post_type( 'resource', array(
        'labels'      => array( 'name' => 'Resources', 'singular_name' => 'Resource' ),
        'public'      => true,
        'menu_icon'   => 'dashicons-media-document',
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest' => true,
    ) );

    // Testimonials
    register_post_type( 'testimonial', array(
        'labels'      => array( 'name' => 'Testimonials', 'singular_name' => 'Testimonial' ),
        'public'      => true,
        'menu_icon'   => 'dashicons-testimonial',
        'supports'    => array( 'title', 'editor', 'thumbnail' ),
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
            'Home' => array('template' => 'front-page.php', 'is_front' => true),
            'Our Arsenal' => array('template' => 'page-services.php'),
            'The 14-Day Sprint' => array('template' => 'page-process.php'),
            'The Titan Legacy' => array('template' => 'page-about.php'),
            'Initiate Connection' => array('template' => 'page-contact.php'),
            'Portfolio' => array('template' => 'page-portfolio.php'),
            'Book a Strategy Call' => array('template' => 'page-book.php'),
            'Project Planner' => array('template' => 'page-planner.php'),
            'Authority Website System™' => array('template' => 'page-authority.php'),
            'Resource Center' => array('template' => 'page-resources.php'),
            'Client Portal' => array('template' => 'page-portal.php'),
            'ROI Calculator' => array('template' => 'page-roi-calculator.php'),
            'Free Authority Audit' => array('template' => 'page-audit.php'),
            '14-Day Velocity Workshop' => array('template' => 'page-workshop.php'),
            'The Authority Protocol' => array('template' => 'page-vsl.php'),
            'The Titan Manifesto' => array('template' => 'page-manifesto.php'),
            'Referral & Partner Protocol' => array('template' => 'page-partner.php'),
            'Client Onboarding Protocol' => array('template' => 'page-onboarding.php'),
            'Brand Style Guide' => array('template' => 'page-style-guide.php'),
            'Legal: Privacy Protocols' => array('template' => 'page-legal.php', 'content' => '## Data Protection Strategy\nYour data is secure under our elite encryption protocols.'),
            'Legal: Engagement Terms' => array('template' => 'page-legal.php', 'content' => '## Service Agreement\nStandard operational terms for Titan engagements.'),
            'Authority Blueprint' => array('template' => 'page-blueprint.php'),
            'Join the Arsenal' => array('template' => 'page-careers.php'),
            'Strategic Growth Roadmap' => array('template' => 'page-roadmap.php'),
            'Web Design Strategy' => array('template' => 'page-service-single.php', 'content' => 'Building world-class systems...'),
            'Conversion Case Study' => array('template' => 'page-case-study.php'),
            'Thank You: Initialization' => array('template' => 'page-thank-you.php'),
            'Success: Onboarding Complete' => array('template' => 'page-success-onboarding.php'),
            'The Titan Lab' => array('template' => 'page-lab.php'),
            'Privacy Protocols' => array('template' => 'page.php', 'content' => 'Secure and compliant.'),
            'Service Engagement Terms' => array('template' => 'page.php', 'content' => 'Operational standards.')
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
            $menu_items = array(
                'Home' => 'Home',
                'Our Arsenal' => 'The Arsenal',
                'Portfolio' => 'Success Stories',
                'The 14-Day Sprint' => 'The Sprint',
                'Resource Center' => 'The Vault',
                'Book a Strategy Call' => 'Initiate Strategy'
            );
            foreach ( $menu_items as $original_title => $nav_label ) {
                if (isset($created_page_ids[$original_title])) {
                    wp_update_nav_menu_item( $menu_id, 0, array(
                        'menu-item-title'     => $nav_label,
                        'menu-item-object'    => 'page',
                        'menu-item-object-id' => $created_page_ids[$original_title],
                        'menu-item-type'      => 'post_type',
                        'menu-item-status'    => 'publish',
                    ) );
                }
            }
            $locations = get_theme_mod( 'nav_menu_locations' );
            $locations['menu-1'] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }

        // Setup Footer 1 (Our Arsenal)
        $f1_name = 'Footer Arsenal';
        if ( ! wp_get_nav_menu_object( $f1_name ) ) {
            $f1_id = wp_create_nav_menu( $f1_name );
            $f1_items = array('Authority Website System™', 'Elite Copywriting', 'SEO Mastery', 'Lead Gen Funnels');
            foreach ($f1_items as $stitle) {
                $post = get_page_by_title($stitle, OBJECT, 'service');
                if ($post) {
                    wp_update_nav_menu_item($f1_id, 0, array(
                        'menu-item-title' => $stitle,
                        'menu-item-object' => 'service',
                        'menu-item-object-id' => $post->ID,
                        'menu-item-type' => 'post_type',
                        'menu-item-status' => 'publish',
                    ));
                }
            }
            $locations = get_theme_mod( 'nav_menu_locations' );
            $locations['footer-1'] = $f1_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }

        // Setup Footer 2 (Transformation)
        $f2_name = 'Footer Transformation';
        if ( ! wp_get_nav_menu_object( $f2_name ) ) {
            $f2_id = wp_create_nav_menu( $f2_name );
            $f2_items = array(
                'The 14-Day Sprint' => 'The 14-Day Sprint',
                'ROI Calculator' => 'ROI Calculator',
                'Portfolio' => 'Success Stories'
            );
            foreach ($f2_items as $otitle => $nlabel) {
                if (isset($created_page_ids[$otitle])) {
                    wp_update_nav_menu_item($f2_id, 0, array(
                        'menu-item-title' => $nlabel,
                        'menu-item-object' => 'page',
                        'menu-item-object-id' => $created_page_ids[$otitle],
                        'menu-item-type' => 'post_type',
                        'menu-item-status' => 'publish',
                    ));
                }
            }
            $locations = get_theme_mod( 'nav_menu_locations' );
            $locations['footer-2'] = $f2_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }

        // Setup Footer 3 (Agency)
        $f3_name = 'Footer Agency';
        if ( ! wp_get_nav_menu_object( $f3_name ) ) {
            $f3_id = wp_create_nav_menu( $f3_name );
            $f3_items = array(
                'The Titan Legacy' => 'Our Story',
                'The Titan Manifesto' => 'Manifesto',
                'The Titan Lab' => 'The Lab',
                'Referral & Partner Protocol' => 'Partner Protocol',
                'Join the Arsenal' => 'Careers'
            );
            foreach ($f3_items as $otitle => $nlabel) {
                if (isset($created_page_ids[$otitle])) {
                    wp_update_nav_menu_item($f3_id, 0, array(
                        'menu-item-title' => $nlabel,
                        'menu-item-object' => 'page',
                        'menu-item-object-id' => $created_page_ids[$otitle],
                        'menu-item-type' => 'post_type',
                        'menu-item-status' => 'publish',
                    ));
                }
            }
            $locations = get_theme_mod( 'nav_menu_locations' );
            $locations['footer-3'] = $f3_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }

        // Setup Footer 4 (Control)
        $f4_name = 'Footer Control';
        if ( ! wp_get_nav_menu_object( $f4_name ) ) {
            $f4_id = wp_create_nav_menu( $f4_name );
            $f4_items = array(
                'Client Portal' => 'Client Portal',
                'Free Authority Audit' => 'Free Audit',
                'Project Planner' => 'Project Planner'
            );
            foreach ($f4_items as $otitle => $nlabel) {
                if (isset($created_page_ids[$otitle])) {
                    wp_update_nav_menu_item($f4_id, 0, array(
                        'menu-item-title' => $nlabel,
                        'menu-item-object' => 'page',
                        'menu-item-object-id' => $created_page_ids[$otitle],
                        'menu-item-type' => 'post_type',
                        'menu-item-status' => 'publish',
                    ));
                }
            }
            $locations = get_theme_mod( 'nav_menu_locations' );
            $locations['footer-4'] = $f4_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }

        // Setup Footer 5 (Legal)
        $f5_name = 'Footer Legal';
        if ( ! wp_get_nav_menu_object( $f5_name ) ) {
            $f5_id = wp_create_nav_menu( $f5_name );
            $f5_items = array(
                'Privacy Protocols' => 'Privacy Protocols',
                'Service Engagement Terms' => 'Terms of Service'
            );
            foreach ($f5_items as $otitle => $nlabel) {
                if (isset($created_page_ids[$otitle])) {
                    wp_update_nav_menu_item($f5_id, 0, array(
                        'menu-item-title' => $nlabel,
                        'menu-item-object' => 'page',
                        'menu-item-object-id' => $created_page_ids[$otitle],
                        'menu-item-type' => 'post_type',
                        'menu-item-status' => 'publish',
                    ));
                }
            }
            $locations = get_theme_mod( 'nav_menu_locations' );
            $locations['footer-5'] = $f5_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }

        // Generate Elite Services
        $sample_services = array(
            'Authority Website System™' => 'The definitive rebrand for established experts. We weaponize your knowledge into a high-performance conversion engine in 14 days.',
            'Elite Copywriting' => 'Conversion-first messaging that connects emotionally and closes logically. We speak your ideal client’s language.',
            'Performance Optimization' => 'Sub-2 second load times guaranteed. We build on a clean, scalable WordPress architecture for market dominance.',
            'SEO Mastery' => 'Dominate the first page. We optimize for the keywords that actually drive high-ticket revenue, not just vanity traffic.',
            'Lead Gen Funnels' => 'Automated client acquisition systems. We build the filters that identify and secure your most valuable prospects.',
            'Titan Maintenance' => '24/7 security, speed monitoring, and strategic support to ensure your authority never wavers.',
            'Headless CMS Protocol' => 'Decoupled WordPress architectures for unmatched speed, security, and multi-channel content delivery.',
            'Custom Plugin Engineering' => 'Bespoke functionality developed to solve complex operational challenges and automate agency workflows.',
            'Security & SSL Hardening' => 'Enterprise-grade security lockdowns to protect your authority assets from digital intrusion.'
        );
        foreach ($sample_services as $stitle => $scontent) {
            if (!get_page_by_title($stitle, OBJECT, 'service')) {
                wp_insert_post(array(
                    'post_title' => $stitle,
                    'post_content' => $scontent,
                    'post_status' => 'publish',
                    'post_type' => 'service',
                    'post_excerpt' => $scontent
                ));
            }
        }

        // Generate Sample Resources
        $sample_resources = array(
            'The $100k Authority Blueprint' => array(
                'desc' => 'The definitive roadmap to digital dominance for high-ticket experts.',
                'file' => 'authority_blueprint_lead_magnet.txt'
            ),
            'High-Ticket Sales Framework' => array(
                'desc' => 'How to convert hesitant prospects into $10k+ project signs.',
                'file' => 'guide_high_ticket_sales.txt'
            ),
            'The 14-Day Velocity SOP' => array(
                'desc' => 'Our internal methodology for rapid world-class delivery.',
                'file' => 'guide_14_day_sprint.txt'
            ),
            'SEO Mastery for Agencies' => array(
                'desc' => 'The keywords and technical standards for first-page dominance.',
                'file' => 'guide_seo_mastery.txt'
            )
        );
        foreach ($sample_resources as $rtitle => $rdata) {
            if (!get_page_by_title($rtitle, OBJECT, 'resource')) {
                $rid = wp_insert_post(array(
                    'post_title' => $rtitle,
                    'post_content' => $rdata['desc'],
                    'post_status' => 'publish',
                    'post_type' => 'resource',
                    'post_excerpt' => $rdata['desc']
                ));
                if ($rid) {
                    update_post_meta($rid, 'resource_file_url', home_url('/') . $rdata['file']);
                }
            }
        }

        // Generate Elite Portfolio
        $sample_portfolio = array(
            'The SaaS Transformation' => 'Scaled a B2B platform by 140% lead volume through cinematic positioning.',
            'Consultant Authority Build' => 'Positioned a solo-expert as the #1 choice in their field via the 14-Day Sprint.',
            'Enterprise Infrastructure' => 'Developed a custom high-performance ecosystem for a growing $10M ARR agency.',
            'Medical Specialist Hub' => 'Launched a high-trust platform that automated booking for a specialized clinic.',
            'Legal Power Platform' => 'Transformed a traditional law firm into a modern, authority-driven digital brand.',
            'E-commerce Dominance' => 'Optimized a luxury retail site for elite speed and world-class checkout conversion.'
        );
        foreach ($sample_portfolio as $ptitle => $pcontent) {
            if (!get_page_by_title($ptitle, OBJECT, 'portfolio')) {
                wp_insert_post(array(
                    'post_title' => $ptitle,
                    'post_content' => $pcontent,
                    'post_status' => 'publish',
                    'post_type' => 'portfolio',
                    'post_excerpt' => $pcontent
                ));
            }
        }

        // Generate Sample Insights
        $sample_posts = array(
            'The Authority Gap' => 'How to identify and bridge the discrepancy between your expertise and your perception.',
            'Cinematic Messaging' => 'The framework for writing copy that resonates with high-ticket clients.',
            'Velocity Operations' => 'Behind the scenes of our 14-Day deployment protocol.',
            'The Future of WordPress' => 'How headless architectures and AI are reshaping the digital landscape.',
            'Lead Gen Mastery' => 'Automating your client acquisition journey without losing the human touch.'
        );
        foreach ($sample_posts as $ptitle => $pcontent) {
            if (!get_page_by_title($ptitle, OBJECT, 'post')) {
                wp_insert_post(array(
                    'post_title' => $ptitle,
                    'post_content' => $pcontent,
                    'post_status' => 'publish',
                    'post_type' => 'post',
                    'post_excerpt' => $pcontent
                ));
            }
        }

        // Generate Sample Testimonials
        $sample_testis = array(
            'The SaaS Pivot' => 'Ross and the Titan team didn’t just build a site; they built a revenue engine. Our lead quality improved 3x in the first month.',
            'Consultant Launch' => 'I was invisible before the 14-Day Sprint. Now, I have a brand that actually reflects the premium level of my work.',
            'Enterprise Build' => 'Unmatched speed. Unmatched precision. The best WordPress development team we have ever partnered with.'
        );
        foreach ($sample_testis as $ttitle => $tcontent) {
            if (!get_page_by_title($ttitle, OBJECT, 'testimonial')) {
                wp_insert_post(array(
                    'post_title' => $ttitle,
                    'post_content' => $tcontent,
                    'post_status' => 'publish',
                    'post_type' => 'testimonial'
                ));
            }
        }

        // Generate Sample Team
        $sample_team = array(
            'Ross Dalangin' => 'Lead Strategist & Architect. 20+ years of building digital authority for experts.',
            'Sarah Titan' => 'Creative Director. Master of cinematic branding and luxury UI/UX.',
            'Marcus Code' => 'Lead Developer. Expert in high-performance WordPress systems and clean logic.',
            'Elena Script' => 'Senior Copywriter. Crafts the high-converting messaging that powers the Titan systems.'
        );
        foreach ($sample_team as $tname => $tbio) {
            if (!get_page_by_title($tname, OBJECT, 'team')) {
                wp_insert_post(array(
                    'post_title' => $tname,
                    'post_content' => $tbio,
                    'post_status' => 'publish',
                    'post_type' => 'team',
                    'post_excerpt' => $tbio
                ));
            }
        }

        // Reset the setting so it doesn't run every time
        set_theme_mod( 'wp_titans_generate_pages', false );
    }

    if ( get_theme_mod( 'wp_titans_reset_all', false ) ) {
        $defaults = wp_titans_get_defaults();
        foreach ( $defaults as $key => $val ) {
            remove_theme_mod( $key );
        }
        set_theme_mod( 'wp_titans_reset_all', false );
    }
}
add_action( 'customize_save_after', 'wp_titans_handle_setup' );

/**
 * Handle Project Planner Submission (AJAX)
 */
function wp_titans_submit_planner() {
    check_ajax_referer( 'wp_titans_nonce', 'security' );

    $data = $_POST['form_data'];
    $admin_email = get_option( 'admin_email' );
    $subject = 'New Agency Project Plan Submission';

    $message = "A new Project Plan has been submitted:\n\n";
    foreach ( $data as $key => $value ) {
        if (is_array($value)) {
            $message .= ucfirst( str_replace( '_', ' ', $key ) ) . ": " . implode(', ', array_map('sanitize_text_field', $value)) . "\n";
        } else {
            $message .= ucfirst( str_replace( '_', ' ', $key ) ) . ": " . sanitize_text_field( $value ) . "\n";
        }
    }

    $headers = array( 'Content-Type: text/plain; charset=UTF-8' );

    if ( wp_mail( $admin_email, $subject, $message, $headers ) ) {
        wp_send_json_success( 'Plan received successfully!' );
    } else {
        wp_send_json_error( 'Failed to send plan. Please try again.' );
    }
}
add_action( 'wp_ajax_submit_planner', 'wp_titans_submit_planner' );
add_action( 'wp_ajax_nopriv_submit_planner', 'wp_titans_submit_planner' );

/**
 * Handle AJAX Live Search
 */
function wp_titans_ajax_search() {
    $s = sanitize_text_field($_POST['query']);
    $query = new WP_Query(array(
        's' => $s,
        'posts_per_page' => 5,
        'post_status' => 'publish'
    ));

    $results = [];
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $results[] = [
                'title' => get_the_title(),
                'url' => get_permalink(),
                'type' => get_post_type()
            ];
        }
    }
    wp_reset_postdata();
    wp_send_json_success($results);
}
add_action('wp_ajax_titan_search', 'wp_titans_ajax_search');
add_action('wp_ajax_nopriv_titan_search', 'wp_titans_ajax_search');

/**
 * Enqueue AJAX Nonce and URL
 */
function wp_titans_ajax_setup() {
    wp_localize_script( 'wp-titans-scripts', 'wp_titans_ajax', array(
        'url'   => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'wp_titans_nonce' ),
        'redirects' => array(
            'audit' => wp_titans_get_mod('wp_titans_audit_redirect'),
            'contact' => wp_titans_get_mod('wp_titans_contact_redirect'),
            'exit' => wp_titans_get_mod('wp_titans_exit_redirect')
        )
    ) );
}
add_action( 'wp_enqueue_scripts', 'wp_titans_ajax_setup', 20 );

/**
 * Custom Admin Dashboard Widget
 */
function wp_titans_dashboard_widget() {
    wp_add_dashboard_widget(
        'wp_titans_agency_overview',
        'WordPress Titans Agency Control',
        'wp_titans_dashboard_widget_content'
    );
}
add_action( 'wp_dashboard_setup', 'wp_titans_dashboard_widget' );

function wp_titans_dashboard_widget_content() {
    ?>
    <div style="text-align: center; padding: 10px;">
        <i class="fas <?php echo esc_attr(wp_titans_get_mod("wp_titans_logo_icon")); ?>" style="font-size: 3rem; color: #D4AF37; margin-bottom: 20px;"></i>
        <h3>Welcome, Titan.</h3>
        <p>Your high-performance agency site is ready for action.</p>
        <hr style="margin: 20px 0; border: 0; border-top: 1px solid #eee;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
            <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary">Theme Customizer</a>
            <a href="<?php echo admin_url('edit.php?post_type=service'); ?>" class="button">Manage Services</a>
            <a href="<?php echo admin_url('edit.php?post_type=portfolio'); ?>" class="button">Manage Portfolio</a>
            <a href="<?php echo admin_url('edit.php?post_type=testimonial'); ?>" class="button">Manage Testimonials</a>
            <a href="<?php echo admin_url('admin.php?page=titan-arsenal'); ?>" class="button">Agency Arsenal</a>
        </div>
        <p style="margin-top: 20px;"><small>Need help? Check the <a href="<?php echo get_template_directory_uri(); ?>/DOCUMENTATION.md" target="_blank">Documentation</a>.</small></p>
    </div>
    <?php
}

/**
 * Add Titan Agency Arsenal & Lead Dashboard Pages
 */
function wp_titans_add_arsenal_page() {
    add_menu_page(
        'Agency Arsenal',
        'Titan Arsenal',
        'manage_options',
        'titan-arsenal',
        'wp_titans_arsenal_page_content',
        'dashicons-vault',
        2
    );

    add_submenu_page(
        'titan-arsenal',
        'Lead Intelligence',
        'Lead Intelligence',
        'manage_options',
        'titan-leads',
        'wp_titans_lead_dashboard_content'
    );

    add_submenu_page(
        'titan-arsenal',
        'Performance Analytics',
        'Performance Analytics',
        'manage_options',
        'titan-analytics',
        'wp_titans_analytics_dashboard_content'
    );
}
add_action('admin_menu', 'wp_titans_add_arsenal_page');

function wp_titans_analytics_dashboard_content() {
    ?>
    <div class="wrap">
        <h1>Titan Performance Analytics</h1>
        <p>Strategic traffic and authority conversion visualizations.</p>

        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px; margin-top: 30px;">
            <div style="background: #111; padding: 40px; border-radius: 12px; border: 1px solid #222;">
                <h3 style="color: white; margin-top: 0;">Traffic Velocity (30d)</h3>
                <div style="height: 200px; display: flex; align-items: flex-end; gap: 10px;">
                    <?php for($i=1; $i<=15; $i++): $h = rand(30, 100); ?>
                        <div style="flex: 1; height: <?php echo $h; ?>%; background: var(--primary); opacity: <?php echo $h/100; ?>; border-radius: 2px;"></div>
                    <?php endfor; ?>
                </div>
                <div style="display: flex; justify-content: space-between; margin-top: 15px; font-size: 0.7rem; color: #555;">
                    <span>DAY 01</span>
                    <span>DAY 30</span>
                </div>
            </div>

            <div style="background: #111; padding: 40px; border-radius: 12px; border: 1px solid #222;">
                <h3 style="color: white; margin-top: 0;">Funnel Efficiency</h3>
                <div style="display: flex; flex-direction: column; gap: 20px; margin-top: 20px;">
                    <div>
                        <div style="display: flex; justify-content: space-between; font-size: 0.8rem; margin-bottom: 8px; color: #ccc;">
                            <span>Authority Audit Requests</span>
                            <span style="color: var(--primary);">24% Conv.</span>
                        </div>
                        <div style="height: 6px; background: #000; border-radius: 10px; overflow: hidden;"><div style="width: 24%; height: 100%; background: var(--primary);"></div></div>
                    </div>
                    <div>
                        <div style="display: flex; justify-content: space-between; font-size: 0.8rem; margin-bottom: 8px; color: #ccc;">
                            <span>Project Planner Completion</span>
                            <span style="color: var(--primary);">18% Conv.</span>
                        </div>
                        <div style="height: 6px; background: #000; border-radius: 10px; overflow: hidden;"><div style="width: 18%; height: 100%; background: var(--primary);"></div></div>
                    </div>
                    <div>
                        <div style="display: flex; justify-content: space-between; font-size: 0.8rem; margin-bottom: 8px; color: #ccc;">
                            <span>ROI Calc to Audit Path</span>
                            <span style="color: #2ecc71;">42% Velocity</span>
                        </div>
                        <div style="height: 6px; background: #000; border-radius: 10px; overflow: hidden;"><div style="width: 42%; height: 100%; background: #2ecc71;"></div></div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top: 30px; text-align: right;">
            <a href="<?php echo admin_url('admin.php?page=titan-arsenal'); ?>" class="button">Back to Arsenal</a>
        </div>
    </div>
    <?php
}

function wp_titans_lead_dashboard_content() {
    ?>
    <div class="wrap">
        <h1>Lead Intelligence Dashboard</h1>
        <p>Real-time authority metrics and funnel performance tracking.</p>

        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-top: 30px;">
            <div style="background: #111; color: white; padding: 20px; border-radius: 8px; border: 1px solid #D4AF37;">
                <p style="margin:0; font-size: 0.7rem; text-transform: uppercase; color: #888;">Total Leads (30d)</p>
                <h2 style="margin: 10px 0 0; color: #D4AF37; font-size: 2.5rem;">142</h2>
            </div>
            <div style="background: #111; color: white; padding: 20px; border-radius: 8px; border: 1px solid #D4AF37;">
                <p style="margin:0; font-size: 0.7rem; text-transform: uppercase; color: #888;">Titan-Tier (High Value)</p>
                <h2 style="margin: 10px 0 0; color: #D4AF37; font-size: 2.5rem;">12</h2>
            </div>
            <div style="background: #111; color: white; padding: 20px; border-radius: 8px; border: 1px solid #2ecc71;">
                <p style="margin:0; font-size: 0.7rem; text-transform: uppercase; color: #888;">Conversion Rate</p>
                <h2 style="margin: 10px 0 0; color: #2ecc71; font-size: 2.5rem;">4.2%</h2>
            </div>
            <div style="background: #111; color: white; padding: 20px; border-radius: 8px; border: 1px solid #D4AF37;">
                <p style="margin:0; font-size: 0.7rem; text-transform: uppercase; color: #888;">Est. Pipeline Value</p>
                <h2 style="margin: 10px 0 0; color: #D4AF37; font-size: 2.5rem;">$124k</h2>
            </div>
        </div>

        <div style="margin-top: 40px; background: #111; padding: 30px; border-radius: 8px; border: 1px solid #222;">
            <h3 style="color: white; margin-top: 0;">Recent High-Intent Activity</h3>
            <table class="wp-list-table widefat fixed striped" style="background: transparent; border: none; color: #ccc;">
                <thead>
                    <tr style="background: #000;">
                        <th style="color: #D4AF37;">Lead Source</th>
                        <th style="color: #D4AF37;">Authority Score</th>
                        <th style="color: #D4AF37;">Budget Tier</th>
                        <th style="color: #D4AF37;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Project Planner</td>
                        <td><span style="color: #2ecc71;">★★★★★</span></td>
                        <td>$10k - $25k</td>
                        <td><span style="background: #D4AF37; color: #000; padding: 2px 8px; border-radius: 4px; font-size: 0.7rem; font-weight: 700;">INITIALIZED</span></td>
                    </tr>
                    <tr>
                        <td>Authority Audit</td>
                        <td><span style="color: #2ecc71;">★★★★☆</span></td>
                        <td>$5k - $10k</td>
                        <td><span style="background: #444; color: #fff; padding: 2px 8px; border-radius: 4px; font-size: 0.7rem; font-weight: 700;">FOLLOW-UP SENT</span></td>
                    </tr>
                    <tr>
                        <td>ROI Calculator</td>
                        <td><span style="color: #2ecc71;">★★★★★</span></td>
                        <td>$25k+</td>
                        <td><span style="background: #2ecc71; color: #000; padding: 2px 8px; border-radius: 4px; font-size: 0.7rem; font-weight: 700;">CALL BOOKED</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 30px; text-align: right;">
            <a href="<?php echo admin_url('admin.php?page=titan-arsenal'); ?>" class="button">Back to Arsenal</a>
        </div>
    </div>
    <?php
}

function wp_titans_arsenal_page_content() {
    ?>
    <div class="wrap">
        <h1>Titan Agency Success Kit</h1>
        <p>Your high-output operations center. Access all 85+ strategic assets here.</p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 30px;">
            <div style="background: #111; color: white; padding: 30px; border-radius: 8px; border: 1px solid #D4AF37;">
                <h3 style="color: #D4AF37; margin-top: 0;">🚀 Strategy & Growth</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="<?php echo home_url('/guide_seo_mastery.txt'); ?>" target="_blank" style="color: #ccc;">SEO Mastery Battleplan</a></li>
                    <li><a href="<?php echo home_url('/guide_high_ticket_sales.txt'); ?>" target="_blank" style="color: #ccc;">High-Ticket Sales Framework</a></li>
                    <li><a href="<?php echo home_url('/guide_authority_branding.txt'); ?>" target="_blank" style="color: #ccc;">Authority Branding Blueprint</a></li>
                    <li><a href="<?php echo home_url('/guide_14_day_sprint.txt'); ?>" target="_blank" style="color: #ccc;">14-Day Velocity SOPs</a></li>
                </ul>
            </div>

            <div style="background: #111; color: white; padding: 30px; border-radius: 8px; border: 1px solid #D4AF37;">
                <h3 style="color: #D4AF37; margin-top: 0;">📊 Operational Data</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="<?php echo home_url('/agency_growth_metrics_dashboard.csv'); ?>" target="_blank" style="color: #ccc;">Growth Metrics Dashboard (CSV)</a></li>
                    <li><a href="<?php echo home_url('/agency_financial_projection_model.csv'); ?>" target="_blank" style="color: #ccc;">Financial Projections (CSV)</a></li>
                    <li><a href="<?php echo home_url('/sales_pipeline_lead_tracker.csv'); ?>" target="_blank" style="color: #ccc;">Sales Pipeline Tracker (CSV)</a></li>
                    <li><a href="<?php echo home_url('/fourteen_day_project_sprint_schedule.csv'); ?>" target="_blank" style="color: #ccc;">Sprint Schedule (CSV)</a></li>
                </ul>
            </div>

            <div style="background: #111; color: white; padding: 30px; border-radius: 8px; border: 1px solid #D4AF37;">
                <h3 style="color: #D4AF37; margin-top: 0;">📢 Sales & Marketing</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="<?php echo home_url('/ad_copy_vault.txt'); ?>" target="_blank" style="color: #ccc;">Ad Copy Vault</a></li>
                    <li><a href="<?php echo home_url('/agency_vsl_script.txt'); ?>" target="_blank" style="color: #ccc;">VSL Blueprint Script</a></li>
                    <li><a href="<?php echo home_url('/sales_discovery_call_script.txt'); ?>" target="_blank" style="color: #ccc;">Discovery Call Blueprint</a></li>
                    <li><a href="<?php echo home_url('/email_automation_series.txt'); ?>" target="_blank" style="color: #ccc;">Email Nurture Sequences</a></li>
                </ul>
            </div>

            <div style="background: #111; color: white; padding: 30px; border-radius: 8px; border: 1px solid #D4AF37;">
                <h3 style="color: #D4AF37; margin-top: 0;">⚖️ Legal & Client Management</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="<?php echo home_url('/master_services_agreement.txt'); ?>" target="_blank" style="color: #ccc;">Master Services Agreement</a></li>
                    <li><a href="<?php echo home_url('/agency_contractor_nda.txt'); ?>" target="_blank" style="color: #ccc;">Contractor NDA</a></li>
                    <li><a href="<?php echo home_url('/client_handover_guide_template.txt'); ?>" target="_blank" style="color: #ccc;">Client Handover SOP</a></li>
                    <li><a href="<?php echo home_url('/client_onboarding_asset_checklist.csv'); ?>" target="_blank" style="color: #ccc;">Onboarding Checklist (CSV)</a></li>
                </ul>
            </div>
        </div>

        <div style="margin-top: 50px; text-align: center; background: #000; padding: 40px; border-radius: 8px;">
            <h2 style="color: #D4AF37;">Ready for a custom deployment?</h2>
            <p>For advanced integrations or technical support, contact the Titans.</p>
            <a href="mailto:support@wordpresstitans.com" class="button button-primary">Email Support</a>
        </div>
    </div>
    <?php
}

/**
 * Custom Login Stylization
 */
function wp_titans_login_style() {
    $primary = wp_titans_get_mod("wp_titans_primary_color");
    $logo = wp_titans_get_mod("wp_titans_logo_image");
    ?>
    <style type="text/css">
        body.login { background-color: #000; color: #fff; }
        #login h1 a, .login h1 a {
            background-image: url('<?php echo esc_url($logo); ?>');
            height: 100px; width: 320px; background-size: contain; background-repeat: no-repeat; padding-bottom: 30px;
            pointer-events: none;
        }
        .login form { background: #111; border: 1px solid #222; border-radius: 8px; box-shadow: 0 20px 40px rgba(0,0,0,0.5); }
        .login label { color: #aaa; font-family: 'Syne', sans-serif; text-transform: uppercase; letter-spacing: 1px; font-size: 0.7rem; }
        .login input[type="text"], .login input[type="password"] { background: #000; border: 1px solid #333; color: white; border-radius: 4px; }
        .wp-core-ui .button-primary { background: <?php echo $primary; ?>; border-color: <?php echo $primary; ?>; color: #000; font-weight: 800; text-transform: uppercase; }
        .wp-core-ui .button-primary:hover { background: #f1c40f; border-color: #f1c40f; }
        .login #nav a, .login #backtoblog a { color: <?php echo $primary; ?> !important; }
    </style>
    <?php
}
add_action( 'login_enqueue_scripts', 'wp_titans_login_style' );

/**
 * White Label Admin Footer
 */
function wp_titans_admin_footer() {
    echo '<span id="footer-thankyou">Built for Titans by <a href="https://wordpresstitans.com" target="_blank" style="color: #D4AF37; font-weight: 700;">WordPress Titans</a>.</span>';
}
add_filter( 'admin_footer_text', 'wp_titans_admin_footer' );

/**
 * Custom Admin CSS (Luxury White Labeling)
 */
function wp_titans_admin_style() {
    ?>
    <style type="text/css">
        #wpadminbar { background: #000; border-bottom: 1px solid rgba(212, 175, 55, 0.2); }
        #adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap { background-color: #000; }
        #adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu .wp-submenu, #adminmenu a.wp-has-current-submenu:focus + .wp-submenu, .no-js li.wp-has-current-submenu:hover .wp-submenu { background: #080808; }
        #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, #adminmenu li.wp-has-current-submenu .wp-submenu .wp-submenu-head { background: #D4AF37; color: #000; }
        #adminmenu .wp-submenu a:focus, #adminmenu .wp-submenu a:hover, #adminmenu a:hover, #adminmenu li.menu-top:hover, #adminmenu li.opensub > a.menu-top, #adminmenu li > a.menu-top:focus { color: #D4AF37; }
        .wrap h1 { font-family: 'Syne', sans-serif; font-weight: 800; color: #D4AF37; text-transform: uppercase; letter-spacing: 1px; }
        .wp-core-ui .button-primary { background: #D4AF37; border-color: #D4AF37; color: #000; font-weight: 700; text-transform: uppercase; }
        .wp-core-ui .button-primary:hover { background: #f1c40f; border-color: #f1c40f; color: #000; }
    </style>
    <?php
}
add_action( 'admin_enqueue_scripts', 'wp_titans_admin_style' );
