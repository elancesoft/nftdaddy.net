<?php global $devFunction;
$blockItems = $devFunction->get_field('home_block_items');
$blockTitle = $devFunction->get_field('ome_block_title');
?>
<div class="section-homeGallery">
  <div class="container-fluid">
    <?php if(!empty($blockTitle)) : ?>
    <div class="row">
      <div class="col">
        <h2><?php echo $blockTitle; ?></h2>
      </div>
    </div>
    <?php endif; ?>
    <?php if(!empty($blockItems)): ?>
    <div class="row">
      <?php foreach($blockItems as $key => $value): ?>
      <?php if(!empty($value['image'])): ?>
      <div class="col-12 col-md-3"><a href="<?php echo $value['link']; ?>" title="<?php echo $value['text']; ?>">
          <figure><img class="lazy" style="margin: 0 auto;display: block"
              data-original="<?php echo $value['image']['sizes']['home_block_items']; ?>"
              alt="<?php echo $value['text']; ?>"
              data-src="<?php echo $value['image']['sizes']['home_block_items']; ?>">
            <?php if(!empty($value['text'])): ?>
            <div class="figure-hover">
              <div class="inside">
                <div class="description short-description">
                  <p class="title"><?php echo $value['text']; ?></p>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </figure>
        </a></div>
      <?php endif; ?>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</div>