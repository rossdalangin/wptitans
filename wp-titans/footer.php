    <footer>
        <div>
            <div class="footer-logo"><i class="fas <?php echo esc_attr(get_theme_mod('wp_titans_logo_icon', 'fa-bolt')); ?>"></i> <?php echo esc_html(get_theme_mod('wp_titans_logo_text', 'TITANS')); ?></div>
            <p style="margin-top: 1rem;"><?php echo esc_html(get_theme_mod('wp_titans_footer_desc', 'Architecting the digital excellence of tomorrow. Creative, efficient, and unbeatable.')); ?></p>
        </div>
        <div>
            <h4>Operations</h4>
            <ul class="footer-links">
                <li><a href="#">Strategy</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Development</a></li>
                <li><a href="#">Marketing</a></li>
            </ul>
        </div>
        <div>
            <h4>Company</h4>
            <ul class="footer-links">
                <li><a href="#">Our Story</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Legal</a></li>
                <li><a href="#">Privacy</a></li>
            </ul>
        </div>
        <div>
            <h4>Connect</h4>
            <div style="display: flex; gap: 1rem; font-size: 1.5rem;">
                <?php
                $socials = ['github', 'linkedin', 'twitter'];
                foreach ($socials as $social) :
                    $url = get_theme_mod("wp_titans_social_$social");
                    if ($url) : ?>
                        <a href="<?php echo esc_url($url); ?>"><i class="fab fa-<?php echo esc_attr($social); ?>"></i></a>
                    <?php endif;
                endforeach;
                ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
