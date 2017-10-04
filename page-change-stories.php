<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="c-cover t-dark">
	<div class="u-half">
		<figure class="c-cover__image js-bkg o-image" data-image-url="<?php the_field('photo'); ?>">
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
						<?php echo renderButton('#stats', 'Impact Statistics','anchor', 's--block s--vertical'); ?>
						<?php echo renderButton('#stories', 'Change Stories','anchor', 's--block s--vertical'); ?>					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<section class="o-section c-statistics s--bottom__med" id="stats">
	<div class="o-box">
		<div class="o-crumb">
			<div class="o-crumb__title">Impact Statistics</div>
			<div class="o-crumb__line"></div>
			<div class="o-crumb__circle"></div>
		</div>
		<section class="c-history" >
			<span>Since</span>
			<header data-aos="fade-up">
				<?php 
					$history = get_field('history');
					$historyByline =$history['byline'];
					$historySummary =$history['summary'];
					$historyPhoto =$history['photo'];
				 ?>
				<h1>1976</h1>
				<span><?php echo $historyByline; ?></span>
				<figure class="js-bkg" data-image-url="<?php echo $historyPhoto; ?>" data-aos="fade-up" data-aos-delay="200"></figure>
			</header>
			<p data-aos="fade-up"><?php echo $historySummary; ?></p>
		</section>
		<div class="u-clear u-pt-l">
			<div class="o-stat__box">
				<?php 
					$statistics = get_field('statistics', 22);
					$aosDelay = 0;
					foreach( $statistics as $stat ){
						$statisticNumber = $stat['number'];
						$statisticSummary = $stat['summary'];
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
				 <?php $aosDelay = $aosDelay + 50; } ?>
			</div>
		</div>
	</div>
</section>
<section class="o-section s--bottom__med s--cover" id="stories">
	<figure class="o-section__cover" data-aos="fade-up"></figure>
	<div class="o-box">
		<div class="o-crumb">
			<div class="o-crumb__title">Change Stories</div>
			<div class="o-crumb__line"></div>
			<div class="o-crumb__circle"></div>
		</div>
		<div class="o-article__grid s--updates" id="storiesGrid">
			<?php
				$featureStories = new WP_Query(array(
					'post_type'=>'story',
					'posts_per_page'=>4
					)
				);

				$articleCount = 0;
				$articleClass = '';
				$aosDelay = 0;

				$postCount = $featureStories->post_count;
				$postBalance = wp_count_posts('story')->publish - $postCount;

				while ($featureStories->have_posts()) {

					$featureStories->the_post();
					$storyTitle = get_the_title();
					$storyLink = get_permalink();
					$storyBeneficiary = get_field('beneficiary');
					$storyPhoto = get_field('photo');
					$storyArea = get_field('area');
					$storyPrograms = get_field('program');

					$articleClass = getArticleClass($articleCount);

					if($articleCount > 3){
						$articleCount = 0;
					}

					echo renderArticle($articleClass, $articleCount, $aosDelay, $storyPhoto, $storyLink, $storyBeneficiary, $storyPrograms, $storyArea);

					$articleCount++;
					$aosDelay = $aosDelay + 10;
				} 
					wp_reset_postdata();
			?>
		</div>
		
		<?php if (!$postBalance <= 0): ?>
			<div class="u-center">
				<a href="#" class="o-button s--multiline s--med js-fetch-posts" data-post="story">
					<i class="o-icon"><strong><?php echo $postBalance; ?></strong></i>
					<span>More Change Stories</span>
				</a>
			</div>
		<?php endif ?>

	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>