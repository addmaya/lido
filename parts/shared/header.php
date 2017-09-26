<div class="c-preloader">
	<div class="o-box">
		<h1 class="c-preloader__title" >
			<span>{*Destination Page Title}</span>
			<figure></figure>
		</h1>
		<span class="o-line"></span>
	</div>
	<span class="c-preloader__count">03</span>
	<div class="c-preloader__bkg"></div>
</div>
<div class="c-spine"></div>
<header class="c-page__header">
	<div class="o-box">
		<section class="u-clear">
			<div class="u-half">
				<a href="<?php echo home_url(); ?>" class="c-logo"></a>
			</div>
			<div class="u-half">
				<nav class="c-menu-primary">
					<ul>
						<li>
							<a href="<?php echo home_url(); ?>/programs">Programs <span><?php echo wp_count_posts('program')->publish; ?></span></a>
						</li>
						<li>
							<a href="<?php echo home_url(); ?>/change-stories">Change Stories <span><?php echo wp_count_posts('story')->publish; ?></span></a>
						</li>
						<li>
							<a href="<?php echo home_url(); ?>/partners">Partners <span><?php echo wp_count_posts('partner')->publish; ?></span></a>
						</li>
						<li>
							<a href="<?php echo home_url(); ?>/about">About</a>
						</li>
						<!-- <li>
							<a href="<?php echo home_url(); ?>/contact">Contact</a>
						</li> -->
						<li>
							<a href="<?php echo home_url(); ?>/newsroom">Newsroom</a>
						</li>
					</ul>
				</nav>
			</div>
		</section>
	</div>
</header>
<a href="#" class="c-hamburger">
	<svg viewBox="0 0 24 24">
		<line x1="5.5" y1="6.7" x2="18.7" y2="6.7"/>
		<line x1="5.5" y1="12" x2="18.7" y2="12"/>
		<line x1="5.5" y1="17.2" x2="18.7" y2="17.2"/>
	</svg>
</a>
<div class="c-menu-secondary t-dark">
	<!-- <a href="#" class="o-closer"></a> -->
	<div>
		<ul>
			<li class="c-menu-secondary__item">
				<a href="<?php echo home_url(); ?>/programs">
					<span>Programs</span>
					<figure class="js-lazy" data-image-url="<?php echo get_field('photo', 10); ?>"></figure>
				</a>
			</li>
			<li class="c-menu-secondary__item">
				<a href="<?php echo home_url(); ?>/change-stories">
					<span>Change Stories</span>
					<figure class="js-lazy" data-image-url="<?php echo get_field('photo', 22); ?>"></figure>
				</a>
			</li>
			<li class="c-menu-secondary__item">
				<a href="<?php echo home_url(); ?>/partners">
					<span>Partners</span>
					<figure class="js-lazy" data-image-url="<?php echo get_field('photo', 41); ?>"></figure>
				</a>
			</li>
			<li class="c-menu-secondary__item">
				<a href="<?php echo home_url(); ?>/about">
					<span>About</span>
					<figure class="js-lazy" data-image-url="<?php echo get_field('photo', 24); ?>"></figure>
				</a>
			</li>
		</ul>
		<div class="u-clear u-pt-m">
			<div class="u-half">
				<section class="u-wrap">
					<h3>About</h3>
					<p>Stromme Foundation is a Norwegian based international development organization that has, since 1976, worked to help people in Asia, South America, West and Eastern Africa get out of poverty</p>
					<?php echo renderButton(home_url().'/about', 'Learn More'); ?>
				</section>
			</div>
			<div class="u-half">
				<section class="u-wrap">
					<h3>Get in Touch</h3>
					<?php
						$contactInfo = get_field('contacts',18);
						$contactTel = $contactInfo[0]['telephone'];
						$contactAddress = $contactInfo[0]['address'];
						$contactEmail = $contactInfo[0]['email'];
						$fb = esc_url(get_field('facebook',18));
						$tw = esc_url(get_field('twitter',18));
					?>
					<p>Address: <?php echo $contactAddress; ?></p>
					<p>Telephone: <?php echo $contactTel; ?></p>
					<p>Mail: <a href="mailto:<?php echo $contactEmail; ?>"><?php echo $contactEmail; ?></a></p>
					<ul class="o-networks u-pt-m">
						<li>
							<a href="<?php echo $fb; ?>">
								<i class="c-fb"></i>
							</a>
						</li>
						<li>
							<a href="<?php echo $tw; ?>">
								<i class="c-tw"></i>
							</a>
						</li>
					</ul>
					<div class="u-pt-m"><?php echo renderButton(home_url().'/contact', 'Get in Touch'); ?></div>
				</section>
			</div>
		</div>
	</div>
</div>
<div id="barba-wrapper">
	<div class="barba-container" data-namespace="<?php
		if(is_front_page()){echo 'home';}
		if(is_singular('program')){echo 'program';}
		if (is_page('contact')) {
			echo 'contact';
		}
	?>">