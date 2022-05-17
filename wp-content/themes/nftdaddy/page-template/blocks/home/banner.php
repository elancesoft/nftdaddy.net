<?php
global $devFunction;
$banner = $devFunction->get_field('home_banner_group');

if(!empty($banner)):
  ?>
<div class="banner slider stick-dots">
  <?php foreach($banner as $key => $value): ?>
  <div class="slide">
    <div class="slide__img"><img class="full-image animated" src="" alt=""
        data-lazy="<?php echo $value['image']['url']; ?>" data-animation-in="zoomInImage"></div>
    <div class="slide__content">
      <div class="slide__content--headings">
        <?php if(!empty($value['title'])): ?>
          <h2 class="animated" data-animation-in="fadeInUp"><?php echo $value['title']; ?></h2>
        <?php endif; ?>
        <?php if(!empty($value['text'])): ?>
          <p class="animated" data-animation-in="fadeInUp" data-delay-in="0.3"><?php echo $value['text']; ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<?php endif; ?>