<div class="lightbox">
    <a class="close"> </a>
    <div class="lightBoxArrowsPhoto">
        <a  class="lightBoxArrow">
            <p class="arrowLeftText"><img class="arrow" src="<?php echo get_stylesheet_directory_uri() ?>/images/leftArrowWhite.png" alt="Previous Post">Precedente</p>
        </a>
        <div id="infoPhoto<?php echo get_the_ID(); ?>">
        <img src="" class="lightBoxPic" data-infoPhoto="infoPhoto<?php echo get_the_ID(); ?>">
        </div> 
        <a class="lightBoxArrow">
        <p class="arrowLeftText">Suivant<img class="arrow" src="<?php echo get_stylesheet_directory_uri() ?>/images/rightArrowWhite.png" alt="Previous Post"></p>
        </a>
    </div> 
    <div class="infoPhotoLightBox">
    <p class="lightBoxRefPhoto">Référence : <span id="lightboxRef"></span></p>
<p class="lightBoxCatPhoto">Catégorie : <span id="lightboxCat"></span></p>
    </div>         
        
    
</div>
<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>

