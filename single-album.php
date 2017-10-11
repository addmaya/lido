<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php
	$storyTitle = get_the_title();
	$storySummary = get_field('summary');
	$storyArea = get_field('location');
	$storyDate = get_field('date');
	$storyPhotos = get_field('photos');
	$albumCover = $storyPhotos[0]['sizes']['large'];
?>
<div class="c-cover s--story t-dark">
	<div class="o-story__header">
		<div class="o-table">
			<div class="o-table__cell">
				<section>
					<h1><?php echo $storyTitle; ?></h1>
					<ul class="o-article__meta">
						<li><?php echo $storyDate; ?></li>
						<li><?php echo $storyArea; ?></li>
					</ul>
					<span class="o-line"></span>
				</section>
			</div>
		</div>
	</div>
	<div class="o-story__cover u-threefourth">
		<figure class="js-bkg o-image" data-image-url="<?php echo $albumCover; ?>">
			<span class="o-image__cover"></span>
		</figure>
	</div>
</div>
<div class="o-story s--single">
	<div class="o-box">
		<p><?php echo $storySummary; ?></p>
		<section>
			<?php
				$albumSlides = '';
				foreach ($storyPhotos as $albumPhoto) {
					$albumSlides .= '<div class="o-photo" data-aos="fade-up"><figure style="background-image:url('.$albumPhoto['sizes']['large'].')"></figure><span>'.$albumPhoto['caption'].'</span></div>';
				}
				echo $albumSlides;
			?>
		</section>
	</div>
</div>
<div class="o-box" id="story-cta">
	<div class="c-cta">
		<div class="u-third">
			<section>
				<h3>Let the world know.<br/>Share this Album.</h3>		
				<?php
					$postTitle = get_the_title();
					$postPermalink = get_permalink();
				?>
				<ul class="o-networks">
					<li><a href="mailto:?&subject=<?php echo $postTitle;?>&body=<?php echo $postPermalink; ?>"><i class="c-mail"></i></a></li>
					<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postPermalink; ?>"><i class="c-fb"></i></a></li>
					<li><a href="https://twitter.com/home?status=<?php echo $postPermalink; ?>"><i class="c-tw"></i></a></li>
					<li><a href="https://plus.google.com/share?url=<?php echo $postPermalink; ?>"><i class="c-gplus"></i></a></li>
					<li><a href="whatsapp://send?text=<?php echo $postPermalink; ?>"><i class="c-wa"></i></a></li>
				</ul>
			</section>
		</div>
		<div class="u-third">
			<section>
				<h3>Get Inspired.<br/>Change Stories delivered to your inbox.</h3>
				<form class="u-clear" action="//strommeea.us16.list-manage.com/subscribe/post?u=3b86477f4d57caf4ccef149c4&amp;id=938bdb1af2" method="post">
					<input type="email" name="EMAIL" placeholder="Your E-mail" required/>
					<button class="o-button">
						<svg class="o-circle" viewBox="0 0 24 24"><circle class="o-circle__inner" cx="12.1" cy="12.1" r="11.1"/><circle class="o-circle__outer" cx="12.1" cy="12.1" r="11.1"/><g><line x1="5.1" y1="11.8" x2="17.6" y2="11.8"/><polyline points="14.8,8.4 18.2,11.8 14.8,15.2 "/></g></svg>
					</button>
				</form>
			</section>
		</div>
		<div class="u-third">
			<section class="u-center">
				<h3>Let’s get working.<br/>Partner with Us</h3>
				<?php echo renderButton(home_url().'/contact','Become a Partner'); ?>
			</section>
		</div>
	</div>
	<span class="o-line s--divider"></span>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>