<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section class="c-splash t-dark">
	<div class="swiper-container" id="c-splash__swiper">
		<div class="swiper-wrapper">
			<?php while( have_rows('slides') ): the_row();
				$slideTitle = get_sub_field('title');
				$slideBtnLabel = get_sub_field('button_label');
				$slideBtnLink = get_sub_field('button_link');
				$slidePhoto = get_sub_field('photo');
				$slideVideo = get_sub_field('video');
			?>
			
			<div class="swiper-slide">
				<div class="o-table">
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
					<div class="o-tint"></div>
					<figure data-image-url="<?php echo $slidePhoto; ?>" class="o-image js-lazy"><span class="o-image__cover"></span></figure>
				</div>
			</div>
			
			<?php endwhile; ?>
		</div>
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
						$args = array('post_type'=>'story', 'posts_per_page'=>2);
						$featureStories = new WP_Query($args);

						while ( $featureStories->have_posts() ) : $featureStories->the_post();
							$storyAuthor = get_the_title();
							$storyLink = get_permalink();
							$storyTitle = get_field('fancy_title');
							$storyPhoto = get_field('photo');
							$storyArea = get_field('area');
					?>

						<div class="u-half">
							<section>
								<h2><a href="<?php echo $storyLink; ?>"><span><?php echo $storyTitle; ?></span></a></h2>
								<span class="o-byline"><?php echo $storyArea; ?></span>
								<?php echo renderButton($storyLink, 'Read '.$storyAuthor."'s Story"); ?>
							</section>
							<a href="#" class="o-rhombus s--small">
								<figure class="o-rhombus__image js-lazy" data-image-url="<?php echo $storyPhoto; ?>"><span></span></figure>
							</a>
						</div>

					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="o-section" style="background-color: #E2E2E2">
	<div class="o-box">
		<div class="u-half s--right">
			<?php
				$groupCause = get_field('why_east_africa');
				$groupCauseTitle =$groupCause['title'];
				$groupCauseSummary =$groupCause['summary'];
				$groupCauseImage =$groupCause['image'];
				$groupCauseStaff = $groupCause['featured_staff'];
			?>
			<div class="o-crumb">
				<div class="o-crumb__title">Why East Africa</div>
				<div class="o-crumb__line"></div>
				<div class="o-crumb__circle"></div>
			</div>
			<h1><a href="<?php echo home_url(); ?>/about"><span><?php echo $groupCauseTitle; ?></span></a></h1>
			<section class="u-clear">
				<div class="u-half">
					<p><?php echo $groupCauseSummary; ?></p>
				</div>
				<div class="u-half">

					<div class="o-author">
						<?php
							$causeStaff = new WP_Query(array('post_type'=>'team', 'p'=>$groupCauseStaff));
							while ( $causeStaff->have_posts() ) : $causeStaff->the_post();
								$causeStaffPhoto = get_field('photo');
								$causeStaffTitle = get_field('job_title');
								$causeStaffName = get_the_title();
						?>
						<figure class="js-lazy" data-image-url="<?php echo $causeStaffPhoto; ?>"></figure>
						<section>
							<strong><?php echo $causeStaffName; ?></strong>
							<em><?php echo $causeStaffTitle; ?>, SFEA</em>
						</section>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>

				</div>
			</section>
			<div class="u-pt-l">
				<?php echo renderButton(home_url().'/about', 'Read about SFEA'); ?>
			</div>
		</div>
	</div>
</section>
<section class="o-section">
	<div class="o-box">
		<div class="u-twothird">
			<?php
				$groupPrograms = get_field('how_we_work');
				$groupProgramsTitle =$groupPrograms['title'];
				$groupProgramsSummary =$groupPrograms['summary'];
				$groupProgramsImage =$groupPrograms['image'];
				$educationPhoto = $groupPrograms['education_photo'];
				$livelihoodPhoto = $groupPrograms['livelihoods_photo'];
				$capacityPhoto = $groupPrograms['capacity_photo'];
				$groupProgramsStaff = $groupPrograms['featured_staff'];
			?>
			<div class="o-crumb">
				<div class="o-crumb__title">How we work</div>
				<div class="o-crumb__line"></div>
				<div class="o-crumb__circle"></div>
			</div>
			<h1><a href="<?php echo home_url(); ?>/programs"><span><?php echo $groupProgramsTitle; ?></span></a></h1>
			<section class="u-clear">
				<div class="u-half">
					<p><?php echo $groupProgramsSummary; ?></p>
				</div>
				<div class="u-half">
					
					<div class="o-author">
						<?php
							$programsStaff = new WP_Query(array('post_type'=>'team', 'p'=>$groupProgramsStaff));
							while ( $programsStaff->have_posts() ) : $programsStaff->the_post();
								$programsStaffPhoto = get_field('photo');
								$programsStaffTitle = get_field('job_title');
								$programsStaffName = get_the_title();
						?>
						<figure class="js-lazy" data-image-url="<?php echo $programsStaffPhoto; ?>"></figure>
						<section>
							<strong><?php echo $programsStaffName; ?></strong>
							<em><?php echo $programsStaffTitle; ?>, SFEA</em>
						</section>

						<?php endwhile; wp_reset_postdata(); ?>
					</div>

				</div>
			</section>
			<div class="u-pt-xl">
				<a href="<?php echo home_url(); ?>/programs#education" class="o-button s--circular">
					<section><figure class="js-lazy" data-image-url="<?php echo $educationPhoto; ?>"></figure></section>
					<?php echo renderButton('','Education Programs', 'div'); ?>
				</a>
				<a href="<?php echo home_url(); ?>/programs#livelihood" class="o-button s--circular">
					<section><figure class="js-lazy" data-image-url="<?php echo $livelihoodPhoto; ?>"></figure></section>
					<?php echo renderButton('','Livelihood Programs', 'div'); ?>
				</a>
				<a href="<?php echo home_url(); ?>/programs#capacity-building" class="o-button s--circular">
					<section><figure class="js-lazy" data-image-url="<?php echo $capacityPhoto; ?>"></figure></section>
					<?php echo renderButton('','Capacity Building Programs', 'div'); ?>
				</a>
			</div>
		</div>
		<div class="u-third">
			<figure data-image-url="<?php echo $groupProgramsImage; ?>"></figure>
		</div>
	</div>
