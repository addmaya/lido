<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section class="c-splash t-dark">
	<?php
		$slides = get_field('slides');
		$featuredSlide = $slides[array_rand($slides)];

		$slideTitle = $featuredSlide['title'];
		$slideBtnLabel = $featuredSlide['button_label'];
		$slideBtnLink = $featuredSlide['button_link'];
		$slidePhoto = $featuredSlide['photo'];
		$slideVideo = $featuredSlide['video'];
		$slideCaption = $featuredSlide['caption'];
	?>
	<div class="o-table c-splash__story">
		<div class="o-table__cell">
			<div class="o-box">
				<div class="u-half">
					<h1><a href="#"><span><?php echo $slideTitle; ?></span></a></h1>
					<?php echo renderButton($slideBtnLink, $slideBtnLabel); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="c-splash__image">
		<div class="c-splash__tint"></div>
		<figure data-image-url="<?php echo $slidePhoto; ?>" class="o-image"><!-- <span class="o-image__cover"></span> --></figure>
	</div>
</section>
<section class="c-highlights t-dark">
	<div class="o-div s--left"></div>
	<div class="o-div s--right"></div>
	<div class="o-table">
		<div class="o-table__cell">
			<div class="o-box">
				<div class="u-clear">
				
					<?php
						$blockHighlights = get_field('highlights');
						$blockFeatures = $blockHighlights['feature'];

						foreach ($blockFeatures as $feature) {
							$featureTitle = $feature['title'];
							$featureSubtitle = $feature['subtitle'];
							$featureLink = $feature['button_link'];
							$featureLabel = $feature['button_label'];
							$featurePhoto = $feature['photo']['sizes']['medium'];
					?>
						<div class="u-half">
							<div class="u-wrap u-clear">
								<section>
									<h2><a href="<?php echo $featureLink; ?>"><span><?php echo $featureTitle; ?></span></a></h2>
									<!-- <span class="o-byline"><?php echo $featureSubtitle; ?></span> -->
									<?php echo renderButton($featureLink, $featureLabel); ?>
								</section>
								<a href="<?php echo $featureLink; ?>"class="o-rhombus s--small">
									<figure class="o-rhombus__image js-bkg" data-image-url="<?php echo $featurePhoto; ?>"><span></span></figure>
								</a>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="o-section c-eastafrica s--cover">
	<figure class="o-section__cover" data-aos="fade-up"></figure>
	<div class="o-box">
		<div class="u-half s--right">
			<?php
				$blockCause = get_field('why_east_africa');
				$blockCauseTitle =$blockCause['title'];
				$blockCauseSummary =$blockCause['summary'];
				$blockCauseImage =$blockCause['image'];
				$blockCauseStaff = $blockCause['featured_staff'][0];
			?>
			<section data-aos="fade-up">
				<div class="o-crumb">
					<div class="o-crumb__title">Why East Africa</div>
					<div class="o-crumb__line"></div>
					<div class="o-crumb__circle"></div>
				</div>
				<h1><a href="<?php echo home_url(); ?>/about"><span><?php echo $blockCauseTitle; ?></span></a></h1>
				<section class="u-clear">
					<div class="u-half">
						<p><?php echo $blockCauseSummary; ?></p>
					</div>
					<div class="u-half">
				
						<div class="o-author">
							<?php
								$causeStaff = new WP_Query(array('posts_per_page'=>1,'post_type'=>'team', 'p'=>$blockCauseStaff));
								while ( $causeStaff->have_posts() ) : $causeStaff->the_post();
									$causeStaffPhoto = get_field('photo');
									$causeStaffTitle = get_field('job_title');
									$causeStaffName = get_the_title();
							?>
							<figure class="js-bkg" data-image-url="<?php echo $causeStaffPhoto; ?>"></figure>
							<section>
								<strong><?php echo $causeStaffName; ?></strong>
								<em><?php echo $causeStaffTitle; ?>, SFEA</em>
							</section>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
				
					</div>
				</section>
				<div class="u-pt-l">
					<?php echo renderButton(home_url().'/about', 'See our Response'); ?>
				</div>
			</section>
		</div>
	</div>
</section>
<section class="o-section" id="how-work">
	<div class="o-box">
		<div class="u-half">
			<?php
				$blockPrograms = get_field('how_we_work');
				$blockProgramsTitle =$blockPrograms['title'];
				$blockProgramsSummary =$blockPrograms['summary'];
				$blockProgramsImage =$blockPrograms['image']['sizes']['large'];
				$educationPhoto = $blockPrograms['education_photo']['sizes']['medium'];
				$livelihoodPhoto = $blockPrograms['livelihoods_photo']['sizes']['medium'];
				$blockProgramsStaff = $blockPrograms['featured_staff'][0];
			?>
			<section data-aos="fade-up">
				<div class="o-crumb">
					<div class="o-crumb__title">How we work</div>
					<div class="o-crumb__line"></div>
					<div class="o-crumb__circle"></div>
				</div>
				<h1><a href="<?php echo home_url(); ?>/programs"><span><?php echo $blockProgramsTitle; ?></span></a></h1>
				<section class="u-clear">
					<div class="u-half">
						<p><?php echo $blockProgramsSummary; ?></p>
					</div>
					<div class="u-half">
						
						<div class="o-author">
							<?php
								$programsStaff = new WP_Query(array('post_type'=>'team', 'p'=>$blockProgramsStaff));
								while ( $programsStaff->have_posts() ) : $programsStaff->the_post();
									$programsStaffPhoto = get_field('photo');
									$programsStaffTitle = get_field('job_title');
									$programsStaffName = get_the_title();
							?>
							<figure class="js-bkg" data-image-url="<?php echo $programsStaffPhoto; ?>"></figure>
							<section>
								<strong><?php echo $programsStaffName; ?></strong>
								<em><?php echo $programsStaffTitle; ?>, SFEA</em>
							</section>
				
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
				
					</div>
				</section>
				<div class="u-pt-l">
					<?php echo renderCircularButton(home_url().'/programs#education','Education Programs', $educationPhoto); ?>
					<?php echo renderCircularButton(home_url().'/programs#livelihood','Livelihood Programs', $livelihoodPhoto); ?>
				</div>
			</section>
		</div>
		<div class="u-half" data-aos="fade-right">
			<a href="<?php echo home_url().'/programs'; ?>" class="o-rhombus-button s--patterned" >
				<div class="o-rhombus s--xlarge">
					<figure class="o-rhombus__image js-bkg" data-image-url="<?php echo $blockProgramsImage; ?>"></figure>
				</div>
				<div class="o-rhombus__pattern"></div>
			</a>
		</div>
	</div>
</section>
<section class="o-splash">
	<?php
		$blockQuote = get_field('featured_quote');
		$blockQuoteTitle = $blockQuote['quote'];
		$blockQuotePhoto = $blockQuote['image'];

		$blockQuoteAuthor = $blockQuote['staff'][0];
		$featuredAuthorName = $blockQuote['author']['name'];
		$featuredAuthorTitle = $blockQuote['author']['title'];
	?>
	<figure class="o-splash__figure js-bkg o-image" data-image-url="<?php echo $blockQuotePhoto; ?>">
		<span class="o-image__cover"></span>
		<div class="o-splash__tint"></div>
		<section class="o-splash__content" data-aos="fade-up">
			<div class="o-box">
				<blockquote>
					<p><?php echo $blockQuoteTitle; ?></p>
					<span class="o-line"></span>
				</blockquote>
				<?php if(!get_field('quote_author')){?>
					<div class="o-author">
						<?php
							$staff = new WP_Query(array('post_type'=>'team', 'p'=>$blockQuoteAuthor));
							while ( $staff->have_posts() ) : $staff->the_post();
								$staffPhoto = get_field('photo');
								$staffTitle = get_field('job_title');
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
						<figure></figure>
						<section>
							<strong><?php echo $featuredAuthorName; ?></strong>
							<em><?php echo $featuredAuthorTitle; ?></em>
						</section>
					</div>
				<?php } ?>
			</div>
		</section>
	</figure>
</section>
<section class="o-section u-pb-0 c-impact">
	<div class="o-box">
		<?php
			$blockImpact = get_field('impact');
			$blockImpactTitle =$blockImpact['title'];
			$blockImpactSummary =$blockImpact['summary'];
			$blockImpactPhoto = $blockImpact['photo']['sizes']['medium'];
		?>
		<h1 class="u-pb-m" data-aos="fade-up"><a href="<?php echo home_url(); ?>/change-stories"><span><?php echo $blockImpactTitle; ?></span></a></h1>
		
		<div class="u-clear">
			<div class="o-stat__box">
			<?php 
				$statistics = get_field('statistics', 22);
				$statisticsList = array_rand( $statistics, 4);
				$aosDelay = 0;
				foreach( $statisticsList as $statistic ){
					$aosDelay = $aosDelay + 100;
					$statisticNumber = $statistics[$statistic]['number'];
					$statisticSummary = $statistics[$statistic]['summary'];
			 ?>
				 <div class="o-stat" data-aos="fade-right" data-aos-delay="<?php echo $aosDelay; ?>">
				 	<div class="o-table">
				 		<div class="o-table__cell">
				 			<section>
				 				<span><?php echo $statisticNumber; ?></span>
				 				<p><?php echo $statisticSummary; ?></p>
				 			</section>
				 		</div>
				 	</div>
				 	<div class="o-rhombus__pattern"></div>
				 </div>
			 <?php } ?>
			 </div>
		</div>
		<section class="c-impact__summary u-pt-l" data-aos="fade-up">
			<p><?php echo $blockImpactSummary; ?></p>
			<div class="u-pt-m">
				<?php echo renderCircularButton(home_url().'/change-stories','Read the Change Stories', $blockImpactPhoto); ?>
			</div>
		</section>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>