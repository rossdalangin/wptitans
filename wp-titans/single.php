<?php get_header(); ?>

<section class="post-header" style="padding-top: 10rem; text-align: center; background: #080808;">
    <small style="color: var(--primary);"><?php the_date(); ?></small>
    <h1 style="font-size: 4rem; margin-top: 1rem;"><?php the_title(); ?></h1>
</section>

<section class="content-area">
    <div class="container" style="max-width: 800px; margin: 0 auto; color: var(--text-dim);">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumbnail" style="margin-bottom: 3rem;">
                    <?php the_post_thumbnail('full', ['style' => 'width: 100%; border-radius: 0;']); ?>
                </div>
            <?php endif; ?>
            <div class="entry-content" style="font-size: 1.1rem; line-height: 1.8;">
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>
    </div>
</section>

<?php get_footer(); ?>
