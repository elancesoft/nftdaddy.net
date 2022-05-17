<?php
global $devFunction;
$gallery = $devFunction->get_field('project_gallery');
$project_type = get_the_terms($post->ID, 'type');


$categories = get_the_category($post->ID);
$catId = '';
if (!empty($categories)) {

    foreach ($$categories as $key => $value) {
        $catId .= $value->term_id . ',';
    }
}
$catId = substr($catId, 0, -1);
$lastedPost = $devFunction->get_last_posts(5, 'prodcut', $post->ID, $term_id = $catId, 'category');

?>
<section class="section-beloved" style="clear: both;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>
                    Có thể bạn quan tâm
                </h2>
                <div class="slider-wrap  js--animate opacity-0" data-animation="fromBottom" data-deplay="0.3" data-module="SwiperBegin">
                    <!-- Slider main container -->
                    <div class="swiper-container swiper-beloved">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <?php foreach ($related_products as $related_product) : ?>

                                <?php
                                $post_object = get_post($related_product->get_id());
                                
                                ?>
                                <div class="swiper-slide">
                                    <div class="product-item">
                                        <a href="<?php echo get_the_permalink($post_object); ?>" title="<?php echo $post_object->post_title; ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url($post_object, array(273,273)) ?>" alt=<?php echo $post_object->post_title;?>" />
                                            <span><?php echo $post_object->post_title; ?></span>
                                            <strong><?php echo $related_product->get_price_html();?></strong>
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
</section>