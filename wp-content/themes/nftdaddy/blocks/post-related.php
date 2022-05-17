<?php
global $devFunction;

$categories = get_the_category($post->ID);
$catId = '';
if(!empty($categories)) {

  foreach ($$categories as $key => $value) {
      $catId .= $value->term_id.',';
  }
}
$catId = substr($catId, 0,-1);
$lastedPost = $devFunction->get_last_posts(5,'post', $post->ID, $term_id = $catId, 'category');

if (!empty($lastedPost)) :
?>
 <section class="section-default bg-white opacity-0 animated" data-animation="fromBottom" data-deplay="0.3" style="transform: translate(0px, 0px); opacity: 1;">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h3> Có thể bạn quan tâm </h3> 
            <div
              class="slider-wrap  js--animate opacity-0" data-animation="fromBottom" data-deplay="0.3" data-module="SwiperBegin">
              <!-- Slider main container -->
              <div
                class="swiper-container swiper-relatedPost">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                  <!-- Slides -->
                     <?php foreach ($lastedPost as $key => $value) : ?>
                    <div class="swiper-slide">
                      <div class="post-item">
                        <a href="<?php echo get_permalink($value) ?>" title="<?php echo $value->post_title; ?>">
                          <img src="<?php echo get_the_post_thumbnail_url($value, array(273,273)) ?>" alt="<?php echo $value->post_title; ?>" />
                          <span><?php echo $value->post_title; ?></span>
                          <p><?php echo $devFunction->get_excerpt_post($value, 20); ?></p>
                        </a>
                      </div>
                    </div>
                  <?php endforeach; ?>
               
                  </div>
                <!-- If we need pagination -->
                <div class="show-mb swiper-pagination"></div>
              </div>
              <!-- If we need navigation buttons -->
              <div class="bl swiper-button-prev hide-mb"></div>
              <div class="bl swiper-button-next hide-mb"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>