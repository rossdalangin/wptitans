<?php
/**
 * The template for displaying archive pages
 */
get_header(); ?>

<section class="page-header hero" style="min-height: 40vh;">
    <div class="reveal">
        <span class="tagline"><?php esc_html_e( 'Insights & Expertise', 'wp-titans' ); ?></span>
        <?php
        the_archive_title( '<h1 class="page-title">', '</h1>' );
        the_archive_description( '<div class="archive-description">', '</div>' );
        ?>
    </div>
</section>

<section id="blog-archive" style="background: #050505; padding-top: 5rem;">
    <div class="grid-cards" style="grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('card reveal'); ?> style="padding: 0; overflow: hidden; border-radius: 8px;">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumb" style="height: 250px; overflow: hidden;">
                        <?php the_post_thumbnail('large', array('style' => 'width:100%; height:100%; object-fit:cover; transition: transform 0.5s ease;')); ?>
                    </div>
                <?php endif; ?>
                <div style="padding: 2.5rem;">
                    <span class="tagline" style="font-size: 0.7rem; margin-bottom: 0.5rem;"><?php echo get_the_date(); ?></span>
                    <h3 style="margin-bottom: 1rem;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div style="color: var(--text-dim); font-size: 0.95rem; margin-bottom: 2rem;">
                        <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="padding: 0.8rem 1.5rem; font-size: 0.8rem;">Read Article</a>
                </div>
            </article>
        <?php endwhile;
            the_posts_navigation();
        else : ?>
            <p><?php esc_html_e( 'No posts found.', 'wp-titans' ); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
