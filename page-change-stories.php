<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="c-cover t-dark">
	<div class="u-half">
		<figure class="c-cover__image js-lazy o-image" data-image-url="<?php the_field('photo'); ?>">
			<span class="o-image__cover"></span>
		</figure>
	</div>
	<div class="u-half c-cover__profile">
		<div class="o-table">
			<div class="o-table__cell">
				<section class="c-cover__section">
					<h1><?php the_field('title'); ?></h1>
					<p><?php the_field('description'); ?></p>
					<div class="u-pt-l">
						<?php echo renderButton('#education', 'Impact Statistics','anchor', 's--block s--vertical'); ?>
						<?php echo renderButton('#livelihood', 'Change Stories','anchor', 's--block s--vertical'); ?>					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<section class="o-section c-statistics s--bottom__med">
	<div class="o-box">
		<div class="o-crumb">
			<div class="o-crumb__title">Impact Statistics</div>
			<div class="o-crumb__line"></div>
			<div class="o-crumb__circle"></div>
		</div>
		<section class="c-history">
			<span>Since</span>
			<header>
				<?php 
					$history = get_field('history');
					$historyByline =$history['byline'];
					$historySummary =$history['summary'];
					$historyPhoto =$history['photo'];
				 ?>
				<h1>1976</h1>
				<span><?php echo $historyByline; ?></span>
				<figure class="js-lazy" data-image-url="<?php echo $historyPhoto; ?>"></figure>
			</header>
			<p><?php echo $historySummary; ?></p>
		</section>
		<div class="u-clear u-pt-xl">
			<?php 
				$statistics = get_field('statistics', 22);
				foreach( $statistics as $stat ){
					$statisticNumber = $stat['number'];
					$statisticSummary = $stat['summary'];
			 ?>
			 <div class="o-statistic u-fourth s--figure">
			 	<section>
			 		<span><?php echo $statisticNumber; ?></span>
			 		<p><?php echo $statisticSummary; ?></p>
			 	</section>
			 </div>
			 <?php } ?>
		</div>
	</div>
</section>
<section class="o-section s--bottom__med" id="stories">
	<div class="o-box">
		<div class="o-crumb">
			<div class="o-crumb__title">Change Stories</div>
			<div class="o-crumb__line"></div>
			<div class="o-crumb__circle"></div>
		</div>
		<div class="o-article__grid s--updates">
			<?php
				$featureStories = new WP_Query(array(
					'post_type'=>'story',
					'posts_per_page'=>-1
					)
				);

				$rowCount = 0;
				$articleCount = 0;
				$articleClass = '';

				while ($featureStories->have_posts()) : $featureStories->the_post();
					$storyTitle = get_the_title();
					$storyLink = get_permalink();
					$storyBeneficiary = get_field('beneficiary');
					$storyPhoto = get_field('photo');
					$storyArea = get_field('area');
					$storyPrograms = get_field('program');
				if ($rowCount > 1) {
					$rowCount = 0;
				}
				switch ($articleCount) {
					case 1:
						$articleClass = 's--bottom-left';
						break;
					case 2:
						$articleClass = 's--bottom-right';
						break;
					case 3:
						$articleClass = 's--right';
						break;
					default:
						$articleClass = 's--left';
						break;
				}
			?>
				<article class="o-article <?php echo $articleClass; ?>">
					<section class="u-clear">
						<figure>
							<a href="<?php echo $storyLink; ?>" class="js-lazy o-image" data-image-url="<?php echo $storyPhoto; ?>">
								<span class="o-image__cover"></span>
							</a>
						</figure>
						<section class="o-article__summary">
							<h2><a href="<?php echo $storyLink; ?>"><span><?php echo $storyBeneficiary; ?></span></a></h2>
							<ul class="o-article__meta">
								
								<?php
									if ($storyPrograms):
								?>
									<li><a href="<?php echo get_permalink($storyPrograms[0]); ?>">/ <?php echo get_the_title($storyPrograms[0]); ?></a></li>
								<?php endif; ?>
								<?php if ($storyArea): ?>
									<li><a href="#">/ <?php echo $storyArea; ?></a></li>
								<?php endif ?>
								<li><a href="#">/ <?php echo get_the_date(); ?></a></li>
							</ul>
							<div class="t-dark"><?php echo renderButton('#', 'Read Story'); ?></div>
						</section>
					</section>
				</article>
			<?php $rowCount++; $articleCount++; endwhile; wp_reset_postdata(); ?>
		</div>
		<div class="u-center">
			<a href="#" class="o-button s--multiline s--med">
				<i class="o-icon"><strong>15</strong></i>
				<span>More Change Stories</span>
			</a>
		</div>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>