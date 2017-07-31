jQuery(document).ready(function($) {

	// lazy images
	$('.element').each(function() {
    	var me = $(this);
    	var thumb_url = me.data('thumb-url');
    	me.css('background-image', 'url(' + thumb_url + ')');
    });

    //random classes
    var classes = ["ah1", "ah2", "ah3","ah4"];
	$(".element").each(function(){
        $(this).addClass(classes[~~(Math.random()*classes.length)]);
    });

    //scroll to hash
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

	//page transitions
	var page = Barba.BaseView.extend({
	  namespace: 'page',
	  onEnter: function() {
	    alert('go');
	  }
	});
	page.init();
	
	Barba.Pjax.start();
	var FadeTransition = Barba.BaseTransition.extend({
	  start: function() {
	    $("html, body").animate({ scrollTop: 0 }, "slow");
	    Promise
	      .all([this.newContainerLoading, this.fadeOut()])
	      .then(this.fadeIn.bind(this));
	    $('.c-loader').show();
	  },

	  fadeOut: function() {
	    return $(this.oldContainer).animate({ opacity: 0 }).promise();
	  },

	  fadeIn: function() {
	    var _this = this;
	    var $el = $(this.newContainer);

	    $(this.oldContainer).hide();

	    $el.css({
	      visibility : 'visible',
	      opacity : 0
	    });
	    $('.c-loader').hide();
	    $el.animate({ opacity: 1 }, 400, function() {
	      _this.done();
	    });
	  }
	});

	Barba.Pjax.getTransition = function() {
	  return FadeTransition;
	};
});

