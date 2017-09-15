<div class="c-spine"></div>
<header class="c-page__header">
	<div class="o-box">
		<section class="u-clear">
			<div class="u-half">
				<a href="<?php echo home_url(); ?>" class="c-logo"></a>
			</div>
			<div class="u-half">
				<nav class="c-menu">
					<ul>
						<li>
							<a href="<?php echo home_url(); ?>/programs">Programs <span>8</span></a>
						</li>
						<li>
							<a href="<?php echo home_url(); ?>/change-stories">Change Stories <span>8</span></a>
						</li>
						<li>
							<a href="<?php echo home_url(); ?>/partners">Partners <span>8</span></a>
						</li>
						<li>
							<a href="<?php echo home_url(); ?>/about">About</a>
						</li>
						<li>
							<a href="<?php echo home_url(); ?>/newsroom">Newsroom</a>
						</li>
					</ul>
				</nav>
			</div>
		</section>
	</div>
</header>
<div class="c-sectionator">
	<div class="o-table">
		<div class="o-table__cell">
			<ul>
				<li>
					<a href="#" class="c-hamburger">
						<svg viewBox="0 0 24 24">
							<line x1="5.5" y1="6.7" x2="18.7" y2="6.7"/>
							<line x1="5.5" y1="12" x2="18.7" y2="12"/>
							<line x1="5.5" y1="17.2" x2="18.7" y2="17.2"/>
						</svg>
					</a>
				</li>
				<li><a href="#" class="c-sectionator__button"><span></span></a></li>
				<li><a href="#" class="c-sectionator__button"><span></span></a></li>
				<li><a href="#" class="c-sectionator__button"><span></span></a></li>
			</ul>
		</div>
	</div>
</div>
<div class="c-burger t-dark">
	<!-- <a href="#" class="c-burger__close"></a> -->
	<div>
		<ul class="c-burger-menu">
			<li class="c-burger-menu__item">
				<a href="<?php echo home_url(); ?>/programs">
					<span>Programs</span>
					<figure style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/dummy.jpg')"></figure>
				</a>
			</li>
			<li class="c-burger-menu__item">
				<a href="<?php echo home_url(); ?>/impact-stories">
					<span>Change Stories</span>
					<figure style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/dummy-2.jpg')"></figure>
				</a>
			</li>
			<li class="c-burger-menu__item">
				<a href="<?php echo home_url(); ?>/partners">
					<span>Partners</span>
					<figure style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/dummy-3.jpg')"></figure>
				</a>
			</li>
			<li class="c-burger-menu__item">
				<a href="<?php echo home_url(); ?>/newsroom">
					<span>Newsroom</span>
					<figure style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/dummy.jpg')"></figure>
				</a>
			</li>
		</ul>
		<div class="u-clear u-pt-m">
			<div class="u-half">
				<section class="u-wrap">
					<h3>About</h3>
					<p><?php the_field('description', 8); ?></p>
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
	?>">