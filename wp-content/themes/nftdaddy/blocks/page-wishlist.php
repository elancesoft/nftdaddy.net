<?php
global $devFunction;
$title = $devFunction->get_option('opt_wishlist_title');
$products = $devFunction->get_option('opt_wishlist_product');

if (!empty($products)) :
?>
  <section class="section-beloved">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2>
            <?php echo $title; ?>
          </h2>
          <div class="slider-wrap  js--animate opacity-0" data-animation="fromBottom" data-deplay="0.3" data-module="SwiperBegin">
            <!-- Slider main container -->
            <div class="swiper-container swiper-beloved">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                <!-- Slides -->
                <?php foreach ($products as $key => $value) :
                  $product = wc_get_product($value->ID);
                ?>
                  <div class="swiper-slide">
                    <div class="product-item">
                      <a href="<?php echo get_permalink($value) ?>" title="<?php echo $value->post_title; ?>">
                        <img src="<?php echo get_the_post_thumbnail_url($value, 'product_home') ?>" alt="<?php echo $value->post_title; ?>" />
                        <span><?php echo $value->post_title; ?></span>
                        <strong><?php echo $product->get_price(); ?></strong>
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
          <p class="ico-ending"><img class="h" src="<?php echo THEME_URL ?>/assets/images/icon-tree01.svg" alt="logo" />
          </p>
        </div>
      </div>
    </div>
  <?php endif; ?>