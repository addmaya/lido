	<?php wp_footer(); ?>

	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/build/vendors.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/build/app.js"></script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107215296-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments)};
	  gtag('js', new Date());
	  gtag('config', 'UA-107215296-1');
	  
	  Barba.Dispatcher.on('initStateChange', function() {
	  	gtag('config','UA-107215296-1',{
	  		'page_location':location.href,
	  		'page_path': location.pathname 
	  	});
	  });

	  Barba.Dispatcher.on('newPageReady', function() {
	  	gtag('config','UA-107215296-1',{
	  		'page_title': document.title
	  	});
	  });

	</script>
	
	</body>
</html>