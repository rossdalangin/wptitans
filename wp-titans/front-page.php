<?php
/**
 * Template Name: Front Page
 */
get_header(); ?>

<!-- 1. HERO SECTION -->
<?php $h_align = wp_titans_get_mod("wp_titans_hero_align"); ?>
<section id="hero" class="hero" style="overflow: hidden; padding-bottom: 15rem; align-items: <?php echo $h_align === 'left' ? 'flex-start' : 'center'; ?>; text-align: <?php echo esc_attr($h_align); ?>;">
    <?php if (wp_titans_get_mod("wp_titans_hero_video")) : ?>
        <video autoplay muted loop playsinline style="position: absolute; top: 50%; left: 50%; min-width: 100%; min-height: 100%; width: auto; height: auto; transform: translate(-50%, -50%); z-index: 0; object-fit: cover;">
            <source src="<?php echo esc_url(wp_titans_get_mod("wp_titans_hero_video")); ?>" type="video/mp4">
        </video>
    <?php endif; ?>
    <div class="reveal" style="z-index: 1; <?php echo $h_align === 'left' ? 'margin-left: 0;' : ''; ?>">
        <?php if (wp_titans_get_mod("wp_titans_hero_ticker")) : ?>
            <div class="hero-ticker" style="margin-bottom: 2rem; background: rgba(255,255,255,0.05); padding: 0.8rem 2rem; border-radius: 50px; display: inline-block; border: 1px solid rgba(255,255,255,0.1);">
                <p style="margin: 0; font-size: 0.85rem; letter-spacing: 1px; color: var(--primary); font-weight: 700; text-transform: uppercase;">
                    <i class="fas fa-bolt" style="margin-right: 10px;"></i>
                    <?php echo esc_html(wp_titans_get_mod("wp_titans_hero_ticker")); ?>
                </p>
            </div>
        <?php endif; ?>
        <h1><?php echo esc_html(wp_titans_get_mod("wp_titans_hero_title")); ?></h1>
        <p><?php echo esc_html(wp_titans_get_mod("wp_titans_hero_subtitle")); ?></p>
        <div class="hero-btns">
            <a href="<?php echo esc_attr(wp_titans_get_mod("wp_titans_hero_btn1_url")); ?>" class="btn btn-primary"><?php echo esc_html(wp_titans_get_mod("wp_titans_hero_btn1_text")); ?></a>
            <a href="<?php echo esc_attr(wp_titans_get_mod("wp_titans_hero_btn2_url")); ?>" class="btn btn-outline"><?php echo esc_html(wp_titans_get_mod("wp_titans_hero_btn2_text")); ?></a>
        </div>
    </div>

    <div id="scroll-indicator" style="position: absolute; bottom: 3rem; left: 50%; transform: translateX(-50%); display: flex; flex-direction: column; align-items: center; gap: 1rem; opacity: 0.5;">
        <span style="font-size: 0.65rem; text-transform: uppercase; letter-spacing: 3px; font-weight: 700; color: var(--text-dim);">Scroll to Explore</span>
        <div style="width: 25px; height: 45px; border: 2px solid var(--primary); border-radius: 50px; position: relative;">
            <div style="width: 3px; height: 8px; background: var(--primary); border-radius: 50px; position: absolute; top: 8px; left: 50%; transform: translateX(-50%); animation: scroll-dot 2s infinite;"></div>
        </div>
    </div>

    <?php wp_titans_divider(); ?>
</section>

<!-- 2. AWARDS BAR -->
<div id="awards-bar" style="background: #000; padding: 2rem 10%; display: flex; justify-content: center; align-items: center; gap: 3rem; flex-wrap: wrap; border-bottom: 1px solid var(--border-glass);">
    <?php for ($i = 1; $i <= 4; $i++) :
        $award = wp_titans_get_mod("wp_titans_award_img_$i");
        if (!$award) continue;
    ?>
        <img loading="lazy" src="<?php echo esc_url($award); ?>" alt="Award" style="height: 50px; opacity: 0.4; transition: var(--transition);" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.4'">
    <?php endfor; ?>
