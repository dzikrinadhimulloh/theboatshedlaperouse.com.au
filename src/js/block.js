import $ from 'jquery'

export default class Block {
    constructor() {
        this.$customAcc     = $('.custom-accordion')
        this.init()
    }

    accordionInit() {
        var self = this;

        function setActive($obj, active) {
            if (active)
                $($obj).addClass('is-active');
            else 
                $($obj).removeClass('is-active');
        }

        function countHeightContent() {
            self.$customAcc.find('.accordion-item').each(function() {
                var $content    = $(this).find('.accordion-content');
                /*
                var $altContent = document.createElement('div');

                $content.children().each(function() {
                    $(this).clone().appendTo($altContent);
                });

                $($altContent).css({
                    display: 'block',
                    visibility: 'hidden',
                    position: 'fixed',
                    width: $content.width(),
                    height: 'auto',
                });

                $($altContent).appendTo($('body'));
                var height = $($altContent).height();
                $($altContent).remove();
                */
                var height = 0;
                $content.children().each(function() {
                    height += $(this).outerHeight();
                });
                $content.css('--ac-height', height+'px');
            });
        }

        if (this.$customAcc.length > 0) {
            countHeightContent();

            $(window).on('resize', function() {
                countHeightContent();
            })

            this.$customAcc.find('.accordion-item').each(function() {
                var $el         = $(this);
                var $title      = $(this).find('.accordion-title');

                $title.on('click', function() {
                    if ($(this).parent().hasClass('is-active')) {
                        setActive($el, false);
                    } else {
                        setActive($el, true);
                    }
                });
            });
        }
    }

    init() {
        var self = this;
        self.accordionInit();
    }
}