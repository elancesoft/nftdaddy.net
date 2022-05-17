(function ($, root, undefined) {
  $(function () {
    "use strict";
    // DOM ready, take it away
    var body = $("body");
    translateCart();
    $(document).ready(function () {
      setTimeout(translateCart, 200);
      jQuery(".woocommerce-variation-price label").html("Giá:");
      jQuery('.button-variable-wrapper li').click(function(){
        setTimeout(updatePrice, 50);
      });
    });

    function updatePrice() {
        jQuery(".woocommerce-variation-price label").html("Giá:");
    }

    $(document).on('click', '.wc-block-components-totals-coupon.wc-block-components-panel button', function(e){
        setTimeout(checkCoupon,50);
    });
    
    $(document).on('click', '.wc-block-components-checkout-place-order-button', function(e){
        setTimeout(checkValidate,50);
    });
    
    $(document).on('click', '.variable-item.button-variable-item', function(e){
        console.log('dfsfds');
        setTimeout(jQuery(".woocommerce-variation-price label").html("Giá:"),80);
        
    });

    function checkValidate() {
        jQuery('.wc-block-components-validation-error').html('<p>Vui lòng điền vào trường này</p>');
    }

    function checkCoupon() {
        jQuery(".wc-block-components-button__text").html("Áp dụng");
        jQuery(".wc-block-components-text-input.wc-block-components-totals-coupon__input label").html(
            "Nhập mã ưu đãi"
          );     
    }
    function translateCart() {
      jQuery(".wc-block-cart-item__remove-link").html("Xoá");
      jQuery(".wc-block-components-title.wc-block-cart__totals-title").html(
        "TỔNG ĐƠN HÀNG"
      );
      jQuery(".wc-block-components-totals-item__label").html("Tạm tính");
      jQuery(".wc-block-components-totals-footer-item .wc-block-components-totals-item__label").html("Tổng cộng");
      jQuery(".wc-block-components-button__text").html("Tiến hành thanh toán");
      
      jQuery(".wc-block-components-panel__button span").eq(0).html("Mã ưu đãi");
      jQuery(".wc-block-components-totals-coupon.wc-block-components-panel span").eq(0).html("Mã ưu đãi");
      
      jQuery(".wc-block-components-text-input.wc-block-components-address-form__first_name label").html("Họ");
      jQuery(".wc-block-components-text-input.wc-block-components-address-form__last_name label").html("Tên");
      jQuery(".wc-block-components-text-input.wc-block-components-address-form__address_1 label").html("Địa chỉ");
      
      jQuery(".wc-block-components-country-input label").html("Quốc gia");
      jQuery(".wc-block-components-text-input.wc-block-components-address-form__city label").html("Thành phố");
      
      jQuery(".wc-block-components-text-input.wc-block-components-address-form__postcode label").html("Mã bưu điện");
      jQuery(".wc-block-components-text-input.wc-block-components-address-form__city label").html("Thành phố");
      
      jQuery(".wc-block-components-text-input label[for=phone]").html("Điện thoại");
      jQuery(".wc-block-components-text-input label[for=email]").html("Địa chỉ Email");
      jQuery(".woocommerce-variation-price label").html("Giá:");
      
      jQuery(".wp-block-woocommerce-checkout-terms-block span").html('Bằng cách tiếp tục mua hàng, bạn đồng ý với <a href="https://shisobeauty.com.vn/dich-vu-khach-hang/dieu-khoan-va-dieu-kien-su-dung/">Điều khoản và Điều kiện</a> và <a href="https://shisobeauty.com.vn/dich-vu-khach-hang/chinh-sach-bao-mat/">Chính sách bảo mật</a> của chúng tôi');
      
    }
  });
})(jQuery, this);
