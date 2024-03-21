<section class="alignForms">
    <div class=blockForms>
        <select name="event" class="forms">   
            <option value="categoriesPhoto"disabled selected class="hiddenOption">catégories</option>
            <option value="Reception">Réception</option>
            <option value="Mariage">Mariage</option>
            <option value="Concert" >Concert</option>
            <option value="Television" >Télévision</option>
        </select>

        <select name="format" class="forms">
            <option value="" disabled selected class="hiddenOption">Formats</option>
            <option value="paysage">paysage</option>
            <option value="portrait">portrait</option>
        </select>
        </div>

        <div class=blockFormsForRight>
        <select name="publish" class="forms">
            <option value="" disabled selected class="hiddenOption">Trier par</option>
            <option value="newest">plus récentes</option>
            <option value="oldest">plus anciennes</option>
        </select>
    </div>
</section>



<section class="picturesList">
    <div class="photo-container"> 
    <?php 
    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 8,

        
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
            <span class="fullScreenIco" data-post-id="<?php echo get_the_ID(); ?>">
    <img src="<?php echo get_template_directory_uri(); ?>/images/iconFullscreen.png">
</span>
            <p class="refPhoto">Référence : <?php  echo get_field ('reference'); ?></p>
            <p class="catPhoto">Catégorie : <?php the_terms(get_the_ID(), 'categorie_photo'); ?></p>          
        </div>
    </div>
 

<?php endwhile; endif;  ?>

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


