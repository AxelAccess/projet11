<?php
    function enqueue_jquery() {
        wp_enqueue_script('jquery');
    }
    function theme_enqueue_styles() {
        wp_enqueue_style('twentytwentyone', get_stylesheet_directory_uri(). '/style.css'); 
        wp_enqueue_script('modale', get_stylesheet_directory_uri(). '/scripts/modale.js');
        wp_enqueue_script('morePhotoScript', get_stylesheet_directory_uri(). '/scripts/scriptLoadMorePhoto.js', array("jquery"));
        wp_localize_script('morePhotoScript', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
        wp_enqueue_script('contactReference', get_stylesheet_directory_uri(). '/scripts/contactRef.js', array("jquery"));
        wp_enqueue_script('lightBox', get_stylesheet_directory_uri(). '/scripts/lightBox.js', array("jquery"));
        wp_enqueue_script('navArrow', get_stylesheet_directory_uri(). '/scripts/NavArrow.js', array("jquery"));
        wp_localize_script('navArrow', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
        wp_enqueue_script('filter', get_stylesheet_directory_uri(). '/scripts/filter.js', array("jquery"));
        wp_localize_script('filter', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
    }
    add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');
    add_action('wp_enqueue_scripts', 'enqueue_jquery');


  //**Page principale**\\

  function loadMorePhotos() {

    $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;

    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'offset'         => $offset
    );

    $photos = new WP_Query($args);

    if($photos->have_posts() ) : while( $photos->have_posts() ) : $photos->the_post(); ?>  

    <div class="fixhover">
        <a>
            <?php the_post_thumbnail('post-thumbnail', ['class' => 'alsoLikePic', 'data-infoPhoto' => 'infoPhoto' . get_the_ID()]);?>
        </a>
        <div id="infoPhoto<?php echo get_the_ID(); ?>" class="infoPhoto hide"> 
            <a class="eyeIco" href="<?php the_permalink(); ?>">  
                <span> <img  src="<?php echo get_template_directory_uri(); ?>/images/Icon_eye.svg"></span>
            </a>
            <span class="fullScreenIco"> <img  src="<?php echo get_template_directory_uri(); ?>/images/iconFullscreen.png"></span>
            <p class="refPhoto">Référence : <?php  echo get_field ('reference'); ?></p>
            <p class="catPhoto">Catégorie : <?php the_terms(get_the_ID(), 'categorie_photo'); ?></p>          
        </div>
    </div>
 

<?php endwhile; endif;

    wp_die();
}
add_action('wp_ajax_loadMorePhotos', 'loadMorePhotos');
add_action('wp_ajax_nopriv_loadMorePhotos', 'loadMorePhotos');



    function loadMorePhotosreception() {
        $taxonomyPhoto = 'categorie_photo'; 
        $SubCategory = 'reception'; 
        $term = get_term_by('name', $SubCategory, $taxonomyPhoto);      
        $term_id = $term->term_id;
        $urls = array();
        $args = array(
            'post_type'      => 'photo',
            'posts_per_page' => 8,
            'tax_query'      => array(
                array(
                    'taxonomy' => $taxonomyPhoto,
                    'field'    => 'id',
                    'terms'    => $term_id,
                ),
            ),
        );
        $relatedPhotosQuery = new WP_Query($args);
        while ($relatedPhotosQuery->have_posts()) : $relatedPhotosQuery->the_post();
            $urls[] = get_the_post_thumbnail_url(get_the_ID(), 'large');
        endwhile;
        wp_send_json_success($urls);
        wp_reset_postdata();      
        return $urls;
    }
    add_action('wp_ajax_nopriv_morereception', 'loadMorePhotosreception');
    add_action('wp_ajax_morereception', 'loadMorePhotosreception');

    function receptionFilter() {
        $taxonomyPhoto = 'categorie_photo'; 
        $SubCategory = 'reception'; 
        $term = get_term_by('name', $SubCategory, $taxonomyPhoto);      
        $term_id = $term->term_id;
        $urls = array();
        $args = array(
            'post_type'      => 'photo',
            'posts_per_page' => 8,
            'tax_query'      => array(
                array(
                    'taxonomy' => $taxonomyPhoto,
                    'field'    => 'id',
                    'terms'    => $term_id,
                ),
            ),
        );
        $relatedPhotosQuery = new WP_Query($args);
        while ($relatedPhotosQuery->have_posts()) : $relatedPhotosQuery->the_post();
            $urls[] = get_the_post_thumbnail_url(get_the_ID(), 'large');
        endwhile;
        wp_reset_postdata();      
        return $urls;
    }
    add_action('wp_ajax_nopriv_reception', 'receptionFilter');
    add_action('wp_ajax_reception', 'receptionFilter');

    function weddingFilter() {
        $taxonomyPhoto = 'categorie_photo'; 
        $SubCategory = 'mariage'; 
        $term = get_term_by('name', $SubCategory, $taxonomyPhoto);
        $term_id = $term->term_id;
        $urls = array();
        $args = array(
            'post_type'      => 'photo',
            'posts_per_page' => 8,
            'tax_query'      => array(
                array(
                    'taxonomy' => $taxonomyPhoto,
                    'field'    => 'id',
                    'terms'    => $term_id,
                ),
            ),
        );

        $relatedPhotosQuery = new WP_Query($args);  
        while ($relatedPhotosQuery->have_posts()) : $relatedPhotosQuery->the_post();
            $urls[] = get_the_post_thumbnail_url(get_the_ID(), 'large');
        endwhile;
        wp_reset_postdata(); 
        return $urls;
    }
    add_action('wp_ajax_nopriv_Mariage', 'mariageFilter');
    add_action('wp_ajax_Mariage', 'mariageFilter');

    function concertFilter() {
        $taxonomyPhoto = 'categorie_photo'; 
        $SubCategory = 'concert'; 
        $term = get_term_by('name', $SubCategory, $taxonomyPhoto);       
        $term_id = $term->term_id;
        $urls = array();
        $args = array(
            'post_type'      => 'photo',
            'posts_per_page' => 8,
            'tax_query'      => array(
                array(
                    'taxonomy' => $taxonomyPhoto,
                    'field'    => 'id',
                    'terms'    => $term_id,
                ),
            ),
        );
        $relatedPhotosQuery = new WP_Query($args);  
        while ($relatedPhotosQuery->have_posts()) : $relatedPhotosQuery->the_post();
            $urls[] = get_the_post_thumbnail_url(get_the_ID(), 'large');
        endwhile;
        wp_reset_postdata(); 
        return $urls;
    }
    add_action('wp_ajax_nopriv_Concert', 'concertFilter');
    add_action('wp_ajax_Concert', 'concertFilter');

    function televisionFilter() {
        $taxonomyPhoto = 'categorie_photo'; 
        $SubCategory = 'television'; 
        $term = get_term_by('name', $SubCategory, $taxonomyPhoto);       
        $term_id = $term->term_id;
        $urls = array();

        $args = array(
            'post_type'      => 'photo',
            'posts_per_page' => 8,
            'tax_query'      => array(
                array(
                    'taxonomy' => $taxonomyPhoto,
                    'field'    => 'id',
                    'terms'    => $term_id,
                ),
            ),
        );
        $relatedPhotosQuery = new WP_Query($args);       
        while ($relatedPhotosQuery->have_posts()) : $relatedPhotosQuery->the_post();
            $urls[] = get_the_post_thumbnail_url(get_the_ID(), 'large');
        endwhile;
        wp_reset_postdata(); 
        return $urls;
    }
    add_action('wp_ajax_nopriv_Television', 'televisionFilter');
    add_action('wp_ajax_Television', 'televisionFilter');

    function paysageFilter() {
        $taxonomyPhoto = 'format'; 
        $SubCategory = 'paysage'; 
        $term = get_term_by('name', $SubCategory, $taxonomyPhoto);       
        $term_id = $term->term_id;
        $urls = array();
        $args = array(
            'post_type'      => 'photo',
            'posts_per_page' => 8,
            'tax_query'      => array(
                array(
                    'taxonomy' => $taxonomyPhoto,
                    'field'    => 'id',
                    'terms'    => $term_id,
                ),
            ),
        );
        $relatedPhotosQuery = new WP_Query($args);   
        while ($relatedPhotosQuery->have_posts()) : $relatedPhotosQuery->the_post();
            $urls[] = get_the_post_thumbnail_url(get_the_ID(), 'large');
        endwhile;       
        wp_reset_postdata(); 
        return $urls;
    }
    add_action('wp_ajax_nopriv_paysage', 'paysageFilter');
    add_action('wp_ajax_paysage', 'paysageFilter');

    function portraitFilter() {
        $taxonomyPhoto = 'format'; 
        $SubCategory = 'portrait'; 
        $term = get_term_by('name', $SubCategory, $taxonomyPhoto);   
        $term_id = $term->term_id;
        $urls = array();
        $args = array(
            'post_type'      => 'photo',
            'posts_per_page' => 8,
            'tax_query'      => array(
                array(
                    'taxonomy' => $taxonomyPhoto,
                    'field'    => 'id',
                    'terms'    => $term_id,
                ),
            ),
        );
        $relatedPhotosQuery = new WP_Query($args);       
        while ($relatedPhotosQuery->have_posts()) : $relatedPhotosQuery->the_post();
            $urls[] = get_the_post_thumbnail_url(get_the_ID(), 'large');
        endwhile;       
        wp_reset_postdata();         
        return $urls;
    }
    add_action('wp_ajax_nopriv_portrait', 'portraitFilter');
    add_action('wp_ajax_portrait', 'portraitFilter');

    function newestFilter() {
        $urls = array();
        $args = array(
            'post_type'      => 'photo',
            'posts_per_page' => 8,
            'orderby'        => 'date',
            'order'          => 'DESC'
        );   
        $relatedPhotosQuery = new WP_Query($args);        
        while ($relatedPhotosQuery->have_posts()) : $relatedPhotosQuery->the_post();
            $urls[] = get_the_post_thumbnail_url(get_the_ID(), 'large');
        endwhile;        
        wp_reset_postdata();    
        return $urls;
    }
    
    add_action('wp_ajax_nopriv_newest', 'newestFilter');
    add_action('wp_ajax_newest', 'newestFilter');
    
    function oldestFilter() {
        $urls = array();
        $args = array(
            'post_type'      => 'photo',
            'posts_per_page' => 8,
            'orderby'        => 'date',
            'order'          => 'ASC'
        );   
        $relatedPhotosQuery = new WP_Query($args);        
        while ($relatedPhotosQuery->have_posts()) : $relatedPhotosQuery->the_post();
            $urls[] = get_the_post_thumbnail_url(get_the_ID(), 'large');
        endwhile;
        wp_reset_postdata();    
        return $urls;
    }
    
    add_action('wp_ajax_nopriv_oldest', 'oldestFilter');
    add_action('wp_ajax_oldest', 'oldestFilter');

    function afficher_photos() {
        $type = $_POST['type'];
        $urls = array();
        if ($type == 'Reception') {$urls = receptionFilter();}
        if ($type == 'Mariage')   {$urls = weddingFilter();}
        if ($type == 'Concert')   {$urls = concertFilter();}
        if ($type == 'Television'){$urls = televisionFilter();}
        if ($type == 'paysage')   {$urls = paysageFilter();}
        if ($type == 'portrait')  {$urls = portraitFilter();}
        if ($type == 'newest')    {$urls = newestFilter();}
        if ($type == 'oldest')    {$urls = oldestFilter();}
        if ($type == 'loadMorereception') {$urls = loadMorePhotosreception();}
        echo json_encode($urls);
        wp_die(); 
    }
    add_action('wp_ajax_afficher_photos', 'afficher_photos');
    add_action('wp_ajax_nopriv_afficher_photos', 'afficher_photos');

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


   
