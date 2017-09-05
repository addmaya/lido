
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
		var submitButton = contactForm.find('button .o-button__title');
		contactForm.ajaxForm({
		    beforeSend: function() { 
		        submitButton.html('Sending...');
		    },
		    success: function() {
		        contactForm.find('#contactFormAlert').html('Thank you. Your Request was sent');
		        submitButton.html('Send Message');
		        contactForm.each(function(){
		        	this.reset();
		        });
		    },
		    error: function(){
		    	contactForm.find('#contactFormAlert').html('Please try again');
		    	submitButton.html('Send Message');
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

	function setSpineHeight(){
		var body = document.body,
		    html = document.documentElement;
		var height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight );
		$('.c-spine').css({
			height: height
		});
	}


	//ELEMENTS

	//menu
	$('nav a').click(function() {
		$('nav .is-active').removeClass('is-active');
		$(this).addClass('is-active');
	});

	//page
	var page = Barba.BaseView.extend({
	  namespace: 'page',
	  onEnter: function() {
	    alert('go');
	  }
	});
	page.init();
	
	
	//page transition
	Barba.Pjax.start();
	var FadeTransition = Barba.BaseTransition.extend({	  
	  start: function() {
	    preloader.removeClass('is-hidden');
	    menu.find('.is-active').removeClass('is-active');
	    Promise.all([this.newContainerLoading, this.fadeOut()]).then(this.fadeIn.bind(this));
	  },
	  fadeOut: function() {
	  	preloader.addClass('is-visible');
	    return $(this.oldContainer).promise();
	  },
	  fadeIn: function() {
	  	var transition = this;
	    var content = $(this.newContainer);	    
	    setTimeout(function(){
	    	$(this.oldContainer).hide();
	    	$('html, body').animate({ scrollTop: 0 }, 0);
	    	preloader.removeClass('is-visible').addClass('is-hidden');
	    	transition.done();
	    }, 800);
	    pageLoad();
	  }
	});
	Barba.Pjax.getTransition = function() {return FadeTransition;};

	//page load
	function pageLoad(){
		submitContactForm();
		getStories();
		popInit();
		setSpineHeight();
		AOS.init({duration: 700});
	}
	
	pageLoad();
});

