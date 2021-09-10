<div class="limiter">
	<div class="container-login100"
		 style="background-image: url('<?php echo base_url(); ?>assets/login/images/bg-01.jpg');">
		<div class="wrap-login100">
			<div id="message"></div>
			<!--<form class="login100-form validate-form" id="contactForm">-->
			<?php echo form_open('dashboard/contactSubmit', array('id' => 'contactForm')) ?>
				<span class="login100-form-title p-b-34 p-t-27">
						Create Account
					</span>

				<div class="wrap-input100 validate-input" data-validate="Enter First Name">
					<input class="input100" type="text" name="firstName" placeholder="First Name">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Enter Last Name">
					<input class="input100" type="text" name="lastName" placeholder="Last Name">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
					<input class="input100" type="email" name="email" placeholder="Email">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Password is required">
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100" data-placeholder="&#xf191;"></span>
				</div>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Submit
					</button>
				</div>

				<div class="clearfix"></div>
			<!--</form>-->
			<?php echo form_close() ?>

		</div>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		$("#contactForm").on('submit', function(e) {
			e.preventDefault();

			var contactForm = $(this);

			$.ajax({
				url: contactForm.attr('action'),
				type: 'post',
				data: contactForm.serialize(),
				success: function(response){
					console.log(response);
					if(response.status == 'success') {
						$("#contactForm").hide();
					}

					$("#message").html(response.message);

				}
			});
		});
	});
</script>
