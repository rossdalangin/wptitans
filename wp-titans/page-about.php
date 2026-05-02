<?php
/**
 * Template Name: About Page
 */
get_header(); ?>

<section class="page-header hero" style="min-height: 50vh;">
    <div class="reveal">
        <span class="tagline"><?php echo esc_html(wp_titans_get_mod("wp_titans_about_page_tagline")); ?></span>
        <h1><?php echo esc_html(wp_titans_get_mod("wp_titans_about_page_title")); ?></h1>
        <p><?php echo esc_html(wp_titans_get_mod("wp_titans_about_page_subtitle")); ?></p>
    </div>
</section>

<section id="our-story-page" style="background: #050505;">
    <div class="grid-2">
        <div class="reveal">
            <span class="tagline">OUR STORY</span>
            <h2 style="font-size: 3rem;"><?php echo esc_html(wp_titans_get_mod("wp_titans_about_story_title")); ?></h2>
            <div style="font-size: 1.1rem; color: var(--text-dim);">
                <?php echo wp_kses_post(wpautop(wp_titans_get_mod("wp_titans_about_story_content"))); ?>
            </div>
        </div>
        <div class="reveal">
            <img loading="lazy" src="<?php echo esc_url(wp_titans_get_mod("wp_titans_about_page_image")); ?>" alt="Our Story" style="border-radius: 8px; box-shadow: 0 30px 60px rgba(212, 175, 55, 0.1);">
        </div>
    </div>
</section>

<section id="values" style="background: #000;">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <span class="tagline">Our Pillars</span>
        <h2>Our Core Values</h2>
    </div>
    <div class="grid-cards">
        <?php
        for ($i = 1; $i <= 4; $i++) :
            $v_title = wp_titans_get_mod("wp_titans_about_pillar_title_$i");
            $v_desc = wp_titans_get_mod("wp_titans_about_pillar_desc_$i");
            if (!$v_title) continue;
        ?>
        <div class="card reveal" style="border: 1px solid var(--border-glass);">
            <h3 style="color: var(--primary);"><?php echo esc_html($v_title); ?></h3>
            <p><?php echo esc_html($v_desc); ?></p>
        </div>
        <?php endfor; ?>
    </div>
</section>

<section id="agency-team" style="background: #000; border-top: 1px solid var(--border-glass);">
    <div class="reveal" style="text-align: center; margin-bottom: 5rem;">
        <span class="tagline">The Titans</span>
        <h2>Our Core Team</h2>
    </div>
    <div class="grid-cards">
        <?php
        $team_query = new WP_Query(array('post_type' => 'team', 'posts_per_page' => 6));
        if ($team_query->have_posts()) : while ($team_query->have_posts()) : $team_query->the_post();
            $li = get_post_meta(get_the_ID(), 'linkedin_url', true);
        ?>
        <div class="card reveal team-card" style="padding: 0; background: #050505; text-align: center; border: 1px solid var(--border-glass);">
            <div class="team-img-wrap">
                <?php if (has_post_thumbnail()) : the_post_thumbnail('titan-team'); endif; ?>
                <div class="team-social-overlay">
                    <?php if ($li) : ?>
                        <a href="<?php echo esc_url($li); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <?php endif; ?>
                    <a href="mailto:<?php bloginfo('admin_email'); ?>"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
            <div style="padding: 2.5rem;">
                <h3 style="margin-bottom: 0.5rem; color: var(--primary);"><?php the_title(); ?></h3>
                <p style="text-transform: uppercase; font-size: 0.8rem; letter-spacing: 2px; color: var(--text-dim);"><?php echo get_the_excerpt(); ?></p>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); else : ?>
            <?php for ($i = 1; $i <= 3; $i++) :
                $name = wp_titans_get_mod("wp_titans_team_name_$i");
                $role = wp_titans_get_mod("wp_titans_team_role_$i");
                $img = wp_titans_get_mod("wp_titans_team_img_$i");
                $li = wp_titans_get_mod("wp_titans_team_li_$i");
                if (!$name) continue;
            ?>
            <div class="card reveal team-card" style="padding: 0; background: #050505; text-align: center; border: 1px solid var(--border-glass);">
                <div class="team-img-wrap">
                    <img loading="lazy" src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>">
                    <div class="team-social-overlay">
                        <?php if ($li && $li !== "#") : ?>
                            <a href="<?php echo esc_url($li); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <?php endif; ?>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div style="padding: 2.5rem;">
                    <h3 style="margin-bottom: 0.5rem; color: var(--primary);"><?php echo esc_html($name); ?></h3>
                    <p style="text-transform: uppercase; font-size: 0.8rem; letter-spacing: 2px; color: var(--text-dim);"><?php echo esc_html($role); ?></p>
                </div>
            </div>
            <?php endfor; ?>
        <?php endif; ?>
    </div>
</section>

<section id="founder" style="background: #050505;">
    <div class="grid-2">
        <div class="reveal" style="text-align: center;">
            <img loading="lazy" src="<?php echo esc_url(wp_titans_get_mod("wp_titans_founder_image")); ?>" alt="Founder" style="width: 400px; height: 400px; object-fit: cover; border-radius: 50%; margin: 0 auto; border: 5px solid var(--primary);">
        </div>
        <div class="reveal">
            <span class="tagline">Meet the Founder</span>
            <h2 style="font-size: 3rem;"><?php echo esc_html(wp_titans_get_mod("wp_titans_founder_name")); ?></h2>
            <div style="font-size: 1.1rem; color: var(--text-dim);">
                <?php echo wp_kses_post(wpautop(wp_titans_get_mod("wp_titans_founder_bio"))); ?>
            </div>
            <div style="margin-top: 2.5rem; display: flex; align-items: center; gap: 2rem;">
                <?php if (wp_titans_get_mod("wp_titans_founder_linkedin") !== "#") : ?>
                    <a href="<?php echo esc_url(wp_titans_get_mod("wp_titans_founder_linkedin")); ?>" target="_blank" style="font-size: 1.5rem; color: var(--primary); display: flex; align-items: center; gap: 10px; text-decoration: none; font-weight: 700; font-family: 'Syne'; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 1px;">
                        <i class="fab fa-linkedin" style="font-size: 1.5rem;"></i> Connect on LinkedIn
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
