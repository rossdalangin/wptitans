<?php
/**
 * The template for displaying all single posts
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<div id="reading-progress" style="position: fixed; top: 0; left: 0; width: 0%; height: 4px; background: var(--primary); z-index: 2000; transition: width 0.1s ease;"></div>

<section class="single-post-header hero" style="min-height: 60vh; background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
    <div class="reveal">
        <div style="margin-bottom: 1.5rem; opacity: 0.6; font-family: 'Syne'; font-size: 0.75rem; letter-spacing: 3px; text-transform: uppercase;">
            <i class="fas fa-clock" style="margin-right: 10px; color: var(--primary);"></i> <?php echo titan_reading_time(); ?> <?php _e('READ', 'wp-titans'); ?>
        </div>
        <span class="tagline"><?php the_category(', '); ?></span>
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

    <div class="reveal" style="margin-top: 5rem; padding: 2rem 0; border-top: 1px solid var(--border-glass); border-bottom: 1px solid var(--border-glass); display: flex; align-items: center; gap: 2rem;">
        <span style="font-weight: 700; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 2px;"><?php _e('Share Insight:', 'wp-titans'); ?></span>
        <div style="display: flex; gap: 1rem;">
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="social-link" style="color: var(--primary);"><i class="fab fa-linkedin"></i></a>
            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="social-link" style="color: var(--primary);"><i class="fab fa-twitter"></i></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="social-link" style="color: var(--primary);"><i class="fab fa-facebook"></i></a>
        </div>
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

<section id="related-insights" style="background: #050505; border-top: 1px solid var(--border-glass);">
    <div class="reveal" style="text-align: center; margin-bottom: 4rem;">
        <span class="tagline"><?php _e('More Context', 'wp-titans'); ?></span>
        <h2><?php _e('Related Insights', 'wp-titans'); ?></h2>
    </div>
    <div class="grid-cards">
        <?php
        $cats = wp_get_post_categories(get_the_ID());
        $recent = new WP_Query(array(
            'posts_per_page' => 3,
            'post__not_in'   => array(get_the_ID()),
            'category__in'   => $cats
        ));
        if ($recent->have_posts()) : while ($recent->have_posts()) : $recent->the_post(); ?>
            <div class="card reveal" style="padding: 2.5rem;">
                <span class="tagline" style="font-size: 0.7rem;"><?php echo get_the_date(); ?></span>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <a href="<?php the_permalink(); ?>" style="color: var(--primary); font-weight: 700; font-size: 0.9rem; margin-top: 1.5rem; display: block;"><?php _e('Read More', 'wp-titans'); ?> <i class="fas fa-arrow-right" style="font-size: 0.8rem; margin-left: 5px;"></i></a>
            </div>
        <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
</section>

<?php get_footer(); ?>
