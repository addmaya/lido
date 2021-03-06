<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section class="c-cover c-about t-dark s--bkg" id="profile">
	<figure class="c-cover__bkg"></figure>
	<div class="o-table">
		<div class="o-table__cell">
			<div class="o-box">
				<?php
					$sectionVision = get_field('vision_mission');
					$vision =$sectionVision['vision'];
					$mission =$sectionVision['summary'];
					$valuesImage = $sectionVision['core_values'];
					$areasImage = $sectionVision['where_we_work'];
					$impactImage = $sectionVision['impact_highlights'];
				?>
				<section class="c-about__vision">
					<h1><?php echo $vision; ?></h1>
					<p><?php echo $mission; ?></p>	
					<span class="o-line"></span>
				</section>
				<ul class="u-clear c-about__nav">
					<li class="u-third">
						<?php echo renderRhombusButton('#values', 'Core Values', $valuesImage); ?>
					</li>
					<li class="u-third">
						<?php echo renderRhombusButton('#areas', 'Where We Work', $areasImage); ?>
					</li>
					<li class="u-third">
						<?php echo renderRhombusButton('#impact', 'Impact Highlights', $impactImage); ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="o-section" id="values">
	<div class="o-box">
		<div class="o-crumb">
			<div class="o-crumb__title">Our Core Values</div>
			<div class="o-crumb__line"></div>
			<div class="o-crumb__circle"></div>
		</div>
		<div class="scene">
			<div class="c-orbit layer" data-depth="0.2">
				<div class="o-table">
					<div class="o-table__cell">
						<span class="c-orbit__sun"></span>
					</div>
				</div>
				<section class="c-values layer" data-depth="0.4">
					<?php 
						$valueCount = 0; 
						$valueClass = '';

						while( have_rows('values') ): the_row();
							$valueTitle = get_sub_field('title');
							$valueDescription = get_sub_field('description');
							$valueImage = get_sub_field('photo');

							switch ($valueCount) {
								case 0:
									$valueClass = 's--one';
									break;
								case 1:
									$valueClass = 's--two';
									break;
								case 2:
									$valueClass = 's--three';
									break;
								
								default:
									break;
							}
					?>
					<div class="o-value <?php echo $valueClass; ?>">
						<figure class="u-half">
							<span class="o-rhombus s--medium u-block js-bkg" data-image-url="<?php echo $valueImage; ?>"></span>
							<div class="o-rhombus__pattern"></div>
						</figure>
						<section class="u-half">
							<h3><?php echo $valueTitle; ?></h3>
							<p><?php echo $valueDescription; ?></p>
							<span class="o-line t-dark"></span>
						</section>
					</div>

					<?php $valueCount++; endwhile; ?>

				</section>
			</div>
		</div>
		<div class="u-pt-xl u-center">
			<?php
				$blockPrograms = get_field('how_we_work', 8);
				$educationPhoto = $blockPrograms['education_photo']['sizes']['medium'];
				$livelihoodPhoto = $blockPrograms['livelihoods_photo']['sizes']['medium'];
			?>

			<?php echo renderCircularButton(home_url().'/programs#education','Education Programs', $educationPhoto); ?>
			<?php echo renderCircularButton(home_url().'/programs#livelihood','Livelihood Programs', $livelihoodPhoto); ?>
		</div>
	</div>
</section>
<section class="o-splash">
	<?php
		$featuredQuote = get_field('featured_quote');
		$featuredQuoteTitle = $featuredQuote['quote'];
		$featuredQuotePhoto = $featuredQuote['image'];
	?>
	<figure class="o-splash__figure js-bkg o-image" data-image-url="<?php echo $featuredQuotePhoto; ?>">
		<span class="o-image__cover"></span>
		<div class="o-splash__tint"></div>
		<section class="o-splash__content" data-aos="fade-up">
			<div class="o-box">
				<blockquote>
					<p><?php echo $featuredQuoteTitle; ?></p>
					<span class="o-line"></span>
				</blockquote>
				<?php if(get_field('quote_author')){?>
					<div class="o-author">
						<?php
							$featuredQuoteAuthor = $featuredQuote['staff'];
							$featureQuoteStaff = new WP_Query(array('post_type'=>'team', 'p'=>$featuredQuoteAuthor));
							while ( $featureQuoteStaff->have_posts() ) : $featureQuoteStaff->the_post();
								$featureQuoteStaffPhoto = get_field('photo');
								$featureQuoteStaffTitle = get_field('job_title');
								$featureQuoteStaffName = get_the_title();
						?>
						<figure class="js-bkg" data-image-url="<?php echo $featureQuoteStaffPhoto; ?>"></figure>
						<section>
							<strong><?php echo $featureQuoteStaffName; ?></strong>
							<em><?php echo $featureQuoteStaffTitle; ?>, SFEA</em>
						</section>

						<?php endwhile; wp_reset_postdata(); ?>
					</div>

				<?php } else {

					$author = $featuredQuote['author']['name'];
					$authorTitle = $featuredQuote['author']['title'];
					$authorPhoto = $featuredQuote['author']['photo'];
					?>
					<div class="o-author">
						<figure class="js-bkg" data-image-url="<?php echo($authorPhoto['sizes']['medium']); ?>"></figure>
						<section>
							<strong><?php echo $author; ?></strong>
							<em><?php echo $authorTitle; ?></em>
						</section>
					</div>
				<?php } ?>
			</div>
		</section>
	</figure>
