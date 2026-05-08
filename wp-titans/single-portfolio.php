<?php
/**
 * Template Name: Case Study Page
 */
get_header(); ?>

<main style="padding-top: 10rem; background: #000;">
    <section id="case-study-hero" style="min-height: 60vh; text-align: center; padding-bottom: 5rem;">
        <div class="reveal">
            <span class="tagline"><?php _e('Case Study', 'wp-titans'); ?></span>
            <h1 style="font-size: clamp(3rem, 8vw, 6rem); margin-bottom: 2rem;"><?php the_title(); ?></h1>
            <div style="display: flex; justify-content: center; gap: 4rem; margin-top: 4rem;">
                <?php
                $growth = get_post_meta(get_the_ID(), 'portfolio_growth', true) ?: '+140%';
                $speed = get_post_meta(get_the_ID(), 'portfolio_speed', true) ?: '14 Days';
                $roi = get_post_meta(get_the_ID(), 'portfolio_roi', true) ?: '240%';
                ?>
                <div class="stat-item" style="text-align: center;">
                    <h3 style="font-size: 2.5rem; color: var(--primary);"><?php echo esc_html($growth); ?></h3>
                    <p style="font-size: 0.8rem; text-transform: uppercase;"><?php _e('Lead Growth', 'wp-titans'); ?></p>
                </div>
                <div class="stat-item" style="text-align: center;">
                    <h3 style="font-size: 2.5rem; color: var(--primary);"><?php echo esc_html($speed); ?></h3>
                    <p style="font-size: 0.8rem; text-transform: uppercase;"><?php _e('Time to Launch', 'wp-titans'); ?></p>
                </div>
                <div class="stat-item" style="text-align: center;">
                    <h3 style="font-size: 2.5rem; color: var(--primary);"><?php echo esc_html($roi); ?></h3>
                    <p style="font-size: 0.8rem; text-transform: uppercase;"><?php _e('ROI Performance', 'wp-titans'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <?php if (has_post_thumbnail()) : ?>
        <section id="case-study-image" style="padding-top: 0; padding-bottom: 0;">
            <div class="reveal" style="max-width: 1200px; margin: 0 auto; border-radius: 12px; overflow: hidden; box-shadow: 0 40px 80px rgba(0,0,0,0.6);">
                <?php the_post_thumbnail('full', array('style' => 'width: 100%; height: auto; display: block;')); ?>
            </div>
        </section>
    <?php endif; ?>

    <section id="case-study-content" style="background: #050505; border-top: 1px solid var(--border-glass); margin-top: -10vh; padding-top: 20vh;">
        <div class="grid-2" style="align-items: flex-start; margin-bottom: 10rem;">
            <div class="reveal">
                <h2 style="font-size: 2.5rem; margin-bottom: 2rem; color: var(--primary);"><?php _e('The Challenge', 'wp-titans'); ?></h2>
                <div style="color: var(--text-dim); font-size: 1.15rem; line-height: 1.8;">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="reveal">
                <div style="background: #111; padding: 4rem; border-radius: 12px; border: 1px solid var(--border-glass);">
                    <h3 style="margin-bottom: 2rem; color: white;"><?php _e('The Authority Strategy', 'wp-titans'); ?></h3>
                    <p style="color: var(--text-dim); margin-bottom: 2rem;"><?php _e('We identified a critical Authority Gap between the client\'s mastery and their market perception. Our protocol focused on command-based messaging and cinematic UX.', 'wp-titans'); ?></p>
                    <ul style="color: #eee; line-height: 2.5;">
                        <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 15px;"></i> Strategic Content Architecture</li>
                        <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 15px;"></i> High-Performance WordPress Build</li>
                        <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 15px;"></i> Conversion-Optimized UI/UX</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="reveal" style="background: #000; padding: 6rem; border-radius: 12px; border: 1px solid var(--border-glass); margin-bottom: 10rem;">
            <div style="text-align: center; margin-bottom: 4rem;">
                <span class="tagline"><?php _e('The 14-Day Velocity Sprint', 'wp-titans'); ?></span>
                <h2><?php _e('How We Delivered', 'wp-titans'); ?></h2>
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 3rem;">
                <div>
                    <h4 style="color: var(--primary); margin-bottom: 1rem;">Day 1-3</h4>
                    <p style="font-size: 0.9rem; color: #888;">Positioning & Copywriting</p>
                </div>
                <div>
                    <h4 style="color: var(--primary); margin-bottom: 1rem;">Day 4-7</h4>
                    <p style="font-size: 0.9rem; color: #888;">Cinematic UI/UX Design</p>
                </div>
                <div>
                    <h4 style="color: var(--primary); margin-bottom: 1rem;">Day 8-12</h4>
                    <p style="font-size: 0.9rem; color: #888;">WP Engineering & SEO</p>
                </div>
                <div>
                    <h4 style="color: var(--primary); margin-bottom: 1rem;">Day 14</h4>
                    <p style="font-size: 0.9rem; color: #888;">Mission Launch</p>
                </div>
            </div>
        </div>

        <div class="reveal" style="text-align: center;">
            <h2 style="margin-bottom: 4rem;"><?php _e('The Quantified Outcome', 'wp-titans'); ?></h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                <div style="background: #111; padding: 4rem 2rem; border-radius: 8px;">
                    <div style="font-size: 4rem; font-weight: 900; color: var(--primary); line-height: 1;"><?php echo esc_html($growth); ?></div>
                    <p style="margin-top: 1rem; text-transform: uppercase; letter-spacing: 2px; font-size: 0.75rem; color: #555;">Lead Volume Increase</p>
                </div>
                <div style="background: #111; padding: 4rem 2rem; border-radius: 8px; border: 1px solid var(--primary);">
                    <div style="font-size: 4rem; font-weight: 900; color: var(--primary); line-height: 1;"><?php echo esc_html($roi); ?></div>
                    <p style="margin-top: 1rem; text-transform: uppercase; letter-spacing: 2px; font-size: 0.75rem; color: #555;">Annual ROI Lift</p>
                </div>
                <div style="background: #111; padding: 4rem 2rem; border-radius: 8px;">
                    <div style="font-size: 4rem; font-weight: 900; color: var(--primary); line-height: 1;">100%</div>
                    <p style="margin-top: 1rem; text-transform: uppercase; letter-spacing: 2px; font-size: 0.75rem; color: #555;">Authority Verified</p>
                </div>
            </div>
        </div>
    </section>

</main>

    <!-- Next Project Navigation -->
    <section id="next-project" style="background: #000; border-top: 1px solid #111; padding: 10rem 10%; text-align: center;">
        <div class="reveal">
            <span class="tagline"><?php _e('Up Next', 'wp-titans'); ?></span>
            <?php
            $next_post = get_next_post();
            if ( ! empty( $next_post ) ) : ?>
                <h2 style="font-size: 3.5rem; margin-bottom: 3rem;"><a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo esc_html( $next_post->post_title ); ?></a></h2>
                <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="btn btn-outline"><?php _e('View Next Case Study', 'wp-titans'); ?></a>
            <?php else :
                $first_post = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => 1, 'order' => 'ASC'));
                if ($first_post->have_posts()) : while ($first_post->have_posts()) : $first_post->the_post(); ?>
                    <h2 style="font-size: 3.5rem; margin-bottom: 3rem;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <a href="<?php the_permalink(); ?>" class="btn btn-outline"><?php _e('View Next Case Study', 'wp-titans'); ?></a>
                <?php endwhile; wp_reset_postdata(); endif;
            endif; ?>
        </div>
    </section>

<?php get_footer(); ?>
