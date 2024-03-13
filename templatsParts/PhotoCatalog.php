<section class="alignForms">
    <div class=blockForms>
        <select name="event" class="forms">   
            <option value="categoriesPhoto">catégories</option>
            <option value="Reception">Réception</option>
            <option value="Mariage">Mariage</option>
            <option value="Concert" >Concert</option>
            <option value="Television" >Télévision</option>
        </select>

        <select name="format" class="forms">
            <option value="" disabled selected>Formats</option>
            <option value="paysage">paysage</option>
            <option value="portrait">portrait</option>
        </select>
        </div>

        <div class=blockFormsForRight>
        <select name="sort" class="forms">
            <option value="" disabled selected>Trier par</option>
            <option value="newest">plus récentes</option>
            <option value="oldest">plus anciennes</option>
        </select>
    </div>
</section>

<section class="picturesList">
    <div class="photo-container">       
        <?php $args = array(
            'post_type'      => 'photo',
            'posts_per_page' => 8,
        );
        $photo_query = new WP_Query($args);
        if ($photo_query->have_posts()) {
            while ($photo_query->have_posts()) {
                $photo_query->the_post();
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full', array('class' => 'photoCatalogPics'));
                }
            }          
        }?>        
    </div>

    <button id="loadMorePhoto" 
        data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>" 
        data-action="loadMorePhotos"
        data-nonce="<?php echo wp_create_nonce('loadMorePhotos'); ?>">
        Charger plus
    </button>

</section>


