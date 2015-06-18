(function($) {

  'use strict';

  var current;

  var debounce = function(func, wait, immediate) {
  	var timeout;
  	return function() {
  		var context = this, args = arguments;
  		var later = function() {
  			timeout = null;
  			if (!immediate) func.apply(context, args);
  		};
  		var callNow = immediate && !timeout;
  		clearTimeout(timeout);
  		timeout = setTimeout(later, wait);
  		if (callNow) func.apply(context, args);
  	};
  };

  var init = function() {
    $('.entry').first().show();
    current = 0;

    $('.arrow-prev').on('click', prev);
    $('.arrow-next').on('click', next);

    size();
  };

  var teardown = function() {
    $('.entry').show();
    $('#entries').css('height', 'auto');

    $('.arrow-prev').off('click', prev);
    $('.arrow-next').off('click', next);
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
    if(to !== 0) {
      $('.date.interesting').eq(to - 1).addClass('active');
    }
    current = to;
  };

  $(function() {

    var active = false;

    if($(window).width() >= 768) {
      init();
      active = true;
    }

    // Handle window resizing
    $(window).resize(debounce(function() {
      if($(window).width() >= 768 && active === false) {
        init();
        active = true;
      }
      else if($(window).width() < 768 && active === true) {
        teardown();
        active = false;
      }
      else if($(window).width() >= 768 && active === true) {
        size();
      }
    }, 300));

  });

}(jQuery));
