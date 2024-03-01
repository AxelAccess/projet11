<div>
<?php    
    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 1, 
        'orderby'        => 'rand', 
    );


    $photo_query = new WP_Query($args);

    if ($photo_query->have_posts()) {
        $random_photo = $photo_query->posts[array_rand($photo_query->posts)];

        $photo_url = wp_get_attachment_image_src(get_post_thumbnail_id($random_photo->ID), 'full')[0];
            echo '<img src="' . $photo_url . '" alt="heroHeader" class="heroHeader">';
        }
?>
    <img class="titleHeader" src="<?php echo get_stylesheet_directory_uri() ?>/images/TitreHeader.png">
</div>