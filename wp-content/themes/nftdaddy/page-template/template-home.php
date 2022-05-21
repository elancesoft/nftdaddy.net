<?php
/* Template Name: Home Template */
get_header();

?>
<?php if (wp_is_mobile()) : ?>
	<div class="innerpage-background bg-cover md:pt-40 pt-28 pb-7 md:pb-14 relative" style="background-image: url(<?php echo THEME_URL ?>/assets/images/hero-banner-bg.svg);">
		<section class="innerpage-area"></section>
	</div>
<?php endif; ?>
<div class="container md:pt-28 <?php echo !wp_is_mobile() ? 'pt-14' : '' ?> md:pb-28 pb-14">
	<?php the_content();
	?>
</div>

<?php get_footer(); ?>