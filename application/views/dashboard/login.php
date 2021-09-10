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
					<a class="txt1" href="<?php echo base_url()."forget-password"; ?>">
						Forgot Password?
					</a>
				</div>
				</div>
				<div class="col-md-6">
				<div class="text-center p-t-90" style="">
					<a class="txt1" href="<?php echo base_url()."signup"; ?>">
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
