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

	$programAreas = array();
	$mappedPartners = new WP_Query(array(
		'post_type'=>'partner',
		'posts_per_page'=>-1,
		'meta_query'=>array(
			array(
				'key'=>'interventions_supported',
				'value'=> '"'.get_the_ID().'"',
				'compare'=>'LIKE'
			),
			array(
				'key'=>'areas',
				'value'=>'',
				'compare'=> '!='
			)
		)
	));
?>
<section class="c-cover">
	<div class="u-half">
		<figure class="c-cover__image js-bkg o-image" data-image-url="<?php the_field('photo'); ?>">
			<span class="o-image__cover"></span>
		</figure>
	</div>
	<div class="u-half c-cover__profile s--single" >
		<div class="o-table js-bkg" <?php if($mappedPartners->have_posts()){echo 'data-image-url="'.get_field('3d_illustration').'"';}?>>
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
	<section class="o-section s--cover" id="program-background">
		<?php if (!($mappedPartners->have_posts())): ?>
			<figure class="o-section__cover js-defer" data-image-url="<?php echo get_field('3d_illustration'); ?>" data-aos="fade-up" style="background-size:cover"></figure>
		<?php endif ?>
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
					<?php if($mappedPartners->have_posts()){?>
						<section class="u-pl-l">
							<div class="c-program__map">
								<div class="o-map">
								<?php
									while($mappedPartners->have_posts()){
										$mappedPartners->the_post();
										$areas = get_field('areas');
										foreach ($areas as $area){
											echo '<div class="marker" data-lat="'.$area['area']['lat'].'" data-lng="'.$area['area']['lng'].'"></div>';
											$programAreas[] = $area['area']['address'];
										}
									}
									wp_reset_postdata();
								?>
								</div>
							</div>
							<div class="c-program__meta">
								<div class="u-half">
									<span class="u-uppercase">Focus</span>
									<span class="u-uppercase">Partners</span>
								</div>
								<div class="u-half">
									<?php
										$groupList  = array();
										$groups = wp_get_post_terms($post->ID, 'group');
										foreach ($groups as $group) {
											$groupList[] = $group->name;
										}
									?>
									<span><?php echo implode(', ', $groupList); ?></span>
									<span><a href="#program-partners" class="u-link"><?php echo $programPartners->post_count; ?></a></span>
								</div>
							</div>
						</section>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>

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
	if($programStories->have_posts()){
?>
<section class="o-section" id="program-stories" style="padding-top: 0">
	<div class="o-box">
		<?php while($programStories->have_posts()):$programStories->the_post(); ?>
		<div class="u-clear">
			<div class="u-third" data-aos="fade-right">
				<a href="<?php echo get_permalink(); ?>" class="o-rhombus-button s--patterned" style="top:0">
					<div class="o-rhombus s--large">
						<figure class="o-rhombus__image js-bkg" data-image-url="<?php echo get_field('photo'); ?>"></figure>
					</div>
					<div class="o-rhombus__pattern"></div>
				</a>
			</div>
			<div class="u-twothird">
				<section class="u-pl-l" data-aos="fade-up">
					<div class="o-crumb">
						<div class="o-crumb__title">Featured Change Stories</div>
						<div class="o-crumb__line"></div>
						<div class="o-crumb__circle"></div>
					</div>
					<h1><a href="<?php echo get_permalink();?>"><span><?php the_title(); ?></span></a></h1>
					<section class="u-clear">
						<div class="u-half">
							<p><?php the_field('summary'); ?></p>
						</div>
						<div class="u-half">
							<section class="u-pl-m">
								<?php echo renderButton(get_permalink(), 'Read '.get_field('beneficiary')."'s Story"); ?>
							</section>
						</div>
					</section>
					<span class="o-line"></span>
				</section>
			</div>
		</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</section>
<?php } ?>

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
								<figure class="js-bkg" data-image-url="<?php echo $partnerLogo; ?>"></figure>
							<?php } else {?>
								<span><?php echo $partnerName; ?></span>
							<?php } ?>
						</a>
					</li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
			<div class="c-program__cta">
				<a href="<?php echo home_url().'/contact'; ?>" class="o-button s--multiline s--med">
					<i class="o-icon"><strong>+</strong></i>
					<span>Become a Partner</span>
				</a>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>