</section>
<section class="o-splash">
	<?php
		$featuredQuote = get_field('featured_quote');
		$featuredQuoteTitle = $featuredQuote['quote'];
		$featuredQuotePhoto = $featuredQuote['image'];

		$featuredQuoteAuthor = $featuredQuote['staff'];
		$featuredAuthorName = $featuredQuote['author']['name'];
		$featuredAuthorTitle = $featuredQuote['author']['title'];
	?>
	<figure class="o-splash__figure js-lazy o-image" data-image-url="<?php echo $featuredQuotePhoto; ?>">
		<span class="o-image__cover"></span>
		<div class="o-splash__tint"></div>
		<section class="o-splash__content">
			<div class="o-box">
				
				<blockquote>
					<p><?php echo $featuredQuoteTitle; ?></p>
					<span class="o-line"></span>
				</blockquote>
				<?php if(!get_field('quote_author')){?>
					<div class="o-author">
						<?php
							$featureQuoteStaff = new WP_Query(array('post_type'=>'team', 'p'=>$featuredQuoteAuthor));
							while ( $featureQuoteStaff->have_posts() ) : $featureQuoteStaff->the_post();
								$featureQuoteStaffPhoto = get_field('photo');
								$featureQuoteStaffTitle = get_field('job_title');
								$featureQuoteStaffName = get_the_title();
						?>
						<figure class="js-lazy" data-image-url="<?php echo $featureQuoteStaffPhoto; ?>"></figure>
						<section>
							<strong><?php echo $featureQuoteStaffName; ?></strong>
							<em><?php echo $featureQuoteStaffTitle; ?>, SFEA</em>
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
<section class="o-section u-pb-l">
	<div class="o-box">
		<div class="u-clear">
			<div class="u-twothird">
				<?php 
					$statistics = get_field('statistics', 22);
					$statisticsList = array_rand( $statistics, 4);
					foreach( $statisticsList as $statistic ){
						$statisticNumber = $statistics[$statistic]['number'];
						$statisticSummary = $statistics[$statistic]['summary'];
						$statisticUnit = $statistics[$statistic]['unit'];
						$statisticPhoto = $statistics[$statistic]['photo'];
				 ?>
				<div class="o-statistic u-half">
					<div class="u-clear">
						<div class="u-half">
							<span><?php echo number_format($statisticNumber); ?><i class="u-superscript"><?php echo $statisticUnit; ?></i></span>
							<p><?php echo $statisticSummary; ?></p>
						</div>
						<div class="u-half">
							<figure class="js-lazy" data-image-url="<?php echo $statisticPhoto; ?>"></figure>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="u-third">
				<section>
					<?php
						$groupImpact = get_field('impact');
						$groupImpactTitle =$groupImpact['title'];
						$groupImpactSummary =$groupImpact['summary'];
						$groupImpactStoriesPhoto = $groupImpact['stories_photo'];
						$groupImpactStatsPhoto = $groupImpact['stats_photo'];
					?>
					<div class="o-crumb">
						<div class="o-crumb__title">The Impact</div>
						<div class="o-crumb__line"></div>
						<div class="o-crumb__circle"></div>
					</div>
					<h1><a href="<?php echo home_url(); ?>/change-stories"><span><?php echo $groupImpactTitle; ?></span></a></h1>
					<p><?php echo $groupImpactSummary; ?></p>
					<div class="u-pt-l">
						<?php echo renderCircularButton(home_url().'/change-stories','Read the Change Stories', $groupImpactStoriesPhoto); ?>
						<?php echo renderCircularButton(home_url().'/change-stories', 'See the Numbers', $groupImpactStatsPhoto); ?>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>