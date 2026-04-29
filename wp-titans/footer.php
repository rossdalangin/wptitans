    <footer>
        <div>
            <div class="footer-logo">
                <?php
                $logo_img = wp_titans_get_mod("wp_titans_logo_image");
                $logo_icon = wp_titans_get_mod("wp_titans_logo_icon");
                $logo_text = wp_titans_get_mod("wp_titans_logo_text");

                if ( $logo_img ) : ?>
                    <img src="<?php echo esc_url($logo_img); ?>" alt="<?php echo esc_attr($logo_text); ?>" style="height: 40px; width: auto;">
                <?php else : ?>
                    <i class="fas <?php echo esc_attr($logo_icon); ?>"></i> <?php echo esc_html($logo_text); ?>
                <?php endif; ?>
            </div>
            <p style="margin-top: 1.5rem; font-size: 0.9rem; color: #888;">
                <?php echo esc_html(wp_titans_get_mod("wp_titans_footer_desc")); ?>
            </p>
        </div>
        <div class="footer-links">
            <h4>Services</h4>
            <?php
            if ( has_nav_menu( 'footer-1' ) ) {
                wp_nav_menu( array( 'theme_location' => 'footer-1', 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) );
            } else {
                echo '<ul>
                    <li><a href="#services">Authority System</a></li>
                    <li><a href="#services">Copywriting</a></li>
                    <li><a href="#services">Development</a></li>
                    <li><a href="#services">SEO</a></li>
                </ul>';
            }
            ?>
        </div>
        <div class="footer-links">
            <h4>Company</h4>
            <?php
            if ( has_nav_menu( 'footer-2' ) ) {
                wp_nav_menu( array( 'theme_location' => 'footer-2', 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) );
            } else {
                echo '<ul>
                    <li><a href="#about">Our Story</a></li>
                    <li><a href="#process">The Process</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>';
            }
            ?>
        </div>
        <div class="footer-links">
            <h4>Connect</h4>
            <div style="display: flex; gap: 1.2rem; font-size: 1.4rem; margin-top: 0.5rem;">
                <?php
                $socials = ['facebook', 'linkedin', 'twitter', 'instagram'];
                foreach ($socials as $social) :
                    $url = wp_titans_get_mod("wp_titans_social_$social");
                    if ($url && $url !== '#') : ?>
                        <a href="<?php echo esc_url($url); ?>" class="social-link"><i class="fab fa-<?php echo esc_attr($social); ?>"></i></a>
                    <?php endif;
                endforeach;
                ?>
            </div>
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

    <?php if (wp_titans_get_mod("wp_titans_mobile_cta")) : ?>
    <div id="mobile-cta-bar" style="position: fixed; bottom: 0; left: 0; width: 100%; background: #111; border-top: 1px solid var(--primary); padding: 1rem 5%; z-index: 1500; display: none;">
        <a href="<?php echo esc_url(wp_titans_get_mod("wp_titans_hero_btn2_url")); ?>" class="btn btn-primary" style="width: 100%; padding: 1rem;"><?php echo esc_html(wp_titans_get_mod("wp_titans_hero_btn2_text")); ?></a>
    </div>
    <?php endif; ?>

    <?php echo wp_titans_get_mod("wp_titans_footer_scripts"); ?>
    <?php wp_footer(); ?>
</body>
</html>
