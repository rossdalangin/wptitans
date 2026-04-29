<?php
/**
 * Template Name: Authority Landing Page
 */
get_header(); ?>

<section id="authority-hero" class="hero" style="min-height: 80vh; text-align: left; padding-left: 10%; padding-right: 10%;">
    <div class="reveal">
        <span class="tagline">The Flagship Solution</span>
        <h1 style="font-size: 5.5rem; line-height: 1;"><?php echo esc_html(wp_titans_get_mod('wp_titans_auth_title')); ?></h1>
        <p style="font-size: 1.5rem; max-width: 800px; margin-top: 2rem;"><?php echo esc_html(wp_titans_get_mod('wp_titans_auth_subtitle')); ?></p>
        <div class="hero-btns" style="justify-content: flex-start; margin-top: 3rem;">
            <a href="<?php echo esc_url(wp_titans_get_mod('wp_titans_contact_btn_url')); ?>" class="btn btn-primary"><?php echo esc_html(wp_titans_get_mod('wp_titans_contact_btn_text')); ?></a>
            <a href="#features" class="btn btn-outline">See What's Included</a>
        </div>
    </div>
</section>

<section id="ideal-client" style="background: #050505;">
    <div class="grid-2">
        <div class="reveal">
            <h2 style="color: #2ecc71;"><i class="fas fa-check-circle"></i> This is for you if...</h2>
            <ul style="font-size: 1.1rem; color: var(--text-dim); line-height: 2;">
                <li>You are an expert, coach, or consultant with a high-value offer.</li>
                <li>You have a website that looks outdated or "cheap".</li>
                <li>You are embarrassed to send prospects to your current site.</li>
                <li>You want a professional platform that builds immediate trust.</li>
                <li>You value speed and want to launch in 14 days.</li>
            </ul>
        </div>
        <div class="reveal">
            <h2 style="color: #e74c3c;"><i class="fas fa-times-circle"></i> This is NOT for you if...</h2>
            <ul style="font-size: 1.1rem; color: var(--text-dim); line-height: 2;">
                <li>You are looking for the "cheapest" possible option.</li>
                <li>You don't have a clear business offer yet.</li>
                <li>You want a complex, 100-page custom web application.</li>
                <li>You are not willing to invest in professional positioning.</li>
            </ul>
        </div>
    </div>
</section>

<section id="features" style="background: #080808;">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <span class="tagline">What"s Included</span>
        <h2>Everything You Need for Authority</h2>
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
        <h2>The 14-Day Delivery Guarantee</h2>
        <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto; color: var(--text-dim);">If we don"t have your initial website draft ready for review within 14 days of receiving your content, we"ll give you a 50% discount on the total project cost. No excuses, just results.</p>
    </div>
</section>

<section id="auth-faq" style="background: #080808;">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <h2>Authority System FAQ</h2>
    </div>
    <div style="max-width: 800px; margin: 0 auto;">
        <?php
        $afaqs = [
            ["q' => 'Is this a custom design or a template?', 'a' => 'While we use a proven authority framework, every design is customized to your brand, colors, and specific positioning. No two sites look identical.'],
            ['q' => 'What happens after the 14 days?', 'a' => 'We provide 30 days of post-launch support to ensure everything is running perfectly and to make any final minor adjustments.'],
            ['q' => 'Do you handle the hosting?', 'a' => 'We can recommend the best high-performance hosting for WordPress or help you set it up on your existing provider."],
        ];
        foreach($afaqs as $af) : ?>
        <div class="reveal faq-item" style="margin-bottom: 1.5rem; border-bottom: 1px solid var(--border-glass); padding-bottom: 1rem;">
            <div class="faq-head" style="cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="color: var(--primary); margin: 0;"><?php echo esc_html($af["q"]); ?></h4>
                <i class="fas fa-plus" style="font-size: 0.8rem; color: var(--primary);"></i>
            </div>
            <div class="faq-body" style="max-height: 0; overflow: hidden; transition: all 0.4s ease-out; opacity: 0;">
                <p style="padding-top: 1rem; color: var(--text-dim);"><?php echo esc_html($af["a']); ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section id="auth-cta" style="background: linear-gradient(to bottom, #000, #050505); text-align: center;">
    <div class="reveal">
        <h2 style="font-size: 4rem;"><?php echo esc_html(wp_titans_get_mod('wp_titans_auth_cta_title')); ?></h2>
        <p style="font-size: 1.3rem; margin-bottom: 4rem; max-width: 800px; margin-left: auto; margin-right: auto;"><?php echo esc_html(wp_titans_get_mod('wp_titans_auth_cta_desc')); ?></p>
        <a href="<?php echo esc_url(wp_titans_get_mod('wp_titans_contact_btn_url')); ?>" class="btn btn-primary" style="padding: 2rem 4rem; font-size: 1.2rem;"><?php echo esc_html(wp_titans_get_mod('wp_titans_contact_btn_text')); ?></a>
    </div>
</section>

<?php get_footer(); ?>
