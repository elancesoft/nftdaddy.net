<?php
global $devFunction;
$project_taxonomy = get_the_terms($project->ID, 'location');
$project_location = $devFunction->get_location_project($project_taxonomy);
$product_price = $devFunction->get_project_price($project->ID);
$project_type = get_the_terms($project->ID, 'type');
?>
<div class="listing__item home_project_list">
  <div class="properties properties--grid">
    <div class="properties__thumb">
      <a href="<?php echo get_permalink($project->ID); ?>" class="item-photo">
        <img src="<?php echo $devFunction->get_image(get_the_post_thumbnail_url($project->ID, 'home_project'), 'home_project'); ?>"
        alt="<?php echo $project->post_title; ?>">
      </a>
      <?php if(!empty($project_type[0]->name)): ?>
        <span class="properties__ribon"><?php echo $project_type[0]->name; ?></span>
      <?php endif; ?>
    </div>
    <!-- end of block .properties__thumb-->
    <div class="properties__details">
      <div class="properties__info">
        <a href="<?php echo get_permalink($project->ID); ?>" class="properties__address">
          <span class="properties__address-street"><?php echo $project->post_title; ?></span>
          <?php if(!empty($project_location)): ?>
            <span class="properties__address-city"><?php echo $project_location; ?></span>
          <?php endif; ?>
        </a>

        <div class="properties__offer">
          <div class="properties__offer-column">
            <div class="properties__offer-value"><strong><?php echo $product_price; ?></strong>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end of block .properties__info-->
  </div>
  <!-- end of block .properties__item-->
</div>
