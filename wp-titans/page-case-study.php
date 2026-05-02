<?php
/**
 * Template Name: Case Study Page
 */
get_header(); ?>

<main style="padding-top: 10rem; background: #000;">
    <section id="case-study-hero" style="min-height: 60vh; text-align: center; padding-bottom: 5rem;">
        <div class="reveal">
            <span class="tagline">Case Study</span>
            <h1 style="font-size: clamp(3rem, 8vw, 6rem); margin-bottom: 2rem;"><?php the_title(); ?></h1>
            <div style="display: flex; justify-content: center; gap: 4rem; margin-top: 4rem;">
                <div class="stat-item" style="text-align: center;">
                    <h3 style="font-size: 2.5rem; color: var(--primary);">+140%</h3>
                    <p style="font-size: 0.8rem; text-transform: uppercase;">Lead Growth</p>
                </div>
                <div class="stat-item" style="text-align: center;">
                    <h3 style="font-size: 2.5rem; color: var(--primary);">14 Days</h3>
                    <p style="font-size: 0.8rem; text-transform: uppercase;">Time to Launch</p>
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
        <div class="grid-2" style="align-items: flex-start;">
            <div class="reveal">
                <h2 style="font-size: 2.5rem; margin-bottom: 2rem; color: var(--primary);">The Challenge</h2>
                <div style="color: var(--text-dim); font-size: 1.15rem; line-height: 1.8;">
                    <?php the_content(); ?>
                </div>

                <div class="reveal" style="margin-top: 4rem; display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div style="background: #111; padding: 2rem; border-radius: 8px; border-left: 3px solid var(--primary);">
                        <h4 style="font-size: 0.8rem; text-transform: uppercase; color: #555; margin-bottom: 0.5rem;">Launch Speed</h4>
                        <p style="font-size: 1.5rem; font-weight: 800; color: white;">14 Days</p>
                    </div>
                    <div style="background: #111; padding: 2rem; border-radius: 8px; border-left: 3px solid var(--primary);">
                        <h4 style="font-size: 0.8rem; text-transform: uppercase; color: #555; margin-bottom: 0.5rem;">ROI Performance</h4>
                        <p style="font-size: 1.5rem; font-weight: 800; color: white;">+240% Growth</p>
                    </div>
                </div>
            </div>
            <div class="reveal">
                <div style="background: #111; padding: 4rem; border-radius: 12px; border: 1px solid var(--border-glass);">
                    <h3 style="margin-bottom: 2rem; color: white;">The Transformation</h3>
                    <p style="color: var(--text-dim); margin-bottom: 2rem;">We implemented the **Authority Website System™** to solve core positioning issues and automate client acquisition.</p>
                    <ul style="color: #eee; line-height: 2.5;">
                        <li><i class="fas fa-check" style="color: var(--primary); margin-right: 15px;"></i> Strategic Content Architecture</li>
                        <li><i class="fas fa-check" style="color: var(--primary); margin-right: 15px;"></i> High-Performance WordPress Build</li>
                        <li><i class="fas fa-check" style="color: var(--primary); margin-right: 15px;"></i> Conversion-Optimized UI/UX</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Next Project Teaser -->
    <section id="next-project" style="background: #000; padding: 10rem 10%; border-top: 1px solid var(--border-glass);">
        <div class="reveal" style="text-align: center;">
            <span class="tagline">CONTINUE EXPLORING</span>
            <h2 style="font-size: clamp(2.5rem, 5vw, 4rem); margin-bottom: 4rem;">See Another Transformation</h2>

            <div style="max-width: 1000px; margin: 0 auto;">
                <?php
                $next_project = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => 1, 'post__not_in' => array(get_the_ID()), 'orderby' => 'rand'));
                if ($next_project->have_posts()) : while ($next_project->have_posts()) : $next_project->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="card reveal" style="display: block; padding: 0; overflow: hidden; border-radius: 12px; border: 1px solid var(--border-glass); text-decoration: none; position: relative; group;">
                        <div style="height: 400px; overflow: hidden;">
                            <?php the_post_thumbnail('full', array('style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s;')); ?>
                        </div>
                        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); display: flex; flex-direction: column; justify-content: center; align-items: center; opacity: 1; transition: var(--transition);">
                            <h3 style="font-size: 2.5rem; color: white;"><?php the_title(); ?></h3>
                            <span class="btn btn-outline" style="margin-top: 2rem; border-color: var(--primary); color: var(--primary);">View Next Case Study</span>
                        </div>
                    </a>
                    <style>#next-project a:hover img { transform: scale(1.05); } #next-project a:hover div { background: rgba(0,0,0,0.4); }</style>
                <?php endwhile; wp_reset_postdata(); else : ?>
                    <a href="<?php echo get_permalink(get_page_by_path('portfolio')); ?>" class="btn btn-primary">Return to Portfolio</a>
                <?php endif; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
