<?php global $devFunction;
if(is_singular('project')) {
  $link = get_permalink($post->ID);
} else {
  // projects taxonomy
  $tax = get_queried_object();
  $link = get_term_link($tax, 'projects');
}
?>
<div class="social social--properties">
  <span class="social__title"><?php pll_e('Share this:'); ?></span>
  <?php if(function_exists('sharethis_inline_buttons')): ?>
    <?php echo sharethis_inline_buttons(); ?>
  <?php endif; ?>
  <!-- <a href="<?php echo $devFunction->generate_facebook_share_link($link); ?>" target="_blank" class="social__item">
    <i class="fa fa-facebook "></i>
  </a>
  <a href="<?php echo $devFunction->generate_twitter_share_link($link); ?>" target="_blank" class="social__item">
    <i class="fa fa-twitter "></i>
  </a>
  <a href="<?php echo $devFunction->generate_google_share_link($link); ?>" target="_blank" class="social__item">
    <i class="fa fa-google-plus "></i>
  </a> -->
</div>
