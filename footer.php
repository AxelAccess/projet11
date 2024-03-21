<div class="lightbox">
    <a class="close"> </a>
    <div class="lightBoxArrowsPhoto">
        <a  class="lightBoxArrow">
            <p class="arrowLeftText"><img class="arrow" src="<?php echo get_stylesheet_directory_uri() ?>/images/leftArrowWhite.png" alt="Previous Post">Precedente</p>
        </a>
        <?php the_post_thumbnail('post-thumbnail', ['class' => 'lightBoxPic', 'data-infoPhoto' => 'infoPhoto' . get_the_ID()]);?>
        <a  class="lightBoxArrow">
        <p class="arrowLeftText">Suivant<img class="arrow" src="<?php echo get_stylesheet_directory_uri() ?>/images/rightArrowWhite.png" alt="Previous Post"></p>
        </a>
    </div> 
    <div class="infoPhotoLightBox">
        <p class="lightBoxRefPhoto">Référence : <?php  echo get_field ('reference'); ?></p>
        <p class="lightBoxCatPhoto">Catégorie : <?php the_terms(get_the_ID(), 'categorie_photo'); ?></p> 
    </div>         
        
    
</div>
<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>

