<?php get_header(); ?>

<section class="archive-header" style="padding-top: 10rem; text-align: center; background: #080808;">
    <h1 style="font-size: 4rem;"><?php the_archive_title(); ?></h1>
</section>

<section id="news">
    <div class="news-grid">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="news-card reveal">
                <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="news-img" alt="<?php the_title_attribute(); ?>">
                    </a>
                <?php endif; ?>
                <div class="news-content">
                    <small style="color: var(--primary);"><?php echo get_the_date(); ?></small>
                    <h3 style="margin: 10px 0;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </div>
</section>

<?php get_footer(); ?>
