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
					</div>
				</div>
			</div>
			<div class="u-fourth o-slider-col">
				<div class="o-slider__caption">
					<div class="o-slider__buttons t-dark">
						<?php echo renderButton('#','','div','s--prev') ?>
						<?php echo renderButton('#','','div','s--next') ?>
					</div>
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
<section class="o-section" id="program-stories">
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

<?php  if (have_rows('content')): ?>
	<?php while(have_rows('content')): the_row();?>
		<?php if(get_row_layout() == 'quote'): ?>
		<section class="o-splash">
			<?php
				$quote = get_sub_field('quote');
				$quotePhoto = get_sub_field('photo');
				$quoteAuthorName = get_sub_field('author_name');
				$quoteAuthorTitle = get_sub_field('author_title');
				$quoteStaffID = get_sub_field('staff')[0];
			?>
			<figure class="o-splash__figure js-bkg o-image" data-image-url="<?php echo $quotePhoto; ?>">
				<span class="o-image__cover"></span>
				<div class="o-splash__tint"></div>
				<section class="o-splash__content" data-aos="fade-up">
					<div class="o-box">
						<blockquote>
							<p><?php echo $quote; ?></p>
							<span class="o-line"></span>
						</blockquote>
						
						<?php if(get_sub_field('quote_by_staff')){?>
							<div class="o-author">
								<?php
									$staff = new WP_Query(array('post_type'=>'team', 'p'=>$quoteStaffID));
									while ( $staff->have_posts() ) : $staff->the_post();
										$staffPhoto = get_field('photo', get_the_ID());
										$staffTitle = get_field('job_title', get_the_ID());
										$staffName = get_the_title();
								?>
								<figure class="js-bkg" data-image-url="<?php echo $staffPhoto; ?>"></figure>
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
			<section class="o-section c-stats">
				<div class="o-box">
					<div class="u-clear u-pt-xl">
						<div class="o-stat__box">
							<?php 
								$aosDelay = 0;
								foreach( $statFigures as $stat ){
									$statNumber = $stat['number'];
									$statSummary = $stat['description'];
									$statUnit = $stat['unit'];
									$statPhoto = $stat['photo'];

									$aosDelay = $aosDelay + 100;
							 ?>

							 <div class="o-stat" data-aos="fade-right" data-aos-delay="<?php echo $aosDelay; ?>">
							 	<div class="o-table">
							 		<div class="o-table__cell">
							 			<section>
							 				<span><?php echo $statNumber; ?></span>
							 				<p><?php echo $statSummary; ?></p>
							 			</section>
							 		</div>
							 	</div>
							 	<div class="o-rhombus__pattern"></div>
							 </div>

							 <?php } ?>
						</div>
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