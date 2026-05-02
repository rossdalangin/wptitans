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
<section id="service-comparison" style="background: #080808; border-top: 1px solid var(--border-glass);">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <span class="tagline">Compare & Choose</span>
        <h2>System Comparison</h2>
    </div>
    <div class="reveal" style="max-width: 1000px; margin: 0 auto; overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left; background: #050505; border: 1px solid var(--border-glass); border-radius: 8px;">
            <thead>
                <tr style="border-bottom: 2px solid var(--primary);">
                    <th style="padding: 2rem; font-family: 'Syne';">Features</th>
                    <th style="padding: 2rem; font-family: 'Syne'; text-align: center;">Launchpad</th>
                    <th style="padding: 2rem; font-family: 'Syne'; text-align: center; color: var(--primary);">Authority System</th>
                    <th style="padding: 2rem; font-family: 'Syne'; text-align: center;">Enterprise</th>
                </tr>
            </thead>
            <tbody style="color: var(--text-dim); font-size: 0.9rem;">
                <?php
                $has_custom_matrix = false;
                for ($i=1; $i<=6; $i++) {
                    if (wp_titans_get_mod("wp_titans_matrix_feat_$i")) {
                        $has_custom_matrix = true;
                        ?>
                        <tr style="border-bottom: 1px solid #111;">
                            <td style="padding: 1.5rem 2rem; color: white; font-weight: 700;"><?php echo esc_html(wp_titans_get_mod("wp_titans_matrix_feat_$i")); ?></td>
                            <td style="padding: 1.5rem 2rem; text-align: center;"><?php echo wp_titans_get_mod("wp_titans_matrix_p1_$i") ? '<i class="fas fa-check" style="color:var(--primary);"></i>' : '<i class="fas fa-times" style="opacity:0.2;"></i>'; ?></td>
                            <td style="padding: 1.5rem 2rem; text-align: center; background: rgba(212, 175, 55, 0.03);"><?php echo wp_titans_get_mod("wp_titans_matrix_p2_$i") ? '<i class="fas fa-check" style="color:var(--primary);"></i>' : '<i class="fas fa-times" style="opacity:0.2;"></i>'; ?></td>
                            <td style="padding: 1.5rem 2rem; text-align: center;"><?php echo wp_titans_get_mod("wp_titans_matrix_p3_$i") ? '<i class="fas fa-check" style="color:var(--primary);"></i>' : '<i class="fas fa-times" style="opacity:0.2;"></i>'; ?></td>
                        </tr>
                        <?php
                    }
                }
                if (!$has_custom_matrix) :
                    $matrix = [
                        ['f' => 'Custom Branding', 't1' => true, 't2' => true, 't3' => true],
                        ['f' => 'Strategic Copywriting', 't1' => false, 't2' => true, 't3' => true],
                        ['f' => 'Lead Gen Funnels', 't1' => false, 't2' => true, 't3' => true],
                        ['f' => 'CRM Integration', 't1' => false, 't2' => true, 't3' => true],
                        ['f' => 'A/B Testing', 't1' => false, 't2' => false, 't3' => true],
                        ['f' => 'Monthly Insights Studio', 't1' => false, 't2' => false, 't3' => true],
                    ];
                    foreach ($matrix as $row) : ?>
                    <tr style="border-bottom: 1px solid #111;">
                        <td style="padding: 1.5rem 2rem; color: white; font-weight: 700;"><?php echo $row['f']; ?></td>
                        <td style="padding: 1.5rem 2rem; text-align: center;"><?php echo $row['t1'] ? '<i class="fas fa-check" style="color:var(--primary);"></i>' : '<i class="fas fa-times" style="opacity:0.2;"></i>'; ?></td>
                        <td style="padding: 1.5rem 2rem; text-align: center; background: rgba(212, 175, 55, 0.03);"><?php echo $row['t2'] ? '<i class="fas fa-check" style="color:var(--primary);"></i>' : '<i class="fas fa-times" style="opacity:0.2;"></i>'; ?></td>
                        <td style="padding: 1.5rem 2rem; text-align: center;"><?php echo $row['t3'] ? '<i class="fas fa-check" style="color:var(--primary);"></i>' : '<i class="fas fa-times" style="opacity:0.2;"></i>'; ?></td>
                    </tr>
                    <?php endforeach;
                endif; ?>
            </tbody>
        </table>
    </div>
</section>

<section id="pricing" style="background: #000; border-top: 1px solid var(--border-glass);">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <span class="tagline">Investment</span>
        <h2>Agency Packages</h2>

        <div id="pricing-toggle-container" style="display: flex; justify-content: center; align-items: center; gap: 1.5rem; margin-top: 3rem;">
            <span style="font-weight: 700; color: var(--text-dim);">One-Time</span>
            <div id="pricing-toggle" style="width: 60px; height: 30px; background: #222; border-radius: 50px; cursor: pointer; position: relative; border: 1px solid var(--border-glass);">
                <div class="toggle-switch" style="width: 24px; height: 24px; background: var(--primary); border-radius: 50%; position: absolute; top: 2px; left: 3px; transition: var(--transition);"></div>
            </div>
            <span style="font-weight: 700; color: var(--text-main);">Monthly</span>
        </div>
    </div>
    <div class="grid-cards" style="align-items: flex-start;">
        <?php for ($i = 1; $i <= 3; $i++) :
            $name = wp_titans_get_mod("wp_titans_pricing_name_$i");
            $price_one = wp_titans_get_mod("wp_titans_pricing_val_$i");
            $price_monthly = wp_titans_get_mod("wp_titans_pricing_monthly_$i");
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

            <div class="price-val one-time-price" style="font-size: 3rem; font-weight: 800; color: var(--primary); margin: 1.5rem 0; display: block;"><?php echo esc_html($price_one); ?></div>
            <?php if ($price_monthly) : ?>
                <div class="price-val monthly-price" style="font-size: 3rem; font-weight: 800; color: var(--primary); margin: 1.5rem 0; display: none;"><?php echo esc_html($price_monthly); ?><small style="font-size: 1rem; color: var(--text-dim);">/mo</small></div>
            <?php else : ?>
                <div class="price-val monthly-price" style="font-size: 3rem; font-weight: 800; color: var(--primary); margin: 1.5rem 0; display: none;">POA</div>
            <?php endif; ?>

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
