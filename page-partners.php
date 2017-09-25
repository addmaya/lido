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
						<div class="u-pt-l">
							<?php echo renderButton('#funding', 'Funding Partners','anchor', 's--block s--vertical'); ?>
							<?php echo renderButton('#implementing', 'Implementing Partners','anchor', 's--block s--vertical'); ?>
							<?php echo renderButton('#networks', 'Networks & Collaborations','anchor', 's--block s--vertical'); ?>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<section class="o-section" id="funding">
	<div class="o-box">
		<div class="u-half">
			<div class="o-crumb">
				<div class="o-crumb__title">Funding Partners</div>
				<div class="o-crumb__line"></div>
				<div class="o-crumb__circle"></div>
			</div>
			<ul class="o-partners s--third">
				<?php 
					$fundingPartnersLogos = new WP_Query(array(
						'post_type'=>'partner',
						'posts_per_page'=>-1,
						'tax_query'=> array(
							array(
								'taxonomy'=>'class',
								'field'=>'slug',
								'terms'=>'funding'
							)
						),
						'meta_query'=> array(
							array(
								'key'=>'logo',
								'value'=>'',
								'compare'=> '!='
						))
					));
					while ( $fundingPartnersLogos->have_posts() ) : $fundingPartnersLogos->the_post();
						$partnerWebsite = esc_url(get_field('website'));
						$partnerLogo = get_field('logo');
						$partnerName = get_the_title();
				?>
					<li>
						<a <?php if($partnerWebsite){echo 'href="'.$partnerWebsite.'" target="_blank"';} ?>>
							<?php if ($partnerLogo){ ?>
								<figure class="js-lazy" data-image-url="<?php echo $partnerLogo; ?>"></figure>
							<?php } else {?>
							<span class="s--inline"><?php echo $partnerName; ?></span>
							<?php } ?>
						</a>
					</li>
				<?php  endwhile; wp_reset_postdata(); ?>
			</ul>
			<ul class="o-partners u-pt-l">
				<?php 
					$fundingPartnersPlain = new WP_Query(array(
						'post_type'=>'partner',
						'posts_per_page'=>-1,
						'tax_query'=> array(
							array(
								'taxonomy'=>'class',
								'field'=>'slug',
								'terms'=>'funding'
							)
						),
						'meta_query'=> array(
							array(
								'key'=>'logo',
								'value'=>'',
								'compare'=> '='
						))
					));
					while ( $fundingPartnersPlain->have_posts() ) : $fundingPartnersPlain->the_post();
						$partnerWebsite = esc_url(get_field('website'));
						$partnerLogo = get_field('logo');
						$partnerName = get_the_title();
				?>
					<li style="width: 50%">
						<a <?php if($partnerWebsite){echo 'href="'.$partnerWebsite.'" target="_blank"';} ?>>
							<span><?php echo $partnerName; ?></span>
						</a>
					</li>
				<?php  endwhile; wp_reset_postdata(); ?>
			</ul>
		</div>
		<div class="u-half">
			<section class="u-pl-l o-story">
				<?php
					$sectionFunding = get_field('funding_partners');
					$sectionFundingTitle =$sectionFunding['title'];
					$sectionFundingSummary =$sectionFunding['summary'];
				?>
				<h1><?php echo $sectionFundingTitle; ?></h1>
				<p><?php echo $sectionFundingSummary; ?></p>
				
			</section>
			<div class="u-pt-l u-pl-l">
				<?php echo renderButton('#', 'Join Us. Become a Partner','anchor', 's--block'); ?>
			</div>
		</div>
	</div>
</section>
<section class="o-splash">
	<?php
		$quote = get_field('featured_quote');
		$quoteTitle = $quote['quote'];
		$quotePhoto = $quote['image'];

		$quoteAuthor = $quote['staff'];
		$featuredAuthorName = $quote['author']['name'];
		$featuredAuthorTitle = $quote['author']['title'];
	?>
	<figure class="o-splash__figure js-lazy o-image" data-image-url="<?php echo $quotePhoto; ?>">
		<span class="o-image__cover"></span>
		<div class="o-splash__tint"></div>
		<section class="o-splash__content">
			<div class="o-box">
				<blockquote>
					<p><?php echo $quoteTitle; ?></p>
					<span class="o-line"></span>
				</blockquote>
				<?php if(!get_field('quote_author')){?>
					<div class="o-author">
						<?php
							$featureQuoteStaff = new WP_Query(array('post_type'=>'team', 'p'=>$quoteAuthor));
							while ( $featureQuoteStaff->have_posts() ) : $featureQuoteStaff->the_post();
								$featureQuoteStaffPhoto = get_field('photo');
								$featureQuoteStaffTitle = get_field('job_title');
								$featureQuoteStaffName = get_the_title();
						?>
						<figure class="js-lazy" data-image-url="<?php echo $featureQuoteStaffPhoto; ?>"></figure>
						<section>
							<strong><?php echo $featureQuoteStaffName; ?></strong>
							<em><?php echo $featureQuoteStaffTitle; ?>, SFEA</em>
						</section>

						<?php endwhile; wp_reset_postdata(); ?>
					</div>

				<?php } else {?>
					<div class="o-author">
						<figure></figure>
						<section>
							<strong><?php echo $featuredAuthorName; ?></strong>
							<em><?php echo $featuredAuthorTitle; ?></em>
						</section>
					</div>
				<?php } ?>
			</div>
		</section>
	</figure>
