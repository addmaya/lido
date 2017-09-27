<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php
	$programStories = new WP_Query(array(
		'post_type'=>'story',
		'posts_per_page'=>1,
		'meta_query'=>array(
			array(
				'key'=>'program',
				'value'=> '"'.get_the_ID().'"',
				'compare'=>'LIKE'
			)
		)
	));

	$programPartners = new WP_Query(array(
		'post_type'=>'partner',
		'posts_per_page'=>-1,
		'meta_query'=>array(
			array(
				'key'=>'interventions_supported',
				'value'=> '"'.get_the_ID().'"',
				'compare'=>'LIKE'
			)
		)
	));

	$programBackground = get_field('background');
?>
<section class="c-cover">
	<div class="u-half">
		<figure class="c-cover__image js-lazy o-image" data-image-url="<?php the_field('photo'); ?>">
			<span class="o-image__cover"></span>
		</figure>
	</div>
	<div class="u-half c-cover__profile s--single" >
		<div class="o-table js-lazy" data-image-url="<?php the_field('3d_illustration'); ?>">
			<div class="o-table__cell">
				<section class="c-cover__section">
					<h1><?php the_title(); ?></h1>
					<p><?php the_field('description'); ?></p>
					<div class="u-pt-l">
						<?php 
							if ($programBackground){
								echo renderButton('#program-background', 'The Problem', 'anchor', 's--block s--vertical');
							}
						?>
						<?php 
							if ($programStories->have_posts()){
								echo renderButton('#program-stories', 'Change Stories', 'anchor', 's--block s--vertical');
							}
						?>
						<?php 
							if ($programPartners->have_posts()){
								echo renderButton('#program-partners', 'Program Partners', 'anchor', 's--block s--vertical');
							}
						?>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>

<?php if ($programBackground): ?>
	<section class="o-section" id="program-background">
		<div class="o-box">
			<div class="u-clear">
				<div class="u-half" data-aos="fade-up">
					<div class="o-crumb">
						<div class="o-crumb__title">Background</div>
						<div class="o-crumb__line"></div>
						<div class="o-crumb__circle"></div>
					</div>
					<section class="o-story s--background">
						<?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', $programBackground); ?>
					</section>
				</div>
				<div class="u-half" data-aos="fade-up" data-aos-delay="200">
					<section class="u-pl-l">
						<div class="c-program__map">
							<div class="c-implementers s--programs"></div>
						</div>
						<div class="c-program__meta">
							<div class="u-half">
								<span class="u-uppercase">Region of Impact</span>
								<span class="u-uppercase">Focus</span>
								<span class="u-uppercase">Partners</span>
							</div>
							<div class="u-half">
								<span>Uganda, South Sudan</span>
								<span>Education</span>
								<span><?php echo $programPartners->post_count; ?></span>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>

<?php Starkers_Utilities::get_template_parts(array('parts/shared/content'));?>

<?php if ($programPartners->have_posts()): ?>
	<section class="o-section u-pb-l" id="program-partners">
		<div class="o-box">
			<div class="o-crumb">
				<div class="o-crumb__title">Program Partners</div>
				<div class="o-crumb__line"></div>
				<div class="o-crumb__circle"></div>
			</div>
			<ul class="o-partners">
				<?php
					$aosDelay = 0;
					while ($programPartners->have_posts()): $programPartners->the_post();
						$partnerLogo = get_field('logo');
						$partnerName = get_the_title();
						$aosDelay = $aosDelay + 50;
				?>
					<li data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>">
						<a href="<?php the_permalink(); ?>">
							<?php if ($partnerLogo){ ?>
								<figure class="js-lazy" data-image-url="<?php echo $partnerLogo; ?>"></figure>
							<?php } else {?>
								<span><?php echo $partnerName; ?></span>
							<?php } ?>
						</a>
					</li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
			<div class="c-program__cta">
				<a href="#" class="o-button s--multiline s--med">
					<i class="o-icon"><strong>+</strong></i>
					<span>Become a Partner</span>
				</a>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>