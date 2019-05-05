/*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
//global variables
var responsiveflag = false;
function calcHeight(){
	if($(".height-items").length >0){
		$(".height-items").each(function(index) {
				var $list		= $(this),
				$items		= $list.find( '.height-item' );
				$items.css( 'height', 'auto' );
				var perRow = Math.floor( $list.actual('width') / $items.actual('width') );
				if( perRow == null || perRow < 2 ) return true;
				for( var i = 0, j = $items.length; i < j; i += perRow )
				{
					var maxHeight	= 0,
						$row		= $items.slice( i, i + perRow );

					$row.each( function()
					{
						var itemHeight = parseInt( $( this ).actual('outerHeight'));
						if ( itemHeight > maxHeight ) maxHeight = itemHeight;
					});
					$row.css( 'height', maxHeight );
				}
		});
	}

	return true;
}
$(document).ready(function(){

	$('.brand-list-owl li > a').click(function (e) {
		$(this).closest('.brand-list-owl').find('li').each(function(){
			$(this).removeClass('active');
		});
		e.preventDefault();
		$(this).tab('show');
	});

	var Jready = {
        mobile: !1,
        checkMobile: function() {
            this.mobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? !0 : !1
        },
        compareChecked:function(){
	        $(".compare-checked").each(function() {
	            $(this).addClass('checked');
	        });
        },
        widgetLinksCarousel:function(){
        	if($(".owl-widget-links").length >0){
	        	$(".owl-widget-links").owlCarousel({
					lazyLoad:true,
					loop: false,
					autoplay: false,
					dots: false,
					items: 1,
					nav:true
			});
			}
        },
        widgetLinksCarousel:function(){
        	if($(".simple-owl").length >0){
	        	$(".simple-owl").owlCarousel({
					lazyLoad:true,
					loop: false,
					autoplay: false,
					dots: false,
					items: 1,
					nav:false
			});
			}
        },
        brandListCarousel:function(){
        	if($(".brand-list-owl").length >0){
	        	$(".brand-list-owl").owlCarousel({
					items:8,
					navigation:true,
					pagination:false,
					navigationText: [
						"<i class='icon-chevron-left icon-white'><</i>",
						"<i class='icon-chevron-right icon-white'>></i>"],
					lazyLoad: true,
					loop: true,
					responsive: {
						0:{
							items:1,
							navigation:true
						},
						320:{
							items:1,
							navigation:true
						},
						768:{
							items:2,
							navigation:true
						},
						992:{
							items:6,
							navigation:true
						},
						1200:{
							items:8,
							navigation:true
						}
					}
				});
        	}

        },
        bxSliderVertical:function(){
        	if($(".bx-slider-vertical").length >0){
		    	$(".bx-slider-vertical").each(function(index) {
					$(this).bxSlider({
						mode: 'vertical',
		  				slideMargin: 5,
		  				minSlides: 7,
		  				maxSlides: 7,
		  				pager:false,
		  				controls:true
					});
				});
		    }
        },
        megacategoryCountdown1:function(){
        	if($(".megacategory-countdown-style-1").length >0){
				var labels = [txt_years, txt_month, txt_weeks, txt_days, txt_hours, txt_min, txt_sec];
		        $('.megacategory-countdown-style-1').each(function() {
		        	var layout = '<div class="box-count '+$(this).data('cl')+'"><div class="number">{dnn}</div><div class="text">'+txt_days+'</div></div><div class="box-count '+$(this).data('cl')+' "><div class="number">{hnn}</div> <div class="text">'+txt_hours+'</div></div><div class="box-count '+$(this).data('cl')+'"><div class="number">{mnn}</div><div class="text">'+txt_min+'</div></div><div class="box-count '+$(this).data('cl')+'"><div class="number">{snn}</div><div class="text">'+txt_sec+'</div></div>',
		            until = new Date($(this).data('year'),$(this).data('month') - 1,$(this).data('day'),$(this).data('hours'),$(this).data('minutes'),$(this).data('seconds'));
		            $(this).countdown({
		                until: until,
		                labels: [txt_years, txt_month, txt_weeks, txt_days, txt_hours, txt_min, txt_sec],
		                layout: layout
		            });
		        });
			}
        },
        homeBlogCarousel:function(){
        	$(".home-blogs-owl-carousel").each(function(index, el) {
		    	$(".home-blogs-owl-carousel").owlCarousel({
					lazyLoad:true,
					loop: false,
					dots: false,
					margin:30,
					responsive: {
						0:{
							items:1,
							nav:false
						},
						320:{
							items:1,
							nav:false
						},
						480:{
							items:2,
							nav:false
						},
						768:{
							items:3,
							nav:false
						},
						992:{
							items:3,
							nav:false
						},
						1200:{
							items:4,
							nav:true
						}
					}
				});
			});
        },
        brandsSlider:function(){
        	$(".brands-slider").each(function(index, el) {
        		var config=$(this).data();
        		if(config){
        			$(this).owlCarousel(config);
        		}else{
        			$(this).owlCarousel({
						lazyLoad:true,
						loop: false,
						dots: false,
						margin:0,
						responsive: {
							0:{
								items:1,
								nav:false
							},
							320:{
								items:2,
								nav:false
							},
							768:{
								items:4,
								nav:false
							},
							992:{
								items:6,
								nav:false
							},
							1200:{
								items:8,
								nav:true
							}
						}
					});
        		}
			});
        },
        relatedPostCarousel:function (){
        	if($(".related-posts-carousel").length >0){
				$(".related-posts-carousel").owlCarousel({
					lazyLoad:true,
					loop: false,
					margin: 30,
					dots: false,
					responsive: {
						0:{
							items:1,
							nav:false
						},
						320:{
							items:2,
							nav:false
						},
						768:{
							items:2,
							nav:false
						},
						1200:{
							items:3,
							nav:true
						}
					}
				});
			}
        },
        breadcrumb:function(){
        	if($("#ps-breadcrumb").length >0){
				$(".navigation_page").find('span').remove();
				var breadcrumb = '';
				$("#ps-breadcrumb").find('a').each(function(index) {
					breadcrumb += '<li><a href="'+($(this).attr('href'))+'" title="'+($(this).text())+'">'+($(this).text())+'</a></li>';
					$(this).remove();
				});
				$("#ps-breadcrumb").find('.navigation-pipe').remove();
				if($("#ps-breadcrumb").data('show-active') == '1'){
					breadcrumb += '<li class="active">'+($("#ps-breadcrumb").text())+'</li>';
				}
				$("ul.breadcrumb").html(breadcrumb);

			}
        },
        itemCalc:function(){
        	$('.calc-items > .calc-item:nth-child(2n)').addClass('nth-child-2n');
		    $('.calc-items > .calc-item:nth-child(2n+1)').addClass('nth-child-2np1');
		    $('.calc-items > .calc-item:nth-child(3n)').addClass('nth-child-3n');
		    $('.calc-items > .calc-item:nth-child(3n+1)').addClass('nth-child-3np1');
		    $('.calc-items > .calc-item:nth-child(4n)').addClass('nth-child-4n');
		    $('.calc-items > .calc-item:nth-child(4n+1)').addClass('nth-child-4np1');
		    $('.calc-items > .calc-item:nth-child(5n)').addClass('nth-child-5n');
		    $('.calc-items > .calc-item:nth-child(5n+1)').addClass('nth-child-5np1');
		    $('.calc-items > .calc-item:nth-child(6n)').addClass('nth-child-6n');
		    $('.calc-items > .calc-item:nth-child(6n+1)').addClass('nth-child-6np1');
        },
        treeMenus:function(){
        	$('.tree-menu li').each(function (index) {
				if($(this).hasClass('selected')){
					$(this).parents('li').addClass('selected');
				}
			});
        },
        megacontentCarousel:function(){
        	if($(".megacontent-carousel").length >0){
				$(".megacontent-carousel").each(function(index, el) {
			      var config = $(this).data();
			      $(this).owlCarousel(config);
				});
			}
        },
        testimonialCarousel:function(){
        	if($(".testimonial-carousel").length >0){
				$(".testimonial-carousel").each(function(index, el) {
					var owl = $('.testimonial-carousel');
			        owl.owlCarousel(
			            {
			                margin:30,
			                autoplay:false,
			                dots:false,
			                loop:true,
			                items:3,
			                nav:true,
			                smartSpeed:1000,
			                navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
			            }
			        );
			      	owl.trigger('next.owl.carousel');
			        owl.on('changed.owl.carousel', function(event) {
			            owl.find('.owl-item.active').removeClass('item-center');
			            var caption=owl.find('.owl-item.active').first().next().find('.info').html();
			            owl.closest('.block-testimonials').find('.testimonial-caption').html(caption).addClass('zoomIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
							$(this).removeClass('zoomIn animated');
			            });;
			            setTimeout(function(){
			                owl.find('.owl-item.active').first().next().addClass('item-center');
			                owl.find('.owl-item.active').first().next().addClass('zoomIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			                     $(this).removeClass('zoomIn animated');
			                });
			            }, 100);
			        });
				});
			}
        },
        lazySimpleCarousel:function(){
        	if((".lazy-simple-carousel").length >0){
	        	$(".lazy-simple-carousel").owlCarousel({
					lazyLoad:true,
					loop: false,
					margin: 0,
					dots: false,
					items:1,
					nav:true
				});
        	}
        },
        countdownSetting:function(){
        	if($(".countdown").length >0){
				$('.countdown').each(function(){
					var $this = $(this);
					var	endDate = $this.data();
					var	until = new Date(parseInt(endDate.year), parseInt(endDate.month) - 1, parseInt(endDate.day), parseInt(endDate.hours), parseInt(endDate.minutes), parseInt(endDate.seconds));
					$this.countdown({
						until : until,
						format : 'dHMS',
			            layout: '<div class="countdown-content"><span class="box-count"><span class="number">{dnn}</span></span><span class="box-count"><span class="number">{hnn}</span></span><span class="box-count"><span class="number">{mnn}</span></span><span class="box-count"><span class="number">{snn}</span></span></div>',
						labels : [txt_years, txt_month, txt_weeks, txt_days, txt_hours, txt_min, txt_sec]
					});
				});
			}
        },
        countdownSetting2:function(){
        	if($(".countdown-style-2").length >0){
				var labels = [txt_years, txt_month, txt_weeks, txt_days, txt_hours, txt_min, txt_sec];
		        $('.countdown-style-2').each(function() {
		        	var layout = '<div class="box-count '+$(this).data('cl')+'"><div class="number">{dnn}</div><div class="text">'+txt_days+'</div></div><div class="box-count '+$(this).data('cl')+' "><div class="number">{hnn}</div> <div class="text">'+txt_hours+'</div></div><div class="box-count '+$(this).data('cl')+'"><div class="number">{mnn}</div><div class="text">'+txt_min+'</div></div><div class="box-count '+$(this).data('cl')+'"><div class="number">{snn}</div><div class="text">'+txt_sec+'</div></div>',
		            until = new Date($(this).data('year'),$(this).data('month') - 1,$(this).data('day'),$(this).data('hours'),$(this).data('minutes'),$(this).data('seconds'));
		            $(this).countdown({
		                until: until,
		                labels: [txt_years, txt_month, txt_weeks, txt_days, txt_hours, txt_min, txt_sec],
		                layout: layout
		            });
		        });
			}
        },
        megadealCountdown:function(){
        	if($(".megadeal-countdown").length >0){
				var labels = [txt_years, txt_month, txt_weeks, txt_days, txt_hours, txt_min, txt_sec];
		        var layout = '<span class="box-count"><span class="number">{dnn}</span> <span class="text">'+txt_days+'</span></span><span class="dot">:</span><span class="box-count"><span class="number">{hnn}</span> <span class="text">'+txt_hours+'</span></span><span class="dot">:</span><span class="box-count"><span class="number">{mnn}</span> <span class="text">'+txt_min+'</span></span><span class="dot">:</span><span class="box-count"><span class="number">{snn}</span> <span class="text">'+txt_sec+'</span></span>';
		        $('.megadeal-countdown').each(function() {
		            var until = new Date($(this).data('year'),$(this).data('month') - 1,$(this).data('day'),$(this).data('hours'),$(this).data('minutes'),$(this).data('seconds'));
		            $(this).countdown({
		                until: until,
		                labels: [txt_years, txt_month, txt_weeks, txt_days, txt_hours, txt_min, txt_sec],
		                layout: layout
		            });
		        });
			}
        },
        owlCarouselSetup:function(){
        	$(".owl-carousel").each(function(index,el){
        		var config=$(this).data();


        		if(config.rtl == "1")
        			config.rtl = true;
        		else
        			config.rtl = false;

        		if(config.nav == "1")
        			config.nav = true;
        		else
        			config.nav = false;

        		if(config.loop == "1"){
        			if($(this).children().length >1){
        				config.loop = true;
        			}else{
        				config.loop = false;
        			}
        		}

        		else
        			config.loop = false;

        		if(config.dots == "1")
        			config.dots = true;
        		else
        			config.dots = false;

        		if(config.lazyload == "1"){
        			config.lazyLoad = true;
        		}else{
        			config.lazyLoad = false;
        		}

        		if(config.autoplayhoverpause == "1")
        			config.autoplayHoverPause = true;
        		else
        			config.autoplayHoverPause = false;

        		if(config.autoplay == "1")
        			config.autoPlay = true;
        		else
        			config.autoPlay = false;
        		if($(this).hasClass('owl-style2')){
        			config.animateOut="fadeOut";
        			config.animateIn="fadeIn";
        		}
			$(this).owlCarousel(config);});
        },

        init: function() {
            this.compareChecked();
            this.owlCarouselSetup();
            this.widgetLinksCarousel();
            this.brandListCarousel();
            this.bxSliderVertical();
            this.megacategoryCountdown1();
            this.homeBlogCarousel();
            this.brandsSlider();
            this.relatedPostCarousel();
            this.itemCalc();
            this.treeMenus();
            this.megacontentCarousel();
            this.testimonialCarousel();
            this.lazySimpleCarousel();
            this.countdownSetting();
            this.countdownSetting2();
            this.megadealCountdown();

        }
    }
    Jready.init();






	highdpiInit();
	responsiveResize();
	$(window).resize(responsiveResize);
	if (navigator.userAgent.match(/Android/i))
	{
		var viewport = document.querySelector('meta[name="viewport"]');
		viewport.setAttribute('content', 'initial-scale=1.0,maximum-scale=1.0,user-scalable=0,width=device-width,height=device-height');
		window.scrollTo(0, 1);
	}
	if (typeof quickView !== 'undefined' && quickView){
		$('#size_chart').fancybox();
		quick_view();
	}

	dropDown();

	if (typeof page_name != 'undefined' && !in_array(page_name, ['index', 'product']))
	{
		bindGrid();

 		$(document).on('change', '.selectProductSort', function(e){
			if (typeof request != 'undefined' && request)
				var requestSortProducts = request;
 			var splitData = $(this).val().split(':');
 			var url = '';
			if (typeof requestSortProducts != 'undefined' && requestSortProducts)
			{
				url += requestSortProducts ;
				if (typeof splitData[0] !== 'undefined' && splitData[0])
				{
					url += ( requestSortProducts.indexOf('?') < 0 ? '?' : '&') + 'orderby=' + splitData[0] + (splitData[1] ? '&orderway=' + splitData[1] : '');
					if (typeof splitData[1] !== 'undefined' && splitData[1])
						url += '&orderway=' + splitData[1];
				}
				document.location.href = url;
			}
    	});

		$(document).on('change', 'select[name="n"]', function(){
			$(this.form).submit();
		});

		$(document).on('change', 'select[name="currency_payment"]', function(){
			setCurrency($(this).val());
		});
	}

	$(document).on('change', 'select[name="manufacturer_list"], select[name="supplier_list"]', function(){
		if (this.value != '')
			location.href = this.value;
	});

	$(document).on('click', '.back', function(e){
		e.preventDefault();
		history.back();
	});
	$(document).on('click', '.toggledropdown', function () {;
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			$(".dropdown-menu").slideUp();
		}else{
			$(this).addClass('active');
			$(".dropdown-menu").slideUp();
			$(this).next('.dropdown-menu').slideDown();
		}
	});
	jQuery.curCSS = jQuery.css;
	if (!!$.prototype.cluetip)
		$('a.cluetip').cluetip({
			local:true,
			cursor: 'pointer',
			dropShadow: false,
			dropShadowSteps: 0,
			showTitle: false,
			tracking: true,
			sticky: false,
			mouseOutClose: true,
			fx: {
		    	open:       'fadeIn',
		    	openSpeed:  'fast'
			}
		}).css('opacity', 0.8);

	if (!!$.prototype.fancybox)
		/*$.extend($.fancybox.defaults.tpl, {
			closeBtn : '<a title="' + FancyboxI18nClose + '" class="fancybox-item fancybox-close" href="javascript:;"></a>',
			next     : '<a title="' + FancyboxI18nNext + '" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
			prev     : '<a title="' + FancyboxI18nPrev + '" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
		});*/

	// Close Alert messages
	$(".alert.alert-danger").on('click', this, function(e){
		if (e.offsetX >= 16 && e.offsetX <= 39 && e.offsetY >= 16 && e.offsetY <= 34)
			$(this).fadeOut();
	});

    setDefaultTab();
    $(document).on('click','.option8 .form-search .icon',function(){
        $(this).closest('.form-search').find('.form').fadeIn(600);
    });
    $(document).on('click','.option8 .form-search .close-form',function(){
        $(this).closest('.form').fadeOut(600);
    });
	calcHeight();
	if($(".owl-widget-links").length >0){
		$(".owl-widget-links").owlCarousel({
			lazyLoad:true,
			loop: false,
			dots: false,
			margin:0,
			responsive: {
				0:{
					items:1,
					nav:false
				},
				320:{
					items:1,
					nav:false
				},
				480:{
					items:1,
					nav:false
				},
				768:{
					items:1,
					nav:false
				},
				992:{
					items:1,
					nav:true
				},
				1200:{
					items:1,
					nav:true
				}
			}
		});
	}
});
$(window).bind('load', function(){
    var JLoad = {
        mobile: !1,
        checkMobile: function() {
            this.mobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? !0 : !1
        },
        stellarParallax: function() {
        	if($(".parallax").length >0){
	        	!this.mobile && $(window).stellar({
	                horizontalOffset: 0,
	                horizontalScrolling: !1
	            }), this.mobile && $(".parallax").css("background-attachment", "initial")
        	}

        },
        jqueryParallax: function () {
            $('.jquery-parallax').each(function(){
                var speed = 0.1;
                var firstTop = null;
                if($(this).data('parallax-speed') != '') {
                    speed = $(this).data('parallax-speed');
                }
                $(this).parallax('50%', speed);
            });
            if ( this.mobile ) {
                $('.jquery-parallax').css('background-attachment', 'initial');
            }
        },
        simpleCarousel:function(elClass){
        	$('.'+elClass).each(function(){
	        	$(this).owlCarousel({
					lazyLoad:true,
					loop: false,
					autoplay: true,
					dots: false,
					items: 1,
					nav:true
				});
        	});

        },
        init: function() {
            this.checkMobile();
            if($(".parallax").length >0){
            	this.stellarParallax();
            }
            if($(".jquery-parallax").length >0){
            	this.jqueryParallax();
            }
            this.simpleCarousel("owl-banners");
        }
    }
    JLoad.init();
});
/*Plugin: jQuery ParallaxVersion 1.1.3Author: Ian LunnTwitter: @IanLunnAuthor URL: http://www.ianlunn.co.uk/ | Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/ | Dual licensed under the MIT and GPL licenses:http://www.opensource.org/licenses/mit-license.phphttp://www.gnu.org/licenses/gpl.html*/
(function( $ ){
	var $window = $(window);
	var windowHeight = $window.height();
	$window.resize(function () {
		windowHeight = $window.height();
	});
	$.fn.parallax = function(xpos, speedFactor, outerHeight) {
		var $this = $(this);
		var getHeight;
		var firstTop;
		var paddingTop = 0;
		//get the starting position of each element to have parallax applied to it
		$this.each(function(){
		    firstTop = $this.offset().top;
		});

		if (outerHeight) {
			getHeight = function(jqo) {
				return jqo.outerHeight(true);
			};
		} else {
			getHeight = function(jqo) {
				return jqo.height();
			};
		}
		// setup defaults if arguments aren't specified
		if (arguments.length < 1 || xpos === null) xpos = "50%";
		if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
		if (arguments.length < 3 || outerHeight === null) outerHeight = true;

		// function to be called whenever the window is scrolled or resized
		function update(){
			var pos = $window.scrollTop();

			$this.each(function(){
				var $element = $(this);
				var top = $element.offset().top;
				var height = getHeight($element);

				// Check if totally above or totally below viewport
				if (top + height < pos || top > pos + windowHeight) {
					return;
				}

				$this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
			});
		}
		$window.bind('scroll', update).resize(update);
		update();
	};


	$(document).on('click', '.current-open', function(e){
		var p = $(this).parent();
		if(p.hasClass('open')){
			p.removeClass('open');//.find('.dropdown-menu').slideUp(300);
		}else{
			//$(".dropdown-menu").slideUp(300);
			$(".dropdown").removeClass('open');
			p.addClass('open');//.find('.dropdown-menu').slideDown(300);
		}
	});

})(jQuery);
/*! Stellar.js v0.6.2 | Copyright 2014, Mark Dalgleish | http://markdalgleish.com/projects/stellar.js | http://markdalgleish.mit-license.org */
!function(a,b,c,d){function e(b,c){this.element=b,this.options=a.extend({},g,c),this._defaults=g,this._name=f,this.init()}var f="stellar",g={scrollProperty:"scroll",positionProperty:"position",horizontalScrolling:!0,verticalScrolling:!0,horizontalOffset:0,verticalOffset:0,responsive:!1,parallaxBackgrounds:!0,parallaxElements:!0,hideDistantElements:!0,hideElement:function(a){a.hide()},showElement:function(a){a.show()}},h={scroll:{getLeft:function(a){return a.scrollLeft()},setLeft:function(a,b){a.scrollLeft(b)},getTop:function(a){return a.scrollTop()},setTop:function(a,b){a.scrollTop(b)}},position:{getLeft:function(a){return-1*parseInt(a.css("left"),10)},getTop:function(a){return-1*parseInt(a.css("top"),10)}},margin:{getLeft:function(a){return-1*parseInt(a.css("margin-left"),10)},getTop:function(a){return-1*parseInt(a.css("margin-top"),10)}},transform:{getLeft:function(a){var b=getComputedStyle(a[0])[k];return"none"!==b?-1*parseInt(b.match(/(-?[0-9]+)/g)[4],10):0},getTop:function(a){var b=getComputedStyle(a[0])[k];return"none"!==b?-1*parseInt(b.match(/(-?[0-9]+)/g)[5],10):0}}},i={position:{setLeft:function(a,b){a.css("left",b)},setTop:function(a,b){a.css("top",b)}},transform:{setPosition:function(a,b,c,d,e){a[0].style[k]="translate3d("+(b-c)+"px, "+(d-e)+"px, 0)"}}},j=function(){var b,c=/^(Moz|Webkit|Khtml|O|ms|Icab)(?=[A-Z])/,d=a("script")[0].style,e="";for(b in d)if(c.test(b)){e=b.match(c)[0];break}return"WebkitOpacity"in d&&(e="Webkit"),"KhtmlOpacity"in d&&(e="Khtml"),function(a){return e+(e.length>0?a.charAt(0).toUpperCase()+a.slice(1):a)}}(),k=j("transform"),l=a("<div />",{style:"background:#fff"}).css("background-position-x")!==d,m=l?function(a,b,c){a.css({"background-position-x":b,"background-position-y":c})}:function(a,b,c){a.css("background-position",b+" "+c)},n=l?function(a){return[a.css("background-position-x"),a.css("background-position-y")]}:function(a){return a.css("background-position").split(" ")},o=b.requestAnimationFrame||b.webkitRequestAnimationFrame||b.mozRequestAnimationFrame||b.oRequestAnimationFrame||b.msRequestAnimationFrame||function(a){setTimeout(a,1e3/60)};e.prototype={init:function(){this.options.name=f+"_"+Math.floor(1e9*Math.random()),this._defineElements(),this._defineGetters(),this._defineSetters(),this._handleWindowLoadAndResize(),this._detectViewport(),this.refresh({firstLoad:!0}),"scroll"===this.options.scrollProperty?this._handleScrollEvent():this._startAnimationLoop()},_defineElements:function(){this.element===c.body&&(this.element=b),this.$scrollElement=a(this.element),this.$element=this.element===b?a("body"):this.$scrollElement,this.$viewportElement=this.options.viewportElement!==d?a(this.options.viewportElement):this.$scrollElement[0]===b||"scroll"===this.options.scrollProperty?this.$scrollElement:this.$scrollElement.parent()},_defineGetters:function(){var a=this,b=h[a.options.scrollProperty];this._getScrollLeft=function(){return b.getLeft(a.$scrollElement)},this._getScrollTop=function(){return b.getTop(a.$scrollElement)}},_defineSetters:function(){var b=this,c=h[b.options.scrollProperty],d=i[b.options.positionProperty],e=c.setLeft,f=c.setTop;this._setScrollLeft="function"==typeof e?function(a){e(b.$scrollElement,a)}:a.noop,this._setScrollTop="function"==typeof f?function(a){f(b.$scrollElement,a)}:a.noop,this._setPosition=d.setPosition||function(a,c,e,f,g){b.options.horizontalScrolling&&d.setLeft(a,c,e),b.options.verticalScrolling&&d.setTop(a,f,g)}},_handleWindowLoadAndResize:function(){var c=this,d=a(b);c.options.responsive&&d.bind("load."+this.name,function(){c.refresh()}),d.bind("resize."+this.name,function(){c._detectViewport(),c.options.responsive&&c.refresh()})},refresh:function(c){var d=this,e=d._getScrollLeft(),f=d._getScrollTop();c&&c.firstLoad||this._reset(),this._setScrollLeft(0),this._setScrollTop(0),this._setOffsets(),this._findParticles(),this._findBackgrounds(),c&&c.firstLoad&&/WebKit/.test(navigator.userAgent)&&a(b).load(function(){var a=d._getScrollLeft(),b=d._getScrollTop();d._setScrollLeft(a+1),d._setScrollTop(b+1),d._setScrollLeft(a),d._setScrollTop(b)}),this._setScrollLeft(e),this._setScrollTop(f)},_detectViewport:function(){var a=this.$viewportElement.offset(),b=null!==a&&a!==d;this.viewportWidth=this.$viewportElement.width(),this.viewportHeight=this.$viewportElement.height(),this.viewportOffsetTop=b?a.top:0,this.viewportOffsetLeft=b?a.left:0},_findParticles:function(){{var b=this;this._getScrollLeft(),this._getScrollTop()}if(this.particles!==d)for(var c=this.particles.length-1;c>=0;c--)this.particles[c].$element.data("stellar-elementIsActive",d);this.particles=[],this.options.parallaxElements&&this.$element.find("[data-stellar-ratio]").each(function(){var c,e,f,g,h,i,j,k,l,m=a(this),n=0,o=0,p=0,q=0;if(m.data("stellar-elementIsActive")){if(m.data("stellar-elementIsActive")!==this)return}else m.data("stellar-elementIsActive",this);b.options.showElement(m),m.data("stellar-startingLeft")?(m.css("left",m.data("stellar-startingLeft")),m.css("top",m.data("stellar-startingTop"))):(m.data("stellar-startingLeft",m.css("left")),m.data("stellar-startingTop",m.css("top"))),f=m.position().left,g=m.position().top,h="auto"===m.css("margin-left")?0:parseInt(m.css("margin-left"),10),i="auto"===m.css("margin-top")?0:parseInt(m.css("margin-top"),10),k=m.offset().left-h,l=m.offset().top-i,m.parents().each(function(){var b=a(this);return b.data("stellar-offset-parent")===!0?(n=p,o=q,j=b,!1):(p+=b.position().left,void(q+=b.position().top))}),c=m.data("stellar-horizontal-offset")!==d?m.data("stellar-horizontal-offset"):j!==d&&j.data("stellar-horizontal-offset")!==d?j.data("stellar-horizontal-offset"):b.horizontalOffset,e=m.data("stellar-vertical-offset")!==d?m.data("stellar-vertical-offset"):j!==d&&j.data("stellar-vertical-offset")!==d?j.data("stellar-vertical-offset"):b.verticalOffset,b.particles.push({$element:m,$offsetParent:j,isFixed:"fixed"===m.css("position"),horizontalOffset:c,verticalOffset:e,startingPositionLeft:f,startingPositionTop:g,startingOffsetLeft:k,startingOffsetTop:l,parentOffsetLeft:n,parentOffsetTop:o,stellarRatio:m.data("stellar-ratio")!==d?m.data("stellar-ratio"):1,width:m.outerWidth(!0),height:m.outerHeight(!0),isHidden:!1})})},_findBackgrounds:function(){var b,c=this,e=this._getScrollLeft(),f=this._getScrollTop();this.backgrounds=[],this.options.parallaxBackgrounds&&(b=this.$element.find("[data-stellar-background-ratio]"),this.$element.data("stellar-background-ratio")&&(b=b.add(this.$element)),b.each(function(){var b,g,h,i,j,k,l,o=a(this),p=n(o),q=0,r=0,s=0,t=0;if(o.data("stellar-backgroundIsActive")){if(o.data("stellar-backgroundIsActive")!==this)return}else o.data("stellar-backgroundIsActive",this);o.data("stellar-backgroundStartingLeft")?m(o,o.data("stellar-backgroundStartingLeft"),o.data("stellar-backgroundStartingTop")):(o.data("stellar-backgroundStartingLeft",p[0]),o.data("stellar-backgroundStartingTop",p[1])),h="auto"===o.css("margin-left")?0:parseInt(o.css("margin-left"),10),i="auto"===o.css("margin-top")?0:parseInt(o.css("margin-top"),10),j=o.offset().left-h-e,k=o.offset().top-i-f,o.parents().each(function(){var b=a(this);return b.data("stellar-offset-parent")===!0?(q=s,r=t,l=b,!1):(s+=b.position().left,void(t+=b.position().top))}),b=o.data("stellar-horizontal-offset")!==d?o.data("stellar-horizontal-offset"):l!==d&&l.data("stellar-horizontal-offset")!==d?l.data("stellar-horizontal-offset"):c.horizontalOffset,g=o.data("stellar-vertical-offset")!==d?o.data("stellar-vertical-offset"):l!==d&&l.data("stellar-vertical-offset")!==d?l.data("stellar-vertical-offset"):c.verticalOffset,c.backgrounds.push({$element:o,$offsetParent:l,isFixed:"fixed"===o.css("background-attachment"),horizontalOffset:b,verticalOffset:g,startingValueLeft:p[0],startingValueTop:p[1],startingBackgroundPositionLeft:isNaN(parseInt(p[0],10))?0:parseInt(p[0],10),startingBackgroundPositionTop:isNaN(parseInt(p[1],10))?0:parseInt(p[1],10),startingPositionLeft:o.position().left,startingPositionTop:o.position().top,startingOffsetLeft:j,startingOffsetTop:k,parentOffsetLeft:q,parentOffsetTop:r,stellarRatio:o.data("stellar-background-ratio")===d?1:o.data("stellar-background-ratio")})}))},_reset:function(){var a,b,c,d,e;for(e=this.particles.length-1;e>=0;e--)a=this.particles[e],b=a.$element.data("stellar-startingLeft"),c=a.$element.data("stellar-startingTop"),this._setPosition(a.$element,b,b,c,c),this.options.showElement(a.$element),a.$element.data("stellar-startingLeft",null).data("stellar-elementIsActive",null).data("stellar-backgroundIsActive",null);for(e=this.backgrounds.length-1;e>=0;e--)d=this.backgrounds[e],d.$element.data("stellar-backgroundStartingLeft",null).data("stellar-backgroundStartingTop",null),m(d.$element,d.startingValueLeft,d.startingValueTop)},destroy:function(){this._reset(),this.$scrollElement.unbind("resize."+this.name).unbind("scroll."+this.name),this._animationLoop=a.noop,a(b).unbind("load."+this.name).unbind("resize."+this.name)},_setOffsets:function(){var c=this,d=a(b);d.unbind("resize.horizontal-"+this.name).unbind("resize.vertical-"+this.name),"function"==typeof this.options.horizontalOffset?(this.horizontalOffset=this.options.horizontalOffset(),d.bind("resize.horizontal-"+this.name,function(){c.horizontalOffset=c.options.horizontalOffset()})):this.horizontalOffset=this.options.horizontalOffset,"function"==typeof this.options.verticalOffset?(this.verticalOffset=this.options.verticalOffset(),d.bind("resize.vertical-"+this.name,function(){c.verticalOffset=c.options.verticalOffset()})):this.verticalOffset=this.options.verticalOffset},_repositionElements:function(){var a,b,c,d,e,f,g,h,i,j,k=this._getScrollLeft(),l=this._getScrollTop(),n=!0,o=!0;if(this.currentScrollLeft!==k||this.currentScrollTop!==l||this.currentWidth!==this.viewportWidth||this.currentHeight!==this.viewportHeight){for(this.currentScrollLeft=k,this.currentScrollTop=l,this.currentWidth=this.viewportWidth,this.currentHeight=this.viewportHeight,j=this.particles.length-1;j>=0;j--)a=this.particles[j],b=a.isFixed?1:0,this.options.horizontalScrolling?(f=(k+a.horizontalOffset+this.viewportOffsetLeft+a.startingPositionLeft-a.startingOffsetLeft+a.parentOffsetLeft)*-(a.stellarRatio+b-1)+a.startingPositionLeft,h=f-a.startingPositionLeft+a.startingOffsetLeft):(f=a.startingPositionLeft,h=a.startingOffsetLeft),this.options.verticalScrolling?(g=(l+a.verticalOffset+this.viewportOffsetTop+a.startingPositionTop-a.startingOffsetTop+a.parentOffsetTop)*-(a.stellarRatio+b-1)+a.startingPositionTop,i=g-a.startingPositionTop+a.startingOffsetTop):(g=a.startingPositionTop,i=a.startingOffsetTop),this.options.hideDistantElements&&(o=!this.options.horizontalScrolling||h+a.width>(a.isFixed?0:k)&&h<(a.isFixed?0:k)+this.viewportWidth+this.viewportOffsetLeft,n=!this.options.verticalScrolling||i+a.height>(a.isFixed?0:l)&&i<(a.isFixed?0:l)+this.viewportHeight+this.viewportOffsetTop),o&&n?(a.isHidden&&(this.options.showElement(a.$element),a.isHidden=!1),this._setPosition(a.$element,f,a.startingPositionLeft,g,a.startingPositionTop)):a.isHidden||(this.options.hideElement(a.$element),a.isHidden=!0);for(j=this.backgrounds.length-1;j>=0;j--)c=this.backgrounds[j],b=c.isFixed?0:1,d=this.options.horizontalScrolling?(k+c.horizontalOffset-this.viewportOffsetLeft-c.startingOffsetLeft+c.parentOffsetLeft-c.startingBackgroundPositionLeft)*(b-c.stellarRatio)+"px":c.startingValueLeft,e=this.options.verticalScrolling?(l+c.verticalOffset-this.viewportOffsetTop-c.startingOffsetTop+c.parentOffsetTop-c.startingBackgroundPositionTop)*(b-c.stellarRatio)+"px":c.startingValueTop,m(c.$element,d,e)}},_handleScrollEvent:function(){var a=this,b=!1,c=function(){a._repositionElements(),b=!1},d=function(){b||(o(c),b=!0)};this.$scrollElement.bind("scroll."+this.name,d),d()},_startAnimationLoop:function(){var a=this;this._animationLoop=function(){o(a._animationLoop),a._repositionElements()},this._animationLoop()}},a.fn[f]=function(b){var c=arguments;return b===d||"object"==typeof b?this.each(function(){a.data(this,"plugin_"+f)||a.data(this,"plugin_"+f,new e(this,b))}):"string"==typeof b&&"_"!==b[0]&&"init"!==b?this.each(function(){var d=a.data(this,"plugin_"+f);d instanceof e&&"function"==typeof d[b]&&d[b].apply(d,Array.prototype.slice.call(c,1)),"destroy"===b&&a.data(this,"plugin_"+f,null)}):void 0},a[f]=function(){var c=a(b);return c.stellar.apply(c,Array.prototype.slice.call(arguments,0))},a[f].scrollProperty=h,a[f].positionProperty=i,b.Stellar=e}(jQuery,this,document);

