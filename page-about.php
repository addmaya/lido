<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section class="c-cover c-about t-dark">
	<div class="o-table">
		<div class="o-table__cell">
			<div class="o-box">
				<section>
					<h1>A world free of poverty</h1>
					<p>Stromme Foundation is a Norwegian based international development organization that has, since 1976, worked to help people in Asia, South America, West and Eastern Africa get out of poverty. SF Head Office is in Kristiansand, Norway. The organization currently works in 13 countries including Kenya, Tanzania, Uganda and South Sudan which are under Stromme Foundation Eastern Africa.</p>		
				</section>
				<span class="o-line"></span>
				<ul class="u-clear">
					<li class="u-third">
						<a href="#" class="o-button-rhombus">
							<figure></figure>
							<div class="o-button">
								<i class="o-icon"></i>
								<span>Our Core Values</span>
							</div>
						</a>
					</li>
					<li class="u-third">
						<a href="#" class="o-button-rhombus">
							<figure></figure>
							<div class="o-button">
								<i class="o-icon"></i>
								<span>Where we Work</span>
							</div>
						</a>
					</li>
					<li class="u-third">
						<a href="#" class="o-button-rhombus">
							<figure></figure>
							<div class="o-button">
								<i class="o-icon"></i>
								<span>Impact Highlights</span>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="o-section">
	<div class="o-box">
		<div class="o-crumb">
			<div class="o-crumb__title">Our Core Values</div>
			<div class="o-crumb__line"></div>
			<div class="o-crumb__circle"></div>
		</div>
		<div class="scene">
			<div class="c-orbit layer" data-depth="0.2">
				<div class="o-table">
					<div class="o-table__cell">
						<span class="c-orbit__sun" data-depth="0.1"></span>
					</div>
				</div>
				<section class="c-values layer" data-depth="0.4">
					<div class="o-value s--one">
						<figure class="u-half">
							<span class="o-rhombus s--medium u-block"></span>
						</figure>
						<section class="u-half">
							<h3>Justice</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie eleifend augue, quis vestibulum enim convallis nec. Sed gravida convallis ultricies.</p>
							<span class="o-line t-dark"></span>
						</section>
					</div>
					<div class="o-value s--two">
						<figure class="u-half">
							<span class="o-rhombus s--medium u-block"></span>
						</figure>
						<section class="u-half">
							<h3>Justice</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie eleifend augue, quis vestibulum enim convallis nec. Sed gravida convallis ultricies.</p>
							<span class="o-line t-dark"></span>
						</section>
					</div>
					<div class="o-value s--three">
						<figure class="u-half">
							<span class="o-rhombus s--medium u-block"></span>
						</figure>
						<section class="u-half">
							<h3>Justice</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie eleifend augue, quis vestibulum enim convallis nec. Sed gravida convallis ultricies.</p>
							<span class="o-line t-dark"></span>
						</section>
					</div>
				</section>
			</div>
		</div>
		<div class="u-pt-xl u-center">
			<?php echo renderCircularButton('#', 'Education Programs', get_stylesheet_directory_uri().'/images/dummy.jpg'); ?>
			<?php echo renderCircularButton('#', 'Livelihood Programs', get_stylesheet_directory_uri().'/images/dummy.jpg'); ?>
		</div>
	</div>
</section>
<section class="o-splash">
	<figure class="o-splash__figure">
		<div class="o-splash__tint"></div>
		<section class="o-splash__content">
			<div class="o-box">
				<blockquote>
					<p>Hope is ipsum dolor sit amet consectur community elit. Morbi molestie.</p>
					<span class="o-line"></span>
				</blockquote>
				<div class="o-author">
					<figure></figure>
					<section>
						<strong>Mrs. Priscilla M.Serukka</strong>
						<em>Regional Director, SFEA</em>
					</section>
				</div>
			</div>
		</section>
	</figure>
</section>
<section class="o-section c-regions">
	<div class="o-box">
		<div class="u-half c-regions__col">
			<div class="o-crumb">
				<div class="o-crumb__title">Where we Work</div>
				<div class="o-crumb__line"></div>
				<div class="o-crumb__circle"></div>
			</div>
			<figure class="c-regions__map"></figure>
			<section>
				<h1>Taking hope to hard to reach areas of East Africa.</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie eleifend augue, quis vestibulum enim convallis nec. Sed gravida convallis ultricies. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<div class="u-pt-l">
					<?php echo renderCircularButton('#', 'Education Programs', get_stylesheet_directory_uri().'/images/dummy.jpg'); ?>
					<?php echo renderCircularButton('#', 'Livelihood Programs', get_stylesheet_directory_uri().'/images/dummy.jpg'); ?>
				</div>
			</section>
		</div>
		<div class="u-half c-regions__col">
			<figure class="c-regions__image"></figure>
		</div>
	</div>
</section>
<section class="o-slider">
	<div class="u-threefourth o-slider-col">
		<div class="o-slider__image">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<figure style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/dummy-3.jpg')"></figure>
						<span>Jane is a Bonga Girl who Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie eleifend augue, quis vestibulum enim convallis nec.</span>
					</div>
					<div class="swiper-slide">
						<figure style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/dummy-2.jpg')"></figure>
						<span>Mary is a Bonga Girl who Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie eleifend augue, quis vestibulum enim convallis nec.</span>
					</div>
				</div>
				<div class="o-slider__buttons t-dark">
					<?php echo renderButton('#','','div','s--prev') ?>
					<?php echo renderButton('#','','div','s--next') ?>
				</div>
			</div>
		</div>
	</div>
	<div class="u-fourth o-slider-col">
		<div class="o-slider__caption">
			<section class="u-wrap">
				<em></em>
				<span class="o-line"></span>
			</section>
		</div>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>