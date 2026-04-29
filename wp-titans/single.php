<?php
/**
 * The template for displaying all single posts
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<section class="single-post-header hero" style="min-height: 60vh; background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
    <div class="reveal">
        <span class="tagline"><?php the_category(', "); ?></span>
        <h1 style="font-size: 4.5rem; max-width: 900px;"><?php the_title(); ?></h1>
        <div style="margin-top: 2rem; display: flex; align-items: center; justify-content: center; gap: 1rem;">
            <span style="color: var(--primary); font-weight: 700;"><?php the_author(); ?></span>
            <span style="color: var(--text-dim);">/</span>
            <span style="color: var(--text-dim);"><?php echo get_the_date(); ?></span>
        </div>
    </div>
</section>

<section id="post-content" style="background: #000; padding: 8rem 20%;">
    <div class="reveal" style="font-size: 1.2rem; line-height: 1.8; color: #eee;">
        <?php the_content(); ?>
    </div>

    <div class="reveal" style="margin-top: 5rem; padding-top: 3rem; border-top: 1px solid var(--border-glass);">
        <?php
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>
    </div>
</section>
<?php endwhile; ?>

<section id="more-insights" style="background: #050505; border-top: 1px solid var(--border-glass);">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <span class="tagline">Explore More</span>
        <h2>Recent Insights</h2>
    </div>
    <div class="grid-cards">
        <?php
        $recent = new WP_Query(array("posts_per_page' => 3, 'post__not_in' => array(get_the_ID())));
        if ($recent->have_posts()) : while ($recent->have_posts()) : $recent->the_post(); ?>
            <div class="card reveal" style="padding: 2.5rem;">
                <span class="tagline" style="font-size: 0.7rem;"><?php echo get_the_date(); ?></span>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <a href="<?php the_permalink(); ?>" style="color: var(--primary); font-weight: 700; font-size: 0.9rem; margin-top: 1.5rem; display: block;">Read More <i class="fas fa-arrow-right" style="font-size: 0.8rem; margin-left: 5px;"></i></a>
            </div>
        <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
</section>

<?php get_footer(); ?>