</div>

<!-- 2b. RESULTS TICKER -->
<div id="results-ticker-bar" style="background: var(--primary); padding: 1.2rem 0; overflow: hidden; white-space: nowrap; border-bottom: 1px solid rgba(0,0,0,0.1); color: black;">
    <div class="ticker-content" style="display: inline-block; animation: ticker-scroll 30s linear infinite; font-family: 'Syne'; font-weight: 800; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 2px;">
        <?php
        $ticker_items = [
            'ROI-Driven Systems', '$1.2M+ Client Revenue Generated', 'Elite 14-Day Launch', 'High-Performance WordPress',
            'Strategic SEO Mastery', 'Conversion Optimized UI/UX', 'World-Class Authority Branding',
            'ROI-Driven Systems', '$1.2M+ Client Revenue Generated', 'Elite 14-Day Launch', 'High-Performance WordPress'
        ];
        foreach($ticker_items as $ti) : ?>
            <span style="margin: 0 4rem;"><i class="fas fa-bolt" style="margin-right: 15px;"></i> <?php echo esc_html($ti); ?></span>
        <?php endforeach; ?>
    </div>
</div>

<!-- 2c. MEDIA TRUST BAR -->
<section id="media-trust" style="background: #000; padding: 3rem 10%; border-bottom: 1px solid var(--border-glass);">
    <div style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: 4rem; opacity: 0.3; filter: grayscale(1);">
        <span style="font-family: 'Syne'; font-weight: 800; font-size: 0.7rem; letter-spacing: 2px; color: var(--text-dim);">FEATURED IN:</span>
        <?php for ($i = 1; $i <= 4; $i++) :
            $media = wp_titans_get_mod("wp_titans_media_logo_$i");
            if (!$media) continue;
        ?>
            <img loading="lazy" src="<?php echo esc_url($media); ?>" alt="Media Logo" style="height: 20px;">
        <?php endfor; ?>
    </div>
</section>

<!-- 3. TRUST BAR -->
<section id="trust-bar" style="background: #050505; padding: 4rem 10%; border-bottom: 1px solid var(--border-glass);">
    <div class="reveal" style="text-align: center;">
        <p style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 2px; color: var(--text-dim); margin-bottom: 2.5rem;"><?php echo esc_html(wp_titans_get_mod("wp_titans_logos_title")); ?></p>
        <div style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: 4rem; opacity: 0.6;">
            <?php for ($i = 1; $i <= 6; $i++) :
                $logo = wp_titans_get_mod("wp_titans_client_logo_$i");
                if (!$logo) continue;
            ?>
                <img loading="lazy" src="<?php echo esc_url($logo); ?>" alt="Client Logo" style="height: 30px; filter: grayscale(100%); transition: var(--transition);" onmouseover="this.style.filter='grayscale(0%)'" onmouseout="this.style.filter='grayscale(100%)'">
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- 4. WHO WE WORK WITH -->
<section id="who-we-work-with" style="background: #000;">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <span class="tagline"><?php echo esc_html(wp_titans_get_mod("wp_titans_target_tagline")); ?></span>
        <h2><?php echo esc_html(wp_titans_get_mod("wp_titans_target_main_title")); ?></h2>
    </div>
    <div class="grid-cards">
        <?php for ($i = 1; $i <= 3; $i++) :
            $icon = wp_titans_get_mod("wp_titans_target_icon_$i");
            $title = wp_titans_get_mod("wp_titans_target_title_$i");
            $desc = wp_titans_get_mod("wp_titans_target_desc_$i");
            if (!$title) continue;
        ?>
        <div class="card reveal">
            <i class="fas <?php echo esc_attr($icon); ?>"></i>
            <h3><?php echo esc_html($title); ?></h3>
            <p><?php echo esc_html($desc); ?></p>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- 5. ABOUT SECTION -->
