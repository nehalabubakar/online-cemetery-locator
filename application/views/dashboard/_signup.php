<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign-up Cemetery</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css"
		  href="<?php echo base_url(); ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css"
		  href="<?php echo base_url(); ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css"
		  href="<?php echo base_url(); ?>assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css"
		  href="<?php echo base_url(); ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css"
		  href="<?php echo base_url(); ?>assets/login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css"
		  href="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/main.css">

</head>
<body>

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


<div id="dropDownSelect1"></div>

<script src="<?php echo base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/vendor/select2/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/login/vendor/countdowntime/countdowntime.js"></script>

<script src="<?php echo base_url(); ?>assets/login/js/main.js"></script>
<script type="text/javascript">
	$/*('#create-account').submit(function (e) {
		e.preventDefault();
		//alert("helo");
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url(); ?>dashboard/create_account_validation',
			//data: $(this).serialize(),
			data: new FormData($('#create-account')[0]),
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function (data) {
				if (data.email) {
					location.href = '<?php echo base_url(); ?>dashboard';
				} else {
					$('div.validate-input').next('span').html('');

					$('.notification').html('<div id="message" class="text-center text-danger">' + data.message + '</div>');
					$('#firstNameError').html(data.firstNameError);
					$('#lastNameError').html(data.lastNameError);
					$('#emailError').html(data.emailError);
					$('#passwordError').html(data.passwordError);
				}
			}
		});
	})*/
</script>


<script>
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


</body>
</html>
