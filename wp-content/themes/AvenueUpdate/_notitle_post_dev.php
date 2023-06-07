<?php
/**
 * Template Name: Template for develop no title
 */
?>
<?php get_header(); ?>
<div class="container">
    <div id="content" class="col-md-12">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <div class="post page-php" id="post-<?php the_ID(); ?>">


                    <div class="entry">
                        <?php do_action('render_main'); ?>

                    </div>

                </div>

            <?php endwhile; else: ?>

            <h1 class="title">Not Found</h1>
            <p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>

        <?php endif; ?>

    </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>