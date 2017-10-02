<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section class="o-section c-updates s--cover" id="updates">
	<figure class="o-section__cover"></figure>
	<div class="o-box">
		<div class="o-crumb s--updates">
			<div class="o-crumb__title">Updates</div>
			<div class="o-crumb__line"></div>
			<div class="o-crumb__circle"></div>
		</div>
		<div class="o-article__grid s--updates">
			<?php
				$featuredUpdates = new WP_Query(array(
					'posts_per_page'=>-1
					)
				);

				$rowCount = 0;
				$articleCount = 0;
				$articleClass = '';

				while ($featuredUpdates->have_posts()) : $featuredUpdates->the_post();
					$storyTitle = get_the_title();
					$storyLink = get_permalink();
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
							<a href="<?php echo $storyLink; ?>" class="js-bkg o-image" data-image-url="<?php echo $storyPhoto; ?>">
								<span class="o-image__cover"></span>
							</a>
						</figure>
						<section class="o-article__summary">
							<h2><a href="<?php echo $storyLink; ?>"><span><?php echo $storyTitle; ?></span></a></h2>
							<ul class="o-article__meta">
								
								<?php
									$storyPrograms = get_field('program');
									if ($storyPrograms):
										foreach ($storyPrograms as $storyProgram):
								?>
									<li><a href="<?php echo get_permalink($storyProgram->ID); ?>">/ <?php echo get_the_title($storyProgram->ID); ?></a></li>
								<?php endforeach; endif; ?>
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
				<span>More Updates</span>
			</a>
		</div>
	</div>
</section>
<section class="o-section s--med s--bottom__clear">
	<div class="o-box">
		<div class="o-crumb s--updates">
			<div class="o-crumb__title">Videos</div>
			<div class="o-crumb__line"></div>
			<div class="o-crumb__circle"></div>
		</div>
		<section class="o-splash s--video">
			<?php 
				$featuredVideo = new WP_Query(array(
					'post_type'=>'video',
					'posts_per_page'=>1
					)
				);
				while ($featuredVideo->have_posts()) : $featuredVideo->the_post();
					$videoLink = get_field('link', false, false);
					$videoSummary = get_field('summary');
					$videoID = getYoutubeID($videoLink);
					$videoMeta = getYoutubeMeta($videoID);
			 ?>
			<figure class="o-splash__figure js-bkg" data-image-url="<?php echo $videoMeta['yt_thumb']; ?>" data-video-url="">
				<div class="o-splash__player">
					<a class="o-closer o-player__close" href="#"></a>
					<div class="o-player">
							
					</div>
				</div>
				<div class="o-splash__tint">
					<div class="o-table">
						<div class="o-table__cell">
							<a class="o-icon s--play" href="#" data-video-id="<?php echo $videoID; ?>"></a>
						</div>
					</div>
				</div>
				<section class="o-splash__content">
					<div class="o-box">
						<span class="o-line"></span>
						<h2>Video: <?php echo $videoMeta['yt_title']; ?></h2>
						<p>
							<em><?php echo $videoMeta['yt_desc']; ?></em>
						</p>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</section>
			</figure>
		</section>
		<div class="u-center u-pt-m u-pb-m">
			<a href="#" class="o-button s--multiline s--med">
				<i class="o-icon"></i>
				<span>More Videos</span>
			</a>
		</div>
	</div>
</section>
<section class="o-section s--med">
	<div class="o-box">
		<div class="o-crumb s--updates">
			<div class="o-crumb__title">Photo Galleries</div>
			<div class="o-crumb__line"></div>
			<div class="o-crumb__circle"></div>
		</div>
		<section class="o-slider">
			<div class="u-threefourth o-slider-col">
				<div class="o-slider__image">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							
							<?php 
								$featuredAlbum = new WP_Query(array(
									'post_type'=>'album',
									'posts_per_page'=>1
									)
								);

								while ($featuredAlbum->have_posts()) : $featuredAlbum->the_post();
								$photos = get_field('photos');
								foreach ($photos as $photo): ?>
									<div class="swiper-slide">
										<figure class="js-bkg" data-image-url="<?php echo $photo['url']; ?>"></figure>
										<span><?php echo $photo['caption']; ?></span>
									</div>
							<?php endforeach; endwhile; wp_reset_postdata(); ?>
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
		<div class="u-pt-l">
			<div class="o-article__row">
				<?php 
					$albums = new WP_Query(array(
						'post_type'=>'album',
						'posts_per_page'=>2,
						'offset'=>-1
						)
					);

					$i=0;
					
					while ($albums->have_posts()) : $albums->the_post();
						$albumPhotos = get_field('photos');
						$albumCover = $albumPhotos[$i]['url'];
					?>
						<article class="o-article s--bottom-right s--album">
							<section class="u-clear">
								<figure class="o-image js-bkg" data-image-url="<?php echo $albumCover; ?>">
									<span class="o-image__cover"></span>
								</figure>
								<section class="o-article__wrap">
									<section class="o-article__summary">
										<h2><a href="#"><span><?php the_title(); ?></span></a></h2>
										<ul class="o-article__meta">
											<li><a href="#">/ <?php the_field('location'); ?></a></li>
											<li><a href="#">/ <?php echo get_the_date(); ?></a></li>
										</ul>
										<div class="t-dark"><?php echo renderButton('#', 'View Photos'); ?></div>
									</section>
								</section>
							</section>
						</article>
				<?php $i++; endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
		<div class="u-center">
			<a href="#" class="o-button s--multiline s--med">
				<i class="o-icon"></i>
				<span>More Albums</span>
			</a>
		</div>
	</div>
</section>
<section class="o-section s--med c-docs" id="documents">
	<div class="o-box">
		<div class="o-crumb s--updates">
			<div class="o-crumb__title">Documents</div>
			<div class="o-crumb__line"></div>
			<div class="o-crumb__circle"></div>
		</div>
		<div class="u-clear u-pt-m">
			<?php 
				$documents = new WP_Query(array(
					'post_type'=>'document',
					'posts_per_page'=>-1,
					)
				);
				$aosDelay = 0;
				while ($documents->have_posts()) : $documents->the_post();
					$documentFile = get_field('file');
					$documentCover ='';
					$aosDelay = $aosDelay + 100;
				?>
					<a data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>" title="<?php the_title(); ?>" href="<?php echo $documentFile; ?>" target="_blank" class="o-statistic u-third s--doc no-barba">
						<div class="u-clear">
							<div class="u-half">
								<i class="o-icon"></i>
								<span><?php the_title(); ?></span>
								<p><?php echo get_the_date(); ?></p>
							</div>
							<div class="u-half">
								<figure></figure>
							</div>
						</div>
					</a>
			<?php $i++; endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>