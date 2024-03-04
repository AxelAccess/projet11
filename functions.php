<?php
   function loadMorePhotos() {
    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 8, 
        'paged'          => $_POST['page'],
    );

    $photo_query = new WP_Query($args);

    if ($photo_query->have_posts()) {
        while ($photo_query->have_posts()) {
            $photo_query->the_post();
            if (has_post_thumbnail()) { 
                the_post_thumbnail('full', array('class' => 'photoCatalogPics'));
            }
        }
        wp_reset_postdata();
    }

    
}
add_action('wp_ajax_loadMorePhotos', 'loadMorePhotos');
add_action('wp_ajax_nopriv_loadMorePhotos', 'loadMorePhotos');


add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles() {
    wp_enqueue_style('twentytwentyone', get_stylesheet_directory_uri(). '/style.css'); 
    wp_enqueue_script('modale', get_stylesheet_directory_uri(). '/scripts/modale.js');
    wp_enqueue_script('morePhotoScript', get_stylesheet_directory_uri(). '/scripts/scriptLoadMorePhoto.js', array("jquery"));
}
function enqueue_jquery() {
  wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');

function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'footer-menu' => __( 'Footer Menu' ),
       )
     );
   }
   add_action( 'init', 'register_my_menus' );


   