</section>
<section class="o-section" id="implementing">
	<div class="o-box">
		<div class="u-half">
			<?php
				$sectionImplement = get_field('implementing_partners');
				$sectionImplementTitle =$sectionImplement['title'];
				$sectionImplementSummary =$sectionImplement['summary'];
			?>
			<div class="o-crumb">
				<div class="o-crumb__title">Implementing Parters</div>
				<div class="o-crumb__line"></div>
				<div class="o-crumb__circle"></div>
			</div>
			<h1><?php echo $sectionImplementTitle; ?></h1>
			<p><?php echo $sectionImplementSummary; ?></p>
			<section class="u-clear u-pt-l">
				<section class="u-third">
					<ul class="o-olist u-pt-l">
						<!-- li*9>a>i>strong{$}^span{Partner $} -->
						<li><a href=""><i><strong>1</strong></i><span>Partner 1</span></a></li>
						<li><a href=""><i><strong>2</strong></i><span>Partner 2</span></a></li>
						<li><a href=""><i><strong>3</strong></i><span>Partner 3</span></a></li>
						<li><a href=""><i><strong>4</strong></i><span>Partner 4</span></a></li>
						<li><a href=""><i><strong>5</strong></i><span>Partner 5</span></a></li>
						<li><a href=""><i><strong>6</strong></i><span>Partner 6</span></a></li>
						<li><a href=""><i><strong>7</strong></i><span>Partner 7</span></a></li>
						<li><a href=""><i><strong>8</strong></i><span>Partner 8</span></a></li>
						<li><a href=""><i><strong>9</strong></i><span>Partner 9</span></a></li>
					</ul>
				</section>
				<section class="u-third">
					<ul class="o-olist u-pt-l">
						<li><a href=""><i><strong>1</strong></i><span>Partner 1</span></a></li>
						<li><a href=""><i><strong>2</strong></i><span>Partner 2</span></a></li>
						<li><a href=""><i><strong>3</strong></i><span>Partner 3</span></a></li>
						<li><a href=""><i><strong>4</strong></i><span>Partner 4</span></a></li>
						<li><a href=""><i><strong>5</strong></i><span>Partner 5</span></a></li>
						<li><a href=""><i><strong>6</strong></i><span>Partner 6</span></a></li>
						<li><a href=""><i><strong>7</strong></i><span>Partner 7</span></a></li>
						<li><a href=""><i><strong>8</strong></i><span>Partner 8</span></a></li>
						<li><a href=""><i><strong>9</strong></i><span>Partner 9</span></a></li>
					</ul>
				</section>
				<section class="u-third">
					<ul class="o-olist u-pt-l">
						<li><a href=""><i><strong>1</strong></i><span>Partner 1</span></a></li>
						<li><a href=""><i><strong>2</strong></i><span>Partner 2</span></a></li>
						<li><a href=""><i><strong>3</strong></i><span>Partner 3</span></a></li>
						<li><a href=""><i><strong>4</strong></i><span>Partner 4</span></a></li>
						<li><a href=""><i><strong>5</strong></i><span>Partner 5</span></a></li>
						<li><a href=""><i><strong>6</strong></i><span>Partner 6</span></a></li>
						<li><a href=""><i><strong>7</strong></i><span>Partner 7</span></a></li>
						<li><a href=""><i><strong>8</strong></i><span>Partner 8</span></a></li>
						<li><a href=""><i><strong>9</strong></i><span>Partner 9</span></a></li>
					</ul>
				</section>
			</section>
			<div class="u-pt-l">
				<?php echo renderButton('#', 'Join Us. Become a Partner','anchor', 's--block'); ?>
			</div>
		</div>
		<div class="u-half">
			<div class="c-implementers">
				
			</div>
		</div>
	</div>
</section>
<section class="o-section" id="networks">
	<div class="o-box">
		<div class="u-half s--right">
			<div class="o-crumb">
				<div class="o-crumb__title">Networks and Collaborations</div>
				<div class="o-crumb__line"></div>
				<div class="o-crumb__circle"></div>
			</div>
			<?php
				$sectionNetworks = get_field('networks');
				$sectionNetworksTitle =$sectionNetworks['title'];
				$sectionNetworksSummary =$sectionNetworks['summary'];
			?>
			<h1><?php echo $sectionNetworksTitle; ?></h1>
			<p><?php echo $sectionNetworksSummary; ?></p>
			<section class="u-pt-l">
				<ul class="o-partners s--third">
					<?php 
						$networkPartners = new WP_Query(array(
							'post_type'=>'partner',
							'posts_per_page'=>-1,
							'tax_query'=> array(
								array(
									'taxonomy'=>'class',
									'field'=>'slug',
									'terms'=>'networks'
								)
							)
						));
						while ( $networkPartners->have_posts() ) : $networkPartners->the_post();
					?>
						<li><a href="#"><figure></figure></a></li>
					<?php  endwhile; wp_reset_postdata(); ?>
				</ul>
			</section>
		</div>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>