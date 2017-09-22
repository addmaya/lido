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
		<div class="o-tint"></div>
		<figure class="c-cover__image js-lazy" data-image-url="<?php the_field('photo'); ?>"></figure>
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
				<div class="u-half">
					<div class="o-crumb">
						<div class="o-crumb__title">Background</div>
						<div class="o-crumb__line"></div>
						<div class="o-crumb__circle"></div>
					</div>
					<section class="o-story s--background">
						<?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', $programBackground); ?>
					</section>
				</div>
				<div class="u-half">
					<section class="u-pl-l">
						<div class="c-program__map">
							
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
								<span>398</span>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>

<?php  if (have_rows('content')): ?>
	<?php while(have_rows('content')): the_row();?>
		
		<?php if(get_row_layout() == 'text_block'): 
			$textBlockContent = get_sub_field('content');
		?>
			<div class="o-story s--single">
				<div class="o-box">
					<?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', $textBlockContent); ?>
				</div>
			</div>		
		<?php endif; ?>
		
		<?php if(get_row_layout() == 'slider'): ?>
		<section class="o-slider">
			<div class="u-threefourth o-slider-col">
				<div class="o-slider__image">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php 
								$sliderImages = get_sub_field('images');
								foreach ($sliderImages as $slideImage) { ?>
									<div class="swiper-slide">
										<figure style="background-image:url('<?php echo $slideImage['url']; ?>')"></figure>
										<span><?php echo $slideImage['caption']; ?></span>
									</div>
							<?php } ?>
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
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
		
<?php if($programStories->have_posts()){?>
<section class="o-section" id="program-stories">
	<div class="o-box">
		<?php while($programStories->have_posts()):$programStories->the_post(); ?>
		<div class="u-clear">
			<div class="u-third">
				<a href="<?php echo get_permalink(); ?>" class="o-rhombus-button s--patterned" style="top:0">
					<div class="o-rhombus s--large">
						<figure class="o-rhombus__image js-lazy" data-image-url="<?php echo get_field('photo'); ?>"></figure>
					</div>
					<div class="o-rhombus__pattern"></div>
				</a>
			</div>
			<div class="u-twothird">
				<section class="u-pl-l">
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
<?php  if (have_rows('content')): ?>
	<?php while(have_rows('content')): the_row();?>
		<?php if(get_row_layout() == 'quote'): ?>
		<section class="o-splash">
			<?php
				$quote = get_sub_field('quote');
				$quotePhoto = get_sub_field('photo');
				$quoteAuthorName = get_sub_field('author_name');
				$quoteAuthorTitle = get_sub_field('author_title');
				$quoteStaff = get_sub_field('staff')[0];
			?>
			<figure class="o-splash__figure js-lazy o-image" data-image-url="<?php echo $quotePhoto; ?>">
				<span class="o-image__cover"></span>
				<div class="o-splash__tint"></div>
				<section class="o-splash__content">
					<div class="o-box">
						<blockquote>
							<p><?php echo $quote; ?></p>
							<span class="o-line"></span>
						</blockquote>
						
						<?php if(get_sub_field('quote_by_staff')){?>
							<div class="o-author">
								<?php
									$staff = new WP_Query(array('post_type'=>'team', 'p'=>$quoteStaff));
									while ( $staff->have_posts() ) : $staff->the_post();
										$staffPhoto = get_field('photo');
										$staffTitle = get_field('job_title');
										$staffName = get_the_title();
								?>
								<figure class="js-lazy" data-image-url="<?php echo $staffPhoto; ?>"></figure>
								<section>
									<strong><?php echo $staffName; ?></strong>
									<em><?php echo $staffTitle; ?>, SFEA</em>
								</section>

								<?php endwhile; wp_reset_postdata(); ?>
							</div>

						<?php } else {?>
							<div class="o-author">
								<section>
									<strong><?php echo $quoteAuthorName; ?></strong>
									<em><?php echo $quoteAuthorTitle; ?></em>
								</section>
							</div>
						<?php } ?>
					</div>
				</section>
			</figure>
		</section>
		<?php endif; ?>

		<?php if(get_row_layout() == 'statistic'):
			$statTitle = get_sub_field('title');
			$statBrief = get_sub_field('description');
			$statFigures = get_sub_field('statistics');
		?>
			<section class="o-section">
				<div class="o-box">
					<div class="u-clear u-pt-xl">
						<?php 
							foreach( $statFigures as $stat ){
								$statNumber = $stat['number'];
								$statSummary = $stat['description'];
								$statUnit = $stat['unit'];
								$statPhoto = $stat['photo'];
						 ?>
						 <div class="o-statistic u-fourth s--figure">
						 	<section>
						 		<span><?php echo $statNumber; ?><i class="u-superscript"><?php echo $statUnit; ?></i></span>
						 		<p><?php echo $statSummary; ?></p>
						 	</section>
						 </div>
						 <?php } ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if(get_row_layout() == 'embed'):
			$vidTitle = get_sub_field('title');
			$vidBrief = get_sub_field('description');
			$vidLink = get_sub_field('embed');
		?>
			<section class="o-section">
				<div class="o-box">
					<section class="o-splash s--video">
						<figure class="o-splash__figure">
							<div class="o-splash__tint"></div>
							<section class="o-splash__content">
								<div class="o-box">
									<span class="o-line"></span>
									<h2>Video: <?php echo $vidTitle; ?></h2>
									<a href="#">Play Video</a>
									<p>
										<em><?php echo $vidBrief; ?></em>
									</p>
								</div>
							</section>
						</figure>
					</section>
				</div>
			</section>
		<?php endif; ?>

		<?php if(get_row_layout() == 'document'):
			$docsTitle = get_sub_field('title');
			$docsBrief = get_sub_field('description');
			$docs = get_sub_field('documents');
		?>
			<section class="o-section">
				<div class="o-box">
					<div class="u-clear">
						<?php foreach ($docs as $doc) {?>
							<a href="<?php echo $doc['file']; ?>" target="_blank" class="o-statistic u-third s--doc">
								<div class="u-clear">
									<div class="u-half">
										<i class="o-icon"></i>
										<span><?php echo $doc['label']; ?></span>
									</div>
									<div class="u-half">
										<figure></figure>
									</div>
								</div>
							</a>
						<?php } ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>

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
					while ($programPartners->have_posts()): $programPartners->the_post();
						$partnerLogo = get_field('logo');
						$partnerName = get_the_title();
				?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<?php if ($partnerLogo){ ?>
								<figure class="js-lazy" data-image-url="<?php echo $partnerLogo; ?>"></figure>
							<?php } else {?>
								<span><?php echo $partnerName; ?></span>
							<?php } ?>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
			<div class="c-program__cta">
				<a href="#" class="o-button s--multiline s--med">
					<i class="o-icon"><strong>+</strong></i>
					<span>Become a Partner</span>
				</a>
			</div>
		</div>
	</section>
<?php endif ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>