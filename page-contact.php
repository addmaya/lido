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
					<i class="o-icon"></i>
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
					<h3>Regional Office</h3>
					<p>Plot 25 Bukoto Street Kampala<br/>P.O. Box 27200,<br/>Kampala, Uganda</p>
				</div>
				<div class="u-half">
					<h3>Juba Country Office</h3>
					<p>Plot 25 Bukoto Street Kampala<br/>P.O. Box 27200,<br/>Kampala, Uganda</p>
				</div>
			</section>
			<section>
				<h3>Make an Inquiry</h3>
				<div class="u-clear">
					<div class="u-half">
						<p>Telephone</p>
						<p>Fax</p>
						<p>Mail</p>
					</div>
					<div class="u-half">
						<p>+256 777 578 890</p>
						<p>+256 777 578 890</p>
						<p><a href="mailto:sfeastafrica@stromme.org">sfeastafrica@stromme.org</a></p>
					</div>
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