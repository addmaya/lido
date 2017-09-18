<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="c-cover t-dark">
	<div class="u-half">
		<figure class="c-cover__image"></figure>
	</div>
	<div class="u-half c-cover__profile">
		<div class="o-table">
			<div class="o-table__cell">
				<section class="c-cover__section">
					<h1><?php the_field('title'); ?></h1>
					<p><?php the_field('summary'); ?></p>
					<div class="u-pt-l">
						<?php echo renderCircularButton('#', 'Impact Statistics', get_stylesheet_directory_uri().'/images/dummy.jpg'); ?>
						<?php echo renderCircularButton('#', 'Change Stories', get_stylesheet_directory_uri().'/images/dummy.jpg'); ?>
					</div>
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
				<h1>1976</h1>
				<span>SFEA has touched millions of lives in East African.</span>
				<figure></figure>
			</header>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie eleifend augue, quis vestibulum enim convallis nec. Sed gravida convallis ultricies. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie eleifend augu.</p>
		</section>
		<div class="u-clear u-pt-xl">
			<?php 
				$statistics = get_field('statistics', 22);
				$statisticsList = array_rand( $statistics, 4);
				foreach( $statisticsList as $statistic ){
					$statisticNumber = $statistics[$statistic]['number'];
					$statisticSummary = $statistics[$statistic]['summary'];
					$statisticUnit = $statistics[$statistic]['unit'];
					$statisticPhoto = $statistics[$statistic]['photo'];
			 ?>
			 <div class="o-statistic u-third">
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
	</div>
</section>
<section class="o-section s--bottom__med" style="background-color: #F7F7F7">
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
					$storyAuthor = get_the_title();
					$storyLink = get_permalink();
					$storyTitle = get_field('fancy_title');
					$storyPhoto = get_field('photo');
					$storyArea = get_field('area');
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
							<h2><a href="<?php echo $storyLink; ?>"><span><?php echo $storyAuthor; ?></span></a></h2>
							<ul class="o-article__meta">
								<li><a href="#">/ Bong Girls Empowerment Program</a></li>
								<li><a href="#">/ <?php echo $storyArea; ?></a></li>
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