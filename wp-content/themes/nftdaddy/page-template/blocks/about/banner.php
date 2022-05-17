<?php global $devFunction;
$arr = array(
  'banner' => $devFunction->get_field('about_banner_image'),
  'text' => $devFunction->get_field('about_banner_text')
);

if(!$devFunction->is_array_empty($arr)):
?>
<div class="top-slider type-2">
  <div class="asseccories-baner">
    <div class="bg ready data-jarallax" data-jarallax="5" style="background-image:url(<?php echo $arr['banner']['url']; ?>)"></div>
    <div class="container">
      <div class="title vertical-align about-banner">
        <h2 class="h1 style-3 font-fam-2"><?php the_title(); ?></h2>
        <?php if(!empty($arr['text'])): ?>
          <div class="simple-text font-fam-1">
            <p><?php echo $arr['text']; ?></p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
