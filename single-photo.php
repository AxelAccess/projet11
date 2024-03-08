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
        
          <?php
          $categoriePhoto = get_the_terms(get_the_ID(), 'categorie_photo');
          $taxonomyPhoto = $categoriePhoto[0]->taxonomy;
          $args = array(
            'post_type'      => 'photo',
            'posts_per_page' => 2,
            'tax_query'      => array(
              array(
                'taxonomy'   => $taxonomyPhoto,
                'field'      => 'id',
                'terms'      => wp_list_pluck($categoriePhoto, 'term_id'),           
              ),
            ),
            'orderby'        => 'rand',
          );
          $relatedPhotosQuery = new WP_Query($args);
          if ($relatedPhotosQuery->have_posts()) :
            while ($relatedPhotosQuery->have_posts()) : $relatedPhotosQuery->the_post();
              ?>              
              <img class="alsoLikePic" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">              
              <?php
            endwhile;
          endif;
          ?>

        </div>
      </section>
    </article>
  <?php endwhile; endif; ?>
<?php get_footer(); ?>