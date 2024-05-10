<!DOCTYPE html>

    <html <?php language_attributes(); ?>>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Space+Mono">
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
            <div class="headerContent container">
            <a href="<?php bloginfo("home"); ?>">
                <img class="logo" src="<?php echo get_stylesheet_directory_uri() ?>/images/Logo.png" alt="Logo Natalie Mota">
            </a>
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
            </div>

            
        </header>
