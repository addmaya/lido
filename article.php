<?php
	function renderArticle($articleClass, $articleCount, $aosDelay, $storyPhoto, $storyLink, $storyBeneficiary, $storyPrograms, $storyArea, $storyDate){
		$html = '';

		$html .= '<article class="o-article '.$articleClass.'" data-index="'.$articleCount.'" data-aos="fade-up" data-aos-delay="'.$aosDelay.'">';

		$html .= '<section class="u-clear">';
		$html .= '<figure><a href="'.$storyLink.'" class="js-lazy o-image" data-image-url="'.$storyPhoto.'"></a><span class="o-image__cover"></span></figure>';

		$html .= '<section class="o-article__summary">';

		return $html;		
	}
?>

<article class="o-article <?php echo $articleClass; ?>" data-index="<?php echo $articleCount; ?>" data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>">
	<section class="u-clear">
		<figure>
			<a href="<?php echo $storyLink; ?>" class="js-lazy o-image" data-image-url="<?php echo $storyPhoto; ?>">
				<span class="o-image__cover"></span>
			</a>
		</figure>
		<section class="o-article__summary">
			<h2><a href="<?php echo $storyLink; ?>"><span><?php echo $storyBeneficiary; ?></span></a></h2>
			<ul class="o-article__meta">
				<?php
					if ($storyPrograms):
				?>
					<li><a href="<?php echo get_permalink($storyPrograms[0]); ?>">/ <?php echo get_the_title($storyPrograms[0]); ?></a></li>
				<?php endif; ?>
				<?php if ($storyArea): ?>
					<li><a href="#">/ <?php echo $storyArea; ?></a></li>
				<?php endif ?>
				<li><a href="#">/ <?php echo get_the_date(); ?></a></li>
			</ul>
			<div class="t-dark"><?php echo renderButton(get_permalink(), 'Read Story'); ?></div>
		</section>
	</section>
</article>