
function writeCookie(name, value, days) {
    var date, expires;
    if (days) {
        date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var i, c, ca, nameEQ = name + "=";
    ca = document.cookie.split(';');

    for (i = 0; i < ca.length; i++) {
        c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1, c.length);
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length, c.length);
        }
    }
    return '';
}

var deleteCookie = function(name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
};


jQuery(document).ready(function($) {
	//variables
	var preloader = $('.c-preloader');
	var menu = $('.c-page__menu');
	var hamburger = $('.c-hamburger');
	var sectionator = $('.c-sectionator');
	var footer = $('.c-page__footer');
	var logo = $('.c-logo')
	var header = $('.c-page__header');
	var menuSecondary = $('.c-menu-secondary');

	//functions
	$('.element').each(function() {
    	var me = $(this);
    	var thumb_url = me.data('thumb-url');
    	me.css('background-image', 'url(' + thumb_url + ')');
    });

    $(document).on('click', 'a[href*="#"]:not([href="#"])', function(e) {
	    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
	        var target = $(this.hash);
	        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	        if (target.length) {
	            $('html, body').animate({
	                scrollTop: target.offset().top
	            }, 1000);
	            e.preventDefault();
	        }
	    }
	});

	function submitContactForm(){
		var contactForm = $('#contactForm');
		var submitButton = contactForm.find('button span');
		var formAlert = $('#contactFormAlert');
		contactForm.ajaxForm({
		    beforeSend: function() { 
		        submitButton.html('Sending...');
		    },
		    success: function() {
		        submitButton.html('Send Message [Done]');
		        contactForm.each(function(){
		        	this.reset();
		        });

		        setTimeout(function(){
		          submitButton.html('Send Message');
		        }, 2000);
		    },
		    error: function(){
		    	submitButton.html('Send Message [Error]');
		    	setTimeout(function(){
		          submitButton.html('Send Message');
		        }, 2000);
		    },
		    resetForm: true
		});
	}

	function getStories(){
		$('#morestories').click(function(e) {
			e.preventDefault();

			var me = $(this);
			var postPerPage = 9;
			var storiesGrid = $('#storiesGrid');
			var offset = storiesGrid.find('li').length;
			var tailIndex = storiesGrid.find('li').last().attr('id');
			var category = me.data('category');

			$.ajax({
			   url: ajaxURL,
			   method: 'post',
			   dataType: 'json',
			   data: {action: 'getStories', offset: offset, postsPerPage: 9, tailIndex: tailIndex, category: category},
			   success: function(data){
			   	console.log(data.length);
			       if(data.length){
			       		storiesGrid.append(data);
					}
					else{
						$('html, body').animate({scrollTop: 0}, 500);
					}
			   } 
			});
		});
	}

	function openPop(ele){
		$('body').addClass('u-oh');
		ele.show();
	}

	function closePop(){
		$('body').removeClass('u-oh');
		$('.o-pop').hide();
	}

	function popInit(){
		$('.o-pop__close').click(function(e) {
			e.preventDefault();
			closePop();
		});
		$('.o-pop').click(function() {
			closePop();
		});
		$('.o-pop .o-pop__box').click(function(e) {
			e.stopPropagation();
		});
	}

	// function setSpineHeight(){
	// 	var body = document.body,
	// 	    html = document.documentElement;
	// 	var height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight );
	// 	$('.c-spine').css({
	// 		height: height-100
	// 	});
	// }

	function activatePaginators(){
		$('.js-paginator__prev').hover(function() {
			$('.c-paginator span').addClass('is-left');
		}, function() {
			$('.c-paginator span').removeClass('is-left');
		});
	}

	function renderSwiper(){
		var swiperInstances = {};
		$(".o-slider .swiper-container").each(function(index, element){
		    var $this = $(this);
		    $this.addClass("instance-" + index);
		    $this.closest('.o-slider').addClass('slide-'+index);
		    $(".slide-"+index).find(".s--prev").addClass("btn-prev-" + index);
		    $(".slide-"+index).find(".s--next").addClass("btn-next-" + index);
		    swiperInstances[index] = new Swiper(".instance-" + index, {
		        loop: true,
		        speed: 800,
		        autoplayDisableOnInteraction:false,
		        pagination: '.swiper-pagination',
		        paginationClickable: true,
		        nextButton: ".btn-next-" + index,
		        prevButton: ".btn-prev-" + index,
		        onSlideChangeEnd: function(){
		        	$(".slide-"+index).find('.o-slider__caption em').html($('.swiper-slide-active span').html());
		        }
		    });
		});
	}

	function loadLazyImage(obj){
		obj.bind('inview', function (event, isInView) {
	      if (isInView) {
	      	var me = $(this);
	      	var imageURL = me.data('image-url');

	      	if(imageURL){
	      		me.removeClass('js-lazy');
	      		me.css('background-image', 'url(' + imageURL + ')');
	      		me.addClass('is-loaded');
	    	}
	      }
	    });
    }

	//menu
	$('.c-menu-primary a').click(function() {
		$('.c-menu-primary .is-active').removeClass('is-active');
		$(this).addClass('is-active');
	});

	$('.c-menu-secondary a').click(function() {
		menuSecondary.removeClass('is-visible');
		$('body').removeClass('u-oh');
	});

	function matchHeights(){
		$('.c-regions__col').matchHeight();
		$('.o-slider-col').matchHeight();
	}



	//CLEAN THIS UP

	$('.o-splash .s--play').click(function(e) {
		e.preventDefault();
		var me = $(this);
		var playerWrap = me.closest('.o-splash').find('.o-splash__player');
		var player = me.closest('.o-splash').find('.o-player');
		var videoID = me.data('video-id');

		playerWrap.addClass('is-visible');
		player.html('<iframe type=text/html src=https://www.youtube.com/embed/'+videoID+'?autoplay=1></iframe>');
	});

	$('.o-player__close').click(function(e) {
		e.preventDefault();
		var me = $(this);
		var playerWrap = me.closest('.o-splash__player');
		
		playerWrap.removeClass('is-visible');
		playerWrap.find('.o-player').html('');
	});

	$('.scene').parallax();

	$('.o-input input, .o-input textarea').focus(function() {
		$('.o-input.is-active').removeClass('is-active');
		$(this).closest('.o-input').addClass('is-active');
	});

	function renderDropCap(){
		if($('.o-story.s--single p').length){
			var firstChild = $('.o-story.s--single p').first();
			var firstChildHTML = firstChild.html();
			var firstChar = firstChildHTML.charAt(0);
			var cap = '<span class="o-cap">'+firstChar+'</span>';

			firstChild.html(cap+ firstChildHTML.substring(1));
		}

	}
	renderDropCap();

	

	header.bind('inview', function (event, isInView) {
		if(isInView){
			hamburger.removeClass('is-visible');
		}
		else{
			hamburger.addClass('is-visible');
		}
	});

	hamburger.click(function(e) {
		e.preventDefault();
		menuSecondary.addClass('is-visible');
		$('body').addClass('u-oh');
	});
	$('.c-burger__close').click(function(e) {
		e.preventDefault();
		menuSecondary.removeClass('is-visible');
		$('body').removeClass('u-oh');
	});

	$(document).mouseup(function(e) 
	{
	    var container = menuSecondary;
	    if (!container.is(e.target) && container.has(e.target).length === 0) 
	    {
	        container.removeClass('is-visible');
	        $('body').removeClass('u-oh');
	    }
	});

	//page - home
	var pageHome = Barba.BaseView.extend({
	  namespace: 'home',
	  onEnter: function() {
	    var splashSwiper = new Swiper('#c-splash__swiper', {
	      	loop: true,
	      	autoplay: 8000,
	      	speed: 1500,
	      	effect:'fade',
	      	fade: {crossFade: true},
	      	autoplayDisableOnInteraction:false,
	      	nextButton: '.swiper-button-next',
	      	prevButton: '.swiper-button-prev'
	      });
	  }
	});
	pageHome.init();

	//page - program
	var pageProgram = Barba.BaseView.extend({
	  namespace: 'program',
	  onEnter: function() {
	    header.addClass('t-dark');
	  },
	  onLeave: function(){
	  	header.removeClass('t-dark');
	  }
	});
	pageProgram.init();


	//page - contact
	var pageContact = Barba.BaseView.extend({
	  namespace: 'contact',
	  onEnter: function() {
	    header.addClass('t-dark');
	    logo.addClass('t-dark');
	  },
	  onLeave: function(){
	  	header.removeClass('t-dark');
	  	logo.removeClass('t-dark');
	  }
	});
	pageContact.init();

	
	
	//page transition
	// Barba.Pjax.start();
	// var FadeTransition = Barba.BaseTransition.extend({	  
	//   start: function() {
	//     preloader.removeClass('is-hidden');
	//     menu.find('.is-active').removeClass('is-active');
	//     Promise.all([this.newContainerLoading, this.fadeOut()]).then(this.fadeIn.bind(this));
	//   },
	//   fadeOut: function() {
	//   	preloader.addClass('is-visible');
	//     return $(this.oldContainer).promise();
	//   },
	//   fadeIn: function() {
	//   	var transition = this;
	//     var content = $(this.newContainer);	    
	//     setTimeout(function(){
	//     	$(this.oldContainer).hide();
	//     	$('html, body').animate({ scrollTop: 0 }, 0);
	//     	preloader.removeClass('is-visible').addClass('is-hidden');
	//     	transition.done();
	//     }, 800);
	//     pageLoad();
	//   }
	// });
	// Barba.Pjax.getTransition = function() {return FadeTransition;};

	//page load
	function pageLoad(){
		loadLazyImage($('.js-lazy'));
		submitContactForm();
		getStories();
		popInit();
		// setSpineHeight();
		matchHeights();
		AOS.init({duration: 700});
		activatePaginators();
		renderSwiper();
	}
	
	pageLoad();
});

