<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Cemetery</title>
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
			<!--<form class="login100-form validate-form" id="login_form">-->
			<?php echo form_open('dashboard/login_validation',  array('id' => 'login_form')) ?>
			<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

			<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
			<div class="notification"></div>
			<div class="wrap-input100 validate-input" data-validate="Enter email">
				<input class="input100" type="email" name="email" placeholder="Email">
				<span class="focus-input100" data-placeholder="&#xf207;"></span>
			</div>

			<div class="wrap-input100 validate-input" data-validate="Enter password">
				<input class="input100" type="password" name="password" placeholder="Password">
				<span class="focus-input100" data-placeholder="&#xf191;"></span>
			</div>

			<div class="container-login100-form-btn">
				<button class="login100-form-btn">
					Login
				</button>
			</div>
			</form>
			<div class="row">
				<div class="col-md-6">
				<div class="text-center p-t-90">
					<a class="txt1" href="<?php echo base_url()."admin/forgot"; ?>">
						Forgot Password?
					</a>
				</div>
				</div>
				<div class="col-md-6">
				<div class="text-center p-t-90" style="">
					<a class="txt1" href="<?php echo base_url()."admin/signup"; ?>">
						Create Your Account
					</a>
				</div>
				</div>
			</div>
			<!--<div class="text-center p-t-90">
				<a class="txt1" href="#">
					Forgot Password?
				</a>
			</div>-->
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
	$('#login_form').submit(function (e) {
		e.preventDefault();
		var loginForm = $(this);
		$.ajax({
			url: loginForm.attr('action'),
			data: new FormData($('#login_form')[0]),
			type: 'POST',
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function (data) {
				if (data.email) {
					location.href = '<?php echo base_url(); ?>dashboard/welcome';
					//alert("hello");
				} else {
					$('div.validate-input').next('span').html();
					$('.notification').html('<div id="message" class="text-center text-danger">' + data.message + '</div>');
					$('#emailError').html(data.emailError);
					$('passwordError').html(data.passwordError);
				}
			}
		});
	});
</script>
</body>
</html>
