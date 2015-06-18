(function($) {

  'use strict';

  var current;

  var init = function() {
    $('.entry').first().show();
    current = 0;

    $('.arrow-prev').click(prev);
    $('.arrow-next').click(next);

    size();
  };

  var teardown = function() {
    $('.entry').show();
    $('#entries').height(null);
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
    toggle(current, current - 1);
  };

  var next = function(e) {
    e.preventDefault();
    toggle(current, current + 1);
  };

  var toggle = function(from, to) {
    $('.entry').eq(from).fadeOut(150);
    $('.entry').eq(to).fadeIn();
    $('.date.interesting').eq(from - 1).removeClass('active');
    $('.date.interesting').eq(to - 1).addClass('active');
    current = to;
  };

  $(function() {

    if($(window).width() >= 768) {
      init();
    }

  });

}(jQuery));
