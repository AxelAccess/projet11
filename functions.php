<?php
function enqueue_jquery() {
    wp_enqueue_script('jquery');
}
function theme_enqueue_styles() {
    wp_enqueue_style('twentytwentyone', get_stylesheet_directory_uri(). '/style.css'); 

    wp_enqueue_script('lightbox', get_stylesheet_directory_uri(). '/scripts/lightbox.js');

    wp_enqueue_script('morePhotoScript', get_stylesheet_directory_uri(). '/scripts/scriptLoadMorePhoto.js', array("jquery"));

    wp_enqueue_script('contactReference', get_stylesheet_directory_uri(). '/scripts/contactRef.js');

    wp_enqueue_script('overlay', get_stylesheet_directory_uri(). '/scripts/overlay.js');

    wp_enqueue_script('hoverImgNavArrowSP', get_stylesheet_directory_uri(). '/scripts/hoverImgNavArrowSP.js');

    wp_enqueue_script('filter', get_stylesheet_directory_uri(). '/scripts/filter.js', array("jquery"));
    wp_localize_script('filter', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));

    wp_enqueue_script('burgerQueries', get_stylesheet_directory_uri(). '/scripts/burgerQueries.js');
}   
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');
add_action('wp_enqueue_scripts', 'enqueue_jquery');


//**Page principale**\\

// Récupere le nom de la catéggorie de la photo
function get_category_names($post_id) {
    $categories = get_the_terms($post_id, 'categorie_photo');
    $catListNames = '';

    if ($categories) {
        $catListNames = implode(', ', array_column($categories, 'name'));
    }
    return $catListNames;
}


// photos par catégorie
function get_photos_by_category() {
    if (isset($_GET['category_id'])) {
        $category_id = absint($_GET['category_id']);
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'categorie_photo',
                    'field' => 'term_id',
                    'terms' => $category_id,
                ),
            ),
        );

        $photos = new WP_Query($args);

        if($photos->have_posts() ) {
            while( $photos->have_posts() ) {
                $photos->the_post(); 
                $post_id = get_the_ID();
                $catListNames = get_category_names($post_id);
                get_template_part('templatsParts/PhotoCatalog');
            }
        }
        wp_die();
    }
}
add_action('wp_ajax_get_photos_by_category', 'get_photos_by_category');
add_action('wp_ajax_nopriv_get_photos_by_category', 'get_photos_by_category');


function get_photos_by_formats() {
    if (isset($_GET['category_id'])) {
        $category_id = absint($_GET['category_id']);
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'format',
                    'field' => 'term_id',
                    'terms' => $category_id,
                ),
            ),
        );

        $photos = new WP_Query($args);

        if($photos->have_posts() ) {
            while( $photos->have_posts() ) {
                $photos->the_post(); 
                $post_id = get_the_ID();
                $catListNames = get_category_names($post_id);
                get_template_part('templatsParts/PhotoCatalog');
            }
        }
        wp_die();
    }
}
add_action('wp_ajax_get_photos_by_formats', 'get_photos_by_formats');
add_action('wp_ajax_nopriv_get_photos_by_formats', 'get_photos_by_formats');


function get_photos_by_dates() {
    $orderby = 'date'; 
    $order = 'ASC';   

    if (isset($_GET['publish_id'])) {
        if ($_GET['publish_id'] === 'newest') {
            $orderby = 'date'; 
            $order = 'DESC'; 
        } elseif ($_GET['publish_id'] === 'oldest') {
            $orderby = 'date'; 
            $order = 'ASC'; 
        }
    }

    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'orderby'        => $orderby,
        'order'          => $order
    );

    $photos = new WP_Query($args);

    if($photos->have_posts() ) {
        while( $photos->have_posts() ) {
            $photos->the_post(); 
            $post_id = get_the_ID();
            $catListNames = get_category_names($post_id);
            get_template_part('templatsParts/PhotoCatalog');
        }
    }
    wp_die();
}
add_action('wp_ajax_get_photos_by_dates', 'get_photos_by_dates');
add_action('wp_ajax_nopriv_get_photos_by_dates', 'get_photos_by_dates');


function loadMorePhotos() {
    $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'offset'         => $offset
    );

    $photos = new WP_Query($args);

    if($photos->have_posts() ) {
        while( $photos->have_posts() ) {
            $photos->the_post(); 
            $post_id = get_the_ID();
            $catListNames = get_category_names($post_id);
            get_template_part('templatsParts/PhotoCatalog');
        }
    }
    wp_die();
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

//Loop for arrows & photo
function get_adjacent_post_loop($next = true) {
    $post = get_adjacent_post(false, '', $next);
    if (!$post) {
        $noAdjacentPost = array(
            'numberposts' => 1,
            'post_type'   => 'photo',
            'orderby'     => 'date',
            'order'       => $next ? 'DESC' : 'ASC'
        );
    $post = get_posts($noAdjacentPost)[0];
    }
    return $post;
}

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