function setDefaultTab(){
    var hasActive = false;
    var tab_id = '';
    $('.popular-tabs .nav-tab li').each(function(index){
        if (index == 0)
            tab_id = $(this).find('a').attr('href');
        if ($(this).hasClass('active')){
            hasActive = true;
        }
    })
    if (!hasActive && tab_id.length > 0){
        $('.popular-tabs .nav-tab li').first().addClass('active');
        $(tab_id).addClass('active');
    }
}
function highdpiInit()
{
	if($('.replace-2x').css('font-size') == "1px")
	{
		var els = $("img.replace-2x").get();
		for(var i = 0; i < els.length; i++)
		{
			src = els[i].src;
			extension = src.substr( (src.lastIndexOf('.') +1) );
			src = src.replace("." + extension, "2x." + extension);

			var img = new Image();
			img.src = src;
			img.height != 0 ? els[i].src = src : els[i].src = els[i].src;
		}
	}
}


// Used to compensante Chrome/Safari bug (they don't care about scroll bar for width)
function scrollCompensate()
{
    var inner = document.createElement('p');
    inner.style.width = "100%";
    inner.style.height = "200px";
    var outer = document.createElement('div');
    outer.style.position = "absolute";
    outer.style.top = "0px";
    outer.style.left = "0px";
    outer.style.visibility = "hidden";
    outer.style.width = "200px";
    outer.style.height = "150px";
    outer.style.overflow = "hidden";
    outer.appendChild(inner);
    document.body.appendChild(outer);
    var w1 = inner.offsetWidth;
    outer.style.overflow = 'scroll';
    var w2 = inner.offsetWidth;
    if (w1 == w2) w2 = outer.clientWidth;
    document.body.removeChild(outer);
    return (w1 - w2);
}

