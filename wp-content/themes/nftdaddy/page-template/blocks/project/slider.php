<?php
global $devFunction;
$gallery = $devFunction->get_field('project_gallery');
$project_type = get_the_terms($post->ID, 'type');
?>

<div class="property__slider">
  <?php if(!empty($gallery)): ?>
    <?php if(!empty($project_type[0]->name)): ?>
      <div class="property__ribon"><?php echo $project_type[0]->name; ?></div>
    <?php endif; ?>
    <!-- <div class="property__ribon property__ribon--status property__ribon--done">transaction-related</div> -->
    <div id="properties-thumbs" class="slider slider--small js-slider-thumbs">
      <div class="slider__block js-slick-slider">
        <?php $i = 0; ?>
        <?php foreach($gallery as $image): ?>
          <?php if(!empty($image['sizes']['project_gallery'])): ?>
            <div class="slider__item slider__item--<?php echo $i; ?>">
              <a href="<?php echo $image['url']; ?>" data-size="1740x960" data-gallery-index='<?php echo $i; ?>' class="slider__img js-gallery-item">
                <img data-lazy="<?php echo $image['sizes']['project_gallery']; ?>" src="<?php echo $image['sizes']['project_gallery']; ?>" alt="">
                <!-- <span class="slider__description"></span> -->
              </a>
            </div>
          <?php endif; ?>
          <?php $i++; endforeach; ?>
        </div>
      </div>
      <div class="slider slider--thumbs">
        <div class="slider__wrap">
          <div class="slider__block js-slick-slider">
            <?php $j = 0; ?>
            <?php foreach($gallery as $thumbnail): ?>
              <?php if(!empty($thumbnail['sizes']['project_thumbnail'])):  ?>
                <div data-slide-rel='<?php echo $j; ?>' class="slider__item  slider__item--<?php echo $j; ?>">
                  <div class="slider__img"><img data-lazy="<?php echo $thumbnail['sizes']['project_thumbnail']; ?>"
                    src="<?php echo $thumbnail['sizes']['project_thumbnail']; ?>" alt=""></div>
                  </div>
                <?php endif; ?>
                <?php $j++; ?>
              <?php endforeach; ?>
            </div>
            <button type="button" class="slider__control slider__control--prev js-slick-prev">
              <svg class="slider__control-icon">
                <use xlink:href="#icon-arrow-left"></use>
              </svg>
            </button>
            <button type="button" class="slider__control slider__control--next js-slick-next">
              <svg class="slider__control-icon">
                <use xlink:href="#icon-arrow-right"></use>
              </svg>
            </button>
          </div>
        </div>
      <?php else: ?>
        <?php if(has_post_thumbnail($post->ID)): ?>
        <?php echo get_the_post_thumbnail($post->ID, 'project_feature'); ?>
        <?php endif; ?>
      <?php endif; ?>
      </div>
