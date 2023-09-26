(function ($) {

    /**
     * initializeBlock
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    15/4/19
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */
    var initializeBlock = function ($block) {

        function animation() {
            var animationbottom = jQuery.find('.animation__fade');
            var $window = jQuery(window);
            $window.on('scroll', check_if_in_view);
            function check_if_in_view() {
              var window_height = $window.height();
              var window_top_position = $window.scrollTop();
              var window_bottom_position = (window_top_position + window_height);
              jQuery.each(animationbottom, function() {
                var $element = jQuery(this);
                var element_height = $element.outerHeight();
                var element_top_position = $element.offset().top;
                var element_bottom_position = (element_top_position + element_height);
                if ((element_bottom_position >= window_top_position) && (element_top_position <= window_bottom_position)) {
                  $element.addClass('show');
                  $element.addClass('t-delay-300');
                }
              });
            }
        }
        
        setTimeout(() => {
            animation();
            jQuery(document).on('click','.icon__menu', function(event){
                jQuery('.header__menu').toggleClass('is-open');
            });
            jQuery(document).on('click','.header__menu.is-open .nav-backdrop', function(event){
                jQuery('.header__menu').removeClass('is-open');
            });
            jQuery(document).on('keyup',function(evt) {
                if (evt.keyCode == 27) {
                    jQuery('.icon__menu.is-active').removeClass('is-active');
                    jQuery('.header__menu.is-show').removeClass('is-show');
                }
            });       
            jQuery('.header__menu li:has(ul)').addClass('has-sub');
          
            /* menu open and close on single click */
            jQuery(document).on('click','.header__menu .has-sub>a',function(event){
                var element = jQuery(this).parent('li');
                if (element.hasClass('is-open')) {
                    element.removeClass('is-open');
                    element.find('li').removeClass('is-open');
                    element.find('ul').slideUp(200);
                }
                else {
                    element.addClass('is-open');
                    element.children('ul').slideDown(200);
                    element.siblings('li').children('ul').slideUp(200);
                    element.siblings('li').removeClass('is-open');
                    element.siblings('li').find('li').removeClass('is-open');
                    element.siblings('li').find('ul').slideUp(200);
                }
            });
          
            if(jQuery(".business__slider .business__slider__single").length > 0) {
              jQuery('.business__slider').slick({
                  dots: true,
                  infinite: true,
                  autoplaySpeed: 5000,
                  autoplay: true,
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  variableWidth: true,
                  centerMode: true,
                  arrows: true,
                  dots: false,
                  prevArrow: '<div class="slick-prev"></div>',
                  nextArrow: '<div class="slick-next"></div>'
              });
            }

            if(jQuery(".testimonials__slider .testimonials__slider__single").length > 0) {
              jQuery('.testimonials__slider').slick({
                  dots: false,
                  infinite: true,
                  autoplaySpeed: 3000,
                  autoplay: true,
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  variableWidth: true,
                  centerMode: true,
                  arrows: false,
                  prevArrow: '<div class="slick-prev"></div>',
                  nextArrow: '<div class="slick-next"></div>'
              });
            }
            var $slider = jQuery('.testimonials__slider');
            var $progressBar = jQuery('.testimonials__progressbar');
            var $progressBarLabel = jQuery( '.slider__label' );
            
            $slider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {   
              var calc = ( (nextSlide) / (slick.slideCount-1) ) * 100;
              $progressBar
                .css('background-size', calc + '% 100%')
                .attr('aria-valuenow', calc );
              
              $progressBarLabel
                .css('left', calc + '%')
            });
          
            jQuery(window).scroll(function(){
              var sticky = jQuery('.header'),
                  scroll = jQuery(window).scrollTop();
            
              if (scroll >= 40) sticky.addClass('header__sticky');
              else sticky.removeClass('header__sticky');
            });
          
            jQuery(".banner__section .animation__fade").addClass("show"); 

        }, 2500);
            
    }

    
    // Initialize each block on page load (front end).
    $(document).ready(function () {
        initializeBlock();
    });

    // Initialize dynamic block preview (editor).
    if (window.acf) {
        window.acf.addAction('render_block_preview', initializeBlock);
    }

})(jQuery);