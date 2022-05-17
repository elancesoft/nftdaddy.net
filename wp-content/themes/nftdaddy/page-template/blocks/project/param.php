<?php global $devFunction;
$project_param = $devFunction->get_field('project_param');
if(!$devFunction->is_array_empty($project_param['param'])):
  ?>
  <div class="project-block property__params" id="project_param">
    <?php if(!empty($project_param['title'])): ?>
      <h4 class="property__subtitle"><?php echo $project_param['title']; ?></h4>
    <?php endif; ?>
    <?php if(!empty($project_param['param'])): ?>
      <ul class="property__params-list">
        <?php foreach($project_param['param'] as $value): ?>
          <?php if(!empty($value['title']) && !empty($value['text'])): ?>
            <li><?php echo $value['title']; ?>:<strong><?php echo nl2br($value['text']); ?></strong></li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
<?php endif; ?>
