<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php 
	$partnerYear = get_field('partner_since');
	$partnerLogo = get_field('logo');
	$partnerSummary = get_field('summary');
	$partnerAreas = get_field('intervention_areas');
	$partnerPrograms = get_field('interventions_supported');

	$programs = new WP_Query(array(
		'post_type'=>'program',
		'post__in'=>$partnerPrograms,
		'posts_per_page'=>-1
	));

	$programPhoto = new WP_Query(array(
		'post_type'=>'program',
		'post__in'=>$partnerPrograms,
		'posts_per_page'=>1,
		'orderby'=>'rand'
	));

 ?>
<div class="c-cover s--story t-dark">
	<div class="o-story__header">
		<div class="o-table">
			<div class="o-table__cell">
				<section>
					<figure class="js-bkg" data-image-url="<?php echo $partnerLogo; ?>"></figure>
					<h1><?php the_title(); ?></h1>
					<ul class="o-article__meta">
						<li><a href="#">/ Partner Since: <?php echo $partnerYear; ?></a></li>
					</ul>
					<span class="o-line"></span>
				</section>
			</div>
		</div>
	</div>
	<div class="o-story__cover u-threefourth">
		<?php if (!$programPhoto->have_posts()){?>
			<?php while($programPhoto->have_posts()):$programPhoto->the_post(); ?>
				<figure class="js-bkg o-image" data-image-url="<?php the_field('photo'); ?>">
					<span class="o-image__cover"></span>
				</figure>
			<?php endwhile; wp_reset_postdata(); ?>
		<?php } else {?>
			<figure class="js-bkg o-image" data-image-url="<?php the_field('photo', 10); ?>" style="background-position: center top">
				<span class="o-image__cover"></span>
			</figure>
		<?php } ?>
	</div>
</div>
<div class="o-story s--single">
	<div class="o-box">
		<p><?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', $partnerSummary); ?></p>
		<span class="o-line"></span>
		<?php if ($programs->have_posts()): ?>
			<h3 class="u-pt-m">Programs Supported</h3>
			<div>
				<?php while($programs->have_posts()):$programs->the_post();
					echo renderCircularButton(get_permalink(), get_the_title(), get_field('photo'));
					endwhile; wp_reset_postdata();
				?>
			</div>
		<?php endif ?>
		<span class="o-line"></span>
		
		<?php if ($partnerAreas): ?>
			<h3 class="u-pt-m">Area Implementation of SFEA Interventions</h3>
			<p><?php echo $partnerAreas; ?></p>
			<div style="height: 500px">
				
			</div>
		<?php endif ?>
		<?php if (condition): ?>
			<section>
				<h3 class="u-ptm-m">Contact <?php the_title(); ?></h3>
				<?php 
					while(have_rows('contacts')): the_row();
						$office = get_sub_field('office');
						$telephone = get_sub_field('telephone');
						$fax = get_sub_field('fax');
						$email = get_sub_field('email');
						$address = get_sub_field('address');
				 ?>
					
					<h3><?php echo $office; ?></h3>
					<p><?php echo $address; ?></p>
					<p>Telephone: <?php echo $telephone; ?></p>
					<p>Fax: <?php echo $fax; ?></p>
					<p>Email <a href="mailto:<?php echo $email?>"><?php echo $email?></a></p>


					<ul class="o-networks t-light">
						<?php 
							$networks = acf_get_fields('255');
							if ($networks){
								foreach ($networks as $network) {
									$networkName = $network['name'];
									$networkField = get_field($networkName, get_the_ID());
									if($networkField){
									echo '<li><a target="_blank" href="'.$networkField.'"><i class="c-fb s--'.$networkName.'"></i></a></li>';
									}
								}
							}
						 ?>
					</ul>
				
				<?php endwhile; ?>
			</section>
		<?php endif ?>
	</div>
</div>
<div class="o-box">
	<div class="c-cta">
		<div class="u-third">
			<section>
				<h3>Let the world know.<br/>Share this page.</h3>
				<ul class="o-networks">
					<li><a href=""><i class="c-fb"></i></a></li>
					<li><a href=""><i class="c-tw"></i></a></li>
					<li><a href=""><i class="c-gplus"></i></a></li>
					<li><a href=""><i class="c-pin"></i></a></li>
					<li><a href=""><i class="c-wa"></i></a></li>
				</ul>
			</section>
		</div>
		<div class="u-third">
			<section>
				<h3>Get Inspired.<br/>Change Stories delivered to your inbox.</h3>
				<form action="">
					<input type="text" placeholder="Your E-mail">
					<button class="o-button">
						<svg class="o-circle" viewBox="0 0 24 24"><circle class="o-circle__inner" cx="12.1" cy="12.1" r="11.1"/><circle class="o-circle__outer" cx="12.1" cy="12.1" r="11.1"/><g><line x1="5.1" y1="11.8" x2="17.6" y2="11.8"/><polyline points="14.8,8.4 18.2,11.8 14.8,15.2 "/></g></svg>
					</button>
				</form>
			</section>
		</div>
		<div class="u-third">
			<section class="u-center">
				<h3>Let’s get working.<br/>Partner with Us</h3>
				<?php echo renderButton('','Become a Partner'); ?>
			</section>
		</div>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>