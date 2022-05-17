<?php global $devFunction;
$project_information = $devFunction->get_field('project_information');
// get project Directions
$project_direction = get_the_terms($post->ID,'direction');
if(!$devFunction->is_array_empty($project_information)):
  ?>
  <div class="project-block property__params" id="project_param">
    <h4 class="property__subtitle"><?php echo pll_e('Project Information'); ?></h4>
    <ul class="property__params-list">
      <li><?php echo pll_e('Area'); ?>:
        <strong><?php echo !empty($project_information['area']) ? $project_information['area'] : '-'; ?></strong>
      </li>
      <li><?php echo pll_e('Bathrooms:'); ?>
        <strong><?php echo !empty($project_information['bathrooms']) ? $project_information['bathrooms'] : '-'; ?></strong>
      </li>
      <li><?php echo pll_e('Bedrooms'); ?>:
        <strong><?php echo !empty($project_information['bedrooms']) ? $project_information['bedrooms'] : '-'; ?></strong>
      </li>
      <li><?php echo pll_e('Directions'); ?>:
        <strong><?php echo !empty($project_direction[0]->name) ? $project_direction[0]->name : '-'; ?></strong>
      </li>

    </ul>

  </div>
<?php endif; ?>
