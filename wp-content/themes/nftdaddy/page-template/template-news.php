<?php
/* Template Name: News Template */
get_header();

global $devFunction;
global $wp_query;
// get subPage

$parentId = $post->ID;
$parentPost = '';
$args = [
  'child_of' => $post->ID,
  'sort_column' => 'menu_order', 
  'sort_order' => 'asc',
  'post_status' => 'publish',
];
$subPage = get_pages($args);

if (empty($subPage) && $post->post_parent > 0) {
  $parentId = $post->post_parent;
  $args = [
    'post_type' => 'page',
    'parent' => $post->post_parent,
    'post_status'      => 'publish',
    'sort_column' => 'menu_order', 
    'sort_order' => 'asc'
  ];
  $subPage = get_pages($args);
}


if(!empty($subPage)) {
  $parentPost = get_post($parentId); 
}

?>
<section class="section-hero-3 js--animate opacity-0" data-animation="fromBottom" data-deplay="0.3">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="hero-wapper" style="background: url(<?php echo $devFunction->get_image(get_the_post_thumbnail_url($post, 'banner_page')); ?>) no-repeat center">
          <!-- <?php if(!empty($parentPost)): ?>
            <div class="inner">
              <h2 ><?php echo $parentPost->post_title; ?></h2>
            </div>
            <?php else: ?>
              <h2><?php echo $post->post_title; ?></h2>
        <?php endif; ?> -->
        </div>
        <?php if (!empty($subPage)) : ?>
          <div class="sub-navigation">
            <ul>
              <?php foreach($subPage as $key => $value): ?>
              <li><a class="<?php echo ($post->ID == $value->ID)? 'active': ''?>" href="<?php echo get_permalink($value); ?>" title="<?php echo $value->post_title; ?>"><?php echo $value->post_title; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<section class="section-default js--animate opacity-0" data-animation="fromBottom" data-deplay="0.3">
  <div class="container">
    <div class="row align-center">
      <div class="col-md-12">
        <div class="content-wapper">         
          <div class="wp-editor">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('blocks/page', 'wishlist'); ?> 
<?php get_footer(); ?>