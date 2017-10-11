
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

var albumSwiper;

jQuery(document).ready(function($) {
	//variables
	var preloader = $('.c-preloader');
    var splashPreloader = $('.c-splash__preloader');
	var body = $('body');
	var menu = $('.c-menu-primary');
	var hamburger = $('.c-hamburger');

	var logo = $('.c-logo')
	var header = $('.c-page__header');
	var menuSecondary = $('.c-menu-secondary');
    var aosDuration = 900;

	//functions
	
    function loadSplashImage(){
        var splashImage = $('.c-splash__image figure');
        if(splashImage.length){  
            var splashImageURL= splashImage.data('image-url');
            var image = document.createElement('img');
            image.src = splashImageURL;

            image.onload = function(){
                $('.c-splash').addClass('is-loaded');
                splashImage.css('background-image', 'url(' + splashImageURL + ')');
                splashPreloader.addClass('is-loaded');
                body.removeClass('u-oh');
                $('.c-highlights').addClass('is-loaded');
            }
        }
        else {
            splashPreloader.addClass('is-loaded');
            body.removeClass('u-oh');
        }
    }

    function deferImage(obj){
        var me = $(this);
        var imageURL = me.data('image-url');

        obj.bind('inview', function (event, isInView) {
          if (isInView) {
            var me = $(this);
            var imageURL = me.data('image-url');

            if(imageURL){
                me.removeClass('js-bkg');
                me.css('background-image', 'url(' + imageURL + ')');
                me.addClass('is-loaded');
            }
          }
        });
    }

    function loadBkg(obj){
        obj.each(function() {
            var me = $(this);
            var imageURL = me.data('image-url');

            if(imageURL){
                me.removeClass('js-bkg');
                me.css('background-image', 'url(' + imageURL + ')');
                me.addClass('is-loaded');
            }
        });
    }

    function switchTheme(namespace){
    	if(namespace == 'program' || namespace == 'contact' || namespace == 'newsroom'){
    		header.addClass('t-dark');

    		if(namespace == 'contact' || namespace == 'newsroom'){
    			logo.addClass('t-dark');
    		}
    	}
    	else {
    		header.removeClass('t-dark');
    		logo.removeClass('t-dark');
    	}
    }


    function new_map( $el ) {
        var $markers = $el.find('.marker');
        var args = {
            zoom        : 8,
            center      : new google.maps.LatLng(0, 0),
            mapTypeId   : google.maps.MapTypeId.ROADMAP,
            scrollwheel: false,
            scaleControl: false,
            draggable: false,
            mapTypeControl: false,
            streetViewControl: false,
            disableDefaultUI: true,
            styles: mapStyles
        }
            
        var map = new google.maps.Map( $el[0], args);

        map.markers = [];
        $markers.each(function(){                   
            add_marker( $(this), map );                 
        });

        center_map( map );
        return map;
        
    }

    function add_marker( $marker, map ) {
        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
        var marker = new google.maps.Marker({
            position    : latlng,
            map         : map,
            icon: themeURL + '/images/map-marker-small.png'
        });

        map.markers.push( marker );
        if( $marker.html() )
        {
            var infowindow = new google.maps.InfoWindow({
                content     : $marker.html()
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open( map, marker );
            });
        }

    }

    function center_map( map ) {
        var bounds = new google.maps.LatLngBounds();
        $.each( map.markers, function( i, marker ){

            var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
            bounds.extend( latlng );
        });

        if( map.markers.length == 1 ){
            map.setCenter( bounds.getCenter() );
            map.setZoom( 5 );
        }
        else {
            //map.fitBounds( bounds );
            map.setCenter( bounds.getCenter() );
            map.setZoom( 5 );
        }

    }

   

    function pageLoad(){
        //add edge styles
        if ((document.documentMode || /Edge/.test(navigator.userAgent))) {
           body.addClass('ua-microsoft');
        }

        //draw map
        var map = null;
        $('.o-map').each(function(){
            map = new_map( $(this) );
        });
        
        //load lazy images
        loadSplashImage();
    	loadBkg($('.js-bkg'));
        deferImage($('.js-defer'));     

    	//start AOS
    	AOS.init({duration: aosDuration});

    	//primary menu
    	menu.find('a').click(function() {
    		menu.find('.is-active').removeClass('is-active');
    		$(this).addClass('is-active');
    	});

    	//secondary menu
    	menuSecondary.find('a').click(function() {
    		menuSecondary.removeClass('is-visible');
    		body.removeClass('u-oh');
    	});

    	$('.c-page__header, .c-paginator, .c-page__footer').bind('inview', function (event, isInView) {
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
    		body.addClass('u-oh');
    	});
    	
    	hamburger.find('.c-burger__close').click(function(e) {
    		e.preventDefault();
    		menuSecondary.removeClass('is-visible');
    		body.removeClass('u-oh');
    	});

    	$(document).mouseup(function(e) 
    	{
    	    var container = menuSecondary;
    	    if (!container.is(e.target) && container.has(e.target).length === 0) 
    	    {
    	        container.removeClass('is-visible');
    	        body.removeClass('u-oh');
    	    }
    	});

        //resize full images
        $('.o-story.s--single .size-full').each(function() {
            var me = $(this);
            if(!(me.hasClass('alignleft'))){
                me.parent().addClass('size-full-wrap');
            }
            else {
                me.parent().addClass('float-wrap');
            }
        });

        $('.o-story.s--single .alignleft').each(function() {
            $(this).parent().addClass('float-wrap');
        });

        $('.o-story.s--single .alignright').each(function() {
            $(this).parent().addClass('float-wrap');
        });

        $('.o-story blockquote p').each(function() {
            var me = $(this);
            var quoteContent = me.html();
            var url = location.href;

            var tweetContent = url+' '+quoteContent;


            console.log(location.href);
            me.html('<a target="_blank" href="https://twitter.com/home?status='+tweetContent.substring(0, 140)+'" class="o-tweet">'+quoteContent+'</a>')
        });



    	//render dropped caps
    	if($('.o-story.s--single p').length){
    		var firstChild = $('.o-story.s--single p').first();
    		var firstChildHTML = firstChild.html();
    		var firstChar = firstChildHTML.charAt(0);
    		var cap = '<span class="o-cap">'+firstChar+'</span>';

    		firstChild.html(cap+ firstChildHTML.substring(1));
    	}

    	//render image sliders
    	var swiperInstances = {};
    	$(".o-slider .swiper-container").not('#c-pop__swiper .swiper-container').each(function(index, element){
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

    	//match heights
    	$('.c-regions__col').matchHeight();
    	$('.o-slider-col').matchHeight();

    	//fetch posts
    	$('.js-fetch-posts').click(function(e) {
    		e.preventDefault();

    		var me = $(this);
    		var storiesGrid = me.closest('.o-section').find('.o-article__grid');
    		var offset = storiesGrid.find('.o-article').length;
    		var tailIndex = storiesGrid.find('.o-article').last().data('index');
    		var post_type = me.data('post');

    		$.ajax({
    		   url: ajaxURL,
    		   method: 'post',
    		   dataType: 'json',
    		   data: {action: 'getPosts', offset: offset, tailIndex: tailIndex, post_type: post_type},
    		   success: function(data){
    		       if(data.length){
    		       		storiesGrid.append(data);
                        loadBkg(storiesGrid.find('.js-bkg'));

                        var balance =  parseInt(storiesGrid.find('.o-article').last().data('balance'));
                        if(balance){
                            me.find('strong').html(balance);
                        } else {
                            me.parent().hide();
                        }   
    				}
    				else{
    					$('html, body').animate({scrollTop: storiesGrid.position().top}, 500);
    				}
    		   } 
    		});
    	});

        //fetch video and photos
        $('.js-media').click(function(e) {
            e.preventDefault();

            var me = $(this);
            var mediaGrid = me.closest('.o-section').find('.c-library');
            var offset = mediaGrid.find('.u-half').length;
            var post_type = me.data('post');

            $.ajax({
               url: ajaxURL,
               method: 'post',
               dataType: 'json',
               data: {action: 'getPosts', offset: offset, tailIndex: 0, post_type: post_type},
               success: function(data){
                   if(data.length){
                        mediaGrid.append(data);
                        deferImage(mediaGrid.find('.js-defer'));

                        var balance =  parseInt(mediaGrid.find('.o-splash').last().data('balance'));
                        if(balance){
                            me.find('strong').html(balance);
                        } else {
                            me.parent().hide();
                        }   
                    }
                    else{
                        $('html, body').animate({scrollTop: mediaGrid.position().top}, 500);
                    }
               } 
            });
        });

    	//submit contact form
    	$('.o-input input, .o-input textarea').focus(function() {
    		$('.o-input.is-active').removeClass('is-active');
    		$(this).closest('.o-input').addClass('is-active');
    	});

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

    	//scroll to hash
        $(document).on('click', 'a[href*="#"]:not([href="#"])', function(e) {
    	    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
    	        var target = $(this.hash);
    	        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
    	        if (target.length) {
    	            $('html, body').animate({
    	                scrollTop: target.offset().top
    	            }, 750);
    	            e.preventDefault();
                    AOS.refresh();
    	        }
    	    }
    	});

        //render pop
        function closePop(){
            $('body').removeClass('u-oh');
            $('.c-pop').removeClass('is-visible');
            $('#videoPop .o-player').html('');
            
            albumSwiper.removeAllSlides();

            var albumPop = $('#albumPop');
            albumPop.find('.o-article__meta').remove();
        }

        $('body').on('click', '.c-pop .o-button__close', function(e) {
            e.preventDefault();
            closePop();
        });

        $('body').on('click', '.c-pop', function() {
            closePop();
        });

        $('body').on('click', '.c-pop .c-pop__box', function(e) {
            e.stopPropagation();
        });
        
        //render pop videos
        body.on('click', '.js-video', function(e) {
            e.preventDefault();

            var me = $(this);
            var videoID = me.data('video-id');
            var videoPop = $('#videoPop');

            if(videoID){
                body.addClass('u-oh');
                videoPop.addClass('is-visible');
                videoPop.find('.o-player').html('<iframe type=text/html src=https://www.youtube.com/embed/'+videoID+'?autoplay=1></iframe>');
            }
        });


        //render pop albums
        var deviceWidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
        var albumSwiperSpeed = 800;

        if(deviceWidth < 960){
            albumSwiperSpeed = 300;
        }

        albumSwiper = new Swiper('#albumPop .swiper-container', {
            loop: true,
            speed: albumSwiperSpeed,
            autoplayDisableOnInteraction:false,
            paginationClickable: true,
            nextButton: '#albumPop .s--next',
            prevButton: '#albumPop .s--prev',
            onSlideChangeEnd: function(){
                $('#albumPop').find('em').html($('#albumPop .swiper-slide-active span').html());
            }
        });

        body.on('click', '.js-photo', function(e) {
            e.preventDefault();
            var me = $(this);
            var parent = me.parent();
            var albumPop = $('#albumPop');
            var albumPhotos = parent.find('.c-libary__vault').html();
            var albumShare = parent.find('.c-library__networks').html();
            var albumMeta = parent.find('.c-library__meta').html();
            var albumTitle = me.find('h2').html();

            if (albumPhotos) {
                body.addClass('u-oh');
                albumPop.addClass('is-visible');

                if (deviceWidth < 960) {
                    albumPop.find('.o-slider__image').css({
                        width: deviceWidth - 36,
                        height: deviceWidth,
                        margin: '0 auto'
                    });                
                }
                
                albumPop.find('h2').html(albumTitle);
                albumPop.find('h2').after(albumMeta);
                albumPop.find('.c-networks').html(albumShare);
                albumSwiper.appendSlide(albumPhotos);
                albumSwiper.update();
                albumSwiper.updateContainerSize();
            }   
        });

    	//render parallax scenes
    	if($('.scene').length){
    		$('.scene').parallax();
    	}

    	//render splash slider
    	if($('#c-splash__swiper').length){
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
    }

	//page transition
	Barba.Pjax.start();
	var FadeTransition = Barba.BaseTransition.extend({	  
	  start: function() {
	  	preloader.removeClass('is-exiting');    
	    Promise.all([this.newContainerLoading, this.fadeOut()]).then(this.fadeIn.bind(this));
	  },
	  fadeOut: function() {
	  	preloader.addClass('is-appearing');
	  	body.addClass('u-oh');
	  	$(this.oldContainer).addClass('is-exiting');
	    return $(this.oldContainer).promise();
	  },
	  fadeIn: function() {
	  	var transition = this;
	    var content = $(this.newContainer);	  
	    setTimeout(function(){
	    	$(this.oldContainer).hide();
	    	$('html, body').animate({ scrollTop: 0 }, 0);	    	
	    	preloader.removeClass('is-appearing').addClass('is-exiting');
	    	body.removeClass('u-oh');
	    	transition.done();
            AOS.init({duration: aosDuration});

	    }, 800);
	    pageLoad();
	    
	  }
	});
	Barba.Pjax.getTransition = function() {return FadeTransition;}

    //switch theme
    Barba.Dispatcher.on('newPageReady', function(currentStatus, oldStatus, container) {
        switchTheme(currentStatus.namespace);
    });

    //update preloader
    Barba.Dispatcher.on('linkClicked', function(HTMLElement) {
        var origin = location.origin;
        var href = HTMLElement.href;
        var destination = href.substring(origin.length);
        var preloaderIcon = $('.c-preloader__title figure');

        var deviceHeight = (window.innerHeight > 0) ? window.innerHeight : screen.height;
        preloader.css({
            height: deviceHeight
        });

        menu.find('.is-active').removeClass('is-active');

        preloaderIcon.removeClass();

        function setPreloaderIcon(c){
            preloaderIcon.addClass(c);
        }

        switch (true){
            case destination.includes('stories'):
                setPreloaderIcon('s--globe');
                break;
            case destination.includes('partner'):
                setPreloaderIcon('s--handshake');
                break;
            case destination.includes('change'):
                setPreloaderIcon('s--book');
                break;
            case destination.includes('newsroom'):
                setPreloaderIcon('s--media');
                break;
            case destination.includes('contact'):
                setPreloaderIcon('s--telephone');
                break;
            default: 
                 setPreloaderIcon('s--globe');
                 break;
        }

        if(href.substring(href.length - 1) == "/"){
            destination = destination.substring(0, destination.length - 1);
        }
        $('.c-preloader__title span').html(destination.replace(/-/g, ' '));

        Barba.Dispatcher.trigger("newPageProgress", href);

    });

    // Barba.Dispatcher.on("newPageProgress", function(url) {
    //     function getRandomInt(min, max) {
    //       min = Math.ceil(min);
    //       max = Math.floor(max);
    //       return Math.floor(Math.random() * (max - min)) + min;
    //     }

    //    var req = new XMLHttpRequest();
    //    var preloaderLine = $('.c-preloader .o-line');
    //    var progress = 0;

    //    req.open('POST', url);
    //    req.send();

    //    req.onprogress = function (e) {
    //        progress = progress + 20;
           
    //        if(progress >= 100){
    //            progress = 75;
    //        }
    //        preloaderLine.css({
    //            width: progress+'%'
    //        });
    //    }
    // });

    //boot system
	pageLoad();
    switchTheme($('.barba-container').data('namespace'));
});

