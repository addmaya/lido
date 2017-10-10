<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php 
	$partnerYear = get_field('partner_since');
	$partnerLogo = get_field('logo');
	$partnerSummary = get_field('summary');
	$partnerAreas = get_field('areas');
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
		<?php if ($programPhoto->have_posts()){?>
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
<div class="o-story s--single" style="padding-bottom: 3em">
	<div class="o-box">
		<p><?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', $partnerSummary); ?></p>
		<span class="o-line"></span>
		<?php if ($programs->have_posts()): ?>
			<h3 class="u-pt-m">Programs Implemented</h3>
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
			<div class="o-map s--partner">
				<?php
					foreach ($partnerAreas as $area){
						echo '<div class="marker" data-lat="'.$area['area']['lat'].'" data-lng="'.$area['area']['lng'].'"></div>';
					}
				?>
			</div>
		<?php endif ?>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>