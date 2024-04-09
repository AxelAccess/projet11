<?php
$post_id = get_the_ID();
$catListNames = get_category_names($post_id);
?>

<div class="overlay">
    <a>
        <?php the_post_thumbnail('large', [
            'class' => 'alsoLikePic', 'data-infoPhoto' 
                    => 'infoPhoto' . get_the_ID(), 'data-ref' 
                    => get_field ('reference'), 'data-cat' => $catListNames
        ]);?>                 
    </a>
    <div id="infoPhoto<?php echo get_the_ID(); ?>" class="infoPhoto hide"> 
        <a class="eyeIco" href="<?php the_permalink(); ?>">  
            <span> <img src="<?php echo get_template_directory_uri(); ?>/images/Icon_eye.svg"></span>
        </a>
        <span class="fullScreenIco"> <img  src="<?php echo get_template_directory_uri(); ?>/images/iconFullscreen.png"></span>
        <p class="refPhoto">Référence : <?php  echo get_field ('reference'); ?></p>
        <p class="catPhoto">Catégorie : <?php the_terms(get_the_ID(), 'categorie_photo'); ?></p>
    </div>          
</div>
        


