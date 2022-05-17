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
			<div class="top-search relative z-9 hidden py-3 w-full bg-indigo-500">
				<div class="container ">
					<form action="#">
						<div class="flex items-center">
							<div class="flex-col">
								<a href="#">
									<span class="cursor-pointer">
										<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M19.9399 18.5624L13.4474 12.0699C14.4549 10.7675 14.9999 9.17496 14.9999 7.49997C14.9999 5.49498 14.2174 3.61498 12.8024 2.19749C11.3874 0.779996 9.50246 0 7.49997 0C5.49748 0 3.61248 0.782496 2.19749 2.19749C0.779996 3.61248 0 5.49498 0 7.49997C0 9.50246 0.782496 11.3874 2.19749 12.8024C3.61248 14.2199 5.49498 14.9999 7.49997 14.9999C9.17496 14.9999 10.765 14.4549 12.0674 13.4499L18.5599 19.9399C18.579 19.959 18.6016 19.9741 18.6264 19.9844C18.6513 19.9947 18.678 20 18.7049 20C18.7318 20 18.7585 19.9947 18.7834 19.9844C18.8083 19.9741 18.8309 19.959 18.8499 19.9399L19.9399 18.8524C19.959 18.8334 19.9741 18.8108 19.9844 18.7859C19.9947 18.761 20 18.7343 20 18.7074C20 18.6805 19.9947 18.6538 19.9844 18.6289C19.9741 18.6041 19.959 18.5815 19.9399 18.5624V18.5624ZM11.46 11.46C10.4 12.5174 8.99496 13.0999 7.49997 13.0999C6.00497 13.0999 4.59998 12.5174 3.53998 11.46C2.48249 10.4 1.89999 8.99496 1.89999 7.49997C1.89999 6.00497 2.48249 4.59748 3.53998 3.53998C4.59998 2.48249 6.00497 1.89999 7.49997 1.89999C8.99496 1.89999 10.4025 2.47999 11.46 3.53998C12.5174 4.59998 13.0999 6.00497 13.0999 7.49997C13.0999 8.99496 12.5174 10.4025 11.46 11.46Z" fill="white" />
										</svg>
									</span>
								</a>
							</div>
							<div class="flex-col w-full">
								<input class="bg-transparent appearance-none  text-white  w-full py-2 px-4 placeholder-coolGray-400 leading-tight focus:outline-none  focus:border-purple-500" type="text" placeholder="Search here...">
							</div>
							<div class="flex-col">
								<button type="button" class="input-group-addon close-search close-hover">
									<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M21 21L1 1M1 21L21 1L1 21Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="container ">
				<div class="header-area-inner  py-4 lg:py-2 relative  z-20">
					<nav class="header-nav flex items-center justify-between relative">
						<div class="header-logo">
							<a href="<?php echo site_url('/'); ?>" class="flex items-center flex-shrink-0 mr-6">
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
		<div class="innerpage-background bg-cover md:pt-40 pt-28 pb-7 md:pb-14 relative" style="background-image: url(<?php echo THEME_URL ?>/assets/images/hero-banner-bg.svg);">
			<section class="innerpage-area">
				<div class="container">
					<div class="text-center page-title">
						<h1 class="mb-2 font-bold text-4xl lg:text-7xl text-coolGray-900">Explore</h1>
						<ol class="flex justify-center font-medium">
							<li class="px-2 text-base font-normal text-coolGray-600"><a href="<?php echo site_url('/') ?>" class="font-normal underline-hover">Home</a></li>
							<li class="text-base font-normal text-coolGray-600">/</li>
							<li class="px-2 text-base font-normal text-indigo-500">Explorer</li>
						</ol>
					</div>

					<div class="relative  text-center banner-box">
						<div class=" banner-dot hidden lg:block">
							<img class="absolute left-0 banner-dot-1 -top-28 top-bottom-animation-1" src="<?php echo THEME_URL ?>/assets/images/hero-banner-dot-1.svg" alt="hero-banner-dot-1">
							<img class="absolute bottom-0 right-0 -top-48 banner-dot-2 top-bottom-animation-2" src="<?php echo THEME_URL ?>/assets/images/hero-banner-dot-2.svg" alt="hero-banner-dot-2">
						</div>
					</div>
					<div class="lg:flex items-center justify-between relative z-10 page-menu md:pt-28 pt-14">
						<div class="category-Select">
							<div class="flex-col bg-indigo-50  mr-3 mb-4 lg:mb-0 inline-block relative px-4 rounded-md">
								<?php echo do_shortcode('[br_filter_single filter_id=6544]'); ?>
							</div>
						</div>
						<div class="nav">
							<div class="nav-navbar mt-3 md:mt-6 lg:mt-0 flex items-center">
								<div class=" mr-2 "><a class="font-normal text-base text-indigo-500 underline-hover" href="<?php echo site_url('/explore'); ?>">Clear all</a></div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>