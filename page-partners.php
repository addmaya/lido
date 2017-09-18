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
						<div class="u-pt-l">
							<?php echo renderCircularButton('#', 'Funding Partners', get_stylesheet_directory_uri().'/images/dummy.jpg'); ?>
							<?php echo renderCircularButton('#', 'Implementing Partners', get_stylesheet_directory_uri().'/images/dummy.jpg'); ?>
							<?php echo renderCircularButton('#', 'Networks & Collaborations', get_stylesheet_directory_uri().'/images/dummy.jpg'); ?>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<section class="o-section">
	<div class="o-box">
		<div class="u-half">
			<div class="o-crumb">
				<div class="o-crumb__title">Funding Partners</div>
				<div class="o-crumb__line"></div>
				<div class="o-crumb__circle"></div>
			</div>
			<ul class="o-partners s--third">
				<?php 
					$fundingPartners = new WP_Query(array(
						'post_type'=>'partner',
						'posts_per_page'=>-1,
						'tax_query'=> array(
							array(
								'taxonomy'=>'class',
								'field'=>'slug',
								'terms'=>'funding'
							)
						)
					));
					while ( $fundingPartners->have_posts() ) : $fundingPartners->the_post();
				?>
					<li><a href="#"></a></li>
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
				<div class="u-pt-l">
					<a href="#" class="o-button s--block">
						<div>
							<i class="o-icon"></i>
							<span>Together we can end Poverty. Become a Partner</span>
						</div>
					</a>
				</div>
			</section>
		</div>
	</div>
</section>
<section class="o-splash">
	<?php
		$featuredQuote = get_field('featured_quote');
		$featuredQuoteTitle = $featuredQuote['quote'];
		$featuredQuotePhoto = $featuredQuote['image'];

		$featuredQuoteAuthor = $featuredQuote['staff'];
		$featuredAuthorName = $featuredQuote['author']['name'];
		$featuredAuthorTitle = $featuredQuote['author']['title'];
	?>
	<figure class="o-splash__figure js-lazy o-image" data-image-url="<?php echo $featuredQuotePhoto; ?>">
		<span class="o-image__cover"></span>
		<div class="o-splash__tint"></div>
		<section class="o-splash__content">
			<div class="o-box">
				
				<blockquote>
					<p><?php echo $featuredQuoteTitle; ?></p>
					<span class="o-line"></span>
				</blockquote>
				<?php if(!get_field('quote_author')){?>
					<div class="o-author">
						<?php
							$featureQuoteStaff = new WP_Query(array('post_type'=>'team', 'p'=>$featuredQuoteAuthor));
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
<section class="o-section">
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
			
			<h1><?php echo $sectionImplement; ?></h1>
			<section class="u-clear">
				<div class="u-half">
					<p><?php echo $sectionImplementSummary; ?></p>
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
				<a href="#" class="o-button s--block">
					<div>
						<i class="o-icon"></i>
						<span>Join our Implementing Team</span>
					</div>
				</a>
			</div>
		</div>
		<div class="u-half"></div>
	</div>
</section>
<section class="o-section" style="background-color: #E2E2E2">
	<div class="o-box">
		<div class="u-half s--right">
			<div class="o-crumb">
				<div class="o-crumb__title">Networks and Collaborations</div>
				<div class="o-crumb__line"></div>
				<div class="o-crumb__circle"></div>
			</div>
			<?php
				$sectionNetworks = get_field('implementing_partners');
				$sectionNetworksTitle =$sectionNetworks['title'];
				$sectionNetworksSummary =$sectionNetworks['summary'];
			?>
			<h1><?php echo $sectionNetworksTitle; ?></h1>
			<section class="u-clear">
				<div class="u-half">
					<p><?php echo $sectionNetworksSummary; ?></p>
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
						<li><a href="#"></a></li>
					<?php  endwhile; wp_reset_postdata(); ?>
				</ul>
			</section>
		</div>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>