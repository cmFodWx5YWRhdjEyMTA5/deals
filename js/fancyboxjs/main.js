(function ($) {
 "use strict";
$(function(){
/*--------------------------------
 mobile menu tab
---------------------------------- */
    jQuery('nav#dropdown').meanmenu();  
/*--------------------------------
 Active tab
---------------------------------- */
    $('#tabs').tab();
/*--------------------------------
 Active tab grid list
---------------------------------- */
    $('#gridlist').tab();
/*--------------------------------
 Active tab grid list
---------------------------------- */
    $('#viewproduct').tab();
/*--------------------------------
 Active single tabs
---------------------------------- */
    $('#single-tabs').tab();
/*--------------------------------
 scrollUp
---------------------------------- */    
    $(window).scroll(function(){
      if ($(this).scrollTop() > 250) {
       $('.bstore-scrollertop').fadeIn();
      } else {
       $('.bstore-scrollertop').fadeOut();
      }
    });
    //Click event to scroll to top
    $('.bstore-scrollertop').on( "click", function(){
    $('html, body').animate({scrollTop : 0},800);
    return false;
    });   
/*--------------------------------
 owlCarousel
---------------------------------- */
    var owl = $(".carosel-product,.carosel-product1,.carosel-product2,.carosel-product3,.carosel-product4");
      owl.owlCarousel({
      navigation:true,
      slideSpeed : 1000,
      pagination : false,
      addClassActive : true,
      lazyLoad : true,
      items :4,
      itemsDesktop : [1024,3],
      itemsDesktopSmall : [980,2], 
      itemsTablet: [767,2], 
      itemsMobile : [480,1],
      navigationText : ['<i class="icon-left-open"><i class="fa fa-angle-left"></i></i>','<i class="icon-right-open"><i class="fa fa-angle-right"></i></i>']
  });
/*--------------------------------
 owlCarousel5
---------------------------------- */
    var owl = $(".carosel-product5");
      owl.owlCarousel({
      navigation:true,
      slideSpeed : 1000,
      pagination : false,
      addClassActive : true,
      lazyLoad : true,
      items :5,
      itemsDesktop : [1024,3],
      itemsDesktopSmall : [980,3], 
      itemsTablet: [767,2], 
      itemsMobile : [480,1],
      navigationText : ['<i class="icon-left-open"><i class="fa fa-angle-left"></i></i>','<i class="icon-right-open"><i class="fa fa-angle-right"></i></i>']
  });
/*--------------------------------
 pos logo slide
---------------------------------- */
    var owl = $(".pos-logo-slide");
      owl.owlCarousel({
      addClassActive : true,
      autoPlay:false,
      pagination : false,
      items :6,
      itemsDesktop : [1200,5],
      itemsDesktopSmall : [980,4], 
      itemsTablet: [767,3], 
      itemsMobile : [480,2]
    });       
/*--------------------------------
 owlCarousel5
---------------------------------- */
    var owl = $(".carosel-product6,.carosel-product7");
      owl.owlCarousel({
      navigation:true,
      slideSpeed : 1000,
      pagination : false,
      addClassActive : true,
      lazyLoad : true,
      items :1,
      itemsDesktop : [1024,1],
      itemsDesktopSmall : [980,1], 
      itemsTablet: [767,1], 
      itemsMobile : [480,1],
      navigationText : ['<i class="icon-left-open"><i class="fa fa-angle-left"></i></i>','<i class="icon-right-open"><i class="fa fa-angle-right"></i></i>']
  });
/*--------------------------------
 owlCarousel5
---------------------------------- */
      var owl = $(".carosel-product8");
      owl.owlCarousel({
      navigation:true,
      slideSpeed : 1000,
      pagination : false,
      addClassActive : true,
      lazyLoad : true,
      items :2,
      itemsDesktop : [1024,2],
      itemsDesktopSmall : [980,2], 
      itemsTablet: [767,1], 
      itemsMobile : [480,1],
      navigationText : ['<i class="icon-left-open"><i class="fa fa-angle-left"></i></i>','<i class="icon-right-open"><i class="fa fa-angle-right"></i></i>']
  });
/*--------------------------------
 product-view
---------------------------------- */
    var owl = $(".product-view");
      owl.owlCarousel({
      navigation:true,
      slideSpeed : 1000,
      pagination : false,
      addClassActive : true,
      lazyLoad : true,
      items :4,
      itemsDesktop : [1024,4],
      itemsDesktopSmall : [980,3], 
      itemsTablet: [767,4], 
      itemsMobile : [480,3],
      navigationText : ['<i class="icon-left-open"><i class="fa fa-angle-left"></i></i>','<i class="icon-right-open"><i class="fa fa-angle-right"></i></i>']
  });
/*--------------------------------
 single-pro-sidebar
---------------------------------- */
    var owl = $(".single-pro-sidebar");
      owl.owlCarousel({
      navigation:true,
      slideSpeed : 1000,
      pagination : false,
      addClassActive : true,
      lazyLoad : true,
      items :1,
      itemsDesktop : [1024,1],
      itemsDesktopSmall : [980,1], 
      itemsTablet: [767,1], 
      itemsMobile : [480,1],
      navigationText : ['<i class="icon-left-open"><i class="fa fa-angle-left"></i></i>','<i class="icon-right-open"><i class="fa fa-angle-right"></i></i>']
  });
/*--------------------------------
 Accessories-active
---------------------------------- */
    var owl = $(".Accessories-active");
      owl.owlCarousel({
      navigation:true,
      slideSpeed : 1000,
      pagination : false,
      addClassActive : true,
      lazyLoad : true,
      items :6,
      itemsDesktop : [1024,6],
      itemsDesktopSmall : [980,4], 
      itemsTablet: [767,2], 
      itemsMobile : [480,1],
      navigationText : ['<i class="icon-left-open"><i class="fa fa-angle-left"></i></i>','<i class="icon-right-open"><i class="fa fa-angle-right"></i></i>']
  });
/*--------------------------------
 about-su-active
---------------------------------- */
    $(".about-us-slide").owlCarousel({
      autoPlay:6000,
      paginationSpeed : 10000,
      pagination : false,
      items : 1,
      transitionStyle : "goDown",
      itemsDesktop : [1199,1],
      itemsDesktopSmall : [979,1],
      itemsTablet: [767,1]

    }); 

/*--------------------------------
 about-su-active
---------------------------------- */
    $(".about-us-testimonial").owlCarousel({
      autoPlay:3000,
      paginationSpeed : 3000,
      pagination : true,
      items : 1,
      transitionStyle : "goDown",
      itemsDesktop : [1199,1],
      itemsDesktopSmall : [979,1],
      itemsTablet: [767,1]

    });     
/*---------------------
 countdown
--------------------- */
    $('[data-countdown]').each(function() {
      var $this = $(this), finalDate = $(this).data('countdown');
      $this.countdown(finalDate, function(event) {
      $this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Sec</p></span>'));
      });
    });            
/*--------------------------------
 owlCarousel5
---------------------------------- */
    $('.fancybox').fancybox();     
/*--------------------------------
 about accordion
---------------------------------- */
    function toggleChevron(e) {
        $(e.target)
            .prev('.panel-heading')
            .find("i.indicator")
            .toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
    }
    $('#accordion').on('hidden.bs.collapse', toggleChevron);
    $('#accordion').on('shown.bs.collapse', toggleChevron);
});
         
})(jQuery);