<section id="about" style="background: #050505;">
    <div class="grid-2">
        <div class="reveal">
            <span class="tagline"><?php echo esc_html(wp_titans_get_mod("wp_titans_about_tagline")); ?></span>
            <h2><?php echo esc_html(wp_titans_get_mod("wp_titans_about_title")); ?></h2>
            <p><?php echo nl2br(esc_html(wp_titans_get_mod("wp_titans_about_content"))); ?></p>
            <a href="<?php echo esc_attr(wp_titans_get_mod("wp_titans_about_btn_url")); ?>" class="btn btn-outline" style="margin-top: 2rem;"><?php echo esc_html(wp_titans_get_mod("wp_titans_about_btn_text")); ?></a>
        </div>
        <div class="reveal">
            <img loading="lazy" src="<?php echo esc_url(wp_titans_get_mod("wp_titans_about_image")); ?>" alt="About Titans" style="border-radius: 8px; box-shadow: 0 20px 40px rgba(0,0,0,0.5);">
        </div>
    </div>
</section>

<!-- 5b. NEWSLETTER SIGNUP -->
<?php if (wp_titans_get_mod("wp_titans_newsletter_show")) : ?>
<section id="newsletter" style="background: #000; border-top: 1px solid var(--border-glass);">
    <div class="reveal" style="max-width: 900px; margin: 0 auto; background: #050505; padding: 5rem; border-radius: 12px; border: 1px solid #111; text-align: center;">
        <i class="fas fa-envelope-open-text" style="font-size: 3rem; color: var(--primary); margin-bottom: 2rem;"></i>
        <h2><?php echo esc_html(wp_titans_get_mod("wp_titans_newsletter_title")); ?></h2>
        <p style="color: var(--text-dim); margin-bottom: 3rem;"><?php echo esc_html(wp_titans_get_mod("wp_titans_newsletter_desc")); ?></p>
        <form style="display: flex; gap: 1rem; max-width: 500px; margin: 0 auto;">
            <input type="email" placeholder="Your best email..." required style="flex: 1; padding: 1.2rem; background: #000; border: 1px solid #333; color: white; border-radius: 4px;">
            <button type="submit" class="btn btn-primary" style="padding: 1.2rem 2.5rem;">Join</button>
        </form>
    </div>
</section>
<?php endif; ?>

<!-- 6. SERVICES SECTION -->
<section id="services" style="background: #080808;">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <span class="tagline"><?php echo esc_html(wp_titans_get_mod("wp_titans_services_tagline")); ?></span>
        <h2><?php echo esc_html(wp_titans_get_mod("wp_titans_services_main_title")); ?></h2>
    </div>
    <div class="grid-cards">
        <?php
        $front_services = new WP_Query(array('post_type' => 'service', 'posts_per_page' => 6));
        if ($front_services->have_posts()) : while ($front_services->have_posts()) : $front_services->the_post();
            $badge = get_post_meta(get_the_ID(), 'service_badge', true);
        ?>
        <div class="card reveal" style="position: relative;">
            <?php if ($badge) : ?>
                <span style="position: absolute; top: 1.5rem; right: 1.5rem; background: var(--primary); color: black; font-size: 0.65rem; font-weight: 800; padding: 0.3rem 0.8rem; border-radius: 50px; text-transform: uppercase; letter-spacing: 1px;"><?php echo esc_html($badge); ?></span>
            <?php endif; ?>
            <?php if (has_post_thumbnail()) : the_post_thumbnail('thumbnail', array('style' => 'width: 50px; height: 50px; margin-bottom: 2rem; filter: grayscale(1);')); else : ?>
                <i class="fas fa-cube"></i>
            <?php endif; ?>
            <h3><?php the_title(); ?></h3>
            <p><?php echo get_the_excerpt(); ?></p>
        </div>
        <?php endwhile; wp_reset_postdata(); else : ?>
            <?php for ($i = 1; $i <= 6; $i++) :
                $icon = wp_titans_get_mod("wp_titans_service_icon_$i");
                $title = wp_titans_get_mod("wp_titans_service_title_$i");
                $desc = wp_titans_get_mod("wp_titans_service_desc_$i");
                $badge = wp_titans_get_mod("wp_titans_service_badge_$i");
                if (!$title) continue;
            ?>
            <div class="card reveal" style="position: relative;">
                <?php if ($badge) : ?>
                    <span style="position: absolute; top: 1.5rem; right: 1.5rem; background: var(--primary); color: black; font-size: 0.65rem; font-weight: 800; padding: 0.3rem 0.8rem; border-radius: 50px; text-transform: uppercase; letter-spacing: 1px;"><?php echo esc_html($badge); ?></span>
                <?php endif; ?>
                <i class="fas <?php echo esc_attr($icon); ?>"></i>
                <h3><?php echo esc_html($title); ?></h3>
                <p><?php echo esc_html($desc); ?></p>
            </div>
            <?php endfor; ?>
        <?php endif; ?>
    </div>
