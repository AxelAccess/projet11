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
<?php
// Custom query to retrieve 'photos' post type
$args = array(
    'post_type' => 'photo',
    'posts_per_page' => 8, // Nombre d'articles à afficher
);

$photo_query = new WP_Query($args);

if ($photo_query->have_posts()) {
    while ($photo_query->have_posts()) {
        $photo_query->the_post();       
?>
        <div>
            <?php
           
            if (has_post_thumbnail()) {
                the_post_thumbnail('full', array('class' => 'photoCatalogPics'));
            }
            ?>
            <!-- Ajoutez d'autres balises HTML ou PHP selon vos besoins -->
        </div>
        <?php
    }

    // Réinitialise la requête postdata
  
}
?>
</section>