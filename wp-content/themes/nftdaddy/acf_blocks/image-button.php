<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'banner-home';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
global $devFunction;
// Load values and assign defaults.

$home_banner_group = $devFunction->get_field('home_banner_group');
$info_group = $devFunction->get_field('info_group');
if(!empty($home_banner_group['items'])):
 ?>
<div class="home-banner-sec sec">    
    <div class="home-banner-slider is-slider swiper-nav-inside">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach($home_banner_group['items'] as $key => $value): ?>
                <div class="swiper-slide">
                    <div class="home-banner-item" style="background-image: url(<?php echo $value['banner_img']?>);">
                        <div class="home-banner-info">
                            <?php if(!empty($value['subtitle'])): ?>
                            <p class="home-banner-sub-title"><?php echo $value['subtitle']; ?></p>
                            <?php endif; ?>
                            <?php if(!empty($value['title'])):?>
                            <p class="home-banner-title"><?php echo $value['title']; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <?php endif; ?>
    <?php if(!empty($info_group)): ?>
    <div class="home-banner-actions">
        <?php foreach($info_group['info_group'] as $key => $value): ?>
        <a href="<?php echo $value['link']; ?>" class="home-banner-action" title="<?php echo $value['title']; ?>">
            <img src="<?php echo $value['icon']; ?>" alt="<?php echo $value['title']; ?>">
            <?php if(!empty($value['title'])): ?>
            <span class="home-banner-action-title"><?php echo $value['title']; ?></span>
            <?php endif; ?>
            <?php if(!empty($value['text'])): ?>
            <span class="home-banner-action-desc"><?php echo $value['text']; ?></span>
            <?php endif; ?>
        </a>
        <?php endforeach; ?>
    </div>   
</div>
<?php endif; ?>