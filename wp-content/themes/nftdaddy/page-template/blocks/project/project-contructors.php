<?php global $devFunction;
$project_title = $devFunction->get_field('project_contructor_title');
$contructors = $devFunction->get_field('project_select_contructor');
if(!$devFunction->is_array_empty($contructors)):
  ?>
  <div id="project_contructor" class="project-block property__description js-unhide-block">
    <?php if(!empty($project_title)): ?>
      <h4 class="property__subtitle"><?php echo $project_title; ?></h4>
    <?php endif; ?>
    <?php if(!empty( $contructors->description)): ?>
      <div class="property__description wp-editor">
        <?php echo $contructors->description; ?>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>
