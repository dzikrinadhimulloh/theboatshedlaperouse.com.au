import $ from 'jquery'

(function ($) {

  // global =========================================
  var headroom  = new Headroom($('header').get(0));
  headroom.init();

  if ($(window).scrollTop() > 0) {
    $('header').addClass('headroom--unpinned');
  }

  function get_global_variable() {
    $('html').css('--scrollbar-size', $(window).outerWidth() - $(window).width()+'px');
  }

  get_global_variable();
  var globalW = $(window).width(); 
  var globalH = $(window).height(); 
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
  let getRatio = el => globalH / (globalH + el.offsetHeight);

  gsap.utils.toArray(".parallax-bg").forEach((el, i) => {
    var section = $(el).parent().get(0);
    var speed   = -0.3; 
    gsap.fromTo(el, {
      backgroundPosition: () => "50% 0px"
    }, {
      backgroundPosition: () => `50% ${speed * globalH * getRatio(section)}px`,
      ease: "none",
      scrollTrigger: {
        trigger: el,
        start: () => i ? "top bottom" : "top top", 
        end: "bottom top",
        scrub: true, 
      }
    });
  });

})($)
