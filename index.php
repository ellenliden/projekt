<?php
// Standardtemplate för tema

get_header();
?>

<div class="content-area">
    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <article <?php post_class(); ?>>
                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'medium' ); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-excerpt">
                    <?php the_excerpt(); ?>
                </div>
            </article>

        <?php endwhile; ?>

    <?php else : ?>

        <p>Inga inlägg hittades.</p>

    <?php endif; ?>
</div>

<?php
get_footer();