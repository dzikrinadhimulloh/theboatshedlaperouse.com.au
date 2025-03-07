import $ from 'jquery'

(function ($) {
  var globalW = $(window).width(); 
  var globalH = $(window).height(); 

  // global =========================================
  var headroom  = new Headroom($('header').get(0));
  headroom.init();

  if ($(window).scrollTop() > 0) {
    $('header').addClass('headroom--unpinned');
  }

  function get_global_variable() {
    $('html').css('--scrollbar-size', $(window).outerWidth() - $(window).width()+'px');
    $('html').css('--window-height', globalH);
    $('html').css('--parallax-height', globalH * 1.4);
  }

  get_global_variable();
  $(window).on('resize', function(){
    if (globalW !== $(window).width()) {
      get_global_variable();
    }
  });

  // slider =========================================
  const swiper = new Swiper('.swiper', {
		direction: 'horizontal',
    slidesPerView: 'auto',
		scrollbar: {
			el: '.swiper-scrollbar',
		},
	});

  const swiperBlog = new Swiper('.swiper-blog', {
		direction: 'horizontal',
    slidesPerView: 'auto'
	});

  // menu ===========================================
  $(document).on('click', '[href="#open-menu"]', function(e){
    e.preventDefault();
    var $menuPanel = $('.menu-panel');
    $menuPanel.toggleClass('opened');

    if (!$menuPanel.hasClass('active')) {
      $menuPanel.addClass('active');
      $menuPanel.removeClass('z-[-1]');
      $('html').addClass('disable-scroll');

      setTimeout(() => {
        $menuPanel.removeClass('opacity-0');
      }, 100);
    } else {
      $menuPanel.addClass('opacity-0');
      
      setTimeout(() => {
        $('html').removeClass('disable-scroll');
      }, 150);

      setTimeout(() => {
        $menuPanel.removeClass('active');
        $menuPanel.addClass('z-[-1]');
      }, 200);
    }
  })


  // parallax =========================================
  gsap.registerPlugin(ScrollTrigger);
  gsap.utils.toArray(".parallax-bg").forEach((el) => {
    gsap.to(el, {
      yPercent: -20, 
      ease: "none",
      scrollTrigger: {
        trigger: el.parentElement, 
        start: "top bottom",
        end: "bottom top",
        scrub: true,
      }
    });
  });

})($)
