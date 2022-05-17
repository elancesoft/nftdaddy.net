<?php
global $devFunction;
$categories = get_the_category($data->ID);
$arr_category = '';
if(!empty($categories)) {
  foreach($categories as $cat) {
    $arr_category .= '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>, ';
  }
  $arr_category = substr($arr_category, 0, -2);
}
?>
<div class="listing__item">
  <article class="article--list">
    <div class="article__item-header">
      <time class="article__time"><?php echo get_the_time('M', $data) ?><strong><?php echo get_the_time('Y', $data) ?></strong></time>
      <div class="article__item-info">
        <h3 class="article__item-title"><a href="<?php echo get_permalink($data->ID); ?>"><?php echo $data->post_title; ?></a></h3>
        <?php if(!empty($arr_category)): ?>
          <div class="article__tags"><?php pll_e('Categories:'); ?> <?php echo $arr_category; ?> </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="clearfix"></div>  
      <a href="<?php echo get_permalink($data->ID); ?>" class="article__preview" title="<?php echo $data->post_title; ?>">
        <img src="<?php echo $devFunction->get_image(get_the_post_thumbnail_url($data->ID, 'post_detail'), 'post_detail'); ?>" alt="<?php echo $data->post_title; ?>">
      </a>
      <?php if(!empty($data->post_excerpt)): ?>
        <div class="article__intro">
          <p><?php echo $data->post_excerpt; ?></p>
        </div>
      <?php endif; ?>
      <a href="<?php echo get_permalink($data->ID); ?>" class="article__more" title="<?php echo $data->post_title; ?>"><?php pll_e('Read more'); ?></a>
    </article>
  </div>
