<?php
/**
 * Template Name: Authority Landing Page
 */
get_header(); ?>

<section id="authority-hero" class="hero" style="min-height: 80vh; text-align: left; padding-top: 15rem;">
    <div class="reveal">
        <span class="tagline">The Flagship Solution</span>
        <h1 style="font-size: 5.5rem; line-height: 1;"><?php echo esc_html(wp_titans_get_mod("wp_titans_auth_title")); ?></h1>
        <p style="font-size: 1.5rem; max-width: 800px; margin-top: 2rem;"><?php echo esc_html(wp_titans_get_mod("wp_titans_auth_subtitle")); ?></p>
        <div class="hero-btns" style="justify-content: flex-start; margin-top: 3rem;">
            <a href="<?php echo esc_url(wp_titans_get_mod("wp_titans_contact_btn_url")); ?>" class="btn btn-primary"><?php echo esc_html(wp_titans_get_mod("wp_titans_contact_btn_text")); ?></a>
            <a href="#features" class="btn btn-outline">See What's Included</a>
        </div>
    </div>
</section>

<section id="system-comparison" style="background: #000; border-bottom: 1px solid var(--border-glass);">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <span class="tagline">The Difference</span>
        <h2><?php echo esc_html(wp_titans_get_mod("wp_titans_auth_comp_title", "System vs. Standard")); ?></h2>
    </div>
    <div class="reveal" style="max-width: 1000px; margin: 0 auto; overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left; background: #050505; border-radius: 8px; border: 1px solid var(--border-glass);">
            <thead>
                <tr style="border-bottom: 2px solid var(--primary);">
                    <th style="padding: 2rem; font-family: 'Syne'; font-size: 1.2rem;">Feature</th>
                    <th style="padding: 2rem; font-family: 'Syne'; font-size: 1.2rem; color: var(--primary);">Titans System™</th>
                    <th style="padding: 2rem; font-family: 'Syne'; font-size: 1.2rem; opacity: 0.5;">Standard Agency</th>
                </tr>
            </thead>
            <tbody style="color: var(--text-dim);">
                <?php
                $has_custom_comp = false;
                for ($i=1; $i<=5; $i++) {
                    if (wp_titans_get_mod("wp_titans_auth_comp_feat_$i")) {
                        $has_custom_comp = true;
                        ?>
                        <tr style="border-bottom: 1px solid #111;">
                            <td style="padding: 1.5rem 2rem; font-weight: 700; color: white;"><?php echo esc_html(wp_titans_get_mod("wp_titans_auth_comp_feat_$i")); ?></td>
                            <td style="padding: 1.5rem 2rem; color: var(--primary); font-weight: 700;"><i class="fas fa-check-circle"></i> <?php echo esc_html(wp_titans_get_mod("wp_titans_auth_comp_titan_$i")); ?></td>
                            <td style="padding: 1.5rem 2rem; opacity: 0.5;"><i class="fas fa-times-circle"></i> <?php echo esc_html(wp_titans_get_mod("wp_titans_auth_comp_std_$i")); ?></td>
                        </tr>
                        <?php
                    }
                }
                if (!$has_custom_comp) :
                    $comparisons = [
                        ['f' => 'Launch Speed', 's' => 'Elite 14-Day Delivery', 'o' => '2-4 Months Average'],
                        ['f' => 'Lead Gen Logic', 's' => 'Multi-Step Conversion Funnels', 'o' => 'Simple Contact Form'],
                        ['f' => 'Performance', 's' => '90+ Core Web Vitals', 'o' => 'Plugin-Heavy & Slow'],
                        ['f' => 'Positioning', 's' => 'Authority-First Strategy', 'o' => 'Generic "Portfolio" Look'],
                        ['f' => 'Management', 's' => '100% No-Code Admin', 'o' => 'Hard-coded / Complex'],
                    ];
                    foreach ($comparisons as $row) : ?>
                        <tr style="border-bottom: 1px solid #111;">
                            <td style="padding: 1.5rem 2rem; font-weight: 700; color: white;"><?php echo $row['f']; ?></td>
                            <td style="padding: 1.5rem 2rem; color: var(--primary); font-weight: 700;"><i class="fas fa-check-circle"></i> <?php echo $row['s']; ?></td>
                            <td style="padding: 1.5rem 2rem; opacity: 0.5;"><i class="fas fa-times-circle"></i> <?php echo $row['o']; ?></td>
                        </tr>
                    <?php endforeach;
                endif; ?>
            </tbody>
        </table>
    </div>
</section>

