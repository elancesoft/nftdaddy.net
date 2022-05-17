<?php
global $devFunction;
$gallery = $devFunction->get_field('project_gallery');
$project_type = get_the_terms($post->ID, 'type');
?>
<section class="section-testimonial" style="clear: both;">
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