function responsiveResize()
{
	compensante = scrollCompensate();
	if (($(window).width()+scrollCompensate()) <= 991 && responsiveflag == false)
	{
		accordion('enable');
	    accordionFooter('enable');
		responsiveflag = true;
	}
	else if (($(window).width()+scrollCompensate()) >= 992)
	{
		accordion('disable');
		accordionFooter('disable');
	    responsiveflag = false;
		if (typeof bindUniform !=='undefined')
			bindUniform();
	}
	//blockHover();
    // /blockHoverSmile();
}
function blockHover(status)
{
	var screenLg = $('body').find('.container').width() == 1170;

	if ($('.product_list').is('.grid'))
		if (screenLg)
			$('.product_list .button-container').hide();
		else
			$('.product_list .button-container').show();

	$(document).off('mouseenter').on('mouseenter', '.product_list.grid li.ajax_block_product .product-container', function(e){
		if (screenLg)
		{
			var pcHeight = $(this).parent().outerHeight();
			var pcPHeight = $(this).parent().find('.button-container').outerHeight() + $(this).parent().find('.comments_note').outerHeight() + $(this).parent().find('.functional-buttons').outerHeight();
			$(this).parent().addClass('hovered').css({'height':pcHeight + pcPHeight, 'margin-bottom':pcPHeight * (-1)});
			$(this).find('.button-container').show();
		}
	});

	$(document).off('mouseleave').on('mouseleave', '.product_list.grid li.ajax_block_product .product-container', function(e){
		if (screenLg)
		{
			$(this).parent().removeClass('hovered').css({'height':'auto', 'margin-bottom':'0'});
			$(this).find('.button-container').hide();
		}
	});
}
function quick_view()
{
	//if($(".sticky-header").hasClass('fixed'))
	$(document).on('click', '.quick-view:visible, .quick-view-mobile:visible', function(e){
		e.preventDefault();
		var url = $(this).attr('data-rel');
		var anchor = '';

		if (url.indexOf('#') != -1)
		{
			anchor = url.substring(url.indexOf('#'), url.length);
			url = url.substring(0, url.indexOf('#'));
		}

		if (url.indexOf('?') != -1)
			url += '&';
		else
			url += '?';
			var margin_top = 0;
		if($(".sticky-header").hasClass('fixed')){
			margin_top = $(".sticky-header").height();
		}
		//$('#layer_cart').css({'top':n}).fadeIn('fast')
		if (!!$.prototype.fancybox)
			$.fancybox({
				'padding':  0,
				'margin'     : [margin_top, 0, 0, 0],
				'width':    1087,
				'height':   610,
				'type':     'iframe',
				'href':     url + 'content_only=1' + anchor
			});
	});
}

