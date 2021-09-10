<div class="limiter">
	<div class="container-login100"
		 style="background-image: url('<?php echo base_url(); ?>assets/login/images/bg-01.jpg');">
		<div class="wrap-login100">
			<form id="passwordReset" name="passwordReset" method="post"
				  action="<?php echo base_url(); ?>dashboard/passwordReset">
				<span class="login100-form-logo">
						<i class="zmdi zmdi-lock"></i>
					</span>

				<span class="login100-form-title p-b-34 p-t-27">
						Reset Password
					</span>
				<div class="notification"></div>
				<input type="hidden" name="token" value="<?php echo $this->uri->segment(3); ?>">
				<div class="wrap-input100 validate-input" data-validate="Enter email">
					<input class="input100" type="password" id="password" name="password" placeholder="New Password">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Enter email">
					<input class="input100" type="password" id="confirm_password" name="confirm_password"
						   placeholder="Confirm Password">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>
				<span id='message'></span>

				<div class="container-login100-form-btn">

					<button class="login100-form-btn" name="submit" type="submit">
						Submit
					</button>
				</div>
			</form>
		</div>

	</div>
</div>

<script type="text/javascript">
	$('#passwordReset').submit(function (e) {
		e.preventDefault();
		var loginForm = $(this);
		$.ajax({
			url: '<?php echo base_url(); ?>dashboard/passwordReset',
			data: new FormData($('#passwordReset')[0]),
			type: 'POST',
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function (data) {
				if (data) {
					$('.notification').html('<div id="message" class="alert alert-danger">' + data.message + '</div>');
					if(data.message == 'Password Updated'){
						alert(data.message);
						$('.notification').html('<div id="message" class="alert alert-success">' + data.message + '</div>');
						location.href = '<?php echo base_url(); ?>dashboard/login';
					}
				} else {
					$('div.validate-input').next('span').html();
					$('.notification').html('<div id="message" class="alert alert-danger">' + data.message + '</div>');
					$('#emailError').html(data.emailError);
					$('passwordError').html(data.passwordError);
				}
			}
		});
	});


	$('#password, #confirm_password').on('keyup', function () {
		if ($('#password').val() == $('#confirm_password').val()) {
			$('#message').html('').css('color', 'green');
		} else
			$('#message').html('Passwords Does Not Matching').css('color', 'red');
	});

</script>
</body>
</html>