</section>

<!-- 7. PROCESS SECTION -->
<section id="process">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <span class="tagline"><?php echo esc_html(wp_titans_get_mod("wp_titans_process_tagline")); ?></span>
        <h2><?php echo esc_html(wp_titans_get_mod("wp_titans_process_main_title")); ?></h2>
    </div>
    <div class="grid-cards">
        <?php for ($i = 1; $i <= 4; $i++) :
            $title = wp_titans_get_mod("wp_titans_process_title_$i");
            $desc = wp_titans_get_mod("wp_titans_process_desc_$i");
            if (!$title) continue;
        ?>
        <div class="card reveal" style="border-left: 3px solid var(--primary);">
            <div style="font-weight: 900; color: var(--primary); font-size: 1.2rem; margin-bottom: 1rem;">STEP 0<?php echo $i; ?></div>
            <h3><?php echo esc_html($title); ?></h3>
            <p><?php echo esc_html($desc); ?></p>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- 8. PORTFOLIO SECTION -->
<section id="portfolio" style="background: #000;">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <span class="tagline">Our Work</span>
        <h2>Case Studies & Results</h2>
    </div>
    <div class="grid-cards">
        <?php
        $front_portfolio = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => 3));
        if ($front_portfolio->have_posts()) : while ($front_portfolio->have_posts()) : $front_portfolio->the_post();
            $badge = get_post_meta(get_the_ID(), 'portfolio_badge', true);
        ?>
        <div class="card reveal" style="padding: 0; overflow: hidden; border: none; background: transparent;">
            <div style="position: relative; overflow: hidden; border-radius: 8px;">
                <?php if ($badge) : ?>
                    <span style="position: absolute; top: 1.5rem; right: 1.5rem; z-index: 10; background: var(--primary); color: black; font-size: 0.65rem; font-weight: 800; padding: 0.3rem 0.8rem; border-radius: 50px; text-transform: uppercase; letter-spacing: 1px;"><?php echo esc_html($badge); ?></span>
                <?php endif; ?>
                <?php if (has_post_thumbnail()) : the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; transition: transform 0.5s;')); endif; ?>
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to top, rgba(0,0,0,0.9), transparent); display: flex; align-items: flex-end; padding: 2rem; opacity: 1;">
                    <h3 style="font-size: 1.3rem; margin: 0; color: white;"><?php the_title(); ?></h3>
                </div>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); else : ?>
            <?php for ($i = 1; $i <= 3; $i++) :
                $img = wp_titans_get_mod("wp_titans_portfolio_img_$i");
                $title = wp_titans_get_mod("wp_titans_portfolio_title_$i");
                $badge = wp_titans_get_mod("wp_titans_portfolio_badge_$i");
                if (!$title) continue;
            ?>
            <div class="card reveal" style="padding: 0; overflow: hidden; border: none; background: transparent;">
                <div style="position: relative; overflow: hidden; border-radius: 8px;">
                    <?php if ($badge) : ?>
                        <span style="position: absolute; top: 1.5rem; right: 1.5rem; z-index: 10; background: var(--primary); color: black; font-size: 0.65rem; font-weight: 800; padding: 0.3rem 0.8rem; border-radius: 50px; text-transform: uppercase; letter-spacing: 1px;"><?php echo esc_html($badge); ?></span>
                    <?php endif; ?>
                    <img loading="lazy" src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>" style="width: 100%; transition: transform 0.5s;">
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to top, rgba(0,0,0,0.9), transparent); display: flex; align-items: flex-end; padding: 2rem; opacity: 1;">
                        <h3 style="font-size: 1.3rem; margin: 0; color: white;"><?php echo esc_html($title); ?></h3>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        <?php endif; ?>
    </div>
