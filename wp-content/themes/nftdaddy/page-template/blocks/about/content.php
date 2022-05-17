<?php
global $devFunction;
$content = $devFunction->get_field('group_content');
$title = $content['group_right']['about_content_title'];
$text = $content['group_right']['about_content_text'];
?>
<div class="row first-about-row">
  <?php if(!empty($content['group_left']['about_content_image']['sizes']['about_block'])): ?>
    <div class="col-sm-6 about-info-img">
      <img src="<?php echo $content['group_left']['about_content_image']['sizes']['about_block']; ?>"
      alt="<?php echo $title; ?>"
      class="resp-img">
    </div>
  <?php endif;  ?>

  <?php if(!empty($text)): ?>
    <div class="col-sm-6 about-info">
      <?php if(!empty($title)): ?>
        <h3 class="about-title"><?php echo $title; ?></h3>
      <?php endif; ?>
      <?php echo $text; ?>
    </div>
  <?php endif; ?>
</div>
