<?php global $devFunction;
$project_title = $devFunction->get_field('project_property_title');
$project_property = $devFunction->get_field('project_amenities');
if(!empty($project_property)):
  ?>
  <div class="property__params">
    <?php if(!empty($project_title)): ?>
      <h4 class="property__subtitle"><?php echo $project_title; ?></h4>
    <?php endif; ?>
    <ul class="property__params-list property__params-list--options">
      <?php foreach($project_property as $property): ?>
        <?php if(!empty($property['text'])): ?>
          <li><?php echo $property['text']; ?></li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
