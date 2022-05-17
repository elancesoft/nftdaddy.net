<?php
global $devFunction;
$group_image = $devFunction->get_field('group_image');

if(!$devFunction->is_array_empty($group_image)):
  ?>
  <div class="row about-images-row">
      <?php foreach($group_image as $key => $image):?>
        <?php if(!empty($image['image']['sizes']['about_image'])): ?>
          <div class="col-sm-4">
            <img class="resp-img" src="<?php echo $image['image']['sizes']['about_image']; ?>" alt="">
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
  </div>
<?php endif; ?>
