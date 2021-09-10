<div class="ct-mediaSection ct-mediaSectionHeader ct-u-colorWhite" data-color="#fff" data-height="300px"
data-background="<?php echo base_url(); ?>assets/website/images/demo-content/contact-us-header-image.jpg"
data-background-mobile="<?php echo base_url(); ?>assets/website/images/demo-content/contact-us-header-image.jpg">
<div class="ct-mediaSection-inner">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="ct-fw-700 text-uppercase">CONTACT US</h3>
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li class="active">Contact Us</li>
				</ol>
			</div>
		</div>
	</div>
</div>
</div>


<section class="ct-contactPage ct-u-backgroundDark ct-u-paddingTop100 ct-u-paddingBottom100">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h4 class="ct-u-colorWhite ct-u-paddingBottom80">Address Details</h4>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 ct-u-marginTop20 text-center">
				<img src="assets/website/images/demo-content/image6.jpg" class="img-thumbnail" alt="Image"/>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="row">
					<div class="col-lg-12 col-lg-offset-0 col-md-12 col-sm-6 col-sm-offset-3 ct-u-paddingBottom40">
						<div class="ct-contactBox">
							<ul class="ct-contactBox-list ct-contactBox-list--smallPadding list-unstyled list-inline">
								<li data-toggle="tooltip" data-placement="bottom" title="Call us" class="active"><a
									href="#"><i class="fa fa-phone fa-2x"></i></a></li>
								</ul>
								<span
								class="ct-contactBox-content ct-u-displayBlock ct-u-fontType2 ct-u-fontSize30 ct-u-colorMotive "><?php echo $this->config->item('phone_number'); ?></span>
							</div>
						</div>
						<div class="col-lg-12 col-lg-offset-0 col-md-12 col-sm-6 col-sm-offset-3 ct-u-paddingBottom40">
							<div class="ct-contactBox">
								<ul class="ct-contactBox-list ct-contactBox-list--smallPadding list-unstyled list-inline">
									<li data-toggle="tooltip" data-placement="bottom" title="Send a message"
									class="active"><a href="#"><i class="fa fa-envelope-o fa-2x"></i></a></li>
								</ul>
								<span
								class="ct-contactBox-content ct-u-displayBlock ct-u-fontType2 ct-u-fontSize30 ct-u-colorMotive"><a
								href="mailto:<?php echo $this->config->item('email'); ?>" class="__cf_email__"
								data-cfemail="f0999e969fb09588919d809c95de939f9d"><?php echo $this->config->item('email'); ?></a></span>
							</div>
						</div>
						<div class="col-lg-12 col-lg-offset-0 col-md-12 col-sm-6 col-sm-offset-3 ct-u-paddingBottom10">
							<div class="ct-contactBox">
								<ul class="ct-contactBox-list ct-contactBox-list--smallPadding list-unstyled list-inline">
									<li data-toggle="tooltip" data-placement="bottom" title="Get more info"
									class="active"><a href="#"><i class="fa fa-home fa-2x"></i></a></li>
								</ul>
								<span
								class="ct-contactBox-content ct-u-displayBlock ct-u-fontType2 ct-u-fontSize30 ct-u-colorLight"><?php echo $this->config->item('address'); ?></span>
							</div>
						</div>
						<div class="col-lg-12 col-lg-offset-0 col-md-12 col-sm-6 col-sm-offset-3">
							<ul class="ct-socials ct-socials--largeIcon list-unstyled list-inline">
								<li data-toggle="tooltip" data-placement="bottom" title="Facebook"><a href="#"><i class="fa fa-facebook fa-lg"></i></a>
								</li>
								<li data-toggle="tooltip" data-placement="bottom" title="Twitter"><a href="#"><i class="fa fa-twitter fa-lg"></i></a>
								</li>
								<li data-toggle="tooltip" data-placement="bottom" title="Google Plus"><a href="#"><i class="fa fa-google-plus fa-lg"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ct-u-paddingTop80 ct-u-paddingBottom100 ct-u-backgroundBlack">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h4 class="ct-u-colorWhite ct-u-paddingBottom60">Send Us a Message</h4>

					<form role="form" action="<?php echo base_url(); ?>forms" method="post" class="contactForm validateIt" id="contact-form">
						<div class="notification"></div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control ct-fs-i" name="name" id="name" placeholder="Your name">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input type="email" class="form-control ct-fs-i" name="email" id="email"
									placeholder="Email address">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control ct-fs-i" name="phone" id="phone" placeholder="Phone no.">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control ct-fs-i" rows="1" name="<?php echo str_replace(' ', '_', 'What can we do for you?') ?>"
										placeholder="What can we do for you?" id="message"></textarea>
									</div>
								</div>
								<div class="col-md-12 ct-u-paddingBottom60">
									<div class="form-group">
										<textarea class="form-control ct-fs-i" rows="3" name="message" placeholder="Your Message" id="message-continue"></textarea>
									</div>
								</div>
								<div class="col-md-12 text-center">
									<button type="submit" class="btn btn-default">Send Message</button>
								</div>
							</div>
						</form>
						<div class="successMessage alert alert-success ct-frame ct-u-marginTop30" style="display: none">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							Thank You!
						</div>
						<div class="errorMessage alert alert-danger ct-frame ct-u-marginTop30" style="display: none">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							Ups! An error occured. Please try again later.
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ct-googleMap ct-googlemapStyle" data-location="121 King Street, Melbourne" data-height="350"
		data-zoom="13"></section>

