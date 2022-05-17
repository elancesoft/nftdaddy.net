(function ($, root, undefined) {
  $(function () {
    "use strict";
    // DOM ready, take it away
    $(document).ready(function () {
      if ($(".customSelect2 select").hasClass("select2-hidden-accessible")) {
        // $(this).removeClass('select2-hidden-accessible');
        $(".customSelect2 select").addClass(
          "focus:outline-none bg-transparent h-11"
        );
        $(".customSelect2 select").removeClass("bapf_select2");
        $(".customSelect2 select").removeClass("select2-hidden-accessible");
        $("span.select2-container").hide();
      }
      $(".like-nft").click(function () {
        var dataId = $(this).data("id");
        var likeNumber = $(this).find('span.like-number').html();
        console.log('like', likeNumber);
        var customNumber = 1;
        if(parseInt(likeNumber) > 0) {
            customNumber = parseInt(likeNumber) + 1;
        } 
        $(this).find('span.like-number').html(customNumber);
        var ajaxurl = dev_ajax.ajaxurl;
        $.ajax({
          type: "post",
          url: ajaxurl,
          data: {
            action: "dev_ajax_like_product",
            dataType: "json",
            dataId: dataId,
          },

          beforeSend: function () {},

          success: function (response) {
            var obj = JSON.parse(response);
            //$(this).find('span.like-number').html(obj.data);
          },
          error: function (errorThrown) {
            //   $(".icon-loading").hide();
            //   console.log(errorThrown);
          },
        });
      });
    });
  });
})(jQuery, this);
