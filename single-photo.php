<?php get_header(); ?>
  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    
    <article class="post">

      <section class="topSection">

        <div>
          <h1 class="descriptionPicsTitle"><?php the_title(); ?></h1>
          <p class="descriptionPics" id="referenceId" >Référence : <?php  echo get_field ('reference'); ?></p>
          <p class="descriptionPics">Catégorie : <?php the_terms(get_the_ID(), 'categorie_photo'); ?></p>
          <p class="descriptionPics">Format : <?php the_terms(get_the_ID(), 'format'); ?></p>
          <p class="descriptionPics">Type : <?php echo get_field ('type'); ?></p>
          <p class="descriptionPics">Date : <?php echo get_the_date('Y'); ?></p>  
        </div>

        <hr class="wp-block-separator has-alpha-channel-opacity separatorDetailContact">

        <div class="mainPics">
          <?php the_post_thumbnail('large', array('class' => 'mainPics')); ?>
        </div>

      </section>

      <section class="middleSection">
        <p class="insterested">Cette photo vous intéresse ?</p>
        <button class="contactButton" type="submit" data-action= "<?php echo get_field('reference'); ?>"> Contact</button>
        <div class="navBox">
          <img class="navPic" src="<?php echo get_stylesheet_directory_uri() ?>/images/PhotosNMota/nathalie-0.jpeg">

          <div class="arrows">              
              <a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>">
                <img class="arrow" src="<?php echo get_stylesheet_directory_uri() ?>/images/leftArrow.png" alt="Previous Post">
              </a>           
              <a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>">
                <img class="arrow" src="<?php echo get_stylesheet_directory_uri() ?>/images/rightArrow.png" alt="Next Post">
              </a>          
          </div>

        </div>
      </section>

      <hr class="wp-block-separator has-alpha-channel-opacity separatorContact">

      <section class="bottomSection">
      <p class="alsoLike">Vous aimerez aussi</p>
      <div class="alsoLikePics">
        <img class="alsoLikePic" src="<?php echo get_stylesheet_directory_uri() ?>/images/PhotosNMota/nathalie-4.jpeg">
        <img class="alsoLikePic" src="<?php echo get_stylesheet_directory_uri() ?>/images/PhotosNMota/nathalie-5.jpeg">
      </div>
      </section>

    </article>

  <?php endwhile; endif; ?>
<?php get_footer(); ?>