<!DOCTYPE html>

    <html id="darkerBackGround" <?php language_attributes(); ?>>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Space+Mono">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>"> 
        <?php wp_head() ?>
    </head>

    <body>
        <header>
        <div class="menu-toggle">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
        </div>
            <img class=logo src="<?php echo get_stylesheet_directory_uri() ?>/images/Logo.png" alt="Logo Natalie Mota">
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        </header>
