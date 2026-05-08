    <?php if (wp_titans_get_mod("wp_titans_gcta_show")) :
        // Only show if not Front Page (it has the Contact section)
        if (!is_front_page()) :
    ?>
        <section id="global-cta" style="background: #080808; text-align: center; border-top: 1px solid var(--border-glass);">
            <div class="reveal">
                <h2 style="margin-bottom: 2.5rem;"><?php echo esc_html(wp_titans_get_mod("wp_titans_gcta_title")); ?></h2>
                <a href="<?php echo esc_url(wp_titans_get_mod("wp_titans_gcta_btn_url")); ?>" class="btn btn-primary"><?php echo esc_html(wp_titans_get_mod("wp_titans_gcta_btn_text")); ?></a>
            </div>
        </section>
    <?php endif; endif; ?>

    <section id="footer-top" style="background: #000; padding: 4rem 10% 0; border-top: 1px solid var(--border-glass);">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 2rem;">
            <div class="footer-logo">
                <?php
                $logo_img = wp_titans_get_mod("wp_titans_logo_image");
                $logo_icon = wp_titans_get_mod("wp_titans_logo_icon");
                $logo_text = wp_titans_get_mod("wp_titans_logo_text");

                if ( $logo_img ) : ?>
                    <img loading="lazy" src="<?php echo esc_url($logo_img); ?>" alt="<?php echo esc_attr($logo_text); ?>" style="height: 40px; width: auto;">
                <?php else : ?>
                    <i class="fas <?php echo esc_attr($logo_icon); ?>"></i> <?php echo esc_html($logo_text); ?>
                <?php endif; ?>
            </div>
            <div style="display: flex; gap: 1.2rem; font-size: 1.4rem;">
                <?php
                $socials = ['facebook', 'linkedin', 'twitter', 'instagram'];
                foreach ($socials as $social) :
                    $url = wp_titans_get_mod("wp_titans_social_$social");
                    if ($url && $url !== '#') : ?>
                        <a href="<?php echo esc_url($url); ?>" class="social-link" style="color: #444;"><i class="fab fa-<?php echo esc_attr($social); ?>"></i></a>
                    <?php endif;
                endforeach;
                ?>
            </div>
        </div>
    </section>

    <footer>
        <div style="max-width: 300px;">
            <p style="font-size: 0.9rem; color: #888; line-height: 1.6;">
                <?php echo esc_html(wp_titans_get_mod("wp_titans_footer_desc")); ?>
            </p>
        </div>
        <div class="footer-links">
            <h4>Our Arsenal</h4>
            <?php
            if ( has_nav_menu( 'footer-1' ) ) {
                wp_nav_menu( array( 'theme_location' => 'footer-1', 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) );
            } else {
                echo '<ul><li><a href="#services">The Arsenal</a></li></ul>';
            }
            ?>
        </div>
        <div class="footer-links">
            <h4>Transformation</h4>
            <?php
            if ( has_nav_menu( 'footer-2' ) ) {
                wp_nav_menu( array( 'theme_location' => 'footer-2', 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) );
            } else {
                echo '<ul><li><a href="#process">The Sprint</a></li></ul>';
            }
            ?>
        </div>
        <div class="footer-links">
            <h4>Agency</h4>
            <?php
            if ( has_nav_menu( 'footer-3' ) ) {
                wp_nav_menu( array( 'theme_location' => 'footer-3', 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) );
            } else {
                echo '<ul><li><a href="#about">Our Story</a></li></ul>';
            }
            ?>
        </div>
        <div class="footer-links">
            <h4>Control</h4>
            <?php
            if ( has_nav_menu( 'footer-4' ) ) {
                wp_nav_menu( array( 'theme_location' => 'footer-4', 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) );
            } else {
                echo '<ul><li><a href="#">Client Portal</a></li></ul>';
            }
            ?>
        </div>
        <div class="footer-links">
            <h4>Legal</h4>
            <?php
            if ( has_nav_menu( 'footer-5' ) ) {
                wp_nav_menu( array( 'theme_location' => 'footer-5', 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) );
            } else {
                echo '<ul><li><a href="#">Privacy Protocols</a></li></ul>';
            }
            ?>
        </div>
    </footer>

    <div style="text-align: center; padding: 2rem; border-top: 1px solid #111; font-size: 0.8rem; color: #555; background: #000;">
        &copy; <?php echo date('Y'); ?> <?php echo esc_html(wp_titans_get_mod("wp_titans_logo_text")); ?>. All rights reserved.
    </div>

    <?php if (wp_titans_get_mod("wp_titans_back_to_top")) : ?>
    <a href="#" id="back-to-top" style="position: fixed; bottom: 30px; right: 30px; background: var(--primary); color: black; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; z-index: 999; opacity: 0; transition: var(--transition); visibility: hidden;">
        <i class="fas fa-chevron-up"></i>
    </a>
    <?php endif; ?>

    <?php if (wp_titans_get_mod("wp_titans_fab_show")) : ?>
    <div id="fab-container" style="position: fixed; bottom: 100px; right: 30px; z-index: 1000; display: flex; flex-direction: column; align-items: center; gap: 1rem;">
        <div id="fab-label" style="background: var(--primary); color: black; padding: 0.5rem 1rem; border-radius: 4px; font-size: 0.7rem; font-weight: 800; font-family: 'Syne'; text-transform: uppercase; letter-spacing: 1px; opacity: 0; transform: translateX(20px); transition: var(--transition); pointer-events: none;">
            <?php echo esc_html(wp_titans_get_mod("wp_titans_fab_text")); ?>
        </div>
        <a href="<?php echo esc_url(wp_titans_get_mod("wp_titans_fab_url")); ?>" id="fab-button" style="background: #000; color: var(--primary); width: 60px; height: 60px; border-radius: 50%; border: 2px solid var(--primary); display: flex; align-items: center; justify-content: center; font-size: 1.4rem; box-shadow: 0 10px 30px rgba(0,0,0,0.5); transition: var(--transition);">
            <i class="fas <?php echo esc_attr(wp_titans_get_mod("wp_titans_fab_icon")); ?>"></i>
        </a>
    </div>
    <style>
        #fab-container:hover #fab-label { opacity: 1; transform: translateX(0); }
        #fab-button:hover { background: var(--primary); color: black; transform: scale(1.1) rotate(5deg); }
    </style>
    <?php endif; ?>

    <?php if (wp_titans_get_mod("wp_titans_mobile_cta")) : ?>
    <div id="mobile-cta-bar" style="position: fixed; bottom: 0; left: 0; width: 100%; background: #111; border-top: 1px solid var(--primary); padding: 1rem 5%; z-index: 1500; display: none;">
        <a href="<?php echo esc_url(wp_titans_get_mod("wp_titans_hero_btn2_url")); ?>" class="btn btn-primary" style="width: 100%; padding: 1rem;"><?php echo esc_html(wp_titans_get_mod("wp_titans_hero_btn2_text")); ?></a>
    </div>
    <?php endif; ?>

    <!-- FAQ Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        <?php
        $faqs = [];
        for ($i = 1; $i <= 4; $i++) {
            $q = wp_titans_get_mod("wp_titans_faq_q_$i");
            $a = wp_titans_get_mod("wp_titans_faq_a_$i");
            if ($q && $a) {
                $faqs[] = '{
                  "@type": "Question",
                  "name": "'.esc_js($q).'",
                  "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "'.esc_js($a).'"
                  }
                }';
            }
        }
        echo implode(',', $faqs);
        ?>
      ]
    }
    </script>

    <?php if (wp_titans_get_mod("wp_titans_show_auth_notif")) : ?>
    <div id="auth-notification" style="position: fixed; bottom: 30px; left: 30px; background: #111; border: 1px solid var(--primary); padding: 1.5rem 2rem; border-radius: 8px; z-index: 998; display: flex; align-items: center; gap: 1.5rem; transform: translateY(200%); transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1); box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
        <div style="background: var(--primary); color: black; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
            <i class="fas fa-check"></i>
        </div>
        <div>
            <p id="notif-text" style="margin: 0; font-size: 0.85rem; font-weight: 700; color: white;">New Project Completed</p>
            <small id="notif-sub" style="color: var(--text-dim); font-size: 0.75rem;">Authority System Launch</small>
        </div>
        <div id="notif-close" style="cursor: pointer; color: #444; font-size: 1.2rem; margin-left: 1rem;">&times;</div>
    </div>
    <?php endif; ?>

    <?php if (wp_titans_get_mod("wp_titans_exit_intent_show")) : ?>
    <div id="exit-modal" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.9); z-index: 9999; display: none; align-items: center; justify-content: center; padding: 2rem;">
        <div style="background: #111; max-width: 600px; padding: 4rem; border-radius: 12px; border: 2px solid var(--primary); text-align: center; position: relative;">
            <div id="exit-close" style="position: absolute; top: 1rem; right: 1.5rem; cursor: pointer; font-size: 1.5rem; color: #444;">&times;</div>
            <i class="fas fa-rocket" style="font-size: 3rem; color: var(--primary); margin-bottom: 2rem;"></i>
            <h2 style="font-size: 2rem; margin-bottom: 1.5rem;"><?php echo wp_kses_post(wp_titans_get_mod("wp_titans_exit_title")); ?></h2>
            <p style="color: var(--text-dim); margin-bottom: 3rem;"><?php echo wp_kses_post(wp_titans_get_mod("wp_titans_exit_desc")); ?></p>
            <?php
            $exit_cf7 = wp_titans_get_mod("wp_titans_exit_cf7_shortcode");
            $exit_action = wp_titans_get_mod("wp_titans_exit_form_action");
            $exit_method = wp_titans_get_mod("wp_titans_exit_form_method");

            if ($exit_cf7) :
                echo do_shortcode($exit_cf7);
            else : ?>
            <form action="<?php echo esc_url($exit_action); ?>" method="<?php echo esc_attr($exit_method); ?>" id="exit-intent-form" style="display: flex; flex-direction: column; gap: 1rem;">
                <input type="email" name="titan_lead_email" placeholder="Enter your email" required style="padding: 1.2rem; background: #000; border: 1px solid #333; color: white; border-radius: 4px;">
                <button type="submit" class="btn btn-primary">Get the Checklist</button>
            </form>
            <?php endif; ?>
            <?php if (wp_titans_get_mod("wp_titans_downsell_show")) : ?>
                <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #222;">
                    <a href="<?php echo esc_url(wp_titans_get_mod("wp_titans_downsell_url")); ?>" style="font-size: 0.85rem; color: var(--primary); font-family: 'Syne'; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; text-decoration: none;">
                        <?php echo esc_html(wp_titans_get_mod("wp_titans_downsell_text")); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if (wp_titans_get_mod('wp_titans_cookie_consent')) : ?>
    <div id="cookie-banner" style="position: fixed; bottom: 30px; left: 50%; transform: translateX(-50%) translateY(200%); background: #111; border: 1px solid var(--border-glass); padding: 1.5rem 3rem; border-radius: 50px; display: flex; align-items: center; gap: 2rem; z-index: 9999; box-shadow: 0 20px 50px rgba(0,0,0,0.5); transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
        <p style="margin: 0; font-size: 0.85rem; color: #888; white-space: nowrap;"><?php echo esc_html(wp_titans_get_mod('wp_titans_cookie_text')); ?></p>
        <button id="accept-cookies" class="btn btn-primary" style="padding: 0.6rem 1.5rem; font-size: 0.75rem;">Accept Protocols</button>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        if (!localStorage.getItem('titan_cookies')) {
            const banner = document.getElementById('cookie-banner');
            setTimeout(() => banner.style.transform = 'translateX(-50%) translateY(0)', 2000);
            document.getElementById('accept-cookies').addEventListener('click', () => {
                banner.style.transform = 'translateX(-50%) translateY(200%)';
                localStorage.setItem('titan_cookies', 'true');
            });
        }
    });
    </script>
    <?php endif; ?>

    <?php echo wp_titans_get_mod("wp_titans_footer_scripts"); ?>
    <?php wp_footer(); ?>
</body>
</html>
