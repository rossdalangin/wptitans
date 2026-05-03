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

        add_image_size( 'titan-portfolio', 800, 500, true );
        add_image_size( 'titan-team', 400, 500, true );
        add_image_size( 'titan-testimonial', 150, 150, true );
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
            'Legal: Privacy Protocols' => array('template' => 'page-legal.php', 'content' => '## Data Protection Strategy\nYour data is secure under our elite encryption protocols.'),
            'Legal: Engagement Terms' => array('template' => 'page-legal.php', 'content' => '## Service Agreement\nStandard operational terms for Titan engagements.'),
            'Authority Blueprint' => array('template' => 'page-blueprint.php'),
            'Join the Arsenal' => array('template' => 'page-careers.php'),
            'Web Design Strategy' => array('template' => 'page-service-single.php', 'content' => 'Building world-class systems...'),
            'Conversion Case Study' => array('template' => 'page-case-study.php'),
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
            $menu_items = array('Home', 'Our Arsenal', 'The 14-Day Sprint', 'Portfolio', 'The Titan Legacy', 'Initiate Connection', 'Book a Strategy Call');
            foreach ( $menu_items as $title ) {
                if (isset($created_page_ids[$title])) {
                    wp_update_nav_menu_item( $menu_id, 0, array(
                        'menu-item-title'     => $title,
                        'menu-item-object'    => 'page',
                        'menu-item-object-id' => $created_page_ids[$title],
                        'menu-item-type'      => 'post_type',
                        'menu-item-status'    => 'publish',
                    ) );
                }
            }
            $locations = get_theme_mod( 'nav_menu_locations' );
            $locations['menu-1'] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }

        // Generate Elite Services
        $sample_services = array(
            'Authority Website System™' => 'The definitive rebrand for established experts. We weaponize your knowledge into a high-performance conversion engine in 14 days.',
            'Elite Copywriting' => 'Conversion-first messaging that connects emotionally and closes logically. We speak your ideal client’s language.',
            'Performance Optimization' => 'Sub-2 second load times guaranteed. We build on a clean, scalable WordPress architecture for market dominance.',
            'SEO Mastery' => 'Dominate the first page. We optimize for the keywords that actually drive high-ticket revenue, not just vanity traffic.',
            'Lead Gen Funnels' => 'Automated client acquisition systems. We build the filters that identify and secure your most valuable prospects.',
            'Titan Maintenance' => '24/7 security, speed monitoring, and strategic support to ensure your authority never wavers.'
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
        'nonce' => wp_create_nonce( 'wp_titans_nonce' )
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
            <a href="<?php echo admin_url('customize.php?autofocus[section]=wp_titans_setup'); ?>" class="button">One-Click Setup</a>
        </div>
        <p style="margin-top: 20px;"><small>Need help? Check the <a href="<?php echo get_template_directory_uri(); ?>/DOCUMENTATION.md" target="_blank">Documentation</a>.</small></p>
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