<section id="ideal-client" style="background: #050505;">
    <div class="grid-2">
        <div class="reveal">
            <h2 style="color: #2ecc71; margin-bottom: 2rem;"><i class="fas fa-check-circle"></i> This is for you if...</h2>
            <ul style="font-size: 1.1rem; color: var(--text-dim); line-height: 2.2;">
                <?php
                $for_who = wp_titans_get_mod("wp_titans_auth_for_who");
                $for_arr = explode("\n", $for_who);
                foreach($for_arr as $item) {
                    if(trim($item)) echo '<li><i class="fas fa-plus" style="font-size:0.7rem; color:#2ecc71; margin-right:10px;"></i> ' . esc_html(trim($item)) . '</li>';
                }
                ?>
            </ul>
        </div>
        <div class="reveal">
            <h2 style="color: #e74c3c; margin-bottom: 2rem;"><i class="fas fa-times-circle"></i> This is NOT for you if...</h2>
            <ul style="font-size: 1.1rem; color: var(--text-dim); line-height: 2.2;">
                <?php
                $not_for_who = wp_titans_get_mod("wp_titans_auth_not_for_who");
                $not_arr = explode("\n", $not_for_who);
                foreach($not_arr as $item) {
                    if(trim($item)) echo '<li><i class="fas fa-minus" style="font-size:0.7rem; color:#e74c3c; margin-right:10px;"></i> ' . esc_html(trim($item)) . '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</section>

<section id="features" style="background: #080808;">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <span class="tagline">What's Included</span>
        <h2><?php echo esc_html(wp_titans_get_mod("wp_titans_auth_feats_title", "Everything You Need for Authority")); ?></h2>
    </div>
    <div class="grid-cards">
        <?php
        for ($i = 1; $i <= 6; $i++) :
            $f_icon = wp_titans_get_mod("wp_titans_auth_feature_icon_$i");
            $f_title = wp_titans_get_mod("wp_titans_auth_feature_title_$i");
            $f_desc = wp_titans_get_mod("wp_titans_auth_feature_desc_$i");
            if (!$f_title) continue;
        ?>
        <div class="card reveal" style="background: #000; border: 1px solid var(--border-glass);">
            <i class="fas <?php echo esc_attr($f_icon); ?>" style="font-size: 2.5rem; color: var(--primary);"></i>
            <h3><?php echo esc_html($f_title); ?></h3>
            <p><?php echo esc_html($f_desc); ?></p>
        </div>
        <?php endfor; ?>
    </div>
</section>

<section id="guarantee" style="background: #000; text-align: center; border-top: 1px solid var(--border-glass);">
    <div class="reveal">
        <i class="fas fa-shield-heart" style="font-size: 4rem; color: var(--primary); margin-bottom: 2rem;"></i>
        <h2><?php echo esc_html(wp_titans_get_mod("wp_titans_auth_guarantee_title", "The 14-Day Delivery Guarantee")); ?></h2>
        <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto; color: var(--text-dim);"><?php echo esc_html(wp_titans_get_mod("wp_titans_auth_guarantee_text", "If we don't have your initial website draft ready for review within 14 days of receiving your content, we'll give you a 50% discount on the total project cost. No excuses, just results.")); ?></p>
    </div>
</section>

<section id="auth-faq" style="background: #080808;">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <h2>Authority System FAQ</h2>
    </div>
    <div style="max-width: 800px; margin: 0 auto;">
        <?php
        $afaqs = [
            ['q' => 'Is this a custom design or a template?', 'a' => 'While we use a proven authority framework, every design is customized to your brand, colors, and specific positioning. No two sites look identical.'],
            ['q' => 'What happens after the 14 days?', 'a' => 'We provide 30 days of post-launch support to ensure everything is running perfectly and to make any final minor adjustments.'],
            ['q' => 'Do you handle the hosting?', 'a' => 'We can recommend the best high-performance hosting for WordPress or help you set it up on your existing provider.'],
        ];
        foreach($afaqs as $af) : ?>
        <div class="reveal faq-item" style="margin-bottom: 1.5rem; border-bottom: 1px solid var(--border-glass); padding-bottom: 1rem;">
            <div class="faq-head" style="cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="color: var(--primary); margin: 0;"><?php echo esc_html($af['q']); ?></h4>
                <i class="fas fa-plus" style="font-size: 0.8rem; color: var(--primary);"></i>
            </div>
            <div class="faq-body" style="max-height: 0; overflow: hidden; transition: all 0.4s ease-out; opacity: 0;">
                <p style="padding-top: 1rem; color: var(--text-dim);"><?php echo esc_html($af['a']); ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<?php get_footer(); ?>
