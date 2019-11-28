(function($) {

shop2.queue.filter = function() {
	var wrap = $('.shop2-filter'),
		result = $('.result');
	shop2.filter.init();
	shop2.on('afterGetSearchMatches', function (d, status) {
		if (d.data.total_found === 0) {
			result.addClass('no-result');
		} else {
			result.removeClass('no-result');
		}
		$('#filter-result').html(d.data.total_found);
		result.removeClass('hide');
	});
	wrap.find('.param-val').on('click', function(e) {
		var $this = $(this),
			name = $this.data('name'),
			value = $this.data('value');
		e.preventDefault();
		$this.toggleClass('active-val');
		shop2.filter.toggle(name, value);
		shop2.filter.count();
	});
	wrap.find('select').on('change', function() {
		var $this = $(this),
			name = this.name,
			value = $this.val();

		shop2.filter.add(name, value);
		shop2.filter.count();
	});
	wrap.find('input:text').keyup(function() {
		var $this = $(this),
			name = $this.attr('name');
		$.s3throttle('filter: ' + name, function() {
			var value = $this.val();
			shop2.filter.add(name, value);
			shop2.filter.count();
		}, 500);
	});
	wrap.find('.input_range_slider').on('slide', function(e){
        var $this = $(this),
            $parent = $this.closest('.range_slider_wrapper'),
            $input = $parent.find('input:text');
        $.each($input, function(i, elem) {
            var name = $(elem).attr('name');
            $.s3throttle('filter: ' + name, function() {
                var value = $(elem).val();
                shop2.filter.add(name, value);
                shop2.filter.count();
            }, 500);
        });
    });
	wrap.find('.shop2-filter-go').on('click', function(e) {
		e.preventDefault();
		shop2.filter.go();
	});
}
//
shop2.filter.sort = function(name, elem) {
	var re = new RegExp(this.escape('s[sort_by]') + '=([^&]*)'),
		params = this.str.match(re),
		desc = name + ' desc',
		asc = name + ' asc',
		isDesc = (elem.is('.sort-param-desc'));
	params = (params && params.length > 1) ? params[1] : '';
	params = (isDesc) ? desc : asc;
	this.remove('s[sort_by]');
	this.add('s[sort_by]', params);
	return this;
}
//
shop2.queue.sort = function() {
	var wrap = $('.sorting');
	wrap.find('.sort-param').on('click', function(e) {
		var $this = $(this),
			name = $this.data('name');
		e.preventDefault();
		shop2.filter.sort(name, $this);
		shop2.filter.go();
	});
	wrap.find('.sort-reset').on('click', function(e) {
		e.preventDefault();
		shop2.filter.remove('s[sort_by]');
		shop2.filter.go();
	});
	var options = $('.option-label'),
		groups = $('.option-type'),
		details = options.next();
	options.on('click', function() {
		var $this = $(this),
			index = $this.parent().index();
		groups.removeClass('active-type').eq(index).addClass('active-type');
		details.find('input, textarea, select').prop('disabled', true);
		$this.next().find('input, textarea, select').prop('disabled', false);
	});	
}

shop2.queue.question = function() {
	var cls = '.price-current.question, .shop2-cart-total .question, .cart-price .price-old .question, .question',
		clickStart = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) ? 'touchend.respons' : 'click.respons';
	$(document).on(clickStart, cls, function() {
		var $this = $(this),
				win = $this.next().show().toggleClass('opened'),
				position = $this.position(),
				height = win.outerHeight(true);
		win.show();
		win.css({
			top: position.top - height - 5,
			//left: position.left,
		}).toggleClass('active');
	});
}

shop2.queue.discounts = function() {
	var clickStart = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) ? 'touchend.respons' : 'click.respons';
		$(document).on(clickStart, '.shop2-product-actions dt', function(e) {
			var $this = $(this),
					win = $this.next(),
					left = $this.position().left;
			e.stopPropagation();
			if (win.is(':hidden')) {
				$('.shop2-product-actions dd').hide();
				win.show();
				win.addClass('opened');
				win.css('left', left);
			} else {
				win.hide();
				win.removeClass('opened');
			}
		});
		$(document).on(clickStart, '.close-desc-action', function(e) {
			var $this = $(this),
				win = $this.closest('dd');
				e.stopPropagation();
				win.hide();
		});
		$(document).on(clickStart, function() {
			$('.shop2-product-actions dd').hide();
		});
}

