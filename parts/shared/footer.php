		<section class="c-paginator" data-aos="fade-up">
			<?php 
				$pageList = array();
				foreach (get_pages('sort_column=menu_order&sort_order=asc') as $page) {
					$pageList[] += $page->ID;
				}

				$currentPage = 0;
				$prevPageID = 0;
				$nextPageID = 0;

				if(!is_single()){
					$currentPage = array_search(get_the_ID(), $pageList);
					$prevPageID = $pageList[$currentPage-1];
					$nextPageID = $pageList[$currentPage+1];

					if(empty($nextPageID)){
						$nextPageID = get_option('page_on_front');
					}

					if(empty($prevPageID)){
						$pageCount = count($pageList);
						$prevPageID = $pageList[$pageCount - 1];
					}
				} else {
					$nextPost = get_previous_post();
					$prevPost = get_next_post();
					
					if(!empty($nextPost)){
						$nextPageID = $nextPost->ID;
					}
					else{
						$nextPageID = 20;
					}
					
					if (!empty($prevPost)){
						$prevPageID = $prevPost->ID;
					}
					else {
						$prevPageID = 20;
					}						
				}
			 ?>
			<div class="c-paginator__labels">
				<a href="<?php echo get_permalink($prevPageID);?>" class="js-paginator__prev">Previous</a>
				<span></span>
				<a href="<?php echo get_permalink($nextPageID);?>" class="js-paginator__next">Next</a>
			</div>
			<div class="u-clear">
				<a href="<?php echo get_permalink($prevPageID);?>" class="c-paginator__button s--left">
					<section class="o-rhombus s--medium">
						<figure class="o-rhombus__image js-defer" data-image-url="<?php echo get_field('photo',$prevPageID); ?>"></figure>
					</section>
					<div>
						<svg class="o-arrow" viewBox="0 0 68 48">
							<path class="o-arrow_head" d="M65.9,23.9H3.2"/>
							<path class="o-arrow_tail" d="M25.3,46.4L2.6,23.7L25.3,1"/>
						</svg>
						<span><?php echo get_the_title($prevPageID); ?></span>
					</div>
				</a>
				<a href="<?php echo get_permalink($nextPageID);?>" class="c-paginator__button s--right">
					<div>
						<span><?php echo get_the_title($nextPageID); ?></span>
						<svg class="o-arrow" viewBox="0 0 68 48">
							<path class="o-arrow_head" d="M2.6,23.5l62.6,0"/>
							<path class="o-arrow_tail" d="M43.2,1l22.7,22.7L43.2,46.4"/>
						</svg>
					</div>
					<section class="o-rhombus s--medium">
						<figure class="o-rhombus__image js-defer" data-image-url="<?php echo get_field('photo',$nextPageID); ?>"></figure>
					</section>
				</a>
			</div>
		</section>
		<footer class="c-page__footer t-dark">
			<!-- <div class="c-globe__wrap">
				<div class="c-globe"></div>
			</div> -->
			<div class="o-box">
				<h1 class="u-center">Together we can <br/>eradicate poverty in East Africa</h1>
				<div class="c-cta">
					<div class="u-third">
						<section>
							<h3>Let the world know.<br/>Share this page.</h3>
							<?php
								$pageTitle = get_the_title();
								$pagePermalink = get_permalink();
								$pageID = get_the_id();
							?>

							<ul class="o-networks t-light">
								<li><a href="mailto:?&subject=<?php echo $pageTitle;?>&body=<?php echo $pagePermalink; ?>"><i class="c-mail"></i></a></li>
								<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $pagePermalink; ?>"><i class="c-fb"></i></a></li>
								<li><a href="https://twitter.com/home?status=<?php echo $pagePermalink; ?>"><i class="c-tw"></i></a></li>
								<li><a href="https://plus.google.com/share?url=<?php echo $pagePermalink; ?>"><i class="c-gplus"></i></a></li>
								<li><a href="whatsapp://send?text=<?php echo $pagePermalink; ?>"><i class="c-wa"></i></a></li>
							</ul>

						</section>
					</div>
					<div class="u-third">
						<section>
							<h3>Get Inspired.<br/>Our Change Stories to your inbox.</h3>
							<form action="//strommeea.us16.list-manage.com/subscribe/post?u=3b86477f4d57caf4ccef149c4&amp;id=938bdb1af2" method="post" class="u-clear">
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
				<div class="c-sitemap">
					<div class="u-fifth">
						<section>
							<p>&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?></p>
						</section>
					</div>
					<div class="u-fifth">
						<section>
							<h4>Our Programs</h4>
							<ul>
								<?php  
									$programsList = new WP_Query(array('post_type'=>'program','posts_per_page'=>-1));
									while ( $programsList->have_posts() ) : $programsList->the_post();
								?>
								<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
							<?php endwhile; wp_reset_postdata(); ?>
							</ul>
						</section>
					</div>
					<div class="u-fifth">
						<section>
							<h4>About SFEA</h4>
							<ul>
								<li><a href="<?php echo home_url(); ?>/about">Profile</a></li>
								<li><a href="<?php echo home_url(); ?>/change-stories">Change Stories</a></li>
								<li><a href="<?php echo home_url(); ?>/partners">Partners</a></li>
								<!-- <li><a href="<?php echo home_url(); ?>/newsroom">Newsroom</a></li> -->
							</ul>
						</section>
					</div>
					<div class="u-fifth">
						<section>
							<h4>Contact</h4>
							<?php
								$contactInfo = get_field('contacts',18);
								$contactTel = $contactInfo[0]['telephone'];
								$contactEmail = $contactInfo[0]['email'];
								$fb = esc_url(get_field('facebook',18));
								$tw = esc_url(get_field('twitter',18));
							?>
							<ul>
								<li><a href=""><strong>T:</strong><span><?php echo $contactTel; ?></span></a></li>
								<li><a href="mailto:<?php echo $contactEmail; ?>"><strong>E:</strong><span><?php echo $contactEmail; ?></span></a></li>
								<li><a href="<?php echo $fb; ?>"><span>Facebook</span></a></li>
								<li><a href="<?php echo $tw; ?>"><span>Twitter</span></a></li>
							</ul>
						</section>
					</div>
					<div class="u-fifth">
						<section>
							<h4>Quick Links</h4>
							<ul>
								<?php 
									while ( have_rows('quick_links', 'option') ) : the_row();
										$linkTitle = get_sub_field('title');
										$externalLink = get_sub_field('external_link');
										
										if($externalLink){
											$linkURL = esc_url(get_sub_field('url'));
										} else {
											$linkURL = get_sub_field('link');
										}
								 ?>
								<li><a href="<?php echo $linkURL; ?>" <?php if($externalLink){echo 'target="_blank"';} ?>><?php echo $linkTitle; ?></a></li>
								<?php endwhile; ?>
							</ul>
						</section>
					</div>
				</div>
			</div>
			
		</footer>
		<!-- <div id="sadolinplascon"></div> -->
	</div>
</div>