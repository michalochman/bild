<?php if ( have_comments() ) : ?>
<section class="comments">
    <h1>Comments</h1>
    <ol class="media-list">
        <?php wp_list_comments( array( 'callback' => 'bild_comment' ) ); ?>
    </ol>
</section>
<?php endif ?>

<div><?php comment_form(); ?></div>