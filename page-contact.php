<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="c-cover" id="contact">
	<span class="c-contact__tint"></span>
	<div class="u-half">
		<section class="c-contact__section">
			<h1>Reach Out</h1>
			<form action="" class="c-contact">
				<div class="o-input">
					<input type="text" placeholder="Name" name="" required/>
					<span></span>
				</div>
				<div class="o-input">
					<input type="email" placeholder="E-mail" name="" required/>
					<span></span>
				</div>
				<div class="o-input">
					<input type="number" placeholder="Phone Number" name="" required/>
					<span></span>
				</div>
				<div class="o-input">
					<select name="" id="">
						<option value="">I would like to make an inquiry</option>
						<option value="">I would like to say hi</option>
						<option value="">I would like to be your friend</option>
						<option value="">I would like to become loveable</option>
					</select>
					<span></span>
				</div>
				<div class="o-input s--textarea">
					<textarea name="" rows="5" placeholder="Your Message" required></textarea>
					<span></span>
				</div>
				<button class="o-button">
					<svg class="o-circle" viewBox="0 0 24 24"><circle class="o-circle__inner" cx="12.1" cy="12.1" r="11.1"/><circle class="o-circle__outer" cx="12.1" cy="12.1" r="11.1"/><g><line x1="5.1" y1="11.8" x2="17.6" y2="11.8"/><polyline points="14.8,8.4 18.2,11.8 14.8,15.2 "/></g></svg>
					<span>Send Message</span>
				</button>
			</form>
		</section>
	</div>
	<div class="u-half">
		<section class="c-contact__section">
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
							<h3><?php echo $office; ?></h3>
							<p><?php echo $address; ?></p>
							<p>Telephone: <?php echo $telephone; ?></p>
							<p>Fax: <?php echo $fax; ?></p>
							<p>Email <a href="mailto:<?php echo $email?>"><?php echo $email?></a></p>
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