$(function() {
	var $win = $(window),
		$doc = $(document),
		$html = $(document.documentElement),
		winWidth = $win.width(),
		winHeight = $win.height(),
		isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || /[\?&]panel_fake_mobile=1(&|$)/.test(document.location.search),
		$panel = /[\?&]panel_fake_mobile=1(&|$)/.test(document.location.search),
		goUpFalse = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
		clickStart = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) ? 'touchend.respons' : 'click.respons';
		if(/iPhone|iPad|iPod/i.test(navigator.userAgent)){
			$('body').addClass('ios');
		}
		if (isMobile){
			$html.addClass('mobile');	
		}
    //Top-panel
    function topPanel() {
	    var offsetTop = $(document).scrollTop();
	    $(document).scroll(function(e) {
		    if ($(document).scrollTop() >= 300) {
			    var offsetTopScroll = $(document).scrollTop();
			    if (offsetTopScroll > offsetTop) {
			    	if ($('.folders-shared').hasClass('opened')){
				    	$('.header-top-panel').css({
				    		'opacity' : '1',
				    		'visibility' : 'visible'
				    	});	
			    	} else {
			    		$('.header-top-panel').css({
			    			'opacity' : '0',
			    			'visibility' : 'hidden'
			    		});
			    	}
			    } else {
			    	$('.header-top-panel').css({
			    		'opacity' : '1',
			    		'visibility' : 'visible'
			    	});
			    }
			    if (offsetTopScroll >= 400) {
			    	$('.header-top-panel').addClass('boxShadows');
			    } else {
			    	$('.header-top-panel').removeClass('boxShadows');
			    }
			    offsetTop = offsetTopScroll;
			}
	    });
    }
    topPanel();
    
	(function() {
		$('.products-per-page').on("change", prodPerPage);
		function prodPerPage() {
			var params = parseQueryString(),
				i, search = "";
			params["s[products_per_page]"] = this.value;
			for (i in params) {
				search += i + "=" + params[i] + "&";
			}
			window.location.search = "?" + search.slice(0, -1);
		}
		function parseQueryString() {
			var str = window.location.search;
			var objURL = {};
			str.replace(
				new RegExp( "([^?=&]+)(=([^&]*))?", "g" ),
				function( $0, $1, $2, $3 ){
					objURL[ $1 ] = $3;
				}
			);
			return objURL;
		};
	})();
	if (shop2.mode!=="product"){
		var countItemProduct = $('.shop2-product-item').length;
		$('.products-per-page .selectedOption').text(countItemProduct);
	}
	$('table').wrap('<div class="table-wrapper"></div>');		
    var toggClass = function(el, cl, ovrl, ovh) {
        $(el).on(clickStart, function() {
            if (!$(this).next().is(':animated')) {
                $(this).addClass('opened');
                $(cl).addClass('opened').css({'z-index': 150});
                $(ovrl).addClass('opened').css({'z-index': 140});
                $(ovh).addClass('overflowHidden');
                addWinHeight ();
                if ($('.folders-shared').hasClass('opened') || $('.menu-top-wrapper').hasClass('opened') || $('.shop2-block.login-form').hasClass('opened') || $('.cart-wr-in').hasClass('opened') || $('.search-form-wrap').hasClass('opened')) {
                	$ ('.header-top-panel').removeAttr('style');
                }
            } return false;
        });
    }
    toggClass('.menu-icon', '.menu-top-wrapper', '.overlay', $(document.documentElement));
    toggClass('.block-title.login-ico', '.login-form', '.overlay', $(document.documentElement));
    toggClass('.search-ico', '.search-form-wrap', '.overlay', $(document.documentElement));
    toggClass('.cart-ico', '.cart-wr-in', '.overlay', $(document.documentElement));
    var closeSlide = function(clz, cl, ovrl, ovh) {
        $(clz).on(clickStart, function() {
            if ($(this)) {  
            	$(this).removeClass('opened');              
                $(cl).removeClass('opened').removeAttr('style');
                if ($('.folders-shared').hasClass('opened')) {
                	$('.header-top-panel').addClass('opened').css({'z-index': 150});
                	$(ovrl).addClass('opened').css({'z-index': 150});
                	$(ovh).addClass('overflowHidden');                	
                } else {
                	$(ovrl).removeClass('opened').removeAttr('style');
                	$(ovh).removeClass('overflowHidden');              
                }
            } return false;
        });
    }
	closeSlide('.close-menu', '.menu-top-wrapper', '.overlay', $(document.documentElement));
	closeSlide('.close-login', '.login-form', '.overlay', $(document.documentElement));
	closeSlide('.search-close', '.search-form-wrap', '.overlay', $(document.documentElement));
    $('.shop2-filter-button').on(clickStart, function() {
    	$('.shop2-filter-button').toggleClass('opened');
    	$('.shop2-filter').toggleClass('opened');
    });    
    
    // $('.cart-price.pr2').on(clickStart, function(){

    // 	$(this).find('.shop2-product-discount-desc').addClass('opened active');
    // });    
    // $('.question').on(clickStart, function(){

    // 	$('.question').next('.shop2-product-discount-desc').addClass('opened active');
    // });
    
	if (shop2.mode == 'folder') {
		$(document).scroll(function(e){
			var $filterOffsetTop = $('.shop2-filter-button').offset().top - $(window).scrollTop()
				if ($filterOffsetTop <= 0){
					$('.close-filter').show()
				} else {
					$('.close-filter').hide();
				}
		});
		$('.close-filter').on(clickStart, function(){
			$('.shop2-filter-button').removeClass('opened');
			$('.shop2-filter').removeClass('opened');
		});
	}    
    
    
    $('.folders-title').on(clickStart, function(){
    	$(this).toggleClass('opened');
    	$('.overlay').toggleClass('opened').css({'z-index': 140});
    	$('.folders-shared').toggleClass('opened');
    	if($(window).width() <= 940){
    		$('.header-top-panel').css({'z-index': 130});
    	}else if($(window).width() > 940){
    		$('.header-top-panel').css({'z-index': 150});
    	}
    	if (/iPod|iPad|iPhone/i.test(navigator.userAgent)) {
			$('body').toggleClass('overflowHidden');
		}else{
			$('body').removeClass('overflowHidden');
			$(document.documentElement).toggleClass('overflowHidden');
		}
    });
    
    $('.sort-title').on(clickStart, function() {
    	$('.shop2-sorting-panel').toggleClass('opened');
    });    

	//Float

	$('.shop2-product-item').each(function(){
		if ($(this).find('.product-amount-buy').is(':hidden')){
			$(this).addClass('amount-buy-hidden')
		}
	});
	
	$('.checkboxBody .param-val').on('click', function(event) {
		$('.checkboxBody .param-val').not(this).removeClass('active-val')
	});

	var $sortingBtn = $('.sort-title'),
		$sortingBlock = $('.sorting-input-body'),
		sortingParamLink = $('.sort-param.active');
	if (sortingParamLink.hasClass('active')) {
		var paramClone = sortingParamLink.first().clone().addClass('clone');
		$sortingBtn.html(paramClone);
		$('.shop2-panel-sorting .sort-param.clone').on(clickStart, function(event) {
			event.preventDefault();
		});
	}

	$(document).on(clickStart, function(event) {
		if ($(event.target).closest('.block-body, .search-form-wrap, .menu-top-wrapper, .shop2-filter, .shop2-sorting-panel, .shop2-filter-button, .shop2-color-ext-popup, .price-current, .icon-action, .folders-shared, .cart-wr-in, .gr-form-wrap, .buy-one-click, .question, .folder-item, .folder, .shop2-block.login-form, .block-title.login-ico, .folders-title, .shop-cart-wr, .callback, .item-cl.cloned, .tpl-anketa, .cart-price.pr2, .cart-price.pr2 .question').length) return;
		$('.header-top-panel').removeClass('opened');
		$('.shop-cart-in').removeClass('opened');
		$('.login-form').removeClass('opened');
		$('.search-form-wrap').removeClass('opened');
		$('.menu-top-wrapper').removeClass('opened');
		$('.overlay').removeClass('opened').removeAttr('style');
		$('.shop2-filter-button').removeClass('opened');
		$('.shop2-filter').removeClass('opened');
		$('.shop2-sorting-panel').removeClass('opened');
		$('.folders-shared').removeClass('opened');
		$('.folders-title').removeClass('opened');
		$(document.documentElement).removeClass('overflowHidden');
		$('.shop2-product-discount-desc').removeClass('opened').hide();
		$('.product-includeForm').removeClass('active');
		$('.product-includeForm2').removeClass('active');
		$('.folders-in-block li').removeClass('active').addClass('closed');
	});
	$(document).on("keydown", function (e) {
		if (e.keyCode===27) {
			$('.overlay').removeClass('opened');
			$(document.documentElement).removeClass('overflowHidden');
			$('.cart-wr-in').removeClass('opened');
			$('.shop2-block.login-form').removeClass('opened');
			$('.menu-top-wrapper').removeClass('opened');
			$('.search-form-wrap').removeClass('opened');
			$('.folders-shared').removeClass('opened');
			$('.folders-title').removeClass('opened');
			$('.folder').removeClass('active').addClass('closed');
		};
	});

	$('.menu-top .has-child').each(function(){
		var $this = $(this),
			$a = $this.find('a'),
			$arrow = $('<span class="arrow"></span>');
		if($this.hasClass('has-child')) {
			$arrow.appendTo($this).on(clickStart, function(){
				$this.find('ul').toggleClass('active');	
				$this.toggleClass('active_item')
			});	    	
		}else {
			$('.menu-top li ul').removeClass('active');
		}
	});

	$('input[type=checkbox], input[type=radio], select').styler({
		selectPlaceholder:"Все"
	});
	$.ajaxSetup({complete: function(){
			$('input[type=checkbox], input[type=radio], select, .option-details select').styler(); 
			$('.closeBtnForm').on(clickStart, function(){
				$('.product-includeForm').removeClass('active')
				$('.product-includeForm2').removeClass('active')
				$('html, body').removeClass('overflowHidden');
			});
			closeSlide('.close-cart', '.cart-wr-in', '.overlay', $(document.documentElement));
			$('.product-compare input').styler('destroy');
			// $('.option-type select').styler();
		}
	});
	
	$('.product-compare input').styler('destroy');
	$('.anketa-wrapper input[type="checkbox"]').styler('destroy');
	$('.anketa-wrapper input[type="radio"]').styler('destroy');
	$('.anketa-wrapper select').styler('destroy');
    $('.checkboxBody .param-val').on('click', function(event) {
    	$('.checkboxBody .param-val').not(this).removeClass('active-val')
	});

	$('.option-type .option-item select').styler('destroy');

	$('.option-label').on('click', function(){
		$('.option-type select').styler('destroy');
		setTimeout(function(){ 
			$('.option-type select').styler();
		}, 200);
	});

	function addWinHeight () {
		var $winHeight = $(window).height();
			// $('.menu-top-wrapper, .overlay, .search-form-wrap, .shop2-block.login-form, .cart-wr-in').css({
			// 	'height': $winHeight	
			// });
	}

	// function ajaxCart () {
	// 	$.ajax({
	// 		url: shop2.uri + "/cart?cart_only",
	// 		method: "get",
	// 		dataType: "html",
	// 		success: function (data, statusText, xhr) {
	// 			$(".shop-cart-opened").html(data);
	// 		  	$('.s3solution-panel').remove();
	//             $('.s3solution-overlay').remove();
	//             $('.s3-popup-overlay').remove();
	//             $('.s3solution-themes').remove();
	// 			$(".cart-preview-delete a").click(function(e) {
	// 				var $this = $(this),
	// 					url = $this.attr('href'),
	// 					data, func;
	// 				e.preventDefault();
	// 				shop2.trigger('afterCartPreviewRemoveItem');
	// 				$.get(url, function(d, status) {
	// 					data = $('.shop-cart-in', d).html();
	// 					$('.cart-wr').addClass("user-open");
	// 					shop2.fire('afterCartPreviewRemoveItem', func, d, status);
	// 					shop2.trigger('afterCartPreviewRemoveItem', d, status);
	// 				});
					
	// 				data = undefined;
	// 				$( document ).ajaxStop(function() {	
	// 				var	$this = $(this),
	// 					$cartTotal = $this.find('.cart_total_amout').html(),
	// 					$cartLeftTotal = $('.cart_amount');
	// 					$cartLeftTotal.html($cartTotal);
	// 					if($cartTotal == 0){
	// 						$('.cart-preview .block_title').addClass('empty')
	// 					}					
	// 				});						
	// 			});
	// 		}
	// 	});
	
	// 	$('.cart-icon').click(function(event) {
	// 		$('.cart-wr').toggleClass('user-open');
	// 		return false;
			
	// 	}); // user-open
		
	// 	$(document).click(function(event) {
	// 		if ($(event.target).closest('.cart-wr').length) return;
	// 		$('.cart-wr').removeClass('user-open');
	// 		event.stopPropagation();
	// 	});
	
	// };
	
	// ajaxCart();
	// shop2.on('afterCartPreviewRemoveItem', ajaxCart);
	// shop2.on('afterCartAddItem', ajaxCart);	
//
	(function() {
    	var owl = $('.slider-top').owlCarousel({
    		items: 1,
		    stagePadding: 200,
		    autoplay: 2000,
		    slideSpeed: 300,
		    loop: true,
		    margin:0,
		    autoplayHoverPause: true,
		    nav:true,
		    responsive:{
		        0:{
		        	stagePadding: 0,
		            items:1
		        },
		        1100:{
		            stagePadding: 100,
		            items:1
		        },
		        1300:{
		        	autoPlay: 2000,
		            items:1
		        }		        
		    }
    	});
    })();	

    (function() {
    	var owl_2 = $('.shop2-main-blocks-wrapper .list-thumb').owlCarousel({
	      	smartSpeed:500,
	        margin: 0,	  
	        dotscontainer: true,      
	        loop: false,
	        nav:true,
	        navigation: true,
	        paginationSpeed : 200,
    		goToFirstSpeed : 200,	  
    		dotsSpeed: 200,
    		autoplayHoverPause: true,
	        autoplay: true,
		    margin:8,
		    nav:true,
		    responsive:{
		        0:{
		            items:1
		        },
		        401:{
		            items:2
		        },
		        625:{
		            items:3
		        },		        
		        769:{
		            items:3
		        },
		        1024:{
		            items:3
		        },
		        1025:{
		            items:4
		        }		        
		    }
    	});
    })();    

 	$('.shop2-main-blocks-wrapper').each(function() {
		var $this = $(this),
			$owlItem = $this.find('.shop2-main-header');
			$this.find('.owl-nav').appendTo($owlItem);
	});   

    $('.brends-wrapper').after($('.shop2-main-before').parent('.shop2-main-blocks-wrapper'));

    (function() {
    	var owl_3 = $('.brends-body').owlCarousel({
	      	smartSpeed:200,
	        margin: 0,	  
	        dotscontainer: true,      
	        loop: true,
	        nav:true,
	        navigation: true,
	        paginationSpeed : 200,
    		goToFirstSpeed : 200,	  
    		dotsSpeed: 200,
	        autoplay: true,
	        autoplayHoverPause: true,
		    items:8,
		    responsive:{
		        0:{
		            items:2
		        },
		        380:{
		            items:3
		        },		        
		        500:{
		            items:4
		        },
		        769:{
		            items:6
		        },
		        1025:{
		            items:8
		        },
		        1024:{
		            items:8
		        }		        
		    }
    	});

    })();

    $('.brends-wrapper .owl-nav').appendTo($('.brends-title'));

/////////////////////////////////////	
	function collectionSlider() {
		if ($(window).width() > 1024) {
			var ThumbWidth = 22.81818,
				ThumbMargin = 3,

				modThumbWidth = 22.81818,
				modThumbMargin = 3;

		} else if(($(window).width() <=1024 )) {
			var ThumbWidth = 31.5,
				ThumbMargin = 2.9,

				modThumbWidth = 31.44,
				modThumbMargin = 3;				
		}
		if ($(window).width() <= 920) {
			var modThumbWidth = 30.6,
				modThumbMargin = 3;			
		}
		if($(window).width() <= 768) {
			var ThumbWidth = 48,
				ThumbMargin = 4.2,

				modThumbWidth = 46.1,
				modThumbMargin = 4.2;						
		}
		if($(window).width() <= 400) {
			var ThumbWidth = 100,
				ThumbMargin = 0,

				modThumbWidth = 92,
				modThumbMargin = 0;						
		}		
		var wrapperWidth = $('.shop2-group-kinds.collection').width(),
			collectionThumbWidth = Math.floor((wrapperWidth/100)*ThumbWidth),
			collectionThumbMargin = Math.floor((wrapperWidth/100)*ThumbMargin),
			
		    modificationWrapperWidth = $('.shop2-product-data').width(),
			modificationThumbWidth = Math.floor((modificationWrapperWidth/100)*modThumbWidth),
			modificationThumbMargin = Math.floor((modificationWrapperWidth/100)*modThumbMargin);

		$('.shop2-group-kinds').each(function() {
			var $frame2  = $(this).find('.shop2-group-kinds-in'),
				$slidee2 = $frame2.children('.shop2-group-kinds-in1').eq(0),
				$wrap2   = $frame2.parent();
			$(this).find('.shop2-kind-item').css({
				'width': collectionThumbWidth,
				'marginLeft': collectionThumbMargin
			});
			$(this).find('.mod .shop2-kind-item').css({
				'width': modificationThumbWidth,
				'marginLeft': modificationThumbMargin				
			});
				$frame2.sly({
					horizontal: true,
					itemNav: 'basic',
					smart: false,
					activateOn: 'click',
					mouseDragging: 1,
					touchDragging: 1,
					releaseSwing: 1,
					startAt: 0,
					scrollBar: $wrap2.find('.scrollbar'),
					scrollBy: 1,
					pagesBar: $wrap2.find('.pages'),
					activatePageOn: 'click',
					speed: 300,
					elasticBounds: 1,
					dragHandle: 1,
					dynamicHandle: 1,
					clickBar: 1,
					prevPage: $wrap2.find('.prevPage'),
					nextPage: $wrap2.find('.nextPage')
				});
			//}
			$(window).on('resize load', function(){
				$frame2.sly('reload');
			});
			$(window).load(function(event) {
				setTimeout(function() {
					$frame2.sly('reload');
					sliderItemsCount();
				}, 1000);
			});
			$('.shop2-product-data').on(clickStart, function(event) {
				setTimeout(function() {
					$frame2.sly('reload');
					sliderItemsCount();
				}, 400);
			});
		});
	};

	function sliderItemsCount() {
		$('.shop2-group-kinds').each(function() {
			if ($(window).width() <= 400) {
				var	$this = $(this), 
					$itemTotal = $this.find('.shop2-kind-item').length,
					$scrollbar = $this.find('.scrollbar');
					if ($itemTotal > 1) {
						$scrollbar.show();
					}
			} else if ($(window).width() <= 769) {
				var	$this = $(this), 
					$itemTotal = $this.find('.shop2-kind-item').length,
					$scrollbar = $this.find('.scrollbar');
					if ($itemTotal > 2) {
						$scrollbar.show();
					}
			} else if ($(window).width() <= 1025) {
				var	$this = $(this), 
					$itemTotal = $this.find('.shop2-kind-item').length,
					$scrollbar = $this.find('.scrollbar');
					if ($itemTotal > 3) {
						$scrollbar.show();
					}
			} else if ($(window).width() > 1025) {
				var	$this = $(this), 
					$itemTotal = $this.find('.shop2-kind-item').length,
					$scrollbar = $this.find('.scrollbar');
					if ($itemTotal > 4) {
						$scrollbar.show();
					}
			}		
		});
	};

	$(window).on('resize', collectionSlider).trigger('resize');
	
	$(".shop2-product-desc").on(clickStart, function(event) {
		collectionSlider();
	});
		var $slySliderFlag = 1,
			$testSl;
	$('.product-thumbnails-wrap').each(function() {
			$testSl = $(this).find('.product-thumbnails');
	});	
	$('.folder').each(function() {
		var $this = $(this),
			$folderItem = $this.find('.folders-in-block .folder');
			$this.find('.item-cl').clone().appendTo($this).addClass('cloned');
			$this.find('.item-cl.cloned').on('tap', function(){
				return false
				$this.addClass('active');
			}, false);
			
			$this.find('.close-folder').on('touchend ', function(){
				$this.addClass('closed');
				$('body').removeClass('overflowHidden');
				$(document.documentElement).removeClass('overflowHidden');					
			});
	});
	$('.folder').each(function() {
		var $this = $(this),
		    $close = $this.find('.close-folder');
		    if (isMobile){
		    	$this.find('.folder-image img').on('tap', function(){
					if (!$this.hasClass('active')) {
						$('.folder').removeClass('active');
						$('.folder').addClass('closed');
							$this.addClass('active').removeClass('closed');
							$close.addClass('active');
				    }
				  	if ($(window).width() <= 520){
				  		// $('.folders-in-block-wrap').css({
				  		// 	'overflow' : 'visible'
				  		// });		
				    	if (/iPod|iPad|iPhone/i.test(navigator.userAgent)) {
				    		$('body').bind('touchmove', function(e){e.preventDefault()})
							$('.folder-item').bind('mousewheel DOMMouseScroll', function(e) {
							    var scrollTo = null;
							    if (e.type == 'mousewheel') {
							        scrollTo = (e.originalEvent.wheelDelta * -1);
							    }
							    else if (e.type == 'DOMMouseScroll') {
							        scrollTo = 40 * e.originalEvent.detail;
							    }
							    if (scrollTo) {
							        e.preventDefault();
							        $(this).scrollTop(scrollTo + $(this).scrollTop());
							    }
							});				    		
						} else{
							$(document.documentElement).addClass('overflowHidden');
						}
						$(document).scroll(function(){
							if (!/iPod|iPad|iPhone/i.test(navigator.userAgent)) {
								$('.folder').removeClass('active');
								$('.folder').addClass('closed');
								$('body').removeClass('overflowHidden');
								$(document.documentElement).removeClass('overflowHidden');
								//$('.folders-in-block-wrap').css({'overflow':'hidden'});
							}
						});								
				  	} else {
						$('body').removeClass('overflowHidden');
						$(document.documentElement).removeClass('overflowHidden');
				  	}
		    	});
		    	var close = $('.close-folder');
		    	$close.on(clickStart, function(){
		    		$close.parent('.folder').removeClass('active').addClass('closed');
		    		//$('.folders-in-block-wrap').css({'overflow':'hidden'});
					$('.header-top-panel').show();	
					$('body').unbind('touchmove')
		    	});
		    }
	});
	$('.close-folder').on(clickStart, function(){
		$('.header-top-panel').css({'display' : 'block'});	
	});
	$('.folder').each(function() {
		$('.close-folder').on(clickStart, function() {
		var $this = $(this),
		    $close = $this.find('.close-folder'),
		    $parent = $close.parent('.folder');						
			$parent.removeClass('active');
			$('.folder').addClass('closed').removeClass('active');
				$this.parent('.folder').removeClass('active');
				$this.parent('.folder').removeClass('active');
				$('body').removeClass('overflowHidden');
				$(document.documentElement).removeClass('overflowHidden');
				$('.header-top-panel').show();
		});
	});
	$('.item-cl.cloned').on('tap', function(){
		if(!$(this).parent('.folder').hasClass('active')){
			$('.folder').removeClass('active').addClass('closed');
			$(this).parent('.folder').addClass('active').removeClass('closed');
			
		  	if ($(window).width() <= 520){
		    	if (/iPod|iPad|iPhone/i.test(navigator.userAgent)) {
					$('body').addClass('overflowHidden');
				}else{
					$('body').removeClass('overflowHidden');
					$(document.documentElement).addClass('overflowHidden');
				}
		  	} else if ($(window).width() > 520){
		  		$('body').removeClass('overflowHidden');
			  	$(document.documentElement).removeClass('overflowHidden');
		  	}

		} else {	
			$(this).parent('.folder').removeClass('active');
		}
		return false
	});	
	$('.close-folders').on(clickStart, function(){
		$('.folders-shared, .folders-title').removeClass('opened');	
		if ($('.overlay').hasClass('opened')){
			$('.overlay').removeClass('opened').removeAttr('style');
			$('html, body').removeClass('overflowHidden');
		}	
	});
	$('.overlay').on(clickStart, function(){
		$('.overlay').removeClass('opened');
		$('.cart-wr-in').removeClass('opened');
		$('.header-top-panel').removeAttr('style');
	});	
	$('.param-show').on(clickStart, function(event) {
		$(this).closest('.cart-product-details').find('.cart-product-param').slideToggle(300);
		$(this).closest('.cart-product-details').addClass('opened');
		$(this).toggleClass('opened');
		if ($(window).width() > 940) {
			$(this).closest('.cart-product-details').find('.cart-product-param').removeAttr('style');
		}
	});
	function folderWrHeight() {
		var $blockFolderMaxHeight = $('.folders-in-block-wrap').outerHeight(true);
		if ($('.folder').length > 8){
			if ($(window).width() <= 624) {
				var $foldersHeight = $('.folder').outerHeight(true) * 3,
					$foldersInBlockWrap = $('.folders-in-block-wrap');
					$('.see-more').css({'display': 'block'});
					$foldersInBlockWrap.css({'height': $foldersHeight});
			} else if ($(window).width() > 624) {
				var $foldersHeight = $('.folder').outerHeight(true) * 2,
					$foldersInBlockWrap = $('.folders-in-block-wrap');
					$('.see-more').css({'display': 'block'});
					//$foldersInBlockWrap.css({'height': $foldersHeight});						
			}
			$('.see-more').css({'display': 'none'});
		}
	}
	$('.see-more').on(clickStart, function(e) {
		e.preventDefault();
		var $blockFolderMaxHeight = $('.folders-in-block').height();
			//$foldersInBlockWrap = $('.folders-in-block-wrap').height();
		  	if ($(window).width() <= 624) {
		  		$foldersHeight = $('.folder').outerHeight(true) * 3;
			    if ($foldersInBlockWrap == $foldersHeight) {
			      $('.folders-in-block-wrap').animate({height: $blockFolderMaxHeight}, 500);
			  	  $(this).addClass('block-open').html('Скрыть');
			    }else if ($foldersInBlockWrap == $blockFolderMaxHeight){
			      $(this).removeClass('block-open').html('Посмотреть еще');
			      $('.folders-in-block-wrap').animate({height: $foldersHeight}, 500);
			    }
		  	}else if ($(window).width() > 624) {
		  		var $foldersHeight = $('.folder').outerHeight(true) * 2;
			    if ($foldersInBlockWrap == $foldersHeight) {
			      $('.folders-in-block-wrap').animate({height: $blockFolderMaxHeight}, 500);
			  	  $(this).addClass('block-open').html('Скрыть');
			    }else if ($foldersInBlockWrap == $blockFolderMaxHeight){
			      $(this).removeClass('block-open').text('Посмотреть еще');
			      //$('.folders-in-block-wrap').animate({height: $foldersHeight}, 500);
			    }
		  	}
	});		
    $.fn.bindImageLoad = function (callback) {
      function isImageLoaded(img) {
          if (!img.complete) {
              return false;
          }
          if (typeof img.naturalWidth !== "undefined" && img.naturalWidth === 0) {
              return false;
          }
          return true;
      }
      return this.each(function () {
          var ele = $(this);
          if (ele.is("img") && $.isFunction(callback)) {
              ele.one("load", callback);
              if (isImageLoaded(this)) {
                  ele.trigger("load");
              }
          }
      });
    };
	function mainCollectionHeight() {
        var temp = 1;
        $('.product-image img').bindImageLoad(function(){
            temp++;
            if(temp == $('.product-image img').length) {
                $('.owl-loaded').each(function(){
                    var heights = [],
                        maxHeight,
                        myPaddingTop = 0,
                        productPaddingTop= 0;
                    if ($(window).width() > 480) {
                        $(this).find('.owl-item .shop2-product-item').each(function(){
                            heights.push($(this).height());
                        });
                        maxHeight = Math.max.apply(null, heights);
                        $(this).find('.owl-item .shop2-product-item').each(function(){
                            myPaddingTop = (maxHeight - $(this).height());
                            
                            $(this).find('.product-top').css('marginBottom', myPaddingTop);
                        });
                    }
                });
            }
        });
    }
	mainCollectionHeight();

//Amount-minus-disabled
	$('.shop2-cart-product, .shop2-product-item, .form-add, .cart-amount').each(function(index) {
		var $this = $(this),
			$amountInput = $this.find('.shop2-product-amount input[type="text"]'),
			amountInputValue = $amountInput.val();
		function amounMinus() {
			if (amountInputValue >= 2) {
				$this.find('.shop2-product-amount button.amount-minus').removeClass('disabled');
			} else {
				$this.find('.shop2-product-amount button.amount-minus').addClass('disabled');
			}
		}
		amounMinus();
		$this.find('.shop2-product-amount button').on(clickStart, function(e) {
			setTimeout(function() {
				amountInputValue = $amountInput.val();

				amounMinus();
			}, 100);
		});
		$this.find('.shop2-product-amount input').on('keyup', function(e) {
			setTimeout(function() {
				amountInputValue = $amountInput.val();

				amounMinus();
			}, 100);
		});
	});

	(function(){
		$('.callback').on('touchstart click', function(e){
			$('.product-includeForm').addClass('active');
			e.preventDefault();
		})
		$(document).on("keydown", function (e) {
			if (e.keyCode===27) {
				$('.product-includeForm, .product-includeForm2').removeClass('active');
				$('html, body').removeClass('overflowHidden');
				
			};
		});		
	})();

	(function(){
		if(!$('.shop2-buy-one-click').length) return;
		$('.shop2-buy-one-click').on('touchstart click', function(e){
			
			$('.product-includeForm2').addClass('active');
			var productName = $(this).find('.productName').val()+(' Количество:' + $(this).closest('.product-side-r').find('.shop2-product-amount input[type="text"]').val()),
				productLink = $(this).find('.productLink').val();
			setTimeout(function() {
				$('.product-includeForm2 input.productName').val(productName);
				$('.product-includeForm2 input.productLink').val(productLink);
			}, 800);	
			e.preventDefault();
		});
		$(document).on("keydown", function (e) {
			if (e.keyCode===27) {
				$('.product-includeForm').removeClass('active');
				$('html, body').removeClass('overflowHidden');
				
			};
		});		
	})();

	
    $(document).on("keydown", function (e) {
        if (e.keyCode===27) {
			if (/iPod|iPad|iPhone/i.test(navigator.userAgent)) {
				$('html, body').removeClass('overflow-Hidden');
			} else {
				$(document.documentElement).removeClass('overflow-Hidden');
			}            
        	$('.product-includeForm').removeClass('active');
        };
    });
    
    var couponFlag = 1;
    
	$('.folder-image').equalHeightResponsive();	
	$('.product-item-in .product-image').equalHeightResponsive();
	
	$(window).on('resize load', function() {
			addWinHeight();
			setTimeout(function() {
				folderWrHeight();
			}, 500);
			sliderItemsCount();
			var $tabs = $('#product_tabs'),
				$win = $(window),
				winHeight = $(window).height();
				$doc = $(document),
				isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
				click = clickStart,
				srchIsOpen = false;
			
				$tabs.responsiveTabs({
					rotate: false,
					startCollapsed: 'accordion',
					collapsible: 'accordion',
					animation: 'slide',
					setHash: true,
					scrollToAccordion: true,
					scrollToAccordionOffset: 0
				});
			if ($(window).width() <= 768) {
				$('.brends-title .see-all').appendTo($('.brends-body'));
				$('.news-wrap .see-all').appendTo($('.news-wrap .news-name'));
				$('.folders-title').on(clickStart, function(){
					$('.overlay').addClass('opened');	
				    if (/iPod|iPad|iPhone/i.test(navigator.userAgent)) {
						$('body').addClass('overflowHidden');
					}else{
						$('body').removeClass('overflowHidden');
						$(document.documentElement).addClass('overflowHidden');
					}
				});
				$('.close-menu').on(clickStart, function(){
					$('.folders-shared, .folders-title').removeClass('opened');	
					$('.overlay').removeClass('opened');	
				});
			} else if ($(window).width() > 768) {
				$('.brends-body .see-all').appendTo($('.brends-title'));
				$('.news-name .see-all').appendTo($('.news-wrap '));
			}
			if ($(window).width() <= 940) {
				$('.folders-shared').css({'height': winHeight + 20});
				$('.folders-shared').appendTo($('body'));				
			} else if ($(window).width() > 940) {
				var $foldersHeight = $('.folders-shared').height(),
					$panelHeight = $('.header-top-panel').height(),
					$foldersPanelHeight = $foldersHeight + $panelHeight;
					if($foldersPanelHeight > winHeight){
						$('.folders-shared').css({
							'height': winHeight - $panelHeight
						});
					} else if ($foldersPanelHeight < winHeight){
						$('.folders-shared').css({
							'height': 'auto'
						});						
					}
				$('.folders-shared').appendTo($('.header-top-panel'));
			}
			if ($(window).width() <= 590) {
				$('.slider-top .owl-item').each(function() {
					var $this = $(this),
						$owlItem = $this.find('.sl_iem');
						$this.find('.item_link').prependTo($owlItem);
						// $('.owl-nav').appendTo($('.owl-stage'));
				});
				$('.cell-r-l').after($('.cell-r-r'));
			} else if ($(window).width() > 590) {
				$('.slider-top .owl-item').each(function() {
					var $this = $(this),
						$owlItem = $this.find('.item_desc');
						$this.find('.item_link').appendTo($owlItem);
						// $('.owl-nav').appendTo($('.owl-stage'));
				});
				$('.cell-r-l').before($('.cell-r-r'));
			};
			if ($(window).width() <= 680 && couponFlag == 1) {
				$('.shop2-cart-table tr').each(function() {
					var $this = $(this),
						$prodDetails = $this.find('.cart-product-details');
						$this.find('.cart-amount').appendTo($prodDetails);
						$this.find('.cart-price').appendTo($prodDetails);
						$this.find('.cart-delete').appendTo($prodDetails);
						$this.find('.cart-delete, .cart-price').wrapAll('<div class="pr-del-wr"></div>');
						if ($this.find('.pr-del-wr').children('.preorder').length != 0) {
							console.log('rewr')
							$this.find('.pr-del-wr').addClass=('pre_order')
						}
						$('.tr.coupon-disc').after($('.shop2-coupon-wrap'));
						// $('.owl-nav').appendTo($('.owl-stage'));
				});	
				couponFlag = 2
			} else if ($(window).width() > 680 && couponFlag == 2) {
				$('.shop2-cart-table .d-tr').each(function() {
					var $this = $(this);
						$this.find('.pr1').appendTo($this);
						$this.find('.cart-amount').appendTo($this);
						$this.find('.pr2').appendTo($this);
						$this.find('.cart-delete').appendTo($this);
						$('.shop2-coupon-wrap').prependTo($('.coupon-total-price-wrap'));
						// $this.find('.cart-delete, .cart-price').unWrap('<div class="pr-del-wr"></div>');
						// $('.owl-nav').appendTo($('.owl-stage'));
				});	
				couponFlag = 1 
			}
			if ($(window).width() <= 600) {
				$('.product-item-simple').each(function() {
					var $this = $(this),
						$prodSideC = $this.find('.product-side-c');
						$this.find('.product-side-r').appendTo($prodSideC);

						// $('.owl-nav').appendTo($('.owl-stage'));
				});				
			} 
			else if ($(window).width() > 600) {	
				$('.product-item-simple').each(function() {
					var $this = $(this),
						$prodSidel = $this.find('.product-side-l'),
						$prodSider = $this.find('.product-side-r');
						($prodSider).appendTo($(this));

						// $('.owl-nav').appendTo($('.owl-stage'));
				});					
			}
			if($(window).width() <= 550){
				$('.shop2-filter-button').after($('.shop2-filter'));
			} else if($(window).width() > 550){
				$('.filter-sorting-wrapper').after($('.shop2-filter'))
			}	
			if($(window).width() <= 768){
				$('.shop2-filter-button').after($('.shop2-filter'));
			} else if($(window).width() > 768){
				$('.filter-sorting-wrapper').after($('.shop2-filter'))
			}		
		if ($('.product-thumbnails-wrap').length > 0) {
			if ($(window).width() <= 920 && $slySliderFlag == 1) {
						$testSl.sly(false);	
					var $slidee = $testSl.children('.product-thumbnails').eq(0),
						$wrap  = $testSl.parent();
						$testSl.sly({
						    horizontal: 1,
							smart: 1,
						    itemNav: 'basic',
							activateOn: 'click',
							mouseDragging: 1,
							touchDragging: 1,
							releaseSwing: 1,
							startAt: 0,
							scrollBar: $wrap.find('.scrollbar'),
							scrollBy: 1,
							pagesBar: $wrap.find('.pages'),
							activatePageOn: 'click',
							speed: 300,
							elasticBounds: 1,
							dragHandle: 1,
							dynamicHandle: 1,
							clickBar: 1,
							prevPage: $wrap.find('.prevPage'),
							nextPage: $wrap.find('.nextPage'),
						});
				$('.product-image').after($('.product-thumbnails-wrap'));
				$('.product-thumbnails').after($('.product-thumbnails-wrap1 .scrollbar'));	
				var $thumbHeight = 'auto';
				$('.product-thumbnails').css({
					'height': $thumbHeight
				});	
				$('.product-thumbnails-wrap .scrollbar').css({
					'height': 2
				})
				$slySliderFlag = 2;			
			} else if ($(window).width() > 921 && $slySliderFlag == 2 || $slySliderFlag == 1) {
						$testSl.sly(false);	
					var $slidee = $testSl.children('.product-thumbnails').eq(0),
						$wrap   = $testSl.parent();
						$testSl.sly({
							horisontal: false,
							itemNav: 'basic',
							smart: 1,
							activateOn: 'click',
							mouseDragging: 1,
							touchDragging: 1,
							releaseSwing: 1,
							startAt: 0,
							scrollBar: $wrap.find('.scrollbar'),
							scrollBy: 1,
							pagesBar: $wrap.find('.pages'),
							activatePageOn: 'click',
							speed: 300,
							elasticBounds: 1,
							dragHandle: 1,
							dynamicHandle: 1,
							clickBar: 1,
							prevPage: $wrap.find('.prevPage'),
							nextPage: $wrap.find('.nextPage')
						});
				$('.product-image').before($('.product-thumbnails-wrap'));
				$('.product-thumbnails').before($('.product-thumbnails-wrap1 .scrollbar'));
				var $thumbHeight = $('.product-image').height();
					$('.product-thumbnails, .product-thumbnails-wrap .scrollbar').css({
						'height': $thumbHeight
					});	
				$slySliderFlag = 1
			} if ($(window).width() <= 920) {	
				var ThumbItemWidth = 18.4,
					ThumbItemMargin = 2.2;
			} else if ($(window).width() > 920) {	
				var ThumbItemWidth = 60,
					ThumbItemMargin = 0;				
			}
			if ($(window).width() <= 768) {
				var ThumbItemWidth = 23.7,
					ThumbItemMargin = 2.2;
			}
			var ThumbnailWrap = $('.product-thumbnails-wrap').width(),
				ThumbnailWidth = Math.floor((ThumbnailWrap/100)*ThumbItemWidth),
				ThumbnailMargin = Math.floor((ThumbnailWrap/100)*ThumbItemMargin);
				
			$('.thumbnails-in li').css({
				'width': ThumbnailWidth,
				'marginLeft': ThumbnailMargin				
			});
			$testSl.sly('reload');
		}
		$('.thumbnails-in li').each(function(){
			var $this = $(this);
				$this.find('img').on(clickStart, function(){
					if (!$this.hasClass('active-item')) {
						$('.thumbnails-in li').removeClass('active-item');
						$this.addClass('active-item');
					}	
				});
		});

		var $blockWidth = $('.edit-block-body').width(),
			$blockMargin = $('.edit-block-body').css('margin-right'),
		    $blockTotal = $('.edit-block-body').length,
		    $blockTotalWidth = $blockWidth * $blockTotal,
		    $blockWraplWidth = $('.edit-block-body-slider').width();
			    (function() {
			    	var owl_4 = $('.edit-block-body-slider').owlCarousel({
				      	smartSpeed:200,
				        margin: 48,	  
				        dotscontainer: true,      
				        loop: false,
				        nav:true,
				        navigation: true,
				        paginationSpeed : 200,
			    		dotsSpeed: 200,
				        autoplay: true,
					    items:1,
					    responsive:{
					        0:{
					            items:1
					        },
					        500:{
					            items:2
					        },
					        768:{
					            items:2
					        },
					        1025:{
					            items:3
					        }		        
					    }					    
			    	});
			    	$('.edit-block-body-slider .owl-nav').appendTo($('.edit-block-name'));
			    	$('.edit-blocks-wrapper .see-all').before($('.edit-block-body-slider .owl-dots'));
			    })();
		    	if ($blockTotal <= 3) {
					$('.edit-blocks-wrapper .owl-nav').hide();
					$('.edit-blocks-wrapper .owl-dots').hide();
		    	}
	    });
	});

	if (shop2.mode == 'product') {
		shop2.queue.hs = function() {				
			var getSizes = function(obj) {
					return {
						width: obj.width(),
						height: obj.height()
					};
				},
				getRatio = function(width, height, targetWidth, targetHeight) {
					var widthRatio = width / targetWidth,
						heightRatio = height / targetHeight,
						res;
					if (widthRatio > heightRatio) {
						res = widthRatio;
					} else {
						res = heightRatio;
					}
					if (res < 1) {
						res = 1;
					}
					return res;
				},
				big_a = $('.product-image a'),
				big_img = big_a.children(),
				big_parent = big_a.parent(),
				big_sizes = getSizes(big_parent),
				preloader = "<div class='shop2-preloader'></div>";
			$('body').append(preloader);
			preloader = $('.shop2-preloader');
			$('.thumbnails-in a').on('click', function() {
				var small_a = $(this),
					small_img = small_a.children(),
					small_sizes = getSizes(small_a.parent()),
					img = new Image(),
					offset = big_parent.offset();
				img.onload = function() {
					var href = big_a.attr('href'),
						ratio = getRatio(img.width, img.height, big_sizes.width, big_sizes.height);
					big_a.attr('href', img.src);
					big_img.attr('src', img.src).css({
						width: img.width / ratio,
						height: img.height / ratio
					});
					preloader.hide();
					img = new Image();
					img.onload = function() {
						var ratio = getRatio(img.width, img.height, small_sizes.width, small_sizes.height)
						small_a.attr('href', img.src);
						small_img.attr('src', img.src).css({
							width: img.width / ratio,
							height: img.height / ratio
						});
					}
					img.src = href;
				}
				preloader.show().css({
					top: offset.top,
					left: offset.left,
					width: big_parent.width(),
					height: big_parent.height()
				});
				img.src = small_a.attr('href');
				return false;
			});
			big_a.on('click', function() {
				hs.expand(this);
	        	return false;
			}).addClass('highslide');
		};	
	}
	
    (function () {
        var sliderWrap = $('.shop2-filter-fields.dimension');

        sliderWrap.each(function(){

            var $this = $(this),
					min = $this.find('.start-value').val(),
					min = Number(min),
					max = $this.find('.end-value').val(),
					max = Number(max),
					defaultMin = min,
					defaultMax = max,
                    sliderSelector = $this.find('.slider-range'),
                    rangeSelector  = $this.find('.range-val'),
                    minSelector    = $this.find('.min'),
                    maxSelector    = $this.find('.max');      

                minSelector.val() == "" && minSelector.val(defaultMin);
                maxSelector.val() == "" && maxSelector.val(defaultMax);

                sliderSelector.slider({
                    range: true,
                    animate: true,
                    step: 1,
                    min: min,
                    max: max,
                    values: [parseInt(minSelector.val()), parseInt(maxSelector.val())],
                    slide: function (event, ui) {
                        minSelector.val(ui.values[0]);
                        maxSelector.val(ui.values[1]);
                        rangeSelector.keyup();
                    }
                });

                $(document).on('keyup', rangeSelector, function () {
                    var min = parseInt(minSelector.val()),
                        max = parseInt(maxSelector.val());

                    if (min < max && max > min) {
                        sliderSelector.slider('values', [min, max]);
                    }
                });
                
            rangeSelector.keyup();

        });
         
    })();
	
})(jQuery);