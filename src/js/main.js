import $ from 'jquery'

export default class Block {
    constructor() {
        this.init()
    }
    
    slider() {
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
    }

    menu() {
        $(document).on('click', '[href="#open-menu"], [href="#open-menu-links"]', function(e){
            e.preventDefault();
            var $menuPanel = $(this).hasClass('btn-menu') ? $('.menu-panel:not(.menu-link-panel)') : $('.menu-link-panel');
            var $menuPanelOpened = $('.menu-panel.opened');
            if ($menuPanelOpened.length > 0) {
                hide_panel($menuPanelOpened);
            }
            show_panel($menuPanel);
        })

        if (window.location.hash == '#menu') {
            $($('a[href="#open-menu-links"]').get(0)).click();
        }
        
        $(document).on('click', '[href="#close-menu"]', function(e){
            e.preventDefault();
            var $menuPanel = $('.menu-panel');
            hide_panel($menuPanel);
        })

        function show_panel($menuPanel){
            $menuPanel.addClass('opened active').removeClass('z-[-1]');
            $('html').addClass('disable-scroll');

            setTimeout(() => {
                $menuPanel.removeClass('opacity-0');
            }, 100);
        }

        function hide_panel($menuPanel){
            $menuPanel.addClass('opacity-0').removeClass('opened');
            
            setTimeout(() => {
                $('html').removeClass('disable-scroll');
            }, 150);

            setTimeout(() => {
                $menuPanel.removeClass('active').addClass('z-[-1]');
            }, 200);
        }
    }

    animate() {
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

        gsap.utils.toArray(".animate-speed").forEach((el) => {
            var speed = $(el).data('speed');
            gsap.to(el, {
                yPercent: - (75 * speed), 
                ease: "none",
                scrollTrigger: {
                    trigger: el.parentElement, 
                    start: "5% top",
                    end: "bottom top",
                    scrub: true,
                }
            });
        });

        gsap.utils.toArray(".acf-block").forEach((el) => {
            var seq = 1;
            $(el).find("[item-fade-animate]").each(function(){
                gsap.fromTo(this, {
                    opacity: 0
                },{
                    opacity: 1, 
                    ease: "none",
                    delay: seq * 0.3,
                    scrollTrigger: {
                        trigger: el, 
                        start: "top 85%",
                        end: "bottom top",
                    }
                });
                seq++;
            });
        });
        
        /*
        gsap.utils.toArray(".fixed-bg").forEach((el) => {
            ScrollTrigger.create({
                trigger: el,
                start: "top top", 
                pin: true,
                pinSpacing: false,
                markers: true
            });
        });*/


        function updateBackground() {
            $('.fixed-bg').each(function(){
                this.style.top = `${window.scrollY - $(this).parent().offset().top}px`;
            })
        }

        window.addEventListener('scroll', updateBackground);
    }

    globals(){      
        var globalW = $(window).width(); 
        var globalH = $(window).height(); 

        var headroom  = new Headroom($('header').get(0));
        headroom.init();
      
        if ($(window).scrollTop() > 0) {
          $('header').addClass('headroom--unpinned');
        }
      
        function get_global_variable() {
          $('html').css('--scrollbar-size', $(window).outerWidth() - $(window).width()+'px');
          $('html').css('--window-height', globalH+'px');
          $('html').css('--parallax-height', (globalH * 1.4)+'px');
          $('html').css('--header-height', $('header').outerHeight()+'px');
        }
      
        get_global_variable();
        $(window).on('resize', function(){
          if (globalW !== $(window).width()) {
            get_global_variable();
          }
        }); 
    }

    init() {
        var self = this;
        self.globals();
        self.animate();
        self.menu();
        self.slider();
    }
}