<?php get_header(); ?>
  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    
    <article class="post">

      <section class="topSection container">
        <div class="descriptionBlock">
          <h1 class="descriptionPicsTitle"><?php the_title(); ?></h1>
          <p class="descriptionPics" id="referenceId" >Référence : <?php  echo get_field ('reference'); ?></p>
          <p class="descriptionPics">Catégorie : <?php the_terms(get_the_ID(), 'categorie_photo'); ?></p>
          <p class="descriptionPics">Format : <?php the_terms(get_the_ID(), 'format'); ?></p>
          <p class="descriptionPics">Type : <?php echo get_field ('type'); ?></p>
          <p class="descriptionPics">Date : <?php echo get_the_date('Y'); ?></p>  
        </div>
        <div class="blocMainPic">
          <?php the_post_thumbnail('large', array('class' => 'mainPics')); ?>
        </div>
      </section>
      
      <section class="middleSection container">
        <div class="leftMiddleSection">
          <p class="insterested">Cette photo vous intéresse ?</p>
          <button class="contactButton" type="submit"> Contact</button>
        </div>
          <div class= "rightMiddleSection">
            <div class="navBox">           
              <img id="hoverImage" class="navPic" src="<?php echo get_the_post_thumbnail_url(get_adjacent_post_loop(true)->ID, 'thumbnail');?>">  
              <div class="arrows">              
                <a  class="leftArrow" 
                    data-id="<?php echo get_adjacent_post_loop(false)->ID;?>" 
                    href="<?php echo get_permalink(get_adjacent_post_loop(false)); ?>">
                    <img class="arrow" src="<?php echo get_stylesheet_directory_uri() ?>/images/leftArrow.png" alt="Previous Post">
                </a>
                <a  class="rightArrow" 
                    data-id="<?php echo get_adjacent_post_loop(true)->ID;?>" 
                    href="<?php echo get_permalink(get_adjacent_post_loop(true)); ?>">
                    <img class="arrow" src="<?php echo get_stylesheet_directory_uri() ?>/images/rightArrow.png" alt="Next Post">
                </a>
              </div>
            </div>
          </div>
      </section>

      <section class="bottomSection container">
        <p class="alsoLike">Vous aimerez aussi</p>
        <div class="alsoLikePics"><?php
          $idNotIn = array(get_the_ID());
          $photoCategorie = get_the_terms(get_the_ID(), 'categorie_photo');        
          $taxonomyPhoto = $photoCategorie[0]->taxonomy;
          $args = array(
              'post_type'      => 'photo',
              'posts_per_page' => 2,
              'post__not_in'   => $idNotIn,
              'tax_query'      => array(
                  array(
                      'taxonomy'   => $taxonomyPhoto,
                      'field'      => 'id',
                      'terms'      => wp_list_pluck($photoCategorie, 'term_id'),           
                  ),
              ),
              'orderby'        => 'rand',
          );
          $relatedPhotosQuery = new WP_Query($args);
          while ($relatedPhotosQuery->have_posts()) : $relatedPhotosQuery->the_post();
          get_template_part('templatsParts/PhotoCatalog');
          endwhile; ?>
        </div>
      </section>
    </article>
  <?php endwhile; endif; ?>
<?php get_footer(); ?>