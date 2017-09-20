<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section class="c-cover">
	<div class="u-half">
		<div class="o-tint"></div>
		<figure class="c-cover__image js-lazy" data-image-url="<?php the_field('photo'); ?>"></figure>
	</div>
	<div class="u-half c-cover__profile s--single">
		<div class="o-table">
			<div class="o-table__cell">
				<section class="c-cover__section">
					<h1><?php the_title(); ?></h1>
					<p><?php the_field('summary'); ?></p>
					<div class="u-pt-l">
						<a href="#" class="o-button s--block">
							<i class="o-icon"></i>
							<span>Impact in numbers</span>
						</a>
						<a href="#" class="o-button s--block">
							<i class="o-icon"></i>
							<span>Photo Gallery</span>
						</a>
						<a href="#" class="o-button s--block">
							<i class="o-icon"></i>
							<span>Partners</span>
						</a>
						<a href="#" class="o-button s--block">
							<i class="o-icon"></i>
							<span>Change Stories</span>
						</a>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/content'));?>
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
<section class="o-section">
	<div class="o-box">
		<?php while($programStories->have_posts()):$programStories->the_post(); ?>
		<div class="u-clear">
			<div class="u-third">
				<?php echo renderRhombusButton(get_permalink(),'', get_field('photo')); ?>
			</div>
			<div class="u-twothird">
				<section class="u-pl-l">
					<div class="o-crumb">
						<div class="o-crumb__title">Change Stories</div>
						<div class="o-crumb__line"></div>
						<div class="o-crumb__circle"></div>
					</div>
					<h1><a href="<?php echo get_permalink();?>"><span><?php the_field('fancy_title'); ?></span></a></h1>
					<section class="u-clear">
						<div class="u-half">
							<p><?php the_field('summary'); ?></p>
						</div>
						<div class="u-half">
							<section class="u-pl-m">
								<?php echo renderButton(get_permalink(), 'Read '.get_the_title()."'s Story"); ?>
							</section>
						</div>
					</section>
				</section>
			</div>
		</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</section>
<?php } ?>
<?php 
	$programPartners = new WP_Query(array(
		'post_type'=>'partner',
		'posts_per_page'=>-1,
		'post__in'=>get_field('partners')
	));
	if ($programPartners->have_posts()): ?>
	<section class="o-section u-pb-l">
		<div class="o-box">
			<div class="o-crumb">
				<div class="o-crumb__title">Program Partners</div>
				<div class="o-crumb__line"></div>
				<div class="o-crumb__circle"></div>
			</div>
			<ul class="o-partners">
				<?php
					while ($programPartners->have_posts()): $programPartners->the_post();
				?>
					<li><a href="#"><figure></figure></a></li>
				<?php endwhile; ?>
			</ul>
			<div class="c-program__cta">
				<?php echo renderButton('#','Change a Girls Life. Become a Parnter','div','s--multiline s--med') ?>
			</div>
		</div>
	</section>
<?php endif ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>