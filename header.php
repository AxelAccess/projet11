<!DOCTYPE html>

    <html id="darkerBackGround" <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>"> 
        <?php wp_head() ?>
    </head>

    <body>
        <header>
            <img class=logo src="<?php echo get_stylesheet_directory_uri() ?>/images/Logo.png" alt="Logo Natalie Mota">
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

            <div class="contactModale">
                    <img class="modalDeco" src="<?php echo get_stylesheet_directory_uri() ?>/images/ContactHeader.png">
                    <?= do_shortcode('[contact-form-7 id="4701b95" title="Contact form 1"]');?> 
            </div>
        </header>
