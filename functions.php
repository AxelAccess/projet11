<?php
  function enqueue_jquery() {
    wp_enqueue_script('jquery');
    }
  function theme_enqueue_styles() {
    wp_enqueue_style('twentytwentyone', get_stylesheet_directory_uri(). '/style.css'); 
    wp_enqueue_script('modale', get_stylesheet_directory_uri(). '/scripts/modale.js');
    wp_enqueue_script('morePhotoScript', get_stylesheet_directory_uri(). '/scripts/scriptLoadMorePhoto.js', array("jquery"));
    wp_enqueue_script('contactReference', get_stylesheet_directory_uri(). '/scripts/contactRef.js', array("jquery"));
    wp_enqueue_script('lightBox', get_stylesheet_directory_uri(). '/scripts/lightBox.js', array("jquery"));
    wp_enqueue_script('navArrow', get_stylesheet_directory_uri(). '/scripts/NavArrow.js', array("jquery"));
    wp_localize_script('navArrow', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
  }
  add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');
  add_action('wp_enqueue_scripts', 'enqueue_jquery');


  //**Page principale**\\

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
  //** **/

  //**SinglePage**\\

  //display photo hover
  function hoverPhoto() {
    $post_id = $_POST['post_id']; 
    $image_url = get_the_post_thumbnail_url($post_id, 'full'); 
    echo $image_url; 
    wp_die(); 
  }
  add_action('wp_ajax_hoverPhoto', 'hoverPhoto');
  add_action('wp_ajax_nopriv_hoverPhoto', 'hoverPhoto');
  //
  

  //Loop for arrows & photo
  function get_adjacent_post_loop($next = true) {
    $post = get_adjacent_post(false, '', $next);
    if (!$post) {
      $noAdjacentLoop = array(
        'numberposts' => 1,
        'post_type'   => 'photo',
        'orderby'     => 'date',
        'order'       => $next ? 'DESC' : 'ASC'
      );
      $post = get_posts($noAdjacentLoop)[0];
    }
    return $post;
  }
  //

  //**Menus**\\
  function register_my_menus() {
      register_nav_menus(
        array(
          'header-menu' => __( 'Header Menu' ),
          'footer-menu' => __( 'Footer Menu' ),
        )
      );
    }
    add_action( 'init', 'register_my_menus' );


   
