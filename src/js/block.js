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

    masonry() {
        $('.grid-masonry').each(function(){
            
        var gutterSize = window.innerWidth > 1440 ? 30 :
                        window.innerWidth > 630 ? 20 : 20;
                        
            $(this).masonry({
                itemSelector: '.grid-item',
                columnWidth: '.grid-item',
                gutter: gutterSize,
                percentPosition: true
            });
        }) 
    }

    newsIndex() {
        var self = this;
        
        $(document).on('click', '[href="#select-page"]', function(e){
            e.preventDefault();
            var $parent   = $(this).closest('.blog-index-container');
            var page     = $(this).data('page');
            var category = $parent.data('cat');

            
            self.loadNewsIndex(page, category, $parent);    
        });

        $(document).on('click', '[href="#filter-cat"]', function(e){
            e.preventDefault();
            var $parent  = $(this).closest('.blog-index-container');
            var category = $(this).data('cat-id');
                
            if ($(this).hasClass('active')) {
                category = 0;
                $parent.find('.item-cat').removeClass('active');
            } else {
                $parent.find('.item-cat').removeClass('active');
                $(this).addClass('active');
            }
            
            self.loadNewsIndex(1, category, $parent);
        });
        
        $(document).on('click', '[href="#prev-page"], [href="#next-page"]', function(e){
            e.preventDefault();
            var $parent  = $(this).closest('.blog-index-container');
            var page     = $parent.data('current-page');
            var totalPg  = $parent.data('total-page');
            var category = $parent.data('cat');
            var isNext   = $(this).attr('href').includes('next') ? true : false;

            if (isNext) {
                var newPage = parseInt(page) + 1;
            } else {
                var newPage = parseInt(page) - 1;
            } 
            
            if ((newPage >= 1) && (newPage <= totalPg)) {
                self.loadNewsIndex(newPage, category, $parent);
            }
        });
    }

    loadNewsIndex(page, category, $parent) {
        var self = this;
        var $itemCont = $parent.find('.blog-item-container');
        var $itemContPaging = $parent.find('.blog-index-paging');
        
        $.ajax({
            type: 'post',
            url: AdminAjax,
            data: {
                action: 'load_blog_directory',
                page: page,
                category: category
            },
            beforeSend: function() {
                $parent.addClass('disabled');
            },  
            success: function(response) {
                $itemCont.html(response['html']);
                $parent.data('current-page', page);
                $parent.data('cat', category);

                $itemContPaging.html(response['html_paging']);    
                $parent.find('.page-no').removeClass('active');
                $parent.find('.page-no[data-page="'+page+'"]').addClass('active');

                $parent.removeClass('disabled');                
                //self.loadNewsPaging(response['total-page'], $parent, page);
                $('html, body').animate({
                    scrollTop: $itemCont.offset().top - 200
                }, 400);
            },
            error: function(xhr, status, error) {
                console.log("AJAX Error:", status, error);
            }
        })
    }

    loadNewsPaging(totalPage, $parent, page) {
        var $itemCont = $parent.find('.blog-index-paging');
        $.ajax({
            type: 'post',
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'load_blog_paging',
                total_page: totalPage
            },
            beforeSend: function() {
                //$parent.addClass('disabled');
            },  
            success: function(response) {
                $itemCont.html(response['html']);     
                $parent.removeClass('disabled');

                if (response['html']) {
                    $parent.find('.page-no').removeClass('active');
                    $parent.find('.page-no[data-page="'+page+'"]').addClass('active');
                }
            }
        })
    }

    init() {
        var self = this;
        self.accordionInit();
        self.masonry();
        self.newsIndex();

        $(window).on('resize', function() {
            self.masonry();
        });

        // fix masonry after few second
        setTimeout(() => {
            self.masonry();            
        }, 5000);
    }
}