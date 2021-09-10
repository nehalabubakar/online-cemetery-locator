<!DOCTYPE html>
<html lang="en">
<head>
	<title>Forgot Password</title>
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
			<div class="row">
				<div class="col-md-12">
					<?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
				</div>
			</div>
			<?php
			$this->load->helper('form');
			$error = $this->session->flashdata('error');
			$send = $this->session->flashdata('send');
			$notsend = $this->session->flashdata('notsend');
			$unable = $this->session->flashdata('unable');
			$invalid = $this->session->flashdata('invalid');
			if ($error) {
				?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $this->session->flashdata('error'); ?>
				</div>
			<?php }?>


			<form id="resetPassword" name="resetPassword" method="post"
				  action="<?php echo base_url(); ?>dashboard/ForgotPassword" onsubmit='return validate()'>
			<?/*= form_open() */?>
			<span class="login100-form-logo">
						<i class="zmdi zmdi-lock"></i>
					</span>

				<span class="login100-form-title p-b-34 p-t-27">
						Forgot Password
					</span>
				<div class="notification"></div>
				<div class="wrap-input100 validate-input" data-validate="Enter email">
					<input class="input100" type="email" id="email" name="email" placeholder="Email">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

				<div class="container-login100-form-btn">

					<button class="login100-form-btn" name="submit" type="submit">
						Submit
					</button>
				</div>
			</form>
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
	$('#resetPassword').submit(function (e) {
		e.preventDefault();
		var loginForm = $(this);
		$.ajax({
			url: '<?php echo base_url(); ?>dashboard/ForgotPassword',
			data: new FormData($('#resetPassword')[0]),
			type: 'POST',
			dataType: 'json',
			processData: false,
			contentType: false,
			beforeSend: function(){
				$('#resetPassword button[type="submit"]').attr('disabled', 'disabled');
				$('#resetPassword button[type="submit"]').append('<i class="fa fa-spinner fa-spin"></i>');
			},
			success: function(data){
				$('#resetPassword button[type="submit"]').attr('disabled', false);
				$('#resetPassword button[type="submit"] .fa-spinner').remove();

				$('#resetPassword .notification').html('<div id="alert" class="alert '+ data.class +' alert-dismissible">'+ data.message +'</div>');
				if(data.class == 'alert-success'){
					$('#resetPassword')[0].reset();
				}
			}
		});
	});
</script>
</body>
</html>
