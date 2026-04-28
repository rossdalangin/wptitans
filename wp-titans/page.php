<?php get_header(); ?>

<section class="page-header" style="padding-top: 10rem; text-align: center; background: #080808;">
    <h1 style="font-size: 4rem;"><?php the_title(); ?></h1>
</section>

<section class="content-area">
    <div class="container" style="max-width: 900px; margin: 0 auto; color: var(--text-dim);">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>
    </div>
</section>

<?php get_footer(); ?>
