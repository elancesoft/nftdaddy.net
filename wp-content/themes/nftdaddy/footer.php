<!--  ====================== Footer Area Start =============================  -->
<footer class="footer-area bg-bottom bg-cover md:pt-20 pt-10 md:pb-28 pb-14 relative" style="background-image: url(<?php echo THEME_URL ?>/assets/images/bg-footer.svg);">
	<div class="z-10 footer-animation-background absolute top-0 w-full h-full bg-cover bg-center">
		<img src="<?php echo THEME_URL ?>/assets/images/footer-animation-bg.svg" alt="footer-animation-background">
	</div>
	<div class="container ">
		<div class="footer-animation-icon hidden xl:block z-40 relative">
			<div class="relative">
				<div class="flex-col">
					<img class="absolute -left-24 " src="<?php echo THEME_URL ?>/assets/images/star-footer.svg" alt="images">
					<img class="absolute footer-icon-1 -left-36 top-28" src="<?php echo THEME_URL ?>/assets/images/footer-dot.svg" alt="images">
				</div>
				<div class="flex-col">
					<img class="absolute -right-24 " src="<?php echo THEME_URL ?>/assets/images/star-footer.svg" alt="images">
					<img class="absolute -right-28 top-28 footer-icon-2" src="<?php echo THEME_URL ?>/assets/images/footer-dot.svg" alt="images">
					<img class="absolute right-0 top-60 footer-icon-3" src="<?php echo THEME_URL ?>/assets/images/footer-icon-right-2.svg" alt="images">
				</div>
			</div>
		</div>
		<?php
		global $devFunction;
		$footer_heading = $devFunction->get_option('opt_footer_heading');
		$footer_text = $devFunction->get_option('opt_footer_text');
		?>
		<div class="grid sm:grid-cols-2 gap-10 xl:grid-cols-12 z-40 relative">
			<div class="xl:col-span-5 ">
				<div data-aos="fade-in" data-aos-duration="500" class="footer-widgets">
					<?php if (!empty($footer_heading)) : ?>
						<h4 class="mb-6 text-2xl font-bold text-coolGray-900"><?php echo $footer_heading; ?></h4>
					<?php endif; ?>
					<p class="mb-6 text-base font-normal text-coolGray-600"><?php echo $footer_text; ?></p>
					<?php
					$facebook = $devFunction->get_option('opt_footer_facebook');
					$twitter = $devFunction->get_option('opt_footer_twitter');
					$instagram = $devFunction->get_option('opt_footer_instagram');
					$linkedIn = $devFunction->get_option('opt_footer_likedin');

					?>
					<div class="share-links">
						<ul>
							<?php if (!empty($facebook)) : ?>
								<li data-aos="fade-in" data-aos-duration="500" class="inline-block mr-2">
									<a class="flex button-style-1     relative    overflow-hidden items-center justify-center  rounded-full h-9 w-9 bg-blue-50" href="<?php echo $facebook; ?>" target="_blank">
										<svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M5.83333 9.2H7.7381L8.5 6H5.83333V4.4C5.83333 3.576 5.83333 2.8 7.35714 2.8H8.5V0.112C8.25162 0.0776001 7.31371 0 6.32324 0C4.25467 0 2.78571 1.3256 2.78571 3.76V6H0.5V9.2H2.78571V16H5.83333V9.2Z" fill="white" />
										</svg>
									</a>
								</li>
							<?php endif; ?>
							<?php if (!empty($twitter)) : ?>
								<li data-aos="fade-in" data-aos-duration="500" class="inline-block mr-2">
									<a class="flex button-style-1     relative     overflow-hidden items-center justify-center  rounded-full h-9 w-9 bg-lightBlue-400" href="<?php echo $twitter; ?>" target="_blank">
										<svg width="18" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M20.5 1.89789C19.7645 2.21861 18.9744 2.43531 18.1438 2.53326C19.0008 2.0286 19.642 1.23432 19.9477 0.298631C19.1425 0.769299 18.2612 1.1006 17.3422 1.27812C16.7242 0.628768 15.9057 0.198364 15.0136 0.0537355C14.1216 -0.0908933 13.206 0.0583448 12.409 0.47828C11.6119 0.898215 10.9781 1.56535 10.6058 2.37611C10.2336 3.18688 10.1437 4.0959 10.3503 4.96206C8.7187 4.88144 7.12259 4.46412 5.66553 3.73718C4.20847 3.01023 2.92301 1.98991 1.89258 0.742437C1.54025 1.34053 1.33766 2.03398 1.33766 2.7725C1.33727 3.43734 1.50364 4.09199 1.82201 4.67838C2.14038 5.26477 2.60091 5.76476 3.16273 6.13398C2.51117 6.11358 1.87397 5.94032 1.30419 5.62863V5.68064C1.30413 6.6131 1.63189 7.51687 2.23186 8.23859C2.83184 8.96031 3.66707 9.45553 4.59583 9.64022C3.9914 9.8012 3.35769 9.82491 2.74258 9.70957C3.00462 10.5119 3.51506 11.2135 4.20243 11.7162C4.8898 12.2188 5.71969 12.4974 6.57593 12.5128C5.12242 13.6357 3.32735 14.2448 1.47948 14.2421C1.15215 14.2422 0.825091 14.2234 0.5 14.1858C2.37569 15.3726 4.55914 16.0024 6.78909 16C14.3378 16 18.4644 9.84739 18.4644 4.51132C18.4644 4.33796 18.46 4.16286 18.4521 3.9895C19.2548 3.41825 19.9476 2.71087 20.4982 1.90049L20.5 1.89789Z" fill="white" />
										</svg>
									</a>
								</li>
							<?php endif; ?>
							<?php if (!empty($instagram)) : ?>
								<li class="inline-block mr-2">
									<a class="flex button-style-1     relative     overflow-hidden items-center justify-center  bg-red-500 rounded-full h-9 w-9" href="<?php echo $instagram; ?>" target="_blank">
										<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M8.49785 3.89523C6.22636 3.89523 4.39315 5.72847 4.39315 8C4.39315 10.2715 6.22636 12.1048 8.49785 12.1048C10.7693 12.1048 12.6025 10.2715 12.6025 8C12.6025 5.72847 10.7693 3.89523 8.49785 3.89523ZM8.49785 10.6678C7.02888 10.6678 5.8301 9.46899 5.8301 8C5.8301 6.53101 7.02888 5.3322 8.49785 5.3322C9.96681 5.3322 11.1656 6.53101 11.1656 8C11.1656 9.46899 9.96681 10.6678 8.49785 10.6678ZM12.7707 2.77047C12.2403 2.77047 11.812 3.19876 11.812 3.72911C11.812 4.25947 12.2403 4.68776 12.7707 4.68776C13.301 4.68776 13.7293 4.26147 13.7293 3.72911C13.7294 3.60318 13.7048 3.47845 13.6566 3.36207C13.6085 3.24569 13.5379 3.13995 13.4489 3.0509C13.3598 2.96185 13.2541 2.89124 13.1377 2.84312C13.0213 2.795 12.8966 2.77031 12.7707 2.77047ZM16.4991 8C16.4991 6.89525 16.5091 5.80051 16.4471 4.69777C16.385 3.4169 16.0928 2.28014 15.1562 1.3435C14.2176 0.404868 13.0829 0.114672 11.802 0.0526304C10.6973 -0.0094115 9.60258 0.000595291 8.49985 0.000595291C7.39512 0.000595291 6.30041 -0.0094115 5.19768 0.0526304C3.91684 0.114672 2.78009 0.40687 1.84348 1.3435C0.904861 2.28214 0.61467 3.4169 0.552629 4.69777C0.490589 5.80252 0.500595 6.89725 0.500595 8C0.500595 9.10275 0.490589 10.1995 0.552629 11.3022C0.61467 12.5831 0.906862 13.7199 1.84348 14.6565C2.78209 15.5951 3.91684 15.8853 5.19768 15.9474C6.30241 16.0094 7.39713 15.9994 8.49985 15.9994C9.60458 15.9994 10.6993 16.0094 11.802 15.9474C13.0829 15.8853 14.2196 15.5931 15.1562 14.6565C16.0948 13.7179 16.385 12.5831 16.4471 11.3022C16.5111 10.1995 16.4991 9.10475 16.4991 8ZM14.738 12.7192C14.5919 13.0834 14.4157 13.3556 14.1336 13.6358C13.8514 13.918 13.5812 14.0941 13.217 14.2402C12.1643 14.6585 9.66462 14.5644 8.49785 14.5644C7.33108 14.5644 4.82944 14.6585 3.77675 14.2422C3.41251 14.0961 3.14033 13.92 2.86015 13.6378C2.57796 13.3556 2.40184 13.0854 2.25575 12.7212C1.83948 11.6665 1.93354 9.16679 1.93354 8C1.93354 6.83321 1.83948 4.33152 2.25575 3.27881C2.40184 2.91456 2.57796 2.64238 2.86015 2.36219C3.14233 2.082 3.41251 1.90388 3.77675 1.75778C4.82944 1.3415 7.33108 1.43556 8.49785 1.43556C9.66462 1.43556 12.1663 1.3415 13.219 1.75778C13.5832 1.90388 13.8554 2.08 14.1356 2.36219C14.4177 2.64438 14.5939 2.91456 14.74 3.27881C15.1562 4.33152 15.0622 6.83321 15.0622 8C15.0622 9.16679 15.1562 11.6665 14.738 12.7192Z" fill="white" />
										</svg>
									</a>
								</li>
							<?php endif; ?>
							<?php if (!empty($linkedIn)) : ?>
								<li class="inline-block mr-2">
									<a class="flex button-style-1     relative    overflow-hidden items-center justify-center  bg-blue-600 rounded-full h-9 w-9" href="<?php echo $linkedIn; ?>" target="_blank">
										<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M2.42299 3.85254C3.48502 3.85254 4.34598 2.99012 4.34598 1.92627C4.34598 0.862419 3.48502 0 2.42299 0C1.36095 0 0.5 0.862419 0.5 1.92627C0.5 2.99012 1.36095 3.85254 2.42299 3.85254Z" fill="white" />
											<path d="M6.16174 5.3122V15.9991H9.47424V10.7142C9.47424 9.31969 9.73614 7.96919 11.4623 7.96919C13.1647 7.96919 13.1857 9.56355 13.1857 10.8022V16H16.5V10.1393C16.5 7.26048 15.8813 5.04809 12.5222 5.04809C10.9094 5.04809 9.82843 5.93463 9.38635 6.77363H9.34153V5.3122H6.16174ZM0.763664 5.3122H4.08143V15.9991H0.763664V5.3122Z" fill="white" />
										</svg>
									</a>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
			<?php
			$footer_block1_title = $devFunction->get_option('opt_footer_block1_title');
			$footer_block1_text = $devFunction->get_option('opt_footer_block1_text');
			?>
			<?php if (!empty($footer_block1_title) || !empty($footer_block1_text)) : ?>
				<div class=" xl:col-span-3 ">
					<div data-aos="fade-in" data-aos-duration="500" class="footer-widgets">
						<?php if (!empty($footer_block1_title)) : ?>
							<h4 class="mb-6 text-2xl font-bold text-coolGray-900"><?php echo $footer_block1_title; ?></h4>
						<?php endif; ?>
						<?php if (!empty($footer_block1_text)) : ?>
							<p class="mb-4 text-base font-normal text-coolGray-600"><?php echo $footer_block1_text; ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			<?php
			$footer_block2_title = $devFunction->get_option('opt_footer_block2_title');
			$footer_bolock2_items = $devFunction->get_option('opt_footer_block2_item');
			?>
			<?php if (!empty($footer_block2_title) || !empty($footer_bolock2_items)) : ?>
				<div class="xl:col-span-2 ">
					<div data-aos="fade-in" data-aos-duration="500" class="footer-widgets">
						<?php if (!empty($footer_block2_title)) : ?>
							<h4 class="mb-6 text-2xl font-bold text-coolGray-900"><?php echo $footer_block2_title; ?></h4>
						<?php endif; ?>
						<?php if (!empty($footer_bolock2_items)) : ?>
							<ul>
								<?php foreach ($footer_bolock2_items as $key => $value) : ?>
									<li data-aos="fade-in" data-aos-duration="500" class="mb-4 ">
										<a class="text-base font-normal text-coolGray-600 underline-hover" href="<?php echo $value['link'] ?>"><?php echo $value['title']; ?></a>
									</li>
								<?php endforeach; ?>

							</ul>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			<?php
			$footer_block3_title = $devFunction->get_option('opt_footer_block3_title');
			$footer_bolock3_items = $devFunction->get_option('opt_footer_block3_item');
			?>
			<?php if (!empty($footer_block3_title) || !empty($footer_bolock3_items)) : ?>
				<div class="xl:col-span-2 ">
					<div data-aos="fade-in" data-aos-duration="500" class="footer-widgets">
						<?php if (!empty($footer_block3_title)) : ?>
							<h4 class="mb-6 text-2xl font-bold text-coolGray-900"><?php echo $footer_block3_title; ?></h4>
						<?php endif; ?>
						<?php if (!empty($footer_bolock2_items)) : ?>
							<ul>
								<?php foreach ($footer_bolock3_items as $key => $value) : ?>
									<li data-aos="fade-in" data-aos-duration="500" class="mb-4 ">
										<a class="text-base font-normal text-coolGray-600 underline-hover" href="<?php echo $value['link'] ?>"><?php echo $value['title']; ?></a>
									</li>
								<?php endforeach; ?>

							</ul>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<?php
		$footer_info = $devFunction->get_option('opt_footer_info_text');
		$footer_info_item = $devFunction->get_option('opt_footer_info_page');
		?>
		<div class="sm:text-center copyright-area md:text-right pt-7 md:pt-14 z-40 relative">
			<div class="justify-between md:flex">
				<div class="grid flex-col order-first md:order-last">
					<ul>
						<?php foreach ($footer_info_item as $key => $value) : ?>
							<li data-aos="fade-in <?php echo $key ?>" data-aos-duration="500" class="inline-block mr-2"><a class="text-base text-coolGray-600 underline-hover" href="<?php echo $value['link'] ?? '' ?>"><?php echo $value['title'] ?></a>
							</li>
							<?php if ($key === 0) : ?>
								<li data-aos="fade-in" data-aos-duration="500" class="inline-block mr-2 text-base text-coolGray-600">|</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="flex-col">
					<p class="text-base font-normal text-coolGray-600"><?php echo $footer_info; ?></p>
				</div>
			</div>
		</div>
	</div>
