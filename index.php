<?php get_header() ?>

<a href="#" class="navi-trigger trigger-icon icon icon-menu js-navi-trigger" data-trigger="navigation"><span>Menu</span></a>

<?php get_sidebar() ?>

<span class="navi-trigger trigger-icon navi-trigger-open icon icon-menu js-navi-trigger" data-trigger="navigation"><span>Menu</span></span>

<section class="content" id="content" role="main">

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php echo the_ID() ?>">

        <footer class="meta">
            <time class="post-time" datetime="<?php echo get_the_date('c') ?>"><?php echo get_the_date('M j, Y') ?></time>
            <?php $category = current(get_the_category()); ?>
            <span class="post-category">in <a href="<?php echo get_category_link($category->term_id ) ?>"><?php echo $category->cat_name ?></a></span>
        </footer>

        <h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>

        <?php the_content( '', FALSE, '' ) ?>

        <p><a href="<?php the_permalink() ?>">Read more…</a></p>

    </article>

    <?php endwhile; ?>

    <?php previous_posts_link(); ?>
    <?php next_posts_link(); ?>

<?php endif; ?>

</section>

<?php get_footer() ?>