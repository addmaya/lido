<div class="c-splash__preloader">
	<div class="o-table">
		<div class="o-table__cell">
		</div>
	</div>
</div>
<div class="c-preloader">
	<div class="o-box">
		<!-- <span class="c-preloader__count">03</span> -->
		<h1 class="c-preloader__title" >
			<span></span>
			<figure></figure>
		</h1>
		<span class="o-line"></span>
	</div>
	<div class="c-preloader__bkg"></div>
</div>
<div class="c-spine"></div>
<header class="c-page__header">
	<div class="o-box">
		<section class="u-clear">
			<a href="<?php echo home_url(); ?>" class="c-logo"></a>
			<nav class="c-menu-primary">
				<ul>
					<li>
						<a href="<?php echo home_url(); ?>/about">About</a>
					</li>
					<li>
						<a href="<?php echo home_url(); ?>/programs">Programs <span><?php echo wp_count_posts('program')->publish; ?></span></a>
					</li>
					<li>
						<a href="<?php echo home_url(); ?>/change-stories">Change Stories <span><?php echo wp_count_posts('story')->publish; ?></span></a>
					</li>
					<li>
						<a href="<?php echo home_url(); ?>/partners">Partners <span><?php echo wp_count_posts('partner')->publish; ?></span></a>
					</li>
					<!-- <li>
						<a href="<?php echo home_url(); ?>/contact">Contact</a>
					</li> -->
					<li>
						<a href="<?php echo home_url(); ?>/newsroom">Newsroom</a>
					</li>
				</ul>
			</nav>
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
	<a href="#" class="o-button__close"></a>
	<div>
		<ul>
			<li class="c-menu-secondary__item">
				<a href="<?php echo home_url(); ?>/about">
					<span>About</span>
					<figure></figure>
				</a>
			</li>
			<li class="c-menu-secondary__item">
				<a href="<?php echo home_url(); ?>/programs">
					<span>Programs</span>
					<figure></figure>
				</a>
			</li>
			<li class="c-menu-secondary__item">
				<a href="<?php echo home_url(); ?>/change-stories">
					<span>Change Stories</span>
					<figure></figure>
				</a>
			</li>
			<li class="c-menu-secondary__item">
				<a href="<?php echo home_url(); ?>/partners">
					<span>Partners</span>
					<figure></figure>
				</a>
			</li>
			<li class="c-menu-secondary__item">
				<a href="<?php echo home_url(); ?>/newsroom">
					<span>Newsroom</span>
					<figure></figure>
				</a>
			</li>
		</ul>
		<div class="u-clear u-pt-m">
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
				
				<div class="u-pt-m"><?php echo renderButton(home_url().'/contact', 'Get in Touch'); ?></div>
			</section>
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