function bindGrid()
{
	var view = $.totalStorage('display');

	if (!view && (typeof displayList != 'undefined') && displayList)
		view = 'list';

	if (view && view != 'grid')
		display(view);
	else
		$('.display-product-option').find('.view-as-grid').addClass('selected');

	$(document).on('click', '.display-product-option .view-as-grid', function(e){
		e.preventDefault();
		display('grid');
	});

	$(document).on('click', '.display-product-option .view-as-list', function(e){
		e.preventDefault();
		display('list');
	});
}

function display(view)
{
	if (view == 'list')
	{
		$('.display-items').removeClass('grid').addClass('list');
		$('.display-product-option').find('.view-as-list').addClass('selected');
		$('.display-product-option').find('.view-as-grid').removeClass('selected');
		$.totalStorage('display', 'list');
	}
	else
	{
		$('.display-items').removeClass('list').addClass('grid');
		$('.display-product-option').find('.view-as-grid').addClass('selected');
		$('.display-product-option').find('.view-as-list').removeClass('selected');
		$.totalStorage('display', 'grid');
	}
}

function dropDown()
{
	elementClick = '#header .current';
	elementSlide =  'ul.toogle_content';
	activeClass = 'active';

	$(elementClick).on('click', function(e){
		e.stopPropagation();
		var subUl = $(this).next(elementSlide);
		if(subUl.is(':hidden'))
		{
			subUl.slideDown();
			$(this).addClass(activeClass);
		}
		else
		{
			subUl.slideUp();
			$(this).removeClass(activeClass);
		}
		$(elementClick).not(this).next(elementSlide).slideUp();
		$(elementClick).not(this).removeClass(activeClass);
		e.preventDefault();
	});

	$(elementSlide).on('click', function(e){
		e.stopPropagation();
	});

	$(document).on('click', function(e){
		e.stopPropagation();
		var elementHide = $(elementClick).next(elementSlide);
		$(elementHide).slideUp();
		$(elementClick).removeClass('active');
	});
}

