<?php global $devFunction;
$project_title = $devFunction->get_field('project_title');
$content = $devFunction->get_field('project_content');
if(!$devFunction->is_array_empty($content)):
  ?>
  <div id="project_info" class="project-block property__description js-unhide-block">
    <?php if(!empty($project_title)): ?>
      <h4 class="property__subtitle"><?php echo $project_title; ?></h4>
    <?php endif; ?>
    <div class="property__description wp-editor">
      <?php echo do_shortcode($content); ?>
    </div>
  </div>
<?php endif; ?>
