<div class="c-splash__preloader">
	<div class="o-table">
		<div class="o-table__cell">
			<svg viewBox="0 0 960 960">
				<path d="M760.4,420.4c-8,41.4-25.1,80.6-50.1,114.6c-28.3-13.4-57.8-24.2-88.1-32.3c27-87.5,27-181.2,0-268.7
					c30.8-8.6,60.8-20,89.6-34.1c28,38.1,45.7,82.9,51.4,129.8c17.1,10.4,32.9,22.8,46.9,37.1C811.7,187.4,667.5,40.6,488,39.1
					c-2.4,0-4.9,0-7.3,0c-182,0.2-329.4,147.8-329.4,329.8c0,0,0,1.3,0,2c14.2-15.1,30.4-28.2,48.2-38.8c5.7-47.1,23.5-92,51.7-130.2
					c28.3,14,57.9,25.3,88.3,33.8c-13.2,43.2-19.9,88.2-19.8,133.4c0.4,45.3,7.3,90.4,20.6,133.7c-30.7,8.9-60.5,20.7-89,35.1
					c-24.8-34.2-41.5-73.6-48.8-115.2c-14.5,15.7-25.7,34.2-32.8,54.3C229.4,648.8,417.1,739.7,589,680c95.5-33.2,170.5-108.4,203.4-204
					C786.1,455.3,775.2,436.3,760.4,420.4 M681.8,165.2c-23.9,11.1-48.8,20.1-74.2,27.1c-14.9-36-34.3-70.1-57.7-101.3
					c49.8,12.5,95.2,38.1,131.7,74.2 M596.8,369.2c0,41.8-6.3,83.4-18.5,123.3c-32.2-5.8-64.9-8.6-97.6-8.3
					c-32.6,0.3-65.2,3.8-97.2,10.2C371.3,454.1,365,412.1,365,370c-0.1-41.9,6.1-83.5,18.5-123.5c32,6,64.6,9.1,97.2,9.1
					c32.7-0.5,65.2-4.1,97.2-10.6c12.4,40.4,18.7,82.5,18.5,124.8 M562,202.9c-27,4.6-54.3,6.9-81.6,6.9c-27.1-0.3-54-2.8-80.7-7.6
					c19.8-45,47.4-86,81.6-121.3c34.2,35.3,61.8,76.3,81.6,121.3 M281,166.3c36.4-36.1,81.9-61.7,131.7-74.2
					c-23.3,31.2-42.5,65.1-57.3,101.1c-25.4-7-50.2-16-74.2-27.1 M281.2,572.9c23.9-11.1,48.7-20.2,74.2-27.3
					c14.2,35.3,32.9,68.5,55.6,99C362,632.9,317.2,608.1,281.2,572.9 M400.1,535.8c53.1-9.6,107.5-9.6,160.6,0
					c-19.1,44.9-46.2,86-80.1,121.1C446.4,622,419,581,399.7,536.2 M549.7,644.3c22.7-30.7,41.4-64.2,55.6-99.6
					c25.4,6.5,50.2,15.1,74.2,25.8c-35.7,36.1-80.6,61.7-129.8,74.2"/>
				<path d="M378.4,364.2c40.2,14.7,75.4,40.4,101.6,74.2c27-33.4,62.4-59,102.6-74.2c0.7-15.7-0.4-31.4-3.2-46.9
					c-37.5,9.4-71.8,28.6-99.4,55.6c-27.4-26.3-61-45-97.7-54.5c-2.4,15-3.6,30.2-3.7,45.4"/>
				<path d="M652.1,310.6c2,15.1,2.9,30.2,2.6,45.4c98.7,10,158.9,77.3,158.9,169.3c0,115.4-150.4,215.5-333.8,339.6
					C298,738.9,148,651.2,148,529.7c0-99.8,70.3-162.1,158.6-171.6c0-13.2,1.9-34.9,3-45.8c-117,4.2-209,101.6-206.6,218.7
					c0,148.4,173.6,248,377.4,389.5c204-143.2,377.4-248.5,377.4-397.5C859.1,407.7,767.3,313,652.1,310.6"/>
			</svg>	
		</div>
	</div>
</div>
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
		global $post;
		if(get_post_type() == 'program'){
			echo 'program';
		} else {
			echo $post->post_name;
		}
	?>">