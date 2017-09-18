<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="c-cover t-dark">
	<div class="u-half">
		<div class="o-tint"></div>
		<figure class="c-cover__image" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/dummy-3.jpg')"></figure>
	</div>
	<div class="u-half c-cover__profile">
		<div class="o-table">
			<div class="o-table__cell">
				<section class="c-cover__section">
					<h1><?php the_field('title'); ?></h1>
					<p><?php the_field('summary'); ?></p>
					<div class="u-pt-l">
						<?php echo renderCircularButton('#', 'Education', get_stylesheet_directory_uri().'/images/dummy.jpg'); ?>
						<?php echo renderCircularButton('#', 'Livelihood', get_stylesheet_directory_uri().'/images/dummy.jpg'); ?>
						<?php echo renderCircularButton('#', 'Capacity Building and Training', get_stylesheet_directory_uri().'/images/dummy.jpg'); ?>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<section class="o-section" style="background-color:#EDEEEE">
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
					$sectionEducTitle =$sectionEduc['title'];
					$sectionEducSummary =$sectionEduc['summary'];
				?>
				<h1><?php echo $sectionEducTitle; ?></h1>
				<section class="u-clear">
					<div class="u-half">
						<p><?php echo $sectionEducSummary; ?></p>
					</div>
					<div class="u-half">
						<div class="o-author">
							<figure></figure>
							<section>
								<strong>Mrs. Priscilla M.Serukka</strong>
								<em>Regional Director, SFEA</em>
							</section>
						</div>
					</div>
				</section>
			</div>
		</section>
		<ul class="u-clear u-pt-l">
			<?php 
				$educationPrograms = new WP_Query(array(
					'post_type'=>'program',
					'tax_query'=> array(
						array(
							'taxonomy'=>'group',
							'field'=>'slug',
							'terms'=>'education'
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
				$sectionSudanTitle =$sectionEduc['title'];
				$sectionSudanSummary =$sectionEduc['summary'];
				$sectionSudanPhoto =$sectionEduc['photo'];
			?>
			<div class="u-third">
				<figure class="o-rhombus s--large" data-image-url="<?php echo $sectionSudanPhoto; ?>"></figure>
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
<section class="o-section t-dark" style="background-color:#970055">
	<div class="o-box">
		<div class="u-half">
			<div class="o-crumb">
				<div class="o-crumb__title">Livelihood Programs</div>
				<div class="o-crumb__line"></div>
				<div class="o-crumb__circle"></div>
			</div>
			<?php
				$sectionLivelihood = get_field('livelihoods');
				$sectionLivelihoodTitle =$sectionEduc['title'];
				$sectionLivelihoodSummary =$sectionEduc['description'];
			?>
			<h1><?php echo $sectionLivelihood; ?></h1>
			<section class="u-clear">
				<div class="u-half">
					<p><?php echo $sectionLivelihoodSummary; ?></p>
				</div>
				<div class="u-half">
					<div class="o-author">
						<figure></figure>
						<section>
							<strong>Mrs. Priscilla M.Serukka</strong>
							<em>Regional Director, SFEA</em>
						</section>
					</div>
				</div>
			</section>
			<ul class="u-clear u-pt-l">
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
<section class="o-section" style="background-color:#EDEEEE">
	<div class="o-box">
		<div class="u-half s--right">
			<?php
				$sectionCapacity = get_field('capacity_building_programs');
				$sectionCapacityTitle =$sectionEduc['title'];
				$sectionCapacitySummary =$sectionEduc['description'];
			?>
			<div class="o-crumb">
				<div class="o-crumb__title">Capacity Building Programs</div>
				<div class="o-crumb__line"></div>
				<div class="o-crumb__circle"></div>
			</div>
			<h1><?php echo $sectionCapacityTitle; ?></h1>
			<section class="u-clear">
				<div class="u-half">
					<p><?php echo $sectionCapacitySummary; ?></p>
				</div>
				<div class="u-half">
					<div class="o-author">
						<figure></figure>
						<section>
							<strong>Mrs. Priscilla M.Serukka</strong>
							<em>Regional Director, SFEA</em>
						</section>
					</div>
				</div>
			</section>
			<ul class="u-clear u-pt-l">
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