</footer>
<!--  ====================== Footer Area End =============================  -->
<!--  ====================== Start Scroll To Top =============================  -->
<div class="fixed z-50 w-12 h-12 text-center transition-all rounded-full cursor-pointer scroll-top bottom-1 md:bottom-10 right-1 md:right-10">
	<div class="p-3 transition duration-500 rounded-md shadow-sm scroll-icon bg-lightBlue-500 hover:bg-blueGray-900">
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M12.4307 0.696095L12.4309 0.696287L23.2178 13.057H21.0173C21.0014 13.057 20.9935 13.0509 20.9904 13.0473L20.9885 13.045L13.6503 4.63529L12.7736 3.63053V4.96403V23.5H11.2258V4.96403V3.63053L10.3491 4.63529L3.01349 13.0421C3.0032 13.0531 2.99124 13.057 2.98206 13.057H0.781464L11.5652 0.696231L11.5653 0.696095C11.6188 0.634784 11.685 0.585415 11.7597 0.551509C11.8344 0.5176 11.9157 0.5 11.998 0.5C12.0803 0.5 12.1616 0.5176 12.2363 0.551509C12.311 0.585415 12.3773 0.634783 12.4307 0.696095Z" fill="#6366F1" stroke="#6366F1" />
		</svg>
	</div>
</div>
<!--  ====================== End Scroll To Top =============================  -->
</div>
<?php wp_footer(); ?>
</body>

</html>