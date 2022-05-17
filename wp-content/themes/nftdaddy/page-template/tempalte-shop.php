<?php
/* Template Name: Shop Template */
get_header();
?>
<?php //get_template_part('blocks/home/banner'); 
?>

<!-- MAIN CONTENT -->

	<div class="breadcrumb-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<ul class="breadcrumb">
						<li>
							<a href="#">Trang chủ</a>
						</li>
						<li>
							<a href="#">Sản phẩm</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<section class="section-banner js--animate opacity-0" data-animation="fromBottom" data-deplay="0.3">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="slider-wrap" data-module="SwiperBegin">
						<!-- Slider main container -->
						<div class="swiper-container swiper-banner">
							<!-- Additional required wrapper -->
							<div class="swiper-wrapper">
								<!-- Slides -->
								<div class="swiper-slide">
									<img src="<?php echo THEME_URL ?>/assets/images/homebanner.jpg" alt="Natural beauty" />
								</div>
								<div class="swiper-slide"><img src="<?php echo THEME_URL ?>/assets/images/sanphamsuckhoe.jpg" alt="" /></div>
								<div class="swiper-slide"><img src="<?php echo THEME_URL ?>/assets/images/homebanner.jpg" alt="" /></div>
								...
							</div>
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section-category-list js--animate opacity-0" data-animation="fromBottom" data-deplay="0.3">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="slider-wrap category-list" data-module="SwiperBegin">
						<div class="swiper-container swiper-catList">
							<!-- Additional required wrapper -->
							<div class="swiper-wrapper">
								<!-- Slides -->
								<div class="swiper-slide">
									<a href="#" class="cat-item">

										<div class="img">
											<img src="<?php echo THEME_URL ?>/assets/images/cat-item01.svg" alt="cham soc da" />
										</div>
										<p>
											Chăm sóc da
										</p>
									</a>
								</div>
								<div class="swiper-slide">
									<a href="#" class="cat-item">

										<div class="img">
											<img src="<?php echo THEME_URL ?>/assets/images/cat-item01.svg" alt="cham soc da" />
										</div>
										<p>
											Chăm sóc da
										</p>
									</a>
								</div>
								<div class="swiper-slide">
									<a href="#" class="cat-item">

										<div class="img">
											<img src="<?php echo THEME_URL ?>/assets/images/cat-item01.svg" alt="cham soc da" />
										</div>
										<p>
											Chăm sóc da
										</p>
									</a>
								</div>
								<div class="swiper-slide">
									<a href="#" class="cat-item">

										<div class="img">
											<img src="<?php echo THEME_URL ?>/assets/images/cat-item01.svg" alt="cham soc da" />
										</div>
										<p>
											Chăm sóc da
										</p>
									</a>
								</div>
							</div>
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
					<p class="ico-ending"><img class="h" src="<?php echo THEME_URL ?>/assets/images/icon-tree01.svg" alt="logo" />
					</p>
				</div>
			</div>
		</div>
	</section>
	<section class="section-beloved">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2>
						Sản phẩm yêu thích
					</h2>
					<div class="slider-wrap  js--animate opacity-0" data-animation="fromBottom" data-deplay="0.3" data-module="SwiperBegin">
						<!-- Slider main container -->
						<div class="swiper-container swiper-beloved">
							<!-- Additional required wrapper -->
							<div class="swiper-wrapper">
								<!-- Slides -->
								<div class="swiper-slide">
									<div class="product-item">
										<a href="#" title="FRUCTUS CNIDII CLEANSING DEL">
											<img src="<?php echo THEME_URL ?>/assets/images/love2.png" alt="FRUCTUS CNIDII CLEANSING DEL" />
											<span>FRUCTUS CNIDII CLEANSING DEL</span>
											<strong>350.000 VND</strong>
										</a>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="product-item">
										<a href="#" title="FRUCTUS CNIDII CLEANSING DEL">
											<img src="<?php echo THEME_URL ?>/assets/images/love3.png" alt="FRUCTUS CNIDII CLEANSING DEL" />
											<span>FRUCTUS CNIDII CLEANSING DEL</span>
											<strong>350.000 VND</strong>
										</a>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="product-item">
										<a href="#" title="FRUCTUS CNIDII CLEANSING DEL">
											<img src="<?php echo THEME_URL ?>/assets/images/love4.png" alt="FRUCTUS CNIDII CLEANSING DEL" />
											<span>FRUCTUS CNIDII CLEANSING DEL</span>
											<strong>350.000 VND</strong>
										</a>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="product-item">
										<a href="#" title="FRUCTUS CNIDII CLEANSING DEL">
											<img src="<?php echo THEME_URL ?>/assets/images/love1.png" alt="FRUCTUS CNIDII CLEANSING DEL" />
											<span>FRUCTUS CNIDII CLEANSING DEL</span>
											<strong>350.000 VND</strong>
										</a>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="product-item">
										<a href="#" title="FRUCTUS CNIDII CLEANSING DEL">
											<img src="<?php echo THEME_URL ?>/assets/images/love2.png" alt="FRUCTUS CNIDII CLEANSING DEL" />
											<span>FRUCTUS CNIDII CLEANSING DEL</span>
											<strong>350.000 VND</strong>
										</a>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="product-item">
										<a href="#" title="FRUCTUS CNIDII CLEANSING DEL">
											<img src="<?php echo THEME_URL ?>/assets/images/love3.png" alt="FRUCTUS CNIDII CLEANSING DEL" />
											<span>FRUCTUS CNIDII CLEANSING DEL</span>
											<strong>350.000 VND</strong>
										</a>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="product-item">
										<a href="#" title="FRUCTUS CNIDII CLEANSING DEL">
											<img src="<?php echo THEME_URL ?>/assets/images/love4.png" alt="FRUCTUS CNIDII CLEANSING DEL" />
											<span>FRUCTUS CNIDII CLEANSING DEL</span>
											<strong>350.000 VND</strong>
										</a>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="product-item">
										<a href="#" title="FRUCTUS CNIDII CLEANSING DEL">
											<img src="<?php echo THEME_URL ?>/assets/images/love1.png" alt="FRUCTUS CNIDII CLEANSING DEL" />
											<span>FRUCTUS CNIDII CLEANSING DEL</span>
											<strong>350.000 VND</strong>
										</a>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="product-item">
										<a href="#" title="FRUCTUS CNIDII CLEANSING DEL">
											<img src="<?php echo THEME_URL ?>/assets/images/love2.png" alt="FRUCTUS CNIDII CLEANSING DEL" />
											<span>FRUCTUS CNIDII CLEANSING DEL</span>
											<strong>350.000 VND</strong>
										</a>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="product-item">
										<a href="#" title="FRUCTUS CNIDII CLEANSING DEL">
											<img src="<?php echo THEME_URL ?>/assets/images/love3.png" alt="FRUCTUS CNIDII CLEANSING DEL" />
											<span>FRUCTUS CNIDII CLEANSING DEL</span>
											<strong>350.000 VND</strong>
										</a>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="product-item">
										<a href="#" title="FRUCTUS CNIDII CLEANSING DEL">
											<img src="<?php echo THEME_URL ?>/assets/images/love4.png" alt="FRUCTUS CNIDII CLEANSING DEL" />
											<span>FRUCTUS CNIDII CLEANSING DEL</span>
											<strong>350.000 VND</strong>
										</a>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="product-item">
										<a href="#" title="FRUCTUS CNIDII CLEANSING DEL">
											<img src="<?php echo THEME_URL ?>/assets/images/love1.png" alt="FRUCTUS CNIDII CLEANSING DEL" />
											<span>FRUCTUS CNIDII CLEANSING DEL</span>
											<strong>350.000 VND</strong>
										</a>
									</div>
								</div>
							</div>
							<!-- If we need pagination -->
							<div class="show-mb swiper-pagination"></div>
						</div>
						<!-- If we need navigation buttons -->
						<div class="bl swiper-button-prev hide-mb"></div>
						<div class="bl swiper-button-next hide-mb"></div>
					</div>
					<p class="ico-ending"><img class="h" src="<?php echo THEME_URL ?>/assets/images/icon-tree01.svg" alt="logo" />
					</p>
				</div>
			</div>
		</div>
	</section>
	<section class="section-existed-products">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="js--animate opacity-0" data-animation="fromBottom" data-deplay="0.3">
						Sản phẩm tại Sisobeauty
					</h2>
					
					<?php 
						

							/**
							 * Hook: woocommerce_before_shop_loop.
							 *
							 * @hooked woocommerce_output_all_notices - 10
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
						
							woocommerce_product_loop_start();
						
							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();
						
									/**
									 * Hook: woocommerce_shop_loop.
									 */
									do_action( 'woocommerce_shop_loop' );
						
									wc_get_template_part( 'content', 'product' );
								}
							}
						
							woocommerce_product_loop_end();
						
							/**
							 * Hook: woocommerce_after_shop_loop.
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );

						
					
					?>


					<div class="pagination-links">

						<a class='page-numbers' href='#'>1</a>
						<span class='page-numbers current'>2</span>
						<a class='page-numbers' href='#'>3</a>
						<a class='page-numbers' href='#'>4</a>
						<span class="page-numbers dots">&hellip;</span>
						<a class='page-numbers' href='#'>6</a>

					</div>
					<p class="ico-ending"><img class="h" src="<?php echo THEME_URL ?>/assets/images/icon-tree01.svg" alt="logo" />
					</p>
				</div>
			</div>
		</div>
	</section>
	<section class="section-testimonial">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2>
						Cảm nhận từ khách hàng
					</h2>
					<div class="slider-wrap  js--animate opacity-0" data-animation="fromBottom" data-deplay="0.3" data-module="SwiperBegin">
						<!-- Slider main container -->
						<div class="swiper-container swiper-testimonial">
							<!-- Additional required wrapper -->
							<div class="swiper-wrapper">
								<!-- Slides -->
								<div class="swiper-slide">
									<div class="test-item">
										<img src="https://via.placeholder.com/300x300" alt="FRUCTUS CNIDII CLEANSING DEL" />
										<strong>Su Hào</strong>
										<span>Em ưng nhất là sự mềm mịn của sữa rửa mặt, nó tạo cho em cảm giác thoải mái và giúp mình muốn rửa mặt đều đặn với nó</span>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="test-item">
										<img src="https://via.placeholder.com/300x300" alt="FRUCTUS CNIDII CLEANSING DEL" />
										<strong>Su Hào</strong>
										<span>Em ưng nhất là sự mềm mịn của sữa rửa mặt, nó tạo cho em cảm giác thoải mái và giúp mình muốn rửa mặt đều đặn với nó</span>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="test-item">
										<img src="https://via.placeholder.com/300x300" alt="FRUCTUS CNIDII CLEANSING DEL" />
										<strong>Su Hào</strong>
										<span>Em ưng nhất là sự mềm mịn của sữa rửa mặt, nó tạo cho em cảm giác thoải mái và giúp mình muốn rửa mặt đều đặn với nó</span>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="test-item">
										<img src="https://via.placeholder.com/300x300" alt="FRUCTUS CNIDII CLEANSING DEL" />
										<strong>Su Hào</strong>
										<span>Em ưng nhất là sự mềm mịn của sữa rửa mặt, nó tạo cho em cảm giác thoải mái và giúp mình muốn rửa mặt đều đặn với nó</span>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="test-item">
										<img src="https://via.placeholder.com/300x300" alt="FRUCTUS CNIDII CLEANSING DEL" />
										<strong>Su Hào</strong>
										<span>Em ưng nhất là sự mềm mịn của sữa rửa mặt, nó tạo cho em cảm giác thoải mái và giúp mình muốn rửa mặt đều đặn với nó</span>
									</div>
								</div>
							</div>
							<!-- If we need pagination -->
							<div class="show-mb swiper-pagination"></div>
						</div>
						<!-- If we need navigation buttons -->
						<div class="ts swiper-button-prev hide-mb"></div>
						<div class="ts swiper-button-next hide-mb"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php //get_template_part('blocks/home/blockItems'); 
	?>

	<?php get_footer(); ?>