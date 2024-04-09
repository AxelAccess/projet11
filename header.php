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

            <img class="logo" src="<?php echo get_stylesheet_directory_uri() ?>/images/Logo.png" alt="Logo Natalie Mota">
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
            
            <div class="darkbackground"></div>

            <div class="contactWindow">               
                <img class="modalDeco" src="<?php echo get_stylesheet_directory_uri() ?>/images/ContactHeader.png">               
                <?= do_shortcode('[contact-form-7 id="4701b95" title="Contact form 1"]');?> 
            </div>
            
        </header>
