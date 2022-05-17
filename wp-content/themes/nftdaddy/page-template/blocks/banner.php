<?php
global $devFunction;
$banner_group = $devFunction->get_field('banner_group');

if(!$devFunction->is_array_empty($banner_group)):
?>
<div class="banner banner--subpage banner--subpage-slider">
  <?php foreach($banner_group as $banner_item): ?>
    <?php
    $banner = array(
      'image' => $banner_item['banner_image'],
      'title' => $banner_item['banner_title'],
      'subtitle' => $banner_item['banner_sub_title'],
      'video' => $banner_item['banner_video_link']
    );

    ?>
    <?php if(!empty($banner['video'])): ?>
      <a href="<?php echo $banner['video']; ?>" class="banner__video">
      <?php endif; ?>
      <div class="banner__item" style="background: url(<?php echo $devFunction->get_banner($banner['image']['sizes']['home_banner'], 'home_banner'); ?>)">
        <div class="banner__caption">
          <div class="container">
            <?php if(!empty($banner['title'])): ?>
              <h2 class="banner__title"><?php echo $banner['title']; ?></h2>
            <?php endif; ?>
            <?php if(!empty($banner['subtitle'])): ?>
              <h4 class="banner__subtitle"><?php echo $banner['subtitle']; ?></h4>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php if(!empty($banner['video'])): ?>
      </a>
    <?php endif; ?>
  <?php endforeach; ?>
</div>
<?php else: ?>
  <?php
  $default_banner = $devFunction->get_option('opt_banner_default');
  $banner =  $default_banner['sizes']['banner_top'] ?? THEME_URL.'/assets/images/default-image.png';
 ?>
 <div class="banner banner--subpage">
   <div class="banner__item" style="background: url(<?php echo $banner; ?>)">
   </div>
 </div>

<?php endif; ?>
