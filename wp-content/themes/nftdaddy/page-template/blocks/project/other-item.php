<?php
global $devFunction;
$project_taxonomy = $devFunction->get_field('project_select_location', 'projects_'.$project->term_id);
$project_location = $devFunction->get_location_project($project_taxonomy);
$product_price = $devFunction->get_field('project_unit_price', 'projects_'.$project->term_id);

$size = 'home_project';
$price = '-$/m²';
if(!empty($product_price)) {
  $price = $product_price.'$/m²';
}
$feature_image = $devFunction->get_field('project_thumbnail', 'projects_'.$project->term_id);
?>
<div class="listing__item <?php echo $class_extra; ?>">
  <div class="properties properties--grid">
    <div class="<?php echo $ajaxclass; ?>properties__thumb">
      <a href="<?php echo get_term_link($project->term_id, 'projects'); ?>" title="<?php echo $project->name; ?>" class="item-photo">
        <img src="<?php echo $devFunction->get_image($feature_image['sizes'][$size], $size); ?>"
        alt="<?php echo $project->name; ?>">
      </a>
    </div>
    <!-- end of block .properties__thumb-->
    <div class="properties__details">
      <div class="properties__info">
        <a href="<?php echo get_term_link($project->term_id, 'projects'); ?>" title="<?php echo $project->name; ?>" class="properties__address">
          <span class="properties__address-street"><?php echo $project->name; ?></span>
          <?php if(!empty($project_location)): ?>
            <span class="properties__address-city"><?php echo $project_location; ?></span>
          <?php endif; ?>
        </a>
        <div class="properties__offer">
          <div class="properties__offer-column">
            <div class="properties__offer-value"><strong><?php echo $price ?? '-'; ?></strong>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end of block .properties__info-->
  </div>
  <!-- end of block .properties__item-->
</div>
