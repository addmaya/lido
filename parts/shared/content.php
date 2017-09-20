<?php  if (have_rows('content')): ?>
	<?php while(have_rows('content')): the_row();?>
		
		<?php if(get_row_layout() == 'text_block'): 
			$textBlockContent = get_sub_field('content');
		?>
			<div class="o-story s--single">
				<div class="o-box">
					<?php echo $textBlockContent; ?>
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
										<figure class="js-lazy" data-image-url="<?php echo $slideImage['url']; ?>"></figure>
										<span><?php echo $slideImage['caption']; ?></span>
									</div>
							<?php } ?>
						</div>
						<div class="o-slider__buttons t-dark">
							<?php echo renderButton('#','','div','s--prev') ?>
							<?php echo renderButton('#','','div','s--next') ?>
						</div>
					</div>
				</div>
			</div>
			<div class="u-fourth o-slider-col">
				<div class="o-slider__caption">
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
				$quoteAuthorName = get_sub_field('author_name');
				$quoteAuthorTitle = get_sub_field('author_title');
			?>
			<figure class="o-splash__figure js-lazy o-image" data-image-url="<?php echo $quotePhoto; ?>">
				<span class="o-image__cover"></span>
				<div class="o-splash__tint"></div>
				<section class="o-splash__content">
					<div class="o-box">
						
						<blockquote>
							<p><?php echo $quote; ?></p>
							<span class="o-line"></span>
						</blockquote>
						<div class="o-author">
							<figure></figure>
							<section>
								<strong><?php echo $quoteAuthorName; ?></strong>
								<em><?php echo $quoteAuthorTitle; ?></em>
							</section>
						</div>
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
			<section class="o-section">
				<div class="o-box">
					<div class="u-clear u-pt-xl">
						<?php 
							foreach( $statFigures as $stat ){
								$statNumber = $stat['number'];
								$statSummary = $stat['description'];
								$statUnit = $stat['unit'];
								$statPhoto = $stat['photo'];
						 ?>
						 <div class="o-statistic u-third">
						 	<div class="u-clear">
						 		<div class="u-half">
						 			<span><?php echo number_format($statNumber); ?><i class="u-superscript"><?php echo $statUnit; ?></i></span>
						 			<p><?php echo $statSummary; ?></p>
						 		</div>
						 		<div class="u-half">
						 			<figure class="js-lazy" data-image-url="<?php echo $statPhoto; ?>"></figure>
						 		</div>
						 	</div>
						 </div>
						 <?php } ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if(get_row_layout() == 'embed'):
			$vidTitle = get_sub_field('title');
			$vidBrief = get_sub_field('description');
			$vidLink = get_sub_field('embed');
		?>
			<section class="o-section">
				<div class="o-box">
					<section class="o-splash s--video">
						<figure class="o-splash__figure">
							<div class="o-splash__tint"></div>
							<section class="o-splash__content">
								<div class="o-box">
									<span class="o-line"></span>
									<h2>Video: <?php echo $vidTitle; ?></h2>
									<a href="#">Play Video</a>
									<p>
										<em><?php echo $vidBrief; ?></em>
									</p>
								</div>
							</section>
						</figure>
					</section>
				</div>
			</section>
		<?php endif; ?>

		<?php if(get_row_layout() == 'document'):
			$docsTitle = get_sub_field('title');
			$docsBrief = get_sub_field('description');
			$docs = get_sub_field('documents');
		?>
			<section class="o-section">
				<div class="o-box">
					<div class="u-clear">
						<?php foreach ($docs as $doc) {?>
							<a href="<?php echo $doc['file']; ?>" target="_blank" class="o-statistic u-third s--doc">
								<div class="u-clear">
									<div class="u-half">
										<i class="o-icon"></i>
										<span><?php echo $doc['label']; ?></span>
									</div>
									<div class="u-half">
										<figure></figure>
									</div>
								</div>
							</a>
						<?php } ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>