</section>

<!-- 8b. LEAD MAGNET: FREE AUDIT -->
<?php if (wp_titans_get_mod("wp_titans_audit_show")) : ?>
<section id="free-audit" style="background: #D4AF37; color: black; padding: 6rem 10%;">
    <div class="grid-2">
        <div class="reveal">
            <h2 style="color: black; margin-bottom: 1rem;"><?php echo esc_html(wp_titans_get_mod("wp_titans_audit_title")); ?></h2>
            <p style="color: rgba(0,0,0,0.8); font-size: 1.2rem;"><?php echo esc_html(wp_titans_get_mod("wp_titans_audit_desc")); ?></p>
        </div>
        <div class="reveal">
            <form style="display: flex; gap: 1rem;">
                <input type="url" placeholder="Your Website URL" required style="flex: 1; padding: 1.2rem; border-radius: 4px; border: none; font-family: inherit;">
                <button type="submit" class="btn" style="background: black; color: white; border-radius: 4px;">Get My Audit</button>
            </form>
            <p style="font-size: 0.8rem; margin-top: 1rem; opacity: 0.7;">* No obligation. 100% manual review by our experts.</p>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- 9. BEFORE & AFTER COMPARISON -->
<?php if (wp_titans_get_mod("wp_titans_comparison_show")) : ?>
<section id="comparison" style="background: #000; border-top: 1px solid var(--border-glass);">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <span class="tagline">The Transformation</span>
        <h2>Website Evolution</h2>
    </div>
    <div class="grid-2">
        <?php for ($i = 1; $i <= 2; $i++) :
            $before = wp_titans_get_mod("wp_titans_compare_before_$i");
            $after = wp_titans_get_mod("wp_titans_compare_after_$i");
            $title = wp_titans_get_mod("wp_titans_compare_title_$i");
            if (!$before || !$after) continue;
        ?>
        <div class="reveal">
            <h3 style="font-size: 1.5rem; margin-bottom: 2rem; text-align: center;"><?php echo esc_html($title); ?></h3>
            <div class="ba-container" style="position: relative; width: 100%; aspect-ratio: 16/10; overflow: hidden; border-radius: 8px;">
                <img loading="lazy" src="<?php echo esc_url($after); ?>" alt="After" style="width: 100%; height: 100%; object-fit: cover;">
                <div class="ba-overlay" style="position: absolute; top: 0; left: 0; width: 50%; height: 100%; overflow: hidden; border-right: 3px solid var(--primary);">
                    <img loading="lazy" src="<?php echo esc_url($before); ?>" alt="Before" style="width: 200%; height: 100%; object-fit: cover; max-width: none;">
                </div>
                <input type="range" min="0" max="100" value="50" class="ba-slider" style="position: absolute; -webkit-appearance: none; appearance: none; width: 100%; height: 100%; background: transparent; outline: none; margin: 0; cursor: pointer; top: 0; left: 0;">
            </div>
        </div>
        <?php endfor; ?>
    </div>
</section>
<?php endif; ?>

