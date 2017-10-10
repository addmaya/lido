<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="c-pop" id="videoPop">
	<div class="o-table" >
		<div class="o-table__cell">
			<div class="c-pop__box">
				<a href="#" class="o-button__close"></a>
				<div class="o-player"></div>
			</div>
		</div>
	</div>
</div>
<div class="c-pop" id="albumPop">
	<div class="o-table" >
		<div class="o-table__cell">
			<div class="c-pop__box">
				<a href="#" class="o-button__close"></a>
				<section class="o-slider">
					<div class="u-threefourth o-slider-col">
						<div class="o-slider__image">
							<div class="swiper-container">
								<div class="swiper-wrapper">
								</div>
							</div>
						</div>
					</div>
					<div class="u-fourth o-slider-col">
						<div class="o-slider__caption">
							<div class="o-slider__buttons t-dark">
								<?php echo renderButton('#','','','s--prev') ?>
								<?php echo renderButton('#','','','s--next') ?>
							</div>
							<section class="u-wrap">
								<h2></h2>
								<em></em>
								<span class="o-line"></span>
							</section>
						</div>
					</div>
				</section>
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

<?php 
	$videos = new WP_Query(array(
		'post_type'=>'video',
		'posts_per_page'=>3
		)
	);
	$postCount = $videos->post_count;
	$postBalance = wp_count_posts('video')->publish - $postCount;
	$videoIndex = 0;
?>
<section class="o-section s--med">
	<div class="o-box">
		<div class="o-crumb s--updates">
			<div class="o-crumb__title">Videos</div>
			<div class="o-crumb__line"></div>
			<div class="o-crumb__circle"></div>
		</div>
		<div class="c-library">
			<?php
				$aosDelay = 0;
				while ($videos->have_posts()) : $videos->the_post();
					$videoLink = get_field('link', false, false);
					$videoID = getYoutubeID($videoLink);
					$videoMeta = getYoutubeMeta($videoID);

					$videoThumb = $videoMeta['yt_thumb'];
					$videoThumbHigh = $videoMeta['yt_thumb_high'];

					if(!$videoThumb){
						$videoThumb = $videoThumbHigh;
					}
			 ?>
			<div class="u-half">
				<?php echo renderMedia($aosDelay, $videoMeta['yt_title'], $videoThumb, 'js-video', $videoID); ?>
			</div>
			<?php $aosDelay = $aosDelay + 50; endwhile; wp_reset_postdata(); ?>
		</div>

		<?php if (!(($postBalance - 1) < 1)): ?>
			<div class="u-center">
				<a href="#" class="o-button s--multiline s--med js-media" data-post="video">
					<i class="o-icon"><strong><?php echo $postBalance; ?></strong></i>
					<span>More Videos</span>
				</a>
			</div>
		<?php endif ?>
	</div>
</section>

<?php 
	$albums = new WP_Query(array(
		'post_type'=>'album',
		'posts_per_page'=>3
		)
	);
	$postCount = $albums->post_count;
	$postBalance = wp_count_posts('video')->publish - $postCount;
?>
<section class="o-section">
	<div class="o-box">
		<div class="o-crumb s--updates">
			<div class="o-crumb__title">Photo Galleries</div>
			<div class="o-crumb__line"></div>
			<div class="o-crumb__circle"></div>
		</div>
		<div class="c-library">
			<?php
				$aosDelay = 0;
				while ($albums->have_posts()) : $albums->the_post();
					$albumTitle = get_the_title();
					$albumLink = get_permalink();
					$albumPhotos = get_field('photos');
					$albumCover = $albumPhotos[0]['sizes']['large'];
					$albumSlides = '';

					foreach ($albumPhotos as $albumPhoto) {
						$albumSlides .= '<div class="swiper-slide"><figure style="background-image:url('.$albumPhoto['url'].')"></figure><span>'.$albumPhoto['caption'].'</span></div>';
					}
			 ?>
			<div class="u-half">
				<?php echo renderMedia($aosDelay, $albumTitle, $albumCover, 'js-photo').'<div class="c-libary__vault">'.$albumSlides.'</div>'; ?>
			</div>
			<?php $aosDelay = $aosDelay + 50; endwhile; wp_reset_postdata(); ?>
		</div>

		<?php if (!(($postBalance - 1) < 1)): ?>
			<div class="u-center">
				<a href="#" class="o-button s--multiline s--med js-media" data-post="album">
					<i class="o-icon"><strong><?php echo $postBalance; ?></strong></i>
					<span>More Albums</span>
				</a>
			</div>
		<?php endif ?>
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
							'terms'=>'annual',
							'operator'=>'NOT IN'
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