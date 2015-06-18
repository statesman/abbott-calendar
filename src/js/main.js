(function($) {

  'use strict';

  var current;

  var init = function() {
    $('.entry').first().show();
    current = 0;

    size();
  };

  var size = function() {
    // Set the container to the height of the tallest element
    var heights = [];
    $('.entry').each(function(i, el) {
      heights.push($(el).outerHeight());
    });
    var maxHeight = Math.max.apply(null, heights);
    $('#entries').height(maxHeight);
  };

  var prev = function(e) {
    e.preventDefault();

    $('.entry').eq(current).fadeOut(150);
    $('.entry').eq(current - 1).fadeIn();
    current--;
  };

  var next = function(e) {
    e.preventDefault();

    $('.entry').eq(current).fadeOut(150);
    $('.entry').eq(current + 1).fadeIn();
    current++;
  };

  $(function() {

    init();

    $('.arrow-prev').click(prev);
    $('.arrow-next').click(next);

  });

}(jQuery));