<!-- 10. STATS BAR -->
<div id="stats" class="stats-bar">
    <?php for ($i = 1; $i <= 4; $i++) :
        $num = wp_titans_get_mod("wp_titans_stat_num_$i");
        $label = wp_titans_get_mod("wp_titans_stat_label_$i");
        if (!$num) continue;
    ?>
    <div class="stat-item">
        <h3 data-target="<?php echo esc_attr($num); ?>"><?php echo esc_html($num); ?></h3>
        <p><?php echo esc_html($label); ?></p>
    </div>
    <?php endfor; ?>
</div>

<!-- 12. RECENT INSIGHTS -->
<?php if (wp_titans_get_mod("wp_titans_blog_show")) : ?>
<section id="recent-insights" style="background: #000; border-top: 1px solid var(--border-glass);">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <span class="tagline">Agency Knowledge</span>
        <h2><?php echo esc_html(wp_titans_get_mod("wp_titans_blog_title")); ?></h2>
    </div>
    <div class="grid-cards">
        <?php
        $recent_front = new WP_Query(array('posts_per_page' => 3));
        if ($recent_front->have_posts()) : while ($recent_front->have_posts()) : $recent_front->the_post(); ?>
            <div class="card reveal" style="padding: 0; background: #050505; border-radius: 8px; overflow: hidden;">
                <?php if (has_post_thumbnail()) : ?>
                    <div style="height: 200px; overflow: hidden;">
                        <?php the_post_thumbnail('medium_large', array('style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
                    </div>
                <?php endif; ?>
                <div style="padding: 2rem;">
                    <span style="color: var(--primary); font-size: 0.75rem;"><?php echo get_the_date(); ?></span>
                    <h3 style="font-size: 1.4rem; margin: 1rem 0;"><?php the_title(); ?></h3>
                    <a href="<?php the_permalink(); ?>" style="color: var(--primary); font-weight: 700; font-size: 0.85rem;">Read Insight <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
    <div class="reveal" style="text-align: center; margin-top: 5rem;">
        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-outline">Explore All Insights</a>
    </div>
</section>
<?php endif; ?>

<!-- 13. TESTIMONIALS -->
<section id="testimonials" style="background: #050505;">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <span class="tagline"><?php echo esc_html(wp_titans_get_mod("wp_titans_testi_tagline")); ?></span>
        <h2><?php echo esc_html(wp_titans_get_mod("wp_titans_testi_main_title")); ?></h2>
    </div>
    <?php $testi_layout = wp_titans_get_mod("wp_titans_testi_layout"); ?>
    <div class="<?php echo $testi_layout === 'slider' ? 'testi-slider' : 'grid-cards'; ?>">
        <?php for ($i = 1; $i <= 3; $i++) :
            $img = wp_titans_get_mod("wp_titans_testi_img_$i");
            $quote = wp_titans_get_mod("wp_titans_testi_quote_$i");
            $author = wp_titans_get_mod("wp_titans_testi_author_$i");
            $role = wp_titans_get_mod("wp_titans_testi_role_$i");
            if (!$quote) continue;
        ?>
        <div class="testimonial-card reveal <?php echo $testi_layout === 'slider' ? 'testi-slide' : ''; ?>">
            <?php if ($img) : ?>
                <img loading="lazy" src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($author); ?>" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; margin-bottom: 1.5rem; border: 2px solid var(--primary);">
            <?php endif; ?>
            <blockquote>"<?php echo esc_html($quote); ?>"</blockquote>
            <div class="testimonial-author"><?php echo esc_html($author); ?></div>
            <small style="color: var(--text-dim);"><?php echo esc_html($role); ?></small>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- 14. SUCCESS GUARANTEE -->
<section id="success-guarantee" style="background: #000; text-align: center; padding: 6rem 10%; border-top: 1px solid var(--border-glass);">
    <div class="reveal" style="max-width: 800px; margin: 0 auto; background: #111; padding: 4rem; border-radius: 12px; border: 1px solid var(--primary);">
        <i class="fas fa-award" style="font-size: 3.5rem; color: var(--primary); margin-bottom: 2rem;"></i>
        <h2 style="font-size: 2.5rem; margin-bottom: 1.5rem;"><?php echo esc_html(wp_titans_get_mod("wp_titans_guarantee_title")); ?></h2>
        <p style="font-size: 1.25rem; color: var(--text-dim); line-height: 1.6;"><?php echo wp_kses_post(wp_titans_get_mod("wp_titans_guarantee_text")); ?></p>
    </div>
</section>

<!-- 16. FAQ -->
<section id="faq">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <h2><?php echo esc_html(wp_titans_get_mod("wp_titans_faq_main_title")); ?></h2>
    </div>
    <div style="max-width: 800px; margin: 0 auto;">
        <?php for ($i = 1; $i <= 4; $i++) :
            $q = wp_titans_get_mod("wp_titans_faq_q_$i");
            $a = wp_titans_get_mod("wp_titans_faq_a_$i");
            if (!$q) continue;
        ?>
        <div class="reveal faq-item" style="margin-bottom: 1.5rem; border-bottom: 1px solid var(--border-glass); padding-bottom: 1rem;">
            <div class="faq-head" style="cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="color: var(--primary); margin: 0; font-size: 1.2rem;"><?php echo esc_html($q); ?></h4>
                <i class="fas fa-plus" style="font-size: 0.8rem; color: var(--primary); transition: transform 0.3s;"></i>
            </div>
            <div class="faq-body" style="max-height: 0; overflow: hidden; transition: all 0.4s ease-out; opacity: 0;">
                <p style="padding-top: 1rem; margin: 0; color: var(--text-dim);"><?php echo esc_html($a); ?></p>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- 17. CONTACT -->
<section id="contact" style="background: #080808;">
    <div class="grid-2">
        <div class="reveal">
            <h2><?php echo esc_html(wp_titans_get_mod("wp_titans_contact_title")); ?></h2>
            <p><?php echo esc_html(wp_titans_get_mod("wp_titans_contact_desc")); ?></p>
            <div style="margin-top: 3rem;">
                <p><i class="fas fa-envelope" style="color: var(--primary); margin-right: 10px;"></i> <?php echo esc_html(wp_titans_get_mod("wp_titans_contact_email")); ?></p>
                <p><i class="fas fa-calendar-check" style="color: var(--primary); margin-right: 10px;"></i> <?php echo esc_html(wp_titans_get_mod("wp_titans_contact_guarantee")); ?></p>
            </div>
        </div>
        <div class="reveal">
            <div style="background: #111; padding: 3rem; border-radius: 8px; border: 1px solid var(--border-glass);">
                <?php
                $cf7 = wp_titans_get_mod("wp_titans_cf7_shortcode");
                $form_action = wp_titans_get_mod("wp_titans_contact_form_action");
                $form_method = wp_titans_get_mod("wp_titans_contact_form_method");

                if ($cf7) :
                    echo do_shortcode($cf7);
                else : ?>
                <form action="<?php echo esc_url($form_action); ?>" method="<?php echo esc_attr($form_method); ?>">
                    <div style="margin-bottom: 1.5rem;">
                        <input type="text" name="titan_name" placeholder="Full Name" style="width: 100%; padding: 1rem; background: #000; border: 1px solid #333; color: white;">
                    </div>
                    <div style="margin-bottom: 1.5rem;">
                        <input type="email" name="titan_email" placeholder="Email Address" style="width: 100%; padding: 1rem; background: #000; border: 1px solid #333; color: white;">
                    </div>
                    <div style="margin-bottom: 1.5rem;">
                        <textarea name="titan_message" rows="4" placeholder="Tell us about your business" style="width: 100%; padding: 1rem; background: #000; border: 1px solid #333; color: white;"></textarea>
                    </div>
                    <button class="btn btn-primary" style="width: 100%;"><?php echo esc_html(wp_titans_get_mod("wp_titans_contact_btn_text")); ?></button>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
