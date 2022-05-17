<?php get_header();
global $devFunction;
$term = get_queried_object();

?>
<section class="section-hero-3 js--animate opacity-0" data-animation="fromBottom" data-deplay="0.3">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="hero-wapper" style="background: url(<?php echo $devFunction->get_image(get_the_post_thumbnail_url($post, 'banner_page')); ?>) no-repeat center">
          <div class="inner">
            <h1><?php echo $term->name;?></h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section-default js--animate opacity-0" data-animation="fromBottom" data-deplay="0.3">
  <div class="container">
    <div class="row align-center">
      <?php while (have_posts()) : the_post();
       ?>
        <div class="column">
          <div class="news-item">
            <div class="news-img">
              <a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo $post->post_title; ?>">
                <img src="<?php echo get_the_post_thumbnail_url($post->ID, array(150,150)) ?>" alt="<?php echo $post->post_title; ?>">
              </a>
            </div>
            <div class="news-info">
              <h3 class="news-title"><a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo $post->post_title; ?>"><?php echo $news->post_title; ?></a>
              </h3>
              <div class="news-desc"><?php echo $devFunction->get_excerpt_post($post, 50); ?></div>
              <a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo $post->post_title; ?>" class="readmore-btn">Xem thêm</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <div class="row">

      <div class="pagination-links">
        <?php
        $totalPage = wp_count_posts('post')->publish;
        echo $devFunction->pagination(['total' => ceil($totalPage / 9)]);
        ?>
      </div>

    </div>
  </div>
</section>
<?php get_footer(); ?>