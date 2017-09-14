<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="c-cover">
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
				<div class="u-half">
					<section>
						<h3>Regional Office</h3>
						<p>Plot 25 Bukoto Street Kampala<br/>P.O. Box 27200,<br/>Kampala, Uganda</p>
					</section>
				</div>
				<div class="u-half">
					<section>
						<h3>Juba Country Office</h3>
						<p>Plot 25 Bukoto Street Kampala<br/>P.O. Box 27200,<br/>Kampala, Uganda</p>
					</section>
				</div>
				<div class="u-half">
					<section>
						<h3>Global Office</h3>
						<p>Plot 25 Bukoto Street Kampala<br/>P.O. Box 27200,<br/>Kampala, Uganda</p>
					</section>
				</div>
				<div class="u-half">
					<section>
						<h3>Make an Inquiry</h3>
						<p>Telephone: +256 777 578 890</p>
						<p>Fax: +256 777 578 890</p>
						<p>Mail: <a href="mailto:sfeastafrica@stromme.org">sfeastafrica@stromme.org</a></p>
					</section>
				</div>
			</section>
			<section>
				<h3>Connect with Us</h3>
				<ul class="o-networks">
					<li>
						<a href="">
							<i class="c-fb"></i>
							<span>StrommeEA</span>
						</a>
					</li>
					<li class="u-pl-m">
						<a href="">
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