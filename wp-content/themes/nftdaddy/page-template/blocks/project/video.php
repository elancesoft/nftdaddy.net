<?php
global $devFunction;
  $project_video = $devFunction->get_field('project_video');
  if(!empty($project_video)):
?>
<div class="widget js-widget widget--details widget--video-tour">
  <div class="widget__header">
    <h3 class="widget__title"><?php pll_e('Video') ?></h3>
  </div>
  <div class="widget__content">
    <div class="property__video">
      <iframe width="870" height="400" src="<?php echo $devFunction->get_video_embeb($project_video); ?>" 
        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="">
      </iframe>
    </div>
  </div>
</div>
<?php endif; ?>
