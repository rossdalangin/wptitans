<?php
/**
 * Template Name: Services Page
 */
get_header(); ?>

<section class="page-header hero" style="min-height: 50vh;">
    <div class="reveal">
        <span class="tagline"><?php echo esc_html(wp_titans_get_mod("wp_titans_services_page_tagline")); ?></span>
        <h1><?php echo esc_html(wp_titans_get_mod("wp_titans_services_page_title")); ?></h1>
        <p><?php echo esc_html(wp_titans_get_mod("wp_titans_services_page_subtitle")); ?></p>
    </div>
</section>

<section id="all-services" style="background: #050505;">
    <div class="grid-cards">
        <?php
        $services_query = new WP_Query(array('post_type' => 'service', 'posts_per_page' => 12));
        if ($services_query->have_posts()) : while ($services_query->have_posts()) : $services_query->the_post();
            $points = get_post_meta(get_the_ID(), 'service_points', true);
        ?>
        <div class="card reveal" style="padding: 4rem;">
            <?php if (has_post_thumbnail()) : the_post_thumbnail('thumbnail', array('style' => 'width: 50px; height: 50px; margin-bottom: 2rem; filter: grayscale(1);')); else : ?>
                <i class="fas fa-cube"></i>
            <?php endif; ?>
            <h3 style="font-size: 2rem; margin-bottom: 1.5rem;"><?php the_title(); ?></h3>
            <p style="font-size: 1.1rem; color: var(--text-dim); margin-bottom: 2rem;"><?php echo get_the_excerpt(); ?></p>
            <?php if ($points) : ?>
            <ul style="color: var(--text-dim); text-align: left; margin-bottom: 2rem;">
                <?php
                $points_arr = explode("\n", $points);
                foreach($points_arr as $point) {
                    if(trim($point)) echo '<li style="margin-bottom: 0.5rem;"><i class="fas fa-check" style="color: var(--primary); margin-right: 10px;"></i> ' . esc_html(trim($point)) . '</li>';
                }
                ?>
            </ul>
            <?php endif; ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-outline">Learn More</a>
        </div>
        <?php endwhile; wp_reset_postdata(); else : ?>
            <?php for ($i = 1; $i <= 6; $i++) :
                $icon = wp_titans_get_mod("wp_titans_service_icon_$i");
                $title = wp_titans_get_mod("wp_titans_service_title_$i");
                $desc = wp_titans_get_mod("wp_titans_service_desc_$i");
                $badge = wp_titans_get_mod("wp_titans_service_badge_$i");
                if (!$title) continue;
            ?>
            <div class="card reveal" style="padding: 4rem; position: relative;">
                <?php if ($badge) : ?>
                    <span style="position: absolute; top: 1.5rem; right: 1.5rem; background: var(--primary); color: black; font-size: 0.65rem; font-weight: 800; padding: 0.3rem 0.8rem; border-radius: 50px; text-transform: uppercase; letter-spacing: 1px;"><?php echo esc_html($badge); ?></span>
                <?php endif; ?>
                <i class="fas <?php echo esc_attr($icon); ?>"></i>
                <h3 style="font-size: 2rem; margin-bottom: 1.5rem;"><?php echo esc_html($title); ?></h3>
                <p style="font-size: 1.1rem; color: var(--text-dim); margin-bottom: 2rem;"><?php echo esc_html($desc); ?></p>
                <ul style="color: var(--text-dim); text-align: left; margin-bottom: 2rem;">
                    <?php
                    $points = wp_titans_get_mod("wp_titans_service_points_$i");
                    $points_arr = explode("\n", $points);
                    foreach($points_arr as $point) {
                        if(trim($point)) echo '<li style="margin-bottom: 0.5rem;"><i class="fas fa-check" style="color: var(--primary); margin-right: 10px;"></i> ' . esc_html(trim($point)) . '</li>';
                    }
                    ?>
                </ul>
                <a href="#contact" class="btn btn-outline">Enquire Now</a>
            </div>
            <?php endfor; ?>
        <?php endif; ?>
    </div>
</section>

<?php if (wp_titans_get_mod("wp_titans_pricing_show")) : ?>
<section id="pricing" style="background: #000; border-top: 1px solid var(--border-glass);">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <span class="tagline">Investment</span>
        <h2>Agency Packages</h2>
    </div>
    <div class="grid-cards" style="align-items: flex-start;">
        <?php for ($i = 1; $i <= 3; $i++) :
            $name = wp_titans_get_mod("wp_titans_pricing_name_$i");
            $price = wp_titans_get_mod("wp_titans_pricing_val_$i");
            $sub = wp_titans_get_mod("wp_titans_pricing_desc_$i");
            $features = wp_titans_get_mod("wp_titans_pricing_features_$i");
            if (!$name) continue;
            $is_featured = ($i === 2);
        ?>
        <div class="card reveal <?php echo $is_featured ? 'featured-price' : ''; ?>" style="text-align: center; padding: 4rem 3rem; <?php echo $is_featured ? 'border: 2px solid var(--primary); transform: scale(1.05); z-index: 1;' : ''; ?>">
            <?php if ($is_featured) : ?>
                <span style="background: var(--primary); color: black; padding: 0.3rem 1rem; font-size: 0.7rem; font-weight: 900; border-radius: 20px; position: absolute; top: -15px; left: 50%; transform: translateX(-50%);">MOST POPULAR</span>
            <?php endif; ?>
            <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem;"><?php echo esc_html($name); ?></h3>
            <div style="font-size: 3rem; font-weight: 800; color: var(--primary); margin: 1.5rem 0;"><?php echo esc_html($price); ?></div>
            <p style="color: var(--text-dim); margin-bottom: 2.5rem;"><?php echo esc_html($sub); ?></p>
            <ul style="text-align: left; color: var(--text-dim); margin-bottom: 3rem; font-size: 0.95rem;">
                <?php
                $feats = explode("\n", $features);
                foreach($feats as $f) {
                    if(trim($f)) echo '<li style="margin-bottom: 1rem;"><i class="fas fa-check" style="color: var(--primary); margin-right: 10px;"></i> ' . esc_html(trim($f)) . '</li>';
                }
                ?>
            </ul>
            <a href="#contact" class="btn <?php echo $is_featured ? 'btn-primary' : 'btn-outline'; ?>" style="width: 100%;">Get Started</a>
        </div>
        <?php endfor; ?>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
