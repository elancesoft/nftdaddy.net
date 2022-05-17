<?php
global $devFunction;

$gallery_images = $devFunction->get_field('gallery_images', $photoData);
$socialArr = [
  'facebook' => $devFunction->get_field('photo_facebook', $photoData),
  'twitter' => $devFunction->get_field('photo_twitter', $photoData),
  'instagram' => $devFunction->get_field('photo_instagram', $photoData),
  'pinterest' => $devFunction->get_field('photo_pinterest', $photoData),
  ];
?>
<div class="section-portfolioGallery">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="image-slider">
          <ul class="portfolio-slider slider">
            <?php $i = 3; $j = 0; 
                    foreach($gallery_images as $key => $image): 
                      if($i == $j) break;
                  ?>
            <li class="photo-item">
              <figure><img data-lazy="<?php echo $image['image']['sizes']['photo_item']; ?>"
                  alt="<?php echo $photoData->post_title; ?>"></figure>
            </li>
            <?php $j++;  endforeach; ?>
          </ul>
          <div class="social-links">
            <ul>
              <?php if(!empty($socialArr['twitter'])): ?>
              <li><a class="fa fa-twitter" href="<?php echo $socialArr['twitter']; ?>" target="_blank"></a></li>
              <?php endif; ?>
              <?php if(!empty($socialArr['facebook'])): ?>
              <li><a class="fa fa-facebook" href="<?php echo $socialArr['facebook']; ?>" target="_blank"></a></li>
              <?php endif; ?>
              <?php if(!empty($socialArr['instagram'])): ?>
              <li><a class="fa fa-tumblr" href="<?php echo $socialArr['instagram']; ?>" target="_blank"></a></li>
              <?php endif; ?>
              <?php if(!empty($socialArr['pinterest'])): ?>
              <li><a class="fa fa-pinterest" href="<?php echo $socialArr['pinterest']; ?>" target="_blank"></a></li>
              <?php endif; ?>
            </ul>
            <?php if(!empty($gallery_images)): ?>
            <div class="tool-slider"><a class="btn-prev">{ prev</a><span>/</span><a class="btn-next">next }</a></div>
            <div class="counter-wrap"></div>
            <?php endif; ?>
          </div>
          <div class="infor">
            <div class="owner"><a href="<?php echo get_permalink($photoData); ?>"
                title="<?php echo $photoData->post_title; ?>"><?php echo $photoData->post_title ?></a>
            </div>
            <div class="cat"><?php echo get_the_terms('photots', $photoData->ID);?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End of sticky menu -->