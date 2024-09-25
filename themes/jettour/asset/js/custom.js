// for sticky header
function menu_open() {
  jQuery(".main-menu").css({ "transform": "translateX(0)" })
}
function menu_close() {
  jQuery(".main-menu").css({ "transform": "translateX(320px)" })
}
 
jQuery(window).scroll(function () {
  if (jQuery(window).scrollTop() >= 200) {
    jQuery('body').addClass('fixed-gap');
    jQuery('header').addClass('header-sticky');
  }
  else { 
    jQuery('body').removeClass('fixed-gap');
    jQuery('header').removeClass('header-sticky');
  }
});

jQuery(document).ready(function () {
  jQuery('.nav_btn').click(function () {
    jQuery('body').toggleClass('open'); 
  });
  jQuery('.nav_close').click(function () {
    jQuery('body').removeClass('open'); 
  });

});


jQuery(document).ready(function () {
  jQuery('.work-slider').slick({
    arrows: true,
    slidesToShow: 4,
    autoplay:true,
    autospeed: 3000,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          arrows: false,
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 991,
        settings: {
          arrows: false,
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 767,
        settings: {
          arrows: false,
          slidesToShow: 1,
          dots:true,
        }
      }
    ]
  });

  
});

jQuery(document).ready(function () {

  jQuery(".menu-item-has-children").prepend("<span class='plus'>+</span><span class='minus'>-</span>");
  jQuery(".plus").click(function () {
    jQuery(".menu-item-has-children").removeClass("open-sub");
    jQuery(this).parent().addClass("open-sub");
  });
  jQuery(".minus").click(function () {
    jQuery(this).parent().removeClass("open-sub");
  });
  jQuery(".menu-button").click(function () {
    jQuery(".menu-item-has-children").removeClass("open-sub");
    jQuery(this).parent().toggleClass("tadaa");
  });
});

jQuery( document ).ready(function() {
  AOS.init({
    easing: 'ease-in-out-sine',
    duration: '1000',
    offset: 20,
    throttleDelay: 1
  });

  jQuery('.counter').each(function () {
    jQuery(this).prop('counter-number',100000).animate({
        Counter: $(this).text()
    }, {
        duration: 3000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

});