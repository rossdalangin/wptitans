    <footer>
        <div>
            <div class="footer-logo">
                <?php
                $logo_img = get_theme_mod('wp_titans_logo_image');
                $logo_icon = get_theme_mod('wp_titans_logo_icon', 'fa-crown');
                $logo_text = get_theme_mod('wp_titans_logo_text', 'TITANS');

                if ( $logo_img ) : ?>
                    <img src="<?php echo esc_url($logo_img); ?>" alt="<?php echo esc_attr($logo_text); ?>" style="height: 40px; width: auto;">
                <?php else : ?>
                    <i class="fas <?php echo esc_attr($logo_icon); ?>"></i> <?php echo esc_html($logo_text); ?>
                <?php endif; ?>
            </div>
            <p style="margin-top: 1.5rem; font-size: 0.9rem; color: #888;">
                <?php echo esc_html(get_theme_mod('wp_titans_footer_desc', 'We help serious businesses turn their website into a revenue-generating asset — not just an online brochure.')); ?>
            </p>
        </div>
        <div class="footer-links">
            <h4>Services</h4>
            <ul>
                <li><a href="#services">Authority System</a></li>
                <li><a href="#services">Copywriting</a></li>
                <li><a href="#services">Development</a></li>
                <li><a href="#services">SEO</a></li>
            </ul>
        </div>
        <div class="footer-links">
            <h4>Company</h4>
            <ul>
                <li><a href="#about">Our Story</a></li>
                <li><a href="#process">The Process</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="footer-links">
            <h4>Connect</h4>
            <div style="display: flex; gap: 1.2rem; font-size: 1.4rem; margin-top: 0.5rem;">
                <?php
                $socials = ['facebook', 'linkedin', 'twitter', 'instagram'];
                foreach ($socials as $social) :
                    $url = get_theme_mod("wp_titans_social_$social");
                    if ($url && $url !== '#') : ?>
                        <a href="<?php echo esc_url($url); ?>" class="social-link"><i class="fab fa-<?php echo esc_attr($social); ?>"></i></a>
                    <?php endif;
                endforeach;
                ?>
            </div>
        </div>
    </footer>

    <div style="text-align: center; padding: 2rem; border-top: 1px solid #111; font-size: 0.8rem; color: #555; background: #000;">
        &copy; <?php echo date('Y'); ?> <?php echo esc_html(get_theme_mod('wp_titans_logo_text', 'TITANS')); ?>. All rights reserved.
    </div>

    <?php wp_footer(); ?>
</body>
</html>
