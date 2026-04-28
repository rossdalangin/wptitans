<?php get_header(); ?>

<main style="padding-top: 15vh;">
    <section id="blog-header" style="text-align: center; padding-bottom: 4rem;">
        <span class="tagline">Agency Insights</span>
        <h1>Our Journal</h1>
    </section>

    <section id="blog-grid" style="background: #050505;">
        <div class="grid-cards" style="grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="card reveal" style="padding: 0; background: #000; border-radius: 8px; overflow: hidden; border: 1px solid var(--border-glass);">
                    <?php if (has_post_thumbnail()) : ?>
                        <div style="height: 250px; overflow: hidden;">
                            <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
                        </div>
                    <?php endif; ?>
                    <div style="padding: 2.5rem;">
                        <span style="color: var(--primary); font-size: 0.8rem; text-transform: uppercase;"><?php echo get_the_date(); ?></span>
                        <h2 style="font-size: 1.8rem; margin: 1rem 0;"><?php the_title(); ?></h2>
                        <p style="color: var(--text-dim); margin-bottom: 2rem;"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="padding: 0.8rem 1.5rem; font-size: 0.85rem;">Read More</a>
                    </div>
                </article>
            <?php endwhile; endif; ?>
        </div>

        <div class="pagination" style="margin-top: 5rem; text-align: center;">
            <?php the_posts_pagination(); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
