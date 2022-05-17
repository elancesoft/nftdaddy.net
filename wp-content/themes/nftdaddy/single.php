<?php get_header();
global $devFunction;
$category = get_the_category($post->ID);

?>
<section class="section-hero-3 js--animate opacity-0" data-animation="fromBottom" data-deplay="0.3">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="hero-wapper" style="background: url(<?php echo $devFunction->get_image(get_the_post_thumbnail_url($post, 'banner_page')); ?>) no-repeat center">
          <div class="inner">
            <!-- <?php if(!empty($category)): ?>
                <h2><?php echo $category[0]->name; ?></h2>
          <?php endif; ?> -->
          </div>
        </div> 
      </div>
    </div>
  </div>
</section>
<section class="section-default js--animate opacity-0" data-animation="fromBottom" data-deplay="0.3">
  <div class="container">
    <div class="row align-center">
      <div class="col-md-10">
        <div class="content-wapper blog-detail">
          <h1><?php the_title(); ?></h1>         
          <div class="meta-head" style="text-align: center;">
          <!-- <span class="date"><?php //the_time('d-m-Y'); ?></span><br>
          <span class="author"><?php //echo get_the_author_meta('display_name', $post->post_author); ?></span> -->
        </div>
          <div class="wp-editor">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_template_part('blocks/post', 'related'); ?> 
<?php get_footer(); ?>