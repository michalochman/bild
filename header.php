<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;

        wp_title( '|', true, 'right' );

        // Add the blog name.
        bloginfo( 'name' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Page %s', 'bild' ), max( $paged, $page ) );

        ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;subset=latin-ext" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/screen.min.css" rel="stylesheet" media="screen">
    <!--[if lt IE 9]>
    <link href="<?php echo get_template_directory_uri(); ?>/ie.min.css" rel="stylesheet" media="screen">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo get_template_directory_uri(); ?>/modernizr.min.js"></script>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div class="loader"></div>

    <a href="#content" class="up-trigger trigger-icon icon icon-circle-up js-up-trigger"><span>Up</span></a>

    <header class="site-header">
        <h1>
            <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
            <small> – <?php bloginfo('description'); ?></small>
        </h1>
    </header>