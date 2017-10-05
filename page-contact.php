<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="c-cover s--bkg" id="contact">
	<figure class="c-cover__bkg"></figure>
	<div class="u-half">
		<section class="c-contact__section s--form">
			<h1>Reach Out</h1>
			<form method="post" action="<?php echo get_admin_url();?>admin-post.php" class="c-contact" id="contactForm">
				<div class="u-hide">
					<input type="hidden" name="action" value="submitContact"/>
					<?php wp_nonce_field('form_nonce_key','form_nonce');?>
				</div>

				<div class="o-input">
					<input type="text" placeholder="Name" name="userName" required/>
					<span></span>
				</div>
				<div class="o-input">
					<input type="email" placeholder="E-mail" name="userEmail" required/>
					<span></span>
				</div>
				<div class="o-input">
					<input type="number" placeholder="Phone Number" name="userTelephone" required/>
					<span></span>
				</div>
				<div class="o-input">
					<select name="userSubject">
						<option value="Partnership">I would like to become a Partner</option>
						<option value="Inquiry">Make an Inquiry</option>
						<option value="Feedback">Give Feedback</option>
						<option value="Job Inquiry">Apply for a Job</option>
						<option value="Report Corruption">Report Corruption</option>
					</select>
					<span></span>
				</div>
				<div class="o-input s--textarea">
					<textarea rows="5" placeholder="Your Message" name="userMessage" required></textarea>
					<span></span>
				</div>
				<button class="o-button">
					<svg class="o-circle" viewBox="0 0 24 24"><circle class="o-circle__inner" cx="12.1" cy="12.1" r="11.1"/><circle class="o-circle__outer" cx="12.1" cy="12.1" r="11.1"/><g><line x1="5.1" y1="11.8" x2="17.6" y2="11.8"/><polyline points="14.8,8.4 18.2,11.8 14.8,15.2 "/></g></svg>
					<span>Send Message</span>
				</button>
				<p id="contactFormAlert" class="u-hide"></p>
			</form>
		</section>
	</div>
	<div class="u-half">
		<section class="c-contact__section s--info">
			<h1>Get in Touch</h1>
			<section class="u-clear">
				<?php 
					while(have_rows('contacts')): the_row();
						$office = get_sub_field('office');
						$telephone = get_sub_field('telephone');
						$fax = get_sub_field('fax');
						$email = get_sub_field('email');
						$address = get_sub_field('address');
				 ?>
					
					<div class="u-half">
						<section>
							<?php if ($office): ?>
								<h3><?php echo $office; ?></h3>
							<?php endif ?>
							<?php if ($address): ?>
								<p><?php echo $address; ?></p>
							<?php endif ?>
							<?php if ($telephone): ?>
								<p>Telephone: <?php echo $telephone; ?></p>
							<?php endif ?>
							<?php if ($fax): ?>
								<p>Fax: <?php echo $fax; ?></p>
							<?php endif ?>
							<?php if ($email): ?>
								<p>Email <a href="mailto:<?php echo $email?>"><?php echo $email?></a></p>
							<?php endif ?>
							
						</section>
					</div>
				
				<?php endwhile; ?>
			</section>
			<section>
				<h3>Connect with Us</h3>
				<ul class="o-networks">
					<li>
						<a href="<?php echo esc_url(get_field('facebook')); ?>">
							<i class="c-fb"></i>
							<span>StrommeEA</span>
						</a>
					</li>
					<li class="u-pl-m">
						<a href="<?php echo esc_url(get_field('twitter')); ?>">
							<i class="c-tw"></i>
							<span>PovertyBusters</span>
						</a>
					</li>
				</ul>
			</section>
		</section>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>