function accordionFooter(status)
{
	if(status == 'enable')
	{
		$('#footer .footer-block h4').on('click', function(){
			$(this).toggleClass('active').parent().find('.toggle-footer').stop().slideToggle('medium');
		})
		$('#footer').addClass('accordion').find('.toggle-footer').slideUp('fast');
	}
	else
	{
		$('.footer-block h4').removeClass('active').off().parent().find('.toggle-footer').removeAttr('style').slideDown('fast');
		$('#footer').removeClass('accordion');
	}
}

function accordion(status)
{
    
//	leftColumnBlocks = $('#left_column');
	if(status == 'enable')
	{
		var accordion_selector = '.sidebar .block .title_block, #right_column .block .title_block, #left_column .block .title_block, #left_column #newsletter_block_left h4,' +
								'#left_column .shopping_cart > a:first-child, #right_column .shopping_cart > a:first-child';

		$(accordion_selector).on('click', function(e){
			$(this).toggleClass('active').parent().find('.block_content').stop().slideToggle('medium');
		});
		$('#right_column, #left_column, .sidebar').addClass('accordion').find('.block .block_content').slideUp('fast');
		if (typeof(ajaxCart) !== 'undefined')
			ajaxCart.collapse();
	}
	else
	{
		$('.sidebar .block .title_block, #right_column .block .title_block, #left_column .block .title_block, #left_column #newsletter_block_left h4').removeClass('active').off().parent().find('.block_content').removeAttr('style').slideDown('fast');
		$('#left_column, #right_column, .sidebar').removeClass('accordion');
	}
}
function bindUniform()
{
	if (!!$.prototype.uniform)
		$("select.form-control,input[type='radio'],input[type='checkbox']").not(".not_unifrom").uniform();
}
