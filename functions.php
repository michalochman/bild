<?php

// I don't like WP to mess with my HTML structure
// so remove automatic paragraphs and line breaks
remove_filter( 'the_content', 'wpautop' );


// comment template
function bild_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
            ?>
            <li <?php comment_class('media'); ?> id="comment-<?php comment_ID(); ?>">
                <p>Pingback: <?php comment_author_link(); ?><?php edit_comment_link( '(Edit)', ' ' ); ?></p>
            </li>
            <?php
            break;
        default :
            ?>

                <li <?php comment_class('media'); ?> id="comment-<?php comment_ID(); ?>">
                    <span class="pull-left">
                        <?php echo get_avatar( $comment, 52 ); ?>
                    </span>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <?php echo get_comment_author_link() ?>
                            on <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php echo get_comment_time('c') ?>"><?php echo get_comment_time('M j, Y') ?></time></a>
                            <?php edit_comment_link( '(Edit)', ' ' ); ?>
                        </h4>
                        <?php comment_text(); ?>
                        <?php if ( $comment->comment_approved == '0' ) : ?>
                            <em>Your comment is awaiting moderation.</em>
                            <br />
                        <?php endif; ?>
                        <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </div>
                </li>

            <?php
            break;
    endswitch;
}
