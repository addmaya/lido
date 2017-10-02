<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="c-pop">
	<div class="o-table">
		<div class="o-table__cell">
			<div class="c-pop__box">
				<a href="#" class="o-closer"></a>
				<div class="o-player"></div>
			</div>
		</div>
	</div>
</div>
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
				$updates = new WP_Query(array('post_type'=>'post'));

				$articleCount = 0;
				$articleClass = '';
				$aosDelay = 0;

				$postCount = $updates->post_count;
				$postBalance = wp_count_posts('post')->publish - $postCount;

				while ($updates->have_posts()) {
					$updates->the_post();
					
					$storyTitle = get_the_title();
					$storyLink = get_permalink();
					$storyPhoto = get_field('photo');

					$articleClass = getArticleClass($articleCount);
					if ($postCount == 1) {
						$articleClass = $articleClass.' s--solo';
					}

					if($articleCount > 3){
						$articleCount = 0;
					}

					echo renderArticle($articleClass, $articleCount, $aosDelay, $storyPhoto, $storyLink,$storyTitle,'','');

					$articleCount++;
					$aosDelay = $aosDelay + 50;
				} 
					wp_reset_postdata();
			?>
		</div>

		<?php if (!$postBalance <= 0): ?>
			<div class="u-center">
				<a href="#" class="o-button s--multiline s--med js-fetch-posts" data-post="post">
					<i class="o-icon"><strong><?php echo $postBalance; ?></strong></i>
					<span>More Change Stories</span>
				</a>
			</div>
		<?php endif ?>
	</div>
</section>
<section class="o-section s--med s--bottom__clear c-updates">
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

					$videoThumb = $videoMeta['yt_thumb'];
					$videoThumbHigh = $videoMeta['yt_thumb_high'];

					if(!$videoThumb){
						$videoThumb = $videoThumbHigh;
					}
			 ?>
			<figure class="o-splash__figure js-defer" data-image-url="<?php echo $videoThumb; ?>" data-video-url="">
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
		
		<div class="o-article__grid s--updates">
			<?php
				$videos = new WP_Query(array('post_type'=>'video','posts_per_page'=>2, 'offset'=>1));

				$articleCount = 0;
				$aosDelay = 0;

				$postCount = $videos->post_count;
				$postBalance = wp_count_posts('video')->publish - $postCount;

				while ($videos->have_posts()) {
					$videos->the_post();

					$videoLink = get_field('link', false, false);
					$videoSummary = get_field('summary');
					$videoID = getYoutubeID($videoLink);
					$videoMeta = getYoutubeMeta($videoID);

					$videoThumb = $videoMeta['yt_thumb'];
					$videoThumbHigh = $videoMeta['yt_thumb_high'];

					if(!$videoThumb){
						$videoThumb = $videoThumbHigh;
					}
					
					$storyTitle = get_the_title();
					$storyLink = get_permalink();
					$storyPhoto = get_field('photo');

					if($articleCount > 3){
						$articleCount = 0;
					}

					echo renderArticle('s--video', $articleCount, $aosDelay, $videoThumb, $videoID, $storyTitle,'','');

					$articleCount++;
					$aosDelay = $aosDelay + 50;
				} 
					wp_reset_postdata();
			?>
		</div>
		<?php if (!(($postBalance - 1) < 1)): ?>
			<div class="u-center">
				<a href="#" class="o-button s--multiline s--med js-fetch-posts" data-post="video">
					<i class="o-icon"><strong><?php echo $postBalance; ?></strong></i>
					<span>More Videos</span>
				</a>
			</div>
		<?php endif ?>
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
								$album = new WP_Query(array(
									'post_type'=>'album',
									'posts_per_page'=>1
									)
								);

								while ($album->have_posts()) : $album->the_post();
								$photos = get_field('photos');
								$albumTitle = get_the_title();

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
						<h2><?php echo $albumTitle; ?></h2>
						<em></em>
						<span class="o-line"></span>
					</section>
				</div>
			</div>
		</section>
		<div class="u-pt-l">
			<div class="o-article__grid s--updates s--albums">
				<?php
					$albums = new WP_Query(array('post_type'=>'album', 'posts_per_page'=>2, 'offset'=>1));

					$aosDelay = 0;

					$postCount = $albums->post_count;
					$postBalance = wp_count_posts('album')->publish - $postCount;

					while ($albums->have_posts()) {
						$albums->the_post();
						
						$storyTitle = get_the_title();
						$storyLink = get_permalink();
						$storyPhoto = get_field('photos')[0]['sizes']['large'];

						echo renderArticle('s--video', 0, $aosDelay, $storyPhoto, $videoID, $storyTitle,'','');

						$aosDelay = $aosDelay + 50;
					} 
						wp_reset_postdata();
				?>
			</div>
			<?php if (!(($postBalance - 1) < 1)): ?>
				<div class="u-center">
					<a href="#" class="o-button s--multiline s--med js-fetch-posts" data-post="album">
						<i class="o-icon"><strong><?php echo $postBalance; ?></strong></i>
						<span>More Albums</span>
					</a>
				</div>
			<?php endif ?>
		</div>
	</div>
</section>
<section class="o-section s--med c-docs s--cover" id="documents">
	<figure class="o-section__cover" data-aos="fade-up"></figure>
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