</section>
<section class="o-section c-regions" id="areas">
	<div class="o-box">
		<div class="u-half c-regions__col">
			<div class="o-crumb">
				<div class="o-crumb__title">Where we Work</div>
				<div class="o-crumb__line"></div>
				<div class="o-crumb__circle"></div>
			</div>
			<figure class="c-regions__map" data-aos="fade-right"></figure>
			<section data-aos="fade-up">
				<?php
					$sectionAreas = get_field('where_we_work');
					$sectionAreasTitle = $sectionAreas['title'];
					$sectionAreasSummary = $sectionAreas['summary'];
					$sectionAreasPhoto = $sectionAreas['photo'];
				?>
				<h1><?php echo $sectionAreasTitle; ?></h1>
				<p><?php echo $sectionAreasSummary; ?></p>
				<div class="u-pt-l">
					<?php echo renderCircularButton(home_url().'/partners', 'See our Partners', get_field('photo',10)); ?>
				</div>
			</section>
		</div>
		<div class="u-half c-regions__col">
			<div class="o-rhombus__pattern"></div>
			<figure data-aos="fade-up" data-aos-delay="100" class="c-regions__image js-bkg" data-image-url="<?php echo $sectionAreasPhoto; ?>"></figure>
		</div>
	</div>
</section>
<section class="o-slider" id="impact">
	<div class="u-threefourth o-slider-col">
		<div class="o-slider__image">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php 
						$photos = get_field('photo_highlights');
						foreach ($photos as $photo) { ?>
							<div class="swiper-slide">
								<figure class="js-bkg" data-image-url="<?php echo $photo['url']; ?>"></figure>
								<span><?php echo $photo['caption']; ?></span>
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
<section class="o-section c-team">
	<div class="o-box">
		<header>
			<h1>Our Team</h1>
			<p>Our team is not just a collection of people, it is a union of strength working together towards a common vision.</p>
		</header>
		<ul>
			<?php 
				$team = new WP_Query(array('post_type'=>'team', 'posts_per_page'=>-1, 'orderby'=>'menu_order'));
				$aosDelay=0;
				while ($team->have_posts()): $team->the_post();
					$staffTitle = get_the_title();
					$staffPhoto = get_field('photo');
					$staffJD = get_field('job_title');
					$aosDelay = $aosDelay + 50;
			 ?>
			<li class="u-third" data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>">
				<div class="o-author">
					<figure class="js-bkg" data-image-url="<?php echo $staffPhoto; ?>"></figure>
					<section>
						<strong><?php echo $staffTitle; ?></strong>
						<em><?php echo $staffJD; ?>, SFEA</em>
					</section>

				</div>
			</li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
	</div>
</section>
<section class="o-section s--med c-docs s--cover" id="documents">
	<figure class="o-section__cover" data-aos="fade-up"></figure>
	<div class="o-box">
		<div class="o-crumb s--updates">
			<div class="o-crumb__title">Annual Reports</div>
			<div class="o-crumb__line"></div>
			<div class="o-crumb__circle"></div>
		</div>
		<div class="u-clear">
			<?php 
				$documents = new WP_Query(array(
					'post_type'=>'document',
					'posts_per_page'=>-1,
					'tax_query'=> array(
						'relation'=>'AND',
						array(
							'taxonomy'=>'collection',
							'field'=>'slug',
							'terms'=>'annual'
						)
					  )
					)
				);
				$aosDelay = 0;
				while ($documents->have_posts()) : $documents->the_post();
					$documentFile = get_field('file');
					$documentCover ='';
				?>
					<a data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>" title="<?php the_title(); ?>" href="<?php echo $documentFile; ?>" target="_blank" class="o-doc u-fourth no-barba">
						<section>
							<i class="o-icon"></i>
							<span><?php the_title(); ?></span>
							<p><?php echo get_the_date(); ?></p>
						</section>
					</a>
			<?php $aosDelay = $aosDelay + 50; endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>