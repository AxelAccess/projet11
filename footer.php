<div class="lightbox">

    <a class="close"></a> 

    <div class="lightBoxArrowsPhoto">
        <a id="leftArrow" class="lightBoxArrow" data-id="<?php echo get_previous_post()->ID; ?>">
            <p class="arrowLeftText"> 
            <img class="arrow" src="<?php echo get_stylesheet_directory_uri()?>/images/leftArrowWhite.png" alt="Previous Post">Precedente</p>
        </a>

        <div id="infoPhoto <?php echo get_the_ID(); ?>">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full')?>" class="lightBoxPic">
        </div> 

        <a id="rightArrow" class="lightBoxArrow" data-id="<?php echo get_next_post()->ID; ?>">
            <p class="arrowRightText">Suivant
            <img class="arrow" src="<?php echo get_stylesheet_directory_uri() ?>/images/rightArrowWhite.png" alt="Next Post"></p>
        </a>
    </div>

    <div class="infoPhotoLightBox">
        <p class="lightBoxRefPhoto">Référence : <span id="lightboxRef"></span></p>
        <p class="lightBoxCatPhoto">Catégorie : <span id="lightboxCat"></span></p>
    </div>   
      
</div>

<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>

