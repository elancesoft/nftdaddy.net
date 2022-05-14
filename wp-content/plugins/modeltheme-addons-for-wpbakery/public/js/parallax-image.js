// Script used only for Parallax Image
(function( $ ) {
  'use strict';

  var viewport = jQuery(window),
  root = jQuery('html'),
  maxScroll;

  viewport.on({
    scroll: function() {
      // Grab scroll position
      var scrolled = viewport.scrollTop();
      root.css({ fontSize: (scrolled / maxScroll) * 50 });
    },
    resize: function() {
      // Calculate the maximum scroll position
      maxScroll = root.height() - viewport.height();
    }
  }).trigger('resize');

})( jQuery );