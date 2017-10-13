<?php if (have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php
		if( '' !== get_post()->post_content ) {
	?>
	<div class="o-story s--single">
		<div class="o-box">
			<?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', the_content()); ?>
		</div>
	</div>
	<?php } ?>
<?php endwhile; ?>

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
										<figure style="background-image:url('<?php echo $slideImage['sizes']['large']; ?>')"></figure>
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

		<?php if(get_row_layout() == 'quote'): ?>
		<section class="o-splash">
			<?php
				$quote = get_sub_field('quote');
				$quotePhoto = get_sub_field('photo');

				$quoteAuthor = get_sub_field('author');
				$quoteAuthorName = $quoteAuthor['name'];
				$quoteAuthorTitle = $quoteAuthor['title'];
				$quoteAuthorPhoto = $quoteAuthor['photo'];

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
								<figure class="js-bkg" data-image-url="<?php echo $quoteAuthorPhoto; ?>"></figure>
								<section>
									<strong><?php echo $quoteAuthorName; ?></strong>
									<em><?php echo $quoteAuthorTitle; ?>, SFEA</em>
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
			</section>
		<?php endif; ?>

		<?php if(get_row_layout() == 'embed'):
			$videoLink = get_sub_field('embed', false, false);
			
			$videoID = getYoutubeID($videoLink);
			$videoMeta = getYoutubeMeta($videoID);
			
			$videoTitle = $videoMeta['yt_title'];
			$videoSummary = $videoMeta['yt_desc'];
			$videoThumb = $videoMeta['yt_thumb'];
			$videoThumbHigh = $videoMeta['yt_thumb_high'];

			if(!$videoThumb){
				$videoThumb = $videoThumbHigh;
			}
		?>
			<section class="o-section s--med">
				<div class="o-box">
					<?php echo renderMedia($aosDelay, $videoTitle, $videoThumb, 'js-video', $videoID); ?>
				</div>
			</section>
		<?php endif; ?>

		<?php if(get_row_layout() == 'document'):
			$docsTitle = get_sub_field('title');
			$docsBrief = get_sub_field('description');
			
		?>
			<section class="o-section o-doc__box">
				<div class="o-box">
					<div class="u-clear">
						<?php 
							$docs = get_sub_field('documents');
							$aosDelay = 0;
							foreach ($docs as $doc) {?>
								<a data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>" title="<?php echo $doc['label']; ?>" href="<?php echo $doc['file']; ?>" target="_blank" class="o-doc u-fourth no-barba">
									<section>
										<i class="o-icon"></i>
										<span><?php echo $doc['label']; ?></span>
									</section>
								</a>
						<?php } $aosDelay = $aosDelay + 50; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>