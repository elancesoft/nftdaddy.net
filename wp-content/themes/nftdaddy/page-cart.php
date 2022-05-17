<?php get_header();
global $devFunction;
?>
<section class="section-default js--animate opacity-0" data-animation="fromBottom" data-deplay="0.3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="content-wapper">
          <h3><?php the_title(); ?></h3>
          <div class="wp-editor">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('blocks/page', 'wishlist'); ?> 
<?php get_footer(); ?>