<?php global $devFunction;
$group_text_img = $devFunction->get_field('group_text_img');
if(!$devFunction->is_array_empty($group_text_img)):
  ?>
  <div class="row last-about-row">
    <div class="col-sm-6 about-info about-info2">
      <?php if(!empty($group_text_img['group_left']['title'])): ?>
        <h3 class="about-title"><?php echo $group_text_img['group_left']['title']; ?></h3>
      <?php endif;  ?>
      <?php echo $group_text_img['group_left']['text']; ?>
    </div>
    <?php if(!empty($group_text_img['group_right']['image']['sizes']['about_block'])): ?>
      <div class="col-sm-6 about-info-img-right">
        <img src="<?php echo $group_text_img['group_right']['image']['sizes']['about_block']; ?>"
        alt="<?php echo $group_text_img['group_left']['title']; ?>" class="resp-img">
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>
