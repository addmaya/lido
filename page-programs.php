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
						<?php echo renderButton('#education', 'Education Programs','anchor', 's--block s--vertical'); ?>
						<?php echo renderButton('#livelihood', 'Livelihood Programs','anchor', 's--block s--vertical'); ?>
						<?php echo renderButton('#capacity-building', 'Capacity Building & Training','anchor', 's--block s--vertical'); ?>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<section class="o-section" id="education">
	<div class="o-box">
		<section class="u-clear">
			<div class="u-half">
				<div class="o-crumb">
					<div class="o-crumb__title">Education Programs</div>
					<div class="o-crumb__line"></div>
					<div class="o-crumb__circle"></div>
				</div>
				<?php
					$sectionEduc = get_field('education');
					$sectionEducTitle = $sectionEduc['title'];
					$sectionEducSummary = $sectionEduc['summary'];
				?>
				<h1><?php echo $sectionEducTitle; ?></h1>
				<p><?php echo $sectionEducSummary; ?></p>
			</div>
		</section>
		<ul class="o-rhombus__list">
			<?php 
				$educationPrograms = new WP_Query(array(
					'post_type'=>'program',
					'tax_query'=> array(
						'relation'=>'AND',
						array(
							'taxonomy'=>'group',
							'field'=>'slug',
							'terms'=>'education'
						),
						array(
							'taxonomy'=>'group',
							'field'=>'slug',
							'terms'=>'south-sudan',
							'operator'=>'NOT IN'
						)
					)
				));
				while ( $educationPrograms->have_posts() ) : $educationPrograms->the_post();
			?>
				<li class="u-fourth">
					<?php echo renderRhombusButton(get_permalink(), get_the_title(), get_field('photo')); ?>
				</li>
			<?php  endwhile; wp_reset_postdata(); ?>
		</ul>
		<span class="o-line s--divider"></span>
		<section class="u-clear">
			<?php
				$sectionSudan = get_field('south_sudan');
				$sectionSudanTitle =$sectionSudan['title'];
				$sectionSudanSummary =$sectionSudan['summary'];
				$sectionSudanPhoto =$sectionSudan['photo'];
			?>
			<div class="u-third">
				<a href="#" class="o-rhombus-button s--patterned is-passive">
					<div class="o-rhombus s--large">
						<figure class="o-rhombus__image js-lazy" data-image-url="<?php echo $sectionSudanPhoto; ?>"></figure>
					</div>
					<div class="o-rhombus__pattern"></div>
				</a>
			</div>
			<div class="u-third">
				<h1><?php echo $sectionSudanTitle; ?></h1>
				<p><?php echo $sectionSudanSummary; ?></p>
			</div>
			<div class="u-third">
				<div class="u-pl-m">
					<?php 
						$sudanPrograms = new WP_Query(array(
							'post_type'=>'program',
							'tax_query'=> array(
								array(
									'taxonomy'=>'group',
									'field'=>'slug',
									'terms'=>'south-sudan'
								)
							)
						));
						while ( $sudanPrograms->have_posts() ) : $sudanPrograms->the_post();
					?>
						<?php echo renderCircularButton(get_permalink(), get_the_title(), get_field('photo')); ?>
					<?php  endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</section>
	</div>
</section>
<section class="o-section t-dark" id="livelihood">
	<div class="o-box">
		<div class="u-half">
			<div class="o-crumb">
				<div class="o-crumb__title">Livelihood Programs</div>
				<div class="o-crumb__line"></div>
				<div class="o-crumb__circle"></div>
			</div>
			<?php
				$sectionLivelihood = get_field('livelihoods');
				$sectionLivelihoodTitle =$sectionLivelihood['title'];
				$sectionLivelihoodSummary =$sectionLivelihood['description'];
			?>
			<h1><?php echo $sectionLivelihoodTitle; ?></h1>
			<p><?php echo $sectionLivelihoodSummary; ?></p>
			<ul class="o-rhombus__list">
				<?php 
					$livelihoodPrograms = new WP_Query(array(
						'post_type'=>'program',
						'tax_query'=> array(
							array(
								'taxonomy'=>'group',
								'field'=>'slug',
								'terms'=>'livelihood'
							)
						)
					));
					while ( $livelihoodPrograms->have_posts() ) : $livelihoodPrograms->the_post();
				?>
					<li class="u-half">
						<?php echo renderRhombusButton(get_permalink(), get_the_title(), get_field('photo')); ?>
					</li>
				<?php  endwhile; wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
</section>
<section class="o-section" id="capacity-building">
	<div class="o-box">
		<div class="u-half s--right">
			<?php
				$sectionCapacity = get_field('capacity_building_programs');
				$sectionCapacityTitle =$sectionCapacity['title'];
				$sectionCapacitySummary =$sectionCapacity['description'];
			?>
			<div class="o-crumb">
				<div class="o-crumb__title">Capacity Building Programs</div>
				<div class="o-crumb__line"></div>
				<div class="o-crumb__circle"></div>
			</div>
			<h1><?php echo $sectionCapacityTitle; ?></h1>
			<p><?php echo $sectionCapacitySummary; ?></p>
			<ul class="o-rhombus__list">
				<?php 
					$capacityPrograms = new WP_Query(array(
						'post_type'=>'program',
						'tax_query'=> array(
							array(
								'taxonomy'=>'group',
								'field'=>'slug',
								'terms'=>'capacity-building'
							)
						)
					));
					while ( $capacityPrograms->have_posts() ) : $capacityPrograms->the_post();
				?>
					<li class="u-half">
						<?php echo renderRhombusButton(get_permalink(), get_the_title(), get_field('photo')); ?>
					</li>
				<?php  endwhile; wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>