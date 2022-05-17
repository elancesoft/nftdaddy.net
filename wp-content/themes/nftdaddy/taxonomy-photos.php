<?php 
/* Template Name: Photos Template */
get_header();
global $devFunction;
$tax = get_queried_object();
$tax_id = $tax->term_id;
$page = get_query_var( 'paged' );
$photoData =  $devFunction->get_last_posts(4, 'photo','',$tax->term_id,'photos', $page); 
?>
<main class="home-page" id="main">
  <div class="filters-media">
    <div class="container-fluid">
      <div class="row">
        <div class="col"></div>
      </div>
      <ul class="photo-cat">
        <li><a href="#" data-slug="<?php echo $tax->slug; ?>" class="active"><?php echo $tax->name; ?></a></li>
      </ul>
    </div>
  </div>
  <div class="ajax-data-photo">
  <?php if(!empty($photoData)): ?>
  <?php foreach($photoData as $key => $article):
          // gallery of photo
      $gallery_images = $devFunction->get_field('gallery_images', $article);
  ?>
  <div class="section-portfolioGallery">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="image-slider">
            <?php if(!empty($gallery_images)): ?>
            <ul class="portfolio-slider slider">
              <?php $i = 3; $j = 0; 
                foreach($gallery_images as $key => $image): 
                 // if($i == $j) break;
              ?>
              <li class="photo-item ajax-item-<?php echo $article->ID?>">
                <figure><img data-lazy="<?php echo $image['image']['sizes']['photo_item']; ?>"
                    alt="<?php echo $article->post_title; ?>"></figure>
              </li>
              <?php $j++;  endforeach; ?>
            </ul>
            <?php endif; ?>
            <div class="social-links">
                <ul>
                  <li><a class="fa fa-twitter"
                      href="<?php echo $devFunction->generate_twitter_share_link(get_the_permalink($article->ID)); ?>"
                      target="_blank"></a></li>
                  <li><a class="fa fa-facebook"
                      href="<?php echo $devFunction->generate_facebook_share_link(get_the_permalink($article->ID)); ?>"
                      target="_blank"></a></li>
                  <li><a class="fa fa-tumblr" href="https://www.instagram.com/" target="_blank"></a></li>
                  <?php if(!empty($image[0]['image']['sizes']['video_item'])): ?>
                  <li><a class="fa fa-pinterest"
                      href="<?php echo $devFunction->generate_pinterest_share_link($gallery_images[0]['image']['sizes']['video_item']); ?>"
                      target="_blank"></a></li>
                  <?php endif; ?>
                </ul>
                <?php if(!empty($gallery_images)): ?>
                <div class="tool-slider" data-id="<?php echo $video->ID; ?>" data-step='1'><a class="btn-prev">{
                    prev</a><span>/</span><a class="btn-next">next }</a></div>
                <div class="counter-wrap"></div>
                <?php endif; ?>
              </div>
            <div class="infor">
              <div class="owner"><a href="<?php echo get_permalink($article); ?>"
                  title="<?php echo $article->post_title; ?>"><?php echo $article->post_title ?></a>
              </div>
              <div class="cat"><?php the_terms($article->ID, 'photos');?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <?php endif; ?>
  </div>
  <div class="pagination">
    <?php
      echo $devFunction->pagination();
    ?>
  </div>
</main>

<?php get_footer(); ?>