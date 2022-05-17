<!DOCTYPE html>
<!--[if IE 8 ]>
<html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no" />
	<meta charset="<?php bloginfo('charset'); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="shortcut icon" href="<?php echo site_url() ?>/favicon.ico" />
	<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
	<style type="text/css">
		html {
			margin-top: 0 !important;
		}
	</style>
</head>
<?php global $devFunction; ?>

<body <?php body_class() ?>>
	<!-- HEADER -->
	<div class="main overflow-hidden">
		<div class="preloader">
			<div class="preloader-lds"><img src="<?php echo THEME_URL ?>/assets/images/preloader-img.gif" alt="title"></div>
		</div>
		<div class="cursor-direction bg-indigo-50"></div>

		<!--  ====================== Header Area Start =============================  -->
		<header class="header-area absolute header-bottombar header-area left-0 right-0 top-0">
			<div class="container ">
				<div class="header-area-inner  py-4 lg:py-2 relative  z-20">
					<nav class="header-nav flex items-center justify-between relative">
						<div class="header-logo">
							<a href="<?php echo site_url('/') ?>" class="flex items-center flex-shrink-0 mr-6">
								<img src="<?php echo THEME_URL ?>/assets/images/logo.png" alt="header-logo">
							</a>
						</div>

						<?php
						$args = array(
							'theme_location' => 'main',
							'container' => 'div',
							'container_class' => 'flex-grow lg:flex lg:items-center lg:w-auto',
							'menu_class' => 'toggle-menu-class dropdown-menu justify-end bg-white lg:bg-transparent  shadow lg:shadow-none absolute lg:relative inset-x-0 hidden lg:flex lg:flex-grow items-center mt-10 lg:mt-0 mobile-hover',
							'walker' => new MenuWalker()
						);
						wp_nav_menu($args);
						?>
					</nav>
				</div>
			</div>
		</header>
		<!--  ====================== Header Area End =============================  -->
		<?php if (!is_front_page()) : ?>
			<section data-aos="fade-in" data-aos-duration="500" class="bg-cover md:pt-40 pt-28 md:pb-28 pb-14 innerpage-area" style="background-image: url(<?php echo THEME_URL ?>/assets/images/hero-banner-bg.svg);">
				<div class="container">
					<div data-aos="fade-in" data-aos-duration="500" class="text-center page-title">
						<h1 class="mb-2 font-bold text-xl md:text-4xl lg:text-7xl text-coolGray-900"><?php the_title(); ?></h1>
						<ol class="flex justify-center font-medium">
							<li class="px-2 text-base font-normal text-coolGray-600"><a href="<?php echo site_url('/'); ?>" class="font-normal underline-hover">Home</a></li>
							<li class="text-base font-normal text-coolGray-600">/</li>
							<li class="px-2 text-base font-normal text-indigo-500"><?php the_title(); ?></li>
						</ol>
					</div>
					<div data-aos="fade-in" data-aos-duration="500" class="relative  text-center banner-box">
						<div class=" banner-dot hidden lg:block">
							<img class="absolute left-0 banner-dot-1 -top-28 top-bottom-animation-1" src="<?php echo THEME_URL ?>/assets/images/hero-banner-dot-1.svg" alt="hero-banner-dot-1">
							<img class="absolute bottom-0 right-0 -top-48 banner-dot-2 top-bottom-animation-2" src="<?php echo THEME_URL ?>/assets/images/hero-banner-dot-2.svg" alt="hero-banner-dot-2">
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>