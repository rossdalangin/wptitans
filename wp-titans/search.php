<?php get_header(); ?>

<main style="padding-top: 15vh; background: #000;">
    <section id="search-header" style="text-align: center; padding-bottom: 5rem;">
        <span class="tagline">Search Results</span>
        <h1><?php printf( 'Results for: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>
    </section>

    <section id="search-results" style="background: #050505; min-height: 50vh;">
        <div class="grid-cards">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="card reveal" style="padding: 3rem;">
                    <span style="color: var(--primary); font-size: 0.8rem; text-transform: uppercase;"><?php echo get_post_type(); ?></span>
                    <h2 style="font-size: 1.8rem; margin: 1rem 0;"><?php the_title(); ?></h2>
                    <p style="color: var(--text-dim); margin-bottom: 2rem;"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="padding: 0.8rem 1.5rem; font-size: 0.85rem;">View Result</a>
                </article>
            <?php endwhile; else : ?>
                <div class="reveal" style="text-align: center; grid-column: 1 / -1; padding: 5rem 0;">
                    <i class="fas fa-search" style="font-size: 4rem; color: #222; margin-bottom: 2rem;"></i>
                    <h2>No matches found.</h2>
                    <p style="color: var(--text-dim); margin: 2rem 0 4rem;">We couldn't find anything matching your search. Try different keywords or return home.</p>
                    <a href="<?php echo home_url(); ?>" class="btn btn-primary">Return to Base</a>
                </div>
            <?php endif; ?>
        </div>

        <div class="pagination" style="margin-top: 5rem; text-align: center;">
            <?php the_posts_pagination(); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
