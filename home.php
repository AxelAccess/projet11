<?php 
get_header();  
get_template_part('templatsParts/heroHeader');
?>

<section class="alignForms">
    <div class=blockForms>
        <select id="photoCategorySelect" name="event" class="forms">
            <option value="photoCategories" disabled selected class="hiddenOption">Catégories</option>
            <?php 
            $photoCategories = get_categories(
                array(
                    'taxonomy' => 'categorie_photo',  
                )
            ); 
            foreach($photoCategories as $photoCategorie):?>
            <option value="<?php echo $photoCategorie->term_id?>"> <?php echo $photoCategorie->name ?></option>
            <?php endforeach;?>
        </select>

        <select id="formatSelect" name="format" class="forms">
            <option value="formatsPhoto" disabled selected class="hiddenOption">Formats</option>
            <?php 
            $formatsPhoto = get_categories(
            array(
                'taxonomy' => 'format',  
            )
        ); 
        foreach($formatsPhoto as $photoCategorie):?>
        <option value="<?php echo $photoCategorie->term_id?>"><?php echo $photoCategorie->name ?></option>
        <?php endforeach;?>
        </select>
    </div>

    <div class=blockFormsForRight>
        <select id="publishSelect" name="publish" class="forms">
            <option value="" disabled selected class="hiddenOption">Trier par</option>
            <option value="newest">plus récentes</option>           
            <option value="oldest">plus anciennes</option>
        </select>
    </div>
</section>

<section class="picturesList">
    <div id="photo-container" class="photo-container"> 
        <?php      
        $args = array(
            'post_type'      => 'photo',
            'posts_per_page' => 8,       
        );
        $photos = new WP_Query($args);  
        if($photos->have_posts() ) : while( $photos->have_posts() ) : $photos->the_post(); 
        get_template_part('templatsParts/PhotoCatalog');
        endwhile; endif; wp_reset_postdata();?>
    </div>
 

    <div class= "centerButton">
        <button id="loadMorePhoto" 
            data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>" 
            data-action="loadMorePhotos"
            data-nonce="<?php echo wp_create_nonce('loadMorePhotos'); ?>">
            Charger plus
        </button>
    </div>
</section>

<?php
get_footer();