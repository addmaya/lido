
<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php wp_title('-', true, 'right'); ?><?php bloginfo( 'name' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<meta property="og:url" content="<?php echo get_permalink();?>"/>
		<meta property="og:site_name" content="<?php bloginfo('name');?>"/>
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?php echo get_the_title(); ?>"/>
		<meta property="og:description" content="<?php
			$seoSummary = get_field('summary');
			$seoDesc = get_field('description');

			if($seoSummary){
				echo $seoSummary;
			}
			else {
				if($seoDesc){
					echo $seoDesc;
				}
				else{
					echo bloginfo('description');
				}
			}
			?>"/>
		<meta property="og:image" content="<?php
			$seoImage = get_field('photo');
			if($seoImage){
				echo $seoImage;
			}
			else {
				echo get_stylesheet_directory_uri().'/images/dummy-2.jpg';
			}
			?>"/>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon_.ico"/>
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet">
		
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/js/vendors/aos.css" rel="stylesheet">
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/js/vendors/swiper.css" rel="stylesheet">

		<script src="https://use.typekit.net/yqx0mtr.js"></script>
		<script>try{Typekit.load({ async: false });}catch(e){}</script>

		<script>
			var ajaxURL="<?php echo admin_url('admin-ajax.php'); ?>";
			var themeURL="<?php echo get_stylesheet_directory_uri(); ?>";
		</script>

		<?php wp_head(); ?>
	</head>
	<body class="is-booting u-oh">
		<div class="c-page__wrap">