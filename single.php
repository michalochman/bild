<?php get_header() ?>

<?php
$prev_post = get_previous_post();
$next_post = get_next_post();
?>

<?php if ($prev_post): ?>
<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="prev-trigger trigger-icon icon icon-circle-left js-prevnext-trigger" data-toggle="tooltip" data-placement="right" title="<?php echo $prev_post->post_title; ?>"><span>Previous Post: <?php echo $prev_post->post_title; ?></span></a>
<?php endif; ?>
<?php if ($next_post): ?>
<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="next-trigger trigger-icon icon icon-circle-right js-prevnext-trigger" data-toggle="tooltip" data-placement="left" title="<?php echo $next_post->post_title; ?>"><span>Next Post: <?php echo $next_post->post_title; ?></span></a>
<?php endif; ?>

<a href="#" class="navi-trigger trigger-icon icon icon-menu js-navi-trigger" data-trigger="navigation"><span>Menu</span></a>

<?php get_sidebar() ?>

<span class="navi-trigger trigger-icon navi-trigger-open icon icon-menu js-navi-trigger" data-trigger="navigation"><span>Menu</span></span>

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

<article class="content" id="content" role="main">

    <footer class="meta">
        <time class="post-time" pubdate datetime="<?php echo get_the_date('c') ?>"><?php echo get_the_date('M j, Y') ?></time>
        <?php $category = current(get_the_category()); ?>
        <span class="post-category">in <a href="<?php echo get_category_link($category->term_id ) ?>"><?php echo $category->cat_name ?></a></span>
    </footer>

    <h1><?php the_title() ?></h1>

    <?php the_content() ?>

<?php
// If comments are open or we have at least one comment, load up the comment template
if ( comments_open() || '0' != get_comments_number() )
    comments_template( '', true );
?>

</article>

<?php endwhile; ?>

<?php endif; ?>

<?php get_footer() ?>