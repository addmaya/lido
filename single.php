<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php
	$storyTitle = get_the_title();
	$storyBeneficiary = get_field('beneficiary');
	$storySummary = get_field('summary');
	$storyPhoto = get_field('photo');
	$storyAreas = get_field('areas');
	$storyProgramID = get_field('program');
?>
<div class="c-cover s--story t-dark">
	<div class="o-story__header">
		<div class="o-table">
			<div class="o-table__cell">
				<section>
					<h1><?php 
						if(!$storyBeneficiary){
							echo $storyTitle;
						} else {
							echo $storyTitle.' -'.$storyBeneficiary;
						} 
					?></h1>
					<ul class="o-article__meta">
						<li><a href="#">/ Published: <?php echo get_the_date(); ?></a></li>
						<?php if ($storyProgramID):
							$storyPrograms = new WP_Query(array(
								'post_type'=>'program',
								'post__in'=>$storyProgramID,
								'posts_per_page'=>-1
							));
							while($storyPrograms->have_posts()):$storyPrograms->the_post();
						?>
							<li><a href="<?php the_permalink(); ?>">/ Program: <?php the_title(); ?></a></li>
						<?php endwhile; wp_reset_postdata(); endif; ?>

						<?php if ($storyArea): ?>
							<li><a href="#">/ Area: <?php echo $storyArea; ?></a></li>
						<?php endif ?>						
					</ul>
					<span class="o-line"></span>
				</section>
			</div>
		</div>
	</div>
	<div class="o-story__cover u-threefourth">
		<figure class="js-bkg o-image" data-image-url="<?php echo $storyPhoto; ?>">
			<span class="o-image__cover"></span>
		</figure>
	</div>
</div>
<div class="o-story s--single s--map">
	<div class="o-box" data-aos="fade-up">
		<?php if ($storyAreas): ?>
			<div class="o-map s--partner">
				<?php
					foreach ($storyAreas as $area){
						echo '<div class="marker" data-lat="'.$area['area']['lat'].'" data-lng="'.$area['area']['lng'].'"></div>';
					}
				?>
			</div>
		<?php endif ?>	
	</div>
</div>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/content'));?>

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
				<?php echo renderButton(home_url().'/contact','Become a Partner'); ?>
			</section>
		</div>
	</div>
	<span class="o-line s--divider"></span>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>